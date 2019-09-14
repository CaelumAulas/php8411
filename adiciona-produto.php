<?php include('cabecalho.php'); ?>
<?php 
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    /* 
    1. mysql -u root (-p se precisar da senha)
    2. create database loja;
    3. use loja;
    4. create table produtos(
        id int primary key auto_increment,
        nome varchar(255) not null,
        preco decimal(10,2) not null,
    )
    5. select * from produtos;    
    */

    $conexao = mysqli_connect('localhost', 'root', '', 'loja8411');
    mysqli_query($conexao, "INSERT INTO produtos (nome, preco) VALUES ('{$nome}', {$preco})");
?>

<p class="alert alert-success">O produto <?= $nome; ?>, <?= $preco ?> foi salvo com sucesso.</p>

<?php include('rodape.php') ?>