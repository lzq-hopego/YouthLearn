<?php
/*
 * @作者: lizhanqi lzq-hopego
 * @Date: 2023-08-09 19:47:41
 * @文件最后编辑者: lizhanqi lzq-hopego
 */
$username=$_GET['user'];
$password=$_GET['pwd'];
$servername = "localhost";

// $username = "root";
// $password = "f99f0db9bae05159";
 
// 创建连接
$conn = new mysqli($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
// 创建数据库
$sql = "CREATE DATABASE qn_learn";
if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功！";
} else {
    // echo "Error creating database: " . $conn->error;
    echo "您已经完成了安装数据库的操作！";
}
 
$conn->close();

?>



<?php
$servername = "localhost";
// $username = "root";
// $password = "f99f0db9bae05159";
$dbname = "qn_learn";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
// 使用 sql 创建数据表


$sql = "CREATE TABLE `qn_learn_list`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `add_time` datetime(6) NOT NULL,
  `add_name` text NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;";
 
if ($conn->query($sql) === TRUE) {
    echo "创建数据表成功！";
    $myfile =fopen("settings.php","w") or die("保存配置失败，请联系开发者3101978435@qq.com");
    $txt='<?php
$servername = "localhost";
$username="'.$username.'";
$password="'.$password.'";
$dbname = "qn_learn";
?>';
    fwrite($myfile , $txt);
    fclose($myfile);
} else {
    // echo "创建数据表错误: " . $conn->error;
    echo "您已经完成了安装数据表的操作！";
}
 
$conn->close();
?>