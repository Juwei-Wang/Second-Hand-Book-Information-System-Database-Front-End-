<?

#####################二手信息管理#######

 include "admin/config.php";
 include "user_session.php"; 
 include "admin/funcs.php";
?>
<script language="JavaScript">
function conf()
    {
    return window.confirm("真的要删除吗?");
	}
	</script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<meta http-equiv="Content-Language" content="gb2312">
<meta name="keywords" content="<?=$web_keywords?>">
<meta name="description" content="<?=$web_description?>">
<meta name="author" content="ghj1983@yahoo.com.cn,<?=$web_name?>">
<meta name="Copyright" content="<?=$web_name?>">
<title><? echo $_SESSION["user_name"];?>二手信息管理   -<?=$web_name?></title>
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
			   <? echo $_SESSION["user_name"];?>二手信息管理</font></strong></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>        
             <tr>
               <td valign="top" align="center">
<table width="99%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
</tr> 
<tr><td colspan="3" >     
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <tr align="middle" bgcolor="#f5f5f5"> 
    <td width="10%" align="center" height="25">编 号</td>		           
    <td width="30%" align="center">标 题</td>				   
    <td width="10%" align="center">类 别</td>				   
    <td width="20%" align="center">添加时间</td>	
	<td width="10%" align="center">是否有效</td>
    <td width="10%" align="center">编 辑</td>
    <td width="10%" align="center">删 除</td>
  </tr>
 <? 
 $user_name=$_SESSION["user_name"];
  $sql  = "select  count(*)  count  from  ershou_wupin where user_name='$user_name'";  
  $result  =  mysql_query($sql)  or  die(mysql_errno().":  ".mysql_error()."\n");  
  $rs=mysql_fetch_object($result);  
  $recountCount  =  $rs->count;  
  $show  =  10;  
  $totalPage  =  ceil($recountCount/$show);  
  $page  =  (isset($_GET['page'])  &&  $_GET['page']>=0)?  $_GET['page']:  0;  
  $isLast  =  ($page==($totalPage-1))?  true:  false;  
  $hasNoPre  =  ($page==0)?  true:  false;  
  $hasNoNext  =  ($page==$totalPage-1)?  true:  false;  
  $isFirst  =  ($page==0)?  true:false;  
  $start  =  $page*$show;  
  
   $query="select * from ershou_wupin where user_name='$user_name' ORDER BY wid desc limit $start,10";
   $result=mysql_query($query);
   while($info=mysql_fetch_array($result))
   { 	$wid=$info["wid"];
        $class_name=$info["class_name"]; 
		$wupin_name=$info["wupin_name"]; 
		$wupin_time=$info["wupin_time"]; 
		$wupin_guoqi=$info["wupin_guoqi"]; 
	 echo '<tr align="center" bgcolor="#FFFFFF">
<td width="10%"height="22">
<font color="#575757">'.$wid.'</font></td>
<td width="30%">
<font color="#575757">'.TrimChinese($wupin_name,26).'</font></td>
<td width="10%">
<font color="#575757">'.$class_name.'</font></td>
<td width="20%">
<font color="#575757">'.$wupin_time.'</font></td>
<td width="10%">
<font color="#575757">';
$wupin_guoqi1=($wupin_guoqi=="1")?"有效":"过期"; 
echo $wupin_guoqi1;
echo '</font></td>
<td width="10%"><font color="#575757"><a href="?ac=edit&id='.$wid.'#t" target="_self">编辑</a></font></td>
<td width="10%">';
 echo '<a href="?ac=del&id='.$wid.'" target="_self" onclick="return conf()"><img src="images/del.gif" border="0"></a>';
echo '</td></tr>';
   }
   echo "</table>"; 
   /////翻页
  echo "<table width=100%><tr height=20 align=right><td>";
  $str  = "共 $recountCount 条二手信息，当前第 ".($page+1)."/$totalPage 页&nbsp;";
  $str .= $isFirst?   "首页&nbsp;"   : "<a href=\"?page=0\">首页</a>&nbsp;";
  $str .= $hasNoPre?  "上一页&nbsp;" : "<a href=\"?page=".($page-1)."\">上一页</a>&nbsp;";
  $str .= $hasNoNext? "下一页&nbsp;" : "<a href=\"?page=".($page+1)."\">下一页</a>&nbsp;";
  $str .= $isLast?    "尾页&nbsp;"   : "<a href=\"?page=".($totalPage-1)."\">尾页</a>";
  echo $str;
  echo "</td></tr>";
  echo "</table>";  
?> 
</table>
  </td>
  </tr>   
</table>
<?

///////////////////////////////////编辑内容部分///////////
if($_GET["ac"]=="edit")
{
$wid=$_GET["id"];
$querye="select * from ershou_wupin where wid='$wid'";
   $resulte=mysql_query($querye);
   while($infoe=mysql_fetch_array($resulte))
   { $wid=$infoe["wid"];
     $wupin_name=$infoe["wupin_name"];
	 $class_name=$infoe["class_name"];
	 $wupin_nr=$infoe["wupin_nr"];
     $wupin_img=$infoe["wupin_img"];
	 $user_name=$infoe["user_name"];
	 $wupin_time=$infoe["wupin_time"];
	 $wupin_guoqi=$infoe["wupin_guoqi"];

} 
	msg("编辑二手信息内容","#ff0000");  //显示状态  取funcs.php状态函数
   echo "<table align='center' width='99%' border='0' cellpadding='2' cellspacing='1' bgcolor='#ffffff'>"; 
   echo "<Form name='form' method='post' action='?ac=editin'>";   
   echo '<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center"><a name="t"></a>内容标题：</div></td>
      <td colspan="3"><div align="left">
	  <input name="wid" type="hidden" size="4"  value="'.$wid.'">
        <input maxlength="50" size="50" name="wupin_name" value="'.$wupin_name.'">
      </div></td>
    </tr>	
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">用户名称：</div></td>
      <td colspan="3">';
	  echo '<input maxlength="50" size="20" name="user_name" value="'.$user_name.'" readonly>';
    echo '</td></tr>    
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="200"><div align="center">信息内容：</div></td>
      <td colspan="3"><input type="hidden" name="wupin_nr" value="'.htmlspecialchars($wupin_nr).'">
	  <script type="text/javascript" src="KindEditor.js"></script>
<script type="text/javascript">
var editor = new KindEditor("editor");
editor.hiddenName = "wupin_nr";
editor.uploadMode = "false";
editor.editorType = "simple";
editor.editorWidth = "500px";
editor.editorHeight = "220px";
editor.show();
function KindSubmit() {
	editor.data();
}
</script></td>
    </tr> 
	<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">添加时间：</div></td>
      <td colspan="3">';	  
	  echo $wupin_time.'&nbsp;</td>
    </tr>   
	<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">是否过期：</div></td>
      <td colspan="3">';
	  select_list("wupin_guoqi","$wupin_guoqi","1|0","2");
	  echo '&nbsp;1为有效，0为过期</td>
    </tr>  
    <tr valign="center" bgcolor="#f3f3f3">
      <td nowrap  colspan="4" height="38"><div align="center">
        <input type="submit" name="Submit3" value="提 交" onClick="javascript:KindSubmit();">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="Submit" value="重 置">
      </div></td>
    </tr>';	
		   echo"</form>";
		   echo "</table>";
}
/////////////////////////////////////////处理编辑内容提交///////////////
if($_GET["ac"]=="editin"){
     $wid=$_POST["wid"];
    $wupin_name=$_POST["wupin_name"];
	 $wupin_nr=$_POST["wupin_nr"];
	 $user_name=$_POST["user_name"];
	 $wupin_guoqi=$_POST["wupin_guoqi"];
$sqlup = "UPDATE ershou_wupin SET 
wupin_name='$wupin_name',
wupin_nr='$wupin_nr',
user_name='$user_name',
wupin_guoqi='$wupin_guoqi'
 WHERE wid='$wid'";
   if(@mysql_query($sqlup)) { 
    msg("编辑成功!","#ff0000");
	echo '<meta http-equiv ="Refresh" content = "1 ; URL=wupin_manager.php">';
   } 
   else {
      echo"<p>Error: ".mysql_error()."</p>";
   }

}
//////////////////////////////////////////处理删除内容//////////////
if($_GET["ac"]=="del")
{
$wid=$_GET["id"];
$sqldel = "delete from ershou_wupin WHERE wid='$wid'";
   if(@mysql_query($sqldel)) { 
    msg("删除成功!","#ff0000");
	echo '<meta http-equiv ="Refresh" content = "1 ; URL=wupin_manager.php">';
   } 
   else {
      echo"<p>Error: ".mysql_error()."</p>";
   }
}
?>			   
			   
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
			 $sqlwp="select * from ershou_wupin ORDER BY wupin_jishu desc limit 0,15";
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