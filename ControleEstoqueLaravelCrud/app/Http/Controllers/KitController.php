<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Kit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $kits = Kit::all();
      return view('kits.index', ['kits' => $kits]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        return view('kits.create',['produtos'=> $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kit = Kit::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            //md5 é para deixar o nome do arquivo unico
                                                //pega o nome            concatena
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            //salvando a imagem no servidor
            //salvamos a imagem em public_path, com o nome $imageName
            $requestImage->move(public_path('_img/produtos/'), $imageName);

            //salva de fato
            $kit['image'] = $imageName;

        }

            $produtos = collect($request->input('produtos',[]))
              ->map(function($produto)
              {
                return ['quantidade' => $produto];
              });

              $kit->produtos()->sync($produtos);
              $kit->save();


          return redirect('/produtos')->with('status', $kit['P_Nome_kit'] . ' ' . 'Adicionado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kit $kit)
    {

          $kit->load('produtos');

          $produtos = Produto::get()->map(function($produto) use ($kit)
          {
              $produto->value = data_get($kit->produtos->firstWhere('idProduto', $produto->idProduto), 'pivot.quantidade') ?? null;
              return $produto;
          });

          return view('kits.edit', [
              'produtos' => $produtos,
              'kit' => $kit,
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Kit $kit) //UpdateRecipeRequest $request, Recipe $recipe
    {


      $data = $request->validate([
            'P_Nome_kit' => ['string','required',],
            'recipiente_kit' => ['string',],
            'unidade_medida_kit' => ['string',],
            'S_Nome_kit' => ['string','required',],
            'UND' => ['string',],
            'Preco_venda_Kit' => ['numeric','required',],
            'Preco_custo_kit' => ['numeric','required',],
            'produtos.*' => ['string',],
            'produtos'   => ['required','array',],
        ]);

        /* imagem */

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            //md5 é para deixar o nome do arquivo unico
                                                //pega o nome            concatena
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            //salvando a imagem no servidor
            //salvamos a imagem em public_path, com o nome $imageName
            $requestImage->move(public_path('_img/produtos'), $imageName);

            //salva de fato
            $kit->image = $imageName;

        }

        $kit->update($data);
        $kit->produtos()->sync($this->mapProdutos($data['produtos']));
        //$kit->save();

        return redirect('/produtos')->with('status', $kit['P_Nome_kit'] . ' ' . 'editado com sucesso');

    }
    private function mapProdutos($produtos)
    {
          return collect($produtos)->map(function ($i)
          {
              return ['quantidade' => $i];
          });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKit)
    {
      try
      {
        $kit = Kit::find($idKit);
        $kit->destroy($idKit);
        return redirect('/produtos')->with('status',' Kit Deletado com Sucesso!');
      }
      catch  (\Exception $e)
      {
        return redirect('/produtos')->with('status', 'Não é possível deletar um Kit com uma requisição, ou produto associado!');
      }
    }
}
