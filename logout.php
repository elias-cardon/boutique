<?php
session_name('logout');
session_start();
session_destroy();

header("Location:index.php");

session_write_close();
?>