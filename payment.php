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
	color: red;
}
.payment{
	background: #ddd;
	display: block;
	padding: 50px;
	width: 400px;
	height: 200px;
	margin: 0 auto;
	text-align: center;
}
.payment a{
	text-decoration: none;
	color: white;
	background: purple;
	padding: 10px;
}
.payment h3{
	margin-top: 10px;
	text-align: center;
}
</style>
 <div class="main">
    <div class="content">
		<div class="section group">
	   		<div class="payment">
	   			<h2>Choisissez ce que vous voulez faire</h2><br>
	   			<a href="payoffline.php">Payer</a>
	   			<a href="cart.php">Revenir</a><br><br><br>
	   		</div>
		</div>
       <div class="clear"></div>
    </div>
 </div>
</div>

 <?php
	include("include/footer.php");
?>
