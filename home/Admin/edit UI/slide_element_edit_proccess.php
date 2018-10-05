<?php

session_start();



if (isset($_SESSION['user'])) {
	
	$user=$_SESSION['user'];
}else{
	echo"eeeeeeeeeeeee";
	header("Location:../index.php");
}
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    
    logout();
}
function logout()
{

    unset($_SESSION['user']);
    header("Location:../index.php");
    exit;
}

function __autoload($classname) {
	$filename = "../../includes/". $classname .".php";
	include_once($filename);
}

$vp=$_SESSION['object'];
echo"rqqqqqqqqqqqqqqqqqqqqqqqq";
if (isset($_POST['submit'])) {
    echo"rtyuiolkjh";
    print_r($_POST);
    echo"<pre>";
    print_r($_FILES);
    echo"<pre>";

   //quotes
    $mainQuoteInImage1=$_POST['mainQuoteInImage1'];
    $mainQuoteInImage2=$_POST['mainQuoteInImage2'];
    $smallQuoteInImage1=$_POST['smallQuoteInImage1'];
    $smallQuoteInImage2=$_POST['smallQuoteInImage2'];

    //file

    $slideImage1_name=$_FILES['image1']['name'];
    $slideImage1_type=$_FILES['image1']['type'];
    $slideImage1_tmpname=$_FILES['image1']['tmp_name'];
    $slideImage1_size=$_FILES['image1']['size'];
    
    $slideImage2_name=$_FILES['image2']['name'];
    $slideImage2_type=$_FILES['image2']['type'];
    $slideImage2_tmpname=$_FILES['image2']['tmp_name'];
    $slideImage2_size=$_FILES['image2']['size'];

    $file_upload_to="../../img/";
    $file1_err='0';
    $file2_err='0';
    $r1_1='-1';
    $r1_2='-1';
    $r1_3='-1';
    $r2_1='-1';
    $r2_2='-1';
    $r2_3='-1';
    $error1='';
    $error2='';

    //1st slide
    
    if ($slideImage1_type=="") {
        $r1_1='0';
        
    }else{
        if ($slideImage1_type=="image/jpeg" || $slideImage1_type=="image/png") {
            $file1_uploaded=move_uploaded_file($slideImage1_tmpname,$file_upload_to.$slideImage1_name);
            if ($file1_uploaded) {
                $r1_1=$vp->setSlideImage1($slideImage1_name);
               
                
                
            }
        }else{
            $file1_err='1';
    
        }
    }

    $r1_2=$vp->setmainQuoteInImage1($mainQuoteInImage1);
    $r1_3=$vp->setsmallQuoteInImage1($smallQuoteInImage1);

    if ($slideImage2_type=="") {
        $r2_1='0';
        
    }else{
        if ($slideImage2_type=="image/jpeg" or $slideImage2_type=="image/png" ) {
            $file2_uploaded=move_uploaded_file($slideImage2_tmpname,$file_upload_to.$slideImage2_name);
            if ($file2_uploaded) {
                $r2_1=$vp->setSlideImage2($slideImage2_name);
               
                
                
            }
        }else{
            $file2_err='1';
    
        }
    }

    $r2_2=$vp->setmainQuoteInImage2($mainQuoteInImage2);
    $r2_3=$vp->setsmallQuoteInImage2($smallQuoteInImage2);

    
   


        if ($file1_err=='1' || $r1_1!='0' || $r1_2!='0' || $r1_3!='0' ) {
            $error1='slide1';
        }
        if ($file2_err=='1' || $r2_1!='0' || $r2_2!='0' || $r2_3!='0' ) {
            $error2='slide2';
        }
    

    

    
    print($r1_1);
    print($r1_2);
    print($r1_3);
    print($r2_1);
    print($r2_2);
    print($r2_3);
    print($error1);
    print($error2);

   header("Location:feedback.php?e1={$error1}&e2={$error2}");


    

}












?>