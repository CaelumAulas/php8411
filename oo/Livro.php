<?php 
require('ITributavel.php');

abstract class Livro extends Produto implements ITributavel
{
  private $autor;

  public function __construct($titulo, $valor, $autor)
  {
    parent::__construct($titulo, $valor);
    $this->autor = $autor;
  }

  public function setAutor($nome)
  {
    $this->autor = $nome;
  }

  public function getAutor()
  {
    return $this->autor;
  }

  public function getPreco()
  {
    $taxaDoAutor = 1.1;
    $imposto = 1.1;
    return (parent::getPreco() * $taxaDoAutor) * $imposto;
  }

  public function calculaTributacao(){
    return parent::getPreco() * 0.85;
  }

  public abstract function precoComDesconto();
}