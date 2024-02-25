<?php
require_once dirname(__DIR__) . '/system/core.php';
require_once dirname(__DIR__) . '/system/function.php';
?>
<?php
if (isset($_GET['slug'])) {
   $slug = xss_jquery($_GET['slug']);
} else {
   $slug = "error";
}

if ($row = $ACAIVIPPRO->get_row("SELECT * FROM `posts` WHERE `slug`='$slug'")) :
   $ACAIVIPPRO->update("posts", [
      'view' => $row['view'] + 1,
      'view_month' => $row['view_month'] + 1
   ], " `slug` = '" . $row['slug'] . "' ");
   $title = $row['title'];
   $description = $row['description'];
   $images = $row['images'];
   require_once dirname(__DIR__) . '/controller/head.php';
?>
   <div class="breadcrumb" xmlns:v="https://rdf.data-vocabulary.org/"><span typeof="v:Breadcrumb"><a href="/page-muc/1/SAU-LI-T-KHC-PHAN-MNH-QUNH-OST-phim-MAI.html" rel="v:url" property="v:title" title="Tai nhac nhanh"><strong>Tải Bài Hát</strong></a></span> ► <span typeof="v:Breadcrumb"><a href="/page-muc/1/SAU-LI-T-KHC-PHAN-MNH-QUNH-OST-phim-MAI.html" rel="v:url" property="v:title" title="<?=$row['title'];?> - <?=$row['casi'];?>"><strong>Tải Mp3</strong></a></span> ► <span typeof="v:Breadcrumb"><a href="/page-search.html?to-seach=SAU LỜI TỪ KHƯỚC - PHAN MẠNH QUỲNH  (OST phim MAI)" rel="v:url" property="v:title" title="PHAN MẠNH QUỲNH"><strong><?=$row['title'];?> - <?=$row['casi'];?></strong></a></span></div>
   <div class="weteng">
      <div class="kolom">
         <table width="100%">
            <tbody>
               <tr>
                  <td align="center" width="10%"> <img src="//tainhactop.vip/cover/2875592/cover.jpg" alt="SAU LỜI TỪ KHƯỚC - PHAN MẠNH QUỲNH  (OST phim MAI)" style="border-radius: 25px; border:1px solid #dedede; height: 50px; width: 50px;"></td>
                  <td align="left">
                     <h2>Tải Bài Hát <?= $row['title']; ?> - <?= $row['casi']; ?> MP3</h2> Tải lên lúc: <?= $row['time']; ?>&nbsp;
                  </td>
               </tr>
            </tbody>
         </table>
         <table style="width:100%">
            <tbody>
               <tr valign="top">
                  <td width="15%">Tiêu Đề</td>
                  <td> :</td>
                  <td><b><?=$row['title'];?></b></td>
               </tr>
               <tr valign="top">
                  <td width="15%">Ca Sĩ</td>
                  <td> :</td>
                  <td><b><?=$row['casi'];?></b></td>
               </tr>
               <tr valign="top">
                  <td width="15%">Độ Dài</td>
                  <td> :</td>
                  <td><?=$row['dodai'];?></td>
               </tr>
               <tr valign="top">
                  <td width="15%">Size</td>
                  <td> :</td>
                  <td>10 MB</td>
               </tr>
               <tr valign="top">
                  <td width="15%">Source</td>
                  <td> :</td>
                  <td>Youtube</td>
               </tr>
               <tr valign="top">
                  <td width="15%">Share</td>
                  <td> :</td>
                  <td><a rel="nofollow" href="https://facebook.com/sharer.php?u=https://tainhactop.vip/page-view/312/SAU-LI-T-KHC-PHAN-MNH-QUNH-OST-phim-MAI.html" class="facebook" target="_blank">Facebook</a> <a rel="nofollow" href="https://twitter.com/share?url=https://tainhactop.vip/page-view/312/SAU-LI-T-KHC-PHAN-MNH-QUNH-OST-phim-MAI.html" class="twitter" target="_blank">Twitter</a></td>
               </tr>
            </tbody>
         </table> <br>
      </div>
   </div>
   <div class="download">
      <center></center>
      <style>
         img {
            max-width: 100%;
            text-align: center;
            border-radius: 15px
         }

         .paging {
            border: 0;
            text-align: center;
            padding: 4px;
            display: block;
            color: #999
         }

         .paging span {
            background: #000;
            color: #fff;
            padding: 3px 8px;
            margin: 0 1px;
            display: inline-block
         }
      </style><br> <audio controls="">
         <source src="<?=$row['mp3'];?>" type="audio/mpeg">
      </audio><br>Lưu Ý: Tìm Và Nhấp Vào (nhactop.Vip).Mp3 Để tải Bài hát <br> <a rel="nofollow" href="https://web1s.com/st?token=023d02e5-18fd-4064-8fb9-a4bd8a7761b8&amp;url=https://nhacdj.wapkiz.com/filedownload/2875593/OST-phim-MAI-SAU-LI-T-KHC-PHAN-MNH-QUNH-(nhacdj.wapkiz.com).mp3" target="_blank" class="linkdl"><span><i class="fa fa-download"></i></span>Link Tải Về Máy 1</a> <br>Xác Minh Captcha Để Tải <br> <a rel="nofollow" href="https://web1s.com/st?token=023d02e5-18fd-4064-8fb9-a4bd8a7761b8&amp;url=https://nhacdj.wapkiz.com/filedownload/2875593/OST-phim-MAI-SAU-LI-T-KHC-PHAN-MNH-QUNH-(nhacdj.wapkiz.com).mp3" title="(OST phim MAI) SAU LỜI TỪ KHƯỚC - PHAN MẠNH QUỲNH .mp3" class="linkdl"><i class="fa fa-download"></i> <b>Link Tải Về Máy 2</b></a><br>Lưu Ý Chọn Tải Về 1 Và 2 Nếu Gặp Lỗi <br> <br><br><br>
   </div>
   <div class="weteng">
      <div class="kolom"> <strong>Tags : <u><i><?php foreach (tags($row['tags']) as $tags) : ?>
                     <a href="<?= Setting('home_url'); ?>/tag/<?= $tags; ?>" rel="<?= $tags; ?>"><?= $tags; ?></a>
                  <?php endforeach; ?></i></u></strong> </div>
   </div>
<?php endif; ?>
<?php
// require_once dirname(__DIR__) . '/controller/topview.php';
?>
<div class="clearfix"></div>
<?php
// require_once dirname(__DIR__) . '/controller/randomvideo.php';
?>
<?php
require_once dirname(__DIR__) . '/controller/foot.php';
?>