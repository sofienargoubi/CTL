            <div class="wrap cf">
                    <h1 class="projTitle"> Shopping Cart</h1>
                    <div class="heading cf">
                        <h1>My Cart</h1>
                        <a href="shop.php" class="continue">Continue Shopping</a>
                    </div>

                    <div class="cart">
                        <?php
                        $total = 0;
                        $subtotal=0;
                        $i=0;


                        if(!empty($_SESSION['cart']))
                        {
                        foreach($_SESSION['cart'] as $keys => $values)
                        {
                        $total +=($values['qty'] * $values['prix']);
                        $subtotal +=  $values['prix'];
                        if($i % 2 ==0)
                        {

                        ?>

                        <ul class="cartWrap">
                            <form action="ModifierPanier.php?id=<?= $values['id'] ;?>" method="post">
                            <li class="items odd">
                                <div class="infoWrap">
                                    <div class="cartSection">

                                        <img src="a.png" alt="" class="itemImg" />

                                        <h3><?= $values['nom']; ?></h3>

                                        <p> <input type="number" min="1" name="qty" value="<?= $values['qty']; ?>" class="qty" placeholder="3"/> x <?= number_format($values['prix'],2); ?>TND</p><br>
                                        <button type="submit" class="" name="edit" value="edit" style="font-size:20px;width: 59px;height: 29px"><i class="fa fa-edit" style="color: #A94442"></i></button>

                                    </div>


                                    <div class="prodTotal cartSection">
                                        <p><?= number_format($values['prix']*$values['qty'],2); ?>TND</p>
                                    </div>
                                    <div class="cartSection removeWrap">
                                        <a href="SupprimerPanier.php?id=<?= $values['id'] ;?>" class="remove">x</a>
                                    </div>
                                </div>
                            </li>
                        </form>
                            <!--<li class="items even">Item 2</li>-->
<?php } else {?>
                        </ul>

                            <ul class="cartWrap">
                                <form action="ModifierPanier.php?id=<?= $values['id'] ;?>" method="post">
                                <li class="items even">
                                    <div class="infoWrap">
                                        <div class="cartSection">

                                            <img src="a.png" alt="" class="itemImg" />

                                            <h3><?= $values['nom']; ?></h3>

                                            <p> <input type="number" name="qty" min="1" value="<?= $values['qty']; ?>" class="qty" placeholder="3"/> x <?= number_format($values['prix'],2); ?>TND</p><br>
                                            <button name="edit" style="font-size:20px;width: 59px;height: 29px"><i class="fa fa-edit" style="color: #A94442"></i></button>

                                        </div>


                                        <div class="prodTotal cartSection">
                                            <p><?= number_format($values['prix']*$values['qty'],2); ?>TND</p>
                                        </div>
                                        <div class="cartSection removeWrap">
                                            <a href="SupprimerPanier.php?id=<?= $values['id'] ;?>" class="remove">x</a>
                                        </div>
                                    </div>
                                </li>
                                </form>
                                <!--<li class="items even">Item 2</li>-->

                            </ul>
                        <?php }$i++;}}?>
                    </div>





                <div class="subtotal cf">
                    <ul>
                        <li class="totalRow"><span class="label">Subtotal</span><span class="value"><?= number_format($subtotal, 2); ?>TND</span></li>
                        <li class="totalRow final"><span class="label">Total</span><span class="value"><?= number_format($total, 2); ?>TND</span></li>
                        <li class="totalRow"><a href="chekout.php" class="btn continue">Checkout</a></li>
                    </ul>
                </div>
        </div>



