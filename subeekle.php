<?php
	include('./functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../aracim1net.php');
}
if(isset($_POST['ekle'])) {
$ad=$_POST['adi'];
$pers=$_POST['pers'];
$arac=$_POST['arac'];


$islem=mySqli_query($db,"SELECT * FROM subeler where adi='$ad'");
$sonuc=mysqli_fetch_array($islem);
if($sonuc){ echo "<img width='20px' height='20px' src='assets/images/hata.png'>"; echo "&nbsp; Bu şubeye zaten sahipsiniz!!";}
else {$sorgu=mysqli_query($db,"INSERT INTO subeler(adi, aracMiktar, personelmiktar) VALUES('$ad','$arac','$pers')");
if($sorgu) echo "<img width='30px' height='25px' src='assets/images/tik.png'>"; echo "Şube eklendi"; 
}
}
?>