<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
include "../classes/Brand.php";
?>
<?php
$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandname = $_POST['brandName'];
    $insertBrand = $brand->insertBrand($brandname);
}
?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Ajouter une nouvelle marque</h2>
            <div class="block copyblock">
                <?php
                if (isset($insertBrand)) {
                    echo "$insertBrand";
                }
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" placeholder="Entrer le nom de la marque" name="brandName"
                                       class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Sauvegarder"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>