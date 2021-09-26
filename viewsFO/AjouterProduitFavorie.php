<?php
require '../include.php';
$fav=new FavorieC();
session_start();

if($_GET['action']=="ajouter") {
    $fav->ajouter($_GET['id'], $_SESSION['id']);

}

if($_GET['action']=="delete"){
$fav->supprimer($_GET['id']);
}
$p=$_SESSION['page2'];
header('location:'.$p);
?>

