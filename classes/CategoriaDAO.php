<?php

class CategoriaDAO
{

  private $conexao;

  public function __construct($conexao){
    $this->conexao = $conexao;
  }

  public function listaTodas() {
    $categorias = array();
    $resultado = mysqli_query($this->conexao, "SELECT * FROM categorias");
    while($categoria = mysqli_fetch_assoc($resultado)){
        $c = new Categoria;
        $c->setId($categoria['id']);
        $c->setNome($categoria['nome']);
        
        array_push($categorias, $c);
    }
    return $categorias;
  }
}