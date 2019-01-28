<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "SmartBuilding";
$errors = array();
$result = "";
$fetch_data = "";
$time_data_array = array();
$array_smartnode = array();
$array_cluster = array();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['add']) || isset($_POST['delete'])) {
  if(isset($_POST['add'])) $choice = "add";
  else  $choice = "delete";
	
  // receive all input values from the form
  $cluster = mysqli_real_escape_string($conn, $_POST['cluster']);
  $sensor = mysqli_real_escape_string($conn, $_POST['sensor']);
  $reading = mysqli_real_escape_string($conn, $_POST['reading']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($cluster)) { array_push($errors, "Cluster Id is required"); }
  if (empty($sensor)) { array_push($errors, "Sensor Id is required"); }
  if (empty($reading)) { array_push($errors, "Reading is required"); }
  if (empty($date)) { array_push($errors, "Date is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    //$choice =  $_POST['edit-choice'];
    if( $choice == "add"){
      $query = "INSERT INTO Reading (cluster_id, sensor_id, sensor_reading, time) 
          VALUES('$cluster', '$sensor', '$reading','$date')";
      $result = mysqli_query($conn, $query);
      if($result){
        array_push($errors, "Successfully added data to system");
      }else{
          array_push($errors, "Failed added data to system");
      }
    }else if ($choice == "delete"){
      $query = "DELETE FROM Reading WHERE  sensor_reading=$reading";
      $result = mysqli_query($conn, $query);
      if($result){
         array_push($errors, "Successfully delete sensor reading ".$reading);  
      }else{
        array_push($errors, "Failed to delete");
      }
    }
    
  	
  }
}
if (isset($_POST['get_data'])) {
  
  // receive all input values from the form
  $cluster = mysqli_real_escape_string($conn, $_POST['cluster']);
  $sensor = mysqli_real_escape_string($conn, $_POST['sensor']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($cluster)) { array_push($errors, "Cluster Id is required"); }
  if (empty($sensor)) { array_push($errors, "Sensor Id is required"); }
  if (empty($date)) { array_push($errors, "Date is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    $query = "SELECT time, sensor_reading FROM Reading";
    $result = mysqli_query($conn, $query);
    if($result){
      while($row = mysqli_fetch_assoc($result)){
        $fetch_data.= "|".$row['time']."?".$row['sensor_reading'];
      }
      array_push($errors, $fetch_data);
    }else{
      array_push($errors, "Fetch nothing.");
    }
    
  }
}
if(isset($_POST['smartnode-data-table']))
{
  $startDate = mysqli_real_escape_string($conn, $_POST['from']);
  $endDate = mysqli_real_escape_string($conn, $_POST['to']);
  $smartNodeId = mysqli_real_escape_string($conn, $_POST['smartnode']);
  
  $from =  $startDate.' 00:00:00';
  $to = $endDate.' 23:59:00';
  
  $query = "SELECT time, sensor_id, sensor_reading FROM Reading 
            WHERE smartnode_id = $smartNodeId and 
                  time between '$from' and '$to'    
            order by sensor_id;";
  $result = mysqli_query($conn, $query);
  if($result){
    foreach ($result as $row) {
        $array_smartnode[] = $row;
      }
    //print_r($array_smartnode);
  }else{
    array_push($errors, "Failed to fetch data");
  }
}

if(isset($_POST['cluster-data-table']))
{
  $startDate = mysqli_real_escape_string($conn, $_POST['from']);
  $endDate = mysqli_real_escape_string($conn, $_POST['to']);
  $clusterId = mysqli_real_escape_string($conn, $_POST['cluster']);
  
  $from =  $startDate.' 00:00:00';
  $to = $endDate.' 23:59:00';
  
  $query = "SELECT time, smartnode_id, sensor_id, sensor_reading FROM Reading 
            WHERE cluster_id = $clusterId and 
                  time between '$from' and '$to'    
            order by smartnode_id;";
  
  $result = mysqli_query($conn, $query);
  if($result){
    foreach ($result as $row) {
        $array_cluster[] = $row;
      }
      //print_r($array_cluster);
  }else{
    array_push($errors, "Failed to fetch data");
  }
}



/*if (isset($_POST['daily'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $sensor = mysqli_real_escape_string($conn, $_POST['sensor']); 
  $query = "SELECT time, sensor_reading FROM Reading WHERE DATE(TIME) = DATE('$date') and sensor_id = $sensor ";
  $result = mysqli_query($conn, $query);
  if($result){
      
      foreach ($result as $row) {
        $array[] = $row;
      }
      $temp =  json_encode($array); 
      $time_data_array = json_decode($temp, TRUE);
      if(file_put_contents('data.json', $temp)) {
          echo 'Data successfully saved';
      }
      else{ 
          echo "error";
      }
      
    }else{
      array_push($errors, "Failed to fetch data");
    }
}*/



?> 