<div class="tab-movies1">
   <h2 class="title-movies1">Phim Sex Ngẫu Nhiên</h2>
   <ul class="list-movies">
      <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `slug` !='$slug' ORDER BY RAND() LIMIT 12") as $row) : ?>
         <li class="item-movie">
            <a title="<?=$row['title'];?>" href="<?=Setting('home_url');?>/<?=$row['slug'];?>.html">
               <div class="image">
                  <div class="movie-play">
                     <div class="movie-thumbnail" style="background-image:url('<?=$row['images'];?>')"></div>
                     <span class="cripple"></span><span class="view-onl"><i class="fa fa-eye" aria-hidden="true"></i> <?=formatViews($row['view']);?>
                     </span>
                  </div>
               </div>
               <div class="label"><?=categoy_name($row['category']);?></div>
               <div class="title-movie"><?=$row['title'];?></div>
            </a>
         </li>
         	<?php endforeach;?>
      </ul>
   </ul>
</div>