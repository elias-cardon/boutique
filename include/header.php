<?php 
    include "libs/session.php";
    Session::init();
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../libs/Database.php");
    include_once ($filepath."/../helpers/Format.php");

    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });

    //creating object of classes
    $db = new Database();
    $fm = new Format();
    $pd = new Product();
    $ct = new Cart();
    $cat= new Category();
    $csmr = new Customer();
?>

<?php
//code for cache-control
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>La Bonne Planque</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="src/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="src/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="src/js/jquerymain.js"></script>
<script src="src/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="src/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="src/js/nav.js"></script>
<script type="text/javascript" src="src/js/move-top.js"></script>
<script type="text/javascript" src="src/js/easing.js"></script> 
<script type="text/javascript" src="src/js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <ul>
                    
                    <li>
                        <h3>La Bonne Planque</h3>
                    </li>
                </ul>
            </div>
              <div class="header_top_right">
               <!--  <div class="search_box">
                    <form>
                        <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
                    </form>
                </div> -->
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="cart.php" title="Voir le panier" rel="nofollow">
                                <span class="cart_title">Panier</span>
                                <span class="no_product">
                                    <?php
                                    $getData = $ct->checkCartTable();
                                    if ($getData) {
                                        $sum = Session::get("cart");
                                        $qty = Session::get("qty");
                                            echo "Qté: " .$qty. " ~ ".$sum." €";
                                    }else{
                                        echo "(Vide)";
                                    }
                                        
                                    ?>
                                </span>
                            </a>
                        </div>
                  </div>
    <?php
        if (isset($_GET['csid'])) {
            $delCart = $ct->delCustomerCart();
            $delCompare = $pd->delCustomerCompare(Session::get('csid'));
            Session::destroy();
        }
    ?>
           <div class="login">
        <?php
            $login = Session::get('cslogin');
            if ($login == true) {
        ?>
            <a href="?csid=<?php echo Session::get('csid'); ?>">Déconnexion</a>

        <?php }else{  ?>
            <a href="login.php" title="Pour se connecter">Connexion</a>
       <?php } ?>
           
           </div>
         <div class="clear"></div>
     </div>
     <div class="clear"></div>
 </div>
<div class="menu">
    <ul id="dc_mega-menu-orange" class="dc_mm-orange">
      <li><a href="index.php">Accueil</a></li>
     <!--  <li><a href="topbrands.php">Top Brands</a></li> -->
       <?php
        $ckCompare = $pd->checkCompareData(Session::get('csid'));
        if ($ckCompare) { ?>
            <li><a href="compare.php" title="Pour comparer">Comparaison</a></li>
        <?php } ?>

         <?php
        $ckwlist = $pd->checkWishlistData(Session::get('csid'));
        if ($ckwlist) { ?>
            <li><a href="wishlist.php" title="Voir la wishlist">Wishlist</a></li>
        <?php } ?>

        <?php 
        $chkCart = $ct->checkCartTable();
        if ($chkCart) { ?>
            <li><a href="cart.php">Panier</a></li>
            <li><a href="payment.php" title="Pour payer">Paiement</a></li>
        <?php } ?>
      
      <?php 
        $csid = Session::get('csid');
        $ckorder = $csmr->checkOrder($csid);
        if ($ckorder) { ?>
            <li><a href="orderdetails.php" title="Voir les commandes">Commandes</a></li>
        <?php } ?>

      <?php
        $userlogin = Session::get('cslogin');
        if ($userlogin == true) { ?>
        <li><a href="profile.php" title="Voir le profil">Profil</a></li>
      <?php } ?>
      
      <li><a href="contact.php" title="Pour nous contacter">Contact</a> </li>
      <div class="clear"></div>
    </ul>
</div>
<style>
    .shopping_cart{
    float:left;
    /*width: 202px;*/
    position:relative;
    margin-left:15px;
    padding: 0 0 0 46px;
    background: url(../images/header_cart.png) 0 0 no-repeat;
    z-index: 99;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    cursor:pointer;
}
    .cart{
    height: 38px;
    width : 10em;
    padding: 0 0 0 10px;
    background: #EDEDED;
    border: 1px solid #CECECE;
    border-left: none;
    line-height: 36px;
    -webkit-border-radius: 0 2px 2px 0;
    border-radius: 0 2px 2px 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.login {
    background: rgba(0, 0, 0, 0) url("../images/gradient_light-1.png") repeat-x scroll 0 0;
    border: 1px solid #cecece;
    box-sizing: border-box;
    color: #444;
    display: block;
    float: left;
    font-size: 27px;
    height: 38px;
    margin-left: 10px;
    text-align: center;
    width: 7em;
}
</style>