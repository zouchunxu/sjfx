<?php
/**
 * @param $msg  要提示的消息
 * @param string $url  要跳转到的url
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View 返回跳转师徒
 */
function showMsg($msg,$url=''){
    $url = empty($url) ? '/' : $url;
    return view('public/msg',['jumpUrl'=>$url,'jumpMsg'=>$msg]);
}
