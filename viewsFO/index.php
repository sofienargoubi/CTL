<?php
session_start();
require '../include.php';
$_SESSION['page2'] = $_SERVER['REQUEST_URI'];
$Titre="Acceuil";
require 'header.php';
?>

        <!--Header Area End-->
        <!-- slider Area Start -->
        <div class="slider-area">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider" class="slides"> 
                    <img src="img2%20(1).jpg" alt="" title="#slider-direction-1"  />
                    <img src="img2%20(2).jpg" alt="" title="#slider-direction-2"  />
                </div>
                <!-- direction 1 -->
                <div id="slider-direction-1" class="text-center slider-direction">
                    <!-- layer 1 -->
                    <div class="layer-1">
                        <h2 class="title-1">jamais sans mon livre</h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-2">
                        <p class="title-2"></p>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-3">
                        <a href="#" class="title-3">VOIR PLUS</a>
                    </div>
                    <!-- layer 4 -->
                    <div class="layer-4">
                        <form action="#" class="title-4">
                            <input type="text" placeholder="Entrez le titre de votre livre ici">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <!-- layer 1 -->
                    <div class="layer-1">
                        <h2 class="title-1">jamais sans mon livre</h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-2">
                        <p class="title-2"></p>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-3">
                        <a href="#" class="title-3">VOIR PLUS</a>
                    </div>
                    <!-- layer 4 -->
                    <div class="layer-4">
                        <form action="#" class="title-4">
                            <input type="text" placeholder="Entrez le titre de votre livre ici">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->    
        <!-- Online Banner Area Start -->    
        <div class="online-banner-area">
            <div class="container">
                <div class="banner-title text-center">
                    <h2>CENTER <span>TUNISIEN DE LIVRE</span></h2>
                    <p>Notre site est la plus grande bibliothèque de livres en Tunisie qui contient beaucoup des livres les plus populaires et les plus réputés présentés ici. Les meilleurs auteurs sont ici, il suffit de vous inscrire votre adresse e-mail et d'être mis à jour avec nous.</p>
                </div>
                <div class="row">
                    <div class="banner-list">
                        <div class="col-md-4 col-sm-6">
                            <div class="single-banner">
                                <a href="shop.php">
                                    <img src="a.png" alt="" width="370" height="300">
                                </a>
                                <div class="price"><span>$</span>160</div>
                                <div class="banner-bottom text-center">
                                    <a href="shop.php">NEW RELEASE 2016</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="single-banner">
                                <a href="shop.php">
                                    <img src="a.png" alt="" width="370" height="300">
                                </a>
                                <div class="price"><span>$</span>160</div>
                                <div class="banner-bottom text-center">
                                    <a href="shop.php">NEW RELEASE 2016</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 hidden-sm">
                            <div class="single-banner">
                                <a href="shop.php">
                                    <img src="a.png" alt="" width="370" height="300">
                                </a>
                                <div class="price"><span>$</span>160</div>
                                <div class="banner-bottom text-center">
                                    <a href="shop.php">NEW RELEASE 2016</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online Banner Area End -->   
        <!-- Shop Info Area Start -->   
        <div class="shop-info-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="single-shop-info">
                            <div class="shop-info-icon">
                                <i class="flaticon-transport"></i>
                            </div>
                            <div class="shop-info-content">
                                <h2>LIVRAISON A DOMICILE</h2>
                                <a href="#">VOIR PLUS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-shop-info">
                            <div class="shop-info-icon">
                                <i class="flaticon-money"></i>
                            </div>
                            <div class="shop-info-content">
                                <h2>PAYEMENT</h2>
                                <a href="#">VOIR PLUS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-sm">
                        <div class="single-shop-info">
                            <div class="shop-info-icon">
                                <i class="flaticon-school"></i>
                            </div>
                            <div class="shop-info-content">
                                <h2>PLUSIEURS CATEGORIES</h2>
                                <a href="#">VOIR PLUS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Shop Info Area End -->
        <!-- Featured Product Area Start -->
        <div class="featured-product-area section-padding">
            <h2 class="section-title">NOS PRODUITS</h2>
            <div class="container">
                <div class="row">
                    <div class="product-list tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                            <div class="featured-product-list indicator-style">
                                <?php
                                $le=new livreC();

                                $liste=$le->afficher_livre(1,6);
                                foreach ($liste as $row) {

                                ?>
                                <div class="single-p-banner">

                                    <div class="col-md-3">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="#" class="single-banner-image-wrapper">
                                                    <img alt="" src="a.png" width="280" height="270" >
                                                    <div class="price"><span>DT</span><?php echo $row['prix']; ?></div>
                                                    <div class="rating-icon">
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </a>
                                                <div class="product-description">
                                                    <div class="functional-buttons">
                                                        <a href="#" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                        <a href="#" title="Add to Wishlist">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                                            <i class="fa fa-compress"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="single-product.php?id=<?php echo $row['id']; ?>"><?php echo $row['titre']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>             
            </div>
        </div>
        <!-- Featured Product Area End -->
        <!-- Testimonial Area Start -->
        <div class="testimonial-area text-center">
            <div class="container">
                <div class="testimonial-title">
                    <h2>NOTRE TEMOIGNAGE</h2>
                    <p>Ce que nos clients disent de la critique des livres et des commentaires</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial-list">
                            <div class="single-testimonial">
                               <img src="img/auteur/atef.jpg" alt="">
                               <div class="testmonial-info clearfix">
                                    <p>Quand on est plongé dans un livre, le monde autour n'existe plus... La Nuit de la Lecture le 19 janvier propose une immersion dans la lecture à ne pas manquer!</p>
                                   <div class="testimonial-author text-center">
                                       <h3>JOHN DOE</h3>
                                       <p></p>
                                   </div>
                               </div>
                            </div>
                            <div class="single-testimonial">
                               <img src="img/testimonial/2.jpg" alt="">
                               <div class="testmonial-info clearfix">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p> 
                                   <div class="testimonial-author text-center">
                                       <h3>Ashim Kumar</h3>
                                       <p>CEO</p>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Area End -->
        <!-- Counter Area Start -->
        <div class="counter-area section-padding text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">1264</span>
                                </span>
                                <h3>LIVRES DISPONIBLES</h3>
                            </div>
                        </div>                      
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">433</span>
                                </span>
                                <h3>UTILISATEURS</h3>
                            </div>
                        </div>                      
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">50</span>
                                </span>
                                <h3>NOS AUTEURS</h3>
                            </div>
                        </div>                      
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">13</span>
                                </span>
                                <h3>NOS MAISON D'EDITION</h3>
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End -->
        <!-- Blog Area Start -->
        <div class="blog-area section-padding">
            <h2 class="section-title">Nos Meilleurs Auteurs</h2>
            <p>Nos meilleurs auteurs selon les avis de nos clients</p>
            <div class="container">
                <div class="row">
                    <div class="blog-list indicator-style">
                        <?php
                        $auteur=new auteurC();
                        $liste = $auteur ->rechercherAuteurTop();
                        ?>
                        <?php foreach($liste as $row ): ?>
                        <div class="col-md-3">
                            <div class="single-blog">
                                <a href="single-#">
                                    <img style ="height:270px;width:210px" src="img/auteur/<?php echo $row['prenom'];?>.jpg" alt="">
                                </a>
                                <div class="blog-info text-center">
                                    <a href="#"><?php echo $row['prenom'] ;echo " "; echo $row['nom'];  ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
        <!-- News Letter Area Start -->
        <div class="newsletter-area text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter-title">
                            <h2>ABONNEZ VOUS A NEWSLETTER</h2>
                            <p>S'abooner à notre newsletter pour recevoir toutes les nouveautés de nos produits.</p>
                        </div>
                        <div class="letter-box">
                            <form action="#" method="post" class="search-box">
                                <div>
                                    <input type="text" placeholder="adresse email">
                                    <button type="submit" class="btn btn-search">S'ABONNER<span><i class="flaticon-school-1"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News Letter Area End -->
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