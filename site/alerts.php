<?
$query = "SELECT name, description, TIME(timestamp) AS timestamp
FROM event JOIN client
ON id_client = client.id
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
		<td><? echo $line['name']; ?></td>
		<td><? echo $line['description']; ?></td>
		<td><? echo $line['timestamp']; ?></td>
		</tr>
	<?
}
?>
</table>

