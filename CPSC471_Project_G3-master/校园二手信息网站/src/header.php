<table cellSpacing="0" cellPadding="0" width="780" align="center" border="0">
    <tr> 
      <td height="25" width="360">&nbsp;<FONT color="RED"><B>今天是：</B></FONT>
	  <FONT color="#505050"><script src="admin/date.js" type="text/javascript"></script></FONT></td>
      <td align="right" >
<? 
if(session_is_registered("user_name")) //是否注册了用户SESSION值
  {
  echo '<a href="wupin_manager.php">管理信息</a>&nbsp;<a href="user_manager.php">修改资料</a>&nbsp;<a href="user_unlogin.php">退出登陆</a>&nbsp;<a href="user_wupin.php"><FONT color="RED">发布信息</FONT></a>';
   }    
else
{echo '<a href="user_login.php">登陆</a><font color="#009933">/</font><a href="user_reg.php">注册</a>&nbsp;<a href="user_repw.php">忘记密码</a>&nbsp;<a href="user_wupin.php"><FONT color="RED">发布信息</FONT></a>';
}
?>&nbsp;</td>
    </tr>
    <tr> 
      <td height="1" align=middle bgcolor="#59BE48" colspan="2"></td>
    </tr>
</table>
<table width="780" border="0" align="center" cellPadding="0" cellSpacing="0" height="77">
    <tr > 
      <td width="191" align="center"><a href=index.php><img border="0" src="<?=$web_logo?>" width="165" height="60"></a></td>
      <td  align="center">
	
		<img border="0" src="images/banner.gif" width="468" height="60"></td>
    </tr>
</table>
<table cellSpacing="0" cellPadding="0" width="780" align="center" border="0">
    <tr>
      <td height="28" align="middle" background="images/t1.gif">
	  <table class="header" width="100%" border="0" cellPadding="0" cellSpacing="0">
          <tr>
            <td align="center">
			  <div align="left">&nbsp;<a href="index.php"><font color="#FFFFFF">本站首页</font></a><font color="#FFFFFF"> | </font>
			  <?
			  $query="select * from ershou_class where class_cid='0' ORDER BY class_order asc limit 0,8";
              $result=mysql_query($query);
               while($bclass=mysql_fetch_array($result))
                       { $cid=$bclass["cid"];
                         $class_name=$bclass["class_name"];
				echo '<a href="wupin_list.php?bcid='.$cid.'">
			  <font color="#FFFFFF">'.$class_name.'</font></a><font color="#FFFFFF"> | </font>'; 
	                    }
			  ?>			  
	           </div></td>
          </tr>
      </table></td>
    </tr>
<tr>
<td height="2">
</td>
</tr>	
</table>

