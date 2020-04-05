<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 
include ROOT."engine/controllers/category_ctrl.php";

?>
<!DOCTYPE html>
<html>
<head>
  <?php  /*$_PAGE_TITLE = "Category"*/ ?> 
  <?php include 'includes/meta-main.php'; ?>

  <?php if (!User_Factory::isLoggedIn()): ?>

  <meta name="description" content="<?=$DESCRIPTION?>"/>
  <meta name="keywords" content="<?=$KEYWORDS?>"/>
  <meta property="article:publisher" content="https://www.facebook.com/clinton.nzedimma" />
  <link rel="image_src" href="css/img/promo-banner1.png"/> 
  <meta property="og:image" content="css/img/promo-banner1.png"/>
  <meta propery="og:property" content="Flimbit Campus Market Nigeria" />
  <meta name="author" content="Clinton Nzedimma"/>
  <meta name="developers" content="Novacom Webs Nigeria"/>
  <meta name="developers_link" content="http://www.novacomng.com/"/>

  <?php endif ?>  
</head>
<body>
<?php include 'includes/header.php'; ?>

<style type="text/css">

/*.head{float:left;width:100%;}
.search-box{width:99%; margin:0 auto 40px;}
.listing-block{background:#fff; padding-top:20px;}
.media {background:#fefaf5; position:relative; margin-bottom:15px;}
.media img{width:150px;margin:0; height:160px;}
.media-body{border:2px solid #f0ad4e; border-left:0; height:160px; border-radius: 1px; overflow: hidden;}
.media .price{float:right; width:100%; font-size:15px;font-weight:700; color:#44bc21;}
.media .price small {display:block; font-size:15px; color:#232323;}
.media .stats{float:left; width:100%; margin-top:10px;}
.media .stats span{float:left; margin-right:10px; font-size:12px;}
.media .stats i.icon {font-size: 14px;}
.media .stats span i{margin-right:7px; color:#acacac;}
.media .address{float:left; width:100%;font-size:14px; margin-top:5px; color:#888;}
.media .fav-box{position:absolute; right:10px; font-size:20px; top:4px; color:#E74C3C;}
.map-box{background-color:#A3CCFF;}

small.desc {color:#626262 !important; font-size: 12px !important;  } 
span.link a {font-weight: 800; font-size: 14px;} 
*/

section.results {
  margin-top: 10%;
  margin-bottom: 10%;
}

.search-ad-result {
  background: #fff;
  width: 80%;
   font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  margin-top: 20px;
  padding: 4px;
  /*box-shadow: 3px 3px 3px #f0f0f0;*/
  overflow: hidden;
  padding-bottom: 5px;
  border-top: 3px solid #ffd297;
  border-bottom: 3px solid #ffd297;

}


.tab-nav {
  width: 80%;
}

.search-ad-result:hover {
  border-top: 3px solid #64cdff;
  border-bottom: 3px solid #64cdff;
}

.search-ad-result a:hover {
  text-decoration: underline;
}

.search-ad-result img.thumbnail {
  width: 100%;
  max-height:220px;
  overflow: hidden;
  border: 1px solid #eaeaea;
  box-shadow: 1px 1px 1px #f8f8f8;
}

.search-ad-result p.title {
  margin-right:;
  width:;
  color:#707070;
  font-weight: 700;
  overflow: hidden;
  font-size: 15px;
}


.search-thumbnail {
  width: 22%;
  max-height:220px;

}

.search-ad-result div.price {
  width: 14%;
  float: right;
  margin-right: 15%;
  color:#707070;
  font-weight: 700;
  font-size: 16px;
  color: #63c32c;
  padding-top:2%; 
}



.search-ad-result p.negotiable {
  background: #63c32c;
  color: #fff;
  width: 150%;
  font-size: 10px;
  overflow: hidden;
  font-family: century gothic;
  font-weight: 100;
  padding:3px;
  margin-top: 10px;
  text-align: center;
}
.search-ad-result p.mob-negotiable {
  display: none;
}

.search-ad-result div.inner {

  float: right;
  width: 65%;
  font-size: 12px;
  color: #606255;
}

.search-ad-result p.slip {
  color: #9b9d8e;
  font-size: 12px;
  width: 40%;
}

div.no-results{
  width: 100%;
  padding-top:3%;
  padding-bottom: 3%;
  background: #fcfefc; 
  box-shadow: 2px 2px 2px #f0f0f0;
  border:1px solid #e9e9e9;
}

div.no-results img {
  width: 200px;
}





/* tablet and below */
@media (max-width:768px){
.search-ad-result {
  padding: 0px;
  width: 100%;
  overflow: hidden;
}

.search-ad-result img.thumbnail {
  height: 120px;
  }

.search-ad-result p.title {
  font-size: 12px;
} 

.search-ad-result div.price {
  font-size: 12px;
}

.search-ad-result p.negotiable {
  display: none;
}

.search-ad-result p.mob-negotiable {
  display: block;
  background: #63c32c;
  color: #fff;
  font-size: 12px;
  font-family: century gothic;
  font-weight: 100;
  padding:3px;
  margin-top: 10px;
  text-align: center;
  width: 50%;
}

.search-ad-result p.slip {
  font-size: 10px;
  width: 60%;
}

.search-ad-result div.inner {

  float: right;
  width: 65%;
  font-size: 11px;
  color: #606255;
  margin-right: 3%;
}

.search-thumbnail {
  width: 30%;
  max-height:220px;

}

section.results {
  margin-top: 20%;
}

div.no-results img {
  width: 70%;
}


.tab-nav {
  width: 100%;
}
}
</style>




<?php 
if (User_Factory::isLoggedIn() && isset($_GET['k']) && in_array(strtolower($_GET['k']), $allowed_categories)) {
  include 'includes/category-logged.php';
}
?>

<?php 
if (!User_Factory::isLoggedIn() && isset($_GET['k']) && in_array(strtolower($_GET['k']), $allowed_categories)) {
  include 'includes/category-nonlogged.php';
}
?>



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

</body>
</html>