<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Aracımnet-GİRİŞ</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
	<div class="header">
		<h2>Aracımnet-Login</h2>
	</div>
	<form method="post" action="aracim1net.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Kullanıcı Adı</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Şifre</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">GİRİŞ</button>
		</div>
		<p>
			
			
			Şifremi Unuttum <a href="reset.php">Sıfırla</a>
		</p>
	</form>
</body>
</html>