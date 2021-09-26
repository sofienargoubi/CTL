<?php

require '../include.php';
echo $_POST['inscription'];
session_start();

$code="123456789AZERTYUIOPQSDFGHJKLMWXCVBN";

if( isset($_POST['inscription'])) {
    $_SESSION['code']=substr(str_shuffle($code),0,4);
    $_SESSION['nom']=$_POST['Nom'];
    $_SESSION['mail']=$_POST['Email'];
    $_SESSION['mdp']=$_POST['MotDePasse'];
    mail($_POST['Email'], "Confiramtion", $_SESSION['code']);

    require 'login/verficationemail.html';


}

else if(isset($_POST['confrmationmail'])){
    if ($_SESSION['code']==$_POST['code'])
    {
        $user= new Users();
        $pass_hache=password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT);
        echo $pass_hache;
        //$Client=new User('',$_POST['Nom'],'',$_POST['Email'],$pass_hache,'','','','','');
        //$user->AjouterCleint($Client);
    }
    else
    {
        require 'login/verficationemail.html';

    }
}



?>