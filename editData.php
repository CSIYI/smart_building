<?php include('config.php') ?>
<?php

$errors = array();

if (isset($_POST['add']) || isset($_POST['delete'])) {
  if(isset($_POST['add'])) $choice = "add";
  else  $choice = "delete";
	
  // receive all input values from the form
  $cluster = mysqli_real_escape_string($conn, $_POST['cluster']);
  $sensor = mysqli_real_escape_string($conn, $_POST['sensor']);
  $reading = mysqli_real_escape_string($conn, $_POST['reading']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);

  $building = mysqli_real_escape_string($conn, $_POST['building']);
  $smartnode = mysqli_real_escape_string($conn, $_POST['smartnode']);
  $type = mysqli_real_escape_string($conn, $_POST['sensor_type']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($cluster)) { array_push($errors, "Cluster Id is required"); }
  if (empty($sensor)) { array_push($errors, "Sensor Id is required"); }
  if (empty($reading)) { array_push($errors, "Reading is required"); }
  if (empty($date)) { array_push($errors, "Date is required"); }

  if (empty($building)) { array_push($errors, "Building Id is required"); }
  if (empty($smartnode)) { array_push($errors, "Smartnode Id is required"); }
  if (empty($type)) { array_push($errors, "Sensor type is required"); }



  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    //$choice =  $_POST['edit-choice'];
    if( $choice == "add"){
      $query = "INSERT INTO sensordata (date, cluster, smartnode, sensor, sensor_reading, sensor_type) 
          VALUES('$date','$cluster','$smartnode', '$sensor', '$reading','$type')";
      //echo $query;
      $result = mysqli_query($conn, $query);
      if($result){
        array_push($errors, "Successfully added data to system");
      }else{
          array_push($errors, "Failed added data to system");
      }
    }else if ($choice == "delete"){
      $query = "DELETE FROM sensordata WHERE  sensor=$sensor and sensor_reading = $reading";
      echo $query;
      $result = mysqli_query($conn, $query);
      if($result){
         array_push($errors, "Successfully delete sensor reading ".$reading);  
      }else{
        array_push($errors, "Failed to delete");
      }
    }
    
  	
  }
}


?>