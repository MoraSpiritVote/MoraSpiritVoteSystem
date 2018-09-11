<!DOCTYPE html>
<?php

session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // request 30 minates ago
    session_destroy();
    session_unset();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time

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

// we've writen this code where we need
function __autoload($classname) {
	$filename = "../includes/". $classname .".php";
	include_once($filename);
}

$pm=new playerManager();

$_SESSION['PM_object']=$pm;






?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="../css/bootstrap1.min.css" rel="stylesheet">
	<link href="../css/font-awesome1.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<!-- vote popup page -->
	<link rel="stylesheet" href="../css/vote.css">
	
	<link rel="icon" type="image/png" href="includes/images/icons/favicon.ico"/>
	
	
	<link rel="stylesheet" type="text/css" href="includes/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="includes/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="includes/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="includes/css/util.css">
	<link rel="stylesheet" type="text/css" href="includes/css/main.css">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Mora Spirit Voting</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
					<?php
					if (isset($_SESSION['user'])) {
                        echo 'loggedin: ' . strtoupper($user) . ' &nbsp;<a href="?logout=true"><strong>logout</strong></a>';
					}
					?>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
			<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
			<li><a href="edit UI/vote_page.php"><em class="fa fa-toggle-off">&nbsp;</em>Edit UI</a></li>
			<li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<!--======================================================-->
		<div class="limiter">
		<div class="container-table100" style="background:#e9ecf2;">
			<h2>Nominated Players</h2>
			<br>
			<br>
			<br>
			<br>
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Player Name</th>
								<th class="column2">Player's University</th>
								<th class="column3">Participating Sport</th>
								<th class="column4">Number of Votes</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							$players=$pm->getPlayers();
							

							for ($i=0; $i <count($players) ; $i++) {
								$id;
								$player;
								$uni='';
								$sport='';
								$image='';
								$votes='';

								foreach ($players[$i] as $x => $x_value) {
									if ($x=='id') {
									
										$id=$x_value;
								
									}elseif ($x=='player_name') {
										$player=$x_value;
									}elseif ($x=='university') {
										$uni=$x_value;
									}elseif ($x=='sport') {
										$sport=$x_value;
									}elseif ($x=='image') {
										$image=$x_value;
									}elseif ($x=='number_of_votes') {
										$votes=$x_value;
									}
									
								}

								echo'

								<tr>
										<td class="column1" onclick="document.getElementById(\''.$id.'\').style.display=\'block\'">'.$player.'</td>
										<td class="column2">'.$uni.'</td>
										<td class="column3">'.$sport.'</td>
										<td class="column4">'.$votes.'</td>
				
										
								</tr>
								';



							}
							
				
							
							
							
							
							
							?>



								
								
								
								
								
						</tbody>
					</table>
					<?php
							

							for ($j=0; $j <count($players) ; $j++) {
								$id='';
								$player='';
								$uni='';
								$sport='';
								$image='';
								$votes='';

								foreach ($players[$j] as $y => $y_value) {
									if ($y=='id') {
										
										$id=$y_value;
							
									}elseif ($y=='player_name') {
										$player=$y_value;
									}elseif ($y=='university') {
										$uni=$y_value;
									}elseif ($y=='sport') {
										$sport=$y_value;
									}elseif ($y=='image') {
										$image=$y_value;
									}elseif ($y=='number_of_votes') {
										$votes=$y_value;
									}
									
								}

								

								if ($image=='') {
									$img="no person.jpg";
								}else {
									$img=$image;
								}

								

								echo'

								<!--popup voting form-->

									<!-- The Modal -->
						<div id="'.$id.'" class="modal">
							<span onclick="document.getElementById(\''.$id.'\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>
						
							<!-- Modal Content -->
							<form class="modal-content animate" method="Post" enctype="multipart/form-data" action="playersEditProccess.php?id='.$id.'&im='.$image.'">
							<div class="imgcontainer">
								<img src="../img/players/'.$img.'" alt="Avatar" class="avatar" onclick="document.getElementById(\'image'.$id.'\').style.display=\'block\'" >
								<button class="vote_button" style="width: 80px;background-color:red;" name="delete" onclick="window.alert(\'are you sure you want to delete this player?\')" type="submit">Delete</button>
								</div>
						
							<div class="vote_container">

								<input type="file" id="image'.$id.'" name="image" style="display:none;" >
								<br>
								
								<label>Player Name</label>
								<input type="text" name="player" value="'.$player.'">
								<label>University Name</label>
								<input type="text" name="uni" value="'.$uni.'" >
								<label>Participating Sport</label>
								<input type="text" name="sport" value="'.$sport.'">

								
						
								<button class="vote_button" style="width: 80px;" name="submit" type="submit">Submit</button>
								<span><button type="button" onclick="document.getElementById(\''.$id.'\').style.display=\'none\'" class="vote_button" style="background-color:red;width:80px;">Cancel</button></span >
								
						
								
								
							</div>
						
							
							</form>
							

							
						</div>

						<!--end popup voting form-->
								';



							}
							
				
							
							
							
							
							
							?>









				</div>
			</div>

			<button class="vote_button" onclick="document.getElementById('add').style.display='block'">Add Player</button>

			<!--popup voting form-->

						<!-- The Modal -->
						<div id="add" class="modal">
				<span onclick="document.getElementById('add').style.display='none'" class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<form class="modal-content animate" method="Post" enctype="multipart/form-data" action="addPlayerProccess.php">
				<div class="imgcontainer">
					<img src="../img/players/no person.jpg" alt="Avatar" class="avatar" onclick="document.getElementById('photoChooser').style.display='block'" >
				</div>
			
				<div class="vote_container">
					<div id="photoChooser" style="display:none;">
						<label>Image</label>
					<input type="file" name="image"  >
					</div>
					<br>
					
					<label>Player Name</label>
					<input type="text" name="player" required>
					<label>University Name</label>
					<input type="text" name="uni" required >
					<label>Participating Sport</label>
					<input type="text" name="sport" required>

					
			
				
			
					<button class="vote_button" style="width: 80px;" name="submit" type="submit">Submit</button>
					
					<span><button type="button" onclick="document.getElementById('add').style.display='none'" class="vote_button" style="background-color:red;width:80px;">Cancel</button></span >
					
				</div>
			
				
				</form>

				<script>
					// Get the modal
					var modaladd = document.getElementById('add');
					
					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
						if (event.target == modaladd) {
							modaladd.style.display = "none";
						}
					}
					</script>
			</div>

			<!--end popup voting form-->
		</div>
	</div>
		
		
		
		<!--======================================================-->
		
		
		
		


		
		
		
		
		
	</div>	<!--/.main-->
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap1.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom1.js"></script>

		
</body>
</html>