<?php
$generation = [(bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1),
        (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1),
        (bool)rand(0,1), (bool)rand(0,1)];
$tab = [];
foreach($generation as $case) {
        array_push($tab, $case == 1? "o":"x"); 
}




function turn($tab) {
        $tabChain = [];
        for($i = 0; $i < count($tab); ++$i) {
                switch($i) {
                        case 0:
                                if(($tab[count($tab)-1] == "o" && $tab[$i+1] == "x") || ($tab[count($tab)-1] == "x" && $tab[$i+1] == "o")) {
                                        array_push($tabChain,"o");
                                } else {
                                        array_push($tabChain,"x");
                                }
                        break;
                        case count($tab)-1:
                                if(($tab[$i-1] == "o" && $tab[0] == "x") || ($tab[$i-1] == "x" && $tab[0] == "o")) {
                                        array_push($tabChain,"o");
                                } else {
                                        array_push($tabChain,"x");
                                }
                        break;
                        default:
                                if(($tab[$i-1] == "o" && $tab[$i+1] == "x") || ($tab[$i-1] == "x" && $tab[$i+1] == "o")) {
                                        array_push($tabChain,"o");
                                } else {
                                        array_push($tabChain,"x");
                                }
                        break;
                }
        }
        return $tabChain;
}

function toString($tab) {
        $outChain = "";
        foreach($tab as $cellule) {
                $outChain.= $cellule;
        }
        $outChain .= "</br>";
        return $outChain;
}

echo toString($tab);

$x = 0;
$cell = turn($tab);
while($x < 5) {
  echo toString($cell);
   $cell = turn($cell);
   ++$x;      
}

?>
