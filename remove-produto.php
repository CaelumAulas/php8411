<?php
require_once('conecta.php');
require_once('produto-banco.php');

$id = $_POST['id'];

if(removeProduto($conexao, $id)) {
    header('Location: lista-produto.php?removido=true');
    die();
} 