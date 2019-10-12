<?php require('views/layout/cabecalho.php') ?>

<form action="/list" method="post" class="mt-4">
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="password">Senha</label>
    <input type="password" name="password" class="form-control">
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
</form>

<?php require('views/layout/rodape.php'); ?>