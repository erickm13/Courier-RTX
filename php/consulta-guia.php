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
        <link rel="stylesheet" href="../css/style-consulta-guia.css">
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


    <div class="formulario">
        <h3>DETALLES DEL PEDIDO</h3>
    </div>
<!-- Datos Guia -->
    <?php
    include('conexion.php');
    $con = conexion();
    $numero_guia= $_GET['no-guia'];
    $query = "SELECT * FROM tracking WHERE no_guia= '$numero_guia'";
    $result = mysqli_query($con,$query) or die('Query failed: ' . mysqli_error($con));
    if($result){
        while($row = mysqli_fetch_array($result)){
            $orden = $row["no_orden"];
            $estado = $row["estado"];
            $direccion = $row["direccion"];
            $destino = $row["destinatario"];
        }
        if((isset($estado)) && (isset($direccion)) && (isset($destino))){
            if(!isset($orden)) {
                $tienda = "RGX(courier)";
            }else{
                $tienda = $orden;
            }
            if($estado == 1){
                $estado = "Solicitado";
            }else if($estado == 2) {
                $estado = "En Recoleccion";
            }else if($estado == 3) {
                $estado = "En Inventario";
            }else if($estado == 4) {
                $estado = "En Ruta";
            }else if($estado == 5) {
                $estado = "Entregado";
            }
            ?>
            <div class="resultado-guia">
                <div class="col-3 ">
                    <h4><b>Guia:</b> <?php echo $numero_guia; ?></h4>
                </div>
                <div class="col-3">
                    <h4><b>Orden:</b> <?php echo $tienda; ?> </h4>
                </div>
                <div class="col-4">
                    <h4><b>Destinatario:</b> <?php echo $destino; ?></h4>
                </div>
                <div class="col-3">
                    <h4><b>Estado:</b> <?php echo $estado; ?> </h4>
                </div>
            </div>
            <div class="container-img">
                        <img src="../img/list.gif" class="" width="200" height="200" alt="...">
                        <img src="../img/recoleccion.gif" class="" width="200" height="200" alt="...">
                        <img src="../img/bodega.gif" class="" width="200" height="200" alt="...">
                        <img src="../img/ruta.gif" class="" width="230" height="200" alt="...">
                        <img src="../img/entregado.gif" class="" width="200" height="200" alt="...">
            </div>
            <?php
            if($estado == "Solicitado"){
                ?>
                <div class="container-progressbar">
                <br>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width:20%;">
                                    1/5
                                </div>
                                <span class="sr-only">1/5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }else if($estado == "En Recoleccion"){
                ?>
                <div class="container-progressbar">
                <br>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width:40%;">
                                    2/5
                                </div>
                                <span class="sr-only">2/5</span>
                            </div>
                        </div>  
                    </div>
                </div>
                <?php
            }else if($estado == "En Inventario"){
                ?>
                <div class="container-progressbar">
                <br>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width:60%;">
                                    3/5
                                </div>
                                <span class="sr-only">3/5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }else if($estado == "En Ruta"){
                ?>
                <div class="container-progressbar">
                <br>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width:83%;">
                                    4/5
                                </div>
                                <span class="sr-only">4/5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }else if($estado == "Entregado"){
                ?>
                <div class="container-progressbar">
                <br>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width:100%;">
                                    5/5
                                </div>
                                <span class="sr-only">5/5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }else{
            echo "<h3>Guia no encontrada</h3>";
            ?>
            <div class="container-progressbar">
    <br>
        <div class="row">
            <div class="col-md-5">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width:0%;">
                        0/5
                    </div>
                    <span class="sr-only">0/5</span>
                </div>
            </div>
        </div>
    </div>

            <?php
        }
    }
    ?>
    <?php
    if(!isset($estado)){
        ?>
        <div class="estatus">
                <h3><br><br><br><br><br><br></h3>
            </div>
            <?php
    }else if($estado == "Entregado"){
        ?>
            <div class="estatus">
                <h3>FINALIZADO</h3>
            </div>
        <?php
    }else{
        ?>
        <div class="estatus">
                <h3>EN PROGRESO...</h3>
            </div>
            <?php
    }
    ?>
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
    </body>
</html>