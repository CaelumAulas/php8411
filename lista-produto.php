<?php 
include('cabecalho.php');
require_once('pagina-protegida.php');

$banco = new BancoDeDados;
$conexao = $banco->pegaConexao();
$produtoDao = new ProdutoDAO($conexao);

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
            <th>Categoria</th>
            <th>Usado?</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
    <?php $produtos = $produtoDao->listaTodos(); ?>
    <?php foreach($produtos as $p):  ?>
        <tr>
            <td><?= $p->getId(); ?></td>
            <td><?= $p->getNome(); ?></td>
            <td><?= $p->getPreco(); ?></td>
            <td><?= $p->getCategoria(); ?></td>
            <td><?= $p->getUsado() == true ? "Sim" : "Não"; ?></td>
            <td><?= $p->getDescricaoResumida(); ?> </td>
            <td>
                <form action="remove-produto.php" method="post" class="m-0">
                    <input type="hidden" name="id" value="<?= $p->getId(); ?>" />
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
                <a class="btn btn-sm btn-primary" 
                   href="produto-formulario.php?id=<?= $p->getId(); ?>">Alterar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<?php include('rodape.php'); ?>