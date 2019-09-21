<?php 
include('cabecalho.php');
require_once('conecta.php'); 
require_once('produto-banco.php');

function cortaDescricao($descricao) {
    return strlen($descricao) > 200 
        ? substr($descricao, 0, 200) . '...' 
        : $descricao;
}
?>

<div class="jumbotron text-center">
    <h1 class="display-4">Lista de Produtos</h1>
    <p>Compre um e leve 2, só hoje!</p>
</div>

<?php if(array_key_exists('removido', $_GET) && $_GET['removido'] == true): ?>
    <p class="alert alert-success">Deu bom deletando o produto hehe!</p>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
    <?php $produtos = listaProdutos($conexao); ?>
    <?php foreach($produtos as $taLouco):  ?>
        <tr>
            <td><?= $taLouco['id'] ?></td>
            <td><?= $taLouco['nome'] ?></td>
            <td><?= $taLouco['preco'] ?></td>
            <td><?= cortaDescricao($taLouco['descricao']) ?> </td>
            <td>
                <form action="remove-produto.php" method="post" class="m-0">
                    <input type="hidden" name="id" value="<?= $taLouco['id'] ?>" />
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php include('rodape.php'); ?>