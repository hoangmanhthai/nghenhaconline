<?php
require_once dirname(__DIR__) . '/system/core.php';
require_once dirname(__DIR__) . '/system/function.php';
if (isset($_GET['slug'])) {
          $slug = xss_jquery($_GET['slug']);
      } else {
          $slug = "error";
      }
if (isset($_GET['page'])) {
    $page = xss(intval($_GET['page']));
    $title_page = " - Trang $page";
} else {
    $page = 1;
    $title_page = null;
}
 if ($row = $ACAIVIPPRO->get_row("SELECT * FROM `category` WHERE `slug`='$slug'")) : 
 $title = $row['title'].$title_page;
 $description = $row['description'];
 $id_categ = $row['id'];
$title = isset($title) ? $title : $title.$title_page;
require_once dirname(__DIR__) . '/controller/head.php';
$sotin1trang = 12;
$from = ($page - 1) * $sotin1trang;
?>
<div class="body row">
   <div class="tab-movies">
      <h1 class="title-movies">Thể Loại <font color="red"><?=$row['title'];?></font></h1>
      <?php if($ACAIVIPPRO->num_rows("SELECT * FROM `posts` WHERE `category` LIKE '%$id_categ%' OR `category_2` LIKE '%$id_categ%'") > 0):?>
      <ul class="list-movies">
 <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `category` LIKE '%$id_categ%' OR `category_2` LIKE '%$id_categ%'  ORDER BY `id` DESC LIMIT $from,$sotin1trang") as $row) : ?>
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
                    $tong = $ACAIVIPPRO->num_rows("SELECT * FROM `posts` WHERE `category` LIKE '%$id_categ%' OR `category_2` LIKE '%$id_categ%' ");
                    if ($tong > $sotin1trang) {
                        echo page_category(Setting('home_url').'/the-loai/'.$slug.'.html?page=', $from, $tong, $sotin1trang);
                    }?>
         </div>
          <?php endif; ?>
      </div>
   </div>

<?php
require_once dirname(__DIR__) . '/controller/foot.php';
   ?>
   <?php else: header("location: /"); ?>
 <?php endif; ?>