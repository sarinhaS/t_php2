<?php
final class Serie extends Obra{
    private $temporadas;
    public function __construct($nome, $personagens, $temporadas){
        parent::__construct($nome, $personagens);
        $this->temporadas = $temporadas;
    }
    public function getTemporadas(){
        $arr = [];
        foreach($this->temporadas as $temporadas){
            array_push($arr, $temporadas);
        }
        return $arr;
    }

    public function addTemporada($temporada){
        array_push($this->temporadas, $temporada);
    }

    public function obterNota(){
        $notas = 0;
        $temps = 0;
        foreach($this->temporadas as $temporada){
            $temps++;
            $notas = $temporada->getNota() + $notas;
        }
        return $notas/$temps;
    }
}