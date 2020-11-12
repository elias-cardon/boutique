<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>
<?php
/**
* Users class 
*/
class Customer
{
	private $db;
	private $fm;

	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function customerReg($data){
		$nom = $this->fm->validation($data['nom/prenom']);
		$nom = mysqli_real_escape_string($this->db->link, $nom);

		$ville = $this->fm->validation($data['ville']);
		$ville = mysqli_real_escape_string($this->db->link, $ville);

		$postal = $this->fm->validation($data['postal']);
		$postal = mysqli_real_escape_string($this->db->link, $postal);

		$email = $data['email'];
		$email = mysqli_real_escape_string($this->db->link, $email);

		$adresse = $this->fm->validation($data['adresse']);
		$adresse = mysqli_real_escape_string($this->db->link, $adresse);

		$pays = $this->fm->validation($data['pays']);
	    $pays = mysqli_real_escape_string($this->db->link, $pays);
	    $telephone = $this->fm->validation($data['telephone']);
	    $telephone = mysqli_real_escape_string($this->db->link, $telephone);
	    $password = $this->fm->validation(md5($data['password']));
	    $password = mysqli_real_escape_string($this->db->link, $password);
	    //check empty value
	    if (empty($nom) or empty($ville) or empty($postal) or empty($email) or empty($adresse) or empty($pays) or empty($telephone) or empty($password))
		{
			$msg = "<span class='error'>Fields must not be empty !.</span>";
			return $msg;
		}
		$ckemail = "SELECT * FROM utilisateurs WHERE email='$email'";
		$result = $this->db->select($ckemail);
		if ($result != false) {
			$msg = "<span class='error'>This email already registered !.</span>";
			return $msg;
		}else{
			 $sql = "INSERT INTO utilisateurs(nom,ville,postal,email,adresse,pays,telephone,password) VALUES('$nom','$ville','$zip','$email','$adresse','$pays','$telephone','$password')";
		    $inserted = $this->db->insert($sql);
		    if ($inserted) {
		    	$msg = "<span class='success'>Customer Registered successfully !.</span>";
			    return $msg;
		    }else{
		    	$msg = "<span class='error'>Registration failed !.</span>";
				return $msg;
		    }
		}
		
	}
	//customer login
	public function customerLogin($data){
		$email = $data['mail'];
		$email = mysqli_real_escape_string($this->db->link, $email);
		$password = $this->fm->validation(md5($data['password']));
	    $password = mysqli_real_escape_string($this->db->link, $password);
	    if (empty($email) or empty($password))
		{
			$msg = "<span class='error'>Fields must not be empty !.</span>";
			return $msg;
		}else{
			$sql = "SELECT * FROM utilisateurs WHERE email='$email' AND password='$password'";
			$result = $this->db->select($sql);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("login",true);
				Session::set("id",$value['csId']);
				Session::set("name",$value['name']);
				header("Location: cart.php");
			}else{
				$msg = "<span class='error'>email or password not matched !.</span>";
				return $msg;
			}
		}
	}
	//get single customer information
	public function getCustomerInfo($csid){
		$sql = "SELECT * FROM utilisateurs WHERE id='$id'" ;
		$result = $this->db->select($sql);
		return $result;
	}
	//customer profile update
	public function customerProfileUpdate($data,$cid){
		$nom = $this->fm->validation($data['nom']);
		$nom = mysqli_real_escape_string($this->db->link, $nom);

		$ville = $this->fm->validation($data['ville']);
		$ville = mysqli_real_escape_string($this->db->link, $ville);

		$ville = $this->fm->validation($data['ville']);
		$ville = mysqli_real_escape_string($this->db->link, $ville);

		$adresse = $this->fm->validation($data['adresse']);
		$adresse = mysqli_real_escape_string($this->db->link, $adresse);

		$pays = $this->fm->validation($data['pays']);
	    $pays = mysqli_real_escape_string($this->db->link, $pays);
	    $telephone = $this->fm->validation($data['telephone']);
	    $telephone = mysqli_real_escape_string($this->db->link, $telephone);
	    //check empty value
	    if (empty($nom) or empty($ville) or empty($ville) or empty($adresse) or empty($pays) or empty($telephone))
		{
			$msg = "<span class='error'>Fields must not be empty !.</span>";
			return $msg;
		}else{
			$sql = "UPDATE tbl_customer
					 SET 
					 nom = '$nom',
					 ville = '$ville',
					 ville = '$ville',
					 adresse = '$adresse',
					 pays = '$pays',
					 telephone = '$telephone'
					 WHERE id='$id' ";
			$result = $this->db->update($sql);
			if ($result) {
				$msg = "<span class='success'>Profile Successfully Updated !.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Filed to Update !.</span>";
				return $msg;
			}
		}
		
	}
	//Order Product and save order info in tbl_order
	public function orderProduct($csid){
		$sid = session_id();
		$sql = "SELECT * FROM panier WHERE sessionId = '$sid'";
		$cartinfo = $this->db->select($sql);
		if ($cartinfo) {
			while ($getCart = $cartinfo->fetch_assoc()) {
				$pdid = $getCart['produit_id'];
				$productName = $getCart['productName'];
				$quantity = $getCart['quantity'];
				$price = $getCart['price']*$quantity;
				$image = $getCart['image'];
				$insertsql = "INSERT INTO tbl_order(csId,productId,productName,quantity,price,image) VALUES('$csid','$pdid','$productName','$quantity','$price','$image')";
		        $inserted = $this->db->insert($insertsql);
			}
		}
	}
	//get payable amount of customer
	public function payableAmount($csid){
		$sql = "SELECT price FROM tbl_order WHERE csId='$csid' and Date=now() ";
		$result = $this->db->select($sql);
		return $result;

	}
	//get order details by customer ID
	public function getOrderProduct($csid){
		$sql = "SELECT * FROM tbl_order WHERE csId='$csid' ORDER BY id DESC";
		$result = $this->db->select($sql);
		return $result;
	}
	//check order table by user id
	public function checkOrder($csid){
		$sql = "SELECT * FROM tbl_order WHERE csId = '$csid' ";
		$result = $this->db->select($sql);
		return $result;
	}

	//get all order product for Admin
	public function getAllorder(){
		$sql = "SELECT * FROM tbl_order ORDER BY Date";
		$result = $this->db->select($sql);
		return $result;
	}
	//shifted order..update order table
	public function shiftedOrder($id, $price, $time){
		$sql = "UPDATE tbl_order
					 SET  
					 status = 1
					 WHERE csId='$id' AND price='$price' AND Date='$time' ";
			$result = $this->db->update($sql);
			if ($result) {
				$msg = "<span class='success'>Order shifted Successfully !.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Filed to Update !.</span>";
				return $msg;
			}
	}
	//delete order which is confirmed by customer
	public function deleteConfirmOrder($id, $price, $time){
		$sql = "DELETE FROM tbl_order WHERE csId='$id' AND price='$price' AND Date='$time'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = "<span class='error'>Confirmed Order Successfully Deleted !.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Failed to Delete.</span>";
			return $msg;
		}
	}
	//confirm order by customer
	public function confirmByCustomer($id, $price, $time){
		$sql = "UPDATE tbl_order
					 SET  
					 status = 2
					 WHERE csId='$id' AND price='$price' AND Date='$time' ";
			$result = $this->db->update($sql);
			if ($result) {
				$msg = "<span class='success'>Thanks for Confirm the order !.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Filed to confirm !.</span>";
				return $msg;
			}
	}

//end of customer class
}
?>