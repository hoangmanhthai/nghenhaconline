<?php
require_once $_SERVER['DOCUMENT_ROOT']."/system/core.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/system/function.php';

$link = urldecode($_POST['link']);

    $curl = curl_get($link);
    if ($curl !== false) {
        if (preg_match("/html5player.setThumbUrl169\('([^']+)'\)/", $curl, $matches)) {
            $images = $matches[1];
            $url_video = $link;
            exit(json_encode(array('status'=>'success', 'images'=> $images,'url_video'=> $url_video,'msg' => 'Leech thành công')));
        } else {
             exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Không tìm thấy URL video hợp lệ')));
        }
    } else {
        exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Không thể tải nội dung từ URL.')));
    }
?>