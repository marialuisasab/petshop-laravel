@extends('layouts.app')
@section('conteudo')

<h1>Lista de Produtos</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Preço</th>
      <th>Imagem</th>
      <th> </th>

    </tr>
  </thead>
<tbody>
@foreach ($produtos as $p)
<tr>
  <td><a href="/produtos/{{ $p->id }}">{{ $p->nome }}</a> </td>
  <td>{{ $p->preco }}</td>
  <!--<td>{{ $p->imagem }}</td>-->
  <td>
    <image img src="/images/{{$p->imagem}}" alt="profile Pic" class="img-responsive" height="100" width="100" alt="Image"></image>
  </td>
  <td><a href="/produtos/{{ $p->id }}" class="btn btn-primary">Comprar</a></td>
</tr>
@endforeach
</tbody>
</table>



@endsection
