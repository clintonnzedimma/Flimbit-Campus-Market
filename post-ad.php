<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 
include_once ROOT.'engine/controllers/post-ad_ctrl.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php $_PAGE_TITLE = "Create AD" ?>	
	<?php include 'includes/meta-main.php'; ?>
</head>
<body>
<?php include 'includes/header.php'; ?>	

<style type="text/css">
	html {
		overflow-x: hidden;
	}

	body {
		padding: 0% !important;
	}
	.main {
		margin-top: 12%;
		text-align: left;
		width: 70%;
		margin-left:5%;	
		margin-bottom: 4%;
		box-shadow: 2px 2px 2px 2px #e5e5e5;
	}

	.head-container {
		background: #f4faff;
		color: #001833;
	}

	.form-group {
		margin-top: 20px;
		margin-bottom: 20px;
	}

	input[name=price] {
		width: 30%;
	}

	.file-control {
		cursor: pointer;
	}

	.file-control:hover {
		border: #d3d3d3 1px solid;
	}

	.file-control::-webkit-file-upload-button {
		background: #338bf2;
		color: #fff;
		border:0px;
		padding:3px;
	}	

	.unit-error-container {
		color: #ff4f5b;
		font-size: 12px;
		margin-left: 2%;
	}

	.success-modal{
		margin-top: 11%;
	}

	div.top-error {
		color: #ff091b;
		font-size: 14px;
	}

	textarea[name=description] {
		max-height: 120px !important;
	}

	input[name=price] {
		font-weight: 700;
	}

	.field-error {
	  background-color: #fff;
	  border-color: #ff848d;	
	}

	.field-error:focus {
	  background-color: #fff;
	  border-color: #ff091b;
	  box-shadow: 0 0 0 0.2rem rgba(255, 9, 27, 0.25);	
	}

	.modal-body p.tick-icon{
		font-size: 70px; color:#6ace2f
	}
	.modal-body p.block-one{
		font-size: 17px; 
		color:#666859; 
		font-family:-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";		
	}

	.modal-body p.block-two {
		font-size: 12px;
	}

	.icon {
		margin-right: 3px;
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



/*tablet*/
@media (max-width:900px)
{
.main {
	width: 100%;
	margin-top: 14%;
	margin-left:0%;	
}


}


/*mobile*/
@media (max-width:600px)
{

.main { 
    width: 95%;
    margin-left: auto;
    margin-top: 25%;
    margin-right: auto;

}

input[name=price] {
	width: 60%;
}

.success-modal{
	margin-left: auto;
	margin-top: 23%;
}
}	

</style>





<section class="main" id="main">
	<!-- Material form contact -->
	<div class="card">
	    <h5 class="card-header info-color white-text text-center py-4 head-container">
	        <strong>CREATE AD</strong>
	    </h5>
	    <div align="center">
              <?php if (!empty($errors) && isset($_POST['post-ad'])): ?>
               <div class=" col-sm-10 alert alert-danger alert-dismissible error-list  fade show" role="alert" style="width: 100%; margin-top: 10px; font-size: ">
                <?php echo $ERROR_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>


              <?php if (empty($errors) && isset($_POST['post-ad'])): ?>
               <div class=" col-sm-10 alert alert-success alert-dismissible error-list  fade show" role="alert" style="width: 85%; margin-top: 10px; font-size: ">
                <?php echo $SUCCESS_MESSAGES ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>               
              <?php endif ?>
		</div>

	    <div class="top-error" align="center">
	    	<!-- PHP ERRORS HERE  -->
	    </div>

	    <!--Card content-->
	    <div class="card-body px-lg-5 pt-0">

	        <!-- Form -->
	        <form method="POST" class="text-left" style="color: #757575;" @submit="formErrorExists" enctype="multipart/form-data">
	        	
	            <!-- Subject -->
	            <div class="form-group">
		            <label>Category</label>
		            <select class="mdb-select form-control" @focusout="categoryHasError()" name="category" v-model="category">
		                <option value="">- Choose option -</option>
		                <?php foreach ($categories as $key => $value): ?>
		                <option  value="<?=$value?>"><?=ucwords($key)?></option>	
		                <?php endforeach ?>
		            </select>
		            <div class="unit-error-container" id="category-error">
		            	<span class="message" v-html="errorMsg['category']"> <!-- Category Error --> </span>
		            </div>
	       		 </div>


	            <!--Title -->
	            <div class="md-form mt-3 form-group">
	            	 <label for="materialContactFormName">Title</label>
	                <input type="text" id="materialContactFormName" @focusout="titleHasError()" name="title" v-model="title" class="form-control">
		            <div class="unit-error-container" id="title-error">
		            	<span class="message" v-html="errorMsg['title']"> <!-- Title Error --> </span>
		            </div>	                
	            </div>


	            <!--Description-->
	            <div class="md-form form-group">
	            	 <label for="materialContactFormMessage">Description</label>
	                <textarea type="text" id="materialContactFormMessage" @focusout="descriptionHasError()" class="form-control md-textarea" rows="3" name="description"  v-model="description"></textarea>
		            <div class="unit-error-container" id="description-error">
		            	
		            	<span class="message" v-html="errorMsg['description']"> <!-- Description Error --> </span>
		            </div>	                
	            </div>




	            <!--School-->
	            <div class="md-form mt-3 form-group">
	            	 <label for="materialContactFormName">School</label>
	                <input type="text" id="materialContactFormName"  value="<?= $u->school->get('acronym') ?> - <?= $u->school->get('name')  ?>"  class="form-control" disabled="disabled">
		            <div class="unit-error-container" id="title-error">
		            	
		            </div>	                
	            </div>


	            <!-- Price -->
	            <div class="md-form mt-3 form-group">
	            	<label>Price (<b>&#8358</b>) </label>

	            	<input type="number" id="materialContactFormName" @focusout="priceHasError()" name="price" v-model="price"  min="0"  class="form-control">
	                <input type="checkbox" class="" id="materialContactFormCopy" name="negotiable" v-model="negotiable">
	                <label class="form-check-label" for="materialContactFormCopy">Negotiable</label>
		            <div class="unit-error-container" id="price-error">
		            	<span class="message" v-html="errorMsg['price']"> <!-- Price Error  --></span>
		            </div>	                
	            </div>
           

				<!--Photo  -->
	       		 <div class="form-group" align="center">
	       		 	<p>
	       		 		<img class="rounded-circle" src="css/img/null.png" width="160" height="150" style="opacity: 0.5; transition: 3s" id="preview_img" > 
	       		 	</p>
						

	       		 	<label>Photo</label>
	       		 	<br>
	       		 	<input type="file" accept="image/*" onchange="" name="placement_img"  class="file-control">
		            <div class="unit-error-container" id="photo-error">
		            	
		            	<span class="message"> <!-- Photo Error --> </span>
		            </div>	       		 	
	       		 </div>	
	            <!-- Send button -->
	            <p>
	            	<button type="submit" name="post-ad"  class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"  v-html="buttonContent"> 
	            	POST AD</button>
	       		</p>
<!-- 
	       		<p>
	       			<i class="fa fa-spinner"></i>
	       		</p> -->

	       		<p style="color:#8c8c8c; font-size: 13px" align="center"> By Publishing an ad, you agree and accept Flimbit's <a href="#">Terms of Service</a> </p>

	        </form>
	        <!-- Form -->
	    </div>

	</div>
	<!-- Material form contact -->	
</section>

<!-- Modal -->
<div class="modal fade success-modal" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: 0px !important">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        	<p class="fa fa-check tick-icon"></p>
        	<p class="block-one"> Your ad was posted succesfully</p>
        	<p class="block-two"> <a href="profile.php?u=<?=$u->get('username') ?>">Continue</a></p>
      </div>
      <div class="modal-footer" style="border: 0px !important">
 
      </div>
    </div>
  </div>
</div>



<?php include 'includes/footer.php'; ?>

<script type="text/javascript" core="jquery/vanilla">
	$(".unit-error-container").attr("style", "display:block");
	/*$("input[name=price]").addClass("field-error");*/

<?php if (empty($errors) && isset($_POST['post-ad'])): ?>

	$("#successModal").modal("show");
	$(".modal-body").attr("data-aos","fade-in");
	$(".modal-body").attr("data-aos-duration","3000");
	
 <?php endif ?>

	
</script>

<script type="text/javascript" core="vue">
	new Vue({
		el : "form",
		data : {
			category:"<?php if (isset($category)) {echo $category;} ?>",
			title: "<?php if(isset($title)){echo $title;} ?>",
			description:"<?php if(isset($description)){echo $description;} ?>",
			price:"<?php if(isset($price)){echo $price;} ?>",	
			negotiable:"<?php if(isset($negotiable)){echo $negotiable;} ?>",
			errorMsg: {
				category:"",
				title: "",
				description:"",
				price:"",
				negotiable:""				
			},
			icon : '<i class="icon fa fa-exclamation-triangle"></i>',
			buttonContent:"POST AD",
			spinIcon : '<i class="fa fa-spinner spin-icon" style="font-size:23px"></i>'		
		},

		methods : {
			categoryHasError : function () {
				if (!this.category.trim()) {
					$("select[name=category]").addClass("field-error");
					this.errorMsg['category'] = this.icon+"Please choose a category !";
					return true;
				} else {
					$("select[name=category]").removeClass("field-error");
					this.errorMsg['category'] = "";
					return false;
				}
			},

			titleHasError : function () {
				if (this.title.trim().length < 5) {
					$("input[name=title]").addClass("field-error");
					this.errorMsg['title'] = this.icon+"Your title should not be less than 5 characters !";
					return true;
				} else if (this.title.trim().length > 50) {
					$("input[name=title]").addClass("field-error");
					this.errorMsg['title'] = this.icon+"Your title should not be more than 50 characters !";
					return true;					
				} else {
					$("input[name=title]").removeClass("field-error");
					this.errorMsg['title'] = "";
					return false;
				}

			},

			descriptionHasError : function () {
				if (this.description.trim().length < 10 && this.description.trim().length > 0 ) {
					$("textarea[name=description]").addClass("field-error");
					this.errorMsg['description'] = this.icon+"Your description should not be less than 10 characters. Kindly make it more detailed !";
					return true;
				} else if (this.description.trim().length == 0) {
					$("textarea[name=description]").addClass("field-error");
					this.errorMsg['description'] = this.icon+"Your description should not be empty!";
					return true;
				} else if (this.description.trim().length > 160) {
					$("textarea[name=description]").addClass("field-error");
					this.errorMsg['description'] = this.icon+"Your description is too lengthy. It should not exceed 160 characters!";
					return true;
				} else {
					$("textarea[name=description]").removeClass("field-error");
					this.errorMsg['description'] = "";
					return false;
				}

			},

			priceHasError : function () {
				if (!parseInt(this.price)) {
					$("input[name=price]").addClass("field-error");
					this.errorMsg['price'] = this.icon+"Invalid value for price !";
					return true;
				} else if (this.price < 10 && parseInt(this.price) ) {
					$("input[name=price]").addClass("field-error");
					this.errorMsg['price'] = this.icon+"Your price should not be less than &#8358; 10 !";
					return true;
				} else if (this.price>10000000 && parseInt(this.price) ) {
					$("input[name=price]").addClass("field-error");
					this.errorMsg['price'] = this.icon+"Maximum value allowed is &#8358; 10,000,000 !";
					return true;	
				} else {
					$("input[name=price]").removeClass("field-error");
					this.errorMsg['price'] = "";
					return false;
				}
			},

		
			formErrorExists : function (e) {
				var validationError = [
					this.categoryHasError() , this.titleHasError() , this.descriptionHasError() , this.priceHasError()
				];

				validationCheck = 0;
				for (var i = 0; i < validationError.length; i++) {
					if (validationError[i]) {
						validationCheck++;
					}
				}

				if (validationCheck > 0) {
					this.buttonContent = "POST AD";
					console.log(e);
					e.preventDefault();
					return true;
				} else {
					this.buttonContent = this.spinIcon;
					return false;
				}

			}

		},	
			
	});

$("input[name=placement_img]").change(function(e){
	var img = this.files[0];
	if (e) {
		$("#preview_img").attr("style", "opacity:0.9");

		//
		img.convertToBase64(function (b64) {
			console.log(b64);
		});

	}
});


$("#preview_img").previewImageFrom("input[name=placement_img]");
</script>
</body>
</html>