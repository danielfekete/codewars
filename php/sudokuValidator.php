<?php
function valid_solution(array $m): bool {
    $rows=[];
    $cols=[];
    $regions=[];
    for($row=0;$row<9;$row++){
        $rows['row-'.$row]=$m[$row];
        for($col=0;$col<9;$col++){
            if($m[$col][$row] === 0){
                return false;
            }
            $cols['col-'.$row][]=$m[$col][$row];
            $regions['region-'.floor($row/3).'-'.floor($col/3)][]=$m[$col][$row];
        }
    }
    if(duplicate($rows) || duplicate($cols) || duplicate($regions)){
        return false;
    }
    return true;
}

function duplicate($nestedArray){
    foreach($nestedArray as $array){
        if(count($array) !== count(array_unique($array))){
            return true;
        }
    }
    return false;
}

var_dump(valid_solution([
  [5, 3, 4, 6, 7, 8, 9, 1, 2],
  [6, 7, 2, 1, 9, 5, 3, 4, 8],
  [1, 9, 8, 3, 4, 2, 5, 6, 7],
  [8, 5, 9, 7, 6, 1, 4, 2, 3],
  [4, 2, 6, 8, 5, 3, 7, 9, 1],
  [7, 1, 3, 9, 2, 4, 8, 5, 6],
  [9, 6, 1, 5, 3, 7, 2, 8, 4],
  [2, 8, 7, 4, 1, 9, 6, 3, 5],
  [3, 4, 5, 2, 8, 6, 1, 7, 9]
]));