<?php include('cabecalho.php'); ?>
<?php include('conecta.php'); ?>

<?php 
    $nome = $_POST['nome'];
    $preco = $_POST['preco']; //mysqli_connect foi para o conecta.php
    $consulta = "INSERT INTO produtos (nome, preco) VALUES ('{$nome}', {$preco})"
?>

<?php if(mysqli_query($conexao, $consulta)) : ?>
    <p class="alert alert-success">
        O produto <?= $nome; ?>, <?= $preco ?> foi salvo com sucesso.
    </p>
<?php else: ?>
    <p class="alert alert-danger">
        O produto <?= $nome; ?> não foi salvo!! Tá doidão!? <?= mysqli_error($conexao); ?>
    </p>
<?php endif; ?>

<?php include('rodape.php') ?>