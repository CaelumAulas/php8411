<?php
require_once('conecta.php');
require_once('autoload.php');

$produtoDao = new ProdutoDAO($conexao);

$id = $_POST['id'];

if($produtoDao->remove($id)) {
    header('Location: lista-produto.php?removido=true');
    die();
} 