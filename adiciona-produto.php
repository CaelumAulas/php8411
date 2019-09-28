<?php 

include('cabecalho.php');
require_once('conecta.php'); 
require_once('produto-banco.php'); 

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoriaId = $_POST['categoria_id'];
$usado = array_key_exists('usado', $_POST) == true ? 'true' :  'false';
?>    

<?php if(insereProduto($conexao, $nome, $preco, $descricao, $categoriaId, $usado)) : ?>
    <p class="alert alert-success">
        O produto <?= $nome; ?>, <?= $preco ?> foi salvo com sucesso.
    </p>
<?php else: ?>
    <p class="alert alert-danger">
        O produto <?= $nome; ?> não foi salvo!! Tá doidão!? <?= mysqli_error($conexao); ?>
    </p>
<?php endif; ?>

<?php include('rodape.php') ?>