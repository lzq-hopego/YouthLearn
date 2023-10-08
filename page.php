
<?php

/*
 * @作者: lizhanqi lzq-hopego
 * @Date: 2023-08-09 19:47:41
 * @文件最后编辑者: lizhanqi lzq-hopego
 */

// 使用微信的ua进行判断平台，如果不是微信则返回一句话
$ua = $_SERVER['HTTP_USER_AGENT'];
if(strpos($ua,'Weixin') ==false){
    echo "<title>警告</title><h1 style='text-align:center;color:red;'>请使用微信访问!</h1>";
    exit;
}
#获取post的信息
$q = $_POST["url"];
#对post的信息进行初步校验，不正确则返回到上一个网页
if(strpos($q,'h5.cyol.com') ==false){
    echo "<script type='text/javascript'>history.go(-1)</script>";
    exit;
}
// 获取青年大学习的标题,有两种返回值,一种是False一种是数组,数组则带有标题和完成图
function geturl($url){
    $panduan=strstr($url,"https://h5.cyol.com/special/daxuexi/");
    if ($panduan==False){
        return False;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    preg_match("/<title>(.*)<\/title>/",$output,$t);
    $img_url=str_replace("m.html","images/end.jpg",$url);
    $ls=array($t[1],$img_url);
    return $ls;
}

// 判断返回值,如何为False则返回上一个网页
$arr=geturl($q);
if ($arr==False){
    echo "<script type='text/javascript'>history.go(-1)</script>";
    exit;
}
// 获取数据
$title=$arr[0];
$img_url=$arr[1];
?>


<!DOCTYPE html>
<html lang="zh-hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title ?>
    </title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        img{
            position: absolute;
            width: 100%;
            height: 100%;
            size: auto 100%;
            margin: 0;
        }
    </style>
</head>
<body>
    <img src="<?php echo $img_url ?>">
</body>
</html>
