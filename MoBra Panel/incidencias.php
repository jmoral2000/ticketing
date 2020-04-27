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


<section class="principal">

<div class="ticket1">
	<h1>Incidencias</h1>

	<div class="formulario">
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>


	</div>
<br><br>
	<div class="ticket2" id="datos"></div>


</section>




<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>


</body>

</html>
