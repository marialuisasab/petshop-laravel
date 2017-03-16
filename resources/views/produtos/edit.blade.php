@extends('layouts.app')


@section('conteudo')


      <h1>Editar dados do produto</h1>

        <form method="post" action="/produtos/{{$produto->id}}">

        {{method_field('PATCH')}} <!-- http nao implementa -->
        {{csrf_field()}}

        <div class="form-group">
          <label for="nome"> Nome </label>
          <input type="text" name="nome" value="{{$produto->nome}}" />
        </div>

        <div class="form-group">
          <label for="preco"> Preço </label>
          <input type="text" name="preco" value="{{$produto->preco}}"/> <br>
        </div>

        <div class="form-group">
          <label for="imagem"> Imagem </label>

          <input type="text" name="imagem" value="{{$produto->imagem}}"/> <br>

        </div>

        <a href="/produtos" class="btn btn-primary"> Voltar </a>

        <input type="submit" class="btn btn-primary" value="Salvar" /> <br>
      </form>

  @endsection
