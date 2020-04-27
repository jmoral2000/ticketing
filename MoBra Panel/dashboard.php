<?php session_start();
$varsesion = $_SESSION['rol'];
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<title>
		  Dashboard-Menú Principal
		</title>


		</head>

			<body class="dashboard">
					  <a href="dashboard.php"><img class="elogo" src="../logo.png"></a>
  				<a href="../cerrar_session.php"><img class="logout" src="https://png.pngtree.com/svg/20140418/logout_1185746.png"></a>

					  <div class="vertical-menu">
					   <a href="dashboard.php" class="active">Dashboard</a>
					   <a href="incidencias.php">Incidencias</a>
					   <a href="historico.php">Historico</a>
					   <a href="admin.php">Admin</a>
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

							 $queryticket = "SELECT count(*) as totalticket from ticket ";

								if ($resultticket = mysqli_query($conn, $queryticket)) {

								    $dataticket=mysqli_fetch_assoc($resultticket);

								    $dashboardtotaltickets = $dataticket['totalticket'];
	}
 						 	?>

							<div class="ticketstotal">
						                        <div class="tile-stats">
						                          <div class="icon"><i class="fa fa-ticket"></i></div>
						                          <h3>TOTAL TICKETS</h3>
																			<img class="ticket" src="images/ticket.png" alt="">
																			<?php echo $dashboardtotaltickets ?></div>

						                        </div>

									<?php
															$queryticketabiertos = "SELECT count(*) as totalticketabiertos from ticket where Estado = 'Abierta'";

														 	if ($resultticketabiertos = mysqli_query($conn, $queryticketabiertos)) {

											    	 			$dataticketabiertos=mysqli_fetch_assoc($resultticketabiertos);

														  		$dashboardtotalticketsabiertos = $dataticketabiertos['totalticketabiertos'];

																	 }
										?>
										<div class="ticketspendientes">
																					<div class="tile-stats">
																						<div class="icon"><i class="fa fa-ticket"></i></div>
																						<h3>TOTAL TICKETS PENDIENTES</h3>
																						<img class="tickets" src="images/tickets.png" alt="">
																						<?php
																						$dashboardtotalticketsabiertosporcentaje=$dashboardtotalticketsabiertos*100/$dashboardtotaltickets;
																						echo $dashboardtotalticketsabiertosporcentaje."%";
																						 ?>

																					 </div>
																					</div>


																					<?php
																											$queryticketjmoral = "SELECT count(*) as jmoral from ticket where Tecnico = 'jmoral'";

																											if ($resultticketjmoral = mysqli_query($conn, $queryticketjmoral)) {

																							    	 			$dataticketjmoral=mysqli_fetch_assoc($resultticketjmoral);

																										  		$dataticketjmoral['jmoral'];

																													$ticketsjmoral= $dataticketjmoral['jmoral'];



																													 }
																						?>
																						<?php
																												$queryticketjendrino = "SELECT count(*) as jendrino from ticket where Tecnico = 'jendrino'";

																												if ($resultticketjendrino = mysqli_query($conn, $queryticketjendrino)) {

																														$dataticketjendrino=mysqli_fetch_assoc($resultticketjendrino);

																														$dataticketjendrino['jendrino'];

																														$ticketsjendrino= $dataticketjendrino['jendrino'];


																														 }
																							?>

																							<?php
																													$queryticketegarcia = "SELECT count(*) as egarcia from ticket where Tecnico = 'egarcia'";

																													if ($resultticketegarcia = mysqli_query($conn, $queryticketegarcia)) {

																															$dataticketegarcia=mysqli_fetch_assoc($resultticketegarcia);

																															$dataticketegarcia['egarcia'];

																															$ticketsegarcia= $dataticketegarcia['egarcia'];



																															 }
																								?>



																								<div class="ticketsporusuario">
																								<div class="tile-stats">
																									<div class="icon"><i class="fa fa-ticket"></i></div>
																												<h3>TOTAL TICKETS POR USUARIO</h3>
																										<?php
																									$dashboardjmoral=$ticketsjmoral*100/$dashboardtotaltickets;
																									$dashboardjendrino=$ticketsjendrino*100/$dashboardtotaltickets;
																									$dashboardegarcia=$ticketsegarcia*100/$dashboardtotaltickets;
																									?>
																									<img class="user" src="images/usuario.png" alt="">
																										jmoral: <?php echo $dashboardjmoral."%";?>
																										jendrino: <?php echo $dashboardjendrino."%";?>
																										egarcia: 	<?php echo $dashboardegarcia."%";?>
																															 </div>
																										</div>


																</div>

																<?php
																						$querycpc = "SELECT count(*) as totalticketcpc from ticket where Clasificacion = 'PC'";

																					 	if ($resultticketcpc = mysqli_query($conn, $querycpc)) {

																		    	 			$dataticketscpc=mysqli_fetch_assoc($resultticketcpc);

																					  		$dashboardtotalticketscpc = $dataticketscpc['totalticketcpc'];


																								 }
																								 	?>
																									<?php
																									$querysoft = "SELECT count(*) as totalticketsoft from ticket where Clasificacion = 'Software'";

																									if ($resultticketsoft = mysqli_query($conn, $querysoft)) {

																									$dataticketssoft=mysqli_fetch_assoc($resultticketsoft);

																									$dashboardtotalticketssoft = $dataticketssoft['totalticketsoft'];


																																	 }
																																		?>

																				<?php
																					$querycorreo = "SELECT count(*) as totalcorreo from ticket where Clasificacion = 'Correo'";
																			if ($resultticketcorreo = mysqli_query($conn, $querycorreo)) {

																						$dataticketscorreo=mysqli_fetch_assoc($resultticketcorreo);

																						$dashboardtotalticketscorreo = $dataticketscorreo['totalcorreo'];


																																			 }
																																			?>

																					<?php
																							$queryotro = "SELECT count(*) as totalticketotro from ticket where Clasificacion = 'otro'";
																									if ($resultticketotro = mysqli_query($conn, $queryotro)) {

																								$dataticketsotro=mysqli_fetch_assoc($resultticketotro);

																								$dashboardtotalticketsotro = $dataticketsotro['totalticketotro'];


																																																		 }
																																																		?>

																						<div class="ticketsporclas">
													<div class="icon"><i class="fa fa-ticket"></i></div>
												<h3>TOTAL TICKETS POR CLASIFICACIÓN</h3>
												<img class="clas" src="images/clasificacion.png" alt="">
												Software: <?php echo $dashboardtotalticketssoft; ?>
												PC: <?php echo $dashboardtotalticketscpc;?>
												Correo: 	<?php echo $dashboardtotalticketscorreo; ?>
												Otro: 	<?php echo $dashboardtotalticketsotro; ?>

															 </div>
																	</div>


											</div>


			</body>

</html>
