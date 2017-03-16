<?php

namespace App;

class Carrinho
{
  public function produto() {

    return $this->belongsTo('App\Produto');
}
