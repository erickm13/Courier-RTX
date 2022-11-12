<html>
      <head>
            <title>
               consulta municipios
            </title>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script type="text/javascript">
                  function getData(empid, divid,io){
                     $.ajax({
                        url: 'consultacostos.php?empid='+io+empid,
                        success: function(html) {
                              var ajaxDisplay = document.getElementById(divid);
                              ajaxDisplay.innerHTML = html;
                        }
                     });
                  }
            </script>
         </head>
         <body>
         <form>
            <?php
               include('conexion.php');
               $cn = conexion();

               $query = "SELECT *
               from courier.departamentos
               ORDER BY nombre;";

               $result = mysql_query($cn,$query);
               $option= '<option value="">Seleccione un departamento</option>';
               while ($row = mysql_fetch_object($result)) {
                  $id_departamento = $row->id_departamento;
                  $nombre=$row->nombre;
                  $option .= '<option value=';
                  $option .= $id_departamento;
                  $option .= '>';
                  $option .= $nombre;
                  $option .= '</option>';
               }
               mysql_close($cn);
               ?>
                  <b>Seleccione el departamento al que pertenece el municipio de origen:</b>
                  <select name="empid" id="empid"  class="form-control" onchange="getData(this.value, 'displaydata',1)">
                  <?php
                     echo "$option";
                  ?>
                  </select>
                  <div id="displaydata">
                  </div>
                  <b>Seleccione el departamento al que pertenece el municipio de destino:</b>
                  <select name="empid2" id="empid2"  class="form-control" onchange="getData(this.value, 'displaydata2',2)">
                  <?php
                     echo "$option";
                  ?>
                  </select>
                  <div id="displaydata2">
                  </div>
      </form>
   </body>
</html>