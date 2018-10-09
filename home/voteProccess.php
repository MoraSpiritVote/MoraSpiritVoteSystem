<?php

	// we've writen this code where we need
	function __autoload($classname) {
		$filename = "includes/". $classname .".php";
		include_once($filename);
	}

   session_start();

   $fr=$_SESSION['object'];
   $pl=$_SESSION['pl_object'];

    //print_r($pl->getPlayers());
    
    if (isset($_POST)) {
        $id=$_GET['id'];
        $voted=$_GET['voted'];
        $voted_id=$_GET['voted_id'];
        $user=$_SESSION['user'];
        $t=new DateTime();
        $time=$t->setTimezone(new DateTimeZone('Asia/Colombo'));
        $time_str=date_format($time,"Y/m/d H:i:s");
        
        //print(date_format($time,"Y/m/d H:i:s"));
        if ($voted=='0') {
            $r2=$pl->addVote($id);
            $r1='0';
            $rr=$pl->markUserVote($user,$id,$time_str);
        }elseif($voted=='1'){
            $r1=$pl->removeVote($voted_id);
            $r2=$pl->addVote($id);
            $rr=$pl->updateUserVote($user,$id,$time_str);
        }
        

        if ($r1=='0' and $r2=='0'and $rr=='0') {
            $pg='pg_s';

        }else{
            print($r1);
            print($r2);
            print($rr);
            $pg='pg_un';
            echo"UPDATE `user_list` SET `voted_player`='".$player_id."',`voted_time`='".$time."' WHERE uid='".$user."'";
        }

        header("Location:index.php?pg={$pg}");
    }
	


?>