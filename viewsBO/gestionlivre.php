<?php
require '../include.php';
session_start();
$recl=new ReclamationC();
$prod=new produit_specifiqueC();

$promotion= new PromotionC();
$l=new livreC();
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
                                <h3 class="title-5 m-b-35">Produit</h3>
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
                                            <i class="zmdi zmdi-plus"></i>Ajouter Produit</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>nom Auteur</th>
                                            <th>categorie</th>
                                            <th>Prix</th>
                                            <th>Cover</th>
                                            <th>Promo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            $liste=$l->afficher();

                                        foreach ($liste as $row) {
                                            ?>
                                            <tr class="tr-shadow">

                                                <td><?php echo $row['titre']; ?></td>
                                                <td class="desc"><?php echo $row['nom_auteur']; ?></td>
                                                <td><?php echo $row['categorie']; ?></td>
                                                <td>
                                                    <?php echo $row['prix']; ?> Dt
                                                </td>
                                                <td><img style="width:99px; height: 127.5px" src="../viewsFO/<?php echo $row['cover']; ?>"></td>
                                                <td><?php $promo=$promotion->afficherPromotionprod($row['id']);
                                                    $p=$promo->fetch();
                                                    if(!empty($promo) && $p['id']==$row['id']){
                                                    ?>
                                                    <a href="supprimerpromo.php?id=<?=$row['id'] ?>"><span class="status--process" title="Supprimer Promo">en promotion</span></a>
<?php }else {?>
                                                    <span class="status--denied">hors promotion</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">

                                                            <button class="item"  data-toggle="modal" data-target="#s<?php echo $row['id']; ?>" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        <a href="supprimerl.php?id=<?php echo $row['id']; ?>">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button></a>
                                                        <button  name="more" class="item" data-toggle="modal" data-target="#promo<?php echo $row['id']; ?>" title="Promo">
                                                            <i class="fas fa-percent"></i>

                                                    </div>

                                                </td>
                                            </tr>

                                            <tr class="spacer"></tr>
                                            <tr class="spacer"></tr>
                                            <tr class="spacer"></tr>
                                        <!-- Promo Ajouter -->
                                        <div id="promo<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ajouter Promo</h4>
                                                    </div>
                                                    <form action="ajouterpromo.php" method="post">
                                                    <div class="modal-body">

<?php $promo=$promotion->afficherPromotionprod($row['id']);
$p=$promo->fetch(); ?>
                                                                <div class="row form-group">
                                                                    <div class="col-12 col-md-9">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                        <input type="hidden" name="prix" value="<?php echo $row['prix']; ?>">
                                                                        <input type="texte" name="promotion" placeholder="Pourcentage" class="form-control" value="<?php echo $p['Pourcentage'] ?>">
                                                                        <small id="cover_error" class="help-block form-text"></small>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <button type="submit" name="save" class="au-btn au-btn--block au-btn--green m-b-20">Ajouter/Modifier
                                                        </button>
                                                    </form>


                                                    </div>

                                                </div>

                                            </div>
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
                                                            <form action="modifierl.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit=" return VerifForm()">

                                                                <input type="hidden" id="id" name="id" placeholder="id" class="form-control" value="<?php echo $row['id']; ?>">

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3">
                                                                        <label for="email-input" class=" form-control-label">Taper le titre</label>
                                                                    </div>
                                                                    <div class="col-12 col-md-9">
                                                                        <input type="text" id="titre" name="titre" placeholder="Titre" class="form-control" value="<?php echo $row['titre']; ?>">
                                                                        <small id="titre_error" class="help-block form-text"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3">
                                                                        <label for="text-input" class=" form-control-label">Taper le nom </label>
                                                                    </div>
                                                                    <div class="col-12 col-md-9">
                                                                        <input type="text" id="name" name="name" placeholder="nom" class="form-control" value="<?php echo $row['nom_auteur']; ?>">
                                                                        <small id="name_error" class="form-text text-muted"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3">
                                                                        <label for="password-input" class=" form-control-label">Taper le prix</label>
                                                                    </div>
                                                                    <div class="col-12 col-md-9">
                                                                        <input type="text" id="prix" name="prix" placeholder="Prix" class="form-control" value="<?php echo $row['prix']; ?>">
                                                                        <small id="prix_error" class="help-block form-text"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3">
                                                                        <label for="select" class=" form-control-label">Choisir la categorie</label>
                                                                    </div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="select" id="select" class="form-control" disabled>
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
                                                                        <input type="texte" id="cover" name="cover" class="form-control" value="<?php echo $row['cover']; ?>" disabled>
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

                        <div class="row m-t-30"> </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright ?? 2019 Tech Army. Tous droits r??serv??s.</p>
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
                        <form action="ajouterl.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit=" return VerifForm()">

                                    <input type="hidden" id="id" name="id" placeholder="id" class="form-control">

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

</body>

</html>
<!-- end document-->
