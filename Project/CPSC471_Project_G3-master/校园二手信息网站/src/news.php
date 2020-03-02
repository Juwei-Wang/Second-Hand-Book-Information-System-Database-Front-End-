<?  
 include "admin/config.php";
 include "admin/funcs.php";
 
$nid=$_GET["nid"]; 
			$sqlnews="select * from ershou_news where nid='$nid'";
            $resultnews=mysql_query($sqlnews);
      while($allnews=mysql_fetch_array($resultnews))
           { $nid=$allnews["nid"];
            $news_title=$allnews["news_title"];
	        $news_class=$allnews["news_class"];
			$news_ly=$allnews["news_ly"];
			$news_jishu=$allnews["news_jishu"];
			$news_nr=$allnews["news_nr"];
			$news_time=$allnews["news_time"];

			}
/////////////更新新闻浏览次数			
 $updatecounter="update ershou_news set news_jishu=news_jishu+1 where nid='$nid'";
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
<title><?=$news_title?>   -<?=$web_name?></title>
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
               <td height="25" bgcolor="#DFF1DC">&nbsp;<strong><font color="#09933"><a href="newslist.php">新闻列表</a>--详细内容</font></strong></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>             
             <tr>
               <td  height="35" align="center" ><a class="newstitle"><?=$news_title?></a></td>
             </tr>
			 <tr>
               <td  height="25" align="center">
			   <? echo '<font color="#999999">新闻来源:'.$news_ly.'&nbsp;&nbsp;发布时间:'.$news_time.'&nbsp;&nbsp;浏览次数:'.$news_jishu.'次</font>';
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
			   echo '<font color="#333333">'.$news_nr.'</font>';
			   ?></td>
                 </tr>
                 <tr>
                   <td>&nbsp;</td>
                 </tr>
               </table></td>
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
            <td height="33" align="center" background="images/inmenu.jpg"><strong><font color="#FFFFFF">热门新闻</font></strong></td>
          </tr>		           
			<?
			 $sqln="select * from ershou_news ORDER BY news_jishu desc limit 0,15";
            $resultn=mysql_query($sqln);
      while($alln=mysql_fetch_array($resultn))
           { $nid=$alln["nid"];
            $news_title=$alln["news_title"];	
			echo '<tr><td height="25">&nbsp;·&nbsp;<a href="news.php?nid='.$nid.'" target="_blank"><font color="#333333">'.TrimChinese($news_title,"24").'</font></a></td></tr>'; 
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