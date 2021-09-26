<?php
require '../../include.php';
$user= new Users();
session_start();
$code="123456789AZERTYUIOPQSDFGHJKLMWXCVBN";

   if( isset($_POST['inscription'])) {
       $_SESSION['code']=substr(str_shuffle($code),0,4);
        $_SESSION['Nom']=$_POST['Nom'];
        $_SESSION['mail']=$_POST['Email'];
        $_SESSION['mdp']=$_POST['MotDePasse'];
        $header='From:"CLT"<mtf244@gmail.com>';
       mail($_POST['Email'], "Confiramtion", $_SESSION['code'],$header);

       require 'verficationemail.html';


   }

   else if(isset($_POST['confrmationmail'])){
      if ($_SESSION['code']==$_POST['code'])
      {
           $pass_hache=password_hash($_SESSION['mdp'], PASSWORD_DEFAULT);
          $Client=new User("",$_SESSION['Nom'],"",$_SESSION['mail'], $pass_hache,"","","","","Client");
          $user->ajouterClient($Client);
        header("location:login.html");
      }
      else
      {
          require 'verficationemail.html';

      }
    }



?>