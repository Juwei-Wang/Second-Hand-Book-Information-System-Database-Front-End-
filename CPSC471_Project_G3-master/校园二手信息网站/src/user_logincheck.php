<?
//登陆审核程序 user_logincheck.php
include "admin/db.php";
include "admin/funcs.php";

//获取新的用户名作为后面的Session变量
   $user_name1=$_POST["user_name"];
   $user_pass2=$_POST["user_pass"];
   $user_name1=trim($user_name1);
   $user_pass2=trim($user_pass2);
   $user_pass1=md5_5($user_pass2);  //用funcs.php md5函数进行加密
   $ac_uthnum=$_POST["ac_uthnum"];
   $user_authnum=$_SESSION["user_authnum"];//取出存在session的随机验证码值

//查询数据库

   $query="select * from ershou_user where user_name='$user_name1'";
   $result=mysql_query($query);   
   while($res=mysql_fetch_object($result))
   {   
      $uid=$res->uid;
	  $user_name2=$res->user_name;
	  $user_pass=$res->user_pass;
	}




 ///////////////////////////////////登陆时不存在的用户////////////////////////////////////
           if($user_name1!=$user_name2)
	         {
                //利用Javascript语言弹出错误信息 
               echo  "<script  language='javascript'>";
               echo   "alert('不存在的用户名！');"; 
               echo  " location='user_login.php';";   
               echo  "</script>";               
               exit();
	           }
			 else{  
		  
 ///////////////////////////////////登陆时密码错误////////////////////////////////////
                   if(($user_name==$user_name1)&&($user_pass!=$user_pass1))
	                 {
                      //利用Javascript语言弹出错误信息 
                       echo  "<script  language='javascript'>";
                       echo   "alert('密码错误！');";   
                       echo  " location='user_login.php';";   
                       echo  "</script>";                       
                       exit();
                       }
					   
///////////////////////////////////登陆时完全匹配、正确登陆/////////////////////// 
		elseif(($user_name==$user_name1)&&($user_pass==$user_pass1))
			 { 
			session_register("user_name"); //注册session变量user_name
			header("Location:index.php");		   
			//登陆日志插入数据库（后面的雷同）
			exit();
			 }	  
			   }//判断用户名是否存在 结束
		
   
?> 