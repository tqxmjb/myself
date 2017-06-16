<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2017/3/28
 * Time: 17:11
 */

$base64 = $_POST['img'];
$base64 = substr(strstr($base64,','),1);
$img = base64_decode($base64);
$rs = file_put_contents('./test.jpg', $img);//返回的是字节数
print_r($rs);exit;

header('Content-type:text/html;charset=utf-8');
$base64_image_content = $_POST['img'];
//匹配出图片的格式
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
    $type = $result[2];
//    echo '<pre>';print_r($result);echo '</pre>';exit;
    $new_file = "./".date('Ymd',time())."/";
    if(!file_exists($new_file))
    {
//检查是否有该文件夹，如果没有就创建，并给予最高权限
        mkdir($new_file, 0700);
    }
    $new_file = $new_file.time().".{$type}";
    if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
        echo '新文件保存成功：', $new_file;
    }else{
        echo '新文件保存失败';
    }
}
