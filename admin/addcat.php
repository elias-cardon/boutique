<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
include "../classes/Category.php";
?>
<?php
$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catname = $_POST['catName'];
    $insertCat = $cat->insertCat($catname);
}
?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Ajouter une nouvelle catégorie</h2>
            <div class="block copyblock">
                <?php
                if (isset($insertCat)) {
                    echo "$insertCat";
                }
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" placeholder="Entrer le nom de la catégorie..." name="catName"
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