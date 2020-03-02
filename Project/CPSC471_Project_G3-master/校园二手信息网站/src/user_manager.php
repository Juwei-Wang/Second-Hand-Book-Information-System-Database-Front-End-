<?
#####################////发布二手信息#######//
 include "admin/config.php";
 include "user_session.php"; 
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
<title><?= $_SESSION["user_name"]?>修改资料   -<?=$web_name?></title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0">
<table width="780" align="center" border="0" cellspacing="0" cellpadding="0" class="page">
  <tr>
    <td align="center">
	<?php include("header.php"); ?>
	<table width="780" border="0" cellspacing="0" cellpadding="0">
      <tr>   
		 
       <td valign="top">
	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td bgcolor="#59be48" height="1"></td>
         </tr>
         <tr>
           <td valign="top" >
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td height="25" bgcolor="#DFF1DC">&nbsp;<strong><font color="#09933">
			   <?=$_SESSION["user_name"]?>修改资料</font></strong></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>        
             <tr>
               <td valign="top" align="center">
<?
/////////////////////////////////////////处理编辑内容提交///////////////
if(isset($_POST["user_name"])){
$user_name=$_POST["user_name"];
$user_school=$_POST["user_school"];
$user_phone=$_POST["user_phone"];
$user_mphone=$_POST["user_mphone"];
$user_qq=$_POST["user_qq"];
$user_email=$_POST["user_email"];
$sqlup = "UPDATE ershou_user SET
user_school='$user_school',
user_phone='$user_phone',
user_mphone='$user_mphone',
user_qq='$user_qq',
user_email='$user_email' WHERE user_name='$user_name'";
   if(@mysql_query($sqlup)) { 
    msg("编辑成功!","#ff0000");
	echo '<meta http-equiv ="Refresh" content = "1 ; URL=user_manager.php">';
   } 
   else {
      echo"<p>Error: ".mysql_error()."</p>";
   }

}
////////显示编辑页面
$user_name=$_SESSION["user_name"];
$querye="select * from ershou_user where user_name='$user_name'";
   $resulte=mysql_query($querye);
   while($infoe=mysql_fetch_array($resulte))
   { $uid=$infoe["uid"];
     $user_name=$infoe["user_name"];	 
     $user_school=$infoe["user_school"];
     $user_phone=$infoe["user_phone"];
     $user_mphone=$infoe["user_mphone"];
     $user_qq=$infoe["user_qq"];
     $user_email=$infoe["user_email"];
} 
   echo "<table width='99%' border='0' cellpadding='2' cellspacing='1' bgcolor='#ffffff'>"; 
   echo "<Form name='form' method='post' action=''>";   
   echo '<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center"><a name="t"></a>用户名：</div></td>
      <td colspan="3"><div align="left">
	  <input name="user_name" type="hidden" size="4" maxlength="2" value="'.$user_name.'">
       '.$user_name.' &nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff0000">密码请在<a href="user_repw.php">忘记密码</a>处修改</font>     
        </div></td>
    </tr>
        <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">所在学校或单位：</div></td>
      <td colspan="3"><div align="left">
        <input name="user_school" size="40" maxlength="30" value="'.$user_school.'">
        <font color="#FF0000">*</font></div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">电&nbsp; 话：</div></td>
      <td colspan="3"><div align="left">
        <input maxlength="13" name="user_phone" value="'.$user_phone.'">
        <font color="#FF0000">*</font> <font color="#666666">如：02866666666</font></div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">手&nbsp; 机：</div></td>
      <td colspan="3"><div align="left">
        <input  maxlength="12" name="user_mphone" value="'.$user_mphone.'">
        <font color="#FF0000">*</font><font color="#666666"> 如：13800000000</font></div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">Q&nbsp;&nbsp; Q：</div></td>
      <td colspan="3"><div align="left">
        <input name="user_qq"  maxlength="11" value="'.$user_qq.'">
        &nbsp;</div></td>
    </tr>
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">电子邮箱：</div></td>
      <td colspan="3"><div align="left">
        <input name="user_email"  size="36" maxlength="40" value="'.$user_email.'">
      </div></td>
    </tr>
    <tr valign="center" bgcolor="#f3f3f3">
      <td nowrap align="right" colspan="4" height="38"><div align="center">
        <input type="submit" name="Submit3" value="提 交">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="Submit" value="重 置">
      </div></td>
    </tr>';	
		   echo"</form>";
		   echo "</table>";?>		   
			   
			   </td>
             </tr>
       </table></td> 	        
      <td  width="1" bgcolor="#59be48"></td> 
	  <td width="190" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		 <tr>
            <td height="33" background="images/inmenu.jpg" align="center"><strong><font color="#FFFFFF">公&nbsp; 告</font></strong></td>
          </tr>
		   <tr>
            <td height="150" align="center" valign="top">
			<marquee border="2" align="top" scrollamount="2"  scrolldelay="60" direction="up" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start()" height="150" width="90%"><?=$web_bbs?>
    </marquee></td>
          </tr>		
          <tr>
            <td  valign="top"><? include("find.php");?></td>
          </tr>         
		  <tr>
            <td height="33" align="center" background="images/inmenu.jpg"><strong><font color="#FFFFFF">热门信息</font></strong></td>
          </tr>		           
			<?
			 $sqlwp="select * from ershou_wupin where wupin_guoqi='1' ORDER BY wupin_jishu desc limit 0,15";
            $resultwp=mysql_query($sqlwp);
      while($allwp=mysql_fetch_array($resultwp))
           { $rwid=$allwp["wid"];
            $wupin_name=$allwp["wupin_name"];
	        $wupin_img=$allwp["wupin_img"];	
			echo '<tr><td height="25">&nbsp;·&nbsp;<a href="wupin.php?wid='.$rwid.'" target="_blank"><font color="#333333">'.TrimChinese($wupin_name,"24").'</font></a></td></tr>'; 
			}
			?>
        </table></td>
		</tr>  
    </table>
	<?php include("footer.php"); ?>
	</td>
  </tr>  
</table>
</body>
</html>