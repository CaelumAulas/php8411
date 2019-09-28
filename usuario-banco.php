<?php

function buscaUsuario($conexao, $email) {
    $resultado = mysqli_query($conexao, 
    "SELECT * FROM usuarios WHERE email = '{$email}'");
    return mysqli_fetch_assoc($resultado);
}