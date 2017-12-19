<?php
if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class whn_xd{
	
	public function a(){//------------------------------------------------------------------------------------------------------------------------------------------------实验

			return "ok";
		
	}
public function get_pluginvar($plugin,$key){//------------------------------------------------------------------------------------------------------------------------------------------------获取插件变量
$array1= DB::fetch_all("SELECT * FROM ".DB::table('common_plugin')."   WHERE    identifier='".$plugin."'")[0];
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_pluginvar')."   WHERE    pluginid=".$array1[pluginid]."    AND   variable='".$key."'")[0];
	return $array[value];	
	}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------数据库类
	public function datadase_create(){//-----------------------------------------------------------------------------------创建数据库
			$a=DB::query("CREATE TABLE pre_xd_demand(
	`yid` int(11) NOT NULL,`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
		
	}
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------total
public  function  dzh($uid,$ty){//----------------------------------------地址函数   参数：$uid用户uid，$ty文件类型
switch ($ty){
case 'shp':
return './wjx/'.$uid.'/shp';
break;
case 'y':
return './wjx/'.$uid.'/y';
break;
case 't':
return './wjx/'.$uid.'/t';
break;
case 't1':
return './wjx/'.$uid.'/t1';
break;
case 't2':
return './wjx/'.$uid.'/t2';
break;
case 'y':
return './wjxa/y';
break;
case 'hdp':
return './wjx/'.$uid.'/hdp';
break;
case 'mp':
return './wjx/'.$uid.'/mp';
break;
default:
//echo '<script language="JavaScript">alert("'.lang('plugin/xd', 'mp58').'");</script>';	
break;
}
}


public  function  shangchuant1(array $_G,array $file,$key){//----------------------------------------上传图片1     参数：array $_G,array $file,$key 文件指针
//echo '<script language="JavaScript">alert("'.$file['tmp_name'][$key].'");</script>';
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/jpeg');
$max_size='10000000000';      // 最大文件限制（单位：byte）
$upfile=$this->dzh($_G[uid],'t');  //图片目录路径
   if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
     if(!is_uploaded_file($file['tmp_name'][$key])){ //判断上传文件是否存在
    echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
  if($file['size'][$key]>$max_size){  //判断文件大小是否大于500000字节
     echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!in_array($file['type'][$key],$arrType)){  //判断图片文件的格式
     echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }
  if(!file_exists($upfile)){  // 判断存放文件目录是否存在
   mkdir($upfile,0777,true);
   } 


      $imageSize=getimagesize($file['tmp_name'][$key]);
   $img=$imageSize[0].'*'.$imageSize[1];
$c=strrev($file['name'][$key]);
$ftype=explode('.',$c); 
$ftype=strrev($ftype[0]);
   if($ftype=="PNG"){$ftype="png";}
 if($ftype=="JPG"){$ftype="jpg";}
$fname=$_G['timestamp'].'-'.$_G['uid'].$key.'.'.$ftype;
   $picName=$upfile.'/'.$fname;

   if(file_exists($picName)){
    echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd14').'</div>';
    exit;
     }
   if(!move_uploaded_file($file['tmp_name'][$key],$picName)){  
    echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd15').'</div>';
   
    }
   else{ 	 echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd16').'</div>';   }
      }
$path=$this->dzh($_G[uid],'t1').'/'.$fname; 
        list($width,$height) = getimagesize($picName);//获取原图像尺寸的宽度与高度
$c1=501111;//设定的图片长宽像素积
if($width*$height>=$c1){$c=$width/$height; $c=$c1/$c;$_height=sqrt($c);$_width=$c1/$_height;$_height=round($_height);$_width=round($_width); 
}else{$_height=$width;$_width=$height;}
        $_img = imagecreatetruecolor($_width,$_height);//为新图像创建一个画布
 if($ftype=="png"){ $img = imagecreatefrompng($picName);}
else if($ftype=="jpg"){ $img = imagecreatefromjpeg($picName);}
else if($ftype=="gif"){ $img = imagecreatefromgif($picName);}
else if($ftype=="jpeg"){ $img = imagecreatefromjpeg($picName);}
else if($ftype=="wbmp"){ $img = imagecreatefromwbmp($picName);}
imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
//imagecopy($_img,$img, 0, 0, $_width,$_height,$width,$height); 
        imagejpeg($_img,$path,0, 100);
 imagepng($_img,$path,0, 100);
        ImageDestroy( $_img);  
$path=$this->dzh($_G[uid],'t2').'/'.$fname; 
      
      

  list($width,$height) = getimagesize($picName);//获取原图像尺寸的宽度与高度
if($width>$height){
$wh=($width-$height)/2;
$wh1=$height;
$_img = imagecreatetruecolor($wh1,$wh1);//为新图像创建一个画布
imagecopy($_img,$img,0,0,$wh,0,$wh1,$wh1); 
   // imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}else{
$wh=($height-$width)/2;
$wh1=$width;
$_img = imagecreatetruecolor($wh1,$wh1);//为新图像创建一个画布
imagecopy($_img,$img,0,0,0,$wh,$wh1,$wh1); //复制无法调节尺寸，可剪切
//imagecopyresized($_img,$img,0,0,0,0,$wh1,$wh1,$width,$height);//复制可调节尺寸，不可剪切
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(200,200);//为新图像创建一个画布
  imagecopyresized($_img1,$_img,0,0,0,0,200,200,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path,0, 100);
       imagepng($_img1,$path,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
        ImageDestroy($img);  
//$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x9='".$fname."' WHERE yid=".$name);
return  $fname;
}



public  function  shangchuant(array $_G,array $file,$name){//----------------------------------------上传图片(视频预览图)     参数：array $_G,array $file,$name
//echo '<script language="JavaScript">alert("'.$file['tmp_name'].'");</script>';
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/jpeg');
$max_size='10000000000';      // 最大文件限制（单位：byte）
$upfile=$this->dzh($_G[uid],'t');  //图片目录路径
   if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
     if(!is_uploaded_file($file['tmp_name'])){ //判断上传文件是否存在
    echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
  if($file['size']>$max_size){  //判断文件大小是否大于500000字节
     echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!in_array($file['type'],$arrType)){  //判断图片文件的格式
     echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }
  if(!file_exists($upfile)){  // 判断存放文件目录是否存在
   mkdir($upfile,0777,true);
   } 


      $imageSize=getimagesize($file['tmp_name']);
   $img=$imageSize[0].'*'.$imageSize[1];
$c=strrev($file['name']);
$ftype=explode('.',$c); 
$ftype=strrev($ftype[0]);
   if($ftype=="PNG"){$ftype="png";}
 if($ftype=="JPG"){$ftype="jpg";}
$fname=$_G['timestamp'].'-'.$_G['uid'].'.'.$ftype;
   $picName=$upfile.'/'.$fname;

   if(file_exists($picName)){
    echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd14').'</div>';
    exit;
     }
   if(!move_uploaded_file($file['tmp_name'],$picName)){  
    echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd15').'</div>';
   
    }
   else{ 	 echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd16').'</div>';   }
      }
$path=$this->dzh($_G[uid],'t1').'/'.$fname; 
        list($width,$height) = getimagesize($picName);//获取原图像尺寸的宽度与高度
$c1=501111;//设定的图片长宽像素积
if($width*$height>=$c1){$c=$width/$height; $c=$c1/$c;$_height=sqrt($c);$_width=$c1/$_height;$_height=round($_height);$_width=round($_width); 
}else{$_height=$width;$_width=$height;}
        $_img = imagecreatetruecolor($_width,$_height);//为新图像创建一个画布
 if($ftype=="png"){ $img = imagecreatefrompng($picName);}
else if($ftype=="jpg"){ $img = imagecreatefromjpeg($picName);}
else if($ftype=="gif"){ $img = imagecreatefromgif($picName);}
else if($ftype=="jpeg"){ $img = imagecreatefromjpeg($picName);}
else if($ftype=="wbmp"){ $img = imagecreatefromwbmp($picName);}
imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
//imagecopy($_img,$img, 0, 0, $_width,$_height,$width,$height); 
        imagejpeg($_img,$path,0, 100);
 imagepng($_img,$path,0, 100);
        ImageDestroy( $_img);  
$path=$this->dzh($_G[uid],'t2').'/'.$fname; 
      
      

  list($width,$height) = getimagesize($picName);//获取原图像尺寸的宽度与高度
if($width>$height){
$wh=($width-$height)/2;
$wh1=$height;
$_img = imagecreatetruecolor($wh1,$wh1);//为新图像创建一个画布
imagecopy($_img,$img,0,0,$wh,0,$wh1,$wh1); 
   // imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}else{
$wh=($height-$width)/2;
$wh1=$width;
$_img = imagecreatetruecolor($wh1,$wh1);//为新图像创建一个画布
imagecopy($_img,$img,0,0,0,$wh,$wh1,$wh1); //复制无法调节尺寸，可剪切
//imagecopyresized($_img,$img,0,0,0,0,$wh1,$wh1,$width,$height);//复制可调节尺寸，不可剪切
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(200,200);//为新图像创建一个画布
  imagecopyresized($_img1,$_img,0,0,0,0,200,200,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path,0, 100);
       imagepng($_img1,$path,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
        ImageDestroy($img);  
//$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x9='".$fname."' WHERE yid=".$name);
return  $fname;
}




public function total_shangchuanwz($dizhi_b,$dizhi_b1){//----------------------------------------------------------------------------------上传文字；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1,）
echo   '
<form id="wz1" action="'.$dizhi_b.'" method="post"     accept-charset="utf-8">
  <input name="upfilewz" id="upfilewz" type="hidden"  />
</form>

<script language="javascript" type="text/javascript">
function wz(){
var  a=document.getElementById("wz").value;
if(a==""){alert("输入不可为空！");}else{
document.getElementById("upfilewz").value=document.getElementById("wz").value;
document.getElementById("wz1").submit();
}
 }
</script>
';
}

public function total_shangchuant($dizhi_b,$dizhi_b1){//----------------------------------------------------------------------------------上传图片；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1,）
echo   '
<form id="t1" action="'.$dizhi_b.'" method="post" enctype="multipart/form-data">
  <input name="upfilet" id="upfilet" type="file"  accept="image/*;capture=camera"     style="display:none"  onchange="t1()"/>

</form>

<script language="javascript" type="text/javascript">
function t(){
var upfile=document.getElementById("upfilet");
upfile.click();
 }
function t1(){
var a1=document.getElementById("t1");
a1.submit();
 }
</script>
';
}
public function total_shangchuany($dizhi_b,$dizhi_b1){//----------------------------------------------------------------------------------上传音乐；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1,）
echo   '
<form id="yy1" action="'.$dizhi_b.'" method="post" enctype="multipart/form-data">
  <input name="upfiley" id="upfiley" type="file"   style="display:none"  onchange="y1()"/>
</form>
<script language="javascript" type="text/javascript">
function y(){
alert("语音不可超过60分钟！");
var upfile=document.getElementById("upfiley");
upfile.click();
 }
function y1(){
var a1=document.getElementById("yy1");
a1.submit();
 }
</script>
';
}
public function total_shangchuanshp($dizhi_b,$dizhi_b1){//----------------------------------------------------------------------------------上传视频；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1,）
echo   '
<form id="shpp1" action="'.$dizhi_b.'" method="post" enctype="multipart/form-data">
  <input name="upfileshp" id="upfileshp" type="file"   accept="video/*;capture=camcorder"    style="display:none"  onchange="shp1()"/>
</form>
<script language="javascript" type="text/javascript">
function shp(){
alert("视频不可超过30分钟！");
var upfile=document.getElementById("upfileshp");
upfile.click();
 }
function shp1(){
var a1=document.getElementById("shpp1");
a1.submit();
 }
</script>
';
}
public function total_shangchuanw($dizhi_b,$dizhi_b1){//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1,）
echo   '
<form id="a1" action="'.$dizhi_b.'" method="post" enctype="multipart/form-data">
  <input name="upfile" id="upfile" type="file"   style="display:none"  onchange="b(this)"/>
<script language="javascript" type="text/javascript">
function a(){
alert("语音不可超过60分钟！");
var upfile=document.getElementById("upfile");
upfile.click();
 }
function b(){
var a1=document.getElementById("a1");
a1.submit();
 }
</script>
';
}


public function total_ajax2_shx($name,$url,$before,$after,$post,$send){//----------------------------------------------------------------------------------ajax模块2(基本模块_用于刷新)；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
if(empty($name)||$name==''){$name='ajax(a)';}
if($post==1){$post='"POST"';}else{$post='"GET"';}
if(empty($send)||$send==''){$send='null';}
echo   '
<script language="javascript" type="text/javascript">
function '.$name.'
{
'.$before.'
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 
var url='.$url.';
xmlHttp.onreadystatechange=function (){ if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ var resp=xmlHttp.responseText;
'.$after.'
}}
xmlHttp.open('.$post.',url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
xmlHttp.send('.$send.');
} 
</script>
';
}
public function total_ajax2($name,$url,$before,$after,$post,$send){//----------------------------------------------------------------------------------ajax模块2(基本模块)；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
if(empty($name)||$name==''){$name='ajax(a)';}
if($post==1){$post='"POST"';}else{$post='"GET"';}
if(empty($send)||$send==''){$send='null';}
echo   '
<script language="javascript" type="text/javascript">
function '.$name.'
{
document.getElementById("dengdai").style.display="block";
'.$before.'
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 
var url='.$url.';
xmlHttp.onreadystatechange=function (){ if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ var resp=xmlHttp.responseText;
document.getElementById("dengdai").style.display="none";
'.$after.'
}}
xmlHttp.open('.$post.',url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
xmlHttp.send('.$send.');
} 
</script>
';
}


public function total_ajax3($name,$url,$before,$after,$post,$send){//----------------------------------------------------------------------------------ajax模块1(覆盖)；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
if(empty($name)||$name==''){$name='ajax(a)';}
if($post==1){$post='"POST"';}else{$post='GET';}
if(empty($send)||$send==''){$send='null';}
echo   '
<script language="javascript" type="text/javascript">
function '.$name.'
{
document.getElementById("dengdai").style.display="block";
'.$before.'
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 
var url='.$url.';
xmlHttp.onreadystatechange=function (){ if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ var resp=xmlHttp.responseText;if(a==0){var resp1="";}else{var resp1=document.getElementById("msg").innerHTML;} document.getElementById("msg").innerHTML=resp+resp1;
document.getElementById("dengdai").style.display="none";
'.$after.'
}}
xmlHttp.open('.$post.',url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
xmlHttp.send('.$send.');
} 
</script>
';
}	

public function total_ajax1($name,$url,$before,$after,$post,$send){//----------------------------------------------------------------------------------ajax模块1(覆盖)；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
if(empty($name)||$name==''){$name='ajax(a)';}
if($post==1){$post='"POST"';}else{$post='GET';}
if(empty($send)||$send==''){$send='null';}
echo   '
<script language="javascript" type="text/javascript">
function '.$name.'
{
document.getElementById("dengdai").style.display="block";
'.$before.'
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 
var url='.$url.';
xmlHttp.onreadystatechange=function (){ if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ var resp=xmlHttp.responseText;if(a==0){var resp1="";}else{var resp1=document.getElementById("msg").innerHTML;} document.getElementById("msg").innerHTML=resp1+resp;
document.getElementById("dengdai").style.display="none";
'.$after.'
}}
xmlHttp.open('.$post.',url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
xmlHttp.send('.$send.');
} 
</script>
';
}

public function total_ajax0($name,$url,$before,$after,$post,$send){//----------------------------------------------------------------------------------ajax模块1(覆盖)；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
if(empty($name)||$name==''){$name='ajax(a)';}
if($post==1){$post='"POST"';}else{$post='GET';}
if(empty($send)||$send==''){$send='null';}
echo   '
<script language="javascript" type="text/javascript">
function '.$name.'
{
document.getElementById("dengdai").style.display="block";
'.$before.'

if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 
var url='.$url.';
xmlHttp.onreadystatechange=function (){ if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ var resp=xmlHttp.responseText;document.getElementById("msg").innerHTML=resp;
document.getElementById("dengdai").style.display="none";
'.$after.'
}}
xmlHttp.open('.$post.',url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
xmlHttp.send('.$send.');
} 
</script>
';
}

public function total_start2($title,$keywords,$description,$head){//-----------------------------------------------------------------------------------html文件主体开头1   $title,$keywords,$description,$head
echo  '
<!DOCTYPE html>
<html lang="en">
<head>
<title>'.$title.'</title>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="'.$title.'">
        <meta name="keywords" content="'.$title.'">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="source/plugin/xd/xd_js-css/date.css">
<link rel="stylesheet" type="text/css" href="source/plugin/xd/xd_js-css/xd.css">
</head>
<style type="text/css">
html,body{margin:0;padding:0;background:#F0F0F0}
.funbar{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:100%;position:fixed;top:0px;background:#17314c;}
.submit{text-align:center;font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:100%;margin-bottom:8px}
.listbar{font-size:20px;height:60px;line-height:60px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:1px solid #D0D0D0;width:100%;margin-bottom:8px}
.listbar1{font-size:20px;height:40px;line-height:40px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:1px solid #5B5B5B;width:100%;margin-bottom:8px}
.search{font-size:20px;height:60px;line-height:60px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:1px solid #D0D0D0;width:100%}
.kuang{text-align:center;font-size:20px;height:60px;line-height:60px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border:1px solid #FF2D2D;margin-bottom:8px}
.columnbar{}
a{ text-decoration:none}
</style>
</head>
<body>
';
	}
	
public function total_start1($title,$keywords,$description,$head,$background){//-----------------------------------------------------------------------------------html文件主体开头1   $title,$keywords,$description,$head,$background
if(empty($background)){$background='#F0F0F0';}
echo  '
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,initial-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>'.$title.'</title>
<meta name="keywords" content="'.$keywords.'">
<meta name="description" content="'.$description.'">
'.$head.'
<link rel="stylesheet" href="source/plugin/xd/static/css/style.css">
<link rel="stylesheet" href="source/plugin/xd/static/css/idangerous.swiper.css">
<link rel="stylesheet" href="source/plugin/xd/static/css/animation.css">
<link rel="stylesheet" href="/source/plugin/whn_pinfang/static/css/mobiscroll.custom-2.16.1.min.css">

<script src="source/plugin/xd/xd_js-css/jquery.js" type="text/javascript"></script>
<script src="source/plugin/xd/static/js/jquery-1.9.1.min.js"></script>
<script src="source/plugin/xd/static/js/fastclick.js"></script>
<script src="source/plugin/xd/static/js/rem.js"></script>
<script src="source/plugin/xd/static/js/idangerous.swiper.min.js"></script>
<script src="source/plugin/xd/static/js/appbyme.js"></script>
<script src="source/plugin/xd/static/js/jquery.form.js"></script>
<script src="source/plugin/xd/static/js/jquery.cookie.js"></script>
<script src="source/plugin/xd/static/js/jquery.similar.msgbox.js"></script>
<script src="source/plugin/xd/static/js/common.js"></script>
<script src="/source/plugin/whn_pinfang/static/js/mobiscroll.custom-2.16.1.min.js"></script>
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=x2wdWWgqQ3iqSmYIKWk2xozRIj6TRNpZ">
 <script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script  src="mobcent/app/web/js/appbyme/sq-3.0.0.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/library/CityList/1.2/src/CityList_min.js"></script>
	<script type="text/JavaScript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js" charset="UTF-8"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />  
<style>
.color,.fixed_nav ul li.on,.fixed1_nav ul li.on,.fixed_nav ul li.on a,.fixed1_nav ul li.on a,.agree_off,.pay_money_list ul li.on .integral,.AddPayList ul li.on{color:#0080FF}
.banner .swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet-active,.add_submit_off,.bg,#datetitle,#dateheader,#dateconfirm,#mb_btn_ok{background:#0080FF;color:#fff}
.pay_money_list ul li.on,.new_fn_info_tit,.fn_nav ul li.on a{color:#0080FF;border-color:#0080FF;}
.BorDerColor{border-color:#0080FF}
</style>
<style type="text/css">
html,body{margin:0;padding:0;background:'.$background.'}
.font1{font-size:20px;height:40px;line-height:36px;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;filter:alpha(opacity=100);opacity: 1;margin-left:1px;margin-right:1px}
.funbar2{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #F0F0F0;width:100%;position:fixed;z-index:5;top:0px;background:#E0E0E0;}
.funbar3{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:0px solid #F0F0F0;width:100%;background:#9D9D9D;}
.funbar{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:0px solid #F0F0F0;width:100%;position:fixed;z-index:9;top:0px;background:#4F4F4F;}
.funbar1{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:0px solid #D0D0D0;width:100%;position:fixed;z-index:5;top:0px;background:#17314c;}
.submit{text-align:center;font-size:20px;height:40px;line-height:40px;background:#4F4F4F;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:96%;margin-bottom:8px;margin-left:2%;;margin-right:2%}
.submit1{text-align:center;font-size:20px;height:40px;line-height:40px;background:#d41d3c;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:96%;margin-bottom:8px;margin-left:2%;;margin-right:2%}
.submit2{text-align:center;font-size:20px;height:60px;line-height:60px;background:#d41d3c;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:96%;margin-bottom:8px;margin-left:2%;;margin-right:2%}
.submit3{text-align:center;font-size:20px;height:40px;line-height:40px;background:#d41d3c;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;}
.listbar{font-size:15px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;margin-bottom:8px;margin-left:1px;margin-right:1px;border-radius:5px;padding:3px}
.listbar0{font-size:15px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;margin-bottom:8px;margin-left:1px;margin-right:1px;padding:3px}
.listbar1{height:60px;font-size:20px;background:#FCFCFC;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;margin-bottom:8px;margin-left:1px;margin-right:1px;border-radius:5px;padding:3px;line-height:60px}
.input{width:90%;margin-left:5%;font-size:20px;border:0px solid #D0D0D0;border-bottom:1px solid #D0D0D0;background:#FCFCFC}
.fenybar{font-size:20px;height:40px;line-height:40px;background:white;margin:0 0 0px 0;color:#d41d3c;margin-left:23px;margin-right:23px;border-radius:18px}
a{ text-decoration:none}
.city{font-size:15px;width:80%;color:#5B5B5B;border-radius:18px;border:0.2px solid #F0F0F0;padding:0px;height:37px}
.leibie{width:95%;height:36px;color:#5B5B5B;border-radius:20px;background:#d41d3c}
.leibie1{width:95%;height:36px;color:#5B5B5B;border-radius:20px;border:1px solid #d41d3c}
.space{height:60px;color:#F0F0F0}
.space1{height:130px;color:#F0F0F0}
.prompt{display:block;height:30px;line-height:30px;width:70%;margin-left:15%;color:#E0E0E0}
#msg{}
.msg{background:#F0F0F0}
.yxz{background:#d41d3c;color:white;font-size:20px}
.xz{background:#93FF93;color:white;font-size:20px}
.btn-audio{
    float:right;
margin:15px;
    width:30px;
    height:30px;
    
}
.btn-audio1{
    border:1px solid #7B7B7B;border-radius:10px;height:60px;line-height:60px;background:#FCFCFC
}
@font-face {
  font-family: \'iconfont\';
  src: url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.eot\');
  src: url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.eot?#iefix\') format(\'embedded-opentype\'),
  url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.woff\') format(\'woff\'),
  url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.ttf\') format(\'truetype\'),
  url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.svg#iconfont\') format(\'svg\');
}
.list, .list li {
list-style:none; 
padding:0; 
margin:0; 
}
.list li { 
float:left; 
}
</style>
<body>
';
	}
	
public function total_start($title,$keywords,$description,$head){//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,initial-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>'.$title.'</title>
<meta name="keywords" content="'.$keywords.'">
<meta name="description" content="'.$description.'">
'.$head.'
<link rel="stylesheet" href="source/plugin/xd/static/css/style.css">
<link rel="stylesheet" href="source/plugin/xd/static/css/idangerous.swiper.css">
<link rel="stylesheet" href="source/plugin/xd/static/css/animation.css">
<link rel="stylesheet" href="/source/plugin/whn_pinfang/static/css/mobiscroll.custom-2.16.1.min.css">

<script src="source/plugin/xd/xd_js-css/jquery.js" type="text/javascript"></script>
<script src="source/plugin/xd/static/js/jquery-1.9.1.min.js"></script>
<script src="source/plugin/xd/static/js/fastclick.js"></script>
<script src="source/plugin/xd/static/js/rem.js"></script>
<script src="source/plugin/xd/static/js/idangerous.swiper.min.js"></script>
<script src="source/plugin/xd/static/js/appbyme.js"></script>
<script src="source/plugin/xd/static/js/jquery.form.js"></script>
<script src="source/plugin/xd/static/js/jquery.cookie.js"></script>
<script src="source/plugin/xd/static/js/jquery.similar.msgbox.js"></script>
<script src="source/plugin/xd/static/js/common.js"></script>
<script src="/source/plugin/whn_pinfang/static/js/mobiscroll.custom-2.16.1.min.js"></script>
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=x2wdWWgqQ3iqSmYIKWk2xozRIj6TRNpZ">
 <script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script  src="mobcent/app/web/js/appbyme/sq-3.0.0.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/library/CityList/1.2/src/CityList_min.js"></script>
	<script type="text/JavaScript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js" charset="UTF-8"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />  
<style>
.color,.fixed_nav ul li.on,.fixed1_nav ul li.on,.fixed_nav ul li.on a,.fixed1_nav ul li.on a,.agree_off,.pay_money_list ul li.on .integral,.AddPayList ul li.on{color:#0080FF}
.banner .swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet-active,.add_submit_off,.bg,#datetitle,#dateheader,#dateconfirm,#mb_btn_ok{background:#0080FF;color:#fff}
.pay_money_list ul li.on,.new_fn_info_tit,.fn_nav ul li.on a{color:#0080FF;border-color:#0080FF;}
.BorDerColor{border-color:#0080FF}
</style>
<style type="text/css">
html,body{margin:0;padding:0;background:#F0F0F0}
.font1{font-size:20px;height:40px;line-height:36px;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;filter:alpha(opacity=100);opacity: 1;margin-left:1px;margin-right:1px}
.funbar2{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #F0F0F0;width:100%;position:fixed;z-index:5;top:0px;background:#E0E0E0;}
.funbar3{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:0px solid #F0F0F0;width:100%;background:#9D9D9D;}
.funbar{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:0px solid #F0F0F0;width:100%;position:fixed;z-index:9;top:0px;background:#4F4F4F;}
.funbar1{font-size:20px;height:60px;line-height:60px;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:0px solid #D0D0D0;width:100%;position:fixed;z-index:5;top:0px;background:#17314c;}
.submit{text-align:center;font-size:20px;height:40px;line-height:40px;background:#4F4F4F;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:96%;margin-bottom:8px;margin-left:2%;;margin-right:2%}
.submit1{text-align:center;font-size:20px;height:40px;line-height:40px;background:#d41d3c;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:96%;margin-bottom:8px;margin-left:2%;;margin-right:2%}
.submit2{text-align:center;font-size:20px;height:60px;line-height:60px;background:#d41d3c;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;width:96%;margin-bottom:8px;margin-left:2%;;margin-right:2%}
.submit3{text-align:center;font-size:20px;height:40px;line-height:40px;background:#d41d3c;margin:0 0 0px 0;color:white;overflow:hidden;border-bottom:1px solid #D0D0D0;}
.listbar{font-size:15px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;margin-bottom:8px;margin-left:1px;margin-right:1px;border-radius:5px;padding:3px}
.listbar0{font-size:15px;background:white;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;margin-bottom:8px;margin-left:1px;margin-right:1px;padding:3px}
.listbar1{height:60px;font-size:20px;background:#FCFCFC;margin:0 0 0px 0;color:black;overflow:hidden;border-bottom:0px solid #D0D0D0;margin-bottom:8px;margin-left:1px;margin-right:1px;border-radius:5px;padding:3px;line-height:60px}
.input{width:90%;margin-left:5%;font-size:20px;border:0px solid #D0D0D0;border-bottom:1px solid #D0D0D0;background:#FCFCFC}
.fenybar{font-size:20px;height:40px;line-height:40px;background:white;margin:0 0 0px 0;color:#d41d3c;margin-left:23px;margin-right:23px;border-radius:18px}
a{ text-decoration:none}
.city{font-size:15px;width:80%;color:#5B5B5B;border-radius:18px;border:0.2px solid #F0F0F0;padding:0px;height:37px}
.leibie{width:95%;height:36px;color:#5B5B5B;border-radius:20px;background:#d41d3c}
.leibie1{width:95%;height:36px;color:#5B5B5B;border-radius:20px;border:1px solid #d41d3c}
.space{height:60px;color:#F0F0F0}
.space1{height:130px;color:#F0F0F0}
.prompt{display:block;height:30px;line-height:30px;width:70%;margin-left:15%;color:#E0E0E0}
#msg{}
.msg{background:#F0F0F0}
.yxz{background:#d41d3c;color:white;font-size:20px}
.xz{background:#93FF93;color:white;font-size:20px}
.btn-audio{
    float:right;
margin:15px;
    width:30px;
    height:30px;
    
}
.btn-audio1{
    border:1px solid #7B7B7B;border-radius:10px;height:60px;line-height:60px;background:#FCFCFC
}
@font-face {
  font-family: \'iconfont\';
  src: url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.eot\');
  src: url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.eot?#iefix\') format(\'embedded-opentype\'),
  url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.woff\') format(\'woff\'),
  url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.ttf\') format(\'truetype\'),
  url(\'//at.alicdn.com/t/font_366477_zv2kxp31staqncdi.svg#iconfont\') format(\'svg\');
}
.list, .list li {
list-style:none; 
padding:0; 
margin:0; 
}
.list li { 
float:left; 
}
</style>
<body>
';
	}
public function total_end(){//-----------------------------------------------------------------------------------html文件主体结尾 (带ajax)
echo   '
<img   id="dengdai"   src="wjxa/等待.gif"    style="display:none;position:fixed;top:20%;left:0%;width:100%;filter:alpha(opacity=100);opacity:0.2;"/>
<script language="javascript" type="text/javascript">
var xmlHttp;
xmlHttp=GetXmlHttpObject();
function GetXmlHttpObject(){var xmlHttp=null;try { xmlHttp=new XMLHttpRequest(); }catch (e) { try  {  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");  } catch (e)  {  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");  } }return xmlHttp;}
</script>
</body>
</html>
';

	}

public function total_popup($id,$css,$position,$content){//-----------------------------------------------------------------------------------弹出框   $id,$css,$position,$content      启动按钮id为$id.a
echo   '
<div  id="'.$id.'"    style="position:fixed;z-index:9;top:0px;left:0px;width:100%;height:600px;display:none">
<div     style="position:fixed;z-index:9;'.$position.';width:100%;text-align:center;border:0px solid #F0F0F0;'.$css.'">
  '.$content.'
  </div>  </div>
<script>
$("#'.$id.'a").click(function(){
$("#'.$id.'").fadeIn(500);
});
$("#'.$id.'").click(function(){
$("#'.$id.'").fadeOut(500);
});
</script>
';
}

public function total_popup1($id,$css,$position,$content){//-----------------------------------------------------------------------------------弹出框1   $id,$css,$position,$content      启动按钮id为$id.a
echo   '
<div  id="'.$id.'"    style="position:fixed;z-index:9;top:0px;left:0px;width:100%;height:600px">
<div     style="position:fixed;z-index:9;'.$position.';width:100%;text-align:center;border:0px solid #F0F0F0;'.$css.'">
  '.$content.'
  </div>  </div>
<script>
$("#'.$id.'a").click(function(){
$("#'.$id.'").fadeIn(500);
});
$("#'.$id.'").click(function(){
$("#'.$id.'").fadeOut(500);
});
</script>
';
}

public function total_funbar1($yid,$cc){//-----------------------------------------------------------------------------------控制条   $yid工作室id,$cc指令号
if($cc==0){$a='class="on"';}else  if($cc==1){$b='class="on"';}else  if($cc==2){$c='class="on"';}else  if($cc==3){$d='class="on"';}

echo   '
<div class="fixed_nav fixed_nav_no_wx"   style="position:fixed;z-index:9;bottom:0px;">
    <ul>
      <li  '.$a.'> <a href="plugin.php?id=xd:mp1&ft1='.$yid.'"> <span class="iconfont">&#xe60c;</span> <span  style="font-size:12px">首页</span></a> </li>
      <li   '.$b.'><a href="plugin.php?id=xd:shangchenga&ft=sosu0&ft1='.$yid.'"  class="add"> <span class="iconfont">&#xe62f;</span>  <span  style="font-size:12px">宝贝</span></a> </li>
      <li    '.$c.'> <a href="plugin.php?id=xd:sandd&b='.$yid.'"><span class="iconfont">&#xe6cf;</span><span  style="font-size:12px">咨询</span> </a> </li>
<li   '.$d.'> <a href="plugin.php?id=xd:mpab&ft=shpzhsh&c='.$yid.'"> <span class="iconfont">&#xe628;</span>  <span  style="font-size:12px">视频</span> </a> </li>
    </ul>
  </div>
';//--------------------------------------------------群组------plugin.php?id=xd:mp&ft=tyinyue&b='.$yid.'luntan
	}

public function total_funbar($yid,$cc){//-----------------------------------------------------------------------------------控制条   $yid工作室id,$cc指令号
if($cc==0){$a='class="on"';}else  if($cc==1){$b='class="on"';}else  if($cc==2){$c='class="on"';}else  if($cc==3){$d='class="on"';}

echo   '
<div class="fixed_nav fixed_nav_no_wx"   style="position:fixed;z-index:9;bottom:0px;">
    <ul>
      <li  '.$a.'> <a href="plugin.php?id=xd:mp1&ft1='.$yid.'"> <span class="iconfont">&#xe60c;</span> <span  style="font-size:12px">首页</span></a> </li>
<li    '.$b.'> <a href="plugin.php?id=xd:sandd&b='.$yid.'"><span class="iconfont">&#xe6cf;</span><span  style="font-size:12px">咨询</span> </a> </li>
     <li   '.$c.'> <a href="plugin.php?id=xd:mpab&ft=shpzhsh&c='.$yid.'"> <span class="iconfont">&#xe628;</span>  <span  style="font-size:12px">视频</span> </a> </li>

    </ul>
  </div>
';//--------------------------------------------------群组------plugin.php?id=xd:mp&ft=tyinyue&b='.$yid.'luntan
	}
public function total_css($css){//-----------------------------------------------------------------------------------css模块  $css
echo  '
<style>
'.$css.'
</style>
';
	}
public function total_js($js){//-----------------------------------------------------------------------------------js模块   $js
echo  '
<script>
'.$js.'
</script>
';

	}
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------body类
public function body_fy(array $array,$y1,$t1){//--------------------------------------分页(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$t=count($array);//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------总条数
if(empty($t1)){
$t1=30;//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------每页条数
}
$y=intval($t/$t1)+1;//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------总页数
$t2=$y1*$t1;//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------开始条号
$t3=($y1+1)*$t1;//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------结束条号
//$arr=array($t2,$t3,$t,$t1,$y,$y1);//开始条号，结束条号，总条数，每页条数，总页数,页码
return  array($t2,$t3,$t,$t1,$y,$y1);//开始条号，结束条号，总条数，每页条数，总页数,页码
}

public function body_fy1($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址
if(empty($y1)){$y1=0;}
if($y>1){
if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<($y-1)){$x2=$y1+1;}else{$x2=$y1;}
echo  '<div  class="font2"></div><table  style="width:100%"  border="0" cellspacing="0" cellpadding="0" ><tr  align="center"><td  style="width:20%"  align="right"><a  href="'.$dzh.'&ft0='.$x1.'" style="color:black"><<</a></td><td style="width:60%"><div  style="width:90%;overflow:scroll">
<select name="fy" id="fy" style="width:30%"  onchange="fy()">';
for ($x=0; $x<$y; $x++) {$xx=$x;echo  '<option value="'.$xx.'">'.$xx.'</option>';}
echo  '</select></div></td><td  style="width:20%"  align="left"><a  href="'.$dzh.'&ft0='.$x2.'"  style="color:black">>></a></td></tr></table><div  class="font2"></div><div class="space"  >woheni</div>
<script language="javascript" type="text/javascript">
document.getElementById("fy").value="'.$y1.'";
function fy(){
var  b=document.getElementById("fy").value;
window.location.href="plugin.php?id=xd:shangchenga&ft=chpml&ft0="+b;
}
</script>
';
}

}


public function body_fy4_ajax($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------分页1 ajax  参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址    输出  显示内容，下个页码
if(empty($y1)){$y1=0;};
if($y>0){$shy=$y-$y1;
if($shy<0){$shy='到底啦！';
return    array($shy,0);//显示内容，下个页码
}else{$shy='更多';


if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<=$y){$x2=$y1+1;}else{$x2=$y1;}
return    array($shy,$x2);//显示内容，下个页码

}}

}

public function body_fy3_ajax($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------分页1 ajax  参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址
echo  '<div   id="ff">';
$shy=$t-$t3;
if($shy<=0){$shy='到底啦！';}else{$shy='更多';}
if(empty($y1)){$y1=0;}
//$y1=iconv('gb2312','gbk',$y1);
echo '<input name="y1"     id="y1"    type="hidden"    value="'.$y1.'"/>';
$TH='';
if($y>1){
if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<($y-1)){$x2=$y1+1;}else{$x2=$y1;}
echo  '<table  style="width:100%"  border="0" cellspacing="0" cellpadding="0" ><tr  align="center"><td  style="width:100%"  align="center">
<a  href="javascript:void(0);"'; if($y1>=($y-1)){echo 'onclick="fy2()"';}else{echo 'onclick="fy(\''.$x2.'\')"';} echo  '  style="color:black"><div  style="background:#4F4F4F;color:#d0d0d0;font-size:15px;margin-top:5px">'.$shy.'</div></a>
</td></tr></table>
<script language="javascript" type="text/javascript">
setTimeout("fya()",1000);
function fya(){
document.getElementById("fy").value=document.getElementById("y1").value;
}
function fy2(){
alert("没有更多内容！");
}
function fy1(){
//var  b=document.getElementById("y1").value;
fy(\'0\');
}
</script></div>
';
}
}

public function body_fy2_ajax($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------分页1 ajax  参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址
echo  '<div   id="ff">';
$shy=$t-$t3;
if($shy<=0){$shy='到底啦！';}else{$shy='还有'.$shy.'条信息,请点击查看';}
if(empty($y1)){$y1=0;}
//$y1=iconv('gb2312','gbk',$y1);
echo '<input name="y1"     id="y1"    type="hidden"    value="'.$y1.'"/>';
$TH='';
if($y>1){
if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<($y-1)){$x2=$y1+1;}else{$x2=$y1;}
echo  '<table  style="width:100%"  border="0" cellspacing="0" cellpadding="0" ><tr  align="center"><td  style="width:100%"  align="center">
<a  href="javascript:void(0);"'; if($y1>=($y-1)){echo 'onclick="fy2()"';}else{echo 'onclick="fy(\''.$x2.'\')"';} echo  '  style="color:black"><div  style="background:#4F4F4F;color:#d0d0d0;font-size:15px;margin-top:5px">'.$shy.'</div></a>
</td></tr></table>
<script language="javascript" type="text/javascript">
setTimeout("fya()",1000);
function fya(){
document.getElementById("fy").value=document.getElementById("y1").value;
}
function fy2(){
alert("没有更多内容！");
}
function fy1(){
//var  b=document.getElementById("y1").value;
fy(\'0\');
}
</script></div>
';
}
}

public function body_fy1_ajax($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------分页1 ajax  参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址
echo  '<div   id="ff">';
$shy=$t-$t3;
if($shy<=0){$shy='到底啦！';}else{$shy='还有'.$shy.'条信息,请点击查看';}
if(empty($y1)){$y1=0;}
//$y1=iconv('gb2312','gbk',$y1);
echo '<input name="y1"     id="y1"    type="hidden"    value="'.$y1.'"/>';
$TH='';
if($y>1){
if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<($y-1)){$x2=$y1+1;}else{$x2=$y1;}
echo  '<table  style="width:100%"  border="0" cellspacing="0" cellpadding="0" ><tr  align="center"><td  style="width:100%"  align="center">
<a  href="javascript:void(0);"'; if($y1>=($y-1)){echo 'onclick="fy2()"';}else{echo 'onclick="fy(\''.$x2.'\')"';} echo  '  style="color:black"><div  style="background:#4F4F4F;color:#d0d0d0;font-size:15px;margin-top:5px">'.$shy.'</div></a>
</td></tr></table><div class="space"  >woheni</div>
<script language="javascript" type="text/javascript">
setTimeout("fya()",1000);
function fya(){
document.getElementById("fy").value=document.getElementById("y1").value;
}
function fy2(){
alert("没有更多内容！");
}
function fy1(){
//var  b=document.getElementById("y1").value;
fy(\'0\');
}
</script></div>
';
}
}
public function body_fy0_ajax($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------分页1 ajax  参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址
echo  '<div   id="ff"  style="margin-top:8px"><input   id="yyy"   type="hidden"  value="'.$y1.'"></input>';
if(empty($y1)){$y1=0;}
if($y>1){
if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<($y-1)){$x2=$y1+1;}else{$x2=$y1;}
echo  '<div  style=""><table  style="width:100%;height:30px"  border="0" cellspacing="0" cellpadding="0" ><tr  align="center"  style="background:#ADADAD"><td  style="width:25%;"  align="center"><a  href="javascript:void(0);" onclick="fy(\''.$x1.'\')" style="color:black"><div   style="background:#4F4F4F;color:#d0d0d0;font-size:25px"><<</div></a></td><td style="width:50%"><div  style="width:90%;overflow:scroll">
<select name="fy" id="fy" style="width:40%"  onchange="fy1()"  >';
for ($x=0; $x<$y; $x++) {$xx=$x;echo  '<option value="'.$xx.'">'.$xx.'</option>';}
echo  '</select></div></td><td  style="width:25%"  align="center"><a  href="javascript:void(0);" '; if($y1>=($y-2)){echo 'onclick="fy2()"';}else{echo 'onclick="fy(\''.$x2.'\')"';} echo  '  style="color:black"><div   style="background:#4F4F4F;color:#d0d0d0;font-size:25px">>></div></a></td></tr></table></div><div class="space"  >woheni</div>
<script language="javascript" type="text/javascript">

function fya(){
document.getElementById("fy").value=document.getElementById("yyy").value;
}
function fy1(){
var  b=document.getElementById("fy").value;
fy(b);
}
function fy2(){
alert("没有更多内容！");
}
</script></div>
';
}else{
echo  '<div class="space"  >woheni</div>';
}

	}

public function body_fyb_ajax($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------分页b ajax  参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址
echo  '<div   id="ff"  style="margin-top:8px"><input   id="yyy"   type="hidden"  value="'.$y1.'"></input>';
if(empty($y1)){$y1=0;}
//$y1=iconv('gb2312','gbk',$y1);
$TH='document.getElementById("fy").value='.$y1.';';
if($y>1){
if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<($y-1)){$x2=$y1+1;}else{$x2=$y1;}
echo  '<div  style=""><table  style="width:100%;height:30px"  border="0" cellspacing="0" cellpadding="0" ><tr  align="center"  style="background:#ADADAD"><td  style="width:25%;"  align="center"><a  href="javascript:void(0);" onclick="fy(\''.$x1.'\')" style="color:black"><div   style="background:#4F4F4F;color:#d0d0d0;font-size:25px"><<</div></a></td><td style="width:50%"><div  style="width:90%;overflow:scroll">
<select name="fy" id="fy" style="width:40%"  onchange="fy1()"  >';
for ($x=0; $x<$y; $x++) {$xx=$x;echo  '<option value="'.$xx.'">'.$xx.'</option>';}
echo  '</select></div></td><td  style="width:25%"  align="center"><a  href="javascript:void(0);" '; if($y1>=($y-1)){echo 'onclick="fy2()"';}else{echo 'onclick="fy(\''.$x2.'\')"';} echo  '  style="color:black"><div   style="background:#4F4F4F;color:#d0d0d0;font-size:25px">>></div></a></td></tr></table></div><div class="space"  >woheni</div></div>
';
}else{
echo  '<div class="space"  >woheni</div>';
}
}

public function body_fyb_ajax1($t2,$t3,$t,$t1,$y,$y1,$dzh){//---------------------------------------分页b(累加) ajax  参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh当前地址
echo  '<div   id="ff"  style="margin-top:8px"><input   id="yyy"   type="hidden"  value="'.$y1.'"></input>';
$shy=$t-$t3;
if($shy<=0){$shy='到底啦！';}else{$shy='还有'.$shy.'条信息,请点击查看';}
if(empty($y1)){$y1=0;}
//$y1=iconv('gb2312','gbk',$y1);
$TH='document.getElementById("fy").value='.$y1.';';
if($y>1){
if($y1>0){$x1=$y1-1;}else{$x1=$y1;}
if($y1<($y-1)){$x2=$y1+1;}else{$x2=$y1;}
echo  '<div  style=""><table  style="width:100%;height:30px"  border="0" cellspacing="0" cellpadding="0" ><tr  align="center"  style="">
';

echo  '<td  style="width:25%"  align="center"><a  href="javascript:void(0);" '; if($y1>=($y-1)){echo 'onclick="fy2()"';}else{echo 'onclick="fy(\''.$x2.'\')"';} echo  '  style="color:black"><div   style="color:#5B5B5B;font-size:15px">'.$shy.'</div></a></td></tr></table></div><div class="space"  >woheni</div></div>
';
}else{
echo  '<div class="space"  style="filter:alpha(opacity=100);opacity:0;">woheni</div></div>';
}
}

public function body_fyb(){//---------------------------------------分页b 参数：
echo   '
<script language="javascript" type="text/javascript">
function fya(){
document.getElementById("fy").value=document.getElementById("yyy").value;
}
function fy1(){
var  b=document.getElementById("fy").value;
fy(b);
}
function fy2(){
alert("没有更多内容！");
}
</script>
';
}
public function body_gshi($title,$content){//-----------------------------------------------------------------------------------公告   $content
echo  '<div class="notice"> <span class="iconfont">&#xe639;'.$title.'：</span>'.$content.'</div>';

	}
public function body_form($id,$content,$action){//-----------------------------------------------------------------------------------创建表单   表单id  $id ;元素id$content表单内容；按钮样式$content1
echo  '<form  id="'.$id.'"   name="'.$id.'" action="'.$action.'" method="post"  accept-charset="utf-8">'.$content.'</form>';

	}

public function body_top2($uid,$dizh){//-----------------------------------------------------------------------------------创建功能条  $uid,$dizh

$array= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid)[0];
$array1=DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$uid)[0];
$nn=1001212+$uid;
//echo '<script language="JavaScript">alert("'.$dizh.'");</script>';	
echo  '<div class="Top bg">
   <a href="plugin.php?id=xd:mp1&ft1='.$uid.'"    style="color:white"><div class="TopLogo"> <img src="'.avatar($uid,middle,true).'">
      <div class="TopLogoName">
'.$array1[username].'的工作室
</div>
    </div></a>
    

     <a href="javascript:void(0);" onclick="fx()"    style="color:white"><img  src="wjxa/分享.png"   style="width:30px;margin-top:3px;margin-right:12px;float:right"/></a>
 <span  style="color:white;margin-right:9px;line-height:40px;float:right"> 编号:'.$nn.'</span>

    
  </div> ';
$script='
<script language="javascript" type="text/javascript">
var a="'.$dizh.'";
function  fx(){
connectSQJavascriptBridge(function(){
sq.share("'.$title.'", "点击查看详情","'.$dizh.'", function(result){
  alert(result.errInfo);
});
});
}
</script>
 ';
echo htmlspecialchars_decode($script , ENT_NOQUOTES );


	}

public function body_top1($uid){//-----------------------------------------------------------------------------------创建功能条
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid)[0];
$array1=DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$uid)[0];
$nn=1001212+$uid;
echo  '<div class="Top bg">
   <a href="plugin.php?id=xd:mp1&ft1='.$uid.'"    style="color:white"><div class="TopLogo"> <img src="'.avatar($uid,middle,true).'">
      <div class="TopLogoName">';
if(empty($array[x18])){
echo  $array1[username].'的工作室';
}else{
echo  $array[x18];
}
echo  '</div>
    </div></a>
    <span  style="float:right;color:white;margin-right:15px"> 编号:'.$nn.'</span>
  </div>

';
	}

public function body_top($dizhi_f,$contrl,$lx){//-----------------------------------------------------------------------------------创建功能条$dizhi_f返回地址；$contrl控制部分内容,$lx类型（3为分页，2为主页可编辑，3为主页默认）
$logo_text=$this->get_pluginvar('xd','logo_text');
if($lx==3){echo  '<div  class="Top bg"><a href="'.$dizhi_f.'"><span class="TopLogoName  "    style="color:white">返回</span></a>'.$contrl.'</div>';
}else  if($lx==2){
echo '<div class="Top bg">
    <div class="TopLogo"> <img src="source/plugin/xd/static/images/logo.jpg">
      <div class="TopLogoName">'.$logo_text.'</div>
    </div>
      '.$contrl.'
  </div>';

}else{

echo   '<div class="Top bg">
    <div class="TopLogo"> <img src="source/plugin/xd/static/images/logo.jpg">
      <div class="TopLogoName">'.$logo_text.'</div>
    </div>
    <div class="ClickWx">
      <div class="Click"><span class="iconfont">&#xe674;</span></div>
   
      <div class="TopWx"><span class="iconfont">+</span>'.lang('plugin/xd',FixedNavWx).'</div>
  
    </div>
  </div>';
}

	}


public function body_bottom($name,$lx,$content){//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------按钮   按钮name  $name ;元素id;$lx按钮类型（为1时默认类型，此外可以自定义样式）；按钮样式$content
if($lx==1){echo  '<a     href="javascript:void(0);" onclick="'.$name.'()"><div class="add_submit bg"  name="'.$name.'">'.lang('plugin/xd',user_info_edit_submit).'</div></a>';
}else{
echo  '<a     href="javascript:void(0);" onclick="'.$name.'()"><div   name="'.$name.'">'.$content.'</div></a>';
}

	}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------php功能函数(收费站) star
public function tollstation(array  $_G,$uid){//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------收费站初始化
$tollstation= DB::fetch_all("SELECT * FROM " . DB::table('whn_tollstation') . " WHERE yid=".$uid)[0];
if(!empty($tollstation[yid])){
if(empty($tollstation[x])){$tollstation[x]=1;}
if($tollstation[x]<$_G['timestamp']){
$a= DB::query("UPDATE ".DB::table('whn_tollstation')." SET  x='1'     WHERE yid=".$uid);
return  2;
}else{
return 1;
}
}else{
$a= DB::query("INSERT ".DB::table('whn_tollstation')." VALUES (".$uid.",'','','','','','','','','','','','','','','','','','','','','','','','','')");
return  1;
}
}



//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------php功能函数(收费站)  end

}

?>