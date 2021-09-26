<?php
require '../include.php';
$promoC=new PromotionC();
$promoC->supprimerPromotion($_GET['id']);
header('location:gestionlivre.php');
?>