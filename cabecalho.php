<?php 
    session_start(); 
    require_once('usuario-sessao.php');
?>

<html>
<head>
    <title>Minha Loja</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Lojinha</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php if(usuarioEstaLogado()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="lista-produto.php">Lista de Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produto-formulario.php">Cadastro de Produtos</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <?php if(usuarioEstaLogado()): ?>
                            <a class="nav-link" href="logout.php">Logout</a>
                        <?php else:  ?>
                            <a class="nav-link" href="login.php">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
<div class="container">