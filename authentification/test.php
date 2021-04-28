<?php
$_SESSION["steps"]="gmail";
echo($_SESSION["steps"]); 
/*session_start();
print_r($_SESSION["email"]);
if(isset($_SESSION["email"])){
    setcookie("email", $_SESSION['email'], time() + (86400 * 30), "/");

    print_r($_COOKIE["email"]);
}*/