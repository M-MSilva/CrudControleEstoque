@extends('kits.templates.master')

@section('title', 'Criação')

@section('content')


<div class="container mt-1">
  <h1 class='TítulonoMeio'>Formulário de Criação de kit </h1>
  <hr>

  <form method="POST" action="{{route('kits.store')}}" accept-charset="UTF-8" class="dataForm" enctype="multipart/form-data">
  {{csrf_field()}}
    <fieldset class="produto">
      <legend >Crie um novo Kit</legend>
        <div class="form-group">
          <label for="image">Imagem:</label>
          <input type="file" name="image" class="from-control-file">
        </div><br>

        <div class="form-group">
          <label>Nome:</label>
          <input placeholder="Digite o primeiro nome do Kit!" class="form-control foo2" name="P_Nome_kit" type="text"  value="{{old('P_Nome_kit')}}" required>
        </div><br>

        <div class="form-group">
          <label >Recipiente:</label>
          <input placeholder="Relate em qual recipiente se encontra o produto ex:  PCT., Lata" class="form-control foo1" name="recipiente_kit" type="text" value="{{old('recipiente_kit')}}" required>
        </div><br>

        <div class="form-group">
          <label >Unidade de Medida:</label>
          <input placeholder="Informe a unidade de medida que o produto possui, ex: 5kg" class="form-control foo1"  name="unidade_medida_kit" type="text" value="{{old('unidade_medida_kit')}}" required>
        </div><br>

        <div class="form-group">
          <label >Recipiente:</label>
          <input placeholder="Relate em qual recipiente se encontra o produto ex:  PCT., Lata" class="form-control foo1"
           name="recipiente_produto" type="text" value="{{old('recipiente_produto')}}" required>
        </div><br>

        <div class="form-group">
          <label >Segundo Nome do Kit:</label>
          <input placeholder="Informe se o kit possui um nome a mais ex: fardo,básico" class="form-control foo1" name="S_Nome_kit" type="text" value="{{old('S_Nome_kit')}}" required>
        </div><br>

        <div class="form-group">
          <label>Unidade:</label>
          <input placeholder="produtos contidos kit se ele possuir apenas um tipo de produto" class="form-control foo1" name="UND" type="text" value="{{old('UND')}}" required>
        </div><br>

        <div class="form-group">
          <label>Preço de Venda:</label>
          <input placeholder="Relate o preço de venda" class="form-control foo2" step="any"  name="Preco_venda_Kit" type="number" value="{{old('Preco_venda_Kit')}}" required>
        </div><br>

        <div class="form-group">
          <label >Preço de Custo:</label>
          <input placeholder="Relate o preço de custo" class="form-control foo2" step="any"  name="Preco_custo_kit" type="number" value="{{old('Preco_custo_kit')}}" required>
        </div><br>

        <div class="form-group">
                <label >Produtos:</label><br>
                        @if(!empty($produtos))
                          @foreach($produtos as $p)
                              <label>
                                <input type="checkbox" data-id="{{$p->idProduto}}" class="produto-enable">
                                {{$p->Nome_prod}}
                              </label>


                              <label>
                                  <input data-id="{{$p->idProduto}}" type="text" class="produto-quantidade form-control" placeholder="quantidade" name="produtos[{!!$p->idProduto!!}]" disabled>
                              </label><br>
                          @endforeach
                        @endif
        </div>
        <input class="btn btn-primary BOTAO"  type="submit" value="CRIAR">
    </fieldset>
  </form>
</div>
@endsection
