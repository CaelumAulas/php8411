<?php

class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $usado;
    private $categoria;

    public function __construct($nome, $preco)
    {
        $this->nome = $nome;
        $this->setPreco($preco);
    }

    public function setId($id)
    { 
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setNome($nome)
    { 
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setDescricao($descricao)
    { 
        $this->descricao = $descricao;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setPreco($preco)
    { 
        $this->preco = $preco;
    }
    public function getPreco()
    {
        return $this->preco * 1.1;
    }

    public function setUsado($usado)
    { 
        $this->usado = $usado;
    }
    public function getUsado()
    {
        return $this->usado;
    }

    public function setCategoria(Categoria  $categoria)
    { 
        $this->categoria = $categoria;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getDescricaoResumida() {
        $descricao = $this->getDescricao();

        return strlen($descricao) > 200 
                ? substr($descricao, 0, 200) . '...' 
                : $descricao;
    }

    public function __toString()
    {
        return "{$this->nome}, {$this->preco}";
    }

}