<?php include('config.php') ?>
<?php

$errors = array();
$array_cluster = array();
if(isset($_POST['cluster-data-table']))
{
  $startDate = mysqli_real_escape_string($conn, $_POST['from']);
  $endDate = mysqli_real_escape_string($conn, $_POST['to']);
  $clusterId = mysqli_real_escape_string($conn, $_POST['cluster']);
  
  $from =  $startDate.' 00:00:00';
  $to = $endDate.' 23:59:00';
  
  $query = "SELECT * FROM sensordata 
            WHERE cluster = $clusterId and 
                  date between '$from' and '$to'    
            order by smartnode;";
  
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

?>