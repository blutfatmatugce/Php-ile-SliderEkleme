<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ürün Ekleme</title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Ürün Ekleme</legend>
    <label for="urunAd">Ürünün Adı</label>
    <input type="text" name="urunAd" id="urunAd" placeholder="Ürünün ismini giriniz" />
    <br />
    <label for="urunGoruntu">Ürünün Resmini Seçiniz</label>
    <input type="file" name="urunGoruntu" id="urunGoruntu"  />
    <br />
    <label for="urunFiyat">Ürünün Fiyatını Giriniz</label>
    <input type="text" name="urunFiyat" id="urunFiyat" onblur="if(!Number(this.value)){alert('sayı girin');}"  />
    <br />
    <input type="submit" value="Ürünü Ekle" />
  </fieldset>
</form>

<?php

try 
{
	if($_POST)
	{
		$urunAd=$_POST['urunAd'];
		if($_FILES['urunGoruntu'])
		{
			$yol="images";
			$urunGoruntuYolu="/".$yol."/".$_FILES['urunGoruntu']['name'];
			$yuklemeYeri=__DIR__.$urunGoruntuYolu;
			$sonuc=move_uploaded_file($_FILES['urunGoruntu']['tmp_name'],$yuklemeYeri);
			echo $sonuc ? "Dosya başarıyla yüklendi" : "Hata oluştu";		
		}
		else
		{
			echo "Lütfen bir dosya seçin";
		}
		$urunFiyat=$_POST['urunFiyat'];
		$conn = new PDO("mysql:host=localhost;dbname=portfolyo;charset=utf8","root","");
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		$sql = "INSERT INTO urunler (urunAd, urunGoruntu, urunFiyat)
  		VALUES ('{$urunAd}', '{$urunGoruntuYolu}', $urunFiyat)";
  		$conn->exec($sql);
  		echo "<br />Veritabanına eklendi";
	}  
} 
catch(PDOException $e) 
{
  echo $sql . "<br>" . $e->getMessage();
  die();
}
$conn = null;
?>

</body>
</html>