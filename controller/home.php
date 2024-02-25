<?php
require_once dirname(__DIR__) . '/system/core.php';
require_once dirname(__DIR__) . '/system/function.php';
if (isset($_GET['page'])) {
   $page = xss(intval($_GET['page']));
   $title_page = " - Trang $page";
} else {
   $page = 1;
   $title_page = null;
}
$title = isset($title) ? $title : Setting('title') . $title_page;
require_once dirname(__DIR__) . '/controller/head.php';
$sotin1trang = 12;
$from = ($page - 1) * $sotin1trang;
?>
<div class="weteng">
   <h2 class="cungur" align="center"><b>Cập Nhập Bài Hát Mới </b></h2>
   <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `hidden`='0' ORDER BY `id` DESC LIMIT $from,$sotin1trang") as $row) : ?>
      <div class="polok">
      <table>
         <tbody>
            <tr valign="middle">
               <td valign="top">
                  <div style="font-size:14px;">♬ <a href="<?= Setting('home_url'); ?>/<?= $row['slug']; ?>.html" title="<?= $row['title']; ?>"><b><?= $row['title']; ?></b></a><br> Độ Dài : 2:47 | Size : 6.37 MB | Lượt nghe : <?= formatViews($row['view']); ?></div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <?php endforeach; ?>
   </ul>
   <div class="navigation-scoll">
      <?php
      $tong = $ACAIVIPPRO->num_rows("SELECT * FROM `posts` WHERE `hidden`='0'");
      if ($tong > $sotin1trang) {
         echo pagination_account(Setting('home_url') . '/baihatmoi/', $from, $tong, $sotin1trang);
      } ?>
   </div>



  
   <!-- <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `category` WHERE `hidden`='0' ORDER BY `id`") as $row) : ?>
      <h2 class="cungur" align="center"><b><?= $row['title']; ?></b></h2>
      <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `posts` WHERE `hidden`='0' AND `category` = '{$row['id']}' ORDER BY `id` DESC LIMIT $from,$sotin1trang") as $post) : ?>
      <div class="polok">
      <table>
         <tbody>
            <tr valign="middle">
               <td valign="top">
                  <div style="font-size:14px;">♬ <a href="<?= Setting('home_url'); ?>/<?= $post['slug']; ?>.html" title="<?= $post['title']; ?>"><b><?= $post['title']; ?></b></a><br> Độ Dài : 2:47 | Size : 6.37 MB | Lượt nghe : <?= formatViews($post['view']); ?></div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <?php endforeach; ?>
   </ul>
   <div class="navigation-scoll">
      <?php
      $tong = $ACAIVIPPRO->num_rows("SELECT * FROM `posts` WHERE `hidden`='0'  AND `category` = '{$row['id']}'");
      if ($tong > $sotin1trang) {
         echo pagination_account(Setting('home_url') . '/baihatcu/', $from, $tong, $sotin1trang);
      } ?>
   </div>
   <?php endforeach; ?>
   </div> -->
<?php
require_once dirname(__DIR__) . '/controller/foot.php';
?>