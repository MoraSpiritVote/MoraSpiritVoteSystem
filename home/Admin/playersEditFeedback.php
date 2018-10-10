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
function logout()
{

    unset($_SESSION['user']);
    header("Location:login.php");
    exit;
}

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="vote.css">

</head>
<body onload=

<?php

    if ($_GET['pg']=='pg_s') {
        echo "\"document.getElementById('success').style.display='block'\"";
    }elseif ($_GET['pg']=='pg_un') {
        echo "\"document.getElementById('e1').style.display='block'\"";
    }elseif ($_GET['pg']=='pg_ferr') {
        echo "\"document.getElementById('e2').style.display='block'\"";
    }elseif ($_GET['pg']=='pg_del') {
        echo "\"document.getElementById('del').style.display='block'\"";
    }

?>>


			<div id="success" class="modal" style="display: none;">
				<span onclick="document.getElementById('success').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../img/success_icon.jpg" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >Updated Successfully</label>
					
			
				
                    <br>
					
					<input type="button" onclick="location.href='home.php'" value="Ok" class="vote_button" style="width:80px;">
				</div>
			
				
				</div>

				
			</div>

            <div id="e1" class="modal" style="display: none;">
				<span onclick="document.getElementById('e1').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../img/error.ico" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >ERROR on updating Players Information</label>
					
			
                    <br>
			
					<input type="button" onclick="location.href='home.php'" value="Ok" class="vote_button" style="width:80px;">
					
				</div>
			
				
				</div>

				
			</div>

            <div id="e2" class="modal" style="display: none;">
				<span onclick="document.getElementById('e2').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../img/error.ico" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >File Type Is Wrong</label>
					
			
                <br>
			
                <input type="button" onclick="location.href='home.php'" value="Ok" class="vote_button" style="width:80px;">
					
				</div>
			
				
				</div>

				
			</div>

            <div id="del" class="modal" style="display: none;">
				<span onclick="document.getElementById('del').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="../img/success_icon.jpg" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >Player Successfully Deleted</label>
					
			
				<br>
			
                <input type="button" onclick="location.href='home.php'" value="Ok" class="vote_button" style="width:80px;">
					
				</div>
			
				
				</div>

				
			</div>

            

</body>
</html>
