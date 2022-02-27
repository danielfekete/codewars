<?php
function determinant(array $matrix): int {
  if (count($matrix) == 1) return $matrix[0][0];
  $d = 0;
  for ($i = 0; $i < count($matrix); $i++) {
    $nm = [];
    //Az első sort már alapból skippeli
    for ($j = 1; $j < count($matrix); $j++) {
      $temp = $matrix[$j];
      /**
       *Végigmegy az összes többin, belerakja átmenetileg egy tömbbe az elemet pl. [2,5,0,3]
       *Majd ebből kiszedi az adott szám indexét mindegyik sorban pl. marad így egy sorban [2,0,3] a sorokat pedig belerakja az új mátrixba
       */
      array_splice($temp, $i, 1);
      array_push($nm, $temp);
    }
    $d += pow(-1, $i) * ($matrix[0][$i]) * determinant($nm);
  }
  return $d;
}