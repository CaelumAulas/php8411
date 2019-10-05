<?php
require_once('classes/Categoria.php');

function listaCategorias($conexao) {
    $categorias = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM categorias");
    while($categoria = mysqli_fetch_assoc($resultado)){
        $c = new Categoria;
        $c->setId($categoria['id']);
        $c->setNome($categoria['nome']);
        
        array_push($categorias, $c);
    }
    return $categorias;
}