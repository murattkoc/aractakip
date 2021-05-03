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

 <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
 <link rel='stylesheet' href='https://daneden.github.io/animate.css/animate.min.css'>
 

</head>
<body>				
<div class="ana"> 
<div class="ust"> <form action="personel.php" method="POST"> 
 <button name="pers" onclick="myFunction()" type="submit" class="buton">Personel Ekle</button></form></div>
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



  <div class="tablo">


<form action="" method="post">
<input type="text" name="arama" value=""/>
<input type="submit" name="ara" value="Ara"/>
</form>
<?php 
if(isset($_POST['ara'])){
	$veri=$_POST["arama"];
	guvenlik($veri);	
$sorgu = mysqli_query($db,"SELECT * FROM personel WHERE soyad like '%".$veri."%'");

while($yaz=mysqli_fetch_array($sorgu)){
echo "<tr><td>";
		
		echo $yaz['adres'];
			echo "</td><td>";				


}
}
?>

</form>
  <table>
  <thead>
  <tr>
    <th>Personel Sicil No</th>
    <th>Personel TC</th>
    <th>Personel Soyadı</th>
    <th>Personel Adı</th>
	<th>Personel Doğum Tarihi</th>
	<th>Personel Telefon</th>
	<th>Personel E-posta</th>
	<th>Personel yas</th>
	<th>Personel Adres</th>
	<th>Personel Çalıştığı Şube</th>
  </tr></thead>
  <?php $sorgu=mysqli_query($db,"SELECT * FROM personel");
	while($sonuc=mysqli_fetch_array($sorgu)) {
		echo "<tr><td>";
		echo $sonuc['perSicilNo'];
		echo "</td><td>";
		echo $sonuc['TCNo'];
		echo "</td>";
		echo "<td>";
		echo $sonuc['ad'];
		echo "</td><td>";
		echo $sonuc['soyad'];
		echo "</td><td>";
		echo $sonuc['dTarihi'];
		echo "</td>";
		echo "</td><td>";
		echo $sonuc['telefon'];
		echo "</td>";
		echo "</td><td>";
		echo $sonuc['eposta'];
		echo "</td>";
		echo "</td><td>";
		echo $sonuc['yas'];
		echo "</td>";
		echo "</td><td>";
		echo $sonuc['adres'];
			echo "</td><td>";					
			$no=$sonuc['subeid'];
		$son=mysqli_query($db,"select * from subeler where subeno='$no' ");
		while($istek=mysqli_fetch_array($son)){
			echo $istek['adi'];
			echo "</td><td>";
			echo " <button name='pers' onclick='myFunction()' type='submit' class='buton1'><img width='25px' height='25px' src='assets/images/pen.png'></button>";
			}
		
		
				
		
	}
  
  ?>
</table>

</div>
	
		<br>mk<br><br>mk<br><br>mk<br><br>mk<br><br>mk<br><br>mk<br><br>mk<br><br>mk<br>
 
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src='https://use.fontawesome.com/cece742d74.js'></script>
  <script>
function myFunction() {
  var myWindow = window.open("", "", "width=500,height=500");
  myWindow.document.write("<form action='./personelekle.php' method='POST'><table border='1'><tr><td bgcolor='green'colspan='2' align='center'>Personel Ekle</td></tr><tr><td>Personel Sicil No:</td><td><input type='text' name='sicil'></td></tr><tr><td>Personel TC No:</td><td><input type='text' name='tc'></td></tr><tr><td>Personel Soyadı:</td><td> <input type='text' name='soyad'></td></tr></tr><td>Personel Adı:</td><td><input type='text' name='ad'></td></tr><tr><td>Personel Doğum Tarihi:</td><td><input type='text' name='dtarih'></td></tr><tr><td>Personel Telefon:</td><td><input type='text' name='tel'></td></tr><tr><td>Personel E-Posta:</td><td><input type='text' name='posta'></td></tr><tr><td>Personel Yaşı:</td><td><input type='text' name='yas'></td></tr><tr><td>Personel Adresi:</td><td><input type='text' name='adres'></td></tr><tr><td>Personel Çalıştığı Şube:</td><td>");
  myWindow.document.write("<select name='subeler'><option value=''>Seçiniz</option>");
  
  myWindow.document.write("<?php $sorgu=mysqli_query($db,'select * from subeler'); while($sorgum=mysqli_fetch_array($sorgu)){echo '<option value='; echo $sorgum[0]; echo '>'; echo $sorgum['adi'];echo "</option>";} ?></td></tr><tr><td colspan='2'><input type='submit' value='Ekle' name='person'></form></table></select>");
		 }

		
 
		 
		 
	
</script>
<?php $soru=mysqli_query($db,"select * from subeler"); 
		while($sorular=mysqli_fetch_array($soru)){ 
		echo "<option value=";
		echo $sorular['subeno'];
		echo ">";
		echo $sorular[0];
echo 		"</option>";
		}
		?> 
</body></html>