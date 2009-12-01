<?
require("config.php");
$id = $_POST['id'];
$conn = mysql_pconnect($ip,$user,$pass) or die("Falha ao conectar ao banco de dados.");
mysql_select_db($database,$conn) or die("Falha ao selecionar o banco de dados");

$query = "SELECT name, age, obs, text AS info, latitude, longitude, timestamp, status
	FROM event JOIN client ON id_client=client.id 
	LEFT JOIN description ON description = description.id 
	WHERE event.id=$id";
$result = mysql_query($query,$conn) or die ("Falha ao consultar o banco");

$line = mysql_fetch_array($result)
?>
	
	Nome:&nbsp;<? echo $name = $line['name']; ?><br>
	Idade:&nbsp;<? echo $age = $line['age']; ?><br>
	Observa&ccedil;&atilde;o:&nbsp;<? echo $obs = $line['obs']; ?><br>
	Motivo:&nbsp;<? echo $info = $line['info']; ?><br>
	Latitude:&nbsp;<? echo $latitude = $line['latitude']; ?><br>
	Longitude:&nbsp;<? echo $longitude = $line['longitude']; ?><br>
	Erro:&nbsp;<? echo $erro = $line['erro']; ?><br>
	Data:&nbsp;<? echo $timestamp = $line['timestamp']; ?><br>
	<a href="#" onClick="processado(<? echo $id ?>)">Processado</a>
<?
if ($latitude != "" and $longitude != ""){
	echo "<SCRIPT LANGUAGE='javascript'>showEmergencyLocation('$name','','','',$latitude, $longitude,'$timestamp');</SCRIPT>";
}
else {
	echo "<SCRIPT LANGUAGE='javascript'>initialize2(-22.017778, -47.890833)</SCRIPT>";
}
?>

