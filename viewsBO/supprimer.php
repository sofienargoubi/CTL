<?php
/*
include "../entities/User.php";
include "../core/Users.php";*/
require '../include.php';

$user=new Users();
if (isset($_POST["supprimer"])) {
	$user->supprimerUser($_GET['id']);
}
header('location:tableclient.php')
?>