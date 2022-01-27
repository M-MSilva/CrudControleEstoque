@extends('produtos.templates.master')

@section('title', 'Atualização')

@section('content')

<div class="container mt-1">
  <h1 class='TítulonoMeio'>Formulário de Atualização do Produto {{$produto->Nome_prod}} </h1>
  <hr>
    <form method="POST" action="{{ url('produtos/' . $produto->idProduto) }}" accept-charset="UTF-8" class="dataForm" enctype="multipart/form-data">
      {{csrf_field()}}
      {{ method_field('PATCH') }}
    <fieldset class="produto">
      <legend >Atualize o Produto </legend>
      <div class="form-group">
        <label for="image">Imagem:</label>
        <input type="file" name="image" class="from-control-file">
      </div><br>
      <div class="form-group">
        <label>Nome:</label>
        <input placeholder="Digite o nome do Produto!" class="form-control foo1"  name="Nome_prod" type="text" value="{{$produto->Nome_prod}}">
      </div><br>

      <div class="form-group">
        <label >Cor:</label>
        <input placeholder="Informe a cor do produto" class="form-control foo1" name="cor" type="text" value="{{$produto->cor}}">
      </div><br>

      <div class="form-group">
        <label >Tipo:</label>
        <input placeholder="Tecle o tipo do produto" class="form-control foo1" name="tipo" type="text" value="{{$produto->tipo}}">
      </div><br>

      <div class="form-group">
        <label >Recipiente:</label>
        <input placeholder="Relate em qual recipiente se encontra o produto ex:  PCT., Lata" class="form-control foo1" name="recipiente_produto" type="text" value="{{$produto->recipiente_produto}}">
      </div><br>

      <div class="form-group">
        <label >Unidade de Medida:</label>
        <input placeholder="Informe a unidade de medida que o produto possui, ex: 5kg" class="form-control foo1" name="unidade_medida" type="text" value="{{$produto->unidade_medida}}">
      </div><br>

      <div class="form-group">
        <label >Preço de Custo:</label>
        <input placeholder="Relate o preço de custo" class="form-control foo2" step="any"  name="Preco_custo_prod" type="number" value="{{$produto->Preco_custo_prod}}">
      </div><br>

      <div class="form-group">
        <label >Preço de Venda:</label>
        <input placeholder="Relate o preço de venda" class="form-control foo2" step="any"  name="Preco_venda_prod" type="number" value="{{$produto->Preco_venda_prod}}">
      </div><br>

        <input class="btn btn-primary BOTAO" type="submit" value="ATUALIZAR">
    </fieldset>
    </form>
</div>

@endsection
