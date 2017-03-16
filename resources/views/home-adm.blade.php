@extends('layouts.app')

@section('conteudo')
    @if (Auth::guest())
      <h2> Faça login para acessar as informações</h2>
    @else
      @if (Auth::user()->tipo == 2 || Auth::user()->tipo == 3)

            <div class="container-fluid text-center">
              <div class="row content">
                <div class="col-sm-2 sidenav">
                  <p><a href="/produtos">Listar Produtos</a></p>
                  <p><a href="/produtos/create">Cadastrar Produtos</a></p>

                </div>
                <div class="col-sm-10 text-left col-md-offset-3">


                  <h1>Seja Bem Vindo(a) ao perfil do administrador</h1>



                </div>

              </div>
            </div>
          @else
                <h2> Faça login para acessar as informações</h2>

          @endif
          @endif

@endsection
