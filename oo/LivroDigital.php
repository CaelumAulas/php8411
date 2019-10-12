<?php 

class LivroDigital extends Livro
{

  public function precoComDesconto(){
    return parent::getPreco() * 0.95;
  }
}