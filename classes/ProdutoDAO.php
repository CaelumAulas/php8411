<?php 
class ProdutoDAO
{
  private $conexao;

  public function __construct($conexao)
  {
    $this->conexao = $conexao;
  }

  public function salva(Produto $produto) {
    $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
    $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao()); 
    
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) 
              VALUES ('{$nome}', {$produto->getPreco()}, 
                      '{$descricao}', {$produto->getCategoria()->getId()}, 
                       {$produto->getUsado()})";
    
    return mysqli_query($this->conexao, $query);
  }

  public function listaTodos() {
      $listaDeProdutos = array();
      $consulta = 'SELECT p.*, c.nome AS categoria FROM produtos AS p LEFT JOIN 
                  categorias AS c ON p.categoria_id = c.id';

      $resultado = mysqli_query($this->conexao, $consulta);

      while($produto = mysqli_fetch_object($resultado)): 
          $c = new Categoria;
          $c->setNome($produto->categoria);
          
          $p = new Produto($produto->nome, $produto->preco);
          $p->setId($produto->id);
          $p->setDescricao($produto->descricao);
          $p->setUsado($produto->usado);
          $p->setCategoria($c);

          array_push($listaDeProdutos, $p);
      endwhile;

      return $listaDeProdutos;
  }

  public function remove($id){
      $query = "DELETE FROM produtos WHERE id = {$id}";
      return mysqli_query($this->conexao, $query);
  }

  public function buscaPorId($id) {
      $consulta = "SELECT p.*, c.nome AS categoria FROM produtos AS p LEFT JOIN 
                  categorias AS c ON p.categoria_id = c.id WHERE p.id = {$id}" ;

      $resultado = mysqli_query($this->conexao, $consulta);
      $produto = mysqli_fetch_object($resultado);
      
      $c = new Categoria;
      $c->setNome($produto->categoria);
      $c->setId($produto->categoria_id);  
      $p = new Produto($produto->nome, $produto->preco);
      $p->setId($produto->id);
      $p->setDescricao($produto->descricao);
      $p->setUsado($produto->usado);
      $p->setCategoria($c);

      return $p;
  }
  public function altera(Produto $produto) {
      $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
      $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao()); 
      
      $query = "UPDATE produtos SET nome = '{$nome}', 
                  preco = {$produto->getPreco()}, 
                  descricao = '{$descricao}', 
                  categoria_id = {$produto->getCategoria()->getId()}, 
                  usado = {$produto->getUsado()}
                WHERE id = {$produto->getId()}";
      
      return mysqli_query($this->conexao, $query);
  }
}