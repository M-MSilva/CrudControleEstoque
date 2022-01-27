@extends('usuarios.templates.master')

@section('title', 'Usuários')

@section('content')
      @if (session('status'))
        <div class="alert alert-success msg">
            {{session('status') }}
        </div>
      @endif
      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mb-1">
        <h1 class="TítulonoMeio">Listagem de Usuários</h1>
      </div>
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
        <a href="/usuarios/create" class="btn btn-success btNovo">NOVO USUÁRIO</a>
      </div>
    <table class="table mt-3 justify-content-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Idade</th>
          <th scope="col" id="op">Operação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $user)
        <tr>
          <th>{!!$user->idUsuario!!}</th>
          <th>{!!$user->Nome_User!!}</th>
          <th>{!!$user->idade_User!!}</th>
          <th class="d-flex justify-content-center"  >
            <a href="{!!'usuarios/' . $user->idUsuario . '/edit'!!}" class="btn btn-primary mr-2  btEdit" >
            Editar
            </a>

            <form method="POST" action="{{ url('usuarios/' . $user->idUsuario) }}" accept-charset="UTF-8" class="deleteForm">
              {{csrf_field()}}
              {{ method_field('DELETE') }}
              <input class="btn btn-danger deletBt" type="submit" value="Deletar">
            </form>

          </th>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
