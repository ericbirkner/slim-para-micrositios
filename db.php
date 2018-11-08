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

function table(){
  //get results from database
  $result = query("SELECT * FROM usuarios");
  $all_property = array();  //declare an array for saving property

  $tabla = "";
  //showing property
  $tabla.= '<table class="data-table">
          <tr class="data-heading">';  //initialize table tag
  while ($property = mysqli_fetch_field($result)) {
      $tabla.= '<th>' . $property->name . '</th>';  //get field name for header
      array_push($all_property, $property->name);  //save those to array
  }
  echo '</tr>'; //end tr tag

  //showing all data
  while ($row = mysqli_fetch_array($result)) {
      $tabla.= "<tr>";
      foreach ($all_property as $item) {
          $tabla.= '<td>' . $row[$item] . '</td>'; //get items using property value
      }
      $tabla.= '</tr>';
  }
  $tabla.= "</table>";
  return $tabla;
}


?>
