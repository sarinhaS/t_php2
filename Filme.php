<?php
    final class Filme extends Obra implements Midia{
        private $duracao;
        private $nota;
        private $genero;

        public function __construct($nome, $personagens, $duracao, $nota, $genero){
            parent::__construct($nome, $personagens);
            $this->nota = $nota;
            $this->duracao = $duracao;
            $this->genero = $genero;
        }

        public function getDuracao(){ return $this->duracao; }
        public function setDuracao($duracao) { $this->duracao = $duracao; }
        
        public function setNota($nota) { $this->nota = $nota; }

        public function getGenero() { return $this->genero; }
        public function setGenero($genero) { $this->genero = $genero; }

        public function obterNota(){
            return $this->nota;
        }
    }