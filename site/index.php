<?
require("config.php");
$conn = mysql_pconnect($ip,$user,$pass) or die("Falha ao conectar ao banco de dados.");
mysql_select_db($database,$conn) or die("Falha ao selecionar o banco de dados");
?>

<html>
<head>
	<title>Relat&oacute;rio de Emerg&ecirc;ncias</title>
	<link href="style.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="jquery.js"></script>
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

$(document).ready(function(){
		atualiza();
		var at = setInterval(atualiza,3000);
		});
</script>


</head>
<body>
	<div id="t0">
		Texto 0
	</div>
	<div id="t1">
	</div>
	<div id="t2">
		Texto 2
	</div>
</body>
</html>
