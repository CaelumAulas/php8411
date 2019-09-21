<?php 

include('cabecalho.php');
require_once('conecta.php'); 
require_once('produto-banco.php'); 

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
?>    

<?php if(insereProduto($conexao, $nome, $preco, $descricao)) : ?>
    <p class="alert alert-success">
        O produto <?= $nome; ?>, <?= $preco ?> foi salvo com sucesso.
    </p>
<?php else: ?>
    <p class="alert alert-danger">
        O produto <?= $nome; ?> não foi salvo!! Tá doidão!? <?= mysqli_error($conexao); ?>
    </p>
<?php endif; ?>

<?php include('rodape.php') ?>