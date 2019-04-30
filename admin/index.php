<?php
if(isset($_POST["Login"])){
	$id = 'admin';
	$pass = 'admin';	
	if($id==$_POST["id"]&&$pass==$_POST["pass"]) {
		header("Location: delproduct.php");
		}
	else{
		echo "<script>alert('Password does not Match !!!');</script>";
		}
}

?>	

<html>
<head>
    <title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
<header>
	<center>
	<h1>Canteen Billing System</h1>
	</center>
</header>	
    <div class="login" style="width:360px;">
        <h1 align="center">Admin Login</h1>
        <form method="post" style="text-align:center;">
            <input placeholder="Username" type="text" name="id">
            <br>
            <br>
            <input placeholder="Password" type="password" name="pass">
            <br>
            <br>
            <input type="submit" value="Login" name="Login"><span></span>
		</form>
    </div>
</body>

</html>