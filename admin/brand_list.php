<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include "../classes/Brand.php";
?>
<?php
    $brand = new Brand();

    $allBrand = $brand->getAllbrand();

    //delete Brand
    if (isset($_GET['delid']) && $_GET['delid'] != NULL) {
    	$delid = $_GET['delid'];
    	$delbrand = $brand->delBrand($delid);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Liste des marques</h2>
                <?php
                	if (isset($delbrand)) {
                		echo $delbrand;
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>N°</th>
							<th>Nom de la marque</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if ($allBrand) {
								$i = 1;
								while ($row = $allBrand->fetch_assoc()) {
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['brandName']; ?></td>
							<td><a href="brandedit.php?bid=<?php echo $row['brandId'] ?>">Editer</a> || <a href="?delid=<?php echo $row['brandId'] ?>" onclick="return confirm('Confirmation suppression')">Supprimer</a></td>
						</tr>
						
						<?php
							$i++;
							}
							}else{
								echo "Marque introuvable!";
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

