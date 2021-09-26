<?php
require '../include.php';
//include '../cores/livreC.php';
//require '../cores/panierC.php';
session_start();
$panierC=new PanierC();
$l=new livreC();
$promotion= new PromotionC();
$_SESSION['page2'] = $_SERVER['REQUEST_URI'];
$Titre="Shop";
require 'header.php';
?>
<link rel="stylesheet" href="starts/style.css">
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>SHOP LEFT SIDEBAR</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.php">Home</a>
                        </li>
                        <li>SHOP LEFT SIDEBAR</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area Start -->
<!-- Shop Area Start -->
<div class="shopping-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-widget">
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">CATEGORY</h2>
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        documentaire
                                        <span>
                                        <?php

                                        $m=new livreC();
                                        $i=0;
                                        $liste1=$m->count_categorie("documentaire");
                                        foreach ($liste1 as $row1) {
                                            $i=$i+1;
                                        }
                                        ?>
                                        ( <?php echo $i;?> )
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        bande dessiner
                                        <span>
                                        <?php
                                        $i=0;
                                        $liste1=$m->count_categorie("bande dessiner");
                                        foreach ($liste1 as $row1) {
                                            $i=$i+1;
                                        }
                                        ?>
                                        ( <?php echo $i;?> )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        histoire
                                        <span>
                                        <?php
                                        $i=0;
                                        $liste1=$m->count_categorie("histoire");
                                        foreach ($liste1 as $row1) {
                                            $i=$i+1;
                                        }
                                        ?>
                                        ( <?php echo $i;?> )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        science-fiction
                                        <span>
                                                    <?php
                                                    $i=0;
                                                    $liste1=$m->count_categorie("science-fiction");
                                                    foreach ($liste1 as $row1) {
                                                        $i=$i+1;
                                                    }
                                                    ?>
                                        ( <?php echo $i;?> )
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-double-right"></i>
                                        roman
                                        <span>(7)</span>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="shop-widget-bottom">
                        <aside class="widget widget-tag"> </aside>
                        <aside class="widget widget-seller">
                            <h2 class="sidebar-title">TOP SELLERS</h2>
                            <div class="single-seller">
                                <div class="seller-img">
                                    <img src="img/shop/1.jpg" alt="" />
                                </div>
                                <div class="seller-details">
                                    <a href="shop.html"><h5>Cold mountain</h5></a>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-seller">
                                <div class="seller-img">
                                    <img src="img/shop/2.jpg" alt="" />
                                </div>
                                <div class="seller-details">
                                    <a href=""><h5>The historian</h5></a>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="shop-tab-area-ecole">
                    <div class="shop-tab-list">
                        <div class="shop-tab-pill pull-left">
                            <ul>
                                <li class="active" id="left"><a data-toggle="pill" href="#home"><i class="fa fa-th"></i><span>Grid</span></a></li>
                                <li><a data-toggle="pill" href="#menu1"><i class="fa fa-th-list"></i><span>List</span></a></li>
                                <li><form action="recherche.php" method="post" >
                                        <label for="search">Search</label>
                                        <input type="text" name="search" id="search">
                                        <input type="submit" name="buttons" id="buttons" value="search">
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="shop-tab-pill pull-right">
                            <ul>
                                <li class="product-size-deatils">
                                    <div class="show-label">
                                        <form  method="get">
                                            <label>Show:</label>
                                            <select name="nbr" onchange="this.form.submit()">
                                                <option value="10" selected="selected">10</option>
                                                <option value="09">09</option>
                                                <option value="08">08</option>
                                                <option value="07">07</option>
                                                <option value="06">06</option>
                                            </select>
                                        </form>
                                    </div>
                                </li>
                                <li class="product-size-deatils">
                                    <div class="show-label">
                                        <form action="tri.php" method="POST">
                                            <label><i class="fa fa-sort-amount-asc"></i>Sort by : </label>
                                            <select name="se" onchange="this.form.submit()">
                                                <option value="titre" selected="selected">titre</option>
                                                <option value="prix">prix</option>
                                            </select>
                                        </form>
                                    </div>
                                </li>
                                <?php
                                $l=new livreC();
                                if(isset($_GET["nbr"])){
                                    $nbr=$_GET["nbr"];
                                }
                                else
                                {
                                    $nbr=10;
                                }
                                if(isset($_GET["nbr1"])){
                                    $n=$l->nbr_page($_GET["nbr1"]);
                                    $nbr=$_GET["nbr1"];
                                }
                                else{
                                    $n=$l->nbr_page($nbr);
                                }
                                for($i=1;$i<=$n;$i++){
                                    ?>
                                    <li class="shop-pagination"><a href=shop.php?page=<?php echo $i; ?>&nbr1=<?php echo $nbr; ?> ><?php echo $i; ?></a></li>
                                <?php } ?>
                                <?php
                                if(isset($_GET["page"])){
                                    $p=$_GET["page"];
                                }
                                else{
                                    $p=1;
                                }
                                if(($p+1)<=$n){
                                    $p++;
                                }
                                ?>
                                <li class="shop-pagination"><a href="shop.php?page=<?php echo $p; ?>&nbr1=<?php echo $nbr; ?>"><i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="row tab-pane fade in active" id="home">
                            <div class="shop-single-product-area">
                                <?php
                                $le=new livreC();
                                if(isset($_GET["page"])){
                                    $page=$_GET["page"];
                                    if($page=="" || $page=="1"){
                                        $page1=0;
                                        $nombre=$nbr;
                                    }
                                    else{
                                        $nombre=$_GET["nbr1"];
                                        $page1=($page*$nombre)-$nombre;
                                    }
                                }
                                else{
                                    $page1=0;
                                    $nombre=$nbr;
                                }
                                $liste=$le->afficher_livre($page1,$nombre);
                                foreach ($liste as $row) {

                                    ?>
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
                                                        <?php
                                                        $fav=new FavorieC();
                                                        $list=$fav->Verif($row['id']);
                                                        $deja=$list->fetch();
                                                        if(empty($deja)){
                                                            ?>
                                                        <a href="AjouterProduitFavorie.php?action=ajouter&id=<?php echo $row['id']; ?>" title="Add to Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <?php } else {?>
                                                        <a href="AjouterProduitFavorie.php?action=delete&id=<?php echo $row['id']; ?>" title="Add to Wishlist">
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <?php }?>
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

                                                <div class="star-rating editable" style="margin-left: 50px">
                                                    <div class="star-rating-stars">
                                                        <div class="star-rating-star"><a href="">☆</a></div>
                                                        <div class="star-rating-star">☆</div>
                                                        <div class="star-rating-star star-rating-current-value">☆</div>
                                                        <div class="star-rating-star">☆</div>
                                                        <div class="star-rating-star">☆</div>
                                                    </div>
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
                                                                    <form method="post" action="AjouterProduit.php?id=<?php echo $row['id']; ?>" class="cart">
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
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="row">
                                <?php
                                $liste=$le->afficher_livre($page1,$nbr);
                                foreach ($liste as $row) {



                                    ?>
                                    <div class="single-shop-product">
                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                            <div class="left-item">
                                                <a href="single-product.php?id=<?php echo $row['id'];?>" title="East of eden">
                                                    <img src=<?php echo $row['cover']; ?>
                                                         alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-md-8">
                                            <div class="deal-product-content">
                                                <h4>
                                                    <p>Titre: <?php echo $row['titre']; ?></p>
                                                </h4>
                                                <div class="product-price">

                                                <?php
                                                $promo=$promotion->afficherPromotionprod($row['id']);
                                                $p=$promo->fetch();
                                                if(!empty($promo) && $p['id']==$row['id']){

                                                    ?>
                                                <strike>Ancien Prix: <span><?php echo $p['Prix_ancien'] ?> DT</strike></span><br>
                                                <span class="new-price">Nouveau Prix: <?php echo $p['Prix_nouveau'] ?> DT</span>
                                                <?php } else
                                                { ?>
                                                <span class="new-price">Prix: <?php echo $row['prix'] ?> DT</span>

                                                <?php }?>
                                                </div>
                                                <div class="list-rating-icon">
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star icolor"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="availability">
                                                    <span>In stock</span>
                                                    <span><a href="AjouterProduit.php?id=<?php echo $row['id']; ?>">Add to cart</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Area End -->
<!-- Footer Area Start -->
<?php require "footer.php"?>
<!-- Footer Area End -->
<!--Quickview Product Start -->

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
</html>>