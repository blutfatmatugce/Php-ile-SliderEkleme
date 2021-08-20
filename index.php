<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>AnaSayfa</title>
</head>
<body>
<?php
	$db= new PDO("mysql:host=localhost;dbname=portfolyo;charset=utf8;","root","");
$sql="select * from menuler";
$sor=$db->prepare($sql);
$sor->execute(array("pid"=>0));
$cek=$sor->fetchAll(PDO::FETCH_ASSOC);
	echo "<nav class='navbar navbar-inverse'>
    <div class='container-fluid'>
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
		
		<span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> </button>
		<div class='collapse navbar-collapse' id='myNavbar'>
		<ul class='nav navbar-nav'>
		";
foreach($cek as $yaz)
{
echo "<li><a href=''#''>".$yaz["menu_yazi"]."</a></li>";
$asql="select * from menuler where menu_parentid=:pid";
$asor=$db->prepare($sql);
$asor->execute(array("pid"=>$yaz["menu_id"]));
$acek=$asor->fetchAll(PDO::FETCH_ASSOC);
} 
	echo "
        
      </ul>
      </div>
  </div>
</nav>"; 
?>
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "portfolyo");
function make_query($connect)
{
 $query = "SELECT * FROM banner ORDER BY banner_id ASC";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="images/'.$row["banner_image"].'" alt="'.$row["banner_title"].'"/>
   <div class="carousel-caption">
    <h3>'.$row["banner_title"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>
<br />
  <div class="container">
  <br><br><br>
  <h1 align="center">ÜRÜNLERİM</h1>
			<h3 align="center">Vitrindekiler</h3>
   <br />
   <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($connect); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($connect); ?>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
<?php
try
{
	$conn = new PDO("mysql:host=localhost;dbname=portfolyo;charset=utf8","root","");
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sorgu=$conn->prepare("SELECT * FROM urunler");
	$sorgu->execute();
	$i=0;
	if($sorgu->rowCount())
	
	{
		echo '
			<div class="container-fluid bg-3 text-center">
			<h3>Telefon Borsası</h3>
			<br>
			<div class="row">';
			
		foreach($sorgu as $row)
		{			
				if(($i % 4) != 0)
				{
					echo 
					"
					<div class='col-sm-3'>
					<center>
						<p>Ürün Adı (".$row['urunAd'].")</p>
						<p><img src='.".$row['urunGoruntu']."' class='img-responsive' style='width:75%;vertical-align:middle;' alt='Image'></p>
						<p>Ürün Fiyat: ".$row['urunFiyat']."</p>
					</center>
					</div>
					";
					$i++;
				}
				else
				{
					echo
					"
					</div>
					</div>
					<div class='container-fluid bg-3 text-center'>
					<br />
					<div class='row'>
					<div class='col-sm-3'>
					<center>
						<p>Ürün Adı (".$row['urunAd'].")</p>
						<p><img src='.".$row['urunGoruntu']."' class='img-responsive' style='width:75%;vertical-align:middle;' alt='Image'></p>
						<p>Ürün Fiyat: ".$row['urunFiyat']."</p>
					</center>
					</div>
					";
					$i++;
				}
			
		}
		echo '</div></div>';
	}
	else
	{
		echo "kayıt bulunamadı";
	}

}
catch(PDOException $e)
{
	die("Hata oluştu: ".$e->getMessage());
}
$conn = null;
?>



</body>
</html>
