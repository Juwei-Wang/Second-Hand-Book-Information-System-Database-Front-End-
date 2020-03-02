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
<title>找回密码   -<?=$web_name?></title>
<link href="css.css" rel="stylesheet" type="text/css">
<script language="javascript">
function checkdata(){
if (form.user_name.value=="")
     {
	 alert("请输入您的用户名!");
	 form.user_name.focus();
	 return false;
	 } 

return(true);
}
</script>
</head>
<body topmargin="0">
<table width="780" align="center" border="0" cellspacing="0" cellpadding="0" class="page">
  <tr>
    <td align="center"><?php include("header.php"); ?>
      <table width="780" border="0" cellspacing="0" cellpadding="0">
	   <td align="center" valign="middle"height="300">

<table width='40%' border='0' cellpadding='2' cellspacing='1' bgcolor='#ffffff'> 
<Form name='form' method='post' action='user_repw1.php'>   
<tr bgcolor="#f3f3f3">
      <td colspan="4"  height="30" align="center">找回密码</td>
      </tr>
<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">用户名：</div></td>
      <td colspan="3"><div align="left">
        <input maxlength="16" size="16" name="user_name">
      </div></td>
    </tr>	  
    
    <tr valign="center" bgcolor="#f3f3f3">
      <td nowrap align="right" colspan="4" height="38"><div align="center">

          <input type="submit" name="Submit3" value="提   交" onClick="return checkdata();">
      </div></td>
    </tr>
		</form>
		  </table></td>
      </tr>  
    </table>
	<?php include("footer.php"); ?>
	</td>
  </tr>  
</table>
</body>
</html>