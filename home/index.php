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
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Moraspirit | Voting</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Twitter Bootstrap css -->
        <!--<link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- jquery.fancybox  -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
        <!-- animate -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/vote.css">
        <!-- media-queries -->
        <link rel="stylesheet" href="css/media-queries.css">
        <!-- vote popup page -->

        <!--<link rel="stylesheet" href="css/vote.css">

        <!--font style-->
        <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet'>

        <!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>    

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/vote.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <script src="https://connect.facebook.net/en_US/sdk.js"></script>
        <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
        <script src="https://www.gstatic.com/firebasejs/5.4.1/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-auth.js"></script>

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

<body id="top" 
    <?php
            if ($_GET['pg']=='pg_s') {
                echo "onload='votingpg_s()'";
            }elseif ($_GET['pg']=='pg_un') {
                echo "onload='votingpg_un()'";
            }else{

            }
        ?>>


    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.php">
                <img src="images/logo.png" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

            <div class="header-nav__content">
                <h3>Navigation</h3>
                
                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                    <li><a class="smoothscroll"  href="#results" title="results">View Result</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                </ul>
    
                <p>&copy Moraspirit | 2018<br> All right reserved.</p>

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text">Menu</span>
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->
<br>
<div id='votealert'></div>
<div id='votealertx'></div>


<section id="works" class="works clearfix">
            <div class="container">
                <div class="row">
                    <div class="project-wrapper">
                        <?php

                        $voted='0';
                        $voted_id='';
                        if ($p=$pl->getUserVotedPlayer($user)) {

                            if($p['voted_player'] ==''){
                                echo '<div class="sec-title text-center">
                                        <h2>Vote For Your Player</h2>
            <!--        <div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>-->
                                      </div>';
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
                            
                            echo '
                            <h3 class="sec-sub-title" style="font-weight: 900;color:white;font-size:25px; text-align:center" >Your Voted Player</h3>

                            <!--<div class="project-wrapper">-->
                            <div class="row">
                            <div class="column" style="text-align:left; margin-top:auto;margin-bottom:auto">
                            <!--<figure class="mix work-item">-->
                            <img id="votedI" src="img/players/'.$p_image.'" alt="" style="display: block;width: 80%;height: auto;border-radius: 10%;max-width:400px;">
                            </div>
                            <div class="column" style="text-align:left; margin-top:auto;margin-bottom:auto">
                            <div class="sec-sub-title text-center" style="text-align:left; margin-top:auto;margin-bottom:auto">
                            <h1 style="color: white;margin: 0px;padding: 0px;font-size: 2.0rem;">'.$p_name.'</h1>
                            <p class="title">'.$p_uni.'</p>
                            <p class="title">'.$p_sport.'</p>
                            <p class="title2">Number of Votes: '.$p_vote.'</p>
                            </div>
                            
                        <!--</figure>-->
                        </div>
                        <hr>
                        ';}
                            
                        }else{

                            print($user);
                        }

                        ?>
                        
                        </div>
                    </div>
                </div>
            </section>



    <!-- works
    ================================================== -->
    <section id='results' class="s-works">
        <div class="intro-wrap">
                
            <div class="row section-header has-bottom-sep light-sep" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead">Inter University Sports Championship |2018</h3>
                    <h1 class="display-2 display-2--light">Vote for your favorite player</h1>
                </div>
            </div> <!-- end section-header -->
            <!--<div class="row">-->
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
                                        $dis='disabled';
                                    }else{
                                        $class='vote_button';
                                        $dis='';
                                    }
                                }else{
                                    $class='vote_button';
                                    $dis='';
                                }

                            if ($i%3==0) {
                                echo '<div class="row">';
                            }
                            echo '
                            <div class="column">
                            <form id="voteplayer" action="voteProccess.php?id='.$id.'&voted='.$voted.'&voted_id='.$voted_id.'" method="Post">
                            ';
                            echo '
                                    <div class="card" data-aos="fade-up">
                                        <img src="img/players/'.$img.'" alt="Player Image" style="width:100%">
                                        <div class="container">
                                          <h1>'.$player.'</h1>
                                          <p class="title">'.$uni.'</p>
                                          <p class="title">'.$sport.'</p>
                                          <p class="title2">'.$votes.' Votes</p>
                                          <!--<div class="vote_container" style="text-align:center;">-->

                                          <button class="'.$class.'" name="submit" type="submit" '.$dis.'>Vote</button>
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </form>
                            </div>';

                            if (($i+1)%3==0 || ($i+1)==count($players)) {
                                if (($i+1)==count($players)) {
                                    $j=count($players);
                                    while (!($j%3==0)){
                                        echo '<div class="column"></div>';
                                        $j=($j+1);
                                    }

                                }
                                echo '</div>';
                            }
    }
    ?>      
           <!--</div>-->
        </div> <!-- end intro-wrap -->
   <!--<div class="row works-content">
        </div> <!-- end works-content -->

    </section> <!-- end s-works -->

    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact">

        <div class="overlay"></div>
        

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Contact Us</h3>
                <h1 class="display-2 display-2--light">Reach out for a new project or just say hello</h1>
            </div>
        </div>

        <div class="row contact-content" data-aos="fade-up">
            
            <div class="contact-primary">

                <h3 class="h6">Send Us A Message</h3>

                <form name="contactForm" id="contactForm" method="post" action="" novalidate="novalidate">
                    <fieldset>
    
                    <div class="form-field">
                        <input name="contactName" type="text" id="contactName" placeholder="Your Name" value="" minlength="2" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactEmail" type="email" id="contactEmail" placeholder="Your Email" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="contactMessage" id="contactMessage" placeholder="Your Message" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
    
                    </fieldset>
                </form>

                <!-- contact-warning -->
                <div class="message-warning">
                    Something went wrong. Please try again.
                </div> 
            
                <!-- contact-success -->
                <div class="message-success">
                    Your message was sent, thank you!<br>
                </div>

            </div> <!-- end contact-primary -->

            <div class="contact-secondary">
                <div class="contact-info">

                    <h3 class="h6 hide-on-fullwidth">Contact Info</h3>

                    <div class="cinfo">
                        <h5>Where to Find Us</h5>
                        <p>
                            1600 Amphitheatre Parkway<br>
                            Mountain View, CA<br>
                            94043 US
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>Email Us At</h5>
                        <p>
                            contact@glintsite.com<br>
                            info@glintsite.com
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>Call Us At</h5>
                        <p>
                            Phone: (+63) 555 1212<br>
                            Mobile: (+63) 555 0100<br>
                            Fax: (+63) 555 0101
                        </p>
                    </div>

                    <ul class="contact-social">
                        <li>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        </li>
                    </ul> <!-- end contact-social -->

                </div> <!-- end contact-info -->
            </div> <!-- end contact-secondary -->

        </div> <!-- end contact-content -->

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    <footer>

        <div class="row footer-main">

            <div class="col-six tab-full left footer-desc">

                <div class="footer-logo"></div>
                We are moraspirit. afssdsjh kjasdfas jhgdfjkhasgj hkgja gjkafgjkh gjhagsfj hgjag jhgaj

            </div>

            <div class="col-six tab-full right footer-subscribe">

                <h4>Get Notified</h4>
                <p>Reach us at any location. ajdfhkja kjajf kjhaj kjhsad</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">
                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                        <input type="submit" name="subscribe" value="Subscribe">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>

            </div>

        </div> <!-- end footer-main -->

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© MoraSpirit 2018</span> 
                    <span>Site Template by <a href="https://www.colorlib.com/">Colorlib</a></span>	
                </div>

         <!--       <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
                </div>  -->
            </div>

        </div> <!-- end footer-bottom -->

    </footer> <!-- end footer -->


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div> <!-- end photoSwipe background -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale-pulse-out">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>