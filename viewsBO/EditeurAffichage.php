<?php
require '../include.php';
session_start();

$recl=new ReclamationC();
$prod=new produit_specifiqueC();


$editeur=new EditeurC();
$liste=$editeur->afficherEditeur();
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
    <title>gestion des livres</title>

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

    <!-- MENU SIDEBAR-->
    <?php require 'aside.php';?>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <?php require 'header.php';?>
        <!-- END HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="container-fluid">
                <div class="row"> </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">Nos Editeur</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">

                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="time">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#m" title="Repondre">
                                    <i class="zmdi zmdi-plus"></i>Ajouter Auteur</button>
                            </div>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select id="pdff" onchange="pdff()" class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option selected="selected">PDF</option>

                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table id="pdf" class="table table-data2">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Informations</th>
                                    <th>Livres</th>
                                    <th>e-mail</th>
                                    <th>Telephone</th>
                                    <th>Adresse</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php


                                $liste=$editeur->afficherEditeur();
                                foreach ($liste as $row) {
                                ?>
                                <tr class="tr-shadow">

                                    <td><?php echo $row['nomMaison']; ?></td>

                                    <td><?php echo $row['informations']; ?></td>
                                    <td class="desc"><?php echo $row['livres']; ?></td>
                                    <td>
                                        <?php echo $row['mail']; ?>
                                    </td>
                                    <td><?php echo $row['telephone']; ?></td>
                                    <td><?php echo $row['adresse']; ?></td>
                                    <td>
                                        <div class="table-data-feature">

                                            <button class="item"  data-toggle="modal" data-target="#s<?php echo $row['id']; ?>" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <a href="supprimerEditeur.php?id=<?php echo $row['id']; ?>">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button></a>

                                        </div>

                                    </td>
                                </tr>

                                <tr class="spacer"></tr>
                                <tr class="spacer"></tr>
                                <tr class="spacer"></tr>
                                <!-- Promo Ajouter -->

                                <!--end of model -->
                        </div>
                        <div id="s<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modifier Livre</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="login-form">
                                            <form action="modifierEditeur.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit=" return VerifForm()">

                                                <input type="hidden" id="id" name="id" placeholder="id" class="form-control" value="<?php echo $row['id']; ?>">

                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="email-input" class=" form-control-label">Taper Nom </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="titre" name="nom" placeholder="Nom.." class="form-control" value="<?php echo $row['nomMaison']; ?>">
                                                        <small id="titre_error" class="help-block form-text"></small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Taper Description</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea type="text" id="info" name="info" placeholder="Description..." class="form-control"><?php echo $row['informations']; ?></textarea>
                                                        <small id="prix_error" class="help-block form-text"></small>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Taper Livre </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="livres" name="livres" placeholder="Livre.." class="form-control" value="<?php echo $row['livres']; ?>">
                                                        <small id="name_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Taper Mail  </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="mail" name="mail" placeholder="mail.." class="form-control" value="<?php echo $row['mail']; ?>">
                                                        <small id="name_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Taper Telephone </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="telephone" name="telephone" placeholder="telephone.." class="form-control" value="<?php echo $row['telephone']; ?>">
                                                        <small id="name_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Taper Adresse </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="adresse" name="adresse" placeholder="Adresse.." class="form-control" value="<?php echo $row['adresse']; ?>">
                                                        <small id="name_error" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="file-input" class=" form-control-label">Choisir image de cover</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="texte" id="cover" name="cover" class="form-control" value="<?php echo $row['image']; ?>" disabled>
                                                        <small id="cover_error" class="help-block form-text"></small>
                                                    </div>
                                                </div>
                                        </div>
                                        <button type="submit" name="save" class="au-btn au-btn--block au-btn--green m-b-20">Modifier
                                        </button>

                                        </form>

                                    </div>

                                </div>

                            </div>
                            <!--end of model -->
                        </div>
                    </div>
                    <?php } ?>
                    </tbody>
                    </table>
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
<div id="m" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter Editeur</h4>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form action="ajoutEditeur.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit=" return VerifForm()">

                        <input type="hidden" id="id" name="id" placeholder="id" class="form-control">

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label">Taper Nom</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nom" name="nom" placeholder="nom.." class="form-control">
                                <small id="titre_error" class="help-block form-text"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Taper Livre </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="livres"  name="livres" placeholder="Livre.." class="form-control">
                                <small id="name_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Taper mail </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="mail" name="mail" placeholder="mail.." class="form-control">
                                <small id="name_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Taper Telephone </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="telephone" name="telephone" placeholder="Telephone.." class="form-control">
                                <small id="name_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Taper Adresse </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="adresse" name="adresse" placeholder="Adresse.." class="form-control">
                                <small id="name_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password-input" class=" form-control-label">Taper Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea type="text" id="info"  rows="6" name="info" placeholder="Desciprition.." class="form-control"></textarea>
                                <small id="prix_error" class="help-block form-text"></small>
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
                <button type="submit" name="save" class="au-btn au-btn--block au-btn--green m-b-20">Submit
                </button>

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
<script >



    function pdff()
    {



        var b= document.getElementById("pdf");
        var s = new XMLSerializer();
        var c = s.serializeToString(b);

        console.log(c);

        $.ajax({
            type: "POST",
            url: "pdf/pdf.php",
            data:{ data: c},
        }).done(function( msg ) {
// alert( "Data Saved: " + msg );
        });
    }
</script>

</body>

</html>
<!-- end document-->
