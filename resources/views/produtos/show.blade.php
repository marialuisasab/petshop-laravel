@extends('layouts.app')


@section('conteudo')

<h1>Exibir Produto</h1>
<form method="post" action="/produtos/{{$produto->id}}">

{{method_field('DELETE')}} <!-- http nao implementa -->
{{csrf_field()}}

  Nome: {{$produto->nome}} <br>
  Preço: {{$produto->preco}} <br>
  <!--Imagem: {{$produto->imagem}} <br>-->
  <image img src="/images/{{$produto->imagem}}" alt="profile Pic" class="img-responsive" height="100" width="100" alt="Image"></image>

  <br>
  <br>
  <a href="/produtos/{{$produto->id}}/edit" class="btn btn-primary"> Editar </a>

  <input type="submit" class="btn btn-danger" value="Excluir" />

  <a href="/produtos" class="btn btn-primary"> Voltar </a>
  

  <a href="/comprar/{{$produto->id}}" class="btn btn-primary"> Comprar </a>
</form>
  @endsection
