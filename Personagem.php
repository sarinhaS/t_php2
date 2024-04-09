<?php

class Personagem {

    private $nome;
    private $ator;
    private $protagonista;
    private $descrição;

    public function __construct($nome, $ator, $protagonista, $descricao){
        $this->nome = $nome;
        $this->ator = $ator;
        $this->protagonista = $protagonista;
        $this->descricao = $descricao;
    }

    public function getNome(){ return $this->nome; }
    public function setNome($nome){ $this->nome = $nome; }

    public function getAtor(){ return $this->ator; }
    public function setAtor($ator){ $this->ator = $ator; }

    public function getProtagonista(){ return $this->protagonista; }
    public function setProtagonista($protagonista){ $this->protagonista = $protagonista; }

    public function getDescricao(){ return $this->descricao; }
    public function setDescricao($descricao){ $this->descricao = $descricao; }
}