
<footer class="main-footer" id="footer">
	<div class="container">
		<div class="row">
			 <div class="col-lg-3 col-md-4 col-xs-6">

			 	<ul>
			 		<?php if (!User_Factory::isLoggedIn()): ?>
			 		<li> <a href="login.php">Login</a> </li>
			 		<li> <a href="#">Sign up</a> </li>
			 		<?php endif ?>
			 		<li> <a href="privacy-policy">Privacy Policy</a> </li>
			 		<li> <a href="rules">Terms of Use</a> </li>	
			 		<li> <a href="#">Request New School</a></li>	 		
			 	</ul>
			 </div>	
			 <div class="col-lg-3 col-md-4 col-xs-6">
			 	<ul>
			 		<li> <a href="#">Bug Report</a> </li>
			 		<li> <a href="#">Join Us</a> </li>
			 		<li> <a href="#">Contact Us</a> </li>
			 	</ul>
			 </div>	
			 <div class="col-lg-3 col-md-4 col-xs-6 logo">
			 	<img src="css/img/flimbit-white-logo.png" style="">
			 </div>	
			 
          <p id="bottom">
            <span></span>
          </p>		 
		</div>
	</div>

</footer>	


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