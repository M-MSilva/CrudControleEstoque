<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Kit;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('idProduto')->get();
        $kits = Kit::orderBy('idKit')->get();

        return view('produtos.index',['produtos' => $produtos,'kits' => $kits]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Produto;
        $data->Nome_prod = $request->Nome_prod;
        $data->cor = $request->cor;
        $data->tipo = $request->tipo;
        $data->recipiente_produto = $request->recipiente_produto;
        $data->unidade_medida = $request->unidade_medida;
        $data->Preco_custo_prod = $request->Preco_custo_prod;
        $data->Preco_venda_prod = $request->Preco_venda_prod;


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
            $data->image = $imageName;

        }

      $data->save();

        return redirect('/produtos')->with('status', $data['Nome_prod'] . ' ' . 'Adicionado com Sucesso !');
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
    public function edit($idProduto)
    {
      $produto = Produto::find($idProduto);
      return view('produtos.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Produto $produto)
     {
       $data = $request->validate([
             'Nome_prod' => ['string','required',],
             'cor' => ['string',],
             'tipo' => ['string',],
             'recipiente_produto' => ['string','required',],
             'unidade_medida' => ['string',],
             'Preco_custo_prod' => ['numeric','required',],
             'Preco_venda_prod' => ['numeric','required',],
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
             $produto->image = $imageName;

         }

         $produto->update($data);

         return redirect('/produtos')->with('status', $data['Nome_prod'] . ' ' . 'editado com sucesso');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProduto)
    {
        try
        {
          $produto = Produto::find($idProduto);
          $produto->destroy($idProduto);
          return redirect('/produtos')->with('status', $produto['Nome_prod'] . ' ' . 'Deletado com Sucesso!');
        }
        catch  (\Exception $e)
        {
          return redirect('/produtos')->with('status', 'Não é possível deletar um produto com uma requisição associada, ou que esteja contido no estoque !');
        }
    }

}
