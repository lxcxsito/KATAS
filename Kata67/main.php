<?php

$frase = "Hola Que tal esta LUcas?";

print_r(getVocalsCount($frase));


function getVocalsCount(string $frase): array{
    strtolower($frase);
    $vocales = ["a" => 0,"e" => 0,"i" => 0,"o" => 0,"u" => 0];
    for ($i = 0; $i < strlen($frase); $i++){
        foreach (array_keys($vocales) as $vocal){
            if($vocal == $frase[$i])
                $vocales[$vocal]++;    
            }  
        }
    return $vocales;
}



?>