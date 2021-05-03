<!doctype html>
<?php 
	include('functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../aracim1net.php');
}
?>

<html lang="tr"><head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=0">
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
 <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
 <link rel='stylesheet' href='https://daneden.github.io/animate.css/animate.min.css'>
 

</head>
<body>				
<div class="ana">
<div class="ust"> </div>
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
   <a href="admin/aracimnet.php">
   <li>
    <i class="fa fa-home"></i>
    <div class="animated slideCenter ">Ana Sayfa</div>
  </li></a>
  <a href="personel.php"><li>
    <i class="fa fa-user"></i>
    <div class="animated slideInCenter">Personeller</div>
  </li>
 <a href="subeler.php"> <li>
    <i class="fa fa-certificate"></i>
    <div class="animated slideInCenter">Şubeler</div>
  </li>
  <a href="islemler.php"><li>
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

  <div class="tablo4">
  <table>
  <thead>
  <tr>
    <th>Müşteri TCNo</th>
    <th>Müşteri Adı</th>
    <th>Personel Soyadı</th>
    <th>Araç Plaka</th>
	<th>Kiralama Tarihi</th>
	<th>Teslim Tarihi</th>
	<th>KM</th>
	<th>Ücreti</th>
	<th>İşleme Yapan Personel</th>
	  </tr></thead>
  <?php $sorgu=mysqli_query($db,"SELECT * FROM islemler");
	while($sonuc=mysqli_fetch_array($sorgu)) {
		echo "<tr><td>";
		echo $sonuc['musteriTCNo'];
		echo "</td><td>";
		echo $sonuc['musteriAdi'];
		echo "</td>";
		echo "<td>";
		echo $sonuc['musteriSoyad'];
		echo "</td><td>";
		echo $sonuc['aracPlaka'];
		echo "</td><td>";
		echo $sonuc['islemTarihi'];
		echo "</td>";
		echo "</td><td>";
		echo $sonuc['teslimTarihi'];
		echo "</td>";
		echo "</td><td>";
		echo $sonuc['km'];
		echo "</td>";
		echo "</td><td>";
		echo $sonuc['fiyat'];
		echo "</td>";
		echo "</td><td>";
		$pers=$sonuc['persid'];
								
			
			$kodu=mysqli_query($db,"select*from personel where perSicilNo='$pers'");
			while($kod=mysqli_fetch_array($kodu)){
				
				echo $kod["ad"]." ";
				echo $kod["soyad"];
				
				
			}
			echo "</td><td>";
			}
		  ?>
</table>

</div>
	

 
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src='https://use.fontawesome.com/cece742d74.js'></script>

</body></html>