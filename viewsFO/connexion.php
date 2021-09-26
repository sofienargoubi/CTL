<?php
require '../include.php';
//require '../cores/panierC.php';
$user=new PanierC();
$list=$user->user($_POST['addressmail'],$_POST['pass']);
$id="";
$nom="";
$mdp="";
$mail="";
$tel="";
session_start();
foreach ($list as $row)
    {
        $id=$row['ID_User'];
        $nom=$row['Nom'];
        $mdp=$row['mdp'];
        $mail=$row['mail'];
        $tel=$row['tel'];


    }

$p=$_SESSION['page2'];

if(($_POST['addressmail']==$mail)&&($_POST['pass']==$mdp)) {
    $_SESSION['id']=$id;
    $_SESSION['Nom']=$nom;
    $_SESSION['mdp']=$mdp;
    $_SESSION['mail']=$mail;
    $_SESSION['tel']=$tel;
    echo $p;
    header('location:'.$p);
}
else {
    echo $id;
    header('location:login/login.html');
}

?>