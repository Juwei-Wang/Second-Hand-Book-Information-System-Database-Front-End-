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
<title>用户注册   -<?=$web_name?></title>
<link href="css.css" rel="stylesheet" type="text/css">
<SCRIPT language="javascript" src="reg.js"></SCRIPT>
<script language="JavaScript">	
function sub(){
var str=form.user_name.value;
var SPECIAL_STR = "#~!@%^&*();'\"?><[]{}\\|,:/=+—“”‘";
for(i=0;i<str.length;i++)
if (SPECIAL_STR.indexOf(str.charAt(i)) !=-1)
     {
     alert("用户名不能以含有非法字符("+str.charAt(i)+")！");
     form.user_name.focus();
     return false;
	 }
if (form.user_name.value=="")
     {
	 alert("请输入您的用户名!");
	 form.user_name.focus();
	 return false;
	 }
if (form.user_name.value.length<2)
    {
     alert("您的用户名必须是由2位以上字符组成!");
	 form.user_name.focus();
	 return false;
	 }
$user_name=form.user_name.value;
url="check_username.php?user_name="+document.form.user_name.value ;
window.open (url, "_blank", "width=500,height=200,top=100,left=200,resizable=0,scrollbars=0");
return false;
	 }	
</script>
</head>
<body topmargin="0">
<table width="780" align="center" border="0" cellspacing="0" cellpadding="0" class="page">
  <tr>
    <td align="center">
	<?php include("header.php"); ?>
	<table width="780" border="0" cellspacing="0" cellpadding="0">
	   <td align="center" valign="top">
<? 
if(!isset($_POST["user_name"])){ //不存在这个变量则显示注册界面
?>	   
<table width='100%' border='0' cellpadding='2' cellspacing='1' bgcolor='#ffffff'> 
<Form name='form' method='post' action='user_reg.php?ac=in'>   
<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center"><a name="t"></a>用户名：</div></td>
      <td colspan="3"><div align="left">
        <input maxlength="16" size="16" name="user_name">
        <input type="submit" name="Submit2" value="检查用户名" onClick="return sub();">
        <font color="#FF0000">*</font> <font color="#666666">2-16 字符</font></div></td>
    </tr>
	<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">验证码：</div></td>
      <td colspan="3"><div align="left">
        <input maxlength="4" size="6"  name="ac_uthnum">
        <img src="logimg.php" height="20" width="40" border="0"><font color="#FF0000">*</font> </div></td>
    </tr>   
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">密&nbsp; 码：</div></td>
      <td colspan="3"><div align="left">
        <input type="password" maxlength="16" size="16"  name="user_pass">
        <font color="#FF0000">*</font> <font color="#666666">3-16 字符</font></div></td>
    </tr> 
	<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">重输密码：</div></td>
      <td colspan="3"><div align="left">
        <input type="password" maxlength="16" size="16"  name="user_pass1">
        <font color="#FF0000">*</font> <font color="#666666">3-16 字符</font></div></td>
    </tr>     
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">自设问题：</div></td>
      <td colspan="3"><div align="left">
        <input  name="user_question"  size="30" maxlength="25">
        <font color="#FF0000">*</font> <font color="#666666">（请准确填写,注册后不能修改）用于找回密码。比如：“最喜欢的地方？”</font></div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">自设答案：</div></td>
      <td colspan="3"><div align="left">
        <input name="user_angser"  size="30" maxlength="25">
        <font color="#FF0000">*</font> <font color="#666666">（请准确填写,注册后不能修改）用于找回密码。比如：“桂林”。请牢记答案！</font> </div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">所在学校或单位：</div></td>
      <td colspan="3"><div align="left">
        <input name="user_school" size="40" maxlength="30">
        <font color="#FF0000">*</font></div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">电&nbsp; 话：</div></td>
      <td colspan="3"><div align="left">
       
        <font color="#FF0000">
        <label>
      <input  maxlength="12" name="user_phone">
        </label>
        *</font> <font color="#666666">如：02866666666</font></div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">手&nbsp; 机：</div></td>
      <td colspan="3"><div align="left">
        <input  maxlength="12" name="user_mphone">
        <font color="#FF0000">*</font><font color="#666666"> 如：13800000000</font></div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">Q&nbsp;&nbsp; Q：</div></td>
      <td colspan="3"><div align="left">
        <input name="user_qq"  maxlength="11">
        &nbsp;</div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">电子邮箱：</div></td>
      <td colspan="4"><div align="left">
        <input name="user_email"  size="36" maxlength="40">
        <label></label>
      </div></td>
    </tr>
    <tr valign="center" bgcolor="#f3f3f3">
      <td nowrap align="right" colspan="4" height="38"><div align="center">
        <input type="submit" name="Submit3" value="提 交" onClick="return checkdata();">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="Submit" value="重 置">
      </div></td>
    </tr>
		</form>
		  </table>
<? }
if(($_GET["ac"]=="in")and(isset($_POST["user_name"])))//值存在则继续执行
{ 
   if($_POST["ac_uthnum"]==$_SESSION["user_authnum"])//判断验证码是否正确
      {
	   $user_name=$_POST["user_name"];
	   $user_name=trim($user_name);
	   $user_pass1=$_POST["user_pass"];
	   $user_pass1=trim($user_pass1);
	   $user_pass=md5_5($user_pass1);//密码进行MD5加密
	   $user_question=$_POST["user_question"];
	   $user_angser1=$_POST["user_angser"];
	   $user_angser1=trim($user_angser1);
	   $user_angser=md5_5($user_angser1);//密码进行MD5加密
	   $user_school=$_POST["user_school"];
	   $user_phone=$_POST["user_phone"];
	   $user_mphone=$_POST["user_mphone"];
	   $user_qq=$_POST["user_qq"];
	   $user_email=$_POST["user_email"];
	   $user_kt="1";
//////查询是否存在当前注册用户名
 $query="select count(*) count from ershou_user where user_name='$user_name'";
 $result=mysql_query($query);
 while($info=mysql_fetch_array($result))
       { $count=$info["count"]; }
      if($count==0){//不存在才执行注册	   
///////////////////////////////
	   $sqladd = "INSERT INTO ershou_user SET user_name='$user_name',
	   user_pass='$user_pass',
	   user_question='$user_question',
	   user_angser='$user_angser',
	   user_school='$user_school',
	   user_phone='$user_phone',
	   user_mphone='$user_mphone',
	   user_qq='$user_qq',
	   user_email='$user_email',
	   user_kt='$user_kt',
	   user_date=NOW()";
       if(@mysql_query($sqladd)) { 
		 echo '<table width="100%" border="0" cellPadding="0" cellSpacing="0">
          <tr>
            <td height="300" align="center"><img src="images/success.gif" border="0" />会员注册成功，登陆页面！
			  </td>
          </tr>
         </table>';	   
	     echo '<meta http-equiv ="Refresh" content = "3; URL=user_login.php">';
           } 
       else {
          echo"<p>Error: ".mysql_error()."</p>";
            }
	   }
	 else{//存在相同用户名则重新填写
	 echo '<table width="100%" border="0" cellPadding="0" cellSpacing="0">
          <tr>
            <td height="300" align="center"><img src="images/warning.gif" border="0" />&nbsp;该会员已存在  <a href="javascript:history.back()">返回</a>重新填写
			  </td>
          </tr>
         </table>';}  	
	  }
	else{
	echo '<table width="100%" border="0" cellPadding="0" cellSpacing="0">
          <tr>
            <td height="300" align="center"><img src="images/warning.gif" border="0" />&nbsp;验证码错误！  <a href="javascript:history.back()">返回</a>
			  </td>
          </tr>
         </table>';}  
 }
?>	   </td>
      </tr>  
    </table>
	<?php include("footer.php"); ?>
	</td>
  </tr>  
</table>
</body>
</html>