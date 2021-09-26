<?php
require "../include.php";
   $id = $_GET['id'];
   $lc=new livreC();
    $lc->supprimer_livre($id);
header("location:gestionlivre.php");


?>