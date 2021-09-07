
<?php
session_start();
unset($_SESSION["shopping_cart"]);
unset($_SESSION['email']);
session_destroy();
header("Location:Main.php");
?>