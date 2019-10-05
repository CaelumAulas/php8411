<?php

require_once('classes/Produto.php');
require_once('classes/Categoria.php');

function insereProduto($conexao, Produto $produto) {
    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao()); 
    
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) 
              VALUES ('{$nome}', {$produto->getPreco()}, 
                      '{$descricao}', {$produto->getCategoria()->getId()}, 
                       {$produto->getUsado()})";
    
    return mysqli_query($conexao, $query);
}

function listaProdutos($conexao) {
    $listaDeProdutos = array();
    $consulta = 'SELECT p.*, c.nome AS categoria FROM produtos AS p LEFT JOIN 
                categorias AS c ON p.categoria_id = c.id';

    $resultado = mysqli_query($conexao, $consulta);

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

function removeProduto($conexao, $id){
    $query = "DELETE FROM produtos WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
    $consulta = "SELECT p.*, c.nome AS categoria FROM produtos AS p LEFT JOIN 
                categorias AS c ON p.categoria_id = c.id WHERE p.id = {$id}" ;

    $resultado = mysqli_query($conexao, $consulta);
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
function alteraProduto($conexao, Produto $produto) {
    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao()); 
    
    $query = "UPDATE produtos SET nome = '{$nome}', 
                preco = {$produto->getPreco()}, 
                descricao = '{$descricao}', 
                categoria_id = {$produto->getCategoria()->getId()}, 
                usado = {$produto->getUsado()}
              WHERE id = {$produto->getId()}";
    
    return mysqli_query($conexao, $query);
}