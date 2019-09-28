<?php 

include('cabecalho.php'); 
require_once('conecta.php');
require_once('usuario-banco.php');
require_once('usuario-sessao.php');

if(isset($_POST['email']) && isset($_POST['senha']) ){
    $usuario = buscaUsuario($conexao, $_POST['email']);
    
    if(password_verify($_POST['senha'], $usuario['senha'])){
        $_SESSION['usuario_logado'] = $usuario['email'];
        header('Location: lista-produto.php');
    }

}
    
?>


<h1 class="display-4">Login</h1>
<?php if(usuarioEstaLogado()): ?>
    <p class="alert alert-primary">Você já está logado no sistema!</p>
<?php else: ?>
    <form method="post"> 
        <div class="form-group">
            <label>Email: </label>
            <input type="email" name="email"  class="form-control" />
        </div>

        <div class="form-group">
            <label>Senha: </label>
            <input type="password" name="senha" class="form-control"  />
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
<?php endif; ?>


<?php include('rodape.php'); ?>