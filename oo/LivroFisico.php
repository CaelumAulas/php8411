<?php 

class LivroFisico extends Livro
{

  public function getPreco()
  {
    $taxaImpressao = 20;
    return parent::getPreco() + $taxaImpressao;
  }

  public function precoComDesconto(){
    return parent::getPreco() * 0.9;
  }
}