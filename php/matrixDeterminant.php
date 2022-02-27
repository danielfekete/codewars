<?php
declare(strict_types=1);
function determinant(array $matrix): int {
    $matrixLen=count($matrix);
    if($matrixLen ===1){
        return $matrix[0][0];
    }else if($matrixLen ===2){
        return calcMinor($matrix);
    }else{
        $determinant=calcMinors($matrix,1);
    }
    return $determinant;
  }

  function calcMinors($matrix,$number){
    if(count($matrix)>1){
            $determinant=0;
            for($col=0,$colLen=count($matrix[0]);$col<$colLen;$col++){
                //Matrix inside matrix
                $number=$matrix[0][$col];
                $newMatrix=$matrix;
                //Removes the first row
                array_shift($newMatrix);
                //Removes the col
                foreach(array_keys($newMatrix) as $key){
                    array_splice($newMatrix[$key],$col,1);
                }
                if(count($newMatrix) === 2){
                    //Calculate the 2*2 matrix -> minor
                    $minor=calcMinor($newMatrix);
                    if($col % 2 == 0){
                        $determinant+=$number*$minor;
                    }else{
                        $determinant-=$number*$minor;
                    }
                }else{
                  //Recursive
                    if($col % 2 == 0){
                      $determinant+=$number*calcMinors($newMatrix,$number);
                  }else{
                      $determinant-=$number*calcMinors($newMatrix,$number);
                  }
                }
            }
        }
    return $determinant;
  }


  function calcMinor(array $array){
    return $array[0][0] * $array[1][1] - $array[1][0] * $array[0][1];
  }
  
  