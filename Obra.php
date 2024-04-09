<?php

abstract class Obra {
    protected $nome;
    protected $personagens;

    public function __construct($nome, $personagens){
        $this->nome = $nome;
        $this->personagens = $personagens;
    }

    public function getNome(){ return $this->nome; }
    public function setNome($nome){ $this->nome = $nome; }

    public function getPersonagens(){
        $arr = [];
        foreach($this->personagens as $personagem){
            array_push($arr, $personagem);
        }
        return $arr;
    }

    public function addPersonagem($personagem){
        array_push($this->personagens, $personagem);
    }

    public function obterProtagonistas($personagens){
        $arr = [];
        foreach($personagens as $personagem){       
            if($personagem->getProtagonista()){
                array_push($arr, $personagem->getNome());
            }
        }
        return $arr;
    }

    abstract function obterNota();
}