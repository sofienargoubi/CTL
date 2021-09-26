<?php
session_start();
require '../include.php';
    $notifF=new NotifF();
    $liste=$notifF->supp($_GET['id'],$_GET['suj']);

header('location:sujet.php?id='.$_GET['id']);
?>