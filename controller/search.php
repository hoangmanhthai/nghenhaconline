<?php
require_once dirname(__DIR__) . '/system/core.php';
require_once dirname(__DIR__) . '/system/function.php';
if (isset($_GET['q'])) {
          $key = get($_GET['q']);
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
 
 $title = "Tìm kiếm ".$key;
require_once dirname(__DIR__) . '/controller/head.php';
$sotin1trang = 12;
$from = ($page - 1) * $sotin1trang;
?>

<div class="body row">
   <div class="tab-movies">
      <h1 class="title-movies">TÌM KIẾM <font color="red"><?=$key;?></font></h1>
      <?php if($ACAIVIPPRO->num_rows("SELECT * FROM `posts` WHERE `title` LIKE '%$key%' OR `description` LIKE '%$key%' OR `content` LIKE '%$key%' OR `category` LIKE '%$key%' OR `tags` LIKE '%$key%'") > 0) : ?>
      <ul class="list-movies">
 <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `title` LIKE '%$key%' OR `description` LIKE '%$key%' OR `content` LIKE '%$key%' OR `category` LIKE '%$key%' OR `tags` LIKE '%$key%' ORDER BY `id` DESC LIMIT $from,$sotin1trang") as $row) : ?>
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
       <div class="navigation-scoll">
      <?php
                    $tong = $ACAIVIPPRO->num_rows("SELECT * FROM `posts` WHERE `category`= '".$row['id']."'");
                    if ($tong > $sotin1trang) {
                        echo pagination_account(Setting('home_url').'/the-loai/'.$slug.'/', $from, $tong, $sotin1trang);
                    }?>
         </div>
         </div>
   </div>
          <?php else : ?>
      </div>
   </div>
   <div style="text-align:center;">Không có bài viết nào</div>
   <?php endif; ?>

<?php
require_once dirname(__DIR__) . '/controller/foot.php';
   ?>