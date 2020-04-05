<?php 
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 
include ROOT."engine/controllers/profile_ctrl.php";
?>
<!DOCTYPE html>
<html>
<head>
  <?php $_PAGE_TITLE = (isset($_GET['u']) && User_Factory::usernameExists($_GET['u'])) ? $user->get('full_name')."'s profile" : "NOT FOUND" ?> 
  <?php include 'includes/meta-main.php'; ?>

  <?php if (isset($_GET['u']) && User_Factory::usernameExists($_GET['u'])): ?>
         <meta name="keywords" content="<?=$user->school->get('keywords')?>, <?=$user->get('full_name')?>, <?=$user->school->get('name')?>, <?=$user->school->get('acronym')?>, university, campus, flimbit, buy, sell, classified ads"/>
        <meta property="article:publisher" content="https://www.facebook.com/clinton.nzedimma" />
         <?php if ($user->hasDP()): ?>
        <link rel="image_src" href="avatars/<?=$user->get('profile_pic')?>"/>
        <meta property="og:image" content="avatars/<?=$user->get('profile_pic')?>"/>
        <?php else :  ?>
        <link rel="image_src" href="css/img/no_profile_pic.png"/> 
        <meta property="og:image" content="css/img/no_profile_pic.png"/> 
        <?php endif ?>  
        <meta propery="og:property" content="<?=$_PAGE_TITLE ?>" />
        <meta name="author" content="<?=$user->get('full_name') ?>"/>
        <meta name="school" content="<?=$user->school->get('acronym')?> - (<?=$user->school->get('name')?>)"/>
        <meta name="developers" content="Novacom Webs Nigeria"/>
        <meta name="developers_link" content="http://www.novacomng.com/"/>    
  <?php endif ?>
 
</head>
<body>
<?php include 'includes/header.php'; ?>

<style type="text/css">
  body {
    overflow-x: hidden;
  }



  section.main{
    margin-top: 10%; 
    margin-left: 3%; 
    margin-right:auto; 
    margin-bottom: 6%;    
  }
  .ads-container {
    background: #fff;
    border: #f0f0f0 1px solid;
    width: 96%;
    padding: 17px;
    box-shadow:  1px 1px 1px #e5e5e5;
    border-radius: 3px;
    position: relative; 
    left: 50%;   
  }

  .user-info {
    position: fixed;
    z-index: 999;  
  }

  .user-info-container {
        background: #fff;
        border: #f0f0f0 1px solid;
        width: 96%;
        padding: 17px;
        box-shadow:  1px 1px 1px #e5e5e5;
  }

  .user-info div.head {
    width: 96%;
    background: #7591ae /*#44bc21*/;
    padding-top: 10px;
    padding-bottom: 10px;
    color: #fff;
    padding-left: 5px;
    font-size: 20px
  }

  p.contact-data {
    background: #f0ad4e;
    color: #e9f2fe; 
    padding: 5px;
    text-align: center;
    border-radius: 3px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";  
    letter-spacing: 2px; 
    cursor: pointer;
    border: #efa33a 1px solid;
    font-size: 12px;
  }

  p.contact-data i {
    font-size: 15px;
  }

  .user-info-container h3.username {
    text-transform: none;
    color: #56584b;
    margin-top: -13px;
  }
  .user-info-container p.school-name {
    font-size: 12px;
    cursor: pointer;
  }

.index-placement-pagination {
  margin-left: 50%;
}
div.no-results{
  width: 100%;
  padding-top:3%;
  padding-bottom: 3%;
  background: #fcfefc; 
  box-shadow: 2px 2px 2px #f0f0f0;
  border:1px solid #e9e9e9;
  margin-top: 13%;
  margin-bottom: 13%;
}

div.no-results img {
  width: 200px;
}


/*tablet*/
@media (max-width:900px)
{
  p.contact-data {
    font-size: 13px;
  }
  .user-info {
    top: 30%;
  }

  section.main{
    margin-top: 20%;
  }  

}




/*mobile*/
@media (max-width:768px)
{

  .user-info {
    position: static !important;
    top: 20%;
  }
  .ads-container {
    position: sticky; 
    left: 0;
  }
  section.main{
    margin-top: 20%;
  }
}  


/*mobile*/
@media (max-width:600px)
{

  .user-info {
    position: static !important;

  }
  .ads-container {
    position: static !important; 
    left: 0;
  }
  section.main{
    margin-top: 25%;
  }

.index-placement-pagination {
  margin-left: 0%;
}  

div.no-results{ 
  margin-top: 25% !important;
}
div.no-results img {
  width: 70%;
}



}  
</style>

<?php if (isset($_GET['u']) && User_Factory::usernameExists($_GET['u'])) : ?>
<section class="main">
<div class="row">
  <div class="col-md-3 user-info" style="" id="user-badge" data-aos="fade-up">
      <div class="head" align="center">
        <?=$user->get('full_name') ?>
      </div>    
    <div class="user-info-container">      
      <p align="center">
        <?php if ($user->hasDP()): ?>
           <img src="avatars/<?=$user->get('profile_pic')?>" width="100" height="100" class="rounded-circle" id="profile-pic" style="opacity: 0.85">
        <?php endif ?>

        <?php if (!$user->hasDP()): ?>
        <img src="css/img/no_profile_pic.png" width="100" height="100" class="rounded-circle" id="profile-pic">
        <?php endif ?>
      </p>
      <h3 align="center" class="username"><?=$user->get('username')?></h3>
      <p class="school-name" align="center"><?=$user->school->get('name') ?></p>
      <p class="contact-data">
        <i class="fa fa-phone"></i>
       <?=$user->get('phone')?>
      </p>
      <p class="contact-data">
        <i class="fa fa-envelope"></i>
        <?=$user->get('email')?>
      </p>

    </div>   
  </div>


  <div class="col-md-8">
    <div class="ads-container" style="">
<?php if (!$ads): ?>
      <!-- No ads -->
      <p id="NO-ADS" align="center" style="margin-top: 10%; margin-bottom: 10%;">
        <img src="css/icons/grey-pusher-1.png" width="100" style="opacity: 0.9" data-aos="fade-left">
        <br>
        <span align="center" style="color:#9d9f8e ">No ads </span>
      </p>
<?php endif ?>  

<?php if ($ads): ?>
      <div class="container page-top" align="center">
        <div class="row">
          <?php foreach ($ads as $ad): ?> 
            <div class="col-lg-3 col-md-4 col-xs-6 thumb index-placement" data-aos="fade-up">
                <a href="placement-img/<?= $ad['main_img'] ?>" class="fancybox" rel="ligthbox" title="<?=$ad['title'] ?> | <?=School_Factory::getById("acronym",$ad['school_id'])?>" >
                    <img  src="placement-img/<?= $ad['main_img'] ?>" class="zoom img-fluid"  alt="<?=$ad['title']?> - <?=School_Factory::getById("acronym",$ad['school_id'])?> - <?=School_Factory::getById("keywords",$ad['school_id'])?> - <?=School_Factory::getById("keyphrases",$ad['school_id'])?>- <?=School_Factory::getById("hashtags",$ad['school_id'])?>  - <?=School_Factory::getById("name",$ad['school_id'])?> - <?=School_Factory::getById("state",$ad['school_id'])?> State - Buy and Sell on Campus - Flimbit Classified Ads">
                </a>  
                 <br>
                 <div style="">
                  <span class="name"> 
                    <a href="ad.php?id=<?=$ad['id']?>" style="font-size: 13px;"> <?=substr($ad['title'], 0, 23) ?><?php if (strlen($ad['title'])>23): ?>...<?php endif ?></a> </span>
                  <br>
                  <span class="price">&#8358 <?=number_format($ad['price']) ?></span> 
                  <br>
                  <span class="school" style="color:#959595; font-size: 12px;"><?=School_Factory::getById("acronym",$ad['school_id'])?> </span>
               </div>                                       
            </div>
                                       
            </div>
          <?php endforeach ?>
        </div>     
      </div>
<?php endif ?>  




<?php if ($ads): ?>
<div class="index-placement-pagination" align="center"> 
<?php if ($page_num > 1): ?>
  <a href='profile.php?u=<?=$user->get('username')?>&p=<?=$page_num-1?>#'> &#9001; </a>
<?php endif ?>  
  <?php for ($i = 1; $i<count($page_links); $i++): ?>
    <a href='profile.php?u=<?=$user->get('username')?>&p=<?=$i ?>#' <?php if (isset($_GET['p'])  && $_GET['p'] == $i ) { echo  "class='active'";}    ?> > <?=$i ?> </a>  
  <?php endfor?>

<?php if ($num_of_pages >$page_num): ?>
<a href='profile.php?u=<?=$user->get('username')?>&p=<?=$page_num+1?>#'> &#9002; </a>
<?php endif ?>  
</div>  
 <!--Pagination end here  -->
<?php endif ?>     

   
  </div> 

</div>
</section>

<?php else: ?>
<!-- No profile-->
<section class="main container row" style="margin:auto; ">
    <div class="container no-results" align="center">
      <img src="css/img/stitch-sorry.gif" width="500">
      <br>
      <h5 style="text-transform: none; font-weight: 100;">Sorry, nothing here<br> <a href="index.php">Continue</a> </h5>
    </div>
</section>  
<?php endif ?>

 
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
  $("#profile-pic").hover(function(){
    $(this).addClass("transition");
  }, function (){
    $(this).removeClass("transition");
  });

$(document).on("scroll", function(){
  if($(document).scrollTop() > 86){
    $(".user-info").attr("style", "position:none!important;");
  }
  else
  {
    $(".user-info").attr("style", "position: !important;");
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

$(window).on("scroll", function(){
  if ($("#bottom").isInView() && $(this).width()>768) {
    $("#user-badge").attr("style", " transition: width 2s, height 2s, transform 2s;");
    $("#user-badge").hide();
  } else {
     $("#user-badge").attr("style", " transition: width 2s, height 2s, transform 2s;");
    $("#user-badge").show();
  }
});




</script>

</body>