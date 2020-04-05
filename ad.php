<?php 
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 
include ROOT."engine/controllers/ad_ctrl.php";
?>
<!DOCTYPE html>
<html>
<head>
  <?php $_PAGE_TITLE = (isset($_GET['id']) && Ad_Factory::existsById($_GET['id'])) ? $ad->get('title')." | ".$ad->school->get('acronym')." | ".$ad->school->get('name')." | Flimbit - Buy and Sell on Campus in Nigeria " : "No ad" ?> 
  <?php include 'includes/meta-main.php'; ?>
<?php
/*If ad exists Starts here for META & SEO  */
if (isset($_GET['id']) && Ad_Factory::existsById($_GET['id'])) :
 ?>   
        
        <meta name="keywords" content="<?=$ad->school->get('keywords')?>, <?=$ad->get('category')?>, flimbit, buy, sell, classified ads"/>
        <meta property="article:publisher" content="https://www.facebook.com/clinton.nzedimma" />
         <?php if ($ad->hasImage()): ?>

        <link rel="image_src" href="placement-img/<?=$ad->get('main_img') ?>"/>
        <meta property="og:image" content="placement-img/<?=$ad->get('main_img') ?>"/>
        <?php else :  ?>
        <link rel="image_src" href="css/img/null.png"/> 
        <meta property="og:image" content="css/img/null.png"/> 
        <?php endif ?>  
        <meta propery="og:property" content="<?=$_PAGE_TITLE ?>" />
        <meta name="author" content="<?=$ad->creator->get('full_name') ?>"/>
        <meta name="school" content="<?=$ad->school->get('acronym')?> - (<?=$ad->school->get('name')?>)"/>
        <meta name="developers" content="Novacom Webs Nigeria"/>
        <meta name="developers_link" content="http://www.novacomng.com/"/>

<?php endif ?>
</head>
<body>
<?php include 'includes/header.php'; ?>

<style type="text/css">
  
  section.main{
    margin-top: 10% !important;
    overflow-x: hidden;
    margin: auto;
    margin-bottom:  5% !important;
  }



.img-transition {
    -webkit-transform: scale(1.03); 
    -moz-transform: scale(1.03);
    -o-transform: scale(1.03);
    transform: scale(1.03);
}


  section.main .date {
    color:#b2b2b2;
  }
  section.main .date i {
    font-size: 12px;
    color: #787878;

  }

  .ad-info {
    background: #fff;
    box-shadow: 2px 2px 2px #ebebeb;
    padding-top: 15px;
  }

  img.ad {
    width: 95%;
  }

 .details {
  color: #57594d;
 }

  .ad-info .details {
    font-size: 14px;
  }
 .ad-info .details h5 {
    margin-bottom: -15px;
    font-size: 18px;
    color:#53b232; 
  }


  .ad-info h3.title {
    text-transform: none;
    color: #555555;
  }

  h3.title {
    font-size: 20px;
  }

  .user-info {
    background: #fff;
    margin-left: 1%;
    box-shadow: 2px 2px 2px #ebebeb;
    padding: 0px;
    height: 500px !important;
    margin-bottom: 2%;
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
    width: 85%;
    font-size: 12px;
  }

  p.contact-data i {
    font-size: 15px;
  }  

  div.safety-tips {
    background: #ffe8e8;
    font-size: 13px;
    width: 90%;
    margin: auto;
    padding: 5px;
    border:1px solid #ffdfdf;
  }

  .user-info div.price {
    padding-top: 15px;
    padding-bottom: 15px;
    font-size: 20px;
    background: #44bc21;
    font-weight: 600;
    width: 100%;
    color: #effceb;
    font-family: "Avant Garde",Avantgarde,"Century Gothic",CenturyGothic,AppleGothic,sans-serif;
    margin-bottom: 10px;
  }

div.no-results img {
  width: 400px;
}


/* mobile */
@media (max-width: 600px){
section.main{
  margin-top: 30% !important;
} 

.user-info {
  margin-top: 20px;
}

img.ad {
  width: 110%;
}

div.no-results img {
  width: 85%;
}

}  
</style>
<?php
/*If ad exists Starts here */
if (isset($_GET['id']) && Ad_Factory::existsById($_GET['id'])) :
 ?> 

<div style="display: none;">
  <?=$ad->get('title')?> - <?=$ad->creator->get('full_name')?> - <?=$ad->creator->get('username')?> - <?=$ad->creator->get('phone')?> -  <?=$ad->get('category')?>  - <?=$ad->school->get('acronym')?> - <?=$ad->school->get('name')?> - <?=$ad->school->get('keywords')?> - <?=$ad->school->get('keyphrases')?> - <?=$ad->school->get('hashtags')?> - <?=$ad->school->get('state')?> State, Nigeria
</div>

<section class="main container row">
  <div class="col-md-8 ad-info">
    <div class="row">
      <div class="col-8">
        <h3 class="title"><?=$ad->get('title') ?></h3>
        <p>
          <!-- <img src="css/img/null.png" class="ad"> -->
          <?php if ($ad->hasImage()): ?>
            <img src="placement-img/<?=$ad->get('main_img') ?>" class="ad" data-aos="fade-right" alt=" <?=$ad->get('title')?> - <?=$ad->creator->get('full_name')?> - <?=$ad->creator->get('username')?> - <?=$ad->creator->get('phone')?> -  <?=$ad->get('category')?>  - <?=$ad->school->get('acronym')?> - <?=$ad->school->get('name')?> - <?=$ad->school->get('keywords')?> - <?=$ad->school->get('keyphrases')?> - <?=$ad->school->get('hashtags')?> - <?=$ad->school->get('state')?> State, Nigeria">
          <?php endif ?>

          <?php if (!$ad->hasImage()): ?>
            <img src="css/img/null.png" class="ad" alt=" <?=$ad->get('title')?> - <?=$ad->creator->get('full_name')?> - <?=$ad->creator->get('username')?> - <?=$ad->creator->get('phone')?> -  <?=$ad->get('category')?>  - <?=$ad->school->get('acronym')?> - <?=$ad->school->get('name')?> - <?=$ad->school->get('keywords')?> - <?=$ad->school->get('keyphrases')?> - <?=$ad->school->get('hashtags')?> - <?=$ad->school->get('state')?> State, Nigeria">
          <?php endif ?> 

        </p>

        <div class="details" data-aos="fade-down">
          <h4 style="color:#b2b2b2;">INFORMATION</h4>
          <p>
            <h5> Category </h5> <br> <?=ucwords($ad->get('category')) ?>
          </p>
          <p>
            <h5> Description </h5> <br> <?=$ad->get('description') ?>
          </p>

          <p>
            <h5> Price </h5> <br> &#8358  <?=number_format($ad->get('price')) ?>  
            <?php if ($ad->isNegotiable()): ?>
              <span style="color:#e79f50; font-size: 9px;">Negotiable </span>
            <?php endif ?>
          </p>

        </div>

      </div>

      <div class="col-4" align="right" data-aos="fade-left">
        <p class="date" style="font-size: 9px; ">
          <i class="fa fa-map-marker icon" ></i>
          <?=$ad->school->get('acronym') ?>
          <br>         
          <i class="fa fa-clock-o icon"></i> 
          <?=$ad->get('time_of_post') ?>
          <br>
          <i class="fa fa-calendar"> </i> 
         <!--  19 Nov 2017 -->
         <?=$ad->date_of_post["d-M-Y"] ?>
        </p>        
      </div>
    </div>
  </div>


  <div class="col-md-3 user-info">
    <div class="price" align="center">
      <span> &#8358;  <?=number_format($ad->get('price')) ?>  </span>
    </div>  
    <div align="center">
      <p>

        <?php if (!$ad->creator->hasDP()): ?>
          <img src="css/img/no_profile_pic.png" width="78" class="rounded-circle" id="profile-pic" style="margin-bottom: -10px;"> 
        <?php endif ?>

        <?php if ($ad->creator->hasDP()): ?>
         <img src="avatars/<?=$ad->creator->get('profile_pic') ?>" width="78" height="78" class="rounded-circle" id="profile-pic" style="margin-bottom: -10px;">
        <?php endif ?>
         <h4 style="text-transform: none;"><a style="color:#747766;" href="profile.php?u=<?=$ad->creator->get('username') ?>"><?=$ad->creator->get('username') ?></a></h4>

         <span style="font-size: 11px; margin-top: -10px; color: #5f6152;"><?=$ad->school->get('acronym') ?> - <?=$ad->school->get('name') ?></span>
      </p>

      <p class="contact-data">
        <i class="fa fa-phone"></i>
        <?=$ad->creator->get('phone') ?>
      </p>

      <p class="contact-data">
        <i class="fa fa-envelope"></i>
       <?=$ad->creator->get('email') ?>
      </p>     
    </div> 

      <div class="safety-tips" align="left">
        <h6 align="left"> SAFETY TIPS </h6>
        <ul align="left">
          <li> Do not pay in advance</li>
          <li>Check the item before you purchase it</li>
          <li>Ensure you meet at a safe place preferably a public location</li>
        </ul> 
      </div>     

  </div>
</section>


<div style="display: none;">
   <?=$ad->get('title')?> - <?=$ad->creator->get('full_name')?> - <?=$ad->creator->get('username')?> - <?=$ad->creator->get('phone')?> -  <?=$ad->get('category')?>  - <?=$ad->school->get('acronym')?> - <?=$ad->school->get('name')?> - <?=$ad->school->get('keywords')?> - <?=$ad->school->get('keyphrases')?> - <?=$ad->school->get('hashtags')?> - <?=$ad->school->get('state')?> State, Nigeria
</div>
  
<?php endif /*If ad exists Ends here */?>



<?php
  /*If ad does not exist */
 if (isset($_GET['id']) && !Ad_Factory::existsById($_GET['id']) || empty($_GET) || !isset($_GET['id']) ) :
?>
<section class="main container row">
    <div class="container no-results" align="center">
      <img src="css/img/stitch-sorry.gif" width="500">
      <br>
      <h5 style="text-transform: none; font-weight: 100;">Sorry nothing here <br> <a href="index.php">Continue</a> </h5>
    </div>
</section>  
<?php endif /*If ad exists Ends here */?>

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
<script type="text/javascript">
$("img.ad").hover(function(){    
    $(this).addClass('img-transition');
  }, 
function(){
    $(this).removeClass('img-transition');
  });

  
</script>

</body>