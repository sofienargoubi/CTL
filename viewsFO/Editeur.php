<?php

session_start();
/*
require '../core/EditeurC.php';*/
require '../include.php';
$editeur=new EditeurC();
$Titre="Editeur";
require 'header.php';
?>
<!--Header Area End-->
<div class="breadcrumbs-area-auteur">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <div class="writing" >
                        <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
                        <h1 class="writing-h1" >Trouvez les
                            <span
                                    class="txt-rotate"
                                    data-period="2000"
                                    data-rotate='[ "Meilleurs ", "Plus Intéressents " ]'></span> éditeurs.
                        </h1>
                        <h2 class="writing-h2" >Chez le Centre Tunisien Du Livre</h2>
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

<!-- Mobile Menu Start -->

<!-- editeur -->

        <?php
$limit=9;
$liste = $editeur ->afficherEditeur();
$total_records  = $liste ->rowCount();
$total_pages = ceil($total_records / $limit);

?>
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
    <div class="container">
        <div id="target-content" class="clearfix">
        </div>

    </div>
</div>
<div style="padding-left: 730px">
    <ul class='pagination' id="pagination">
        <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):
            if($i == 1):?>
                <li class='page-item active'  id="<?php echo $i;?>"><a href='response.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li>
            <?php else:?>
                <li id="<?php echo $i;?>" class="page-item"><a href='response.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li>
            <?php endif;?>
        <?php endfor;endif;?>
    </ul>
</div>
<!--Search-->
<div class="our-team-area">
    <h2 class="section-title">Nos Best Sellers</h2>
    <div class="container">
        <div class="row">
            <div class="team-list indicator-style">
                <?php
                $liste = $editeur ->rechercherEditeurTop();
                ?>
                <?php foreach($liste as $row ): ?>
                    <div class="col-md-3">
                        <div class="single-team-member">
                            <a href="#">
                                <img style ="height:270px;width:210px" src="img/editeur/<?php echo $row['nomMaison'];?>.jpg" alt="">
                            </a>
                            <div class="member-info">
                                <a href="#"><?php echo $row['nomMaison'] ; ?></a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>
        </div>
    </div>
</div>

<!-- Affichage PHP Start -->
<div id="target-content" class="clearfix">
</div>

<!-- Footer Area Start -->
<?php require "footer.php"?>
<!-- Footer Area End -->
<!--Quickview Product Start -->


<!-- Modal content-->



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
            url: "sortalpha.php",
            data:{data: id},
            type: "POST",
            success: function(data){
                $('#det').html(data);
            }
        });
    }


    function mod(id){
        // window.location.href = "details.php?id=" + id;
        // $.post('details.php', {variable: id});

        console.log(id);
        $.ajax({
                type : "POST",
                url : "details.php",
                data :  {data: id},
                success : function(data)
                {
                    $(".modal-content").html(data);
                    $('#myModal').modal('show');

                    //alert(data)
                },
                error: function(jqxhr, status, exception) {
                    alert('Exception:', exception);
                }

            }

        );

    }
</script>



<script type="text/javascript">
    $(document).ready(function(){
        jQuery("#target-content").load("page.php?page=1");
    })
</script>

<script>

    jQuery("#pagination li").on('click',function(e){
        e.preventDefault();
        jQuery("#target-content").html('loading...');
        jQuery("#pagination li").removeClass('active');
        jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#target-content").load("response.php?page=" + pageNum);
    });

    $(document).ready(function(){
        jQuery("#target-content").load("response.php?page=1");
    })


        function showCustomer(str) {
 
  var xhttp;  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("det").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "search.php?q="+str, true);
  xhttp.send();
}
</script>



<style type="text/css">
    .card {
        height: 260px;
        width: 20%;
        margin-top:10px;
        margin-right:10px;
        float: left
    }
    .page-container {
        margin-top: 20px;
    }
</style>

</body>

</html>

