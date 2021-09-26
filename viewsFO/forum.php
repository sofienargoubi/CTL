<?php
/*
require "../config.php";
require '../core/sujetFunction.php';*/
require '../include.php';
session_start();
if(!isset($_COOKIE["user"]))
{
    if(!isset($_SESSION["Nom"])) {
    {
        $_SESSION['page2']=$_SERVER['REQUEST_URI']; 
        header('location:login/login.html');
    }
}
}
else
{
    $_SESSION["Nom"]=$_COOKIE["user"];
}

$notifF=new NotifF();
$sujetF=new SujetF();
$DB = new config();
$Titre="Forum";
require 'header.php';
?>

        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs">
                           <h2>FORUM</h2> 
                           <ul class="breadcrumbs-list">
                                <li>
                                    <a title="Return to Home" href="index.php">Home</a>
                                </li>
                                <li>Forum</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>

    function surligne(champ, erreur)
    {
        if(erreur)
            champ.style.backgroundColor = "#fba";
        else
            champ.style.backgroundColor = "";
    }
    function verifPseudo(champ)
    {
        if(champ.value.length < 1)
        {
            surligne(champ, true);
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }
    function veriftext(champ)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if(!regex.test(champ.value))
        {
            surligne(champ, true);
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }

</script>
        <div class="shopping-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-24 col-sm-9 col-xs-12">
                        <div class="shop-tab-area">
                            <div class="shop-tab-list">
                                <div class="shop-tab-pill pull-left">
                                    <div class="layer-5">
                                        <ul>
                                            <li>
                                                <form class="title-5">
                                                    <input name="reche" type="text" placeholder="Enter your tags" onkeyup="showCustomer(this.value)">
                                                    <button disabled><i class="fa fa-search"></i></button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="#" class="neww">
                                                    <a title="Noveau Post" href="#" data-toggle="modal" data-target="#productModal"><i class="fa fa-plus"></i></a>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="#" class="newww">
                                                    <a href="vossujet.php" class="sujets">vos sujets</a>
                                                </form>
                                            </li>
                                            <li style="padding-left: 50px">
                                                <a href="forum.php"><i class="fa fa-home"></i>Home</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                 <div class="shop-tab-pill pull-right">
                                    <ul>
                                            <li class="product-size-deatils2">
                                                <div class="show-label">
                                                    <label><i class="fa fa-sort-amount-asc"></i>Sort by : </label>
                                                        <select name='tri' id="tri" onchange="sort(this.value)">
                                                            <option selected="selected"></option>
                                                            <option value="Note">Note</option>
                                                            <option value="Name">Nom</option>
                                                            <option value="Date">Date</option>
                                                        </select>
                                                </div>
                                            </li>
                                        <?php
                                        $b=$sujetF->nbsujet();
     foreach($b as $row2)
        { $n=ceil($row2["n"]/6);}
    if($n>1){

    for($i=1;$i<=$n;$i++){
                                    ?>
                                    <li class="shop-pagination"><a href="forum.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php }} ?>
                                
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="menu1">
                                    <div class="row" id="det">
                                        <?php
                                        $_SESSION["page"]=$_SERVER['REQUEST_URI'];
                                        if(isset($_GET['page']))
                                        {$nbs=($_GET['page']*6)-6;
                                            $list=$sujetF->afficherSujets($nbs);}
                                        else
                                            $list=$sujetF->afficherSujets(1);
                                        ?>

                                        <?php foreach($list as $row): ?>
                                            <div class="single-shop-product">
                                                <div class="col-xs-12 col-sm-7 col-nn-8">
                                                    <div class="deal-product-content">
                                                        <span><h5><?php echo "créer par "; echo $row['Createur']; echo " le "; echo $row['Date']?></h5></span>
                                                        <div style="float: right"><p>Genre: <?php echo $row['Genre']?></p>
                                                        </div>
                                                        <div class="accordion">
                                                            <h2><?php echo $row['Titre']?></h2>
                                                            <div class="opened-for-codepen">
                                                                <h4><?php echo $row['Texte']?></h4>
                                                            </div>
                                                        </div>
                                                        <?php $id=$row['ID']; ?>



                                                        <p><?php echo $row['Note']." jaimes"; ?> </p>
                                                        <div class="availability">

                                                            <?php

                                                            $Titre_post=$row['Titre'];
                                                            $Createur_post=$row['Createur'];
                                                            $Genre_post=$row['Genre'];
                                                            $Text_post=$row['Texte'];
                                                            $liste2=$sujetF->like($id,$_SESSION["Nom"]);
                                                            foreach($liste2 as $row2):
                                                                {
                                                                    $n=$row2['n'];
                                                                }
                                                            endforeach;
                                                            if($n==0)
                                                                echo "<span><a href=\"up.php?id=$id&Crea=$Createur_post\"><i class=\"fa fa-thumbs-up\"></i></a></span>";
                                                            else
                                                                echo "<span style=\"background-color:#4841a8\" ><a href=\"down.php?id=$id\"><i class=\"fa fa-thumbs-up\"></i></a></span>";
                                                            ?>


                                                            <span><a href="sujet.php?id=<?=$id?>"><i class="fa fa-wechat"></i></a></span>
                                                            <span><a href="https://www.facebook.com/sharer/sharer.php?u=sujet.php?id=<?=$id?>"><i class="fa fa-facebook-square"></i></a></span>
                                                            <?php

                                                            if ($row['Createur']==$_SESSION["Nom"])
                                                            {?>
                                                                <span><a id="abc" title="Modifier" href="#" data-toggle="modal" data-target="#m<?PHP echo $row['ID']; ?>"><i class="fa fa-pencil-square"></i></a></span>
                                                            <?php  }
                                                            ?>
                                                            <?php
                                                            if ($row['Createur']==$_SESSION["Nom"])
                                                            {
                                                                echo "<span><a href=\"SupprimervosSujet.php?id=$id\"><i class=\"fa fa-close\"></i></a></span>";
                                                            }
                                                            ?>
                                                            <div class="modal fade" id="m<?PHP echo $row['ID']; ?>" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="modal-product">
                                                                                <form method="POST" name="modif" action="ModifierSujet.php" class="cart" onsubmit="return verifform()">
                                                                                    <div class="tabble">
                                                                                        <?php echo "<input type=\"text\" class=\"msg2\" name=\"post_name\" placeholder=\"Titre\" value=\"$Titre_post\"/>" ?>
                                                                                    </div>
                                                                                    <div class="tabble">
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td style="padding-right: 20px">Genre</td>
                                                                                                <td><select name='post_tags' disabled>
                                                                                                        <option selected="selected" value="Note"><?php echo $Genre_post?></option>
                                                                                                    </select></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div class="tabble">
                                                                                        <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                                                                                        <textarea name="post_text" class="msg" placeholder="Texte"><?php echo $Text_post ?></textarea>
                                                                                    </div>
                                                                                    <div class="quick-desc"></div>
                                                                                    <div class="quick-add-to-cart" style="padding-top: 20px">
                                                                                        <button  class="single_add_to_cart_button" type="submit">Modifier</button>
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
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        var headers = ["H2","P"];
                                        $(".accordion").click(function(e) {
                                            var target = e.target,
                                                name = target.nodeName.toUpperCase();

                                            if($.inArray(name,headers) > -1) {
                                                var subItem = $(target).next();

                                                //slideUp all elements (except target) at current depth or greater
                                                var depth = $(subItem).parents().length;
                                                var allAtDepth = $(".accordion p, .accordion div").filter(function() {
                                                    if($(this).parents().length >= depth && this !== subItem.get(0)) {
                                                        return true;
                                                    }
                                                });
                                                $(allAtDepth).slideUp("fast");

                                                //slideToggle target content and adjust bottom border if necessary
                                                subItem.slideToggle("fast",function() {
                                                    $(".accordion :visible:last").css("border-radius","0 0 10px 10px");
                                                });
                                                $(target).css({"border-bottom-right-radius":"0", "border-bottom-left-radius":"0"});
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require "footer.php"?>
        
        
        <div id="quickview-wrapper">
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="product-info" id="poost">
                                    <h1>Créer un nouveau sujet</h1>
                                    <form method="POST" action="AjouterSujet.php" class="cart">
                                        <div class="tabble">
                                            <input type="text" class="msg2" name="post_name" placeholder="Titre" onkeyup="verifPseudo(this)"/>
                                        </div>

                                        <div class="tabble">
                                            <table>
                                                <tr>
                                                    <td style="padding-right: 20px">Genre</td>
                                                        <td><select name='post_tags'>
                                                            <option selected="selected" value="Livre">Livre</option>
                                                            <option value="Chapitre">Chapitre</option>
                                                            <option value="Personnage">Personnage</option>
                                                        </select></td>
                                                        </tr>
                                        </table>
                                        </div>
                                        <div class="tabble">
                                            <textarea name="post_text" class="msg" placeholder="Text" required></textarea>
                                        </div>
                                        <div class="quick-desc"></div>
                                        <div class="quick-add-to-cart">
                                            <button class="single_add_to_cart_button" type="submit">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
          <script>
        function sort(id)
 {
    $.ajax({
            url: "tri.php",
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
        

        function showCustomer(str) {
 
  var xhttp;  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("det").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "reche.php?q="+str, true);
  xhttp.send();
}

        </script>

    </body>
</html>