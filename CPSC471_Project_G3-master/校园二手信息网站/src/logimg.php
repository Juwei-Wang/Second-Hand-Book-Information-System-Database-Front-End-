<?php 
session_start();

Header("Content-type:image/PNG");

$auth_num=""; //初始化值

$im=imagecreate(40,20); 

srand((double)microtime()*1000000); 

$auth_num=rand(1000,9999);

$user_authnum=$auth_num;

session_register('user_authnum'); 

$black=ImageColorAllocate($im,0,0,0); 

$white=ImageColorAllocate($im,255,255,255); 

$yellow=ImageColorAllocate($im,244,245,244);

$gray=ImageColorAllocate($im,200,200,200); 

Imagefill($im,0,0,$black);

//将四位整数验证码绘入图片

imagestring($im,5,1,3,$auth_num,$yellow); 


for($i=0;$i<50;$i++) //加入干扰象素

{

imagesetpixel($im, rand()%70 , rand()%30 , $yellow);

}
 

ImagePNG($im); 

ImageDestroy($im); 

?> 
