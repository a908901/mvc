<?php
header('Content-Type: application/json;charset=UTF-8');

$tdata = $_GET['tdata'];
$number = $_GET['number'];
$name = $_GET['name'];
$detailed = $_GET['detailed'];
$tag = $_GET['tag'];

echo $tdata;
echo $number;
echo $name;
echo $detailed;
echo $tag;



include('0_config.php'); //包含指定文件的内容在当前位置
$conn = mysqli_connect($db_url, $db_user, $db_pwd, $db_name, $db_port);

//SQL1：设置编码方式
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);


