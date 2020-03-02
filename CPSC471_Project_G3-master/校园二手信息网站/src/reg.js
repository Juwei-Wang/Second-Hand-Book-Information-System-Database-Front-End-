// JavaScript Document
//检查用户名
function checkdata(){
var str=form.user_name.value;
var SPECIAL_STR = "#~!@%^&*();'\"?><[]{}\\|,:/=+—“”‘";
for(i=0;i<str.length;i++){
if (SPECIAL_STR.indexOf(str.charAt(i)) !=-1)
     {
     alert("用户名不能以含有非法字符("+str.charAt(i)+")！");
     form.user_name.focus();
     return false;
	 }}
if (form.user_name.value=="")
     {
	 alert("请输入您要注册的用户名!");
	 form.user_name.focus();
	 return false;
	 }
if (form.user_name.value.length<2)
    {
     alert("您的用户名必须是由2位以上字符组成!");
	 form.user_name.focus();
	 return false;
	 }
if (form.ac_uthnum.value=="")
     {
	 alert("请输入验证码!");
	 form.ac_uthnum.focus();
	 return false;
	 }
if (isNumberString(form.ac_uthnum.value,"1234567890")!=1||form.ac_uthnum.value.length<4)
    {
     alert("验证码不正确！");
	form.ac_uthnum.focus();
	 return false;
	 }	 		 
//检查密码	 
if (form.user_pass.value=="")
     {
	 alert("密码不能为空!");
	 form.user_pass.focus();
	 return false;
	 }	
if (form.user_pass.value.length<3)
    {
     alert("密码请设置在3位以上!");
	 form.user_pass.focus();
	 return false;
	 }
if (form.user_pass1.value=="")
     {
	 alert("请再输入一次密码!");
	 form.user_pass1.focus();
	 return false;
	 }
var pass_string=document.form.user_pass.value;
var pass_string1=document.form.user_pass1.value;
if(	pass_string!=pass_string1)
     {
	 alert("两次输入的密码不一致！");
	 form.user_pass1.focus();
	 return false;	 
		  }	 
if (form.user_question.value=="")
     {
	 alert("请输入找回密码的提问！");
	 form.user_question.focus();
	 return false;
	 }
if (form.user_angser.value=="")
     {
	 alert("请输入找回密码的答案！");
	 form.user_angser.focus();
	 return false;
	 }	
if (form.user_school.value=="")
     {
	 alert("请输入学校或单位名称!");
	 form.user_school.focus();
	 return false;
	 }
if (form.user_phone.value=="")
    {
     alert("请输入联系电话!");
	 form.user_phone.focus();
	 return false;
	 }
if (isNumberString(form.user_phone.value,"1234567890-")!=1||form.user_phone.value.length<8)
    {
     alert("请准确输入联系电话！");
	form.user_phone.focus();
	 return false;
	 }	 
if(!confirm("是否要提交您的注册信息?"))
{
//如果选择了否就中断操作，并返回
return false;
}
return true;
}
//检查数字
function isNumberString(InString,RefString)
{
if(InString.length==0) return (false);
for (Count=0; Count < InString.length; Count++)  {
	TempChar= InString.substring (Count, Count+1);
	if (RefString.indexOf (TempChar, 0)==-1)  
	return (false);
}
return (true);
}