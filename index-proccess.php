<?php

    include_once 'includes/dbConnection.php';

print_r($_POST);

if (isset($_POST)) {
    $user=$_POST['Username'];
    $pass=$_POST['password'];
    $encPass=$pass;
    print($encPass);

    login($user,$encPass);


   
    
    
    



}


function login($user,$pass){
    $dbConn = new dbConnection();
    $sql="SELECT `password` FROM `user_reg` WHERE `username`='$user'";
    $conn=$dbConn->connect();
    if ($conn) {
        echo"qqqqqqq";
        
        if ($ex=$conn->query($sql)) {
            unset($dbConn);
            $result=mysqli_fetch_assoc($ex);
            print_r($result);
            $password=$result['password'];
            echo'<br>';
            print($pass);
            echo'<br>';
            print($password);
            print(strcmp($pass,$password));

            if ($pass==$password) {
                echo"kkkkkkkk";
                session_start();
                $_SESSION['user']=$user;
                header("Location:Home.php");
                
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