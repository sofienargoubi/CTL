<?php
session_start();
/*
include "../../core/Users.php";
include "../../config.php";
*/
require '../../include.php';

$user=new Users();

$list=$user->login($_POST['addressmail']);
$res=$list->fetch();

$pass=password_verify($_POST['pass'],$res['MotDePasse']);

if ($pass){
      

$id="";
$nom="";
$mdp="";
$mail="";
$tel="";
$role="";


        $id=$res['ID'];
        $nom=$res['Nom'];
        $mdp=$res['MotDePasse'];
        $mail=$res['Email'];
        $tel=$res['NumeroTelephone'];
        $role=$res['Role'];




if(($_POST['addressmail']==$mail)) {
    $_SESSION['id']=$id;
    $_SESSION['Nom']=$nom;
    $_SESSION['mdp']=$mdp;
    $_SESSION['mail']=$mail;
    $_SESSION['tel']=$tel;
    $_SESSION['role']=$role;
    if($_SESSION['role']=='Client')
   { header('location:../../viewsFO/index.php');
}
else if ($_SESSION['role']!='Client')
    {header('location:../../viewsBO/index.php');}

}
else {
    
    header('location:../../viewsBO/index.php');
}
}
else {echo "mot de passe incorrect";}
?>