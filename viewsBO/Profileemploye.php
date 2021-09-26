<?php 
session_start();
/*
include "../core/Users.php";*/
include '../include.php';
$client=new Users() ;
$recl=new ReclamationC();
$prod=new produit_specifiqueC();
$Tabclient=$client->afficher($_SESSION['role'],$_SESSION['id']);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    


  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Mon profil</title>

  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main CSS-->
    <link href="theme.css" rel="stylesheet" media="all">
     <link href="profile/cssprofile.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        
        <!-- MENU SIDEBAR-->
        <?php require 'aside.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php require 'header.php';?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                               <div class="container">
                                 <div class="row">
                                   <div class="col-md-7 ">
                                     <div class="panel panel-default">
                                        <div class="panel-heading"><h4 >Votre Profil</h4></div>
                                          <div class="panel-body">
                                            <div class="box box-info">
                                             <div class="box-body">
                                              <div class="col-sm-6">
                                             <div  align="center"> <label for="profile-image-upload"><img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                </label>
                <input id="profile-image-upload" class="hidden" type="file">

<div style="color:#999;">click here to change profile image</div>
                <!--Upload Image Js And Css-->
           
              
   
                
                
                     <script type="text/javascript">
  $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-responsive').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".hidden").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".hidden").click();
    });
});
</script>
                     
                     </div>
              <br>
                <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?= $_SESSION['Nom']?></h4></span>
              <span><p><?= $_SESSION['role']?></p></span>            
            </div>
            <?php foreach ($Tabclient as $row): ?>
             <form action="modifierE.php?id=<?=$row['ID'];?>" method="POST">   
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 title " >Nom complet:</div><div class="col-sm-7 col-xs-6 "><input type="text" name="Nom" value="<?=$row['Nom']?>"></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Email:</div><div class="col-sm-7"><input type="email" name="Email" value="<?=$row['Email']?>"></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Date de naissance:</div><div class="col-sm-7"><input type="date" name="Datedenaissance" value="<?=$row['DateDeNaissance']?>"></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Numero de telephone:</div><div class="col-sm-7"><input type="Numero" name="Numerotelephone" value="<?=$row['NumeroTelephone']?>"> </div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Adresse:</div><div class="col-sm-7"><input type="text" name="Adresse" value="<?=$row['Adresse']?>"></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 title " >Ville:</div><div class="col-sm-7"><input type="text" name="Ville" value="<?=$row['Ville']?>"></div>
<div class="card-body">
  <button name="modifier" type="submit" class="btn btn-outline-secondary btn-lg btn-block">Modifier</button>
  </div>    
<?php endforeach;?> 
</form>
           
          </div>
        </div>
       
            
    </div> 
    </div>
</div>  
    <script>
$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-circle img-responsive').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".hidden").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".hidden").click();
    });
});  
              </script>  
                               </div>
                              </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
