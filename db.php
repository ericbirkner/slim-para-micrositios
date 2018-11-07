<?php
$conexion= "";
$insert_id=0;

function query ($sql){
    //echo "SQL->".$sql;
	global $conexion;
	global $insert_id;

	$mysqli = new mysqli(HOST, USER, PASS, BBDD);
	if ($mysqli->connect_errno) {
		die("error->".$mysqli->connect_error);
	}else{
		$mysqli->query("SET NAMES utf8");
	}

	$result = $mysqli->query($sql);
	$insert_id = $mysqli->insert_id;
	$mysqli->close();
	return $result;

}

function insert_id(){
	global $insert_id;
	return $insert_id;
}
?>
