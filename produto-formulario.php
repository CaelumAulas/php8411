<?php 
include('cabecalho.php'); 
require_once('conecta.php');
require_once('produto-banco.php');
require_once('categoria-banco.php');
require_once('pagina-protegida.php');

$categorias = listaCategorias($conexao);
$titulo = "Cadastro";
$acao = "adiciona-produto.php";
$categoria = new Categoria;
$produto = new Produto("", "");
$produto->setCategoria($categoria);

if(array_key_exists('id', $_GET)){
    $titulo = "Alteração";
    $produto = buscaProduto($conexao, $_GET['id']);
    $acao = "altera-produto.php";
}
?>

<h1 class="display-4 mt-3"><?= $titulo; ?> de Produto</h1>

<form action="<?= $acao; ?>" method="post"> 
    <input type="hidden" name="produto_id" value="<?= $produto->getId(); ?>">

    <div class="form-group">
        <label>Nome: </label>
        <input type="text" name="nome" class="form-control" value="<?= $produto->getNome(); ?>" />
    </div>

    <div class="form-group">
        <label>Preço: </label>
        <input type="text" name="preco" class="form-control" value="<?= $produto->getPreco(); ?>"  />
    </div>

    <div class="form-group">
        <label>Categoria: </label>
        <select name="categoria_id" class="form-control">
            <?php foreach($categorias as $categoria): ?>
                
                <?php if($categoria->getId() == $produto->getCategoria()->getId()): ?>
                    <option value="<?= $categoria->getId(); ?>" selected>
                <?php else: ?>
                    <option value="<?= $categoria->getId(); ?>">
                <?php endif; ?>
                    <?= $categoria->getNome(); ?> 
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Usado? </label>
        <input type="checkbox" <?= $produto->getUsado() == true ? 'checked="true"' : 'checked="false"'; ?>
        name="usado" value="true" />
    </div>

    <div class="form-group">
        <label>Descrição: </label>
        <textarea name="descricao" class="form-control">
            <?= $produto->getDescricao(); ?>
        </textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        <?= array_key_exists('id', $_GET) == true ? 'Alterar' : 'Cadastrar' ?>
    </button>
</form>

<?php include('rodape.php'); ?>