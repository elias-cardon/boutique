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
        $name = $this->fm->validation($data['name']);
        $name = mysqli_real_escape_string($this->db->link, $name);

        $city = $this->fm->validation($data['city']);
        $city = mysqli_real_escape_string($this->db->link, $city);

        $zip = $this->fm->validation($data['zip']);
        $zip = mysqli_real_escape_string($this->db->link, $zip);

        $email = $data['email'];
        $email = mysqli_real_escape_string($this->db->link, $email);

        $address = $this->fm->validation($data['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);

        $country = $this->fm->validation($data['country']);
        $country = mysqli_real_escape_string($this->db->link, $country);
        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $pass = $this->fm->validation(md5($data['pass']));
        $pass = mysqli_real_escape_string($this->db->link, $pass);
        //check empty value
        if (empty($name) or empty($city) or empty($zip) or empty($email) or empty($address) or empty($country) or empty($phone) or empty($pass))
        {
            $msg = "<span class='error'>Aucun champs ne doit être vide !</span>";
            return $msg;
        }
        $ckemail = "SELECT * FROM tbl_customer WHERE email='$email'";
        $result = $this->db->select($ckemail);
        if ($result != false) {
            $msg = "<span class='error'>Cette adresse email est déjà utilisée !.</span>";
            return $msg;
        }else{
            $sql = "INSERT INTO tbl_customer(name,city,zip,email,address,country,phone,pass) VALUES('$name','$city','$zip','$email','$address','$country','$phone','$pass')";
            $inserted = $this->db->insert($sql);
            if ($inserted) {
                $msg = "<span class='success'>Inscription réussie !</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Inscription ratée !</span>";
                return $msg;
            }
        }

    }
    //customer login
    public function customerLogin($data){
        $email = $data['uemail'];
        $email = mysqli_real_escape_string($this->db->link, $email);
        $pass = $this->fm->validation(md5($data['password']));
        $pass = mysqli_real_escape_string($this->db->link, $pass);
        if (empty($email) or empty($pass))
        {
            $msg = "<span class='error'>Aucun champs ne doit être vide !</span>";
            return $msg;
        }else{
            $sql = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
            $result = $this->db->select($sql);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("cslogin",true);
                Session::set("csid",$value['csId']);
                Session::set("csname",$value['name']);
                header("Location: cart.php");
            }else{
                $msg = "<span class='error'>L'email ou le mot de passe ne correspond pas !</span>";
                return $msg;
            }
        }
    }
    //get single customer information
    public function getCustomerInfo($csid){
        $sql = "SELECT * FROM tbl_customer WHERE csId='$csid'" ;
        $result = $this->db->select($sql);
        return $result;
    }
    //customer profile update
    public function customerProfileUpdate($data,$cid){
        $name = $this->fm->validation($data['name']);
        $name = mysqli_real_escape_string($this->db->link, $name);

        $city = $this->fm->validation($data['city']);
        $city = mysqli_real_escape_string($this->db->link, $city);

        $zip = $this->fm->validation($data['zip']);
        $zip = mysqli_real_escape_string($this->db->link, $zip);

        $address = $this->fm->validation($data['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);

        $country = $this->fm->validation($data['country']);
        $country = mysqli_real_escape_string($this->db->link, $country);
        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        //check empty value
        if (empty($name) or empty($city) or empty($zip) or empty($address) or empty($country) or empty($phone))
        {
            $msg = "<span class='error'>Aucun champs ne doit être vide !</span>";
            return $msg;
        }else{
            $sql = "UPDATE tbl_customer
					 SET 
					 name = '$name',
					 city = '$city',
					 zip = '$zip',
					 address = '$address',
					 country = '$country',
					 phone = '$phone'
					 WHERE csId='$cid' ";
            $result = $this->db->update($sql);
            if ($result) {
                $msg = "<span class='success'>Profil modifié avec succéès !</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Mise à jour ratée ...</span>";
                return $msg;
            }
        }

    }
    //Order Product and save order info in tbl_order
    public function orderProduct($csid){
        $sid = session_id();
        $sql = "SELECT * FROM tbl_cart WHERE sessionId = '$sid'";
        $cartinfo = $this->db->select($sql);
        if ($cartinfo) {
            while ($getCart = $cartinfo->fetch_assoc()) {
                $pdid = $getCart['productId'];
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
            $msg = "<span class='success'>Order shifted Successfully !</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Mise à jour ratée ...</span>";
            return $msg;
        }
    }
    //delete order which is confirmed by customer
    public function deleteConfirmOrder($id, $price, $time){
        $sql = "DELETE FROM tbl_order WHERE csId='$id' AND price='$price' AND Date='$time'";
        $result = $this->db->delete($sql);
        if ($result) {
            $msg = "<span class='error'>Confirmed Order Successfully Deleted !</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Suppression ratée ...</span>";
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
            $msg = "<span class='success'>Merci d'avoir finaliser la commande !</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Confirmation ratée ...</span>";
            return $msg;
        }
    }

//end of customer class
}
?>