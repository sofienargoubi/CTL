<?php
/*
require "../config.php";
require '../core/livretFunction.php';
*/

require "../include.php";

$sujetF=new SujetF();
$DB = new config();

$result = $sujetF->stat();

//loop through the returned data
$dataa = array();
foreach ($result as $row) {
  $dataa[] = $row;
}

//now print the data
print json_encode($dataa);
?>