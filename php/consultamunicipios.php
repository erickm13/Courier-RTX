<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style-consultamunicipios.css">
	<title>Document</title>
</head>
<body>

<?php
$empid = $_GET['empid'];
$id_departamento = substr($empid,1);
$parametro = substr($empid,0,1);

include('conexion.php');
$cn = conexion();
//Check for connection error

if (isset($empid)) {
    $select  = " SELECT * FROM municipios WHERE id_departamento = '$id_departamento' AND habilitado=true";
    $result = mysqli_query($cn,$select) or die('Query failed: ' . mysqli_error($cn));


	if (mysqli_num_rows($result)==0){
		echo"No hay municipios disponibles";
	}else{
		if($parametro == 1){
			echo "<label class=form-label for=autoSizingSelect>Municipio Origen</label>";
			echo "<select class=form-control name=municipio1>\n";
			while($row = mysqli_fetch_array($result))
			
			{
				$muni1 = $row["id_municipio"];
				$name1 = $row["nombre"];
				echo "a";
			echo "<option value=$muni1>$name1</option>\n";
			}
			echo "</select>\n";
		}
		else{
			echo "<label class=form-label for=autoSizingSelect>Municipio Destino</label>";
			echo "<select class=form-control name=municipio2>\n";
			while($row = mysqli_fetch_array($result))
			{
				$muni2 = $row["id_municipio"];
				$name2 = $row["nombre"];
			echo "<option value=$muni2>$name2</option>\n";
			}
			echo "</select>\n";
			echo"<br>";
			?>
			<div class="boton">
                <input class="btn btn-outline-primary" name="submit" type="submit" value="enviar"></input>
            </div>
			<?php
		}
	}
}
mysqli_close($cn);
?>

</body>
</html>