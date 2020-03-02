<HTML><HEAD><TITLE>用户名检查</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<STYLE type=text/css>
td {	
	font-size: 12px;
}
a:link {color:#000000; text-decoration:none}
a:visited {color:#000000; text-decoration:blink}
a:hover{color:#FF6600; text-decoration: underline}
p {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
}
href {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
}
.style1 {color: #FF0000}
</style>
<script language="JavaScript"> 
function closeme() 
{setTimeout("self.close()",10000)} 
</script> 
</head>
<body bgcolor="#ffffff"  leftmargin="0" topmargin="0" onLoad="closeme()">
<table width="500" height="200"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/df.gif"><TABLE width=324 height=136 border=0 cellPadding=0 cellSpacing=0>
      <TBODY>
        <TR>
          <TD height=19 colspan="3" align=middle><div align="center"><strong></strong></div></TD>
        </TR>
        <TR>
          <TD width=14% height=69 rowspan="2" align=middle><font size=2 face="华文楷体">
            <P align=left>&nbsp;&nbsp;&nbsp;</P>
          </FONT>
            </TD>
          <TD width=71% height="40" align=middle><?
include("admin/db.php");
$user_name=$_POST["user_name"];
$sql_cx="select * from ershou_user where user_name='$user_name'";
$result_cx=mysql_query($sql_cx);
$num=mysql_num_rows($result_cx);
if($num<>0){

         echo "用户名 ".$user_name." 已经被占用，请重新输入！";
}
else
{
echo "恭喜你,你可以用此用户名注册！";
}
?>            </TD>
          <TD width=15% rowspan="2" align=middle>&nbsp;</TD>
        </TR>
        <TR>
          <TD height="29" align=middle class="style1">本窗口10秒后自动关闭，点击<a href="javascript:window.close()">这里立即关闭</a></TD>
        </TR>
        <TR>
          <TD height=48 colspan="3" align=middle onclick=javascript:parent.window.close()>
            <P align=center>&nbsp;</P></TD>
        </TR>
      </TBODY>
    </TABLE></td>
  </tr>
</table>
</BODY></HTML>
