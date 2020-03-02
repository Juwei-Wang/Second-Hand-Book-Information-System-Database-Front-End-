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
if (form.user_angser.value=="")
     {
	 alert("请输入您的答案!");
	 form.user_angser.focus();
	 return false;
	 } 
if (form.user_pass1.value=="")
     {
	 alert("请输入您的新密码!");
	 form.user_pass1.focus();
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
<? 
if($_GET["ac"]!="angser"){
//////////////////////如果没有提交
?>
  <table width='40%' border='0' cellpadding='2' cellspacing='1' bgcolor='#ffffff'> 
  <Form name='form' method='post' action='?ac=angser'>   
  <tr bgcolor="#f3f3f3">
    <td height="30" align="center">找回密码</td>
        </tr>
    <? $user_name1=$_POST["user_name"];//前页提交的用户名
	   $user_name1=trim($user_name); //去掉输入字符串前后的空格
			$sql="select * from ershou_user WHERE user_name='$user_name1'";
		  $result  =  mysql_query($sql)  or  die(mysql_errno().":  ".mysql_error()."\n");  
          $rs=mysql_fetch_object($result); 
		  $user_name=$rs->user_name;
		  if($user_name==""){//数据库不存在此用户
		  echo '<tr bgcolor="#f3f3f3">
      <td height="50" align="center">还没有这个用户！请<a href="javascript:history.back()"><font color="#ff0000">返回重新输入</font></a></td></tr>';}
		  else{
		  echo '<tr bgcolor="#f3f3f3">
      <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提示问题：<font color="#FF0000">'.$rs->user_question.' </font></td></tr>'; 
		  echo '<tr bgcolor="#f3f3f3"><td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请输入答案：
                  <input name="user_angser" type="text"  size="16">
                  </td></tr>';
		echo '<tr bgcolor="#f3f3f3"><td height="30">&nbsp;&nbsp;&nbsp;&nbsp;请输入新密码：
                  <input name="user_pass1" type="text"  size="16">
                  <input name="user_name" type="hidden"  value='.$user_name.'></td></tr>';
		echo '<tr bgcolor="#f3f3f3"><td height="30" align="center"><input type="submit" name="Submit3" value="提   交" onClick="return checkdata();"></td></tr>';} ?>
    </form>
		    </table>
	  <? }
########################//提交了找回密码的答案后验证准确性 正确就修改密码############
if($_GET["ac"]=="angser")
	{?>
  <table width='40%' border='0' cellpadding='2' cellspacing='1' bgcolor='#ffffff'> 
      <? 
		  $user_name1=$_POST["user_name"];//前页隐藏表单提交过来的的当前用户名
		  $user_angser2=$_POST["user_angser"];
		  $user_name1=trim($user_name1);
		  $user_angser2=trim($user_angser2);
		  $user_angser1=md5_5($user_angser2);//填写的答案进行加密  以去和数据库的值对比
		  $user_pass2=$_POST["user_pass1"];//读取新密码
		  $user_pass2=trim($user_pass2);
		  $user_pass1=md5_5($user_pass2);//加密			
	$sql="select * from ershou_user WHERE user_name='$user_name1'";
		  $result  =  mysql_query($sql)  or  die(mysql_errno().":  ".mysql_error()."\n");  
          $rs=mysql_fetch_object($result); 
		  $user_angser=$rs->user_angser;
		  if($user_angser!=$user_angser1){//数据库答案与输入的不相同 就提示
		  echo '<tr bgcolor="#f3f3f3">
      <td height="50" align="center">答案错误！请<a href="user_repw.php"><font color="#ff0000">返回</font></a></td></tr>';
	  echo '<meta http-equiv ="Refresh" content = "2 ; URL=user_repw.php">';}
#################//输入的答案正确和输入了新密码就提交修改的用户密码 
		  elseif($user_angser1==$user_angser)		  
		   {
		    $sqlup="UPDATE ershou_user SET user_pass='$user_pass1' where user_name='$user_name1'";
		      if(@mysql_query($sqlup)) { 
			   echo '<img src="images/success.gif" border="0" />';
                 msg("修改成功，返回登陆","#ff0000");
	           echo '<meta http-equiv ="Refresh" content = "2 ; URL=user_login.php">';
                  } 
              else {
                 echo"<p>Error: ".mysql_error()."</p>";
                   }
			}     
   ?>
    
    </form>
    </table>
	  <? }?> 
	   </td>
        </tr>  
      </table>
	  <?php include("footer.php"); ?>
    </td></tr>  
</table>
</body>
</html>