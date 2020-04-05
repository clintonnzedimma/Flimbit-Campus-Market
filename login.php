<?php 
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
include_once ROOT.'engine/controllers/login_ctrl.php';

?>
<!DOCTYPE html>
<html id="LoginForm">
<head>
<?php $_PAGE_TITLE = "Sign In" ?>	
<?php include 'includes/meta-main.php'; ?>
</head>
<body id="LoginPage">

<style type="text/css">
html {
	background-image:url('css/img/bg_pic_header_2.jpg');
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 40%;
	height: 100%;
	overflow: hidden;		
}
body{
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: 'PT Sans', sans-serif !important;
}
a{color:#58bff6;text-decoration: none; font-family:'HelveticaNeue','Arial', sans-serif !important; font-size: 16px !important;}
a:hover{color:#aaa; }
.pull-right{float: right;}
.pull-left{float: left;}
.clear-fix{clear:both;}
div.logo{text-align: center; margin: 20px 20px 30px 20px; fill: #566375;}
.head{padding:4px 0px; }
.logo-active{fill: #44aacc !important;}
#formWrapper{
	background: rgba(0,0,0,.2); 
	width:100%; 
	height:100%; 
	position: absolute; 
	top:0; 
	left:0;
	transition:all .3s ease;}
.darken-bg{background: rgba(0,0,0,.5) !important; transition:all .3s ease; z-index: -999}

div#form{
	position: absolute;
	width:420px;
	height:320px;
	height:auto;
	background-color: #36424c;
	opacity: 0.95;
	margin:auto;
	border-radius: 5px;
	padding:20px;
	left:50%;
	top:40%;
	margin-left:-180px;
	margin-top:-200px;
}
div.form-item{position: relative; display: block; margin-bottom: 20px;}
 input{transition: all .2s ease;}
 input.form-style{
	color:#051a32;
	display: block;
	width: 90%;
	height: 44px;
	padding: 5px 5%;
	border:1px solid #ccc;
	-moz-border-radius: 27px;
	-webkit-border-radius: 27px;
	border-radius: 27px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	background-color: #fff;
	font-family:'HelveticaNeue','Arial', sans-serif;
	font-size: 105%;
	letter-spacing: .8px;
	margin-bottom: 5px;
}
div.form-item .form-style:focus{outline: none; border:1px solid #c77a12; color:#39444e; }
div.form-item p.formLabel {
	position: absolute;
	left:26px;
	top:10px;
	transition:all .4s ease;
	color:#bbb;}
.formTop{top:-22px !important; left:26px; background-color: #333d46; padding:0 5px; font-size: 14px; color:#f5f5f5 !important;}
.formStatus{color:#8a8a8a !important;}

button[type="submit"].login, button[type="button"].login{
	float:right;
	width: 112px;
	height: 37px;
	-moz-border-radius: 19px;
	-webkit-border-radius: 19px;
	border-radius: 19px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	background-color: #c77a12;
	border:1px solid #bb7311;
	border:none;
	color: #fff;
	font-weight: 500;
}
button[type="submit"].login:hover, button[type="button"].login:hover{background-color: #b16c10;  color:#fdf4ea; cursor:pointer; transition: 3s;}
button[type="submit"].login:focus, button[type="button"].login:focus{outline: none;cursor:pointer;}

.error-msg { color: #bfbf00; margin-left: 15px;  font-size: 11px; margin-top: 10px; }
.error-msg icon { font-size:  12px; margin-right: 5px;  }


 input[name=phone]::-webkit-inner-spin-button, 
 input[name=phone]::-webkit-outer-spin-button{
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    margin: 0;
}

 input[name=phone]::-moz-inner-spin-button, 
 input[name=phone]::-moz-outer-spin-button{
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    margin: 0;
}


 input[name=phone]::inner-spin-button, 
 input[name=phone]::outer-spin-button{
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    margin: 0;
}

input[placeholder] {
	font-family: "Century Gothic";
	font-size: 12px;
}

div.error-list {
	color:#ff7777; 
	font-size: 12px;
}

div.error-list ul {
	list-style: none;
}


div.success-list {
	color:#02ff77; 
	font-size: 12px;
}

/*tablet*/
@media (max-width:900px)
{
html { 
		background-position: 20%;
}
div#form{
	position:;
	width:400px;
	height:320px;
	height:auto;
	background-color: #36424c;
	opacity: 0.95;
	border-radius: 5px;
	padding:20px;
	left:10%;
	top:40%;
	margin-left:-1%;
	margin-top:-200px;
}
}

/* mobile view */
@media (max-width:600px)
{
html { 
		background-position: 20%;
}
div#form{
	position:;
	width:90%;
	height:320px;
	height:auto;
	background-color: #36424c;
	opacity: 0.95;
	border-radius: 5px;
	padding:20px;
	left:65%;
	top:40%;
	margin-left:-60%;
	margin-top:-200px;
}
}


	
</style>

<form method="POST">
	<div id="formWrapper" data-aos="fade-in" data-aos-duration="2000">
		<div id="form">
		<div class="logo">
		<h3 class="text-center head"><img src="css/img/logo.png" class="img-fluid" width="200" id="flimbit-logo"></h3>

        <?php if (isset($_POST['login']) && !empty($errors)): ?>
        <div class="error-list">
        	<?php echo $ERROR_MESSAGES ?>
        </div>	                	
        <?php endif ?>

        <?php if (isset($_POST['login']) && empty($errors)): ?>
        <div class="success-list">
        	<?php echo $SUCCESS_MESSAGES ?>
        </div>	                	
        <?php endif ?>
		</div>
				<div class="form-item">
					 <?php if (!isset($_POST['login']) && !isset($phone)):  ?>
					<!--  <p class="formLabel">Phone Number</p> -->
					 <?php endif ?>
					<input type="number" v-model="phone" @focusout="phoneNumberHasError()" value="<?php postConst('phone') ?>" name="phone" id="phone" class="form-style" placeholder="Phone Number" value="<?php postConst('phone') ?>" autocomplete="off"/>			
					<span class="error-msg" id="phone-error"> 
						<span id="phone-error-msg" v-html="errorMsg['phone']"></span>
					</span>
				</div>
				<div class="form-item">
					<!-- <p class="formLabel">Password</p> -->
					<input type="password" v-model="password" @focusout="passwordHasError()" name="password" id="password" class="form-style" placeholder="Password" />
					<span class="error-msg" id="password-error"> 
						<span id="password-error-msg" v-html="errorMsg['password']"></span>
					</span>				
					<!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
					<p style="color:#f4f5f7; font-size: 13px; margin-left: -10px">Dont have an account? Click here to <a href="signup.php" ><small>Sign up</small></a></p>	
				</div>
				<div class="form-item">
				<!-- <p class="pull-left"><a href="#"><small>Register</small></a></p> -->
				<button v-bind:type="formSubmitState" @click="formErrorExists()" @mouseover="formErrorExists()" name="login" class="login pull-right btn btn-primary btn-block submit"> Sign in </button>
				<div class="clear-fix"></div>
				</div>
		</div>	
	</div>
</form>	


<?php
echo memory_get_usage()/ 1024;
?>KB



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

var formInputs = $('input[name="phone"],input[name="password"]');
formInputs.focus(function() {
   $(this).parent().children('p.formLabel').addClass('formTop');
   /*$('div#formWrapper').addClass('darken-bg');*/
   $('div.logo').addClass('logo-active');
});
formInputs.focusout(function() {
	if ($.trim($(this).val()).length == 0){
	$(this).parent().children('p.formLabel').removeClass('formTop');
	}
	/*$('div#formWrapper').removeClass('darken-bg');*/
	$('div.logo').removeClass('logo-active');
});
$('p.formLabel').click(function(){
	 $(this).parent().children('.form-style').focus();
});
	

$("#flimbit-logo").hover(
function () {
	$(this).addClass("transition");
},
function () {
	$(this).removeClass("transition");
});

</script>




<script type="text/javascript" core="vue">
	new Vue({
		el:"form",
		data : {
			phone:"",
			password:"",
			errorMsg: {
				phone:"",
				password:""				
			},
			icon : '<icon class="fa fa-exclamation-circle"></icon>',
			formSubmitState : "submit"
		},

		methods : {
			phoneNumberHasError : function () {
				if (this.phone.trim().length !=11 && isPhoneNumber(this.phone.trim())) {
					this.errorMsg['phone'] = this.icon+"Your phone number must be 11 digits !";
					return true;
				} else if (this.phone.trim().length == 0 ||  !this.phone.trim() ){
					this.errorMsg['phone'] = this.icon+"Phone number cannot be empty !";
					return true;
				} else if(!isPhoneNumber(this.phone.trim()) && this.phone.trim().length > 0 ) {
					this.errorMsg['phone'] = this.icon+"Invalid phone number !";
					return true;
				} else {	
					this.errorMsg['phone'] = "<br>";
					return false;
				}
			},

			passwordHasError : function () {
				if (this.password.trim().length < 5) {
					this.errorMsg['password'] = this.icon+" Password too short !";
					return true;
				} else {
					this.errorMsg['password'] = "<br>";
					return false;
				}
			},
		


			formErrorExists : function() {
				validationError = [
					this.phoneNumberHasError(), 
					this.passwordHasError()
				];

				var countCheck = 0 ;
				for (var i = 0; i < validationError.length; i++) {
					if(validationError[i]) {
						countCheck ++;
						break;
					}
				}
				if (countCheck > 0) {
					/*this.formSubmitState = "button";*/
					return true;
				} else {
					/*this.formSubmitState = "submit";*/
					return false;
				}
				console.log(validationError);
			}


		},
		

	});	

</script>

</body>
</html>