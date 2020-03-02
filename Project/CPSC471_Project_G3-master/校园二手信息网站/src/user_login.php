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
<title>用户登陆   -<?=$web_name?></title>
<link href="css.css" rel="stylesheet" type="text/css">
<script language=javascript>
<!--

function CheckForm()
{
	if(document.Login.user_name.value=="")
	{
		alert("请输入用户名！");
		document.Login.user_name.focus();
		return false;
	}
	if(document.Login.user_pass.value == "")
	{
		alert("请输入密码！");
		document.Login.user_pass.focus();
		return false;
	}
	if(document.Login.ac_uthnum.value == "")
	{
		alert("请输入验证码！");
		document.Login.ac_uthnum.focus();
		return false;
	}		
}
//-->
</script>
</head>
<body topmargin="0">
<table width="780" align="center" border="0" cellspacing="0" cellpadding="0" class="page">
  <tr>
    <td align="center">
	<?php include("header.php"); ?>
	<table width="780" border="0" cellspacing="0" cellpadding="0">
	   <td align="center" valign="middle"height="300">

<table width='40%' border='0' cellpadding='2' cellspacing='1' bgcolor='#ffffff'> 
<Form name='Login' method='post' action='user_logincheck.php' onSubmit="return CheckForm();">   
<tr bgcolor="#f3f3f3">
      <td colspan="4"  height="30" align="center">会员登陆</td>
      </tr>
<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center"><a name="t"></a>用户名：</div></td>
      <td colspan="3"><div align="left">
        <input maxlength="16" size="16" name="user_name">
      </div></td>
    </tr>	  
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">密&nbsp; 码：</div></td>
      <td colspan="3"><div align="left">
        <input type="password" maxlength="16" size="16"  name="user_pass">
      </div></td>
    
    <tr valign="center" bgcolor="#f3f3f3">
      <td nowrap align="right" colspan="4" height="38"><div align="center">
        <input type="submit" name="Submit3" value="提 交">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="Submit" value="重 置">
      </div></td>
    </tr>
		</form>
		  </table>
</td>
      </tr>  
    </table>
	<?php include("footer.php"); ?>
	</td>
  </tr>  
</table>
</body>
</html>