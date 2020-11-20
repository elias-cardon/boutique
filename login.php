<?php
	include("include/header.php");
?>
<?php
	$login = Session::get('cslogin');
	if ($login == true) {
		header("Location: order.php");
	}
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $cslogin = $csmr->customerLogin($_POST);
    }
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Compte existant</h3>
        	<?php 
    			if (isset($cslogin)) {
    				echo $cslogin;
    			}
    		?>
        	<p>Veuillez remplir le formulaire</p>
        		<form action="" method="POST" id="member">
                	<input name="uemail" type="text" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Password" >
                    <div class="buttons"><div><button class="grey" name="login">Se connecter</button></div></div>
                    </div>
                 </form>

                   
    <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        	$csReg = $csmr->customerReg($_POST);
    	}
	?>
    	<div class="register_account">
    		<h3>Nouveau compte</h3>
    		<?php 
    			if (isset($csReg)) {
    				echo $csReg;
    			}
    		?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name ="name" placeholder="Nome"/>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Ville" />
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Code postal" >
							</div>
							<div>
								<input type="text" name="email" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Adresse">
						</div>
		    		<div>
						<input type="text" name="country" placeholder="Pays" >
				  </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Téléphone">
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="Mot de passe">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">S'inscrire</button></div></div>
		    <p class="terms">En cliquant sur 'S'inscrire', vous acceptez les <a href="CGU.php">Conditions générales d'utilisation</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>

<?php
	include("include/footer.php");
?>
