<?php 
require '../include.php';

$newsletters=new Newsletters();
if (isset($_POST["supprimernewsletter"])) {
	$newsletters->supprimerUser($_GET['id']);
}
header('location:tablenewsletter.php')
?>