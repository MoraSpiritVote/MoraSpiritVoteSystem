<?php

	// we've writen this code where we need
	function __autoload($classname) {
		$filename = "includes/". $classname .".php";
		include_once($filename);
	}

   session_start();

   $fr=$_SESSION['object'];
   $pl=$_SESSION['pl_object'];

	

	echo"11111111111111111111<br>";

    print_r($pl->getPlayers());
    
    if (isset($_POST)) {
        $id=$_GET['id'];
        $r=$pl->addVote($id);

        if ($r=='0') {
            $pg='pg_s';
        }else{
            $pg='pg_un';
        }

        header("Location:voteFeedback.php?pg={$pg}");
    }
	


?>