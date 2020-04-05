<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 
User_Factory::protectPage();

?>
<!DOCTYPE html>
<html>
<head>
<?php $_PAGE_TITLE = "Welcome ". $u->get('username') ?>	
<?php include 'includes/meta-main.php'; ?>
</head>
<body id="WelcomePage">

<style type="text/css">

html {
	background-image:url('css/img/bg4.png');
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 40%;
	height: 100%;
	overflow: hidden;	

}	

body{
	background-color: transparent !important;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family:'HelveticaNeue','Arial', sans-serif;
  color: #fff  ;
}


.welcome-box {
	background: none;
	margin-top: 10%; 
	font-family:  "Century Gothic";
	color: #eceef4;
	text-transform: unset;
}


.welcome-box h2 {
}
span.h:nth-child(1) {
	font-size: 22px;
}
span.h:nth-child(2) {
	font-size: 40px;
}

h3.logo {
	opacity: 0.8;
}

div.continue {
	margin-top: 30px;
}

div.continue button {
	color: #eceef4;
	padding: 10px;
	background: #d18318;
	border :none;
	border-radius: 30px 30px 30px 30px;
	width: 200px;
	font-family:  "Lucida Sans Unicode";
	transition: 1s;
}

div.continue button:hover {
	background: #8e5911;
	cursor: pointer;	
} 

div.continue button:focus {
	outline: none;
} 



.spin-icon {
	display: inline-block !important; 
	animation:spin 1.0s infinite linear;
}

@keyframes spin{
	0% {
		transform: rotate(0deg);
		-webkit-transform: rotate(0deg);
	}
	100%{
		transform: rotate(360deg);
		-webkit-transform: rotate(360deg);
	}
}

@media (max-width:600px)
{

.welcome-box { 
	margin-top: 40%;
}

}
</style>

<section>
	<div class="container welcome-box" align="center">
		<h3 class="logo" data-aos="slide-left" data-aos-duration="1000"><img src="css/img/logo.png" class="img-fluid" width="200" id="flimbit-logo"></h3>
		<br>
		<span data-aos="fade-in" data-aos-duration="2200" class="h" style="font-size: 22px;">Welcome</span>
		<span data-aos="fade-in" data-aos-duration="3000" class="h" style="font-size: 23px;"> <?= ucwords($u->get('full_name')) ?> </span>
	</div>
</section>

<section id="area">
	<div class="continue" align="center" data-aos="fade-right" data-aos-duration="3000">
		<button  @click="goTo('home.php')" v-html="buttonContent">continue</button>
	</div>
</section>


	<script src="js/jquery/jquery-3.2.1.min.js"></script> <!-- JQUERY 3.2.1 -->
	<script src="js/jquery/jquery.fancybox.min.js"></script> 
	<script src="js/vuejs/vue.min.js"></script>
	<script src="js/animate/aos.js"></script> <!-- AOS JAVASCRIPT FILE--> 
	<script src="js/bootstrap/bootstrap.js"></script>
	<script src="js/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="js/main-lib.js"></script> 
	<script type="text/javascript">
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>

    <script type="text/javascript" core="jquery/vanilla">
  		console.log("Welcome <?=$u->get('full_name') ?>");
    </script>

    <script type="text/javascript" core="vue">
    	new Vue({
    		el:'#area',
    		data : {
    			buttonContent: "continue",
    			spinIcon : '<i class="fa fa-spinner spin-icon" style="font-size:23px"></i>'
    		},
    		methods : {
    			goTo : function (href) {
    				this.buttonContent = this.spinIcon;
    				window.location = href;
    			}

    		}
    	});
    </script>


</body>
</html>	