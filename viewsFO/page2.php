<?php

session_start();
/*
require '../core/AuteurC.php';*/

require '../include.php';
$editeur=new AuteurC();
        $list=$editeur->afficherAuteur();
?>
<?php

$limit=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
echo "s";
?>


     <div class="our-team-area">
            <h2 class="section-title">Nos Best Sellers</h2>
            <div class="container">
                <div class="row">
                <div class="team-list indicator-style">
                  
                        <?php foreach($list as $row ): ?>
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
<ul class='pagination' id="pagination"> 
	<?php 
	$total_pages =10;
	?>
		<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
		 if($i == 1):?>
					<li class='page-item active'  id="<?php echo $i;?>"><a href='responseA.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li> 
		 <?php else:?>
		 <li id="<?php echo $i;?>" class="page-item"><a href='responseA.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li>
		 <?php endif;?> 
		<?php endfor;endif;?> 
	</ul>
</div>