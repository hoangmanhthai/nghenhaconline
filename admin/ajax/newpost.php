<?php
require_once $_SERVER['DOCUMENT_ROOT']."/system/core.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/system/function.php';

$title = xss($_POST['title']);
$description = xss($_POST['description']);
$images = urldecode($_POST['images']);
$tags = xss($_POST['tag']);
$mp3 = urldecode($_POST['mp3']);
$category = xss($_POST['category']);
$casi = xss($_POST['casi']);
$dodai = xss($_POST['dai']);
$slug = create_slug($title);
if (empty($title) || empty($description) || empty($images) || empty($tags) || empty($mp3) || empty($category) || empty($casi) || empty($dodai) ) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Vui lòng nhập đủ thông tin')));
}
if (strlen($title) < 6) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Tiêu Đề Quá Ngắn')));
}
if ($ACAIVIPPRO->get_row("SELECT * FROM `posts` WHERE `slug`='$slug'")) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Vui lòng thay đổi tiêu đề không được lặp lại')));
}
if ($ACAIVIPPRO->get_row("SELECT * FROM `posts` WHERE `mp3`='$mp3'")) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Vui lòng không đăng lại bài hát')));
}
$url_img = curl_get(Setting('server_img')."/xvideos/images.php?img=$images&name=$slug");
if (!$url_img) {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Lưu ảnh thất bại vui lòng thử lại')));
    
}
$create = $ACAIVIPPRO->insert("posts", [
    'title'       => $title,
    'description'  => $description,
    'images'        => Setting('server_img')."/uploads/".$slug.".png",
    'slug'        => $slug,
    'mp3'        => $mp3,
    'category'        => $category,
    'tags'        => $tags,
    'casi'        => $casi,
    'dodai'        => $dodai,
    'category' => $category,
    'time'    => gettime(),
    'time_update'    => gettime()
]);

if ($create) {
    exit(json_encode(array('title'=>'Thành công','status'=>'success','msg' => 'Đăng bài viết thành công')));
} else {
    exit(json_encode(array('title'=>'Thất bại','status'=>'error','msg' => 'Đã xảy ra lỗi gì đó, vui lòng liên hệ admin để xử lý')));
}
