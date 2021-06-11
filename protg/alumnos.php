<html>
<head>
  <title>Efi inf</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  * {
    box-sizing: border-box;
  }
  .row {
    display: flex;
  }
  /* Crea dos columnsas, una al lado de la otras */
  .column {
    flex: 100%;
  }
  </style>
</head> 

<body>
  <h1>Reto Grupo ProTG</h1>

  table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
<tr><th>Alumnos</th></tr>

  <?php 
include "config.php";
include "utils.php";

$dbConn =  connect($db);
session_start();

$sql = $dbConn->prepare("SELECT * FROM alumnos );
$sql->bindValue(':alumnoID', $_SESSION['alumnoID']);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
header("HTTP/1.1 200 OK");

$data = json_decode(json_encode($sql->fetchAll()),true);
	if($data){
		for ($i=0; $i<count($data); $i++){
			$comentarioNombre = $data[$i]["alumno"];
			echo "<tr><td>".$data[$i]['comentario']."</td></tr> \n";
			} 
	}else{
		echo "no hay Alumnos";
	} 
	echo "</table> \n"; 
	?>

  <div class="row">
    <div class="column" style="background-color:#bbb;">
      <embed src="<?php echo $_ruta_alumno; ?>" width="500" height="350" autostart="true" loop="true" /> </embed>
  	<form action="http://localhost/rest/servicios_alumnos.php" method="post">
  		 <p>Alumno: <input type="text" name="alumno" required /></p>
  		 <p>Fecha: <input type="date" name="fecha_creacion" required /></p>
  		 <p><input type="hidden" name= "alumnoID" value=<?php echo $_SESSION["alumnoID"]?> /></p>
  		 <p><input type="submit" /></p>
  	</form>
    </div>
  </div>
</body> 
</html>
