<?php

require '../include.php';


$packs1C=new PacksC();
$DB = new config();

$result = $packs1C->GetPacksParPrix();

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//now print the data
print json_encode($data);
?>

