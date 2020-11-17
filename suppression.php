<?Php
require_once 'src/php/Base.php';
$User = new Base\User();
$User->DeleteTable();
header('Location: Users.php');
?>