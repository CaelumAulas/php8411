<?php

function insereProduto($conexao, $nome, $preco, $descricao, $categoriaId, $usado) {
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) 
        VALUES ('{$nome}', {$preco}, '{$descricao}', {$categoriaId}, {$usado})";

    return mysqli_query($conexao, $query);
}

function listaProdutos($conexao) {
    $listaDeProdutos = array();
    $consulta = 'SELECT p.*, c.nome AS categoria FROM produtos AS p LEFT JOIN 
                categorias AS c ON p.categoria_id = c.id';

    $resultado = mysqli_query($conexao, $consulta);

    while($produto = mysqli_fetch_assoc($resultado)): 
        array_push($listaDeProdutos, $produto);
    endwhile;

    return $listaDeProdutos;
}

function removeProduto($conexao, $id){
    $query = "DELETE FROM produtos WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}
