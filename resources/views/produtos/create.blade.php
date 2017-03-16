@extends('layouts.app')

@section('conteudo')
  <!--@if(Session::has('nome'))
    <h2> {{Session::get('nome')}}</h2>
  @endif-->
      <h1>Cadastro de produto</h1>
      <form class="w3-form" action="/produtos" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
          <label for="nome"> Nome </label>
          <input type="text" class="form-control" name="nome"/>
        </div>

        <div class="form-group">
          <label for="preco"> Preço </label>
          <input type="text" class="form-control" name="preco"/>
        </div>

        <div class="form-group">
          <label for="imagem"> Imagem </label>
          <!-- <input type="text" class="form-control" name="imagem"/>-->
          <input type="file" name="imagem"/>
        </div>


        <input type="submit" class="btn btn-primary" value="Salvar" />

        <a href="/produtos" class="btn btn-primary"> Voltar </a>
        </form>
@endsection
