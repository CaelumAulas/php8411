<?php include('cabecalho.php'); ?>
    
    <?php if(array_key_exists('acessoNegado', $_GET)): ?>
        <p class="alert alert-warning mt-3">
            Acesso negado! Por favor, verifique seu usuário e senha.
        </p>
    <?php endif; ?>

    <div class="jumbotron text-center">
        <h1 class="display-4">Bem vindo!</h1>
        <p>Minha loja é muito massa vey!</p>
    </div>
    
<?php include('rodape.php'); ?>