<?php
	
	session_start();
	// we've writen this code where we need
	function __autoload($classname) {
		$filename = "includes/". $classname .".php";
		include_once($filename);
	}

   
	$user=$_SESSION['user'];
	$fr=new frontPage();
	$_SESSION['object']=$fr;
	$pl=new playerManager();
	$_SESSION['pl_object']=$pl;
	//print_r($_SESSION);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- Page Title -->
        <title>MoraSpirit | Vote</title>		
		<!-- Meta Description -->
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Muhammad Morshed">
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Google Font -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- jquery.fancybox  -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- animate -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
		<!-- media-queries -->
		<link rel="stylesheet" href="css/media-queries.css">
		<!-- vote popup page -->
		<link rel="stylesheet" href="css/vote.css">
		<!--font style-->
		<link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet'>

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

    </head>
	
<script>
function votingpg_s() {
    var x = document.getElementById('votealert');
    x.innerHTML = 'Voted Successfully...!';
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4500);
}
function votingpg_un() {
    var x = document.getElementById('votealertx');
    x.innerHTML = 'Voted Unsuccessfully...! Try Later.';
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4500);
}
</script>

    <body id="body" 
		<?php
		    if ($_GET['pg']=='pg_s') {
		        echo "onload='votingpg_s()'";
		    }elseif ($_GET['pg']=='pg_un') {
		        echo "onload='votingpg_un()'";
		    }else{

		    }
		?>>

        <!-- 
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header" style="height:30px;">
                    <!-- responsive nav button -->
			       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
                  <a class="navbar-brand" href="#body">
						<h1 id="logo">
							<img style="height: 5rem; width: 5rem;" src="img/moraspirit_logo.png" alt="MoraSpirit">
						</h1>
						
					</a>
					<!-- /logo -->
					
				</div>
				

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
					
					<ul id="nav" class="nav navbar-nav">
                        <li class="current"><a href="#body">Home</a></li>
                        <!--<li><a href="#facts">Top Popular</a></li>-->
                        <li><a href="#works">Vote</a></li>
                        <!--<li><a href="#team">Team</a></li>-->
                        <li><a href="#footer">Contact</a></li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->


<div id='votealert'></div>
<div id='votealertx'></div>


		<section id="facts" class="facts">
			<div class="parallax-overlay">
				<div class="container">
					<div class="row number-counters">
						
						<div class="sec-title text-center mb50 wow rubberBand animated" data-wow-duration="1000ms">
							<h2>Top 3 Popular Players</h2>
							<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
						</div>

						<?php
						
						$players=$pl->getPlayers();
						

						for ($i=0; $i <3 ; $i++) {
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

							if ($image=='') {
								$img="no person.jpg";
							}else {
								$img=$image;
							}
							
							echo'
							<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" style="margin-left:30px;">
							<div class="counters-item">
							<img src="img/players/'.$image.'" style="border-radius:2000px;" alt="" width="400px" height="300px">
								<strong data-to="'.$votes.'">0</strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p>'.$player.'</p>
							</div>
							</div>
							
							
							
							';
						}
						?>
						?>
					</div>
				</div>
			</div>
		</section>
		
        <!--
        End Some fun facts
        ==================================== -->





		<!--
        Our Works
        ==================================== -->
		
		<section id="works" class="works clearfix">
			<div class="container">
				<div class="row" style="align-content: center";>

					
				
					<div class="sec-title text-center">
						<h2>Vote For Your Player</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>

						
					
					<div class="sec-sub-title text-center">
						<p>Now you can vote for your favourite player </p>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="project-wrapper" style="margin-left:30%;" >

						
						<?php

						$voted='0';
						$voted_id='';
						if ($p=$pl->getUserVotedPlayer($user)) {

							if($p['voted_player'] ==''){

							}else{
								$voted='1';
								//print_r($p);
								//echo"------------------------";
							$p_id=$p['voted_player'];
							$voted_id=$p_id;
							$info=$pl->getSpecificPlayer($p_id);
							$p_name=$info['player_name'];
							$p_uni=$info['university'];
							$p_sport=$info['sport'];
							$p_image=$info['image'];
							$p_vote=$info['number_of_votes'];
							

							echo'
							<h3 class="sec-sub-title" style="font-weight: 900;color:#0eb493;font-size:30px;" >Player that You have Voted</h3>
							<br>
							<div class="project-wrapper">
							<figure class="mix work-item" style="width:50%">
							<img src="img/players/'.$p_image.'" alt="" width="400px" height="300px">
							<span>
							<div class="sec-sub-title text-center" style="text-align:center;">
						
							<p style="font-size: 30px;">'.$p_name.'</p>
							
							<p>'.$p_uni.'</p>
							
							<p>'.$p_sport.'</p>
						
							<p>Number of Votes:'.$p_vote.'</p>
							
							
							</span>
							
						</figure>
						</div>
						<br>
						<br>
						';

							}
							
						}else{

							print($user);
						}
						
						
						?>
						
						</div>
						
					
					
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			
			<div class="project-wrapper">
				<?php
							$players=$pl->getPlayers();
							

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

								if ($image=='') {
									$img="no person.jpg";
								}else {
									$img=$image;
								}

								if ($voted=='1') {
									if ($voted_id==$id){
										$class='vote_button_disabled';
									}else{
										$class='vote_button';
									}
								}else{
									$class='vote_button';
								}

								

							echo'
							
				<figure class="mix work-item">
				<img src="img/players/'.$img.'" alt="Player Image" width="400px" height="300px">
				<!--===========vote block=============-->
				<figcaption class="overlay">
					<a class="fancybox" rel="works" title="Give Your Precious Vote" href="img/players/'.$img.'"><i class="fa fa-eye fa-lg"></i></a>
					<h4>'.$player.'</h4>
					<p>'.$uni.'</p>
			
				<button class="'.$class.'" style="width:80px;" onclick="document.getElementById(\''.$id.'\').style.display=\'block\'">Vote</button>
					
				</figcaption>
				</figure>
				<!--===========vote block=============-->
				<div id="'.$id.'" class="modal">
				<span onclick="document.getElementById(\''.$id.'\').style.display=\'none\'" 
			class="close" title="Close Modal">&times;</span>
			
				<!-- Modal Content -->
				<form class="modal-content animate" method="Post" action="voteProccess.php?id='.$id.'&voted='.$voted.'&voted_id='.$voted_id.'">
				<div class="imgcontainer">
				<span onclick="document.getElementById(\''.$id.'\').style.display=\'none\'" class="close" title="Close Modal">×</span>
					<img src="img/players/'.$img.'" alt="Avatar" class="avatar">
				</div>
			
				<div class="vote_container" style="text-align:center;">

					<h2 >'.$player.'</h2>
					<br>
					<label >'.$uni.'</label>
					<br>
					<label >'.$sport.'</label>
					
					
			
				
					<br>
					<button class="vote_button" style="width: 80px;" name="submit" type="submit">Vote</button>
					
				</div>
			
				
				</form>

				
			</div>
							
														
							';

							}
							
							?>
				
			</div>

		</section>
		
		
		<footer id="footer" class="footer">
			<div class="container">
				<div class="row">			
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
						<div class="footer-single">
							<h6>Explore</h6>
							<ul>
								<li><a href="#">Inside Us</a></li>
								<li><a href="#">Flickr</a></li>
								<li><a href="#">Google</a></li>
								<li><a href="#">Forum</a></li>
							</ul>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
						<div class="footer-single">
							<h6>Support</h6>
							<ul>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Market Blog</a></li>
								<li><a href="#">Help Center</a></li>
								<li><a href="#">Pressroom</a></li>
							</ul>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="copyright text-center">
							Copyright © 2015 <a href="http://themefisher.com/">Themefisher</a>. All rights reserved. Designed & developed by <a href="http://themefisher.com/">Themefisher</a>
						</p>
					</div>
				</div>
			</div>
		</footer>
		
		<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>

		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Single Page Nav -->
        <script src="js/jquery.singlePageNav.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- jquery.mixitup.min -->
        <script src="js/jquery.mixitup.min.js"></script>
		<!-- jquery.parallax -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countTo -->
        <script src="js/jquery-countTo.js"></script>
		<!-- jquery.appear -->
        <script src="js/jquery.appear.js"></script>
		<!-- Contact form validation -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
		<!-- Google Map -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
		<!-- jquery easing -->
        <script src="js/wow.min.js"></script>
		<script>
			var wow = new WOW ({
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       120,          // distance to the element when triggering the animation (default is 0)
				mobile:       false,       // trigger animations on mobile devices (default is true)
				live:         true        // act on asynchronously loaded content (default is true)
			  }
			);
			wow.init();
		</script> 
		<!-- Custom Functions -->
        <script src="js/custom.js"></script>
		
		<script type="text/javascript">
			$(function(){
				/* ========================================================================= */
				/*	Contact Form
				/* ========================================================================= */
				
				$('#contact-form').validate({
					rules: {
						name: {
							required: true,
							minlength: 2
						},
						email: {
							required: true,
							email: true
						},
						message: {
							required: true
						}
					},
					messages: {
						name: {
							required: "come on, you have a name don't you?",
							minlength: "your name must consist of at least 2 characters"
						},
						email: {
							required: "no email, no message"
						},
						message: {
							required: "um...yea, you have to write something to send this form.",
							minlength: "thats all? really?"
						}
					},
					submitHandler: function(form) {
						$(form).ajaxSubmit({
							type:"POST",
							data: $(form).serialize(),
							url:"process.php",
							success: function() {
								$('#contact-form :input').attr('disabled', 'disabled');
								$('#contact-form').fadeTo( "slow", 0.15, function() {
									$(this).find(':input').attr('disabled', 'disabled');
									$(this).find('label').css('cursor','default');
									$('#success').fadeIn();
								});
							},
							error: function() {
								$('#contact-form').fadeTo( "slow", 0.15, function() {
									$('#error').fadeIn();
								});
							}
						});
					}
				});
			});
		</script>
    </body>
</html>