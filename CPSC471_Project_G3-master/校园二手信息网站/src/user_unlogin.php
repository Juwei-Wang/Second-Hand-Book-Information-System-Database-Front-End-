<?  
 include "admin/config.php";
 include "admin/funcs.php";
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<meta http-equiv="Content-Language" content="gb2312">
<meta name="keywords" content="<?=$web_keywords?>">
<meta name="description" content="<?=$web_description?>">
<meta name="author" content="ghj1983@yahoo.com.cn,<?=$web_name?>">
<meta name="Copyright" content="<?=$web_name?>">
<title>会员退出登陆   -<?=$web_name?></title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0">
<table width="780" align="center" border="0" cellspacing="0" cellpadding="0" class="page">
  <tr>
    <td align="center">
	<?php include("header.php"); ?>
	<table width="780" border="0" cellspacing="0" cellpadding="0">
	   <td align="center" valign="middle"height="300">
	   <?
//注销该用户 user_unlogin.php
 session_start();
 session_unregister("user_name");
 session_destroy();
   //返回前页
   echo '<table width="100%" border="0" cellPadding="0" cellSpacing="0">
          <tr>
            <td height="300" align="center"><img src="images/success.gif" border="0" />已成功退出，点击<a href="javascript:history.back()">返回</a>
			  </td>
          </tr>
         </table>'
?>
<meta http-equiv ="Refresh" content = "1 ; URL=user_login.php">
</td>
      </tr>  
    </table>
	<?php include("footer.php"); ?>
	</td>
  </tr>  
</table>
</body>
</html>