@extends('usuarios.templates.master')

@section('title', 'Criação')

@section('content')


<div class="container mt-1">
    <h1 class='TítulonoMeio'>Formulário de Usuário</h1>
    <hr>

    <form method="POST" action="{{route('usuarios.store')}}" accept-charset="UTF-8" class="dataForm">
    {{csrf_field()}}
    <fieldset class="user">
      <legend >Crie um novo Usuário</legend>
        <div class="form-group">
          <label >Nome:</label>
          <input placeholder="Digite o nome do usuário ou funcionário!" class="form-control foo1" name="Nome_User" type="text">
        </div><br>

        <div class="form-group">
          <label >Idade:</label>
          <input placeholder="Digite a idade do usuário/funcionário" class="form-control foo2" name="idade_User" type="number">
        </div><br>

        <input class="btn btn-primary BOTAO" type="submit" value="CRIAR">
    </fieldset>
    </form>
  </div>


@endsection
