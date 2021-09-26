<?php 
session_start();

require '../include.php';
$client=new Users() ;
$Tabclient=$client->afficherusers();
$recl=new ReclamationC();
$prod=new produit_specifiqueC();
$listeProduit_sp = $prod->afficher_Produit_specifique();
$listeProduit_sp2 = $prod->afficher_Produit_specifique_traiter();
/*if (isset($_POST['rechercher']))
{
    $Tabemploye=$Employee1->recupererEmploye($_POST['search']);
}
if (isset($_POST['trier']))
{
    $Tabemploye=$Employee1-> trierEmploye();
}*/
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
    <title>Tableau des utilisateurs</title>

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
    <link href="theme.css" rel="stylesheet" media="all">

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
                        <div class="row">
                        	<div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                       
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="filtrage" onchange="sort(this.value)">
                                                <option selected="selected">Users</option>
                                                <option value="role">Par Role</option>
                                                <option value="nom">Par Nom</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#m" data-toggle="modal" data-target="#myModal" title="Repondre">
                                            <i class="zmdi zmdi-plus"></i>Ajouter un employe</button>
                                       
                                    </div>
                                </div>
                                <div id="abc" class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($Tabclient as $row):?>
                                        
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td><?=$row['Nom']?></td>
                                                <td>
                                                    <span class="block-email"><?=$row['Email']?></span>
                                                </td>
                                                <td><?php if ($row['Role']=='Client'){?>
                                                    <span class="role member"><?=$row['Role']?></span>
                                                <?php } else if ($row['Role']=='Admin'){?>
                                                <span class="role admin"><?=$row['Role']?></span>
                                            <?php } else{ ?>
                                                <span class="role user"><?=$row['Role']?></span>
                                            <?php }?>

                                                </td>
                                                
                                                <td> 
                                                    <form action="supprimer.php?id=<?=$row['ID']?>" method="post">
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                            
                                                        <button name="supprimer" class="item" data-toggle="tooltip" data-placement="top"  title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                                </td>
                                                <div id="m" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ajouter un employe</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                           <div class="login-form">
                            <form action="AjouterE.php" method="post">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" name="Cin" placeholder="CIN..">
                                </div>
                                   <div class="form-group">
                                    <input class="au-input au-input--full" type="text" name="Nom" placeholder="Nom complet..">
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="email" name="Email" placeholder="Email..">
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" name="Numerotelephone" placeholder="Numero de telephone..">
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" name="Adresse" placeholder="Adresse..">
                                </div>
                                <div class="form-group">
                                    <select name="Role">
                                        <option value="Admin">Admin</option>
                                        <option value="EmployeC" >EmployeC</option>
                                        <option value="EmployeP" >EmployeP</option>
                                        <option value="EmployeS" >EmployeS</option>
                                        <option value="EmployeD" >EmployeD</option>
                                        <option value="EmployeE" >EmployeE</option>

                                    </select>
                                </div>
    
                                
                                
                                <button name="Ajouter" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Ajouter</button>
                            </form>
                           
                        </div>

                                                        </div>

                                                    </div>
                                                   <!--end of model -->
                                                </div>
                                            </div>
                                            </tr>
                                           
                                        </tbody>
                                    <?php endforeach; ?>
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

    </div>
     <script>
        function sort(id)
        {
            $.ajax({
                url: "tableClient_trie.php",
                data:{data: id},
                type: "POST",
                success: function(data){
                    $('#abc').html(data);
                },
                failure: function(data){
                    $('#abc').html(data);
                }
            });
        }


        function showCustomer(str) {

            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("abc").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "Recherchuser.php?q="+str, true);

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
