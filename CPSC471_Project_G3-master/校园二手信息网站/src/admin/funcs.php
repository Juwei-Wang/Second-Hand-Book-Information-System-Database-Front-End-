<?
//状态提示
function msg($msg,$msgcolor){
$msg1="<table><tr><td><font color='$msgcolor'>$msg</font></td></tr></table>"; 
echo $msg1;
}

//函数----用于每行只显示设定长度的内容	  
function TrimChinese($str,$len){
$r_str="";
$i=0;
while ($i<$len){
$ch=substr($str,$i,1);
if(ord($ch)>0x80) $i++;
$i++;
}
$r_str=substr($str,0,$i);
return $r_str;
}

//列表
function select_list($select_name,$selected_value,$select_all,$select_num){//函数名定义
     echo '<select name="'.$select_name.'">';//select名定义
     $m=split ('\|',$select_all);  //拆分列表
	 for($i=0;$i<$select_num;$i++){//循环显示列表内容
	 $y=$m[$i];//取得数组内容
	 if($y==""){echo '<option value="'.$m[0].'" selected="selected">'.$m[0].'</option>';}        
	 elseif($y==$selected_value){echo '<option value="'.$y.'" selected="selected">'.$y.'</option>';}
	 else{echo '<option value="'.$y.'">'.$y.'</option>';}
	 } 
	 echo '</select>'; 
	 }

	 
//单选
function radio_list($radio_name,$radio_value,$radio_all,$radio_num){//函数名定义
     $m=split ('\|',$radio_all);  //拆分列表
	 for($i=0;$i<$radio_num;$i++){//循环显示列表内容
	 $y=$m[$i];//取得数组内容
	 $j=$i+1;
	 if($y==""){echo '&nbsp;<input type="radio" name='.$radio_name.' value="'.$m[0].'" checked="checked">';
	 echo $m[0];}        
	 elseif($y==$radio_value){echo '&nbsp;<input type="radio" name='.$radio_name.' value="'.$y.'" checked="checked">';echo $m[$i];}
	 else{echo '&nbsp;<input type="radio" name='.$radio_name.' value="'.$y.'">';
	 echo $m[$i];}
	 }
	 }

//MD5 变换加密

function md5_5($str) 
{   //得到数据的密文
    $str=md5($str); 
    //再把密文字符串的字符顺序调转 
    $str=strrev($str); 
    //最后再进行一次MD5运算并返回 
    return md5($str); 
}
?>