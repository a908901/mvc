<?php
//处理登录操作
$uname=$_GET['username'];
$upwd=$_GET['password'];
//连接
$link=mysqli_connect('localhost','root','root');
//设置字符集
mysqli_set_charset($link,'utf8');
//打开指定的数据库
mysqli_select_db($link,'ty');
//执行SQL语句
$sql="SELECT * FROM ty_user WHERE uname='{$uname}' AND upwd='{$upwd}'";
$result=mysqli_query($link,$sql);
$res=mysqli_num_rows($result);
if($res){
	echo '登录成功';
	//echo "<meta http-equiv='refresh' content='3;url=../01.html'/>";
}else{
	echo '登录失败';
	//echo "<meta http-equiv='refresh' content='3;url=../02.html'/>";
}

