<?php
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

 //conectar Ia la base de datos
$conexion=mysqli_connect("localhost", "root", "1234", "tickets");
$consulta="SELECT * FROM users WHERE usuario='$usuario' and clave='$clave'";
$resultado=mysqli_query($conexion, $consulta);
while($row = mysqli_fetch_array($resultado)) {
  /*Imprimir campo por nombre*/
  $rol=$row['rol'];
}


$_SESSION['rol'] = $rol;

$filas=mysqli_num_rows($resultado);


if ($filas>0) {
header("location:./MoBra Panel/dashboard.php");

} else {
echo "Error en la autentificacion";
}

mysqli_free_result($resultado);

mysqli_close($conexion);
?>
