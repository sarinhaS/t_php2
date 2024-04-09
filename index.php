<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>
<body>
<?php
echo "<h1> Atores: </h1>";
require_once('Ator.php');
$ator1 = new Ator('Pedro', '16', 'Senegal');
echo "<h4>ator 1: </h4>" . "nome: " . $ator1->getNome() . "<br>idade: " . $ator1->getIdade() . "<br>pais: " . $ator1->getPais();
$ator2 = new Ator('Sara', '15', 'Brasil');
echo "<h4>ator 2: </h4>" . "nome: " . $ator2->getNome() . "<br>idade: " . $ator2->getIdade() . "<br>pais: " . $ator2->getPais();
$ator3 = new Ator('Julia', '20', 'Marrocos');
echo "<h4>ator 3: </h4>" . "nome: " . $ator3->getNome() . "<br>idade: " . $ator3->getIdade() . "<br>pais: " . $ator3->getPais();
$ator4 = new Ator('Larissa', '12', 'Portugal');
echo "<h4>ator 4: </h4>" . "nome: " . $ator4->getNome() . "<br>idade: " . $ator4->getIdade() . "<br>pais: " . $ator4->getPais();


$atores = [$ator1, $ator2, $ator3, $ator4];

echo "<br><br>" . "<h1> Personagens: </h1>";
require_once('Personagem.php');
$personagem1 = new Personagem('Chesire', $ator1->getNome(), true,  'Gato de Chesire');
echo "<h4> personagem 1:</h4>" . "nome: " . $personagem1->getNome() . "<br>ator: " . $personagem1->getAtor() . "<br>protagonista: " . ($personagem1->getProtagonista() ? 'sim' : 'não') . "<br>descrição: " . $personagem1->getDescricao();
echo "<br><br>";

$personagem2 = new Personagem('Chapeleiro louco', $ator2->getNome(), false,  'Chapeleiro maluco');
echo "<h4> personagem 2:</h4>" . "nome: " . $personagem2->getNome() . "<br>ator: " . $personagem2->getAtor() . "<br>protagonista: " . ($personagem2->getProtagonista() ? 'sim' : 'não') . "<br>descrição: " . $personagem2->getDescricao();
echo "<br><br>";

$personagem3 = new Personagem('Alice', $ator3->getNome(), true,  'Alice no país das maravilhas');
echo "<h4> personagem 3:</h4>" . "nome: " . $personagem3->getNome() . "<br>ator: " . $personagem3->getAtor() . "<br>protagonista: " . ($personagem3->getProtagonista() ? 'sim' : 'não') . "<br>descrição: " . $personagem3->getDescricao();
echo "<br><br>";

$personagem4 = new Personagem('Rainha Branca', $ator1->getNome(), false,  'Rainha do castelo branco');
echo "<h4> personagem 4:</h4>" . "nome: " . $personagem4->getNome() . "<br>ator: " . $personagem4->getAtor() . "<br>protagonista: " . ($personagem4->getProtagonista() ? 'sim' : 'não') . "<br>descrição: " . $personagem4->getDescricao();
echo "<br><br>";

//acabar o obra
echo "<br><br>";
require_once('Midia.php');
require_once('Obra.php');
require_once('Filme.php');
$filme = new Filme('Wonka', [$personagem1, $personagem2, $personagem3], '2h40min', '9,5', 'comédia');
//$filme->addPersonagem($personagem1);

$filme->addPersonagem($personagem4);
echo "<h1> FILME </h1><BR> Personagens: ";
foreach($filme->getPersonagens() as $personagens){
    echo $personagens->getNome() . ", ";
}
echo "<br><br> Protagonistas: ";
print_r($filme->obterProtagonistas($filme->getPersonagens()));
echo "<br> Nota: " .  $filme->obterNota();
echo "<br> Duração: ".$filme->getDuracao();

echo "<br><br><h1>SÉRIE</h1>";

require_once('Serie.php');
require_once('Temporada.php');
require_once('Episodio.php');

$episodio1 = new Episodio('1', 'Diamante raro', 58);
$episodio2 = new Episodio('2', 'Choque e deleite', 61);
$episodio3 = new Episodio('3', 'A arte de desfalecer', 57);
$episodio4 = new Episodio('4', 'Questão de honra', 60);
$episodio5 = new Episodio('5', 'O duque e eu', 60);
$episodio6 = new Episodio('6', 'Farfalhar', 57);
$episodiosTemp1 = [$episodio1, $episodio2, $episodio3, $episodio4, $episodio5, $episodio6];

$episodio7 = new Episodio('1', 'Um oceano de distância', 61);
$episodio8 = new Episodio('2', 'Depois da tempestade', 72);
$episodio9 = new Episodio('3', 'Um grande libertino', 70);
$episodio10 = new Episodio('4', 'Foi dada a largada', 53);
$episodio11 = new Episodio('5', 'Obsessão', 68);
$episodio12 = new Episodio('6', 'Vitória', 58);
$episodiosTemp2 = [$episodio7, $episodio8, $episodio9, $episodio10, $episodio11, $episodio12];

$temporada1 = new Temporada('6', '10', $episodiosTemp1);
$temporada2 = new Temporada('6', '9', $episodiosTemp2);

$serie = new Serie('Bridgerton', [$personagem1, $personagem2, $personagem3], [$temporada1]);

$serie->addTemporada($temporada2);
echo "Episódios: ";
echo "<ul>";
foreach($serie->getTemporadas() as $key => $temporadas){
    echo "<h4>Temporada " . $key . "</h4>";
    $episodios = $temporadas->getEpisodios();
    foreach($episodios as $episodio){
        echo "<li>" . $episodio->getNumero(). ". " . $episodio->getNome() . "</li>";
    }
}
echo "</ul> <br> Nota da série: ";
echo $serie->obterNota() . "<br><br>";

require_once('EstatisticasDeSeries.php');

echo "Duração total da série: " . EstatisticasDeSeries::obterDuracaoTotalDaSerie($serie);
echo "<br> Total de episódios: " . EstatisticasDeSeries::obterTotalDeEpisodios($serie);
echo "<br>";
print_r(EstatisticasDeSeries::obterPaisesAtoresPersonagens($atores));
?>
</body>
</html>
