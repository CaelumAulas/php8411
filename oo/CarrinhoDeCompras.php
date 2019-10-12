<?php 

class CarrinhoDeCompras
{

  private $listaDeProdutos = array();


  public function adicionaProduto(Produto $produto) {
    array_push($this->listaDeProdutos, $produto);
  }

  public function calculaTotal(){
    $total = 0;

    foreach($this->listaDeProdutos as $produto) {
      $total += $produto->getPreco();
    }
    
    return $total;
  }


}