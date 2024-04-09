<?php
    class EstatisticasDeSeries{
        public static function obterDuracaoTotalDaSerie($serie){
            $tempo = 0;
            $temporadas = $serie->getTemporadas();
            foreach($temporadas as $temporada){
                $episodios = $temporada->getEpisodios();
                foreach($episodios as $episodio){
                    $tempo += $episodio->getDuracao();
                }
            }
            $horas = floor($tempo / 60); // Obter o número inteiro de horas
            $minutos = fmod($tempo, 60); // Obter o resto da divisão, que são os minutos restantes

            $fraseFinal = $tempo . "min, ou " . $horas . "h " . $minutos . "min";
        
            return $fraseFinal;
        }

        public static function obterTotalDeEpisodios($serie){
            $totalDeEpisodios = 0;
            $temporadas = $serie->getTemporadas();
            foreach($temporadas as $temporada){
                $episodios = $temporada->getEpisodios();
                foreach($episodios as $episodio){
                    $totalDeEpisodios++;
                }
            }
            return $totalDeEpisodios;
        }

        public static function obterPaisesAtoresPersonagens($atores){
            $array = [];
            foreach($atores as $ator){
                $array[$ator->getPais()] = $ator->getNome();
            }
            return $array;
        }
    }
    