<?
require("config.php");
$id = $_POST['id'];
$conn = mysql_pconnect($ip,$user,$pass) or die("Falha ao conectar ao banco de dados.");
mysql_select_db($database,$conn) or die("Falha ao selecionar o banco de dados");

$query = "UPDATE event SET status=1 WHERE id=$id";
$result = mysql_query($query,$conn) or die ("Falha ao processar evento");
echo "Evento processado com sucesso"
?>
