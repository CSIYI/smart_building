<?php include('config.php') ?>
<?php

$errors = array();
$fetch_data = "";
$sensor_data = array();
$timestamp = array();
$temperature = array();

if (isset($_POST['get_data'])) {
  
  // receive all input values from the form
  $cluster = mysqli_real_escape_string($conn, $_POST['cluster']);
  $sensor = mysqli_real_escape_string($conn, $_POST['sensor']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);

  $building = mysqli_real_escape_string($conn, $_POST['building']);
  $smartnode = mysqli_real_escape_string($conn, $_POST['smartnode']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($cluster)) { array_push($errors, "Cluster Id is required"); }
  if (empty($sensor)) { array_push($errors, "Sensor Id is required"); }
  //if (empty($date)) { array_push($errors, "Date is required"); }

  if (empty($building)) { array_push($errors, "Buidling Id is required"); }
  if (empty($smartnode)) { array_push($errors, "Smartnode Id is required"); }


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
    $query = "SELECT * FROM sensordata WHERE sensor = '$sensor' and date(date) = '$date'"; 
    
    
    $result = mysqli_query($conn, $query);
    if($result){
      while($row = mysqli_fetch_assoc($result)){
        $fetch_data.= "|".$row['date']."?".$row['cluster']."?".$row['smartnode']."?".$row['sensor']."?".$row['sensor_reading']."?".$row['sensor_type'];
        $sensor_data[] = $row;
        $timestamp[] = $row['date'];
        $temperature[] = $row['sensor_reading'];
      }
      // print json_encode($sensor_data);
      // print json_encode($timestamp);
      // print json_encode($temperature);
    }else{
      array_push($errors, "Fetch nothing.");
    }
    
  }
}


?>