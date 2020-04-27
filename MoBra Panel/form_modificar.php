<html>
<head>
<title>Modificar registros</title>
</head>

<body>
  <form action="modificar.php" method="post">
    id_antigua
    <input type="text" name="id_viejo" /> <br />
    id_nueva
    <input type="text" name="id_nuevo" /> <br />
    Fecha_antigua
    <input type="date" name="Fecha_inicio_viejo" /> <br />
    Fecha_nueva
    <input type="date" name="Fecha_inicio_nuevo" /> <br />
    Tecnico_antiguo
    <input type="text" name="Tecnico_viejo" /> <br />
    Tecnico_nuevo
    <input type="text" name="Tecnico_nuevo" /> <br />
    Cliente_antiguo
    <input type="text" name="Cliente_viejo" /> <br />
    Cliente_nuevo
    <input type="text" name="Cliente_nuevo" /> <br />
    Despacho_antiguo
    <input type="text" name="Despacho_viejo" /> <br />
    Despacho_nuevo
    <input type="text" name="Despacho_nuevo" /> <br />

    <label>Clasificacion_Antigua: </label>
    <select name="Clasificacion_viejo" id="Clasificacion_viejo">
 <option value="Software">Software</option>
 <option value="PC">PC</option>
 <option value="Correo">Correo</option>
 <option value="otro">otro</option>

</select><br>
<label>Clasificacion_Nueva: </label>
<select name="Clasificacion_nuevo" id="Clasificacion_nuevo">
<option value="Software">Software</option>
<option value="PC">PC</option>
<option value="Correo">Correo</option>
<option value="otro">otro</option>

</select><br>

    <label>Estado_Viejo: </label>
    <select name="Estado_viejo" id="Estado_viejo">
 <option value="Abierta">Abierta</option>
 <option value="Cerrada">Cerrada</option>
 <option value="Assignada">Assignada</option>
</select> <br>

<label>Estado_Nuevo: </label>
<select name="Estado_nuevo" id="Estado_nuevo">
<option value="Abierta">Abierta</option>
<option value="Cerrada">Cerrada</option>
<option value="Assignada">Assignada</option>
</select> <br>

    <input type="submit" name="actualizar" /> <br />
</body>

</html>
