<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/vote.css">

</head>
<body onload=

<?php

    if ($_GET['pg']=='pg_s') {
        echo "\"document.getElementById('success').style.display='block'\"";
    }elseif ($_GET['pg']=='pg_un') {
        echo "\"document.getElementById('e1').style.display='block'\"";
    }

?>>


			<div id="success" class="modal">
				<span onclick="document.getElementById('success').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="img/success_icon.jpg" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >Voted Successfully</label>
					
			
				
                    <br>
					
					<input type="button" onclick="location.href='Home.php'" value="Ok" class="vote_button" style="width:80px;">
				</div>
			
				
				</div>

				
			</div>

            <div id="e1" class="modal">
				<span onclick="document.getElementById('e1').style.display='none'" 
			    class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<div class="modal-content animate" >
				<div class="imgcontainer">
					<img src="img/error.ico" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;" >

					<label style="text-align:center;" >Vote not Successfull</label>
					
			
                    <br>
			
					<input type="button" onclick="location.href='Home.php'" value="Ok" class="vote_button" style="width:80px;">
					
				</div>
			
				
				</div>

				
			</div>

           

            

            

</body>
</html>
