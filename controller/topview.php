<div class="sidebar">
   <div class="section-title">
      <span>PHIM SEX TOP</span>
      <div class="change-tab">
         <ul class="dp-popular-tab">
            <li><a href="#top-month">Tháng</a></li>
            <li><a href="#top-all">Tất cả</a></li>
         </ul>
      </div>
   </div>
   <div class="section-videos">
      <div class="box-popular">
         <div class="popular-post" id="top-month">
            <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `hidden`='0' ORDER BY `view_month` DESC LIMIT 6") as $row) : ?>
            <div class="item">
               <a href="<?=Setting('home_url');?>/<?=$row['slug'];?>.html" title="<?=$row['title'];?>" class="item-link"><img src="<?=$row['images'];?>" class="lazy post-thumb" alt="<?=$row['title'];?>"></a>
               <a href="<?=Setting('home_url');?>/<?=$row['slug'];?>.html" title="<?=$row['title'];?>">
                  <h3 class="title"><?=$row['title'];?></h3>
               </a>
               <div class="viewsCount"><?=formatViews($row['view_month']);?>
                  views
               </div>
            </div>
            <?php endforeach; ?>
         </div>
         <div class="popular-post" id="top-all">
             <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `hidden`='0' ORDER BY `view` DESC LIMIT 6") as $row) : ?>
            <div class="item">
               <a href="<?=Setting('home_url');?>/<?=$row['slug'];?>.html" title="<?=$row['title'];?>" class="item-link"><img src="<?=$row['images'];?>" class="lazy post-thumb" alt="<?=$row['title'];?>"></a>
               <a href="<?=Setting('home_url');?>/<?=$row['slug'];?>.html" title="<?=$row['title'];?>">
                  <h3 class="title"><?=$row['title'];?></h3>
               </a>
               <div class="viewsCount"><?=formatViews($row['view']);?>
                  views
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>