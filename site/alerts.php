<?
require("config.php");
$conn = mysql_pconnect($ip,$user,$pass) or die("Falha ao conectar ao banco de dados.");
mysql_select_db($database,$conn) or die("Falha ao selecionar o banco de dados");

$query = "SELECT event.id, name, description.text AS info, TIME(timestamp) AS timestamp
FROM event JOIN client ON id_client = client.id
LEFT JOIN description ON event.description = description.id
WHERE status = 0
ORDER BY description DESC,timestamp";
$result = mysql_query($query,$conn) or die ("Falha ao consultar o banco");
?>

<table id="tb0">
<tr>
<td>Cliente</td>
<td>Descri&ccedil;&atilde;o</td>
<td>Data - Hora</td>
</tr>
<?
while ($line = mysql_fetch_array($result)) {
	?>
		<tr>
		<td><a href=info.php?id=<? echo $line['id'] ?>><? echo $line['name']; ?></a></td>
		<td><? echo $line['info']; ?></td>
		<td><? echo $line['timestamp']; ?></td>
		</tr>
	<?
}
?>
</table>
