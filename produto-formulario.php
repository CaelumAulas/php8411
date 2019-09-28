<?php 
include('cabecalho.php'); 
require_once('conecta.php');
require_once('categoria-banco.php');
require_once('pagina-protegida.php');

$categorias = listaCategorias($conexao);
?>

<h1 class="display-4">Cadastro de Produto</h1>

<form action="adiciona-produto.php" method="post"> 
    <div class="form-group">
        <label>Nome: </label>
        <input type="text" name="nome"  class="form-control" />
    </div>

    <div class="form-group">
        <label>Preço: </label>
        <input type="text" name="preco" class="form-control"  />
    </div>

    <div class="form-group">
        <label>Categoria: </label>
        <select name="categoria_id" class="form-control">
            <?php foreach($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>">
                    <?= $categoria['nome'] ?> 
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Usado? </label>
        <input type="checkbox" 
        name="usado" value="true" />

    </div>
    

    <div class="form-group">
        <label>Descrição: </label>
        <textarea name="descricao" class="form-control">
        </textarea>
    </div>


    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<?php include('rodape.php') ?>