@extends('layouts.app')


@section('conteudo')


      <h1>Editar dados pessoais</h1>

        <form method="post" action="/users/{{$user->id}}">

        {{method_field('PATCH')}} <!-- http nao implementa -->
        {{csrf_field()}}

        <div class="form-group">
          <label for="name"> Nome </label>
          <input type="text" name="name" value="{{$user->name}}" />
        </div>
        <!--
        <div class="form-group">
          <label for="password"> Senha </label>
          <input type="text" name="password" value="{{$user->password}}"/> <br>
        </div>
      -->
        <div class="form-group">
          <label for="tipo"> Tipo </label>
          <input type="text" name="tipo" value="{{$user->tipo}}"/> <br>
        </div>

        <a href="/homec" class="btn btn-primary"> Voltar </a>

        <input type="submit" class="btn btn-primary" value="Salvar" /> <br>
      </form>

  @endsection
