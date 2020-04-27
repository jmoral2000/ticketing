<?php session_start();
$varsesion = $_SESSION['rol'];
?>

<html>
<head>

</head>

<body>
<h1> "HOLAAAA panel de admin" <?php echo $_SESSION['rol'] ?> </h1>

<a href="cerrar_session.php">Cerrar sesión</a>
</body>

</html>
