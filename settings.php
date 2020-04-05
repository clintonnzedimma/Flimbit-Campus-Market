<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
include_once ROOT.'engine/controllers/settings_ctrl.php';
?>
<!DOCTYPE html>
<html>
<head>
  <?php $_PAGE_TITLE = "Settings" ?> 
  <?php include 'includes/meta-main.php'; ?>
</head>
<body>
<?php include 'includes/header.php'; ?>

<style type="text/css">
  body {
    overflow-x: hidden;
  }

  section.settings {
    background: #fff;
    box-shadow: 2px 2px 2px #e4e4e4;
    width: 95%;
    margin: auto;
    margin-bottom: 6%;
    padding-bottom: 100px;
    padding-top: 25px;
    border-radius: 2px;
    margin-top: 10%;
  }

  .fa {
    margin-right: 3px;
  }


  section.settings .nav {
    /*margin: auto*/
  }

  .unit-error-container {
    color: #ff4f5b;
    font-size: 12px;
    margin-left: 2%;
  } 

label.file-upload{position:relative;overflow:hidden}
label.file-upload input[type=file]{position:absolute;top:0;right:0;min-width:100%;min-height:100%;font-size:100px;text-align:right;filter:alpha(opacity=0);opacity:0;outline:0;background:#fff;cursor:inherit;display:block}

.upload-input {
  background: #63c32c !important;
  border: 1px solid #5bb127 !important;
}


  #dp-tab-header {
    margin-right: 17%;
  }


div.error-list ul {
  list-style: none !important;
}


div.success-list {
  color:#02ff77; 
  font-size: 12px;
} 

/*mobile*/
@media (max-width:600px)
{
  section.settings {
    margin-top: 20%;

  }

  #dp-tab-header {
    margin-right: 0%;
  }


} 
</style>


<!-- <div class="container" style="margin-top: 30%;">
  <div class="row">
    <h2>Create your snippet's HTML, CSS and Javascript in the editor tabs</h2>
  </div>
</div> -->

<!-- <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
          </div>
</nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
           Some Home content
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            Some profile content
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            Some content content
          </div>
          <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
           Some about content
          </div>
        </div>
 -->

<section class="row settings"> 

  <div class="nav flex-column nav-pills col-md-3 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <!-- Profile Tab link -->
    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true"> <i class="fa fa-user"> </i> Profile</a>

    <!-- Profile Picture Tab link  -->
    <a class="nav-link" id="v-pills-dp-tab" data-toggle="pill" href="#v-pills-dp" role="tab" aria-controls="v-pills-dp" aria-selected="false"> <i class="fa fa-file-image-o"> </i> Change Picture</a>

    <!-- Security tab link  -->
    <a class="nav-link" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false"> <i class="fa fa-key"> </i> Security</a>
  </div>


    <div class="tab-content col-md-8" id="v-pills-tabContent">

      <!-- Profile Content-->
      <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        
        <content>          
          <form method="POST" id="profile">
            <h3 class="tab-header" id="profile-tab-header" align="center">Edit Profile</h3>
            <p class="row">

              <?php if (!empty($errors) && isset($_POST['edit-profile'])): ?>
               <div class=" col-sm-10 alert alert-danger alert-dismissible error-list  fade show" role="alert" style="width: 100%; ">
                <?php echo $ERROR_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>


              <?php if (empty($errors) && isset($_POST['edit-profile'])): ?>
               <div class=" col-sm-10 alert alert-success alert-dismissible error-list  fade show" role="alert" style="width: 100%; ">
                <?php echo $SUCCESS_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>


            </p>            

            <!-- <p>{{full_name}}</p> -->
            <div class="form-group row">  
            <br>           
              <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
              <div class="col-sm-10">
                <input type="text" name="full_name" @focusout="fullNameHasError()" v-model="full_name" class="form-control" id="fullName" placeholder="e.g Jane Doe" value="<?= $u->get('full_name') ?>">
              <!-- error -->
              <div class="unit-error-container" id="fullName-error">
                <span class="message"v-html="errorMsg['full_name']"> <br> <br> </span>
              </div>                
              </div>
            </div>


            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" v-model="email" @focusout="emailHasError()" class="form-control" id="email" placeholder="e.g jane@abc.com" value="<?=$u->get('email') ?>">
              <!-- error -->
              <div class="unit-error-container" id="email-error">
                <span class="message"v-html="errorMsg['email']"> <br>  </span>
              </div>               
              </div>              
            </div>            

            <div class="form-group row">
              <label for="school" class="col-sm-2 col-form-label">Sex</label>
              <div class="col-sm-10">
                <select class="form-control" name="sex" id="sex" @focusout="formErrorExists()">
                  <option value="male" <?php selectPostConstCMP('male', $u->get('sex')) ?>>Male</option>
                  <option value="female" <?php selectPostConstCMP('female', $u->get('sex')) ?>>Female</option>
                </select>
              <!-- error -->
              <div class="unit-error-container" id="sex-error">
                <span class="message"v-html="errorMsg['sex']"> <br> </span>
              </div>                 
              </div>
            </div>            
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" name='edit-profile' class="btn btn-primary">Save changes</button>
              </div>
            </div>            
          </form>            
        </content>

      </div>


    <!-- Profile Picture Content  -->
    <div class="tab-pane fade" id="v-pills-dp" role="tabpanel" aria-labelledby="v-pills-dp-tab">
      <h3 class="tab-header" align="center" id="dp-tab-header">Change Picture</h3>
            <p class="row">

              <?php if (!empty($errors) && isset($_POST['upload-image'])): ?>
               <div class=" col-sm-10 alert alert-danger alert-dismissible error-list  fade show" role="alert" style="width: 100%; ">
                <?php echo $ERROR_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>


              <?php if (empty($errors) && isset($_POST['upload-image'])): ?>
               <div class=" col-sm-10 alert alert-success alert-dismissible error-list  fade show" role="alert" style="width: 100%; ">
                <?php echo $SUCCESS_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>


            </p>       
      <content align="center">
          <form method="POST" action="settings.php#v-pills-dp" id="#dp" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <p>
                      <?php if (!$u->hasDP()): ?>
                        <img class="rounded-circle"  id="preview_img" src="css/img/no_profile_pic.png" width="160" height="150" style="opacity: 0.9">                        
                      <?php endif ?>

                      <?php if ($u->hasDP()): ?>
                        <img class="rounded-circle"  id="preview_img" src="avatars/<?=$u->get('profile_pic')?>" width="160" height="150" style="opacity: 0.9">           <?php endif ?>                      
                    </p>
                    <label class="file-upload btn btn-primary upload-input">
                        Drag Image here <input type="file" accept="image/*" name="profilePicInput" id="profilePicInput"/>
                    </label>
                    <p>
                      <button name="upload-image" type="submit" class="btn btn-primary"> <i class="upload-btn-icon fa fa-upload"></i> Save changes</button>
                    </p>
                </div>                 
            </div>
          </form>
      </content>
    </div>


    <!-- Security Tab Content  -->
    <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
     <content>
      <h3 class="tab-header" id="security-tab-header" align="center">Change Password</h3>
       <p class="row">
              <?php if (!empty($errors) && isset($_POST['edit-password'])): ?>
               <div class=" col-sm-10 alert alert-danger alert-dismissible error-list  fade show" role="alert" style="width: 100%; ">
                <?php echo $ERROR_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>


              <?php if (empty($errors) && isset($_POST['edit-password'])): ?>
               <div class=" col-sm-10 alert alert-success alert-dismissible error-list  fade show" role="alert" style="width: 100%; ">
                <?php echo $SUCCESS_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>
        </p>       
      <form method="POST" action="settings.php#v-pills-security" id="security">
          <div class="form-group row">
            <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
              <input type="password" name="old_password" @focusout="oldPasswordHasError()" v-model="old_password" class="form-control" id="oldPassword" placeholder="">
            <!-- error -->
            <div class="unit-error-container" id="oldPassword-error">
              <span class="message" v-html="errorMsg['old_password']"> <!-- Old Password Error --> </span>
            </div>                 
            </div>             
          </div> 

          <div class="form-group row">
            <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
              <input type="password" name="new_password" @focusout="newPasswordHasError()" v-model="new_password"  class="form-control" id="newPassword" placeholder="">
            <!-- error -->
            <div class="unit-error-container" id="newPassword-error">
              <span class="message" v-html="errorMsg['new_password']"> <!-- New Password Error --> </span>
            </div>                 
            </div>             
          </div> 

          <div class="form-group row">
            <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" @focusout="confirmPasswordHasError()" name="confirm_password" v-model="confirm_password" id="confirmPassword" placeholder="">
            <!-- error -->
            <div class="unit-error-container" id="confirmPassword-error">
              
              <span class="message" v-html="errorMsg['confirm_password']"> <!-- Confirm Password Error --> </span>
            </div>                 
            </div>             
          </div> 
          <p>
            <button type="submit" name='edit-password' class="btn btn-primary"> Save changes </button>
          </p>
      </form>
       
     </content>
    </div>
  </div>

</section>

<?php include 'includes/footer.php'; ?>
<script type="text/javascript" core="jquery/vanilla">
$("input").attr("autocomplete", "off");
$(function(){
    /*Open tab by hash link*/
   if (window.location.hash){
      var hash = window.location.hash.substring(1);
      if (hash){
         $('#'+hash+'-tab').tab('show');
      }
   }

   $('.file-upload').file_upload();
   $("#preview_img").previewImageFrom("#profilePicInput");


  $("input[name=profilePicInput]").on("change", function (e) {
    console.log($(this).val());

  }); 


}); 


</script>

<script type="text/javascript" core="vue">
  new Vue({
    el: 'form#profile',
    data: {
      full_name:"<?=$u->get('full_name')?>",
      email:"<?=$u->get('email')?>",
      sex:"<?=$u->get('sex')?>",
      errorMsg : {
        full_name:"",
        email:"",
        sex:""                
      },
      icon: '<i class="icon fa fa-exclamation-triangle"></i>'
    },

    methods : {

      fullNameHasError : function () {
        if (this.full_name.trim().length < 3) {
          this.errorMsg['full_name'] = this.icon+"Your full name should not be less than 3 characters !";
          return true;
        } else if (!hasOnlyLetters(this.full_name.trim())) {
          this.errorMsg['full_name'] = this.icon+" Your full name should contain only alphabets ! ";
          return true;
        } else {
          this.errorMsg['full_name'] = "";
          return false;
        }
      },

    emailHasError : function () {
        if (!isEmail(this.email.trim())) {
          this.errorMsg['email'] = this.icon+"Invalid email !";
          return true;
        } else {
          this.errorMsg['email'] = "";
          return false;
        }
      }          

    },


    computed : {
      formErrorExists : function () {
        if (this.fullNameHasError() && this.emailHasError()) {
          return true;
        } else {
          return false;
        }
      }
    }
  });


  new Vue ({
    el: '#security',
    data: {
      old_password : "",
      new_password : "",
      confirm_password : "",
      errorMsg : {
        old_password : "",
        new_password : "",
        confirm_password : ""
      },
      icon: '<i class="icon fa fa-exclamation-triangle"></i>'

    },

    methods : {
      oldPasswordHasError :  function () {
        if (this.old_password.trim().length < 5) {
          this.errorMsg['old_password'] = this.icon+" Invalid Password !";
          return true;
        } else {
          this.errorMsg['old_password'] = "<br>";
          return false;
        }
      },

      newPasswordHasError :  function () {
        if (this.new_password.trim().length < 5) {
          this.errorMsg['new_password'] = this.icon+"Your new password should be at least 5 characters !";
          return true;
        } else {
          this.errorMsg['new_password'] = "<br>";
          return false;
        }
      },

       confirmPasswordHasError :  function () {
        if (this.confirm_password.trim().length < 5) {
          this.errorMsg['confirm_password'] = this.icon+"Invalid Password!";
          return true;
        } else if (this.new_password.trim() != this.confirm_password.trim()) {
          this.errorMsg['confirm_password'] = this.icon+"Passwords do not match !";
          return true;
        } else {
          this.errorMsg['confirm_password'] = "<br>";
          return false;
        }
      }     
    
    },

    computed : {
      formErrorExists : function () {
        if (this.oldPasswordHasError() || this.newPasswordHasError() || this.confirmPasswordHasError()) {
            return true;
        }else {
          return false;
        }
      }
    }    

    

  });
</script>

</body>