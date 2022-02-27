<?php
function permutations(string $str) :array{
    $len=strlen($str);
    if($len < 2){
        return [$str];
    }

    $array=[];
    for($i=0;$i<$len;$i++){
        $newString=substr($str,0,$i).substr($str,$i+1);
        foreach(permutations($newString) as $per){
            $array[]=$str[$i].$per;
        }
    }
    return array_unique($array);
}

