<?php
session_start();
if(!isset($_SESSION['Nom'])) {
    $_SESSION['page2']=$_SERVER['REQUEST_URI'];
    header('location:login/login.html');
}
require '../include.php';
//require '../cores/panierC.php';

$panierC=new PanierC();
$DB = new config();
$Titre="Checkout";
require 'header.php';
?>

<!--Header Area End-->
<!-- Mobile Menu Start -->

<!-- Mobile Menu End -->
<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>Checkout List</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.php">Home</a>
                        </li>
                        <li>Checkout List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area Start -->
<!-- Check Out Area Start -->
<div class="check-out-area section-padding">

    <div class="container">
        <div class="row">
            <form action="AjouterCommande.php" method="post" id=Commande_form>
                <div class="col-md-8">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>1</span>
                                        Billing Information
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

                                <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="nom" id="form_firstname" placeholder="First Name *"><span class="error_form" id="firstname_error_message"></span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="prenom" id="form_lastname" placeholder="Last Name *" ><span class="error_form" id="lastname_error_message"></span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="as" id="form_street" placeholder="Street address *" ><span class="error_form" id="street_error_message"></span>

                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="cty" id="form_city" placeholder="Town/City *" ><span class="error_form" id="city_error_message"></span>

                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="ctry" id="form_country" placeholder="State/Country *" ><span class="error_form" id="country_error_message"></span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="cp" id="form_cp" placeholder="Code Postal *" ><span class="error_form" id="cp_error_message"></span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="email" id="form_mail" placeholder="Mail Adress *" ><span class="error_form" id="mail_error_message"></span>

                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="form-row">
                                                <input type="text" class="form_text" name="ph" id="form_phone" placeholder="phone *" ><span class="error_form" id="phone_error_message"></span>

                                            </p>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span>2</span>
                                        Shopping Method
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body no-padding">

                                    <div class="payment-met">

                                        <ul class="form-list">
                                            <li class="control">
                                                <input type="radio" name="payment" id="form_livraison" value="Par Poste">
                                                <label for="form_livraison">Livraison Par Poste </label>
                                            </li>
                                            <li class="control">
                                                <input type="radio" name="payment" id="form_livraison1" value="FedEx">
                                                <label for="form_livraison">Livraison FedEx </label>
                                            </li>
                                            <li class="control">
                                                <input type="radio" name="payment" id="form_livraison2" value="Hexa">
                                                <label for="form_livraison">Livraison Hexa </label>
                                            </li>
                                        </ul>
                                        <span class="error_form" id="livraison_error_message"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <span>3</span>
                                        Order Review
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body no-padding">
                                    <div class="order-review" id="checkout-review">
                                        <div class="table-responsive" id="checkout-review-table-wrapper">
                                            <table class="data-table" id="checkout-review-table">

                                                <thead>
                                                <tr>
                                                    <th rowspan="1">Product Name</th>
                                                    <th colspan="1">Price</th>
                                                    <th rowspan="1">Qty</th>
                                                    <th colspan="1">Subtotal</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                $total = 0;
                                                $subtotal=0;
                                                if(!empty($_SESSION["cart"]))
                                                {
                                                    foreach($_SESSION["cart"] as $keys => $values)
                                                    {
                                                        $total = $total + ($values['qty'] * $values['prix']);
                                                        $subtotal = $subtotal +  $values['prix'];

                                                        ?>
                                                        <tbody>

                                                        <tr>
                                                            <td><h3 class="product-name"><?= $values['nom'] ;?></h3></td>
                                                            <td><span class="cart-price"><span class="check-price"><?= $values['prix'] ;?></span></span></td>
                                                            <td><?= $values['qty'] ;?></td>
                                                            <!-- sub total starts here -->
                                                            <td><span class="cart-price"><span class="check-price"><?= $values['prix']*$values['qty']  ;?></span></span></td>
                                                        </tr>

                                                        </tbody>
                                                    <?php }} ?>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="3">Subtotal</td>
                                                    <td><span class="check-price"><?= $subtotal ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><strong>Grand Total</strong></td>
                                                    <td><strong><span class="check-price"><?= $total ?></span></strong></td>
                                                </tr>
                                                </tfoot>

                                            </table>
                                        </div>
                                        <div id="checkout-review-submit">
                                            <div class="cart-btn-3" id="review-buttons-container">
                                                <p class="left">Forgot an Item? <a href="cart.php">Edit Your Cart</a></p>
                                                <button type="submit"  name="place_order" value="ok" title="Place Order" class="btn btn-default"><span>Place Order</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-3">
                    <div class="checkout-widget">
                        <h2 class="widget-title">YOUR CHECKOUT PROGRESS</h2>
                        <ul>
                            <li><a href="#"><i class="fa fa-minus"></i> Billing Address</a></li>
                            <li><a href="#"><i class="fa fa-minus"></i> Shipping Method</a></li>
                            <li><a href="#"><i class="fa fa-minus"></i> Order Review </a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- Check Out Area End -->
<!-- Our Team Area Start -->
<div class="our-team-area">
    <h2 class="section-title">OUR WRITER</h2>
    <div class="container">
        <div class="row">
            <div class="team-list indicator-style">
                <div class="col-md-3">
                    <div class="single-team-member">
                        <a href="#">
                            <img src="img/about/team/1.jpg" alt="">
                        </a>
                        <div class="member-info">
                            <a href="#">rokan tech</a>
                            <p>WRITER</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-team-member">
                        <a href="#">
                            <img src="img/about/team/2.jpg" alt="">
                        </a>
                        <div class="member-info">
                            <a href="#">mirinda</a>
                            <p>AUTHOR</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-team-member">
                        <a href="#">
                            <img src="img/about/team/3.jpg" alt="">
                        </a>
                        <div class="member-info">
                            <a href="#">jone doe</a>
                            <p>WRITER</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-team-member">
                        <a href="#">
                            <img src="img/about/team/4.jpg" alt="">
                        </a>
                        <div class="member-info">
                            <a href="#">nick kon</a>
                            <p>WRITER</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-team-member">
                        <a href="#">
                            <img src="img/about/team/2.jpg" alt="">
                        </a>
                        <div class="member-info">
                            <a href="#">mirinda</a>
                            <p>AUTHOR</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-team-member">
                        <a href="#">
                            <img src="img/about/team/1.jpg" alt="">
                        </a>
                        <div class="member-info">
                            <a href="#">rokan tech</a>
                            <p>WRITER</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Team Area End -->
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
</body>
</html>