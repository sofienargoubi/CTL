<?php
$notif=new NotificationC();
$notifF=new NotifF();
$nbr=0;
if(!empty($_SESSION['cart'])){
                        foreach($_SESSION["cart"] as $keys => $values) {
                            $nbr += $values['qty'];

                        }}?>
<div class="col-md-1 hidden-sm">
    <div class="header-right">
        <ul>
           <ul>
        <?php

  if(!empty($_SESSION['mail']))
            {
                $ll=$notifF->recuperernotif($_SESSION['Nom']);
                $ll2=$notifF->nbnotif($_SESSION['Nom']);
                foreach ($ll2 as $rr) {
                    $ns=$rr["n"];
                }
                ?>
            <li class="shoping-cart">
                <a href="profile.php">
                    <i class="flaticon-people"></i>
                    <span><?php echo $ns ?></span>
                </a>
                <div class="add-to-cart-product">
                    <div class="cart-product">
                    </div>
                    <?php if ($ns!=0) {foreach ($ll as $roww) {
                     ?>
                    <div class="total-cart-price">
                        <div class="cart-product-line fast-line">
                        <?php     $list=$notif->afficherNotification($_SESSION['mail']);

                        foreach ($list as $row):
                            ?>
                            <span> <?php
                                echo "reclamation: ".$row['message'];
                                ;?></span>
                            <span class="free-shiping" ><a href="supprimer_notification.php?id=<?php  echo $row['id']; ?>'"><i class="fa fa-times"></i></a></span><br>
                        <?php  endforeach;?>
                            <span>
                                <?php
                                $iddd=$roww["Sujet"];
                                $numm=$roww["Num"];
                                $suj=$roww["NotifType"];
                                if($roww["NotifType"]=="commentaire")
                                    {
                                        if($roww["Num"]==1)
                                        {
                                            echo "<a href=\"sujet.php?id=$iddd&suj=$suj&supp=1\"><h5>1 personne a commenté votre sujet</h5></a>";
                                        }
                                        else
                                        {
                                            echo "<a href=\"sujet.php?id=$iddd&suj=$suj&supp=1\"><h5>$numm personnes ont commenté votre sujet</h5><a/>";
                                        }
                                    }
                                    else
                                    {
                                        if($roww["Num"]==1)
                                        {
                                            echo "<a href=\"sujet.php?id=$iddd&suj=$suj&supp=1\"><h5>1 personne a aimé votre sujet</h5></a>";
                                        }
                                        else
                                        {
                                            echo "<a href=\"sujet.php?id=$iddd&suj=$suj&supp=1\"><h5>$numm personnes ont aimé votre sujet</h5></a>";
                                        }
                                    }
                                }
?>
                        </div>

                        <div class="cart-product-line">
                        </div>
                    </div>
                <?php }
                else {?>
                                      <div class="total-cart-price">
                        <div class="cart-product-line fast-line">
                            <span>
                                <?php

                                    echo "aucune notification<i class=\"fa fa-frown-o\"></i>";

?>
                        </div>

                        <div class="cart-product-line">
                        </div>
                    </div>
                <?php } ?>
                    <div class="cart-checkout">
                        <a href="logout.php">
                            Se déconnecter
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </li>
                <?php } else { ?>

            <li class="shoping-cart">
                <a href="login/login.html">
                    <i class="flaticon-people"></i>
                </a></li>


                <?php }?>



            <li class="shoping-cart">
                <a href="cart.php">
                    <i class="flaticon-shop"></i>
                    <span><?=$nbr?></span>
                </a>

                <div class="add-to-cart-product">
                    <?php

                    $total = 0;
                    $subtotal=0;
                    $nbr=0;
                    if(!empty($_SESSION['cart'])){

                        foreach($_SESSION["cart"] as $keys => $values)
                        {
                            $total += ($values['qty'] * $values['prix']);
                            $subtotal +=  $values['prix'];
                            $nbr+=$values['qty'];


                            ?>
                    <div class="cart-product">

                        <div class="cart-product-image">
                            <a href="single-product.html">
                                <img src="a.png" alt="">
                            </a>
                        </div>
                        <div class="cart-product-info">
                            <p>
                                <span><?= $values['qty'] ;?></span>
                                x
                                <a href="single-product.html"><?= $values['nom'] ;?></a>
                            </p>
                            <a href="single-product.html"></a>
                            <span class="cart-price">$ <?= $values['prix'] ;?></span>
                        </div>
                        <div class="cart-product-remove">
                            <a href="SupprimerPanier.php?id=<?= $values['id'] ;?>">
                            <i class="fa fa-times"></i>
                            </a>
                        </div>

                    </div>
                    <?php } }?>
                    <div class="total-cart-price">
                        <div class="cart-product-line fast-line">
                            <span>Shipping</span>
                            <span class="free-shiping"><?= $subtotal ?>DT</span>
                        </div>
                        <div class="cart-product-line">
                            <span>Total</span>
                            <span class="total"><?= $total ?>DT</span>
                        </div>
                    </div>

                    <div class="cart-checkout">
                        <a href="chekout.php">
                            Check out
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="cart-checkout">
                        <a href="cart.php">
                            View Cart
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>

                </div>

            </li>
        </ul>
    </div>
</div>