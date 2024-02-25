<?php
require_once dirname(__DIR__) . '/system/core.php';
require_once dirname(__DIR__) . '/system/function.php';
if (isset($_GET['tag'])) {
    $key = get($_GET['tag']);
} else {
    $key = "";
}

if (isset($_GET['page'])) {
    $page = xss(intval($_GET['page']));
    $title_page = " - Trang $page";
} else {
    $page = 1;
    $title_page = null;
}
 
 $title = "Phim Sex Chủ Đề ".$key;
 $description = "Phim sex cực hay về chủ đề $key đã được chọn lọc, Xem phim sex miễn phí, phim sex online";
require_once dirname(__DIR__) . '/controller/head.php';
$sotin1trang = 12;
$from = ($page - 1) * $sotin1trang;
?>

<div class="body row">
   <div class="tab-movies">
      <h1 class="title-movies">Chủ Đề <font color="red"><?=$key;?></font></h1>
      <ul class="list-movies">
 <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `tags` LIKE '%$key%' ORDER BY `id` DESC LIMIT $from,$sotin1trang") as $row) : ?>
         <li class="item-movie">
            <a title="<?=$row['title'];?>" href="<?=Setting('home_url');?>/<?=$row['slug'];?>.html">
               <div class="image">
                  <div class="movie-play">
                     <img class="movie-thumbnail video-image lazyload" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAADElEQVQImWOQlpYGAACmAFL1ka4KAAAAAElFTkSuQmCC" data-original="<?=$row['images'];?>" alt="<?=$row['title'];?>">
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
       <div class="navigation-scoll">
      <?php
                    $tong = $ACAIVIPPRO->num_rows("SELECT * FROM `posts` WHERE `tags` LIKE '%$key%'");
                    if ($tong > $sotin1trang) {
                        echo pagination_account(Setting('home_url').'/tag/'.$slug.'.html?page=', $from, $tong, $sotin1trang);
                    }?>
         </div>
         </div>
   </div>

<?php
require_once dirname(__DIR__) . '/controller/foot.php';
   ?>