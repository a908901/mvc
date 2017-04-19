<?php
header('Content-Type: application/json;charset=UTF-8');

$number = $_GET['number'];
$name = $_GET['name'];
$usee = $_GET['usee'];
$ldate = $_GET['ldate'];
$department = $_GET['department'];
$username = $_GET['username'];
$resource = $_GET['resource'];

include('0_config.php'); //包含指定文件的内容在当前位置
$conn = mysqli_connect($db_url, $db_user, $db_pwd, $db_name, $db_port);

//SQL1：设置编码方式
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);

//插入数据
$sql = "INSERT INTO ty_property VALUES(null, '$number', '$name', '$usee', '$ldate' , '$department', '$username', '$resource')";
$result = mysqli_query($conn,$sql);
$cid = mysqli_insert_id($conn);
