<?
require("config.php");
$id_client = $_GET['id'];
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$description = $_GET['description'];

if ($id_client == "") die("O id deve ser informado!");

if ($latitude == "") $latitude = "NULL";
if ($longitude == "") $longitude = "NULL";
if ($description == "") $description = "NULL";

$conn = mysql_pconnect($ip,$user,$pass) or die("Erro ao conectar ao servidor SQL.");
mysql_select_db($database,$conn) or die("Erro ao selecionar o banco");

$query = "INSERT INTO event VALUES(0,$id_client,$latitude,$longitude,$description,NOW(),0)";

mysql_query($query,$conn) or die("Erro ao adicionar problema ao banco de dados.");

echo "Problema reportado! Por favor aguarde o socorro pacientemente...";
?>
