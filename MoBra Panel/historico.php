<?php session_start();
$varsesion = $_SESSION['rol'];
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>
    Admin
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
</head>

<body class="badmin">

<a href="dashboard.php"><img class="elogo" src="../logo.png"></a>
  <a href="../cerrar_session.php"><img class="logout" src="https://png.pngtree.com/svg/20140418/logout_1185746.png"></a>

<div class="vertical-menu">
 <a href="dashboard.php" class="active">Dashboard</a>
 <a href="incidencias.php">Incidencias</a>
 <a href="historico.php">Historico</a>
 <a href="admin.php">Admin</a>
</div>

<div class="historicot">
<h2>
  Historico incidencias cerradas
</h2>
</div>
<?php




$hoy = date("Y-m-d");                         // 03.10.01
$año_anterior  = mktime(0, 0, 0, date("m"), date("d"),   date("Y")-5);
$año_anterior_bueno = date('Y-m-d', $año_anterior);

$mes_anterior  = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
$mes_anterior_buena = date('Y-m-d', $mes_anterior);


include("abrir_conexion.php");

echo
"

  <table border=1 class='tabla_datos'>
    <tr class='tabla_datos'>
      <td><b><center>id_ticket</center></b></td>
      <td><b><center>Fecha_inicio</center></b></td>
      <td><b><center>Tecnico</center></b></td>
      <td><b><center>Cliente</center></b></td>
      <td><b><center>Descripcion</center></b></td>
      <td><b><center>Estado</center></b></td>
    </tr>";
$resultados = mysqli_query($conexion,"SELECT * from $tabla_db1 WHERE Estado = 'Cerrada';");

        while($consulta = mysqli_fetch_array($resultados))
        {
          echo
          "
              <tr class='tabla_datos'>
                <td>".$consulta['id_ticket']."</td>
                <td>".$consulta['Fecha_inicio']."</td>
                <td>".$consulta['Tecnico']."</td>
                <td>".$consulta['Cliente']."</td>
                <td>".$consulta['Descripcion']."</td>
                <td>".$consulta['Estado']."</td>
              </tr>

          ";
        }
        echo"</table>";
      include("cerrar_conexion.php");

        ?>

        <div class="geth">
        <?php   if ($varsesion == admin){?>
        <a href="exportar_tickets_historial.php"> <button type="button">Generar exportación tickets_historial.txt</button> </a>
        <p> Para ver el archivo exportado accede a /tmp/ y lo verás como 'tickets_historial.txt'
        <?php } else{
        	echo "No tienes acceso a la exportacion del historial de tickets";
        } ?>
      </div>
</body>

</html>
