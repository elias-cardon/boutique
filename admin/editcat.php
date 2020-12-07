<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
include "../classes/Category.php";
?>
<?php
if (!isset($_GET['catid']) && $_GET['catid'] == NULL) {
    echo "<script>window.location='catlist.php';</script>";
} else {
    $catid = $_GET['catid'];
}
//creat object of Category class
$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catname = $_POST['catName'];
    $updateCat = $cat->updateCat($catname, $catid);
}
?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Mise à jour de la catégorie</h2>
            <div class="block copyblock">
                <?php
                if (isset($updateCat)) {
                    echo "$updateCat";
                }
                ?>
                <form action="" method="post">
                    <table class="form">
                        <?php
                        $singleCat = $cat->getCatbyId($catid);
                        if ($singleCat) {
                            while ($row = $singleCat->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td>
                                        <input type="text" placeholder="Entrer le nom de la catégorie" name="catName"
                                               value="<?php echo $row['catName']; ?>" class="medium"/>
                                    </td>
                                </tr>

                            <?php }
                        } ?>
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