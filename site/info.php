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

while ($line = mysql_fetch_array($result)) {
	?>
		
		Nome:&nbsp;<? echo $line['name']; ?></br>
		Idade:&nbsp;<? echo $line['age']; ?></br>
		Observa&ccedil;&atilde;o:&nbsp;<? echo $line['obs']; ?></br>
		Motivo:&nbsp;<? echo $line['info']; ?></br>
		Latitude:&nbsp;<? echo $line['latitude']; ?></br>
		Longitude:&nbsp;<? echo $line['longitude']; ?></br>
		Data:&nbsp;<? echo $line['timestamp']; ?></br>
		<a href="#" onClick="processado(<? echo $id ?>)">Processado</a>
	<?
}
?>
