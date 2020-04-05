<section class="results" id="non-logged">
  <div class="aos-init aos-animate" data-aos="fade-down" align="center">
    
    <p align="center"><h5 style="color: #3f464e"> RESULTS for <i style="text-transform: none;">"<?=$q?>"</i> </h5></p>

<?php if($ads): ?>
  <?php foreach ($ads as $ad): ?>
  <div class="aos-init" data-aos="fade-down" align="center">
    <?php // negotiable ad ?>
    <div class="search-ad-result" align="left">
      <div class="inner">
        <div class="price"> 
          <span>&#8358<span><?=number_format($ad['price']) ?>
          <?php if ($ad['negotiable'] == 1): ?> <p class="negotiable"> NEGOTIABLE</p> <?php endif ?>
          </span></span>
        </div>
              <p class="title"><a href="ad?id=<?=$ad['id'] ?>"><?=substr($ad['title'], 0, 33) ?><?php if (strlen($ad['title'])>33): ?>...<?php endif ?></a></p>
               <?=substr($ad['description'], 0, 65) ?><?php if (strlen($ad['description'])>65): ?>... <?php endif ?>
              <p class="slip">
                <i class="fa fa-clock-o icon"></i> 
                <?=$ad['time_of_post'] ?>, <?=date_format(date_create($ad['date_of_post']),'d/M/Y') ?>
                <br> 
                <i class="fa fa-map-marker icon" ></i>
               <?=School_Factory::getById('acronym',$ad['school_id']) ?>
              </p>      
        <?php if ($ad['negotiable'] == 1): ?>    <p class="mob-negotiable"> NEGOTIABLE </p>   <?php endif ?>     
      </div>
      <div class="search-thumbnail" align="left">
        <?php if ($ad['main_img'] || $ad['main_img'] !='' ): ?>
        <img src="placement-img/<?=$ad['main_img'] ?>" class="thumbnail" alt="<?=$ad['title']?> - <?=School_Factory::getById("acronym",$ad['school_id'])?> - <?=School_Factory::getById("keywords",$ad['school_id'])?> - <?=School_Factory::getById("keyphrases",$ad['school_id'])?>- <?=School_Factory::getById("hashtags",$ad['school_id'])?>  - <?=School_Factory::getById("name",$ad['school_id'])?> - <?=School_Factory::getById("state",$ad['school_id'])?> State - Buy and Sell on Campus - Flimbit Classified Ads">          
        <?php endif ?>

        <?php if (!$ad['main_img'] || $ad['main_img'] =='' ): ?>
            <img src="css/img/null.png" class="thumbnail">
        <?php endif ?>

      </div>      
    </div>
  </div>
  <?php endforeach ?>


<!-- Pagination -->
<div class="index-placement-pagination" align="center"> 
<?php if ($page_num > 1): ?>
  <a href='search.php?q=<?=$q?>&p=<?=$page_num-1?>#'> &#9001; </a>
<?php endif ?>  
  <?php for ($i = 1; $i<count($page_links); $i++): ?>
    <a href='search.php?q=<?=$q?>&p=<?=$i ?>#' <?php if (isset($_GET['p'])  && $_GET['p'] == $i ) { echo  "class='active'";}    ?> > <?=$i ?> </a> 
  <?php endfor?>

<?php if ($num_of_pages >$page_num): ?>
<a href='search.php?q=<?=$q?>&p=<?=$page_num+1?>#'> &#9002; </a>
<?php endif ?>  
</div>  

<?php endif //ADS ENDS EXISTS HERE ?>

</section>


<?php if (!$ads): ?>
<section class="main container row" style="margin:auto; margin-top: -8%">
    <div class="container no-results" align="center">
      <img src="css/img/stitch-sorry.gif" width="500">
      <br>
      <h5 style="text-transform: none; font-weight: 100;">Sorry no ad for this search<br> <a href="index.php">Continue</a> </h5>
    </div>
</section>  
  
<?php endif ?>