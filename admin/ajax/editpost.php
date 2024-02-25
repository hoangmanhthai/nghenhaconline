<?php
require_once $_SERVER['DOCUMENT_ROOT']."/system/core.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/system/function.php';

$id = xss($_POST['id']);
$title = xss($_POST['title']);
$description = xss($_POST['description']);
$images = urldecode($_POST['images']);
$tags = xss($_POST['tag']);
$xvideos = urldecode($_POST['xvideos']);
$content = xss($_POST['content']);
$category = xss($_POST['category']);
$category_2 =  isset($_POST['category2']) ? $_POST['category2'] : '';
$slug = create_slug($title);
if (strlen($title) < 6) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Tiêu Đề Quá Ngắn')));
}
if (strlen($content) < 6) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Nội Dung quá ngắn')));
}
if (strlen($content) < 6) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Nội Dung quá ngắn')));
}
$url_img = curl_get(Setting('server_img')."/xvideos/images.php?img=$images&name=$slug");
if (!$url_img) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Lưu ảnh thất bại vui lòng thử lại')));
    
}
$create = $ACAIVIPPRO->update("posts", [
    'title'       => $title,
    'description'  => $description,
    'images'        => Setting('server_img')."/uploads/".$slug.".png",
    'slug'        => $slug,
    'xvideos'        => $xvideos,
    'category'        => $category,
    'tags'        => $tags,
    'content'          => $content,
    'category' => $category,
    'category_2' => $category_2,
    'time_update'    => gettime()
    ], " `id` = '" . $id . "' ");
    
if ($create) {
    exit(json_encode(array('title'=>'Thành công','status'=>'success','msg' => 'Sửa bài viết thành công')));
} else {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Đã xảy ra lỗi gì đó, vui lòng liên hệ admin để xử lý')));
}
