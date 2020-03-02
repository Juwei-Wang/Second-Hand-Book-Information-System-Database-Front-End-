<?
######MySQL数据库信息######
$DBhost = "localhost";          //主机名
$DBuser = "root";           //用户名
$DBpass = "";           //密码
$DBname = "ershou";      //数据库名
mysql_connect($DBhost,$DBuser,$DBpass) or die("无法连接到数据库！");
mysql_select_db ($DBname);
?>