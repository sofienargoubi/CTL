<?php
//include "../../config.php";
require '../include.php';
session_start();
if(!isset($_SESSION['mail']) ) {
    $_SESSION['page2'] = $_SERVER['REQUEST_URI'];
    header('location:login/login.html');
}
$Titre="Produit Specifique";
require 'header.php';
?>
<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>My Request</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.html">Home</a>
                        </li>
                        <li>My Request</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area Start -->
<!-- My Account Area Start -->
<div class="my-account-area section-padding">
    <div class="container">
        <div class="section-title2">
            <h2>Proceed to send a request</h2>
            <p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
        </div>
        <div class="row">
            <div class="addresses-lists">


                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="coupon-info">

                            <p class="coupon-text">Here are the orders you've placed since your account was created.</p>
                            <div class="order-history">
                                <p class="alert">You have not placed any orders.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="coupon-info">
                        <h1 class="heading-title">Order history </h1>
                        <p class="coupon-text">Here are the orders you've placed since your account was created.</p>
                        <div class="order-history">
                            <p class="alert">You have not placed any orders.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="anel-body">
                <div class="coupon-info">
                    <h1 class="heading-title">Your Request </h1>
                    <p class="coupon-text">To add a new request, please fill out the form below.</p>
                    <p class="required">*Required field</p>
                    <form action="ajouter_produit_specifique.php" method="post">
                        <p class="form-row">
                            <input type="text" placeholder="Titre de Livre *" required name="titre" id="book" >

                        </p>
                        <p id="a"></p>
                        <p class="form-row">
                            <input type="text" required placeholder="auteur *" name="auteur" id="author">
                        </p>
                        <p id="a1"></p>

                        <p id="a2"></p>

                        <div class="shop-select">
                            <label>Category<span class="required">*</span></label>
                            <select name="categorie" required id="cat">
                                <option value="Roman">Roman</option>
                                <option value="Bande dessinee">Bande dessinee</option>
                                <option value="Roman-amour">Roman d'amour</option>
                                <option value="Fantastique">Fantastique</option>
                                <option value="Science-fiction">Science-fiction</option>

                            </select>
                        </div>
                        <p id="a4"></p>



                        <p class="required">** You must fill the whole field.</p>
                        <p class="form-row order-notes">
                            <textarea placeholder="Autre information" name="autre" ></textarea>
                        </p>
                        <button type="button" class="btn btn-default"  name="bt" data-toggle="modal" data-target="#confirmation" data-toggle="modal" data-target="#myModal" title="Repondre"> Envoyer                                                           <i class="zmdi zmdi-mail-send"></i>
                        </button>
                        <div id="confirmation" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">



                                    <form method="post" action="ajouter_produit_specifique.php">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="delete_id" value="seession">
                                                <div class="alert alert-warning">vous voulez envoyer demande de prduit specifique  <strong>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="ajouter" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="create-account-button pull-left">
                    <a href="index.php"  title="Home">
                <span>
                  <i class="fa fa-chevron-left"></i>
                    Home
                </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Area End -->
<!-- Footer Area Start -->
<?php require "footer.php"?>
<!-- Footer Area End -->

<!-- all js here -->
<!-- jquery latest version -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="js/owl.carousel.min.js"></script>
<!-- jquery-ui js -->
<script src="js/jquery-ui.min.js"></script>
<!-- jquery Counterup js -->
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<!-- jquery countdown js -->
<script src="js/jquery.countdown.min.js"></script>
<!-- jquery countdown js -->
<script type="text/javascript" src="venobox/venobox.min.js"></script>
<!-- jquery Meanmenu js -->
<script src="js/jquery.meanmenu.js"></script>
<!-- wow js -->
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!-- scrollUp JS -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- plugins js -->
<script src="js/plugins.js"></script>
<!-- Nivo slider js -->
<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="lib/home.js" type="text/javascript"></script>
<!-- main js -->
<script src="js/main.js"></script>
<script src="demande_produit.js"></script>
</body>
</html>
