<?php 
	include('./functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../aracim1net.php');
}
?>

<html><head>
 <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
 <link rel='stylesheet' href='https://daneden.github.io/animate.css/animate.min.css'>

</head>
<body>	
<div class="ana">
<div class="ust"> <form action="araclar.php" method="POST"> 
 <button name="pers" onclick="myFunction()" type="submit" class="buton">Araç Ekle</button></form></div>
	<div class="sol">
	<div class="double">
	<img src="assets/images/1.jpg" width="100" height="100" >
		<div class='ad'>
		<?php  if (isset($_SESSION['user'])) :
		echo  $_SESSION['user']['username'];
		?>			
			<br>
		<i style="font-style: italic;">(
		<?php echo ucfirst($_SESSION['user']['user_type']); ?>
		)</i>	
		<?php endif?>
		</div>
		
	<ul class="nav">
  <a href="admin/aracimnet.php"> <li>
    <i class="fa fa-home"></i>
    <div class="animated slideCenter ">Ana Sayfa</a></div>
  </li>
 <a href="personel.php"> <li>
    <i class="fa fa-user"></i>
    <div class="animated slideInCenter">Personeller</a></div>
  </li>
 <a href="subeler.php"> <li>
    <i class="fa fa-certificate"></i>
    <div class="animated slideInCenter">Şubeler</div>
  </li>
<a href="islemler.php">  <li>
    <i class="fa fa-desktop"></i>
    <div class="animated slideInCenter">Kiralama İşlemleri</div>
  </li>
 <a href="araclar.php"> <li>
    <i class="fa fa-align-right"></i>
    <div class="animated slideInCenter">Araçlar</div>
  </li>    
</ul></div>
<footer>
	<a class='logout'href="../aracim1net.php?logout='1'" style="color: red;">Çıkış</a>
	</footer> </div>
<div class="logout">
	<a class='logout'href="../aracim1net.php?logout='1'" style="color: red;">ÇIKIŞ</a>
	</div>
 <div class="tablo5">
  <table>
  <thead>
  <tr>
    <th>Araç Plaka</th>
    <th>Araç Marka</th>
    <th>Araç Model</th>
    <th>Renk</th>
    <th>Araç Yılı</th>
	<th>KM</th>
	<th>KM Fiyatı</th>
	<th>Hasar</th>
	<th>Bulunduğu Şube</th>
	
  </tr></thead>
  <?php $sorgu=mysqli_query($db,"SELECT * FROM araclar");
	while($sonuc=mysqli_fetch_array($sorgu)) {
			echo "<tr><td>";
			echo $sonuc["plaka"];
			echo "</td><td>";
			echo $sonuc["marka"];
			echo "</td><td>";
			echo $sonuc["model"];
			echo "</td><td>";
			echo $sonuc["renk"];
			echo "</td><td>";
			echo $sonuc["yil"];
			echo "</td><td>";
			echo $sonuc["km"];
			echo "</td><td>";
			echo $sonuc["ucret"];
			echo "</td><td>";
			echo $sonuc["hasar"];
			echo "</td><td>";
			$sube=$sonuc["subeid"];
		$sorgu1=mysqli_query($db,"select * from subeler where subeno='$sube'");
		while($sorgum=mysqli_fetch_array($sorgu1)){
			
			echo $sorgum["adi"];	
			
	}

		
	
	
}


?>
  </div>
	

 
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src='https://use.fontawesome.com/cece742d74.js'></script>
  <script>

function myFunction() {
  var myWindow = window.open("", "", "width=500,height=500");
  myWindow.document.write("<form action='./aracekle.php' method='POST'><table border='1'><tr><td bgcolor='green'colspan='2' align='center'>Araç Ekleme</td></tr><tr><td>Plaka:</td><td><input type='text' name='plaka'></td></tr><tr><td>yil:</td><td><input type='text' name='yil'></td></tr><td>Marka:</td><td><input type='text' name='marka'></td></tr><tr><td>KM:</td><td><input type='text' name='km'></td></tr><tr><td>Fiyat:</td><td><input type='text' name='ucret'></td></tr><tr><td>Hasar:</td><td><input type='text' name='hasar'></td></tr><tr><td>Model:</td><td><input type='text' name='model'></td></tr><tr><td>Renk:</td><td><input type='text' name='renk'></td></tr><tr><td>ŞUBE:</td><td><select name='sube'><option value=''>Seçiniz</option>");
   myWindow.document.write("<?php $sorgu=mysqli_query($db,'select * from subeler'); while($sorgum=mysqli_fetch_array($sorgu)){echo '<option value='; echo $sorgum[0]; echo '>'; echo $sorgum['adi'];echo "</option>";} ?></td></tr><tr><td colspan='2'><input type='submit' value='Ekle' name='ekle'></form></table>");
		 }
		 
	

	
</script>

</body></html>