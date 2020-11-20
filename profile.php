<?php
	include("include/header.php");
?>
<?php
	$login = Session::get('cslogin');
	if ($login == false) {
		header("Location: login.php");
	}
?>
<style>
.errpage{
	text-align: center;
	font-size: 100px;
	color: red
}
</style>
 <div class="main">
    <div class="content">
		<div class="section group">
	   <?php 
			$csid = Session::get('csid');
			$getCsInfo = $csmr->getCustomerInfo($csid);
			if ($getCsInfo) {
				while ($row = $getCsInfo->fetch_assoc()) {

		?>
			<table class="tblone">
				<tr><td colspan='3'><h2 style="text-align:center">Les détails de votre profil</h2></td></tr>
				<tr>
					<td>Nom</td>
					<td>:</td>
					<td><?php echo $row['name'];?></td>
				</tr>
				<tr>
					<td>Ville</td>
					<td>:</td>
					<td><?php echo $row['city'];?></td>
				</tr>
				<tr>
					<td>Code postal</td>
					<td>:</td>
					<td><?php echo $row['zip'];?></td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>:</td>
					<td><?php echo $row['email'];?></td>
				</tr>
				<tr>
					<td>Adresse</td>
					<td>:</td>
					<td><?php echo $row['address'];?></td>
				</tr>
				<tr>
					<td>Pays</td>
					<td>:</td>
					<td><?php echo $row['country'];?></td>
				</tr>
				<tr>
					<td>Téléphone</td>
					<td>:</td>
					<td><?php echo $row['phone'];?></td>
				</tr>
				<tr><td colspan='3'><h2 style="text-align:center"><button ><a href="editprofile.php">Edit profile</a></button></h2></td></tr>
			</table>

			<?php } }?>

		</div>
       <div class="clear"></div>
    </div>
 </div>
</div>

 <?php
	include("include/footer.php");
?>
