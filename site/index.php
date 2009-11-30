<?
require("config.php");
$conn = mysql_pconnect($ip,$user,$pass) or die("Falha ao conectar ao banco de dados.");
mysql_select_db($database,$conn) or die("Falha ao selecionar o banco de dados");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
	<title>Relat&oacute;rio de Emerg&ecirc;ncias</title>	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 	<link href="style.css" rel="stylesheet" type="text/css" /> 
 	
	<script type="text/javascript" src="jquery.js"></script>
 	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAzr2EBOXUKnm_jVnk0OJI7xSosDVG8KKPE1-m51RBrvYughuyMxQ-i1QfUnH94QxWIa6N4U6MouMmBA"
   	type="text/javascript"></script>
   	
 	<script type="text/javascript">
 	var map;
 	function initialize() {
   	if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 13);
        map.setUIToDefault();
      }
   }
   function initialize2(lat,long) {
     if (GBrowserIsCompatible()) {
        
       map.setCenter(new GLatLng(lat, long), 13);
       map.openInfoWindow(map.getCenter(),
                   document.createTextNode("São Carlos!"));
       map.setUIToDefault();
     }
   }
   
   function showEmergencyLocation(name,age,obs,desc,lat,long,time)	{
		if (GBrowserIsCompatible()) {
        
       map.setCenter(new GLatLng(lat, long), 13);
       map.openInfoWindow(map.getCenter(),
       	document.createTextNode(name.concat(" ",age," ",obs," ",desc," ",time)));
       map.setUIToDefault();
     }
   }
   </script>
	

	<script type="text/javascript">
	function atualiza() {
		var div = $("#t1");
		$.get(
				"alerts.php",
				function (data,textStatus) {
				div.html(data);
				}
		     );
	}
	
	function processado(id) {
		var div = $("#t2");
		$.post(
				"process.php",
				{ id:id },
				function (data,textStatus) {
				div.html(data);
				}
		     );
	}
	
	function info(id) {
		var div = $("#t2");
		$.post(
				"info.php",
				{ id:id },
				function (data,textStatus) {
				div.html(data);
				}
		     );
	}
	
	$(document).ready(function(){
			atualiza();
			var at = setInterval(atualiza,3000);
			});
	</script>


</head>
<body onLoad="initialize()">
	<div id="map_canvas" >Mapa</div>
	<div id="t1">
	</div>
	<div id="t2">
		<input type="button" onClick="initialize2(-22.017778, -47.890833)" value="Sanca!"
			style="font-size: 20px; position:center; width:100%" />
		<input type="button" onClick="showEmergencyLocation('Fulano','70','cardiaco',
			'assalto',-22.007778, -47.880833,'18:35')" 
				value="Emergência!" style="font-size: 50px; position:center; width:100%" />
	</div>
</body>
</html>
