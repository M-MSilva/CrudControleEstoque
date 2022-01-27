@extends('produtos.templates.master')

@section('title', 'Produtos')

@section('content')
      @if (session('status'))
        <div class="alert alert-success msg">
            {{ session('status') }}
        </div>
      @endif
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8  mb-1">
        <h1 class="TítulonoMeio">Produtos</h1>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
        <a href="/produtos/create" class="btn btn-success btNovo" >NOVO PRODUTO</a>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
        <a href="/kits/create" class="btn btn-success btNovo">NOVO KIT</a>
      </div>

      <div id="produtos-container" class="col-md-12">
        <div id="cards-container" class="row" >
            @foreach($produtos as $prod)

            <div class="card col-md-3">
                <img src="/_img/produtos/{!!$prod->image!!}" alt="{!! $prod->Nome_prod !!}">
                <div class="card-body">
                    <h5 class="card-title">{!! $prod->Nome_prod !!} {!!$prod->cor!!}
                    @if($prod->tipo!=" ")
                        Tipo {!! $prod->tipo !!}
                    @endif
                      {!!$prod->recipiente_produto!!} {!!$prod->unidade_medida!!} &emsp;&emsp;&emsp;&emsp; </h5>
                    <p class="card-preco"> Preço de Custo: R$ {!!$prod->Preco_custo_prod!!}</p>
                    <p class="card-preco"> Preço de Venda: R$ {!!$prod->Preco_venda_prod!!}</p>


                    <div class="row" style="padding-left: 2.8rem;">
                        <a href="{{route('produtos.edit',['idProduto'=>$prod->idProduto])}}" class="btn btn-primary mr-2 btEdit">
                        Editar
                        </a>
                        <form method="POST" action="{{ url('produtos/' . $prod->idProduto) }}" accept-charset="UTF-8" class="deleteForm">
                          {{csrf_field()}}
                          {{ method_field('DELETE') }}
                          <input class="btn btn-danger deletBt" type="submit" value="Deletar">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($kits as $k)
            <div class="card col-md-3">
                <img src="/_img/produtos/{!!$k->image!!}" alt="{!!$k->P_Nome_kit!!}">

                <div class="card-body">
                    <h5 class="card-title">{!! $k->P_Nome_kit !!} {!! $k->recipiente_kit !!}
                      {!!$k->unidade_medida_kit!!} {!!$k->S_Nome_kit!!} {!!$k->UND!!} </h5>
                    <p class="card-preco"> Preço de Custo: R$ {!!$k->Preco_venda_Kit!!}</p>
                    <p class="card-preco"> Preço de Venda: R$ {!!$k->Preco_custo_kit!!}</p>
                      <div class="row" style="padding-left: 2.8rem;">
                          <a href="{{route('kits.edit',['idKit'=>$k->idKit])}}" class="btn btn-primary mr-2 btEdit">
                          Editar
                          </a>

                          <form method="POST" action="{{route('kits.destroy',['idKit'=>$k->idKit])}}" accept-charset="UTF-8" class="deleteForm">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger deletBt" type="submit" value="Deletar">
                          </form>
                      </div>


                </div>
            </div>
            @endforeach

            @if(count($produtos)==0)
              <p>Não há produtos disponíveis.</p>
            @endif

            @if(count($kits)==0)
              <p>Não há kits disponíveis.</p>
            @endif
        </div>
    </div>

@endsection
