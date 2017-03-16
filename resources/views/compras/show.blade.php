@extends('layouts.app')


@section('conteudo')

<h1>Dados da compra</h1>
<form method="post" action="/compras/{{$compra->id}}">

{{method_field('DELETE')}} <!-- http nao implementa -->
{{csrf_field()}}

  Produto: {{$compra->produto->nome}} <br>
  Quantidade: {{$compra->quantidade}} <br>
  Data: {{$compra->data}} <br>
  Preço unitário: {{$compra->produto->preco}} <br>

  <br>

  <a href="/compras" class="btn btn-primary"> Voltar </a>


</form>
  @endsection
