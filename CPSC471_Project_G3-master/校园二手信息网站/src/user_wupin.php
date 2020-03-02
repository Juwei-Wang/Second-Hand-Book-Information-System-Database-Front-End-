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
<title><?= $_SESSION["user_name"]?>发布二手信息   -<?=$web_name?></title>
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
			   <?=$_SESSION["user_name"]?>发布二手信息</font></strong></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>        
             <tr>
               <td valign="top" align="center">
<?
/////////////////////////////////////////处理内容提交///////////////
if(($_GET["ac"]=="in")&&(isset($_POST["wupin_name"]))){

   $wupin_name=$_POST["wupin_name"];
	 $sid=$_POST["sid"];
	 $wupin_nr=$_POST["wupin_nr"];
	 $user_name=$_POST["user_name"];
	 $wupin_guoqi=$_POST["wupin_guoqi"];
	 
////////////////////////////////////////根据选择的小类号查询所属大类的id号和此id号对应的小类名称
            $sqlbclass="select * from ershou_class  where cid='$sid'";
              $resultbclass=mysql_query($sqlbclass);
                while($infobclass=mysql_fetch_array($resultbclass))
                    { $class_cid=$infobclass["class_cid"];
					  $sclass_name=$infobclass["class_name"];}	
					
////////////////根据大类的id号	查询出大类名称								
       $sqlbclass1="select * from ershou_class  where cid='$class_cid'";
              $resultbclass1=mysql_query($sqlbclass1);
                while($infobclass1=mysql_fetch_array($resultbclass1))
                    { $bclass_name=$infobclass1["class_name"];}		
//////////////////////////////////////	
	 
$sqlup = "INSERT INTO ershou_wupin SET 
bclass_name='$bclass_name',
wupin_name='$wupin_name',
class_name='$sclass_name',
wupin_nr='$wupin_nr',
user_name='$user_name',
wupin_guoqi='$wupin_guoqi',
wupin_time=NOW()";
   if(@mysql_query($sqlup)) { 
    msg("增加成功!","#ff0000");
	echo '<meta http-equiv ="Refresh" content = "1 ; URL=wupin_manager.php">';
   } 
   else {
      echo"<p>Error: ".mysql_error()."</p>";
   }

}?>	

   <table align="center" width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#ffffff">    <Form name="form" method="post" action="?ac=in">   
   <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">内容标题：</div></td>
      <td colspan="3"><div align="left">
	  <input  type="hidden" name="user_name"  value="<?=$_SESSION["user_name"]?>">	 
        <input maxlength="50" size="50" name="wupin_name">
      </div></td>
    </tr>
	<tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="30"><div align="center">信息类别：</div></td>
      <td colspan="3"><div align="left">
        <select name="sid">
            <?  //查询出大类
			  $sqlb="select * from ershou_class where class_cid!=0  ORDER BY class_order asc";
              $resultb=mysql_query($sqlb);
                while($infob=mysql_fetch_array($resultb))
                    { $fclass_name=$infob["class_name"];
					  $cid=$infob["cid"];					
					echo '<option value="'.$cid.'">'.$fclass_name.'</option>';								
					
	                  }			
			   ?>
          </select>
		  
      </div></td>
    </tr>   
    <tr bgcolor="#f3f3f3">
      <td nowrap align="right" height="200"><div align="center">信息内容：</div></td>
      <td colspan="3"><input type="hidden" name="wupin_nr" value="">
	   <script type="text/javascript" src="KindEditor.js"></script>
<script type="text/javascript">
var editor = new KindEditor("editor");
editor.hiddenName = "wupin_nr";
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
      <td nowrap align="right" height="30"><div align="center">是否过期：</div></td>
      <td colspan="3"><?  select_list("wupin_guoqi","1","1|0","2");?>
	  &nbsp;1为有效，0为过期</td>
    </tr>  
    <tr valign="center" bgcolor="#f3f3f3">
      <td nowrap  colspan="4" height="38"><div align="center">
        <input type="submit" name="Submit3" value="提 交" onClick="javascript:KindSubmit();">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="Submit" value="重 置">
      </div></td>
    </tr>
		   </form>
		   </table>		   
			   
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