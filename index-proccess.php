<?php

    include_once 'includes/dbConnection.php';

print_r($_POST);

$uid=$_GET['uid'];
login($uid);



function login($uid){
    $dbConn = new dbConnection();
    $sql="INSERT INTO user_list (uid,voted_player, voted_time) SELECT '".$uid."','','' FROM DUAL WHERE NOT EXISTS (SELECT uid FROM user_list WHERE uid='".$uid."')";

    $conn=$dbConn->connect();
    if ($conn) {
        echo"qqqqqqq";
        
        if ($ex=$conn->query($sql)) {
            unset($dbConn);
            $result=mysqli_fetch_assoc($ex);
            session_start();
            $_SESSION['user']=$uid;
            header("Location:Home.php?uid=".$uid."");
                
            
            
            
        } else {
            die('query not executed!!!');
        }
        
        
        
        
    } else {
        die('Connection Failed!!!');
    }
    
   

}







?>