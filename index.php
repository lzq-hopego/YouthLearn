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
?>

<!DOCTYPE html>
<html lang="zh-hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>青年大学习</title>
    <style>
        form{
            margin: auto auto;
            margin-top: 60%;
            text-align: center;
        }
        input{
            width: 80%;
            height: 30px;
            
        }
        .text{
            border-radius: 10px;
            padding-left: 10px;
            color: rgb(189, 186, 186);
            border: 1px solid #adb5f4;
        }
        .text::-webkit-input-placeholder{
            color: rgb(192, 192, 192);
        }
        .buttom{
            margin-top: 30px;
            border-radius: 15px;
            border: 1px solid #f37d17;
            background-color: #e4ba95;
            color: white;
            font-family: "幼圆";
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="./page.php" method="post">
        <input type="text" name="url" id="" class="text" placeholder="输入链接">
        <input type="submit" value="Get √" class="buttom">
        <input type="text" name="model_msg" style='display: none;' value=''>
    </form>
</body>

</html>
