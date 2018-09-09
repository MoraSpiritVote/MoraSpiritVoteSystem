<?php
    ob_start();
    include_once 'includes/dbConnection.php';

print_r($_POST);

$uid=$_GET['uid'];
login($uid);



function login($uid){
    $dbConn = new dbConnection();
    $sql="INSERT IGNORE INTO user_list (uid,voted_player, voted_time) VALUES ('".$uid."','','')";

    $conn=$dbConn->connect();
    echo"INSERT IGNORE INTO user_list (uid,voted_player, voted_time) VALUES ('".$uid."','','')";
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