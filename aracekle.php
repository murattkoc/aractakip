<?php
	include('./functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../aracim1net.php');
}
if(isset($_POST['ekle'])) {
$plaka=$_POST['plaka'];
$marka=$_POST['marka'];
$model=$_POST['model'];
 $renk=$_POST['renk'];
 $yil=$_POST['yil'];
$km=$_POST['km'];
$fiyat=$_POST['ucret'];
$hasar=$_POST['hasar'];
$islem=mySqli_query($db,"SELECT * FROM araclar where plaka='$plaka'");
$sonuc=mysqli_fetch_array($islem);
if($sonuc){ echo "<img width='20px' height='20px' src='assets/images/hata.png'>"; echo "&nbsp; Bu şubeye zaten sahipsiniz!!";}
else {$sorgu=mysqli_query($db,"INSERT INTO araclar(plaka, yil, marka, km, ucret, hasar, model, renk) VALUES('$plaka','$yil','$marka', '$km', '$fiyat', '$hasar', '$model', '$renk')");
if($sorgu) echo "<img width='30px' height='25px' src='assets/images/tik.png'>"; echo "Şube eklendi"; 

}
}
?>