<?php
	include("include/header.php");
?>
<?php
	$login = Session::get('cslogin');
	if ($login == false) {
		header("Location: login.php");
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width:100%;text-align:center">Compare Product</h2>
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
					    <?php
					    	$csid = Session::get('utilisateurs_id');
							$getProd = $pd->getComparedData($csid);
							if ($getProd) {
								$i = 1;
								while ($cartpd = $getProd->fetch_assoc()) {
					   	?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $cartpd['produit_nom'];?></td>
								<td>€ <?php echo $cartpd['prix'];?></td>
								<td><img src="admin/<?php echo $cartpd['image'];?>" alt=""/></td>
								<td><a href="details.php?pdid=<?php echo $cartpd['produit_id'];?>">View</a></td>
		
							</tr>

						<?php $i++; } } ?>

						</table>
						
					</div>
					<div class="shopping" style="width:600px;margin:0 auto;">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
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
