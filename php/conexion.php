<?php
function conexion() {
$host = 	'rgx-envios.mysql.database.azure.com';
$dbname = 'rgx_envios';
$user = 'myadmin';
$password = 'admin!123';


$db = 	mysqli_connect($host,$user,$password,$dbname) or die('Could not connect: ' . mysqli_error());

return $db;
}
?>