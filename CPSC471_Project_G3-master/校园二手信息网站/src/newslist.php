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
<title>新闻列表   -<?=$web_name?></title>
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
               <td height="25" bgcolor="#DFF1DC">&nbsp;<strong><font color="#09933">新闻列表</font></strong></td>
             </tr>
			 <tr>
               <td height="10"></td>
             </tr>
             <?
	
  $sql  =  'select  count(*)  count  from  ershou_news where news_guoqi="1"';  
  $result  =  mysql_query($sql)  or  die(mysql_errno().":  ".mysql_error()."\n");  
  $rs=mysql_fetch_object($result);  
  $recountCount  =  $rs->count;  
  $show  =  20;  
  $totalPage  =  ceil($recountCount/$show);  
  $page  =  (isset($_GET['page'])  &&  $_GET['page']>=0)?  $_GET['page']:  0;  
  $isLast  =  ($page==($totalPage-1))?  true:  false;  
  $hasNoPre  =  ($page==0)?  true:  false;  
  $hasNoNext  =  ($page==$totalPage-1)?  true:  false;  
  $isFirst  =  ($page==0)?  true:false;  
  $start  =  $page*$show; 
  	 
			 
			 $sqlnews="select * from ershou_news where news_guoqi='1' ORDER BY news_time desc limit $start,20";
            $resultnews=mysql_query($sqlnews);
      while($allnews=mysql_fetch_array($resultnews))
           { $nid=$allnews["nid"];
            $news_title=$allnews["news_title"];
	        $news_class=$allnews["news_class"];
			$news_time=$allnews["news_time"];	
			echo '<tr><td height="25">&nbsp;&nbsp;<font color="#333333">['.$news_class.']</font> <a href="news.php?nid='.$nid.'" target="_blank"><font color="#333333">'.TrimChinese($news_title,"60").'</font></a> <font color="#666666">('.TrimChinese($news_time,"10").')</font></td></tr>'; 
			}?>
             <tr>
               <td  height="15" align="right">&nbsp;</td>
             </tr>
			 <tr>
               <td height="1" bgcolor="#DFF1DC"></td>
             </tr>
			  <tr>
               <td  height="25">
			   <?
			    /////翻页
  echo "<table width=100%><tr height=20 align=right><td>";
  $str  = "<font color='#333333'>共 $recountCount 条新闻，当前第 ".($page+1)."/$totalPage 页</font>&nbsp;";
  $str .= $isFirst?   "首页&nbsp;"   : "<a href=\"?page=0\"><font color='#333333'>首页</font></a>&nbsp;";
  $str .= $hasNoPre?  "上一页&nbsp;" : "<a href=\"?page=".($page-1)."\"><font color='#333333'>上一页</font></a>&nbsp;";
  $str .= $hasNoNext? "下一页&nbsp;" : "<a href=\"?page=".($page+1)."\"><font color='#333333'>下一页</font></a>&nbsp;";
  $str .= $isLast?    "尾页&nbsp;"   : "<a href=\"?page=".($totalPage-1)."\"><font color='#333333'>尾页</font></a>";
  echo $str;
  echo "</td></tr>";
  echo "</table>";  
			    ?></td>
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