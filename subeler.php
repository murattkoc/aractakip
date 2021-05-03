<?php 
	include('./functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../aracim1net.php');
}
?>

<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=0">

 <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link rel='stylesheet' href='https://daneden.github.io/animate.css/animate.min.css'>
          
 
</head>
<body>		
	<div class="ana">
		<div class="ust"><form action="subeler.php" method="POST"> 
			<button name="eklem" onclick="myFunction()" type="submit" class="buton">Şube Ekle</button>
			</form>
		</div>
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
						<div class="animated slideCenter ">Ana Sayfa</div>
				</li>
			<a href="personel.php"> <li>
					<i class="fa fa-user"></i>
					<div class="animated slideInCenter">Personeller </a></div>
				</li>
					<a href="subeler.php"> <li>
					<i class="fa fa-certificate"></i>
				<div class="animated slideInCenter">Şubeler</div>
				</li>
				<a href="islemler.php"> <li>
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
				</footer> 
			</div>
			<div class="container1">
			<table>
					<thead>
						<tr>
						<th>GÜNCEL DURUM</th>	
						</tr>
					</thead></table>
					</div>
			<div class="tablo3">
  <table>
  <thead>
  <tr>
  <th>Şube Resim</th>
    <th>Şube No</th>
    <th>Şube Adı</th>
    <th>Araç Sayısı</th>
    <th>Çalışan Personel Sayısı</th>
	 </tr></thead>
  
			
		<?php 
			$sorgu=mysqli_query($db,"SELECT *FROM subeler");
		while($islem=mysqli_fetch_array($sorgu))
		{
			echo "<tr><td>";
		echo $islem["resim"];
		echo "</td><td>";
		echo $islem['subeno'];
		echo "</td><td>";
		echo $islem['adi'];
		echo "</td><td>";
		echo $islem['aracMiktar'];
		echo "</td><td>";
		echo $islem['personelmiktar'];
		echo "</td><td>";	
		}
				?>	
					</div>
			</section>
 
	</div>
	
	
</table>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src='https://use.fontawesome.com/cece742d74.js'></script>
  <script>

function myFunction() {
  var myWindow = window.open("", "", "width=500,height=500");
  myWindow.document.write("<form action='./subeekle.php' method='POST'><table border='1'><tr><td bgcolor='green'colspan='2' align='center'>Şube Ekleme</td></tr><td>Şube Adı:</td><td><input type='text' name='adi'></td></tr><tr><td>Personel Sayısı:</td><td><input type='text' name='pers'></td></tr><td>Araç Sayısı:</td><td><input type='text' name='arac'></td></tr><tr><td colspan='2'><input type='submit' value='Ekle' name='ekle'></form></table>");
		 }
	

</script>
</body></html>