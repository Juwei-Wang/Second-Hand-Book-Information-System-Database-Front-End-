  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form name="find" method="post" action="findac.php">
    <tr>
      <td height="33" background="images/inmenu.jpg" align="center"><font color="#FFFFFF"><strong>搜 索</strong></font></td>
    </tr>
    <tr>
      <td  height="20"></td>
    </tr>
    <tr>
      <td align="center"><font color="#333333">选择类别:
        <select name="bclass">
            <?  //查询出大类
			  $sqlb="select class_name from ershou_class where class_cid='0' ORDER BY class_order asc";
              $resultb=mysql_query($sqlb);
                while($infob=mysql_fetch_array($resultb))
                    { $fclass_name=$infob["class_name"];

					echo '<option value="'.$fclass_name.'">'.$fclass_name.'</option>';
	                  }			
			   ?>			  
        </select></font>        
        </td>
    </tr>
    <tr>
      <td  height="30" align="center"><font color="#333333">关键字:&nbsp;&nbsp;
          <input name='searchcontent' type='text' size="12"></font></td>
    </tr>
    <tr>
      <td  height="30" align="center"><input name='submit1' type='submit' value='搜  索' ></td>
    </tr></form>   
  </table>

