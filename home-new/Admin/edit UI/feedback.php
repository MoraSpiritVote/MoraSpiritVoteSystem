<?php
session_start();

if (isset($_SESSION['user'])) {
	
	$user=$_SESSION['user'];
}else{
	echo"eeeeeeeeeeeee";
	header("Location:../login.php");
}
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    
    logout();
}
function logout()
{

    unset($_SESSION['user']);
    header("Location:../login.php");
    exit;
}

?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/vote.css">

</head>
<body onload=

<?php

    if ($_GET['e1']=='' and $_GET['e2']=='') {
        echo "\"document.getElementById('success').style.display='block'\"";
    }elseif ($_GET['e1']=='slide1' and $_GET['e2']=='') {
        echo "\"document.getElementById('e1').style.display='block'\"";
    }elseif ($_GET['e1']=='' and $_GET['e2']=='slide2') {
        echo "\"document.getElementById('e2').style.display='block'\"";
    }elseif ($_GET['e1']=='slide1' and $_GET['e2']=='slide2') {
        echo "\"document.getElementById('e3').style.display='block'\"";
    }











?>>


			<div id="success" class="modal">
				<span onclick="document.getElementById('success').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../../img/success_icon.jpg" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >Updated Successfully</label>
					
			
				
                    <br>
					
					<input type="button" onclick="location.href='vote_page.php'" value="Ok" class="vote_button" style="width:80px;">
				</div>
			
				
				</div>

				
			</div>

            <div id="e1" class="modal">
				<span onclick="document.getElementById('e1').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../../img/error.ico" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >ERROR on updating SLIDE 1 elements</label>
					
			
                    <br>
			
					<input type="button" onclick="location.href='vote_page.php'" value="Ok" class="vote_button" style="width:80px;">
					
				</div>
			
				
				</div>

				
			</div>

            <div id="e2" class="modal">
				<span onclick="document.getElementById('e2').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../../img/error.ico" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >ERROR on updating SLIDE 1 elements</label>
					
			
                <br>
			
                <input type="button" onclick="location.href='vote_page.php'" value="Ok" class="vote_button" style="width:80px;">
					
				</div>
			
				
				</div>

				
			</div>

            <div id="e3" class="modal">
				<span onclick="document.getElementById('e3').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../../img/error.ico" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >ERROR on updating SLIDE 1  and SLIDE 2 elements</label>
					
			
				<br>
			
                <input type="button" onclick="location.href='vote_page.php'" value="Ok" class="vote_button" style="width:80px;">
					
				</div>
			
				
				</div>

				
			</div>

            

</body>
</html>
