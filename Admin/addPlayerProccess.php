<?php


session_start();

if (isset($_SESSION['user'])) {
	
	$user=$_SESSION['user'];
}else{
	echo"eeeeeeeeeeeee";
	header("Location:login.php");
}
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    
    logout();
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // request 30 minates ago
    session_destroy();
    session_unset();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time
function logout()
{

    unset($_SESSION['user']);

    header("Location:login.php");
    exit;
}

function __autoload($classname) {
	$filename = "../includes/". $classname .".php";
	include_once($filename);
}

$pm=$_SESSION['PM_object'];
echo"11111111111111111111";




if (isset($_POST)) {
    if (array_key_exists("submit",$_POST)) {
        print_r($_POST);
        echo"<pre>";
        print_r($_FILES);
        echo "<pre>";
        $player=$_POST['player'];
        $uni=$_POST['uni'];
        $sport=$_POST['sport'];

        $Image_name=$_FILES['image']['name'];
        $Image_type=$_FILES['image']['type'];
        $Image_tmpname=$_FILES['image']['tmp_name'];
        $Image_size=$_FILES['image']['size'];

        $file_upload_to="../img/players/";

        if ($Image_type=="") {
            $r=$pm->addPlayer($player,$uni,$sport,'');
            $filetype_err='0';
            
        }else{
            if ($Image_type=="image/jpeg" || $Image_type=="image/png") {
                $file_uploaded=move_uploaded_file($Image_tmpname,$file_upload_to.$Image_name);
                if ($file_uploaded) {
                    $r=$pm->addPlayer($player,$uni,$sport,$Image_name);
                    $filetype_err='0';
                   
                    
                    
                }
            }else{
                $filetype_err='1';
                $r='0';
        
            }
        }

        if ($r!='0' || $filetype_err=='1') {
            if ($r!='0') {
                echo"werth";
                $pg='pg_un';
              
            }else{
                echo"111111111111";
                print($r);
               $pg='pg_ferr';
            }
        }else {
            $pg='pg_s';
        }

        
    
        
    }
  

    header("Location:playersEditFeedback.php?pg={$pg}");
    
}

?>