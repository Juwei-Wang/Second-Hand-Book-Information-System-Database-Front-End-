<?  
 include "admin/config.php";
 include "admin/funcs.php";
 
$wid=$_GET["wid"]; 
		 $sqlwupin="select * from ershou_wupin where wid='$wid' and wupin_guoqi='1'";  
  $resultwupin  =  mysql_query($sqlwupin)  or  die(mysql_errno().":  ".mysql_error()."\n");
   while($rswupin=mysql_fetch_array($resultwupin)){ 
         $wid=$rswupin["wid"];
		 $bclass_name=$rswupin["bclass_name"]; 
         $class_name=$rswupin["class_name"]; 
		 $wupin_name=$rswupin["wupin_name"];
		 $wupin_nr=$rswupin["wupin_nr"]; 		 
		 $wupin_time=$rswupin["wupin_time"]; 
		 $wupin_jishu=$rswupin["wupin_jishu"];		 
		$wupin_guoqi=$rswupin["wupin_guoqi"];
		$user_namewp=$rswupin["user_name"]; }
/////////////更新浏览次数			
 $updatecounter="update ershou_wupin set wupin_jishu=wupin_jishu+1 where wid='$wid'";
  $queryupdate=mysql_query($updatecounter) or die(mysql_errno().":".mysql_error()."\n"); 
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<meta http-equiv="Content-Language" content="gb2312">
<meta name="keywords" content="<?=$web_keywords?>">
<meta name="description" content="<?=$web_description?>">
<meta name="author" content="ghj1983@yahoo.com.cn,<?=$web_name?>">
<meta name="Copyright" content="<?=$web_name?>">
<title><?=$wupin_name?>   -<?=$web_name?></title>
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
			 
               <td height="25" bgcolor="#DFF1DC">&nbsp;<strong><font color="#09933"><?=$bclass_name?>列表--详细内容</font></strong></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>             
             <tr>
               <td  height="35" align="center" ><a class="newstitle"><?=$wupin_name?></a></td>
             </tr>
			 <tr>
               <td  height="25" align="center">
			   <? echo '<font color="#999999">小类:'.$class_name.'&nbsp;&nbsp;发布者：'.$user_namewp.'&nbsp;&nbsp;发布时间:'.$wupin_time.'&nbsp;&nbsp;浏览次数:'.$wupin_jishu.'次</font>';
			   ?></td>
             </tr>	
			 <tr>
               <td height="1" bgcolor="#DFF1DC"></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>	
			  <tr>
               <td  valign="top" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="newsnr"> <?			   
			   echo '<font color="#333333">'.$wupin_nr.'</font>';
			   ?></td>
                 </tr>
				<tr>
                   <td height="20">&nbsp;</td>
                 </tr> 
				  <tr>
               <td height="1" bgcolor="#DFF1DC"></td>
             </tr>
				  <tr>
                   <td class="newsnr"> <?	
if(session_is_registered("user_name")) 
{	
	   		   
	echo '<font color="#333333">&nbsp;&nbsp;';
##################################///根据发布信息的用户名查询出联系方式
   $querye="select * from ershou_user where user_name='$user_namewp'";
   $resulte=mysql_query($querye);
   while($infoe=mysql_fetch_array($resulte))
   { $uid=$infoe["uid"];     
     $user_school=$infoe["user_school"];
     $user_phone=$infoe["user_phone"];
     $user_mphone=$infoe["user_mphone"];
     $user_qq=$infoe["user_qq"];
     $user_email=$infoe["user_email"];
    } 	
   if($user_phone!=""){
	echo '联系电话:'.$user_phone.'&nbsp;&nbsp;';
	} 
	if($user_mphone!=""){
	echo '手机号码:'.$user_mphone.'&nbsp;&nbsp;';
	}  
	 if($user_qq!=""){
	 echo 'QQ号码 :'.$user_qq.'&nbsp;&nbsp;'; 
	 }
	 if($user_email!=""){
	 echo '电子邮件:'.$user_email.'&nbsp;&nbsp;'; 
	 }
			   echo '</font>';
}
else{
echo '<div  align="center"><br><font color="#666666">&nbsp;&nbsp;您还没有登陆，请</font><a href="user_login.php">登陆</a><font color="#666666">查看联系方式</font></div>';
}			   
			   ?></td>
                 </tr>
                 <tr>
                   <td valign="top"><br>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#f3f3f3" height="25"><font color="#666666"><strong>&nbsp;用户评论</strong></font></td>
  </tr>
  <?
//////////////显示留言评论
 $sqlpl="select * from ershou_pinglun where pinglun_wid='$wid'";  
  $resultpl =mysql_query($sqlpl)  or  die(mysql_errno().":  ".mysql_error()."\n");
   while($rspl=mysql_fetch_array($resultpl))
    { 
         $pinglun_wid=$rspl["pinglun_wid"];
		 $user_namepl=$rspl["user_name"]; 
         $pinglun_nr=$rspl["pinglun_nr"]; 
		 $pinglun_time=$rspl["pinglun_time"];
     
	 echo '<tr><td height="30"><font color="#666666">'.$user_namepl.'说：</font></td></tr>';  
	 echo '<tr><td><font color="#666666">&nbsp;&nbsp;&nbsp;&nbsp;';
	   echo $pinglun_nr;
	  echo '</font></td></tr>'; 
	  echo '<tr><td height="10"></td></tr>'; 
	  echo '<tr><td height="1" bgcolor="#f3f3f3"></td></tr>';   }
?>	
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></td>
                 </tr>
               </table></td>
             </tr>				
        
       </table>
		   <table align="center" width="98%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td height="25" colspan="2" bgcolor="#f3f3f3"><font color="#666666"><strong>&nbsp;我要评论</strong></font></td>
             </tr>  
		<form name="ly" action="wupin.php?wid=<?=$wid?>" method="post">	 
			 <tr>
               <td width="15%" align="center" height="30"><font color="#666666">用户名</font>：&nbsp; </td>
               <td><input maxlength="10" size="16" name="pluser_name" value="<? echo $_SESSION["user_name"];?>" readonly>  <!--自动生成当前的登陆用户作为评论用户名-->
   <?
if(session_is_registered("user_name")){
  if($_POST["pinglun_nr"]!="")
  {
      $pluser_name=$_POST["pluser_name"];  
      $pinglun_nr=$_POST["pinglun_nr"]; 
      $pinglun_wid=$wid;
  $sqlin = "INSERT INTO ershou_pinglun SET pinglun_wid='$pinglun_wid',user_name='$pluser_name',pinglun_nr='$pinglun_nr',pinglun_time=NOW()";
   if(@mysql_query($sqlin)) { 
    msg("增加成功!","#ff0000");
	echo '<meta http-equiv ="Refresh" content = "1 ; URL=wupin.php?wid='.$wid.'">';
                             } 
   else {
      echo"<p>Error: ".mysql_error()."</p>";
          }
   } 
 }
else{
    msg("请登陆参加评论","#ff0000");  //判断是否登陆，没登陆不能评论
   }
?>			   </td>
			 </tr>          
             <tr>
               <td align="center" valign="top"><font color="#666666">内&nbsp; 容：</font>&nbsp;<br><font color="#666666">(限100字以内)</font></td>
               <td><input type="hidden" name="pinglun_nr" value="">
	   <script type="text/javascript" src="KindEditor.js"></script>
<script type="text/javascript">
var editor = new KindEditor("editor");
editor.hiddenName = "pinglun_nr";
editor.uploadMode = "false";
editor.editorType = "simple";
editor.editorWidth = "450px";
editor.editorHeight = "150px";
editor.show();
function KindSubmit() {
	editor.data();
}
</script></td>
             </tr>
	 <tr><td height="35">&nbsp;</td>
          <td align="center"><input type="submit" name="Submit" value="提交" onClick="javascript:KindSubmit();">
           &nbsp;&nbsp; &nbsp; <input type="reset" name="Submit2" value="重置"></td>
	 </tr>		 
	</form>		 
           </table>
		   <br></td> 	        
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