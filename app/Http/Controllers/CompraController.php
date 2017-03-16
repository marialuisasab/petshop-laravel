<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Compra;
use App\Produto;
use App\User;
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

     public function __construct()
     {
       $this->middleware('auth');
     }

    public function index()
    {
      if(Auth::user()->tipo ==1){//somente o tipo 1 pode acessar
        $compras = Compra::all();
        return view('compras.index')->with('compras', $compras);
      } else {
        session()->flash('error',  'Acesso não autorizado!');
        return redirect('/homec');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Auth::user()->tipo ==1){
        $produtos = Produto::all();
        return view('compras.create')->with('produtos', $produtos);
      } else {
        session()->flash('error',  'Acesso não autorizado!');
        return redirect('/');
      }
    }

    public function comprar($id)
    {
      if(Auth::user()->tipo ==1){
        $produtos = Produto::find($id);
        return view('compras.create')->with('produtos', $produtos);
      } else {
        session()->flash('error',  'Acesso não autorizado!');
        return redirect('/');
      }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new Compra;
        $compra->quantidade=$request->quantidade;
        //$compra->data=$data = date("d/m/Y");
        $compra->user_id=Auth::user()->id;
        $compra->produto_id=$request->produto_id;

        $compra->save();

        return redirect('/compras');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $compra = Compra::find($id);
      return view('compras.show')->with('compra', $compra);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cidade = Cidade::find($id);
      return view('cidades.edit')->with('cidade', $cidade);
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
      $compra = Compra::find($id);
      $compra->quantidade=$request->quantidade;
      $compra->data=$request->data;
      $compra->produto_id=$request->produto_id; 
      $compra->user_id=$request->user_id;


      $compra->save();

      return redirect('/compras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Compra::destroy($id);
      return redirect('/compras');
    }

    public function showCarrinho(){

    }

    public function createCarrinho(){

    }

    public function editCarrinho(){

    }
}
