<?php
require '../include.php';
//require '../cores/panierC.php';
//include '../cores/livreC.php';
$Titre="Signel-Product";
$panierC=new PanierC();
$promotion= new PromotionC();

require 'header.php';
?>

<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>PRODUCT DETAILS</h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.php">Home</a>
                        </li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area Start -->
<!-- Single Product Area Start -->
<?php
if(isset($_GET["id"])){
    $iden=$_GET["id"];
}
$l=new livreC();
$liste=$l->rechercher_livreid($iden);
foreach ($liste as $row) {
    $c=$row['categorie'];
    ?>
    <div class="single-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="single-product-image-inner">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="one">
                                <a class="venobox" href="#" data-gall="gallery" title="">
                                    <img width="470" height="450" src=<?php echo $row['cover']; ?> alt="">
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="two">
                                <a class="venobox" href="#" data-gall="gallery" title="">
                                    <img width="60" height="50" src="<?php echo $row['cover']; ?>" alt="">
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="three">
                                <a class="venobox" href="#" data-gall="gallery" title="">
                                    <img width="60" height="50" src="<?php echo $row['cover']; ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="product-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab" data-toggle="tab"><img width="150" height="160" src="<?php echo $row['cover']; ?>" alt=""></a></li>
                            <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab"><img width="150" height="160" src="<?php echo $row['cover']; ?>" alt=""></a></li>
                            <li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab"><img width="150" height="160" src="<?php echo $row['cover']; ?>" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="single-product-details">
                        <div class="list-pro-rating">
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star icolor"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h2><?php echo $row['titre']; ?></h2>
                        <div class="availability">
                            <span>In stock</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                        <div class="single-product-price">

                            <?php
                            $promo=$promotion->afficherPromotionprod($row['id']);
                            $p=$promo->fetch();
                            if(!empty($promo) && $p['id']==$row['id']){

                                ?>
                                <h2><strike>Ancien Prix: <?php echo $p['Prix_ancien'] ?> DT</strike></h2><br>
                                <h2>Nouveau Prix: <?php echo $p['Prix_nouveau'] ?> DT</h2>
                            <?php } else
                            { ?>
                                <h2>Prix: <?php echo $row['prix'] ?> DT</h2>

                            <?php }?>
                        </div>
                        <div class="product-attributes clearfix">
                                <span class="pull-left" id="quantity-wanted-p">
									<span class="dec qtybutton">-</span>
									<input type="text" value="1" class="cart-plus-minus-box">
									<span class="inc qtybutton">+</span>
								</span>
                            <span>
                                    <a class="cart-btn btn-default" href="AjouterProduit.php?id=<?php echo $row['id']; ?>">
                                        <i class="flaticon-shop"></i>
                                        Add to cart
                                    </a>
                               </span>
                        </div>
                        <div class="add-to-wishlist">
                            <a class="wish-btn" href="cart.html">
                                <i class="fa fa-heart-o"></i>
                                ADD TO WISHLIST
                            </a>
                        </div>
                        <div class="single-product-categories">
                            <label>Categories:</label>
                            <span><?php echo $row['categorie']; ?></span>
                        </div>
                        <div class="social-share">
                            <label>Share: </label>
                            <ul class="social-share-icon">
                                <li><a href="#"><i class="flaticon-social"></i></a></li>
                                <li><a href="#"><i class="flaticon-social-1"></i></a></li>
                                <li><a href="#"><i class="flaticon-social-2"></i></a></li>
                            </ul>
                        </div>
                        <div id="product-comments-block-extra">
                            <ul class="comments-advices">
                                <li>
                                    <a href="#" class="open-comment-form">Write a review</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="p-details-tab-content">
                        <div class="p-details-tab">
                            <ul class="p-details-nav-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">Description</a></li>
                                <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Review</a></li>
                                <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Tab</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content review">
                            <div role="tabpanel" class="tab-pane active" id="more-info">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="data">
                                <table class="table-data-sheet">
                                    <tbody>
                                    <tr class="odd">
                                        <td>Compositions</td>
                                        <td>Cotton</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Styles</td>
                                        <td>Casual</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Properties</td>
                                        <td>Short Sleeve</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div id="product-comments-block-tab">
                                    <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Single Product Area End -->
<!-- Related Product Area Start -->
<div class="related-product-area">
    <h2 class="section-title">RELATED PRODUCTS</h2>
    <div class="container">
        <div class="row">
            <div class="related-product indicator-style">
                <?php
                $liste1=$l->rechercher_livrec($c);
                foreach ($liste1 as $row1) {
                    ?>
                    <div class="col-md-3">
                        <div class="single-banner">
                            <div class="product-wrapper">
                                <a href="#" class="single-banner-image-wrapper">
                                    <img  width="260" height="220" alt="" src="<?php echo $row1['cover']; ?>">
                                    <div class="price"><?php echo $row1['prix']; ?> D</div>
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
                                        <a href="AjouterProduit.php?id=<?php echo $row['id']; ?>" title="Add to Cart">
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
                                <a href="#"><?php echo $row['titre']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Related Product Area End -->
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