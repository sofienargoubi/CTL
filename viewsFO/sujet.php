<?php
/*require "../config.php";
require '../core/sujetFunction.php';
require '../core/commantaireFunction.php';*/
require '../include.php';

session_start();
$sujetF=new SujetF();
$commantaireF=new commantaireF();
$DB = new config();
if(isset($_GET['supp']))
{
    $id5=$_GET['id'];
    $type=$_GET['suj'];
    $rq='location:suppnotif.php?id='.$id5.'&suj='.$type;
    header($rq);
}
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

        <div class="shopping-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-24 col-sm-9 col-xs-12">
                        <div class="shop-tab-area">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="menu1">
                                    <div class="row">
                                        <?php
                                        $_SESSION["page"]=$_SERVER['REQUEST_URI'];
                                        $list=$sujetF->recupererSujet($_GET['id']);
                                        ?>

                                        <?php foreach($list as $row): ?>
                                            <?php $_SESSION["postes"]=$row["Createur"]; ?>
                                            <div class="single-shop-product">
                                                <div class="col-xs-12 col-sm-7 col-nn-8">
                                                    <div class="deal-product-content">
                                                        <h3><a href="forum.php" style="float: right"><i class="fa fa-home"></i>Acceuil</a></h3>
                                                        <h1>

                                                            <?php $id=$row['ID'];
                                                            echo  $row['Titre']; ?><span><h5><?php echo "créer par "; echo $row['Createur']; echo " le "; echo $row['Date']?></h5></span><span><h5><?php echo "Genre: ".$row['Genre']?></h5></span>
                                                        </h1>
                                                        <p><h4><?php echo $row['Texte']?></h4></p>
                                                        <p><?php echo $row['Note']." jaimes"; ?> </p>
                                                        <div class="availability">
                                                            <?php

                                                            $liste2=$sujetF->like($id,$_SESSION["Nom"]);
                                                            foreach($liste2 as $row2):
                                                                {
                                                                    $n=$row2['n'];
                                                                }
                                                            endforeach;
                                                            if($n==0)
                                                                echo "<span><a href=\"up.php?id=$id\"><i class=\"fa fa-thumbs-up\"></i></a></span>";
                                                            else
                                                                echo "<span style=\"background-color:#4841a8\" ><a href=\"down.php?id=$id\"><i class=\"fa fa-thumbs-up\"></i> Je n'aime plus</a></span>";
                                                            ?>
                                                            <span><a href="https://www.facebook.com/sharer/sharer.php?u=sujet.php?id=<?=$id?>"><i class="fa fa-facebook-square"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <?php
                                        $list2=$commantaireF->afficherCommantaires($id);
                                        $_SESSION['idd']=$_GET['id'];
                                        $id=$_SESSION['idd'];
                                        ?>
                                        <?php foreach($list2 as $row2): ?>
                                            <div class="single-shop-product2">
                                                <div class="col-xs-12 col-sm-7 col-nn-8">
                                                    <div class="deal-product-content">
                                                        <h4>
                                                            <?php echo $row2['Createur']?><span><h6><?php echo $row2['Date']?></h6></span>
                                                        </h4>

                                                        <p><h5><?php echo $row2['Texte']?></h5></p>
                                                        <div class="availability">
                                                            <?php
                                                            if ($row2['Createur']==$_SESSION["Nom"])
                                                            {

                                                                $crea2=$row2['Createur'];
                                                                $text=$row2['Texte'];
                                                                ?>
                                                                <span><a id="abcde" title="Modifier" href="#" data-toggle="modal" data-target="#d<?PHP echo $row2['ID']; ?>"><i class="fa fa fa-file-text-o"></i></a></span>
                                                            <?php          }
                                                            ?>
                                                            <?php
                                                            $id2=$row2['ID'];
                                                            if ($row2['Createur']==$_SESSION["Nom"])
                                                            {
                                                                echo "<span><a href=\"SupprimerCommantaire.php?ids=$id&id=$id2\"><i class=\"fa fa-close\"></i></a></span>";
                                                            }
                                                            ?>
                                                            <div class="modal fade" id="d<?PHP echo $row2['ID']; ?>" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="modal-product">
                                                                                <form method="POST" name="modif" action="ModifierCommantaire.php" class="cart">
                                                                                    <div class="tabble">

                                                                                        <input type="hidden" name="id" value="<?php echo $row2['ID'] ?>">
                                                                                        <textarea name="post_text" class="msg" required><?php echo $row2['Texte'] ?></textarea>
                                                                                    </div>
                                                                                    <div class="quick-desc"></div>
                                                                                    <div class="quick-add-to-cart" style="padding-top: 20px">
                                                                                        <button class="single_add_to_cart_button" type="submit">Modifier</button>
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
                                        <div class="single-shop-product2">
                                            <div class="col-xs-12 col-sm-7 col-nn-8">
                                                <div class="deal-product-content">
                                                    <form method="GET" action="AjouterCommantaire.php" class="cart">
                                                        <h5>nouveau commantaire</h5>
                                                        <div class="tabble">
                                                            <textarea name="post_text" class="msg3" placeholder="Text" required></textarea>
                                                        </div>
                                                        <div class="quick-add-to-cart" id="aaa">
                                                            <button class="single_add_to_cart_button" type="submit">Commenter</button>
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