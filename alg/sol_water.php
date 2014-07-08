<?php
function calculateArea($array = null){
          $p_l = 0;
          $p_r = count($array) - 1;
          $max_l = $array[$p_l];
          $max_r = $array[$p_r];
          $volume = 0;
          while ($p_r >x $p_l) {
               if ($max_l < $max_r) {
                    $p_l = $p_l + 1;
                    if ($array[$p_l] >= $max_l) {
                         $max_l = $array[$p_l];
                    } else {
                         $volume = $volume + ($max_l - $array[$p_l]);
                    }
               } else {
                    $p_r = $p_r - 1;
                    if ($array[$p_r] >= $max_r) {
                         $max_r = $array[$p_r];
                    } else {
                         $volume = $volume + ($max_r - $array[$p_r]);
                    }
               }
          }
          return $volume;
     } 
$list_all = array(1,2,3,0,20,3,10,5,6,9);
echo calculateArea($list_all);