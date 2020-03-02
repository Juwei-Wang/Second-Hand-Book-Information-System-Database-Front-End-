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
<title>首页   -<?=$web_name?></title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0">
<table width="780" align="center" border="0" cellspacing="0" cellpadding="0" class="page">
  <tr>
    <td align="center">
	<?php include("header.php"); ?>
	<table width="780" border="0" cellspacing="0" cellpadding="0">
      <tr>
	    <td width="190" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		 	
         
		  <tr>
            <td height="33" background="images/inmenu.jpg" align="center"><strong><font color="#FFFFFF">公&nbsp; 告</font></strong></td>
          </tr>
		   <tr>          </tr>
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
		<td  width="1" bgcolor="#59be48"></td>  
       <td valign="top">
	   <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td bgcolor="#59be48" height="1"></td>
         </tr>
         <tr>
           <td valign="top" >
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td height="25" bgcolor="#DFF1DC">&nbsp;<strong><font color="#09933">新 闻</font></strong></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>
             <?
			 $sqlnews="select * from ershou_news where news_guoqi='1' ORDER BY news_time desc limit 0,10";
            $resultnews=mysql_query($sqlnews);
      while($allnews=mysql_fetch_array($resultnews))
           { $nid=$allnews["nid"];
            $news_title=$allnews["news_title"];
	        $news_class=$allnews["news_class"];
			$news_time=$allnews["news_time"];	
			echo '<tr><td height="25">&nbsp;&nbsp;<font color="#333333">['.$news_class.']</font> <a href="news.php?nid='.$nid.'" target="_blank"><font color="#333333">'.TrimChinese($news_title,"60").'</font></a> <font color="#666666">('.TrimChinese($news_time,"10").')</font></td></tr>'; 
			}?>
             <tr>
               <td  height="15" align="right"><a href="newslist.php"><font color="#59BE48">更多...</font></a>&nbsp;&nbsp;</td>
             </tr>
			 <tr>
               <td height="1" bgcolor="#DFF1DC"></td>
             </tr>
			  <tr>
               <td  height="10"></td>
             </tr>
			<tr>
               <td height="25" bgcolor="#DFF1DC">&nbsp;<strong><font color="#09933">二手信息</font></strong></td>
             </tr>
			 <tr>
               <td valign="top">
	<?  //显示二手信息
	//查询大类的个数
	$sqlcount  = "select  count(*)  count  from  ershou_class where class_cid='0'";  
    $resultcount =  mysql_query($sqlcount)  or  die(mysql_errno().":  ".mysql_error()."\n");  
    $rscount=mysql_fetch_object($resultcount);  
     $bclasscount  =  $rscount->count;  //大的类别的个数
	 $bclassnum=$bclasscount-1;  //作为判断用

/////////////////显示大类列表
	 //查询出来的大类按照后台设置class_order 排序
	  $sqlclass="select * from ershou_class where class_cid='0' ORDER BY class_order asc";  
  $resultclass  =  mysql_query($sqlclass)  or  die(mysql_errno().":  ".mysql_error()."\n");               
   $i=0;//初始化计数，以便按格式进行排列。
  echo '<TABLE align="center"  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#DFF1DC"><TR>'; 
  while($rsclass=mysql_fetch_object($resultclass)){  

   $i++; 
echo '<TD width="50%"  bgcolor="#FFFFFF" align="center" valign="top">';
/////////////////////////////////////显示相关类别的二手信息列表////////////
echo '<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25"><font color="#09933">'.$rsclass->class_name.'</font></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>';
 //根据大类查询  按照添加时间排序
 $bclass=$rsclass->class_name;

 $sqlwupin="select * from ershou_wupin where bclass_name='$bclass' and wupin_guoqi='1' ORDER BY wupin_time asc";  
  $resultwupin  =  mysql_query($sqlwupin)  or  die(mysql_errno().":  ".mysql_error()."\n");
   while($rswupin=mysql_fetch_object($resultwupin)){ 
         $wupin_name=$rswupin->wupin_name; 
	     $wupin_time=$rswupin->wupin_time;		 
		 $date_format=date("y/m/d",strtotime($wupin_time));
		 $wid=$rswupin->wid; 
 echo '<tr><td height="25">&nbsp;&nbsp;<font color="#333333">['.$rswupin->class_name.']</font> <a href="wupin.php?wid='.$wid.'" target="_blank"><font color="#333333">'.TrimChinese($wupin_name,"20").'</font></a> <font color="#666666">('.$date_format.')</font></td>
  </tr>';}
 echo '<tr>
    <td align="right"><a href="wupin_list.php?bcid='.$rsclass->cid.'"><font color="#59BE48">更多...</font></a>&nbsp;&nbsp;</td>
  </tr>
</table>';
///////////////////////////////二手信息列表显示结束/////////////////
echo '</TD> ';
	  if($i%2==0&$i>1)
      {
     echo "</TR>";
        }
	elseif($i%2!=0&$i>$bclassnum){
		echo '<td bgcolor="#FFFFFF">&nbsp;</td>';}
	}		
		echo "</TR>	";
		echo "</TABLE>"; 			   
			   ?>
			   </td>
             </tr>
           </table></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
         </tr>
       </table></td>      
      </tr>  
    </table>
	<?php include("footer.php"); ?>
	</td>
  </tr>  
</table>
</body>
</html>