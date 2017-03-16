<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produto;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ProdutoController extends Controller
{
     public function __construct()
     {
       $this->middleware('auth',['except'=> 'index']);
     }

    public function index()
    {
      $produtos = Produto::all();
      return view('produtos.index')->with('produtos', $produtos);
    }

      public function create()
    {   if(Auth::user()->tipo ==2){//somente o tipo 1 pode acessar
        return view('produtos.create');
      } else {
        session()->flash('error',  'Disciplina: acesso não autorizado!');
        return view ('denied');
      }
    }

     public function store(Request $request)
     {
         $this->validate($request, [
           'nome' => 'required',
           'preco' => 'required',
           'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

         if($request->hasFile('imagem')) {
           $file = Input::file('imagem');

           $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

           $nome = $timestamp. '-' .$file->getClientOriginalName();

           $imagem = new \stdClass();//instanciando
           $imagem->filePath = $nome;

           $file->move(public_path().'/images/', $nome);

           $produtos = new Produto;
           $produtos->nome = $request->nome;
           $produtos->preco = $request->preco;
           $produtos->imagem = $nome;
           $produtos->save();
       }

         return $this->create()->with('success', 'Produto cadastrado com sucesso!');
      }
/*
    public function store(Request $request, $id)
    {
      $produtos = new Produto;
           $produtos->nome = $request->nome;
           $produtos->preco = $request->preco;
           $produtos->imagem = '/img/'.$request->imagem;
           $produtos->save();
      return redirect('/produtos');
    }
*/

    public function show($id)
    {

      $produto = Produto::find($id);
      return view('produtos.show')->with('produto', $produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if((Auth::user()->tipo==2) || (Auth::user()->tipo==3)){
        $produto =Produto::find($id);
        return view('produtos.edit')->with('produto', $produto);
      } else {
        session()->flash('error',  'Disciplina: acesso não autorizado!');
        return redirect('/homea');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $produto = Produto::find($id);
      $produto->nome=$request->nome;
      $produto->preco=$request->preco;
      $produto->imagem=$request->imagem;

      $produto->save();

      return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { if(Auth::user()->tipo ==2){
        Produto::destroy($id);
        return redirect('/produtos');
      } else {
        session()->flash('error',  'Disciplina: acesso não autorizado!');
        return redirect('/homea');
      }
    }
}
