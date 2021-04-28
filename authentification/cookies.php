<?php
setcookie("email", NULL, time() + (86400 * 100), "/"); // 86400 = 1 day
setcookie("password", NULL, time() + (86400 * 100), "/"); // 86400 = 1 day
//setcookie("name", FALSE, time() + (86400 * 30), "/"); // 86400 = 1 day

//print_r($_COOKIE);
/*session_start();

?>
<form action="" method="post">
<input type="text" placeholder="email" name="email" required>
<button type="submit">Submit</button>
</form>
<?php

$_SESSION['email']=$_REQUEST['email']; //cookies
echo($_POST['email']);
print_r($_SESSION);

if(isset($_SESSION["email"])){
    header("Location: test.php");
}
?>*/