<?php
function incapsula($frase, $tag, $classe=""){
    $ans="<$tag $classe> $frase </$tag>";
    return $ans;
    }

function commento($frase){
    $ans="<!-- $frase -->";
    return $ans;
    }
?>
