<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>
<?php
/**
* Cart class 
*/
class Cart
{
	private $fm;
	private $db;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCart($quant, $pdid){
		$quant = $this->fm->validation($quant);
		$quant = mysqli_real_escape_string($this->db->link, $quant);
		$pdid  = mysqli_real_escape_string($this->db->link, $pdid);
		$sid   = session_id();

		$sql = "SELECT * FROM produits WHERE id = '$id'";
		$result = $this->db->select($sql)->fetch_assoc();
		$nom = $result['nom'];
		$prix		 = $result['prix'];
		$img 		 = $result['img'];

		$cksql  = "SELECT * FROM panier WHERE produitId = '$id' AND sessionId = '$sid'";
		$ckpd = $this->db->select($cksql);
		if ($ckpd) {
			$msg = "<span class='error'>Product already added to Cart.</span>";
			return $msg;
		}else{
			$insertSql = "INSERT INTO panier(sessionId, productId, nom, prix, quantity, img) VALUES('$id', '$pid', '$nom','$prix','$quant', '$img')";
			$inserted = $this->db->insert($insertSql);
			if ($inserted) {
				header("Location: cart.php");
			}else{
				header("Location: 4040.php");
			}
		}

	}
	//get cart product function
	public function getCartProduct(){
		$sid = session_id();
		$sql = "SELECT * FROM panier WHERE sessionId = '$sid'";
		$result = $this->db->select($sql);
		return $result;
	}
	//update cart quantity
	public function updateCartQuantity($quant, $cartid){
		$sql = "UPDATE panier
				SET
				quantity ='$quant'
				WHERE cartId = '$cartid' ";
		$updated = $this->db->update($sql);
		if ($updated) {
			header("Location: cart.php");
		}else{
			$msg = "<span class='error'>Cart not updated.</span>";
			return $msg;
		}
	}
	//delete cart item
	public function deleteCart($delCart){
		$sql = "DELETE FROM panier WHERE cartId = '$delCart'";
		$result = $this->db->delete($sql);
		if ($result) {
			header("Location: cart.php");
		}
	}
	//check cart table 
	public function checkCartTable(){
		$sid = session_id();
		$sql = "SELECT * FROM panier WHERE sessionId = '$sid'";
		$result = $this->db->select($sql);
		return $result;
	}

	//delete customer cart item
	public function delCustomerCart(){
		$sid = session_id();
		$sql = "DELETE FROM panier WHERE sessionId = '$sid'";
		return $this->db->delete($sql);
	}

}
?>