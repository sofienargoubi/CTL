<div class="col-md-1 hidden-sm">
    <div class="header-right">
        <ul>
        <?php
        $notif=new NotificationC();
        $notifF=new NotifF();
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

                        <div class="total-cart-price">
                        <div class="cart-product-line fast-line">
                            <?php     $list=$notif->afficherNotification($_SESSION['mail']);

                          if ($ns!=0) {foreach ($ll as $roww) {
                            ?>
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
                            <div class="cart-product-line">
                                                <p>
                                                    <h6><span><?=$_SESSION['Nom']?></span></h6>
                                                    <span><?=$_SESSION['mail']?></span>
                                                </p>
                                                
                                            </div>
                                        </div>
                                        <div class="total-cart-price">
                                            <div class="cart-product-line fast-line">
                                                <a href="profile.php">Mon compte</a>
                                            </div>
                                            <div class="cart-product-line">
                                                <a href="changermdp.php">Changer mot de passe</a>
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
                    <span>0</span>
                </a>
                <div class="add-to-cart-product">
                        <div class="cart-product-line">
                            <span>Empty Cart</span>
                        </div>
                </div>
            </li>
        </ul>
    </div>
</div>