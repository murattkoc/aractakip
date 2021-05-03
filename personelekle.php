<?php
	include('./functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "Öncelikle giriş yapmalısınız";
	header('location: ../aracim1net.php');
}
if(isset($_POST['person'])) {
$sicil=$_POST['sicil'];
$tc=$_POST['tc'];
$soyad=$_POST['soyad'];
$ad=$_POST['ad'];
$dtarih=$_POST['dtarih'];
$tel=$_POST['tel'];
$posta=$_POST['posta'];
$yas=$_POST['yas'];
$adres=$_POST['adres'];
$sube=$_POST['sube'];
$islem=mySqli_query($db,"SELECT * FROM personel where perSicilNo='$sicil'");
$sonuc=mysqli_fetch_array($islem);
if($sonuc)
{
	echo "<img width='20px' height='20px' src='assets/images/hata.png'>"; echo "&nbsp; Aynı sicil numarasınına sahip başka bir personel vardır!!";
	}
else 
{
	$sorgu=mysqli_query($db,"INSERT INTO personel(perSicilNo, TCNo, ad, soyad, dTarihi, telefon, eposta, yas, adres, subeid)
	VALUES('$sicil','$tc','$ad','$soyad','$dtarih','$tel','$posta','$yas','$adres','$sube')");
if($sorgu) echo "<img width='30px' height='25px' src='assets/images/tik.png'>"; echo "Şube eklendi"; 
}
}
?>