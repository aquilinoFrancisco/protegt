<?php
include "config.php";
include "utils.php";

$dbConn =  connect($db);

//  listar todos los alumnos o solo uno
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if (isset($_GET['id'])){
    //Mostrar un alumno
    $sql = $dbConn->prepare("SELECT * FROM alumnos where alumnoID=:id");
    $sql->bindValue(':id', $_GET['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
    exit();
  }
  else {
    //Mostrar lista de alumno
    $sql = $dbConn->prepare("SELECT * FROM alumno");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode( $sql->fetchAll()  );
    exit();
  }
}

// Crear un nuevo alumnos
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $input = $_POST;
  $sql = "INSERT INTO alumnos
        (alumno¿¿ID,alumno, fecha_creacion)
        VALUES
        (:alumnoID, :alumno, :fecha_creacion)";
  $statement = $dbConn->prepare($sql);
  bindAllValues($statement, $input);
  $statement->execute();
  $postId = $dbConn->lastInsertId();
  if($postId){
    $input['id'] = $postId;
    header("HTTP/1.1 200 OK");
    echo json_encode($input);
    exit();
  }
}
//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>