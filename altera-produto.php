<?php

include('cabecalho.php');
require_once('conecta.php'); 

$usado = array_key_exists('usado', $_POST) == true ? 'true' :  'false';

$categoria = new Categoria;
$categoria->setId($_POST['categoria_id']);

$produto = new Produto($_POST['nome'], $_POST['preco']);
$produto->setId($_POST['produto_id']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);
$produto->setUsado($usado);

$produtoDao = new ProdutoDAO($conexao);
?>    

<?php if($produtoDao->altera($produto)) : ?>
    <p class="alert alert-success">
        O produto <?= $produto->getNome(); ?>, 
        <?= $produto->getPreco(); ?> foi alterado com sucesso.
    </p>
<?php else: ?>
    <p class="alert alert-danger">
        O produto <?= $produto->getNome(); ?> 
        não foi salvo!! Tá doidão!? <?= mysqli_error($conexao); ?>
    </p>
<?php endif; ?>

<?php include('rodape.php') ?>