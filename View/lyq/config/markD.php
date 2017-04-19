<?php
header('Content-Type: application/json;charset=UTF-8');

$tdata = $_GET['tdata'];
$number = $_GET['number'];
$name = $_GET['name'];
$detailed = $_GET['detailed'];
$tag = $_GET['tag'];


include('0_config.php'); //包含指定文件的内容在当前位置
$conn = mysqli_connect($db_url, $db_user, $db_pwd, $db_name, $db_port);

//SQL1：设置编码方式
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);

//插入数据
$sql = "INSERT INTO ty_borrowed VALUES(null, '$tdata', '$number', '$name', '$detailed' , '$tag')";
$result = mysqli_query($conn,$sql);
$cid = mysqli_insert_id($conn);



//SQL2：根据uname查询uid
$sql = "SELECT number FROM ty_borrowed WHERE bid='$bid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$number = intval($row['number']);
$output['number'] = $number;

//SQL6：修改数据
$sql = "UPDATE ty_borrowed SET count='$count' WHERE cartId='$cid' AND productId='$pid'";
mysqli_query($conn,$sql);
