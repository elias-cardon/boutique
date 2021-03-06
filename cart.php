<?php
include("include/header.php");
?>
<?php
if (isset($_GET['delCart'])) {
    $delCart = $_GET['delCart'];
    $deleteCart = $ct->deleteCart($delCart);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartid = $_POST['cartid'];
    $quant = $_POST['pdquantity'];
    if ($quant <= 0) {
        $deleteCart = $ct->deleteCart($cartid);
    } else {
        $cartQuantity = $ct->updateCartQuantity($quant, $cartid);
    }
}
?>
<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live' />";
}
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Le panier</h2>
                <span style="color:green">
			    	<?php
                    if (isset($deleteCart)) {
                        echo $deleteCart;
                    }
                    ?>
			       </span>
                <span style="color:green">
			    	<?php
                    if (isset($cartQuantity)) {
                        echo $cartQuantity;
                    }
                    ?>
				    </span><br><br>
                <table class="tblone">
                    <tr>
                        <th width="5%">N°</th>
                        <th width="20%">Nom du produit</th>
                        <th width="20%">Image</th>
                        <th width="15%">Prix</th>
                        <th width="25%">Quantité</th>
                        <th width="20%">Prix total HT</th>
                        <th width="10%">Supprimer</th>
                    </tr>
                    <?php
                    $getProd = $ct->getCartProduct();
                    if ($getProd) {
                        $sum = 0;
                        $qty = 0;
                        $i = 1;
                        while ($cartpd = $getProd->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $cartpd['productName']; ?></td>
                                <td><img src="admin/<?php echo $cartpd['image']; ?>" alt=""/></td>
                                <td><?php echo $cartpd['price']; ?> €</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="cartid" value="<?php echo $cartpd['cartId']; ?>"/>
                                        <input type="number" name="pdquantity"
                                               value="<?php echo $cartpd['quantity']; ?>"/>
                                        <input type="submit" name="submit" value="Changer"/>
                                    </form>
                                </td>
                                <td><?php
                                    $sp = $cartpd['price'];
                                    $qn = $cartpd['quantity'];
                                    $total = $sp * $qn;
                                    echo $total;

                                    ?></td>
                                <td><a href="?delCart=<?php echo $cartpd['cartId']; ?>">X</a></td>
                            </tr>
                            <?php
                            $sum = $total + $sum;
                            $qty = $qty + $cartpd['quantity'];
                            Session::set("cart", "$sum");
                            Session::set("qty", "$qty");
                            ?>

                            <?php $i++;
                        }
                    } ?>

                </table>
                <?php
                $getData = $ct->checkCartTable();
                if ($getData) {
                    ?>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr>
                            <th>Total HT :</th>
                            <td> <?php echo $sum; ?> €</td>
                        </tr>
                        <tr>
                            <th>TVA :</th>
                            <th> 20%</th>
                        </tr>
                        <tr>
                            <th>Total TTC :</th>
                            <td> <?php
                                $vat = ($sum * 20) / 100;
                                echo $grandTotal = $sum + $vat;
                                ?> €
                            </td>
                        </tr>
                    </table>
                    <?php
                } else {
                    header("Location: index.php");
                    //please shop now
                }
                ?>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php"> <img src="images/shop.png" alt=""/></a>
                </div>
                <div class="shopright">
                    <a href="payment.php"> <img src="images/check.png" alt=""/></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>

<?php
include("include/footer.php");
?>
