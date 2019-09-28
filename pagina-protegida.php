<?php

require_once('usuario-sessao.php');

if(! usuarioEstaLogado()) {
    header('Location: index.php?acessoNegado');
    die();
}