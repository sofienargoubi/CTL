<?PHP
/*include "../cores/reclamationC.php";
include "../cores/produit_specifiqueC.php";
include "../config.php";*/

require '../include.php';
session_start();
$recl=new ReclamationC();
$prod=new produit_specifiqueC();
$listeReclamation = $recl->afficherReclamtion();
$listeReclamation2= $recl->afficherReclamtion_traiter();

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


    <!-- MENU SIDEBAR-->
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
                        <h3 class="title-5 m-b-35">data table</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">

                                <div class="rs-select2--light rs-select2--sm">



                                    <select class="js-select2" name="filtrage" onchange="sort(this.value),sort2(this.value)">
                                        <option selected="selected">reclamation</option>
                                        <option value="nom">Nom</option>
                                        <option value="id">Identifiant</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <i class="zmdi zmdi-filter-list"> Filtrage</i>






                            </div>

                        </div>

                        <div id="det" class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <th>id</th>
                                    <th>nom</th>
                                    <th>mail</th>
                                    <th>Message</th>
                                    <th>Traitement</th>


                                    <th></th>
                                </tr>
                                </thead>
                                <?php foreach($listeReclamation as $row):
                                ?>


                                <tbody>


                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td><?PHP echo $row['id']; ?></td>
                                    <td><?PHP echo $row['nom']; ?></td>
                                    <td><?PHP echo $row['mail']; ?></td>
                                    <td><?PHP echo $row['msg']; ?></td>
                                    <td><?PHP if($row['traitement']=='non')echo"<span class=\"status--denied\">non</span>";
                                        else echo"<span class=\"status--process\">oui</span>";?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button type="button" class="item"  name="bt" data-toggle="modal" data-target="#m<?PHP echo $row['id']; ?>" data-toggle="modal" data-target="#myModal" title="Repondre">                                                            <i class="zmdi zmdi-mail-send"></i>
                                            </button>

                                        </div>
                                    </td>


                                    <!-- Modal -->
                                    <div id="m<?PHP echo $row['id']; ?>" class="modal fade"role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                </div>
                                                <div class="modal-body">
                                                    <p>Repondre a la reclamation de <strong><?PHP echo $row['nom']; ?></strong>:</p>
                                                    <form method="post" action="trait.php">
                                                        <div class="form-group">
                                                            <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                                            <input type="hidden" name="mail" value="<?PHP echo $row['mail']; ?>">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">Message:</label>
                                                            <textarea class="form-control" id="message-text" name="msg"></textarea>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" name="envoyer">envoyer message</button>
                                                        </div>

                                                    </form>


                                                </div>

                                            </div>

                                        </div>
                                    </div>


                        </div>








                    </div>
                    </tr>
                    <tr class="spacer"></tr>

                    <?php       endforeach;?>
                    </tbody>

                    </table>

                </div>
            </div>
            <!-- END DATA TABLE -->



        </div>

    </div>
    <div class="col-md-12">

        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Reclamation tariter</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">


            </div>

            <div id="det2" class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>id</th>
                        <th>nom</th>
                        <th>mail</th>
                        <th>Message</th>
                        <th>Traitement</th>


                        <th></th>
                    </tr>
                    </thead>
                    <?php foreach($listeReclamation2 as $row):
                    ?>


                    <tbody>


                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td><?PHP echo $row['id']; ?></td>
                        <td><?PHP echo $row['nom']; ?></td>
                        <td><?PHP echo $row['mail']; ?></td>
                        <td><?PHP echo $row['msg']; ?></td>
                        <td><?PHP if($row['traitement']=='non')echo"<span class=\"status--denied\">non</span>";
                            else echo"<span class=\"status--process\">oui</span>";?></td>
                        <td>
                            <div class="table-data-feature">

                                <button class="item" data-toggle="modal" data-placement="top" title="Delete" data-target="#delete<?PHP echo $row['id']; ?>" data-toggle="modal" data-target="#myModal" title="Repondre">   >
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                        </td>










                        <!-- Modal -->
                        <div id="delete<?PHP echo $row['id']; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="supprimerReclamation.php">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Suppression</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="delete_id" value="<?PHP echo $row['id']; ?>">
                                                    <div class="alert alert-danger">vous voulez suprimer <strong>
                                                            <?php echo $row['nom']; ?>?</strong> </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>


            </div>
            </tr>
            <tr class="spacer"></tr>

            <?php       endforeach;?>
            </tbody>

            </table>

        </div>
    </div>
    <!-- END DATA TABLE -->



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
<script>
    function sort2(id)
    {
        $.ajax({
            url: "trie_reclamation_traiter.php",
            data:{data: id},
            type: "POST",
            success: function(data){
                $('#det2').html(data);
            },
            failure: function(data){
                $('#det2').html(data);
            }
        });
    }


    function showCustomer2(str) {

        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("det2").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "recherche_reclamation_traiter.php?q="+str, true);

        xhttp.send();
    }

</script>


<script>
    function sort(id)
    {
        $.ajax({
            url: "trii.php",
            data:{data: id},
            type: "POST",
            success: function(data){
                $('#det').html(data);
            },
            failure: function(data){
                $('#det').html(data);
            }
        });
    }


    function showCustomer(str) {

        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("det").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "recherc.php?q="+str, true);

        xhttp.send();
    }

</script>


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
