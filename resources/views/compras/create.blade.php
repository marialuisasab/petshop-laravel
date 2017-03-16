@extends('layouts.app')

@section('conteudo')

<h1>Fazer compra</h1>
  <form method="post" action="/compras">

  {{csrf_field()}}



    <label for="produto_id"> Produto: </label>
      <input type="hidden" class="form-control" name="produto_id" value="{{$produtos->id}}"/>

   {{$produtos->nome}}
  <div class="form-group">
    <label for="quantidade"> Quantidade </label><br>
    <input type="text" class="form-control" name="quantidade"/>
  </div>


  <input type="submit" class="btn btn-primary" value="Comprar" />

  <a href="/compras" class="btn btn-primary"> Voltar </a>
  </form>
@endsection
