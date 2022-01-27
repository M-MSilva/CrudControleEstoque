<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/_css/estilo.css')}}">
    <title>@yield('title')</title>
  </head>
   <div id="interfaceTop">
      <header id="cabecalho">
        <hgroup >
            <h1>Controle de Estoque</h1>
            <h2>C.R.U.D.</h2>
            <h3>por Marcos Matheus Silva</h3>
          </hgroup>
        <img id="icone" src="/_img/edit.png" >
          <nav id="menu">
              <ul>
                <li onmouseover="mudaFoto('/_img/house.png')"onmouseout="mudaFoto('/_img/edit.png')"><a href="/">Home</a></li>
                <li onmouseover="mudaFoto('/_img/homem.png')"onmouseout="mudaFoto('/_img/edit.png')"><a href="/usuarios">Usuários</a></li>
                <li onmouseover="mudaFoto('/_img/cart.png')"onmouseout="mudaFoto('/_img/edit.png')"><a href="/produtos">Produtos</a></li>
              </ul>
          </nav>
    </header>
</div>
<body>
