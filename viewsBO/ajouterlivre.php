<?php
require '../include.php';
session_start();
$recl=new ReclamationC();
$prod=new produit_specifiqueC();
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
    <title>ajouter livre</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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
    <script type="text/javascript" language="javascript" src="controle.js"></script>
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
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6"> </div>
<div style="position: relative; left:-250px;"class="col-lg-6">
                <div class="card">
                                    <div class="card-header">
                                        <strong>Ajouter un livre</strong>
                                    </div>
                                    <div class="card-body card-block">

                                      <form action="ajouterl.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit=" return VerifForm()">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Taper le id du livre</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                  <input type="text" id="id" name="id" placeholder="id" class="form-control">
                                                    <small id="id_error" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Taper le titre</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="titre" name="titre" placeholder="Titre" class="form-control">
                                                    <small id="titre_error" class="help-block form-text"></small>
                                                </div>
                                            </div>
										  <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Taper le nom </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                  <input type="text" id="name" name="name" placeholder="nom" class="form-control">
                                                    <small id="name_error" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Taper le prix</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="prix" name="prix" placeholder="Prix" class="form-control">
                                                    <small id="prix_error" class="help-block form-text"></small>
                                                </div>
                                          </div>
<div class="row form-group">
                        <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Choisir la categorie</label>
                      </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="select" id="select" class="form-control">
                                                        <option value="bande dessiner">bande dessiner</option>
                                                        <option value="histoire">histoire</option>
                                                        <option value="documentaire">documentaire</option>
                                                        <option value="science-fiction">science-fiction</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row form-group">
                                          <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Choisir image de cover</label>
                                          </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="cover" name="cover" class="form-control">
                                                    <small id="cover_error" class="help-block form-text"></small>
                                          </div>
                                          </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="save" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                    </form>
              </div>
</div>

</div>

                    </div>
                </div>
            </div>
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
