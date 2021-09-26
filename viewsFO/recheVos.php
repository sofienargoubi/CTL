<?php 
/*
require "../config.php";
require '../core/sujetFunction.php';
*/
require '../include.php';
session_start();
$sujetF=new SujetF();
$DB = new config();
 ?>
    <?php
    if ($_GET['q']!="")
            $list=$sujetF->recupererSujetsRe($_SESSION["Nom"],$_GET['q']);
      else
        $list=$sujetF->recupererSujetss($_SESSION["Nom"]);
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
                            echo "<span><a href=\"up.php?id=$id\"><i class=\"fa fa-thumbs-up\"></i></a></span>";
                                else
                    echo "<span style=\"background-color:#4841a8\" ><a href=\"down.php?id=$id\"><i class=\"fa fa-thumbs-up\"></i></a></span>";
                      ?>

    
                    <span><a href="sujet.php?id=<?=$id?>"><i class="fa fa-wechat"></i></a></span>
                    <span><a href="https://www.facebook.com/sharer/sharer.php?u=sujet.php?id=<?=$id?>"><i class="fa fa-facebook-square"></i></a></span>

                     <span><a id="abc" title="Modifier" href="#" data-toggle="modal" data-target="#m<?PHP echo $row['ID']; ?>"><i class="fa fa-pencil-square"></i></a></span>
                     <?php
                      
                                echo "<span><a href=\"SupprimervosSujet.php?id=$id\"><i class=\"fa fa-close\"></i></a></span>";
                            
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