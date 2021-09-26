<?php
require '../include.php';
echo $_POST['promotion'];
$np=$_POST['prix']-($_POST['prix']*$_POST['promotion']/100);
$promo=new Promotion($_POST['id'],$_POST['prix'],$np,$_POST['promotion']);
$promoC=new PromotionC();
$promoo=$promoC->afficherPromotionprod($_POST['id']);
$p=$promoo->fetch();
if(!$_POST['id']==$p['id']){
$promoC->AjouterPromotion($promo);
}
else
    $promoC->modifierPromotion($promo);
header('location:gestionlivre.php');
?>