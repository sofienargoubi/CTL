<?php

session_start();
/*
include('../core/AuteurC.php');
*/

require '../include.php';
$auteur = new AuteurC();

$limit = 9;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$req = $auteur->afficherAuteurParLimite($start_from,$limit);
//$req = $auteur->afficherAuteur();
$req ->execute();
$liste= $req->fetchAll();


    ?>
<div class="row" id="det" id="se">
<?php
foreach ($liste as $row){
    ?>
    <div class="col-md-4">
        <div class="single-team-member">
            <a title="East of eden" href="" data-toggle="modal"  data-target="#<?php echo $row['id']; ?>">
                <img style ="height:270px;width:210px" src="img/auteur/<?php echo $row['prenom'];?>.jpg" alt="image n existe pas">
            </a>
            <div class="member-info">
                <a href="#"><?php echo $row['nom'];  ?></a>

            </div>
<div id="<?php echo $row['id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
<div class="modal-product">
                    <div id="at" class="col-xs-12 col-sm-7 col-nn-8">
                        <a title="East of eden" href=""><?php  echo $row['nom']?></a>
                        <?php
                        // $id= $_POST['data'];
                        //var_dump($_POST);
                            echo $row['nom'] ;
                             echo " ";
                              echo $row['prenom'] ;
                              echo "<br>";
                            echo "informations :"; echo $row['informations']; echo "<br>"; echo " livres :" ; echo $row['livres'];
                        
                        ?>
                    </div>
            </div>
            <!--   <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>-->
           </div>
        </div>

    </div>
</div>
        </div>
    </div>
    <?php

};
?>
 </div>

 