<?php session_start();
$varsesion = $_SESSION['rol'];
?>

<html>
<head>
  <title>Administrar Usuarios MoBra</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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

<div class="row">
  <div class="col-md-4"></div>

<!-- INICIA LA COLUMNA -->


  <div class="col-md-4">



<?php   if ($varsesion == admin){?>
    <form class="formadmin" method="POST" action="admin.php" >
      <center><h1>Administrar Usuarios MoBra</h1></center>

    <div class="form-group">
      <label for="doc">id</label>
      <input type="text" name="id" class="form-control" id="id">
    </div>

    <div class="form-group">
        <label for="nombre">email/usuario </label>
        <input type="text" name="usuario" class="form-control" id="email" >
    </div>

    <div class="form-group">
        <label for="dir">password </label>
        <input type="password" name="clave" class="form-control" id="password">
    </div>

    <div class="form-group">
        <label for="rol">rol </label>
        <select name="rol" class="form-control" id="rol">
          <option value="admin">admin</option>
          <option value="usuario">usuario</option>
          </select>

    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("abrir_conexionadmin.php");

      $id    ="";
      $usuario ="";
      $clave    ="";
      $rol    ="";


      if(isset($_POST['btn_registrar']))
      {
        $usuario    =$_POST['usuario'];
        $clave    =$_POST['clave'];
        $rol    =$_POST['rol'];


        $existe=0;

        if($rol=="" || $usuario=="" || $clave=="")
        {
          echo" LOS CAMPOS SON OBLIGATORIOS";
        }
        else
        {
          //INSERTAR
          mysqli_query($conexion, "INSERT INTO `users` (`id`, `usuario`, `clave`, `rol`) VALUES (NULL, '$usuario', '$clave', '$rol')");
        }
      }

      if(isset($_POST['btn_consultar']))
      {
        $id    =$_POST['id'];
        $existe=0;

        if($id=="")
        {
          echo" id es un campo obligatorio";
        }
        else
        {
          //CONSULTAR
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db2 WHERE id = '$id'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo $consulta['id']."<br>";
            echo $consulta['usuario']."<br>";
            echo $consulta['clave']."<br>";
            echo $consulta['rol']."<br>";

            $existe++;
          }
          if($existe==0){echo "El usuario no existe";}
        }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $id    =$_POST['id'];
        $email    =$_POST['usuario'];
        $password    =$_POST['clave'];
        $password    =$_POST['rol'];


        $existe=0;

        if($rol=="" || $usuario=="" || $clave=="")
        {
          echo" LOS CAMPOS SON OBLIGATORIOS";
        }
        else
        {
          $existe=0;
          //CONSULTAR
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db2 WHERE id = '$id'");
          while($consulta = mysqli_fetch_array($resultados))
          {

            $existe++;
          }
          if($existe==0){echo "El id no existe";}
          else{
            //ACTUALIZAR
            $_UPDATE_SQL="UPDATE $tabla_db2 Set
            id='$id',
            email='$usuario',
            clave='$clave',
            rol='$rol',


            WHERE id='$id'";

            mysqli_query($conexion,$_UPDATE_SQL);
            echo "Actualizado con exito :)";
          }

        }
      }

      if(isset($_POST['btn_eliminar']))
      {
        $id    =$_POST['id'];
        $existe=0;

        if($id=="")
        {
          echo" id es un campo obligatorio";
        }
        else
        {
          //CONSULTAR
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db2 WHERE id = '$id'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            $existe++;
          }
          if($existe==0){echo "El usuario no existe";}
          else{
            //ELIMINAR
            $_DELETE_SQL =  "DELETE FROM $tabla_db2 WHERE id = '$id'";
            mysqli_query($conexion,$_DELETE_SQL);
            echo "Eliminado el usuario indicado exitosamente";
          }
        }
      }

    include("cerrar_conexion.php");
  ?>

  </div>



<!-- TERMINA LA COLUMNA -->



  <div class="col-md-4"></div>
</div>

<form class="formcusers" method="post">
<div class="caja">
  <label for="caja_busqueda">Buscar</label>
  <input type="text" name="consultausers" id="consultausers"></input>
</form>

</div>
<?php
  $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "tickets";

  $conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM users WHERE usuario NOT LIKE '' ORDER By id LIMIT 45";

    if (isset($_POST['consultausers'])) {
      $q = $conn->real_escape_string($_POST['consultausers']);
      $query = "SELECT * FROM users WHERE id LIKE '%$q%' OR usuario LIKE '%$q%' OR rol LIKE '$q'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
      $salida.="<table border=1 class='tabla_datos'>
          <thead>
            <tr id='titulo'>
              <td>id</td>
              <td>usuario</td>
              <td>clave</td>
              <td>rol</td>
            </tr>
          </thead>


      <tbody>";

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="<tr>
              <td>".$fila['id']."</td>
              <td>".$fila['usuario']."</td>
              <td>".$fila['clave']."</td>
              <td>".$fila['rol']."</td>
            </tr>";

      }
      $salida.="</tbody></table>";
    }else{
      $salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>
<div class="expusuarios">
<a href="exportar_usuarios.php"> <button type="button">Generar exportación usuarios.txt</button> </a>
<p> Para ver el archivo exportado accede a /tmp/ y lo verás como 'usuarios.txt'
</div>

<?php } else{
  echo "No tienes acceso para administrar MoBra Panel";
} ?>

</body>
</html>
