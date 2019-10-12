<?php

require_once('autoload.php');


$carrinho = new CarrinhoDeCompras();

$produto = new Produto('Cueca', 35);
// $livro = new Livro('Harry Potter', 250, 'JK');
$livroD = new LivroDigital('Harry Potter', 250, 'JK');
$livroF = new LivroFisico('Harry Potter', 250, 'JK');
// $livro->setAutor('JK AlgumaCoisa');


$carrinho->adicionaProduto($produto);
$carrinho->adicionaProduto($livroD);
$carrinho->adicionaProduto($livroF);
// $carrinho->adicionaProduto("Cueca");


echo "<p>total no carrinho {$carrinho->calculaTotal()}</p>";


// echo "<p>{$produto->getNome()}, {$produto->getPreco()}</p>";
// // echo "<p>{$livro->getNome()}, {$livro->getPreco()}, {$livro->getAutor()}</p>";
// echo "<p>{$livroF->getNome()}, {$livroF->getPreco()}, 
//   {$livroF->getAutor()}, {$livroF->precoComDesconto()}</p>";

// echo "<p>{$livroD->getNome()}, {$livroD->getPreco()}, 
//   {$livroD->getAutor()}, {$livroD->precoComDesconto()}</p>";


