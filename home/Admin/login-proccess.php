<?php

    include_once '../includes/dbConnection.php';

//print_r($_POST);

if (isset($_POST)) {
    $user=$_POST['Username'];
    $pass=$_POST['password'];
    $encPass=md5($pass);
    login($user,$encPass);

}


function login($user,$pass){
    $dbConn = new dbConnection();
    $sql="SELECT `password` FROM `admin_list` WHERE `username`='$user'";
    $conn=$dbConn->connect();
    if ($conn) {
        
        if ($ex=$conn->query($sql)) {
            unset($dbConn);
            $result=mysqli_fetch_assoc($ex);
            //print_r($result);
            $password=$result['password'];

            if ($pass===$password) {
                session_start();
                $_SESSION['user']=$user;
                header("Location:home.php");
                
            } else {
                header("Location:index.php?err");
            }
            
            
        } else {
            die('query not executed!!!');
        }
        
        
        
        
    } else {
        die('Connection Failed!!!');
    }
    
   

}







?>