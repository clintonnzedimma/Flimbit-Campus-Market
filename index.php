<?php 
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 
include ROOT."engine/controllers/index_ctrl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $_PAGE_TITLE = "Welcome to Flimbit - The Online Campus Market Place"; ?>	
<?php include 'includes/meta-main.php'; ?>

	<meta name="description" content="<?=$DESCRIPTION?>"/>
	<meta name="keywords" content="<?=$KEYWORDS?>"/>
	<meta property="article:publisher" content="https://www.facebook.com/clinton.nzedimma" />
	<link rel="image_src" href="css/img/promo-banner1.png"/> 
	<meta property="og:image" content="css/img/promo-banner1.png"/>
	<meta propery="og:property" content="Flimbit Campus Market Nigeria" />
	<meta name="author" content="Clinton Nzedimma"/>
	<meta name="developers" content="Novacom Webs Nigeria"/>
	<meta name="developers_link" content="http://www.novacomng.com/"/>

</head>
<body>
<?php include 'includes/header.php'; ?>
<style type="text/css">
	.spin-icon {
		display: inline-block !important; 
		animation:spin 1.0s infinite linear;
	}

	@keyframes spin{
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		100%{
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}	
</style>
<div class="banner">
	<div class="container">
	<div class="banner-text">
	<div class="banner-heading"></div>
	<div class="banner-sub-heading"></div>
<!-- 	<button type="button" class="btn btn-warning text-dark btn-banner">Get started</button> -->
	</div>
	</div>


	<form action="search.php" method="GET" data-aos="fade-in" data-aos-duration="2500" id="search" @submit="checkForm">
		<div class="container search-container">
			<div class="row">
			    <div class="col-12"><h2 class="welcome-text">Welcome to Flimbit - The Online Campus Market Place</h2></div>
			    <div class="col-12">
		    	    <div id="custom-search-input">
		                <div class="input-group">
		                    <input type="text" name="q" v-model='q'autocomplete="off" class="search-query form-control" placeholder="Search" />
		                    <span class="input-group-btn">
		                        <button type="submit" name="action" value="log" v-html="buttonContent">
		                            <span class="fa fa-search" style="color: #f0ad4e; font-size:26px;"></span>
		                        </button>
		                    </span>
		                </div>
		            </div>
		        </div>
			</div>
		</div>
	</form>

</div>

<!--  --> <!-- Placements end heres -->


<div class="container page-top index-placement-holder" align="center">
	<div class="row">
<?php if ($ads): ?>

<?php foreach ($ads as $ad): ?>		
            <div class="col-lg-3 col-md-4 col-xs-6 thumb index-placement" data-aos="fade-up">
                <a href="placement-img/<?= $ad['main_img'] ?>" class="fancybox" rel="ligthbox" title="<?=$ad['title'] ?> | <?=School_Factory::getById("acronym",$ad['school_id'])?>" >
                    <img  src="placement-img/<?= $ad['main_img'] ?>" class="zoom img-fluid"  alt="<?=$ad['title']?> - <?=School_Factory::getById("acronym",$ad['school_id'])?> - <?=School_Factory::getById("keywords",$ad['school_id'])?> - <?=School_Factory::getById("keyphrases",$ad['school_id'])?>- <?=School_Factory::getById("hashtags",$ad['school_id'])?>  - <?=School_Factory::getById("name",$ad['school_id'])?> - <?=School_Factory::getById("state",$ad['school_id'])?> State - Buy and Sell on Campus - Flimbit Classified Ads">
                </a>  
                 <br>
                 <div style="">
	                <span class="name"> 
	                	<a href="ad.php?id=<?=$ad['id']?>"> <?=substr($ad['title'], 0, 23) ?><?php if (strlen($ad['title'])>23): ?>...<?php endif ?></a> </span>
	                <br>
	                <span class="price">&#8358 <?=number_format($ad['price']) ?></span> 
	                <br>
	                <span class="school" style="color:#959595; font-size: 12px;"><?=School_Factory::getById("acronym",$ad['school_id'])?> </span>
	             </div>                                       
            </div>

 <?php endforeach ?>	
<?php endif ?>           
	</div>
</div>




<?php if ($ads): ?>
<div class="index-placement-pagination" align="center">	
<?php if ($page_num > 1): ?>
	<a href='index.php?p=<?=$page_num-1?>#'> &#9001; </a>
<?php endif ?>	
	<?php for ($i = 1; $i<count($page_links); $i++): ?>
		<?=$page_links[$i] ?>			
	<?php endfor?>

<?php if ($num_of_pages >$page_num): ?>
<a href='index.php?p=<?=$page_num+1?>#'> &#9002; </a>
<?php endif ?>	
</div>	
 <!--Pagination end here  -->
<?php endif ?> 


<section class="categories">
  <div class="container index-categories" data-aos="fade-in" align="center">
    <h2 style="color:#5b5e51">CATEGORIES</h2>
    <div class="row">
      <div class="col-lg-2 col-md-3 col-xs-4 item">
        <a href="category.php?k=electronics&p=1#"><span class="fa fa-laptop icon" style="color: #ff2d2d;"></span> <br> Electronics</a>
      </div>  
      <div class="col-lg-2 col-md-3 col-xs-4 item">
        <a href="category.php?k=fashion&p=1#"><span class="fa fa-star icon" style="color: #324356"></span> <br> Fashion</a>
      </div>  
      <div class="col-lg-2 col-md-3 col-xs-4 item">
        <a href="category.php?k=services&p=1#"><span class="fa fa-tasks icon" style="color: #e4943a"></span> <br> Services</a>
      </div>
      <div class="col-lg-2 col-md-3 col-xs-4 item">
        <a href="category.php?k=phones&p=1#"><span class="fa fa-mobile icon" style="color: #edd91f"></span> <br> Phones</a>
      </div>
      <div class="col-lg-2 col-md-3 col-xs-4 item">
        <a href="category.php?k=food&p=1#"><span class="fa fa-cutlery icon" style="color: #12cfde"></span> <br> Food</a>
      </div>    
      <div class="col-lg-2 col-md-3 col-xs-4 item">
        <a href="category.php?k=books-school-items&p=1#"><span class="fa fa-book icon" style="color: #328af1"></span> <br> Books & School Items</a>
      </div>  
      <div class="col-lg-2 col-md-3 col-xs-4 item">
        <a href="category.php?k=sport-hobbies-art&p=1#"><span class="fa fa-soccer-ball-o icon" style="color: #decb12"></span> <br> Sport, Hobbies & Art</a>
      </div>                      
    </div>  
  </div> <!--Categories End here  -->  
</section>



<?php include 'includes/footer.php'; ?>

<script type="text/javascript" core="jquery/vanilla">
$(document).on("scroll", function(){
	if($(document).scrollTop() > 86){
	  $("#banner").addClass("shrink");
	}
	else
	{
		$("#banner").removeClass("shrink");
	}
});

$(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none",
        helpers : {
        	overlay : {
        		css: {
        			'background' : 'rgba(8, 8, 8, 0.5)'
        		},	
        	}
        }
    });
    
$(".zoom").hover(function(){		
		$(this).addClass('transition');
	}, 
function(){
		$(this).removeClass('transition');
	});
});


$(".index-categories span.icon").hover(function() {
	$(this).addClass('icon-transition');
}, 
function(){
		$(this).removeClass('icon-transition');
});


$(".index-categories a").hover(function() {
	$(this).addClass('transition');
}, 
function(){
		$(this).removeClass('transition');
});



</script>


<script type="text/javascript" core="vue">
	new Vue({
		el:'form#search',
		data : {
			q : "",
			buttonContent: '<span class="fa fa-search" style="color: #f0ad4e; font-size:26px;"></span>',
			spinIcon : '<span class="fa fa-spinner spin-icon" style="color: #f0ad4e; font-size:26px;"></span>'
		},
		methods : {
			checkForm : function (e) {
				if (!this.q.trim() || this.q.trim().length == 0) {
					e.preventDefault();
				} else {
					this.buttonContent = this.spinIcon;
				}
			}
		}

	});

	
	
</script>


</body>
</html>