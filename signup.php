<?php 
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
include_once ROOT.'engine/controllers/signup_ctrl.php';


var_dump($_SERVER['PROJECT_ROOT']);

?>

<!DOCTYPE html>
<html id="LoginForm">
<head>
<?php $_PAGE_TITLE = "Sign Up" ?>	
<?php include 'includes/meta-main.php'; ?>
</head>
<body id="LoginPage">

<style type="text/css">
body {
     background: url('css/img/bg_pic_header_2.jpg') fixed;
     background-repeat: no-repeat;
    background-size: cover;
    background-position: 40%;
    font-family: 'PT Sans', sans-serif;
}

a{color:#58bff6;text-decoration: none; font-family:'HelveticaNeue','Arial', sans-serif !important; font-size: 12px !important;}
a:hover{color:#aaa; }

section#formWrapper {
	width:100%; 
	height:100%;
	position: absolute; 	
}

.form-group {
  margin-top: -10px;
}

.darken-bg{background: rgba(0,0,0,.5) !important; transition:all .3s ease; overflow-y: scroll;}

*[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    background-color: #36424c;
    opacity: 0.95;
    color:#fff;
    margin-top: 20px;
    margin-bottom: 20px;
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}


button.submit {
	background-color: #c77a12;
	border:1px solid #bb7311;
}

button.submit:hover{ 
	background-color: #b16c10;  
	color:#fdf4ea; 
	cursor:pointer;
}

button.submit:focus{
	outline: none;
}

select[name=sex] {
	width: 200px;
}

 input[name=phone]::-webkit-inner-spin-button, 
 input[name=phone]::-webkit-outer-spin-button{
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    margin: 0;
}

.error-msg { color: #bfbf00; margin-left: 25px;  font-size: 12px;/* margin-top: 20px;  margin-bottom: 30px;*/}
.error-msg icon { font-size: 12px }
.error-msg span {font-size: 11px;}

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

.error-input {
	border:red 1px solid;
}

/*mobile*/
@media (max-width:600px)
{
	body {
	     background: url('css/img/bg_pic_header_2.jpg') fixed;
	    background-size: cover;
	    background-position: 40%;
	    font-family: 'PT Sans', sans-serif;
	}

}
</style>



<section id="formWrapper" data-aos="fade-in" data-aos-duration="2000">
	<div class="container">
	            <form class="form-horizontal" role="form" method="POST" @submit="formErrorExists">
	                <h3 class="text-center head"><img src="css/img/logo.png" class="img-fluid" width="140" id="flimbit-logo" style="margin-bottom: 20px;"></h3>

	                <?php if (isset($_POST['sign-up']) && !empty($errors)): ?>
	                <div class="error-list">
	                	<?php echo $ERROR_MESSAGES ?>
	                </div>	                	
	                <?php endif ?>

	                <?php if (isset($_POST['sign-up']) && empty($errors)): ?>
	                <div class="success-list">
	                	<?php echo $SUCCESS_MESSAGES ?>
	                </div>	                	
	                <?php endif ?>


	                <div class="form-group">
	                    <div class="col-sm-9">
	                        <input type="text" @focusout="usernameHasError()" value="<?php postConst('username') ?>" name="username" id="username" v-model="username" placeholder="Username" class="form-control" autofocus>
	                    </div>
						<span class="error-msg" id="full-name-error" v-bind:style="errorStyle['username']"> 
							<span id="usernamename-error-MSG" v-html="errorMsg['username']"></span>
						</span>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-9">
	                        <input type="text" @focusout="fullNameHasError()" value="<?php postConst('full_name') ?>" name="full_name" id="full_name" v-model="full_name" placeholder="Full Name" class="form-control" autofocus>
	                    </div>
						<span class="error-msg" id="full-name-error" v-bind:style="errorStyle['full_name']"> 
						<span id="username-error-MSG" v-html="errorMsg['full_name']"></span>
						</span>
	                </div>


	                <div class="form-group">
	                   <!--  <label for="password" class="col-sm-3 control-label">Password*</label> -->
	                    <div class="col-sm-9">
	                        <input type="password" @focusout="passwordHasError()" name="password" id="password" name="password" v-model="password" placeholder="Password" class="form-control">
	                    </div>
						<span class="error-msg" id="password-error" v-bind:style="errorStyle['password']"> 
						<span id="password-error-MSG" v-html="errorMsg['password']"></span>
						</span>	                    
	                </div>
	                <div class="form-group">
	                    <!-- <label for="password" class="col-sm-3 control-label">Confirm Password*</label> -->
	                    <div class="col-sm-9">
	                        <input type="password" @focusout="confirmPasswordHasError()" name="confirm_password" id="confirm_password" v-model="confirm_password" placeholder="Confirm Password" class="form-control">
	                    </div>
						<span class="error-msg" id="confirm-password-error"  v-bind:style="errorStyle['confirm_password']"> 
						<span id="confirm_password-error-MSG" v-html="errorMsg['confirm_password']"></span>
						</span>	                    
	                </div>

	                <div class="form-group">
	   					<div class="col-sm-9">
	   							<select name="school_id" @focusout="schoolHasError()" class="form-control" v-model="school_id">
	   								<option value="">- Choose School -</option>
									<?php foreach ($schools as $data): ?>
									<option value="<?=$data['id'] ?>" <?php selectPostConst('school_id', $data['id']) ?>> <?=$data['acronym'] ?> - (<?=$data['name'] ?>)</option>	
									<?php endforeach ?>	
	   							</select>
	   					</div>
						<span class="error-msg" id="school_id-error"  v-bind:style="errorStyle['school_id']"> 
						<span id="school_id-error-MSG" v-html="errorMsg['school_id']"></span>
						</span>	                	
	                </div>

	                <div class="form-group">
	                    <!-- <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label> -->
	                    <div class="col-sm-9">
	                        <input type="number" @focusout="phoneNumberHasError()" value="<?php postConst('phone') ?>" name="phone" id="phone" v-model="phone" placeholder="Phone number" min="0" class="form-control">

	                    </div>
						<span class="error-msg" id="phone-number-error"  v-bind:style="errorStyle['phone']"> 
						<span id="phone-error-MSG" v-html="errorMsg['phone']"></span>
						</span>	                    
	                </div>


	                <div class="form-group">
	                   <!--  <label for="email" class="col-sm-3 control-label">Email* </label> -->
	                    <div class="col-sm-9">
	                        <input type="email" @focusout="emailHasError()" v-model="email" value="<?php postConst('email') ?>" name="email" id="email" placeholder="Email" class="form-control">
	                    </div>
						<span class="error-msg" id="email-error"  v-bind:style="errorStyle['email']"> 
						<span id="email-error-MSG" v-html="errorMsg['email']"></span>
						</span>

	                </div>

	   				<div class="form-group">
	   					<div class="col-sm-9">
	   							<select name="sex" @focusout="sexHasError()" class="form-control" v-model="sex">
	   								<option value="">- Choose Sex -</option>
	   								<option value="male" <?php selectPostConst('sex', 'male') ?>>Male</option>
	   								<option value="female" <?php selectPostConst('sex', 'female') ?>>Female</option>
	   							</select>
	   					</div>
						<span class="error-msg" id="sex-error"  v-bind:style="errorStyle['sex']"> 
						<span id="sex-error-MSG" v-html="errorMsg['sex']"></span>
						</span>	   					
	   				</div>                             

	   				<p>
	   					<!--  -->
	                	<button type="submit"  name="sign-up" @click="formErrorExists()"  class="btn btn-primary btn-block submit">Sign up</button>
	            	</p>
	                <p style="color:#f4f5f7; font-size: 13px; margin-left: -10px; margin-top: 10px;">Already on flimbit? Click here to <a href="login.php" >Log In</a></p>

	            </form> <!-- /form -->
	</div> <!-- ./container -->
</section>


<section style="display: none;" id="async">
	<ajax for="usernameExists"></ajax>	
	<ajax for="email"> </ajax>
	<ajax> </ajax>
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
/* Local functions */
/*function usernameExists(param) {
	var ajaxData = {
		username: param,
		action: "check"
	}

	$.get(
	"engine/async/users_ajax.php",
	ajaxData,	
	function(data, status){
		if (parseInt(data) && status) {
			$("ajax[for=usernameExists]").html(1);
		} else {
			$("ajax[for=usernameExists]").html(null);
		}
	});

	return ($("ajax[for=usernameExists]").html() == 1) ? true : false;
}	
*/

var formInputs = $('input[type="text"], input[type="password"], input[type=number], input[type="email"], select[name=sex]');
formInputs.attr("autocomplete","off");
formInputs.attr("autofocus", false);
formInputs.focus(function() {
   $(this).parent().children('p.formLabel').addClass('formTop');
   /*$('section#formWrapper').addClass('darken-bg');*/
   $('div.logo').addClass('logo-active');
});
formInputs.focusout(function() {
	if ($.trim($(this).val()).length == 0){
	$(this).parent().children('p.formLabel').removeClass('formTop');
	}
	/*$('section#formWrapper').removeClass('darken-bg');*/
	$('div.logo').removeClass('logo-active');
});
$('p.formLabel').click(function(){
	 $(this).parent().children('.form-style').focus();
});
	

$('select[name=sex]').focus(function(){
	$("#formSexLabel").show();
});	
$('select[name=sex]').focusout(function(){
	$("#formSexLabel").hide();
});


$("#flimbit-logo").hover(
function () {
	$(this).addClass("transition");
},
function () {
	$(this).removeClass("transition");
});
/*$(".error-msg").html("");  // hide errors*/

$("input[name=phone]").focus(function() {
	/*$(this).attr("style", "border:red 1px solid");*/
});
</script>
<script type="text/javascript" core="vue">
	new Vue({
		el:'form',
		data : {
			username : "",
			full_name : "",
			password : "",
			confirm_password : "",
			school_id : "",
			phone : "",
			email : "",
			sex : "",

			errorStyle : {
				username : "",
				full_name : "",
				password : "",
				confirm_password : "",
				school_id : "",
				phone : "",
				email : "",
				sex : ""				
			},

			errorMsg : {
				username : "",
				full_name : "",
				password : "",
				confirm_password : "",
				school_id : "",
				phone : "",
				email : "",
				sex : ""				
			},
			icon :"<icon class='fa fa-exclamation-circle'></icon> ",
			formSubmitState : "button"
		},

		methods : {
			usernameHasError : function () {
				if(this.username.trim().length < 3) {
					this.errorMsg['username'] = this.icon+"Your username should not be less than 3 characters !";
					return true;
				} else if (strHasWhiteSpace(this.username.trim()) && this.username.trim().length >= 3){
					this.errorMsg['username'] = this.icon+"Username should not contain white spaces !";
					return true;
				} else if (!isSuitableForUsername(this.username.trim()) && this.username.trim().length >= 3) {
					this.errorMsg['username'] = this.icon+"Your username should contain characters A-Za-z0-9 !";
					return true;
				} else if (this.username.trim().length == 0) {
					this.errorMsg['username'] = this.icon+"Your username should not be empty !";
					return true;
				} else {
					this.errorMsg['username'] = "<br>";
					return false;
				}

			},

			fullNameHasError : function () {
				if (this.full_name.trim().length < 3) {
					this.errorMsg['full_name'] = this.icon+"Your full name should not be less than 3 characters !";
					return true;
				} else if (!hasOnlyLetters(this.full_name.trim())) {
					this.errorMsg['full_name'] = this.icon+" Your full name should contain only alphabets ! ";
					return true;
				} else {
					this.errorMsg['full_name'] = "<br>";
					return false;
				}
			},


			passwordHasError : function () {
				if (this.password.trim().length < 5) {
					this.errorMsg['password'] = this.icon+" Your password should not be less than 5 characters !";
					return true;
				} else {
					this.errorMsg['password'] = "<br>";
					return false;					
				}
			},

			confirmPasswordHasError : function(){
				if (this.confirm_password.trim() != this.password.trim() && this.confirm_password.trim().length >=5 ) {
					this.errorMsg['confirm_password'] = this.icon+"Passwords do not match !";
					return true;
				} else if (this.confirm_password.trim().length < 5) {
					this.errorMsg['confirm_password'] = this.icon+"This password should not be less than 5 characters !";
					return true;
				} else {
					this.errorMsg['confirm_password'] = "<br>";
					return false;
				}
			},

			schoolHasError : function(){
				if (this.school_id.trim() == "" || this.school_id.trim() == null) {
					this.errorMsg['school_id'] = this.icon+"Please choose your school !";
					return true;
				} else {
					this.errorMsg['school_id'] = "<br>";
					return false;
				}
			},

			phoneNumberHasError : function () {
				if (this.phone.trim().length != 11 && isPhoneNumber(this.phone.trim())) {
					this.errorMsg['phone'] = this.icon+" Phone number should be 11 digits !";
					return true;
				} else if(!isPhoneNumber(this.phone.trim())) {
					this.errorMsg['phone'] = this.icon+"Please input a valid phone number !";
					return true;
				} else {
					this.errorMsg['phone'] = "<br>";
					return false;
				}

			},


		emailHasError : function () {
				if (!isEmail(this.email.trim())) {
					this.errorMsg['email'] = this.icon+"Invalid email !";
					return true;
				} else {
					this.errorMsg['email'] = "<br>";
					return false;
				}
			},



			sexHasError : function () {
				if (this.sex.trim() == "" || this.sex.trim() == null) {
					this.errorMsg['sex'] = this.icon+"Please choose either male or female !";
					return true;
				} else {
					this.errorMsg['sex'] = "<br>";
					return false;
				}
			},
	

			
			/*event*/
			formErrorExists : function (e) {
				var validationError = [
							this.usernameHasError(), 
							this.fullNameHasError(),
							this.passwordHasError(),
							this.confirmPasswordHasError(),
							this.schoolHasError(),
							this.phoneNumberHasError(),
							this.emailHasError(),
							this.sexHasError()
						];

				countCheck = 0;		
				for (var i = 0; i < validationError.length; i++) {
					if (validationError[i]) {
						countCheck ++;
					}
				}	

				if (countCheck > 0) {
					e.preventDefault();
				} 
				console.log(e);
				console.log(validationError);
			}	
		
		},	

	});




</script>
</body>
</html>