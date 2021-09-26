<?php
/*
require "../config.php";
require '../core/livretFunction.php';
*/
require '../include.php';
session_start();
if(!isset($_SESSION["Nom"])) {
    $_SESSION['page2']=$_SERVER['REQUEST_URI'];
    header('location:login/login.html');
}
$livretF=new livretF();
$DB = new config();
$Titre="Lecture";
require 'header.php';
?>

        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs">
                           <h2>LECTURE</h2> 
                           <ul class="breadcrumbs-list">
                                <li>
                                    <a title="Return to Home" href="index.html">Home</a>
                                </li>
                                <li>Lecture</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shopping-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-24 col-sm-9 col-xs-12">
                        <div class="shop-tab-area">
                            <div class="shop-tab-list">
                                <div class="shop-tab-pill pull-left">
                                    <ul>
                                        <li class="active" id="left"><a href="#home" data-toggle="pill"><i class="fa fa-th"></i><span>Grid</span></a></li>
                                        <li><a href="#menu1" data-toggle="pill"><i class="fa fa-th-list"></i><span>List</span></a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="row tab-pane fade in active" id="home">
                                    <div class="shop-single-product-area">
                                        <?php $list=$livretF->afficherLivresT();?>
                                        <?php foreach($list as $row): ?>
                                            <div class="col-md-4 col-sm-6">

                                                <div class="single-banner">
                                                    <div class="product-wrapper">
                                                        <a class="single-banner-image-wrapper" href="#">
                                                            <img alt="" src="img/featured/1.jpg">
                                                        </a>
                                                        <div class="product-description">
                                                            <div class="functional-buttons">
                                                                <?php
                                                                $titre=$row['Titre'];
                                                                $description=$row['Description'];
                                                                $file=$row['ID'];
                                                                $titret=$titre.'.pdf';
                                                                echo "<a href=\"files/$titret\" download=\"$titret\"><i class=\"fa fa-download\"></i></a>";?>
                                                                <a id="abcdef" title="Quick view" href="#" data-toggle="modal" data-target="#x<?PHP echo $row['ID']; ?>">
                                                                    <i class="fa fa-compress"></i>
                                                                </a>"
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="banner-bottom text-center">
                                                        <div class="banner-bottom-title">
                                                            <?php echo $row['Titre']?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="x<?PHP echo $row['ID']; ?>" tabindex="-1" role="dialog">
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
                                                                    <?php
                                                                    $nom=$row['Titre'];
                                                                    $nomt=$nom.".pdf";
                                                                    $tit=$row['Description'];
                                                                    ?>
                                                                    <h1><?php echo $nom ?></h1>
                                                                    <div class="quick-desc">
                                                                        <?php echo $tit ;?>
                                                                    </div>
                                                                    <div class="quick-add-to-cart">
                                                                        <?php echo" <a href=\"files/$nomt\" download=\"files/$nomt\"><button class=\"single_add_to_cart_button\">Telecharger</button> </a>"?>
                                                                    </div>
                                                                </div><!-- .product-info -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="menu1">
                                    <div class="row">
                                        <?php $list=$livretF->afficherLivresT();?>
                                        <?php foreach($list as $row): ?>
                                            <div class="single-shop-product">
                                                <div class="col-xs-12 col-sm-5 col-md-4">
                                                    <div class="left-item">
                                                        <a title="East of eden" href="single-product.html">
                                                            <img alt="" src="img/featured/1.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-7 col-md-8">
                                                    <div class="deal-product-content">
                                                        <h4><?php echo $row['Titre']?></h4>
                                                        <p><?php echo $row['Description']?></p>
                                                        <div class="availability">
                                                            <?php
                                                            $file=$row['ID'];

                                                            $titret=$titre.'.pdf';
                                                            echo "<span><a href=\"files/$titret\" download=\"$titret\">Telecharger</a></span>"?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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