<?
//验证是否登陆
session_start();
if(!session_is_registered("user_name"))
{
   echo"<meta http-equiv=Refresh content='0 ; url=user_login.php'>";
   exit;
}
?> 