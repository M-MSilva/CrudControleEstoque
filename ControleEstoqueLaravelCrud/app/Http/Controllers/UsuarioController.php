<?php

namespace App\Http\Controllers;

//use Session;

use App\Usuario;

use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = Usuario::orderBy('idUsuario')->get();
        return view('usuarios.index',['usuarios' => $usuarios]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Usuario::create($data);

        return redirect('/usuarios')->with('status', $data['Nome_User'] . ' ' . 'Adicionado com Sucesso !');
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
     public function edit($idUsuario)
     {
         $usuario = Usuario::find($idUsuario);
         return view('usuarios.edit', ['usuario' => $usuario]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUsuario)
    {
        $usuario = Usuario::find($idUsuario);
        $data = $request->all();
        $usuario->update($data);
        return redirect('/usuarios')->with('status', $data['Nome_User'] . ' ' . 'Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUsuario)
    {
      try
      {
        $usuario = Usuario::find($idUsuario);
        $usuario->destroy($idUsuario);
        return redirect('/usuarios')->with('status', $usuario['Nome_User'] . ' ' . 'Deletado com Sucesso!');
      }
      catch  (\Exception $e)
      {
        return redirect('/usuarios')->with('status', 'Não é possível deletar um usuário com uma requisição associada!');
      }
    }
}
