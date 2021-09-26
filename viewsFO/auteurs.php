<?php
session_start();
/*
require '../core/auteurC.php';*/
require '../include.php';
$auteur=new auteurC();
$Titre="Auteur";
require 'header.php';
?>
        <!-- breadcrumbs starts here-->
         <div class="breadcrumbs-area-auteur">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs">
                              <div class="writing" >
       <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
<h1 class="writing-h1" >Nos auteurs sont
  <span
     class="txt-rotate"
     data-period="2000"
     data-rotate='[ "Talentueux.", "intelligents.", "innovateurs.", "créatifs." ]'></span>
</h1>
<h2 class="writing-h2" >Un simple click vous le prouvera !</h2>
   </div>
                           <ul class="breadcrumbs-list">
                                <li>
                                    <a title="Return to Home" href="index.html">Accueil</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- breadcrumbs ends here --> 
       <!--writer-->
    

        <!-- Our Team Area End -->
         <div class="layer-4">
            <style type="text/css">
                #searc{

                    margin-left: 110px;
                    border: medium none black;
  border-bottom-left-radius: 30px;
  border-top-left-radius: 30px;
  color: rgb(225,225,225);
  height: 50px;
  line-height: 50px;
  padding-left: 20px;
  position: relative;
  width: 40%;
                }
            </style>
                        <div class="layer-4">
   
    <form action="" id="searc" class="title-4" >
        <input name="search" type="text" placeholder="Enter your book title here" onkeyup="showCustomer(this.value)">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<!--position menu Area start-->

<div class="shop-tab-pill pull-right">
    <ul>

        <li class="product-size-deatils">
            <div class="show-label">
                <label><i class="fa fa-sort-amount-asc"></i>Sort by : </label>
                <select id="sort" onchange="sort(this.value)">
                    <option value="name" selected="selected">name</option>
                    <option value="vente">vente</option>
                </select>
            </div>
        </li>

    </ul>
</div>
                               

                                <?php
$limit=9;
$liste = $auteur ->afficherAuteur();
$total_records  = $liste ->rowCount();
$total_pages = ceil($total_records / $limit);
?>
        <div class="shopping-cart-area section-padding">
    <div class="container">


<div id="target-content" class="clearfix">
</div>

</div>
<div style="padding-left: 730px">
    <ul class='pagination' id="pagination">
        <?php 
        if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):
            if($i == 1):?>
                <li class='page-item active'  id="<?php echo $i;?>"><a href='responseA.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li>
            <?php else:?>
                <li id="<?php echo $i;?>" class="page-item"><a href='responseA.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li>
            <?php endif;?>
        <?php endfor;endif;?>
    </ul>
</div>
            <div class="our-team-area">
                <h2 class="section-title">Nos Meilleurs Auteurs</h2>
                <div class="container">
                    <div class="row">
                        <div class="team-list indicator-style">
                            <?php
                            $liste = $auteur ->rechercherAuteurTop();
                            ?>
                            <?php foreach($liste as $row ): ?>
                                <div class="col-md-3">
                                    <div class="single-team-member">
                                        <a href="#">
                                            <img style ="height:270px;width:210px" src="img/auteur/<?php echo $row['prenom'];?>.jpg" alt="">
                                        </a>
                                        <div class="member-info">
                                            <a href="#"><?php echo $row['prenom'] ;echo " "; echo $row['nom'];  ?></a>

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
    
  
        <script type="text/javascript">
                  function sort(id)
 {
    $.ajax({
            url: "sortauteur.php",
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
    $(document).ready(function(){
        jQuery("#target-content").load("page2.php?page=1");
    })
</script>

<script>

    jQuery("#pagination li").on('click',function(e){
        e.preventDefault();
        jQuery("#target-content").html('loading...');
        jQuery("#pagination li").removeClass('active');
        jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#target-content").load("responseA.php?page=" + pageNum);
    });

    $(document).ready(function(){
        jQuery("#target-content").load("responseA.php?page=1");
    })



        function showCustomer(str) {
 
  var xhttp;  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("det").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "searchA.php?q="+str, true);
  xhttp.send();
}
        </script>
    </body>
   
    </html>