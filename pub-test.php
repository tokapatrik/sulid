<?
include_once('include.php'); 

var_dump($_SESSION);
die();


$vezetknevek=["Király", "Barta", "Balázs", "Nemes", "Varga", "Boros", "Fábián", "Pásztor", "Katona", "Szőke", "Szekeres", "Orbán", "Orsós", "Barna", "Orosz", "Pintér", "Oláh", "Major", "Kelemen", "Bálint"];
$keresztnevek=["Levente", "Hanna", "Máté", "Zoé", "Dominik", "Anna", "Bence", "Léna", "Olivér", "Luca", "Noel", "Emma", "Marcell", "Boglárka", "Dániel", "Lili", "Zalán", "Lilien", "Ádám"];
$adatok;
do {
    $vezetek=$vezetknevek[rand(0, count($vezetknevek)-1)];
    $adatok["vezeteknevek"][]=$vezetek;
    $kereszt=$keresztnevek[rand(0, count($keresztnevek)-1)];
    $adatok["keresztnevek"][]=$kereszt;
    $adatok ["emailek"][]=strtolower($vezetek.".".$kereszt."@mail.hu");
} while (count($adatok["vezeteknevek"]) <= 10);

$emberek;
for ($j=0; $j < count($adatok["vezeteknevek"]); $j++) { 
    $ember;
    for ($i=0; $i < count($adatok["vezeteknevek"]); $i++) { 
        $ember=array(   "vezeteknev" => $adatok["vezeteknevek"][$j],
                        "keresztnev" => $adatok["keresztnevek"][$j],
                        "email" => $adatok["emailek"][$j]);
    }
    $emberek[]=$ember;
}

for ($i=0; $i < count($emberek); $i++) { 
    $sqlInsert=("INSERT INTO oktato (okt_isk_id, okt_nev, okt_nev_vezetek, okt_nev_kereszt, okt_email)");
    $sqlValues=" VALUES ('35', '".$emberek[$i]["vezeteknev"]." ".$emberek[$i]["keresztnev"]."', '".$emberek[$i]["vezeteknev"]."', '".$emberek[$i]["keresztnev"]."', '".$emberek[$i]["email"]."')";
    setSQL($sqlInsert.$sqlValues);
    echo ($sqlInsert.$sqlValues);
    echo "<br>";
}
?>