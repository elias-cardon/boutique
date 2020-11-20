<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	include "../classes/Product.php";
	include_once "../helpers/Format.php";
?>
<?php
	$pd = new Product();
	$fm = new Format();

	if (isset($_GET['delpd'])) {
        $delid = $_GET['delpd'];
        $delprod = $pd->deleteProduct($delid);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Liste de produits</h2>
        <div class="block">  
        	<?php
            	if (isset($delprod)) {
            		echo $delprod."<br>";
            	}
             ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Nom du produit</th>
					<th>Categorie</th>
					<th>Marque</th>
					<th>Description</th>
					<th>Prix</th>
					<th>Image</th>
					<th>type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$plist = $pd->getAllProduct();
					if ($plist) {
						while ($row = $plist->fetch_assoc()) {
				
				?>
				<tr class="odd gradeX">
					<td  style="width:100px"><?php echo $row['productName'];?></td>
					<td><?php echo $row['catName'];?></td>
					<td><?php echo $row['brandName'];?></td>
					<td style="width:200px"><?php echo $fm->textShorten($row['body'],50);?></td>
					<td class="center"><?php echo $row['price'];?></td>
					<td><img width="50" height="50" src="<?php echo $row['image'];?>" alt="<?php echo $row['productName'];?>"></td>
					<td class="center"><?php
							if ($row['type'] == 1) {
								echo "Featured";
							}else{
								echo "General";
							}
						?>
					</td>
					<td><a href="productedit.php?prodid=<?php echo $row['pid']; ?>">Editer</a> || <a href="?delpd=<?php echo $row['pid'];?>" onclick="return confirm('Confirmatin suppression');">Supprimer</a></td>
				</tr>
				<?php
						}
					}
				?>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
