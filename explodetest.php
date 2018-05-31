<?php

$search = "Guardians.of.the.galaxy.h264.yify";
$search = str_replace('-', ' ', $search);
$search = str_replace('.', ' ', $search);
include './classes/itunes.php';
$searcharray = explode(" ", $search);
$count = count($searcharray);
for ($i = 0; $i > 0; $i++) {
    
}