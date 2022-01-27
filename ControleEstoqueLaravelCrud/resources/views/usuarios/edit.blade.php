@extends('usuarios.templates.master')

@section('title', 'Atualização')

@section('content')

<div class="container mt-1">
    <h1 class='TítulonoMeio'>Formulário de Atualização do Usuário {{$usuario->Nome_User}}</h1>
    <hr>

    <form method="POST" action="{{ route('usuarios.update', [$usuario->idUsuario]) }}" accept-charset="UTF-8" class="dataForm">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
    <fieldset class="user">
      <legend >Atualize o Usuário</legend>
        <div class="form-group">
          <label >Nome:</label>
          <input placeholder="Digite o nome do usuário ou funcionário!" class="form-control foo1" name="Nome_User" type="text" value="{{$usuario->Nome_User}}">
        </div><br>

        <div class="form-group">
          <label >Idade:</label>
          <input placeholder="Digite a idade do usuário/funcionário" class="form-control foo2" name="idade_User" type="number" value="{{$usuario->idade_User}}">
        </div><br>

        <input class="btn btn-primary BOTAO" type="submit" value="ATUALIZAR">
    </fieldset>
    </form>
  </div>

@endsection
