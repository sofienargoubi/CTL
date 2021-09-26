<?php

session_start();
/*
require '../core/PacksC.php';*/

require '../include.php';
$pack=new PacksC();
$Titre="Ecole";
require 'header.php';
?>
        <!-- slider Area Start -->
        <!--<div class="slider-area">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider" class="slides"> 
                    <img src="img/slider/1.jpg" alt="" title="#slider-direction-1"  />
                  
                </div>
                
                <div id="slider-direction-1" class="text-center slider-direction">
                    
                    <div class="layer-1">
                        <h2 class="title-1">Nos Packs dédiés aux élèves</h2>
                    </div>
                    
                    <div class="layer-2">
                        <p class="title-2"> Un pack pour chaque classe nous permet d'incitez les jeunes à lire.Un packs contient des livres conventionnés par des inspecteurs et des expert de l'éducation pour chaque niveau.</p>
                    </div>
                    
                    
                   
                </div>
                
            </div>
        </div>-->
        <!-- slider Area End-->  

            <!--shope area starts-->
            
        
        
        <!--espace ecole starts-->
        <?php
                                   $liste = $pack ->afficherPacks();
                                   ?>
        <div class="espace-ecole">
        <div class='row tab-pane fade in active' id='home'>
                                    <div class='shop-single-product-area'>
                                 
                                    <?php foreach($liste as $row ): ?>
                          
                                    <div class="col-md-4 col-sm-6">
                                            <div class="single-banner">
                                                <div class="product-wrapper">
                                                    <a href="#" class="single-banner-image-wrapper">
                                                        <img alt="" src="img/<?php echo $row['image']; ?>">
                                                        <div class="price"><span>dt</span><?php echo $row['prix']; ?></div>
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
                                                            <a href="#" title="Quick view" data-toggle="modal" data-target="#<?php echo $row['id']; ?>">
                                                                <i class="fa fa-compress"></i>
                                                            </a>
            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="banner-bottom text-center">
                                                    <div class="banner-bottom-title">
                                                        <a href="#"><?php echo $row['nom'];  ?></a>
                                                    </div>
                                                    
                                                </div>
                                                                                                <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="img/<?php echo $row['image']; ?>">
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                </div>
                                 </div>
        <!--espace ecole ends-->
        
                 <!-- Counter Area Start -->
         <div class="counter-area section-padding text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">6</span>
                                </span>
                                <h3>Packs</h3>                             
                            </div>
                        </div>                      
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">52</span>
                                </span>
                                <h3>Inspecteurs</h3>                               
                            </div>
                        </div>                      
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">1450</span>
                                </span>
                                <h3>Bénéficiaires</h3>                               
                            </div>
                        </div>                      
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="counter-info">
                                <span class="fcount">
                                    <span class="counter">1062</span>
                                </span>
                                <h3>écoles</h3>                             
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End -->                         
             
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
   
    </html>