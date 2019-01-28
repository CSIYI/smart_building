<?php include('config.php') ?>
<?php
$errors = array();
$array_smartnode = array();
$array_sensor = array();

if(isset($_POST['smartnode-data-table']))
{
  $startDate = mysqli_real_escape_string($conn, $_POST['from']);
  $endDate = mysqli_real_escape_string($conn, $_POST['to']);
  $smartNodeId = mysqli_real_escape_string($conn, $_POST['smartnode']);
  
  $from =  $startDate.' 00:00:00';
  $to = $endDate.' 23:59:00';
  
  $query = "SELECT * FROM sensordata
            WHERE smartnode = $smartNodeId and 
                  date between '$from' and '$to'    
            order by sensor;";
  //echo $query;
  $result = mysqli_query($conn, $query);
  if($result){
    foreach ($result as $row) {
        $array_smartnode[] = $row;
        //print json_encode($row);
        //echo $row['sensor']; 
        if(!in_array($row['sensor'], $array_sensor)){
       		array_push($array_sensor, $row['sensor']);
        }      
    }
    //print json_encode($array_sensor);
  }else{
    array_push($errors, "Failed to fetch data");
  }

  //foreach($array_sensor as $sensor){
  
  for ($i = 0; $i < count($array_sensor); ++$i) {
        //print $array[$i];
    $timestamp[$i] = array();
	$temperature[$i] = array();
  	$query = "SELECT * FROM sensordata
            WHERE smartnode = $smartNodeId and 
                  date between '$from' and '$to'    
            and sensor = '$array_sensor[$i]';";
    //echo $query;
    $result = mysqli_query($conn, $query);
    if($result){
	      while($row = mysqli_fetch_assoc($result)){
	        //$timestamp[] = $row['date'];
	        //$temperature[] = $row['sensor_reading'];

	        array_push($timestamp[$i], $row['date']);
	        array_push($temperature[$i], $row['sensor_reading']);
	      }
	      //print json_encode($timestamp);
	      //print json_encode($temperature);
    }else{
    	array_push($errors, "Failed to fetch data");
  	}

  }




}

?>