<html> 
<head>
  <title>Grupo ProRG</title>
</head>

<body> 
	<h2 align="center">Reto  ProTG</h2>

	<div class="row" align="center">
		<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
		<td><font face="verdana"><b>Alumnos</b></font></td>
		</tr>
		  
		<?php 
			include "config.php";
			include "utils.php";

			$data = json_decode(file_get_contents("http://localhost/rest/post.php"),true);
			if($data){
				for ($i=0; $i<count($data); $i++){
					$alumnoID = $data[$i]["alumnoID"];
					$alumnoNombre = $data[$i]["alumno"];
					echo "<tr><td><a href='alumnos.php?id=$alumnoID&alumno=$alumnoNombre'>"
					.$data[$i]["video"]."</a></td></tr> \n"; 
				}
			}else{
				echo "no hay alumnos";
			}
			echo "</table> \n"; 
			?> 
	</div>
</body> 
</html> 
