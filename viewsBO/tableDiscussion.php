<?php
/*
require "../config.php";
require '../core/livretFunction.php';
*/
require '../include.php';
session_start();
$_SESSION["page"]=$_SERVER['REQUEST_URI'];
$livretF=new livretF();
$sujetF=new SujetF();
$DB = new config();
$recl=new ReclamationC();
$prod=new produit_specifiqueC();
$listeProduit_sp = $prod->afficher_Produit_specifique();
$listeProduit_sp2 = $prod->afficher_Produit_specifique_traiter();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tables</title>

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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php require 'aside.php';?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php require 'header.php';?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Sujets</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Créateur</th>
                                                <th>Genre</th>
                                                <th>Date</th>
                                                <th>Texte</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $liste=$sujetF->afficherSujetss(); foreach($liste as $row): ?>
                                            <tr class="tr-shadow">
                                                <td><?php $titre=$row['ID'];
                                                $t=$row['Titre'];
                                                echo "<a href=\"table2.php?Titre_post=$titre&nom=$t\">$t</a>";?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row['Createur']; ?></span>
                                                </td>
                                                <td><?php echo $row['Genre'];?></td>
                                                <td><?php echo $row['Date'];?></td>
                                                <td><?php echo $row['Texte'];?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <?php 
                                                        
                                                        echo "<a href=\"SupprimerSujet.php?Titre_post=$titre\"><button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                                                            <i class=\"zmdi zmdi-delete\"></i>
                                                        </button></a>"?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            </tr>
                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Livres Téléchargeables</h3>
                                                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#m">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                    </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $list2=$livretF->afficherLivresT();?>
                                            <?php foreach($list2 as $row): ?>
                                            <tr class="tr-shadow">
                                                <td class="desc"><?php echo $row['Titre'];?></td>
                                                <td><?php echo $row['Description'];?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <?php $titre=$row['Titre'];
                                                        $desc=$row['Description'];
                                                        $id=$row['ID'];?>
                                                        
                                                        <button class="item" data-toggle="modal" data-target="#s<?php echo $row['ID']; ?>" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        <?php
                                                        echo "<a href=\"SupprimerLivreT.php?Titre=$titre\"><button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                                                            <i class=\"zmdi zmdi-delete\"></i>
                                                        </button></a>"?>
                                                    </div>
                                                </td>

                                            </tr>
                                                                                
                                            <tr class="spacer"></tr>
                                            </tr>
                                           <div id="s<?php echo $row['ID']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modifier Livre</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="login-form">
                                                           <form action="ModificationLivre.php" method="get">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Titre</label>
                                                <input id="cc-pament" name="cc-payment2" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row['Titre'] ?>" disabled>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Description</label>
                                            <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                                                <input id="cc-name" name="cc-name2" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $row['Description'] ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Modifier</span>
                                                </button>
                                            </div>
                                        </form>

                                                    </div>

                                                </div>

                                            </div>
                                            <!--end of model -->
                                        </div>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2019 Tech Army. Tous droits réservés.</p>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
      

    </div>
    <div id="m" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un Livre</h4>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <form action="AjouterLivreT.php" name="modiflivre" method="get" >
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Titre</label>
                                                <input id="cc-pament" name="cc-payment" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Description</label>
                                                <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button type="submit" name="save" class="au-btn au-btn--block au-btn--green m-b-20">Ajouter
                                                        </button>
                                            </div>
                                        </form>
                    </div>

                </div>

            </div>
            <!--end of model -->
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