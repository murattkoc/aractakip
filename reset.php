<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
	<h2>RESET PASSWORD</h2>
</div>
<form method="post" action="">

	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username>
	</div>
	<div class="input-group">
		<label>New Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="reset_btn" required >Güncelle</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
<?php 

if(isset($_POST['reset_btn']))
{
	$gel=$_POST['password_1'];
	$sql=mysqli_query($db,"SELECT * FROM users");

while($users=mysqli_fetch_array($sql,MYSQLI_BOTH)){
	
	$a=$users["1"];
	if($_POST["username"]==$a) {
		
		$degisken=mysqli_query("UPDATE users SET password='$gel' WHERE password='$a'");
		
		if($degisken)
			echo "sifre sıfırlandı";
		else echo "tekrar dene";
			
	}
	
	
	
}
}


?>


</body>
</html>