
<?php

include ("settings.php");


/*
 * @作者: lizhanqi lzq-hopego
 * @Date: 2023-08-09 19:47:41
 * @文件最后编辑者: lizhanqi lzq-hopego
 */
$ua = $_SERVER['HTTP_USER_AGENT'];
if(strpos($ua,'Weixin') ==false){
    echo "<title>警告</title><h1 style='text-align:center;color:red;'>请使用微信访问!</h1>";
    exit;
}
$q = $_POST["url"];

if(strpos($q,'h5.cyol.com') ==false){
    echo "<script type='text/javascript'>history.go(-1)</script>";
    exit;
}


function get_url_title($q){
    if ($q != ''){
    @$handle = fopen ($q, "rb"); 
    $contents = ""; 
    do { 
    @$data = fread($handle, 1024); 
    if (strlen($data) == 0) { 
    break; 
    } 
    $contents .= $data; 
    
    } while(true); 
    @fclose ($handle); 
    }
    $title=explode('</',explode('title>',$contents)[1])[0];
    if ($title==''){
        $title='';
    }
    $img_url=str_replace("m.html","images/end.jpg",$q);
    return array($title,$img_url);
}
function get_ip($q){
    if ($q != ''){
    @$handle = fopen ($q, "rb"); 
    $contents = ""; 
    do { 
    @$data = fread($handle, 1024); 
    if (strlen($data) == 0) { 
    break; 
    } 
    $contents .= $data; 
    
    } while(true); 
    @fclose ($handle); 
    }
    // $title=explode('</',explode('title>',$contents)[1])[0];
    $d=json_decode($contents, true);
    // if ($title==''){
    //     $title='';
    // }
    // $img_url=str_replace("m.html","images/end.jpg",$q);
    // echo $contents;
    return $d['area'];
}
$arr=get_url_title($q);
$title=$arr[0];
$img_url=$arr[1];

$ip=$_SERVER['REMOTE_ADDR'].' - '.get_ip('http://api.ip33.com/ip/search?s='.$_SERVER['REMOTE_ADDR']);

?>

<?php


// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "INSERT INTO qn_learn_list (ip, url,title,add_time,add_name)
VALUES ('".$ip."', '".$q."', '".$title."','".date('Y-m-d H:i:s')."','".$ua."')";
 
if (mysqli_query($conn, $sql)) {
   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);



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