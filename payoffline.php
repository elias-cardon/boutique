<?php
include("include/header.php");
?>
<?php
$login = Session::get('cslogin');
if ($login == false) {
    header("Location: login.php");
}
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $csid = Session::get('csid');
    $insertOrder = $csmr->orderProduct($csid);
    $delCart = $ct->delCustomerCart();
    header("Location: success.php");
}
?>
<style>
    .errpage {
        text-align: center;
        font-size: 100px;
        color: red;
    }

    .division {
        width: 510px;
        float: left;
        overflow: hidden;
    }

    .tbl_two {
        overflow: hidden;
        display: block;
        padding: 20px;
        background: #ddd;
    }

    .ordernow a {
        text-decoration: none;
        text-align: center;
        display: block;
        padding: 20px;
        color: #fff;
        font-size: 20px;
        background: green;
        width: 200px;
        margin: 0 auto;
        border-radius: 5px;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="division">
                <!-- Cart info -->
                <table class="tblone">
                    <tr>
                        <td colspan='3'><h2 style="text-align:center">Les détails de votre commande</h2></td>
                    </tr>
                    <tr>
                        <th width="5%">N°</th>
                        <th width="20%">Nom du produit</th>
                        <th width="15%">Prix</th>
                        <th width="25%">Quantité</th>
                        <th width="20%">Total</th>

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
                                <td><?php echo $cartpd['price']; ?> €</td>
                                <td><?php echo $cartpd['quantity']; ?></td>
                                <td><?php
                                    $sp = $cartpd['price'];
                                    $qn = $cartpd['quantity'];
                                    $total = $sp * $qn;
                                    echo $total;

                                    ?></td>
                            </tr>
                            <?php
                            $sum = $total + $sum;
                            $qty = $qty + $cartpd['quantity'];
                            ?>

                            <?php $i++;
                        }
                    } ?>

                </table>
                <!-- grand total table -->
                <table class="tbl_two" style="float:right;text-align:left;" width="50%">
                    <tr>
                        <th>Total HT :</th>
                        <td><?php echo $sum; ?> €</td>
                    </tr>
                    <tr>
                        <th>TVA :</th>
                        <th> 20%</th>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td><?php
                            $vat = ($sum * 20) / 100;
                            echo $grandTotal = $sum + $vat;
                            ?> €
                        </td>
                    </tr>
                    <th>Quantity :</th>
                    <th> <?php echo $qty; ?></th>
                    </tr>
                </table>
            </div>
            <!-- Divided cart info and customer info -->
            <div class="division">
                <!-- Customer info -->
                <?php
                $csid = Session::get('csid');
                $getCsInfo = $csmr->getCustomerInfo($csid);
                if ($getCsInfo) {
                    while ($row = $getCsInfo->fetch_assoc()) {

                        ?>
                        <table class="tblone">
                            <tr>
                                <td colspan='3'><h2 style="text-align:center">Vos informations</h2></td>
                            </tr>
                            <tr>
                                <td>Nom</td>
                                <td>:</td>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td>:</td>
                                <td><?php echo $row['city']; ?></td>
                            </tr>
                            <tr>
                                <td>Code postal</td>
                                <td>:</td>
                                <td><?php echo $row['zip']; ?></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>:</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td>:</td>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                            <tr>
                                <td>Pays</td>
                                <td>:</td>
                                <td><?php echo $row['country']; ?></td>
                            </tr>
                            <tr>
                                <td>Téléphone</td>
                                <td>:</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                                <td colspan='3'>
                                    <h2 style="text-align:center">
                                        <button><a href="editprofile.php">Modifier votre profil</a></button>
                                    </h2>
                                </td>
                            </tr>
                        </table>

                    <?php }
                } ?>

            </div>
        </div>
        <div class="ordernow">
            <a href="?orderid=order">Commander</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>

<?php
include("include/footer.php");
?>
