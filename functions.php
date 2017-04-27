<?php
/**
 * @param string $msg  要提示的消息
 * @param string $url 要跳转到的url
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View 返回跳转师徒
 */
function showMsg($msg, $url = '')
{
    $url = empty($url) ? '/' : $url;
    return view('public/msg', ['jumpUrl' => $url, 'jumpMsg' => $msg]);
}

/**
 * desription 判断是否gif动画
 * @param sting $image_file图片路径
 * @return boolean t 是 f 否
 */
function check_gifcartoon($image_file)
{
    $fp = fopen($image_file, 'rb');
    $image_head = fread($fp, 1024);
    fclose($fp);
    return preg_match("/" . chr(0x21) . chr(0xff) . chr(0x0b) . 'NETSCAPE2.0' . "/", $image_head) ? false : true;
}

/**
 * desription 压缩图片
 * @param sting $imgsrc 图片路径
 * @param string $imgdst 压缩后保存路径
 */
function compressedImage($imgsrc,$coe=0.9 ,$imgdst = null, $quality = 75)
{
    list($width, $height, $type) = getimagesize($imgsrc);
    if (empty($imgdst)) {
        $imgdst = $imgsrc;
    }
    $new_width = ($width > 600 ? 600 : $width) * $coe;
    $new_height = ($height > 600 ? 600 : $height) * $coe;
    switch ($type) {
        case 1:
            $giftype = check_gifcartoon($imgsrc);
            if ($giftype) {
                header('Content-Type:image/gif');
                $image_wp = imagecreatetruecolor($new_width, $new_height);
                $image = imagecreatefromgif($imgsrc);
                imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                //75代表的是质量、压缩图片容量大小
                imagejpeg($image_wp, $imgdst, $quality);
                imagedestroy($image_wp);
            }
            break;
        case 2:
            header('Content-Type:image/jpeg');
            $image_wp = imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromjpeg($imgsrc);
            imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            //75代表的是质量、压缩图片容量大小
            imagejpeg($image_wp, $imgdst, $quality);
            imagedestroy($image_wp);
            break;
        case 3:
            header('Content-Type:image/png');
            $image_wp = imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefrompng($imgsrc);
            imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            //75代表的是质量、压缩图片容量大小
            imagejpeg($image_wp, $imgdst, $quality);
            imagedestroy($image_wp);
            break;
    }
}