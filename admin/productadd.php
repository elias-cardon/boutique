<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include "../classes/Category.php";
include "../classes/Brand.php";
include "../classes/Product.php";
?>
<?php

    //Insert product details
    $pd = new Product();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pdInserted = $pd->insertProduct($_POST,$_FILES);
    }
    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Ajouter un nouveau produit</h2>
        <div class="block">           
        <?php
            if (isset($pdInserted)) {
                echo $pdInserted;
            }
        ?>    
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Nom</label>
                    </td>
                    <td>
                        <input type="text"  name="pname" placeholder="Entrer le nom du produit" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Catégorie</label>
                    </td>
                    <td>
                        <select id="select" name="pcategory">
                            <option>Selectionne la catégorie</option>
                            <?php
                                //get all category
                                $cat = new Category();
                                $allcat = $cat-> getAllcat();
                                if ($allcat) {
                                    while ($row = $allcat->fetch_assoc()) {
                        
                                ?>
                                 <option value="<?php echo $row['catId'];?>"><?php echo $row['catName'];?></option>

                            <?php
                                     }
                                }else{
                                    echo "No category found.";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Marque</label>
                    </td>
                    <td>
                        <select id="select" name="pbrand">
                            <option>Selectionne la marque</option>
                             <?php
                                //get all category
                                $brand = new Brand();
                                $allBrand= $brand-> getAllbrand();
                                if ($allBrand) {
                                    while ($row = $allBrand->fetch_assoc()) {
                        
                                ?>
                                 <option value="<?php echo $row['brandId'];?>"><?php echo $row['brandName'];?></option>

                            <?php
                                     }
                                }else{
                                    echo "No Brand found.";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="pdescription"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Prix</label>
                    </td>
                    <td>
                        <input type="text" name="p_price" placeholder="Entrer le prix..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Télécharge l'image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Type de produit</label>
                    </td>
                    <td>
                        <select id="select" name="ptype">
                            <option>Catégorie</option>
                            <option value="1">En tête de liste</option>
                            <option value="2">Général</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Ajouter le Produit" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>