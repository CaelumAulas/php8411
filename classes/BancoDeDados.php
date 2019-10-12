<?php 

class BancoDeDados 
{
  private static $conexao;

  function __construct(){
    if(!self::$conexao){
      self::$conexao = mysqli_connect('localhost', 'root', '', 'loja8411');
    }
  }

  public function pegaConexao() {
    return self::$conexao;
  }
}