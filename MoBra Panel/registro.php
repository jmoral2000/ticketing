<?php session_start();
$varsesion = $_SESSION['rol'];
?>

<html>
<head>
  <title>Administrar Tickets MoBra</title>
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

<div class="row">
  <div class="col-md-4"></div>

<!-- INICIA LA COLUMNA -->


  <div class="col-md-4">

    <center><h1>Administrar Tickets MoBra</h1></center>

    <form method="POST" action="registro.php" >

    <div class="form-group">
      <label for="doc">id_ticket</label>
      <h6> Si quieres registrar una incidencia no rellenes este campo </h6>
      <input type="text" name="id_ticket" class="form-control" id="id_ticket">
    </div>

    <div class="form-group">
        <label for="nombre">Fecha_inicio </label>
        <input type="date" name="Fecha_inicio" class="form-control" id="Fecha_inicio" >
    </div>

    <div class="form-group">
        <label for="dir">Tecnico </label>
        <input type="text" name="Tecnico" class="form-control" id="Tecnico">
    </div>

    <div class="form-group">
        <label for="tel">Cliente </label>
        <input type="text" name="Cliente" class="form-control" id="Cliente">
    </div>

    <div class="form-group">
        <label for="tel">Descripcion </label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion">
    </div>

    <div class="form-group">
        <label for="tel">Clasificacion </label>
        <select name="Clasificacion" class="form-control" id="Clasificacion">
         <option value="Software">Software</option>
         <option value="PC">PC</option>
         <option value="Correo">Correo</option>
         <option value="otro">otro</option>

        </select>
    </div>

    <div class="form-group">
        <label for="tel">Estado </label>
        <select name="Estado" class="form-control" id="Estado">
          <option value="Abierta">Abierta</option>
          <option value="Cerrada">Cerrada</option>
          <option value="Assignada">Assignada</option>
          </select>
    </div>

    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <?php   if ($varsesion == admin){?>
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
    <?php } else{
      echo "No tienes acceso para modificar,eliminar y actualizar tickets";
    } ?>
    <?php   if ($varsesion == admin){?>
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
    <?php } else{
      echo "";
    } ?>
      <?php   if ($varsesion == admin){?>
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    <?php } else{
      echo "";
    } ?>
    </center>

  </form>

  <?php
    include("abrir_conexion.php");

      $id_ticket    ="";
      $Fecha_inicio ="";
      $Tecnico    ="";
      $Cliente    ="";
      $Descripcion    ="";
      $Clasificacion    ="";
      $Estado    ="";

      if(isset($_POST['btn_registrar']))
      {
        $Fecha_inicio    =$_POST['Fecha_inicio'];
        $Tecnico    =$_POST['Tecnico'];
        $Cliente    =$_POST['Cliente'];
        $Descripcion    =$_POST['Descripcion'];
        $Clasificacion    =$_POST['Clasificacion'];
        $Estado    =$_POST['Estado'];

        $existe=0;

        if($Fecha_inicio=="" || $Tecnico=="" || $Cliente=="")
        {
          echo" LOS CAMPOS SON OBLIGATORIOS";
        }
        else
        {
          //INSERTAR
          mysqli_query($conexion, "INSERT INTO `ticket` (`id_ticket`, `Fecha_inicio`, `Tecnico`, `Cliente`, `Descripcion`, `Clasificacion`, `Estado`)
          VALUES (NULL, '$Fecha_inicio', '$Tecnico', '$Cliente', '$Descripcion', '$Clasificacion', '$Estado');");
        }
      }

      if(isset($_POST['btn_consultar']))
      {
        $id_ticket    =$_POST['id_ticket'];
        $existe=0;

        if($id_ticket=="")
        {
          echo" id_ticket es un campo obligatorio";
        }
        else
        {
          //CONSULTAR
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE id_ticket = '$id_ticket'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo $consulta['id_ticket']."<br>";
            echo $consulta['Fecha_inicio']."<br>";
            echo $consulta['Tecnico']."<br>";
            echo $consulta['Cliente']."<br>";
            echo $consulta['Descripcion']."<br>";
            echo $consulta['Clasificacion']."<br>";
            echo $consulta['Estado']."<br>";
            $existe++;
          }
          if($existe==0){echo "El documento no existe";}
        }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $id_ticket    =$_POST['id_ticket'];
        $Fecha_inicio    =$_POST['Fecha_inicio'];
        $Tecnico    =$_POST['Tecnico'];
        $Cliente    =$_POST['Cliente'];
        $Descripcion    =$_POST['Descripcion'];
        $Clasificacion    =$_POST['Clasificacion'];
        $Estado    =$_POST['Estado'];

        $existe=0;

        if($id_ticket=="" || $Fecha_inicio=="" || $Tecnico=="" || $Cliente=="")
        {
          echo" LOS CAMPOS SON OBLIGATORIOS";
        }
        else
        {
          $existe=0;
          //CONSULTAR
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE id_ticket = '$id_ticket'");
          while($consulta = mysqli_fetch_array($resultados))
          {

            $existe++;
          }
          if($existe==0){echo "El id no existe";}
          else{
            //ACTUALIZAR
            $_UPDATE_SQL="UPDATE $tabla_db1 Set
            id_ticket='$id_ticket',
            Fecha_inicio='$Fecha_inicio',
            Tecnico='$Tecnico',
            Cliente='$Cliente',
            Descripcion='$Descripcion',
            Clasificacion='$Clasificacion',
            Estado='$Estado'

            WHERE id_ticket='$id_ticket'";

            mysqli_query($conexion,$_UPDATE_SQL);
            echo "Actualizado con exito :)";
          }

        }
      }

      if(isset($_POST['btn_eliminar']))
      {
        $id_ticket    =$_POST['id_ticket'];
        $existe=0;

        if($id_ticket=="")
        {
          echo" id_ticket es un campo obligatorio";
        }
        else
        {
          //CONSULTAR
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE id_ticket = '$id_ticket'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            $existe++;
          }
          if($existe==0){echo "El ticket no existe";}
          else{
            //ELIMINAR
            $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE id_ticket = '$id_ticket'";
            mysqli_query($conexion,$_DELETE_SQL);
            echo "Eliminado el ticket indicado exitosamente";
          }
        }
      }


    include("cerrar_conexion.php");
  ?>

  </div>


<!-- TERMINA LA COLUMNA -->



  <div class="col-md-4"></div>
</div>


  <a href="incidencias.php"><img class="logout" src="https://image.flaticon.com/icons/png/512/860/860825.png"></a>


</body>
</html>
