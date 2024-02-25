<?php
require_once $_SERVER['DOCUMENT_ROOT']."/system/core.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/system/function.php';

$link = urldecode($_POST['link']);

    $curl = curl_get($link);
    if ($curl !== false) {
        if (preg_match('/<meta\s+itemprop="embedURL"\s+content="([^"]+)"\s*\/>/', $curl, $video)) {
            preg_match('/<meta\s+property="og:title"\s+content="([^"]+)"\s*\/>/', $curl, $title);
            preg_match('/<meta\s+property="og:image"\s+content="([^"]+)"\s*\/>/', $curl, $images);

            
            
            $title = $title[1];
            $images = $images[1];
            $video = $video[1];
            exit(json_encode(array('status'=>'success','title'=> $title, 'images'=> $images,'url_video'=> $video,'msg' => 'Leech thành công')));
        } else {
             exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Không tìm thấy URL video hợp lệ')));
        }
    } else {
        exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Không thể tải nội dung từ URL.')));
    }
?>