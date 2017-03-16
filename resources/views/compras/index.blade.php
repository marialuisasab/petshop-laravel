@extends('layouts.app')


@section('conteudo')


<h1>Lista de Compras</h1>

<!--<a href="/compras/create" class="btn btn-primary">Fazer nova compra</a>-->


<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Produto</th>
      <th>Quantidade</th>
      <th>Data</th>
      

    </tr>
  </thead>
<tbody>
@foreach ($compras as $c)

<tr>
  <td><a href="/compras/{{ $c->id }}">{{ $c->id }}</a> </td>
  <td>{{ $c->produto->nome }} </td>
  <td>{{ $c->quantidade}}</td>
  <td>{{ $c->data }}</td>




</tr>
@endforeach
</tbody>
</table>

  <a href="/homec" class="btn btn-primary"> Voltar </a>

@endsection
