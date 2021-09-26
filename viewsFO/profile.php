<?php 
require '../include.php';
session_start();
$Client=new Users() ;
$_SESSION['page2'] = $_SERVER['REQUEST_URI'];
$fav=new FavorieC();
$commande=new CommandeC();
$promotion= new PromotionC();
$clients=$Client->afficher($_SESSION['role'],$_SESSION['id']);
 $Titre="Profile";
 require 'header.php';
?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



<script  src="commande/js/index.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


<link rel="stylesheet" href="commande/css/style.css">
		<!-- Mobile Menu End -->
        <!-- Breadcrumbs Area Start -->
       <!-- <div class="breadcrumbs-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					    <div class="breadcrumbs">
					       <h2>My Account</h2> 
					       <ul class="breadcrumbs-list">
						        <li>
						            <a title="Return to Home" href="index.html">Home</a>
						        </li>
						        <li>My Account</li>
						    </ul>
					    </div>
					</div>
				</div>
			</div>
		</div>-->
		<!-- Breadcrumbs Area Start -->
		<!-- My Account Area Start -->
		<div class="my-account-area section-padding">
			<div class="container">
				<div class="section-title2">
					<p><h2>Bienvenue <?= $_SESSION['Nom'] ?> sur votre compte
                        </h2></p><br>
				</div>
			<div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-heart"></i>
                        Favoris
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#friends">
                        <i class="blue ace-icon fa fa-clipboard"></i>
                        Mes commandes
                    </a>
                </li>

            </ul>

            <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 center">
                            <span class="profile-picture">
                    <label for="imagepro">    <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="http://bootdey.com/img/Content/avatar/avatar6.png"></label>
                            </span>
                            <input type="file" name="" id="imagepro" class="hidden">

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


                            <div class="space space-4"></div>

                            
                        </div><!-- /.col -->
<?php foreach ($clients as $row):?>
    <form action="modifierC.php?id=<?=$row['ID'];?>" method="POST">
                        <div class="col-xs-12 col-sm-9">
                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Nom</div>

                                    <div class="profile-info-value">
                                        <span><input type="text" name="Nom" value="<?= $row['Nom']?>" class=""></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">Email</div>

                                    <div class="profile-info-value">
                                        
                                        <span><input type="email" name="Email" value="<?= $row['Email']?>" class=""></span>
                                       
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">Date</div>

                                    <div class="profile-info-value">
                                        <span><input type="Date" name="Datedenaissance" value="<?= $row['DateDeNaissance']?>" class=""></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">Telephone</div>

                                    <div class="profile-info-value">
                                        <span><input type="text" name="Numerotelephone" value="<?= $row['NumeroTelephone']?>" class=""></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">Adresse</div>
                                      
                                    <div class="profile-info-value">
                                        <span><input type="text" name="Adresse" value="<?= $row['Adresse']?>" class=""></span>
                                    </div>
                                </div>
                            </div>

                            <div class="hr hr-8 dotted"></div>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Ville</div>

                                    <div class="profile-info-value">
                                        <span><input type="text" name="Ville" value="<?= $row['Ville']?>" class=""></span>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Code postale</div>

                                    <div class="profile-info-value">
                                        <span><input type="text" name="Codepostale" value="<?= $row['CodePostale']?>" class=""></span>
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                                                        <label>
                                                            <span><input type="checkbox" name="newsletter"/></span>
                                                            Inscrivez-vous à notre newsletter!
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <span><input type="checkbox" name="sujet"/></span>
                                                            Recevez Notification Par mail!
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <span><input type="checkbox" /></span>
                                                            Recevez Notification Par SMS!
                                                        </label>
                                                    </div>
                            <div class="profile-info-value">
                            <button class="btn btn-search btn-small" type="submit" name="modifier">Modifier</button>
                        </div>
                        </div>
                        </form>
                        <?php endforeach;?><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-20"></div>

                    
                </div><!-- /#home -->

                <div id="feed" class="tab-pane">
                    <div class="profile-feed row">



                        <?php $list=$fav->VerifUser($_SESSION['id']);
                        $v=$list->fetch();

                        if(empty($v)){
                            ?>

                            <h1 style="margin-left: 450px;margin-top: 100px">Empty...</h1>
                            <?php

                        } else{


                        ?>

                                <div class="shop-single-product-area">
                                  <?php  $liste=$fav->afficher($_SESSION['id']);
                                    foreach ($liste as $row){ ?>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="single-banner">
                                                <div class="product-wrapper">
                                                    <a href="single-product.php?id=<?php echo $row['id']; ?>" class="single-banner-image-wrapper">
                                                        <img alt="" src=
                                                        <?php echo $row['cover']; ?>
                                                        >
                                                        <div class="price">
                                                            <?php
                                                            $promo=$promotion->afficherPromotionprod($row['id']);
                                                            $p=$promo->fetch();
                                                            if(!empty($promo) && $p['id']==$row['id']){

                                                                ?>
                                                                <strike> <?php echo $p['Prix_ancien']; ?><span>DT</span></strike><br>
                                                                <?php echo $p['Prix_nouveau']; ?><span>DT</span>
                                                            <?php } else
                                                            { ?>
                                                                <?php echo $row['prix']; ?><span>DT</span>

                                                            <?php }?>
                                                        </div>
                                                    </a>
                                                    <div class="product-description">
                                                        <div class="functional-buttons">
                                                            <a href="AjouterProduit.php?id=<?php echo $row['id']; ?>" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                            <a href="AjouterProduitFavorie.php?action=delete&id=<?php echo $row['id']; ?>">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                            <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal<?php echo $row['id']; ?>">
                                                                <i class="fa fa-compress"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    <div class="banner-bottom-title">
                                                        <a href="single-product.php?id=<?php echo $row['id']; ?>"><?php echo $row['titre']; ?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="quickview-wrapper">
                                            <!-- Modal -->
                                            <div class="modal fade" id="productModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-product">
                                                                <div class="product-images">
                                                                    <div class="main-image images">
                                                                        <img alt="" src=<?php echo $row['cover']; ?> >
                                                                    </div>
                                                                </div>
                                                                <div class="product-info">
                                                                    <h1><?php echo $row['titre']; ?></h1>
                                                                    <div class="price-box">
                                                                        <p class="s-price"><span class="special-price"><span class="amount" ><?php
                                                                                    $promo=$promotion->afficherPromotionprod($row['id']);
                                                                                    $p=$promo->fetch();
                                                                                    if(!empty($promo) && $p['id']==$row['id']){

                                                                                        ?>
                                                                                        <strike>Ancien Prix: <?php echo $p['Prix_ancien'] ?> DT</strike><br>
                                                                                        Nouveau Prix: <?php echo $p['Prix_nouveau'] ?> DT
                                                                                    <?php } else
                                                                                    { ?>
                                                                                        Prix: <?php echo $row['prix'] ?> DT

                                                                                    <?php }?></span></span></p>
                                                                    </div>
                                                                    <a href="single-product.php?id=<?php echo $row['id']; ?>" class="see-all">See all features</a>
                                                                    <div class="quick-add-to-cart">
                                                                        <form method="post" class="cart">
                                                                            <div class="numbers-row">
                                                                                <input type="number" id="french-hens" value="3">
                                                                            </div>
                                                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="quick-desc">
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                                                    </div>
                                                                    <div class="social-sharing">
                                                                        <div class="widget widget_socialsharing_widget">
                                                                            <h3 class="widget-title-modal">Share this product</h3>
                                                                            <ul class="social-icons">
                                                                                <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                                                                <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                                                                <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                                                                <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                                                                <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .product-info -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
  <?php }?>


                        <!--end-->


                    </div><!-- /.row -->

                    <div class="space-12"></div>

                    <div class="hr hr10 hr-double"></div>

                </div><!-- /#feed -->

                <div id="friends" class="tab-pane">
                    <div class="profile-users clearfix">


                        <?php $list=$commande->Verif($_SESSION['id']);
                        $v=$list->fetch();

                        if(empty($v)){
                            ?>

                            <h1 style="margin-left: 450px;margin-top: 100px">Empty...</h1>
                            <?php

                        } else{


                        ?>

                        <table class="rules">

                            <thead>
                            <tr>
                                <th class="date">
                                    Date
                                </th>
                                <th>
                                    Statut
                                </th>
                                <th >
                                   Facture
                                </th>
                                <th>
                                    Prix
                                </th>
                                <th class="last">
                                    Remove
                                </th>
                            </tr>
                            </thead>
                            <?php $list=$commande->afficherCommandespecific($_SESSION['id']);
                            foreach($list as $row):
                                $total=0;?>
                            <tbody>
                            <tr class="record">
                                <td class="rating">
                                    <?= $row['Date_Creation'] ?>
                                </td>
                                <td >
                                    <?= $row['Etat_Commande'] ?>
                                </td>
                                <td class="date">
                                    <div>
                                        <?php if( $row['Etat_Commande']=="Valid"){?>
                                            <form action="facture.php?id=<?= $row['ID_Commande'] ?>" method="post">
                                                <button type="submit" name="facture" style="font-size:20px;color:darkred"><i class="fa fa-file-pdf-o"></i></button>
                                            </form>
                                        <?php }else
                                        { ?>
                                            <span><button style="font-size:20px"><i class="fa fa-file-pdf-o"></i></button></span>

                                        <?php }?>
                                    </div>

                                </td>
                                <td>
                                    <?php $produit=$commande->afficherFacture($row['ID_Commande']);
                                    $total=$produit->fetch();
                                   echo $total['Qty_Produit']*$total['Prix_Produit']?>TND
                                </td>
                                <td class="product-remove" >
                                    <a href="SupprimerCommande.php?id=<?= $row['ID_Commande'] ?>">
                                        <i class="flaticon-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="companion">
                                <td class="output" colspan="7">
                                    <p>
                                        <h4 style="color: brown">Produit Commande:</h4>
                                    <?php $produit=$commande->afficherFacture($row['ID_Commande']);
                                    $total=0;
                                    foreach($produit as $fac){
                                        $total+=$fac['Qty_Produit']*$fac['Prix_Produit'] ;
                                        ?>

                                        <h5 style="color: black;padding-left: 100px"">-<?= $fac['Nom_Produit'] ?>    x<?= $fac['Qty_Produit']   ?> Prix:<?= $fac['Prix_Produit']   ?>TND</h5>
                                    <?php } ?>
                                    <h4 style="color: brown">Adresse:</h4>
                                    <?php $adresse=$commande->afficherdetailcommande($row['ID_Commande']);
                                    foreach($adresse as $ad){

                                        ?>
                                        <span style="color: black;width: 100px;height: 100px;padding-left: 100px"><?= $ad['Nom']?><?= $ad['Prenom']?></span><br>
                                        <span style="color: black;width: 100px;height: 100px;padding-left: 100px"> <?= $ad['Email']?> </span><br>
                                        <span style="color: black;width: 100px;height: 100px;padding-left: 100px"><?= $ad['Country']?>,<?= $ad['City']?>,<?= $ad['CP']?></span><br>
                                        <span style="color: black;width: 100px;height: 100px;padding-left: 100px"><?= $ad['Adresse_Street']?></span><br>
                                        <span style="color: black;width: 100px;height: 100px;padding-left: 100px"><?= $ad['Type_Livraison']?></span><br>
                                        <?php if($row['Etat_Commande']!="Valid"){ ?>
                                    <a style="color: black;width: 100px;height: 100px;padding-left: 100px" href="#" title="Quick view" data-toggle="modal" data-target="#productModal<?php echo $ad['ID_Commande']; ?>">edit your adresse?
                                    </a>
                                    <?php }} ?>
                                    </p>

                                </td>
                            </tr>
                            <div id="quickview-wrapper">
                                <!-- Modal -->
                                <div class="modal fade" id="productModal<?php echo $ad['ID_Commande']; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <h2>Modifier Votre Adresse</h2>
                                                <div class="panel-body">
                                                    <div class="row">
                                                <form action="ModifCommande.php?id=<?= $ad['ID_Commande']?>" method="post" >
                                                    <div class="col-md-6">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['Nom']?>" class="form_text" name="nom" id="form_firstname" placeholder="First Name *"><span class="error_form" id="firstname_error_message"></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['Prenom']?>" class="form_text" name="prenom" id="form_lastname" placeholder="Last Name *" ><span class="error_form" id="lastname_error_message"></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['Adresse_Street']?>" class="form_text" name="as" id="form_street" placeholder="Street address *" ><span class="error_form" id="street_error_message"></span>

                                                        </p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['City']?>" class="form_text" name="cty" id="form_city" placeholder="Town/City *" ><span class="error_form" id="city_error_message"></span>

                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['Country']?>" class="form_text" name="ctry" id="form_country" placeholder="State/Country *" ><span class="error_form" id="country_error_message"></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['CP']?>" class="form_text" name="cp" id="form_cp" placeholder="Code Postal *" ><span class="error_form" id="cp_error_message"></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['Email']?>" class="form_text" name="email" id="form_mail" placeholder="Mail Adress *" ><span class="error_form" id="mail_error_message"></span>

                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="form-row">
                                                            <input type="text" value="<?= $ad['Phone']?>" class="form_text" name="ph" id="form_phone" placeholder="phone *" ><span class="error_form" id="phone_error_message"></span>

                                                        </p>
                                                    </div>
                                                    <div class="shopingcart-bottom-area">

                                                        <input style="margin-left: 200px" class="btn-default" type="submit" value="Modifier" name="button">
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
                            </tbody>

                            <?php endforeach; ?>
                        </table>

<?php } ?>


                    </div>

                    <div class="space-12"></div>
                    <div class="hr hr10 hr-double"></div>

                </div><!-- /#friends -->
            </div>
        </div>
    </div>

			</div>
		</div>
		<!-- My Account Area End -->
		<!-- Footer Area Start -->
<?php require "footer.php"?>
        <!-- Footer Area End -->
        <!--Quickview Product Start -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="img/quick-view.jpg">
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h1>Frame Princes Cut Diamond</h1>
                                    <div class="price-box">
                                        <p class="s-price"><span class="special-price"><span class="amount">$280.00</span></span></p>
                                    </div>
                                    <a href="product-details.html" class="see-all">See all features</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons">
                                                <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                                <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                                <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .product-info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Quickview Product-->
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