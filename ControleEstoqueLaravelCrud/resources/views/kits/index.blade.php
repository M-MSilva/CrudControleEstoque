@extends('produtos.templates.master')

@section('title', 'Produtos')

@section('content')

@foreach($kits as $k)
<div class="card col-md-3">
    <img src="" alt="">

    <div class="card-body">
        <h5 class="card-title">{!! $k->P_Nome_kit !!} {!! $k->recipiente_kit !!}
          {!!$k->unidade_medida_kit!!} {!!$k->S_Nome_kit!!} {!!$k->UND!!} </h5>
        <p class="card-preco"> Preço de Custo: R$ {!!$k->Preco_venda_Kit!!}</p>
        <p class="card-preco"> Preço de Venda: R$ {!!$k->Preco_custo_kit!!}</p>


    </div>
</div>
@endforeach

@endsection
