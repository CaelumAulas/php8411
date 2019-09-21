<?php 
include('cabecalho.php');
include('conecta.php'); 
?>

<div class="jumbotron text-center">
    <h1 class="display-4">Lista de Produtos</h1>
    <p>Compre um e leve 2, só hoje!</p>
</div>

<?php $resultado = mysqli_query($conexao, 'SELECT * FROM produtos'); ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
    <?php while($produto = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?= $produto['id'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php include('rodape.php'); ?>