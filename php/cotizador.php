<?php
include('conexion.php');
$con = conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>RGX</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../img/icono.jpg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/style-cotizador.css">
    </head>
    <body>
<!-- navbar -->
            <nav class="navbar navbar-expand-lg bg-light sticky-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../img/Logo.JPG" class="img-fluid" width="200px" height="200px" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.html">Inicio</a>
                        </li>
                        <li>
                            <a class="nav-link" href="../php/contacto.php">Contacto</a>
                        </li>
                        <li>
                        <a class="btn btn-outline-primary" href="./cotizador.php">Realiza tu envio</a>
                        </li>
                        </ul>
                        <div class="h3  mt-2"><i class="fa-solid fa-truck"></i></div>
                        <form action="consulta-guia.php" method="get" class="d-flex ms-2 mx-5">
                            <input name="no-guia" class="form-control form-control-sm me-2 " type="search" placeholder="Ingresa numero de guia" aria-label="Search">   
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                    </div>
                </nav>

<!--imagen portada -->
        <div class="container-portada">
            <p>COTIZADOR</p>
            <img src="../img/img-cotizador.jpg" class="d-block w-100" height="500"  alt="...">
        </div>

<!-- formulario cotizador -->
    <div class="formulario">
        <h3>INGRESA TUS DATOS</h3>
    </div>
    <div class="container ">
    <form action="result-cotizacion.php" method="post">
            <?php
            $query = "SELECT *
            from departamentos
            ORDER BY nombre;";

            $result = mysqli_query($con,$query) or die('Query failed: ' . mysqli_error($con));

            $option= '<option value="">Seleccione un departamento</option>';
            while ($row = mysqli_fetch_array($result)) {
                $id_departamento = $row["id_departamento"];
                $nombre=$row["nombre"];
                $option .= '<option value=';
                $option .= $id_departamento;
                $option .= '>';
                $option .= $nombre;
                $option .= '</option>';
            }
            
            mysqli_close($con);

            ?>
            <div class="container-select1">
            <div class="col-6 p-3">
                <label class="form-label" for="autoSizingSelect">Origen</label>
                <select name="empid" id="empid"  class="form-control" onchange="getData(this.value, 'displaydata',1)">
                <?php
                    echo "$option";
                ?>
                </select>
            </div>
            </div>
            <div class="selectm1">
                <div class="col-6 p-3" id="displaydata">
                </div>
            </div>
            <div class="container-select2">
                <div class="col-6 p-3">
                <label class="form-label" for="autoSizingSelect">Destino</label>
                <select  name="empid2" id="empid2"  class="form-control" onchange="getData(this.value, 'displaydata2',2)">
                <?php
                    echo "$option";
                ?>
                </select>
                </div>
        </div>
                <div class="selectm2">
                    <div class="col-6 p-3" id="displaydata2">
                    </div>
                </div>
                </div>
        </form>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!--    footer    -->

            <div class="container-fluid bg-secondary text-white">
                <nav class="row p-3">
                <div class="col-3 list-unstyled  p-3">
                        <img src="../img/Logo-gris.JPG" class="" width="150" height="50" alt="...">
                        <p class="card-text">Copyright - All rights reserved © - 2022</p>
                </div>
                <div class="col-3 d-none d-sm-block d-sm-none d-md-block list-unstyled mb-3">
                    <div class="h5">
                        <li class="font-weight-bold">Contacto</li>
                    </div>
                    <li><a href="#" class="text-reset text-decoration-none">mejiaerick3192@gmail.com</a></li>
                    <li><a href="#" class="text-reset text-decoration-none">miguestuard@gmail.com</a></li>
                </div>

                <div class="col-3 list-unstyled mb-3 d-none d-sm-block d-sm-none d-md-block">
                    <div class="h5">
                        <li class="font-weight-bold mb-3">Enlaces</li>
                    </div>
                    <li><a href="#" class="text-reset text-decoration-none">Terminos y Condiciones</a></li>
                    <li><a href="#" class="text-reset text-decoration-none">Politica de Privacidad</a></li>
                </div>

                <div class="col-3 list-unstyled mb-3 d-none d-lg-block d-print-block">
                    <div class="h5">
                        <li class="font-weight-bold mb-3">Redes Sociales</li>
                    </div>
                    <a href="#" class="text-reset p-1"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-reset p-1"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-reset p-1"><i class="fa-brands fa-square-twitter"></i></a>
                    </div>
                </nav>
            </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/f3adee89ac.js" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script type="text/javascript">
                function getData(empid, divid,io){
                    $.ajax({
                        url: 'consultamunicipios.php?empid='+io+empid,
                        success: function(html) {
                            var ajaxDisplay = document.getElementById(divid);
                            ajaxDisplay.innerHTML = html;
                        }
                    });
                }
            </script>
    </body>
</html>