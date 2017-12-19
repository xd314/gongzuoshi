<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once (DISCUZ_ROOT .'./source/plugin/xd/function_xd314_xd.inc.php');
if(empty($_G['username'])){
//echo '<script language="JavaScript">window.location.href="https://m.woheni99.com/m/login";</script>';
jru();
//echo '<script language="JavaScript">window.location.href="member.php?mod=logging&action=login";</script>';
}else{	
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$_G['uid']);
chushihua($_G['uid']);
if(!file_exists(dzh($_G['uid'],'y'))){
mkdir(dzh($_G['uid'],'y'),0777,true);
}
if(!file_exists(dzh($_G['uid'],'shp'))){
mkdir(dzh($_G['uid'],'shp'),0777,true);
}
switch ($_GET['ft']){
case 'ss'://-----------------------------------------------------------------------------------------------------------------------------搜索
ss($_G,$_POST);
break;
case 'ssb'://-------------------------------------------------------------------------------------------------------------------------搜索
ssb($_G,$_POST);
break;
case 'ss1'://-----------------------------------------------------------------------------------------------------------------------------工作室搜索
ss1($_G,$_POST);
break;
case 'ssb1'://-------------------------------------------------------------------------------------------------------------------------搜索
ssb1($_G,$_POST);
break;
case 'logout'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------删除文件
discuz_logout($_GET['action']);
break;

case 'delete'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------删除文件
if("0"==$_GET[me]){
deletet1($_GET[ft2],$_G['uid']);
lb_t1($_G['uid']);
}else if("1"==$_GET[me]){
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------删除音乐
deletey($_GET[ft2],$_G['uid']);	
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue";</script>';
}else if("2"==$_GET[me]){
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------删除视频
deleteshp($_GET[ft2],$_G['uid']);	
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=shp";</script>';
}
break;
case 'shangchuan'://-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------上传
//echo '<script language="JavaScript">alert("大大大大大大大大大大");</script>';
if("0"==$_GET[me]){
$t=shangchuant($_G,$_FILES['upfilet'],$_GET[b]).'_';
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
}else if("1"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------上传音乐
shangchuany($_G,$_FILES['upfiley'],$_GET[b]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
//tyinyue($_G['uid']);
}else if("2"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------上传视频
shangchuanshp($_G,$_FILES['upfileshp'],$_GET[b]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
//tyinyue($_G['uid']);
}
else if("3"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------上传文字
if(!empty($_POST[content])&&$_POST[content]!=''&&$_POST[content]!=undefined){
shangchuanwz($_G,$_POST);
}
//echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
}
break;
case 'shangchuan1'://-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------上传微信二维码
deletet1($array1[0][x7],$_G['uid']);
$t1=shangchuant($_G,$_FILES['upfile'],$_G['uid']);
 lb_weixinerwm1($t1,$_G[uid]);
lb_weixinerwm($_G[uid]);	
break;

case 'ttouxiangshch'://-----------------------------------------------------------------------------------------------------------------------------头像上传
$t1=shangchuant1($_FILES['upfile'],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
//echo $t1;
break;
case 'tt'://------------------------------------------------------------------------------------------------------------------------------图片详情
 xq_t($_GET[ft2],$_GET[ft1]);
break;
case 'tdizhi'://------------------------------------------------------------------------------------------------------------------------------地址设置页面
lb_dizhi($_G);
break;
case 'tdizhi1'://------------------------------------------------------------------------------------------------------------------------------地址设置1
shezhi_dizhi($_G[uid],$_POST[content]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tping'://------------------------------------------------------------------------------------------------------------------------------私信
lb_ping($_GET[ft1],$_G['uid']);
break;
case 'tname'://------------------------------------------------------------------------------------------------------------------------------------------名字设置页面
 lb_name($array1[0][x]);
break;
case 'tzhiwu'://--------------------------------------------------------------------------------------------------------------------------------------------职务等级设置页面    
  lb_zhiwu($array1[0][x1]);
break;
case 'tdianhua'://-------------------------------------------------------------------------------------------------------------------------------------------电话设置页面    
  lb_dianhua($array1[0][x3]);
break;
case 'tQQ'://--------------------------------------------------------------------------------------------------------------------------------------------QQ设置页面    
  lb_QQ($array1[0][x4]);
break;
case 'tyouxiang'://--------------------------------------------------------------------------------------------------------------------------------------------邮箱设置页面    
  lb_youxiang($array1[0][x5]);
break;
case 'twangzhi'://--------------------------------------------------------------------------------------------------------------------------------------------网站网址设置页面    
  lb_wangzhi($array1[0][x9]);
break;
case 'tweixin'://--------------------------------------------------------------------------------------------------------------------------------------------微信号设置页面    
  lb_weixin($array1[0][x6]);
break;
case 'tweixinerwm'://--------------------------------------------------------------------------------------------------------------------------------------------微信二维码设置页面    
  lb_weixinerwm($_G[uid]);
break;
case 'tqianming'://--------------------------------------------------------------------------------------------------------------------------------------------个性签名设置页面    
  lb_qianming($array1[0][x8]);
break;
case 'tbiaoqian'://--------------------------------------------------------------------------------------------------------------------------------------------我的标签设置页面    
  lb_biaoqian($array1[0][x11]);
break;
case 'ttupian'://--------------------------------------------------------------------------------------------------------------------------------------------图片设置页面    
  lb_t1($_G['uid']);
break;
case 'ttupian1'://--------------------------------------------------------------------------------------------------------------------------------------------图片设置页面1   
$b='<div  style="font-size:70px;position:fixed;top:40%;left:20%;">'.lang('plugin/xd', 'mp40').'</div>'; 
 include template('xd:xq');
break;
case 'tyinyuec'://--------------------------------------------------------------------------------------------------------------------------------------------音乐列表页面    
  lb_yinyuec($_G['uid'],$_POST);
break;
case 'tyinyueb'://--------------------------------------------------------------------------------------------------------------------------------------------音乐列表页面    
  lb_yinyueb($_G,$_POST[b],$_POST);
break;
case 'tyinyued'://--------------------------------------------------------------------------------------------------------------------------------------------音乐列表页面    
  lb_yinyued($_G,$_POST[b],$_POST);
break;
case 'tyinyue'://--------------------------------------------------------------------------------------------------------------------------------------------音乐列表页面    
if(empty($_GET[b])){echo '<script language="JavaScript">alert("没有工作室信息！");</script>';}else{
  lb_yinyue($_G,$_GET[b],$_GET[ym]);
}
break;
case 'shpb'://--------------------------------------------------------------------------------------------------------------------------------------------视频列表页面    
  lb_shpb($_G['uid'],$_POST);
break;
case 'shp'://--------------------------------------------------------------------------------------------------------------------------------------------视频列表页面    
  lb_shp($_G['uid'],$_GET[ym]);
break;
case 'tyinyuezhshb'://--------------------------------------------------------------------------------------------------------------------------------------------音乐列表页面    
  lb_yinyuezhshb($_GET['b'],$_POST);
break;
case 'tyinyuezhsh'://--------------------------------------------------------------------------------------------------------------------------------------------音乐列表页面    
  lb_yinyuezhsh($_GET['b'],$_GET[ym]);
break;
case 'shpzhshb'://---------------------------------------------------------------------------------------------------------------------------------------------视频列表页面    
  lb_shpzhshb($_GET['b'],$_POST);
break;
case 'shpzhsh'://---------------------------------------------------------------------------------------------------------------------------------------------视频列表页面    
  lb_shpzhsh($_GET['b'],$_GET[ym]);
break;
case 'wqz'://--------------------------------------------------------------------------------------------------------------------------------------------我的工作室名称设置页面    
  lb_wqz($_G,$array1[0][x18]);
break;
case 'wshd'://--------------------------------------------------------------------------------------------------------------------------------------------我的商店设置页面    
  lb_wshd($array1[0][x19]);
break;
case 'tpifu'://--------------------------------------------------------------------------------------------------------------------------------------------我的皮肤设置页面    
 lb_m($_G['uid']);
break;
case 'tpifu1'://--------------------------------------------------------------------------------------------------------------------------------------------我的皮肤设置页面1    
 lb_m1($_G['uid']);
break;
case 'tpifu2'://--------------------------------------------------------------------------------------------------------------------------------------------我的皮肤设置页面2    
 lb_m2($_GET['ft1'],$_G['uid']);
break;
case 'gz_gzsh'://-----------------------------------------------------------------------------------------------------------------------------关注的工作室页面
lb_gz_gzsh($_G);
break;
case 'gz_gzsh1'://-----------------------------------------------------------------------------------------------------------------------------谁关注了我
lb_gz_gzsh1($_G);
break;
case 'lb_z'://-----------------------------------------------------------------------------------------------------------------------------谁赞了我
lb_z($_G);
break;
case 'quanzi'://----------------------------------------------------------------------------------------------------------------------------圈子设置页面
lb_quanzi($_G,$array1[0][x20]);
break;
case 'quanzi1'://----------------------------------------------------------------------------------------------------------------------------圈子设置页面
lb_quanzi1($_G,$_POST);
break;
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------以上是列表页，以下是设置页。

case 'wqz1'://--------------------------------------------------------------------------------------------------------------------------------------------我的工作室名称设置    
  lb_wqz1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'wshd1'://--------------------------------------------------------------------------------------------------------------------------------------------我的商店设置
  lb_wshd1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tname1'://------------------------------------------------------------------------------------------------------------------------------------------名字设置
 lb_name1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tzhiwu1'://--------------------------------------------------------------------------------------------------------------------------------------------职务等级设置   
  lb_zhiwu1($_POST[name],$_G['uid']);
 echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tdianhua1'://-------------------------------------------------------------------------------------------------------------------------------------------电话设置 
  lb_dianhua1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tQQ1'://--------------------------------------------------------------------------------------------------------------------------------------------QQ设置   
  lb_QQ1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tyouxiang1'://--------------------------------------------------------------------------------------------------------------------------------------------邮箱设置    
  lb_youxiang1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'twangzhi1'://--------------------------------------------------------------------------------------------------------------------------------------------网站网址设置  
  lb_wangzhi1($_POST[name],$_G['uid']);
 echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tweixin1'://--------------------------------------------------------------------------------------------------------------------------------------------微信号设置    
  lb_weixin1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tweixinerwm1'://--------------------------------------------------------------------------------------------------------------------------------------------微信二维码设置
  lb_weixinerwm1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tqianming1'://--------------------------------------------------------------------------------------------------------------------------------------------个性签名设置  
  lb_qianming1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tbiaoqian1'://--------------------------------------------------------------------------------------------------------------------------------------------我的标签设置   
  lb_biaoqian1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'thdp1b'://-------------------------------------------------------------------------------------------------------------------------------音乐设置
shezhi_y($_GET['y'],$_G[uid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'shezhimb'://-------------------------------------------------------------------------------------------------------------------------------皮肤设置
shezhi_mb($_GET['m'],$_G['uid']);
 lb_m1($_G['uid']);
break;
case 'tmp'://------------------------------------------------------------------------------------------------------------------------------------------名片编辑页面
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tyidongt'://-------------------------------------------------------------------------------------------------------------------------------------------------移动图片
yidongt($_GET['ft2'],$array1,$_GET['f']);
lb_t1($_G['uid']);
break;
case 'deletehdp'://-------------------------------------------------------------------------------------------------------------------------------删除幻灯片
deletehdp($_GET[ft2],$_G['uid'],$_GET[run]);
lb_hdp($_G['uid']);
break;
case 'shji'://-------------------------------------------------------------------------------------------------------------------------------升级
x_shji($_G);
break;
case 'shzh_jinb'://-------------------------------------------------------------------------------------------------------------------------------升级
shzh_jinb($_G);
break;
case 'x_kt'://------------------------------------------------------------------------------------------------------------------------------开通工作室
x_kt($_G);
break;
case 'tollstation'://-------------------------------------------------------------------------------------------------------------------------------打赏
x_tollstation($_G,$_GET[b]);
break;
case 'shzh_tollstation'://----------------------------------------------------------------------------------------------------------------------------打赏
shzh_tollstation($_G,$_GET[b],$_GET[c]);
break;
case 'cz'://-------------------------------------------------------------------------------------------------------------------------操作
//cz();
break;
case 'x_weizhi':
x_weizhi($_GET[b]);//-------------------------------------------------------------------------地址页
break;
case 'gzsh_user'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------用户中心
if(empty($_G['username'])){
echo '<script language="JavaScript">window.location.href="member.php?mod=logging&action=login";</script>';	
}else{
gzsh_user($_G);
}
break;
case 'xq_y'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------视频详情 
xq_y($_GET[b]);//----------------------------------------音乐详情     参数：$name文件系统名,$array文件箱数据
break;
case 'yinyuefabu'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------视频详情 
yinyuefabu($_G,$_POST);//---------------------------------------音乐发布设置    参数：$m是否发布的信息,$uid音乐id
break;
case 'yinyueshzh1'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------视频详情 
yinyueshzh1($_G,$_POST);//---------------------------------------音乐发布设置    参数：$m是否发布的信息,$uid音乐id
break;
case 'xq_shp'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------音乐详情 
xq_shp($_GET[b]);//----------------------------------------视频详情     参数：$name文件系统名,$array文件箱数据
break;
case 'shpfabu'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------音乐详情 
shpfabu($_G,$_POST);//---------------------------------------视频发布设置    参数：$m是否发布的信息,$uid音乐id
break;
case 'shpshzh1'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------音乐详情 
shpshzh1($_G,$_POST);//---------------------------------------视频发布设置    参数：$m是否发布的信息,$uid音乐id
break;
case 'lb_usercenter'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------用户中心
lb_usercenter($_G,$_GET,$_GET[b]);//--------------------------------------用户中心    参数：$m是否发布的信息,$uid音乐id
break;
case 'gzshdt'://----------------------------------------------------------------------------------------------------------------------------成员
gzshdt($_G,$_GET["b"],$_GET["c"]);
break;
case 'wmgj'://--------------------------------------------------------------------------------------------------------------------------完美工具
wmgj($_G);
break;
case 'leib1'://-------------------------------------------------------------------------------------------------------------------------类别
leib1($_G[uid],$_POST["leib"]);
//echo '<script language="JavaScript">alert("dddddd");</script>';
break;
case 'leib'://--------------------------------------------------------------------------------------------------------------------------类别
leib($_G);
break;
case 'jru1'://-------------------------------------------------------------------------------------------------------------------------进入
jru1();
break;
case 'tuis'://------------------------------------------------------------------------------------------------------------------------------项目推送
tuis($_G,$_POST,$_GET[ft0]);
break;
case 'achyub'://------------------------------------------------------------------------------------------------------------------------------项目查询
achyub($_G,$_POST);
break;
case 'tt1'://------------------------------------------------------------------------------------------------------------------------------图片详情
if(empty($_G['username'])){
echo '<script language="JavaScript">window.location.href="member.php?mod=logging&action=login";</script>';	
}else{
 xq_t1($_GET[b],$_GET[c]);
}
break;
default:
x_kt($_G);
break;
}
}


 //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------功能函数
function  chushihua($uid){//----------------------------------------初始化     参数：$uid用户id,$array文件箱数据            注意：开始只能进行一次，中间如果出问题，需要咨询服务。
//echo '<script language="JavaScript">alert("'.dzh($uid,'hdp').'");</script>';	
if(!file_exists(dzh($uid,'t'))||!file_exists(dzh($uid,'t1'))||!file_exists(dzh($uid,'t2'))){
$a= DB::query("INSERT ".DB::table('mp')." VALUES (".$uid.",'','健康美容顾问','','','','','','','','','','','','完美之梦.mp3','','','','','','','','','','','','','','','','','')");
$a= DB::query("UPDATE ".DB::table('mp')." SET x14='".avatar($uid,'small',true)."'   WHERE uid=".$uid);	
$path2='./wjx/'.$uid.'/t2';   
$path1='./wjx/'.$uid.'/t1'; 
$path='./wjx/'.$uid.'/t'; 
$pathy='./wjx/'.$uid.'/y'; 
$pathshp='./wjx/'.$uid.'/shp'; 
mkdir($path2,0777,true);
mkdir($path1,0777,true);
mkdir($path,0777,true);
mkdir($pathy,0777,true);
mkdir($pathshp,0777,true);
$fp = fopen($path.'/xd.txt', 'a+');
$t[a]=1;
file_put_contents ($path.'/xd.txt',serialize($t));
}
}

function  cz(){//----------------------------------------操作
$a= DB::query("UPDATE ".DB::table('mp')." SET x8='请填写公告'");
}

function  xq_t1($name,$mid){//----------------------------------------图片详情     参数：$name 图片名,$mid 名片id
$dizhi= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE  yid=".$name)[0]; 
$b='<img  id="i" src="'.$dizhi[x2].'" width=100%  />';
echo  '
<html>
<head>
<meta charset="utf-8">
 <meta name="description" content="图片详情">
  <meta name="keywords" content="图片详情">
  
  <title>图片详情</title>

<body>
<a    href="javascript:history.back(-1)"><img   src="wjxa/xm返回.png"     style="width:50px;position:fixed;top:5px;left:5px"    /></a>
<a    href="javascript:history.back(-1)"><img   src="wjxa/xm返回.png"     style="width:50px;position:fixed;bottom:5px;right:5px"    /></a>
'.$b.'
</body>
</html>
';
}

function  jru(){//--------------------------------------进入
echo '<script language="JavaScript">window.location.href="mobcent/app/web/js/appbyme/denglu.php";</script>';
}
function  jru1(){//--------------------------------------进入
if(empty($_G['username'])){
echo '<script language="JavaScript">window.location.href="mobcent/app/web/js/appbyme/denglu.php?b=aa";</script>';
}else{
x_kt($_G);
}
}


function  ssb(array  $_G,array  $post){//-----------------------------------------搜索ta的内容    参数：$_G,$content
$whn_xd314=new   whn_xd;
if($post[xxz]=="名称"){
if(!empty($post[cont])&&$post[cont]!=""){$post[cont]=" WHERE   username   LIKE  '%".$post[cont]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]."        LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list">';
foreach($array as $key =>$value){
          
echo  '<div   style="border-bottom:1px solid #E0E0E0;color:black;margin-bottom:8px;background:white"><a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"  target="_blank">
<table   border="0"  cellspacing="8"  cellpadding="0"   ><tr><td  style="">
        <div  style="font-weight:bold;color:black;padding:8px">'.$value[subject].'</div></td></tr>';
 $ftype1=explode('[/attach]',$value[message]);   
 echo  '<tr><td  style=""><div>';
foreach($ftype1  as  $key=>$value1){

if($key<=3){
$ftype2=explode('[attach]',$value1)[1];   

if(!empty($ftype2)){
$n41=DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.substr($value[tid],-1))." WHERE  aid=".$ftype2)[0];   

echo  '<img  src="./data/attachment/forum/'.$n41[attachment].'"  style="width:20%;height:60px;margin-left:8px"   />';
}
}
}
echo  '</td></tr><tr><td  style="">
</div><span  style="font-size:13px;color:black;padding:8px">'.date("y年m月d日 H:i",$value[dateline]).'</span><span   style="float:right;color:black">'.$value[author].'</span >
</td></tr></table></a></div>';
              }
echo  '</div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有符合条件的工作室!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}else  if($post[xxz]=="账号"){

}else{

}

}

function  ssb1(array  $_G,array  $post){//-----------------------------------------搜索ta的内容    参数：$_G,$content
$whn_xd314=new   whn_xd;
if($post[xxz]=="帖子"){
if(!empty($post[cont])&&$post[cont]!=""){$post1[cont]=" WHERE   subject   LIKE  '%".$post[cont]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont] ); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont]."            LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[authorid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC"><a href="plugin.php?id=xd:mp1&ft1='.$value[authorid].'">
 <div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[authorid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center" >
<a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"    style="color:#BEBEBE">'.$value[subject].'</a>
</td>
</tr>

 </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有符合条件的工作室内容!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}else  if($post[xxz]=="工作室1"){
if(!empty($post[cont])&&$post[cont]!=""){$post[cont]=" WHERE   username   LIKE  '%".$post[cont]."%' ";}

$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]."      LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:mp1&ft1='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$value[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="plugin.php?id=xd:straight&a=a1&b='.$value[uid].'"><span  style="margin-left:8px;color:white">关注</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有符合条件的工作室!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}else  if($post[xxz]=="工作室2"){
if(!empty($post[cont])&&$post[cont]!=""){$post[cont]=$post[cont]-1001212;$post[cont]=" WHERE   uid=".$post[cont];}
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[cont]."    ORDER BY  x11  DESC  "); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[cont]."         ORDER BY  x11  DESC       LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:mp1&ft1='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="plugin.php?id=xd:straight&a=a1&b='.$value[uid].'"><span  style="margin-left:8px;color:white">关注</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有符合条件的工作室!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}else{
if(!empty($post[cont])&&$post[cont]!=""){$post1[cont]=" WHERE   subject   LIKE  '%".$post[cont]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont] ); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont]."            LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[authorid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC"><a href="plugin.php?id=xd:mp1&ft1='.$value[authorid].'">
 <div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[authorid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center" >
<a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"    style="color:#BEBEBE">'.$value[subject].'</a>
</td>
</tr>

 </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有符合条件的工作室内容!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}
}



function  tuis(array  $_G,array  $post,$y1){//-----------------------------------------项目推送     参数：$_G,$content$_POST,$y1
$whn_xd314=new   whn_xd;
//echo '<script language="JavaScript">alert("'.$post[content].'");</script>';
$whn_xd314->total_start1('搜索','搜索','搜索','','#F0F0F0');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '<style type="text/css">
.city{font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white}
select{  -webkit-appearance: none;}   
</style>
<div   style="width:100%;height:800px;position:fixed;z-index:5;top:0px;left:0px;display:none"     id="sbg"  ></div>
<div   style="position:fixed;z-index:9;top:0px;"   id="ssss">
<table   width="100%"     bordercolor="#E0E0E0"  border="0"  cellspacing="8"  cellpadding="0"    style="">
<tr  align="center">
<td>
<select name="xxz" id="xxz" style="font-size:15px;width:100px;color:#4F4F4F;border-radius:18px;border:1px solid #d41d3c;padding:0px;height:36px;float:left;background:white"       >		
<option value="帖子">工作室帖子</option><option value="工作室1">工作室(以工作室名称搜索)</option><option value="工作室2">工作室(以工作室ID搜索)</option></select>
</td>
<td   width="70%">
<input  id="sosu"   name="sosu" type="text"  style="width:100%;font-size:15px;color:#4F4F4F;border-radius:18px;border:1px solid #d41d3c;padding:0px;height:36px"  value=""   placeholder="请输入"/>
</td>
<td>
<a  href="javascript:void(0);" onclick="fy(\'0\')"><span  style="width:70px;float:right;height:36px;color:#d41d3c;border-radius:20px;background:white;line-height:36px">搜索</span></a>
</td>
</tr>

</table></div>
<div  style="background:white;display:none">
<table   width="100%"     bordercolor="#E0E0E0"  border="0"  cellspacing="8"  cellpadding="0"    style="">
<tr  align="center"   style="">
<td   align="left"    width="20%"   style=""><span  style="color:#8E8E8E;margin-left:0px">▼</span>
<select name="province" id="province" style="font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white"     onchange="m()"     >		
<option value="全国">全国</option><option value="北京">北京</option><option value="上海">上海</option><option value="天津">天津</option><option value="重庆">重庆</option><option value="四川">四川</option><option value="贵州">贵州</option><option value="云南">云南</option><option value="西藏">西藏</option><option value="河南">河南</option><option value="湖北">湖北</option><option value="湖南">湖南</option><option value="广东">广东</option><option value="广西">广西</option><option value="陕西">陕西</option><option value="甘肃">甘肃</option><option value="青海">青海</option><option value="宁夏">宁夏</option><option value="新疆">新疆</option><option value="河北">河北</option><option value="山西">山西</option><option value="内蒙古">内蒙古</option><option value="江苏">江苏</option><option value="浙江">浙江</option><option value="安徽">安徽</option><option value="福建">福建</option><option value="江西">江西</option><option value="山东">山东</option><option value="辽宁">辽宁</option><option value="吉林">吉林</option><option value="黑龙江">黑龙江</option><option value="台湾">台湾</option><option value="海南">海南</option><option value="香港">香港</option><option value="澳门">澳门</option></select>
<td    align="left"    width="20%"  style="border-radius:18px"><span  style="color:#8E8E8E;margin-top:5.5px;float:left">▼</span>
<span   name="city1"   id="city1"   >
<select     class="city"  name="city"    id="city"     onchange="m1()" ><option value="所有">所有</option></select>
  </span>  
</td>
<td    align="left"    width="25%"   style="border-radius:18px"> <span  style="color:#8E8E8E;margin-top:6px;float:left">▼</span>
<select name="leib" id="leib" style="font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white;width:70%"       onchange="fy(0)"   >		
<option value="工作室">工作室</option><option value="帖子">帖子</option><option value="视频">视频</option></select>
</td>
<td      width="20%">
<a  href="javascript:void(0);" onclick="sos()"  ><span  style="width:70px;float:right;height:30px;color:#d41d3c;border-radius:20px;background:#E0E0E0;line-height:30px"  id="ssss1" ><img      src="wjxa/搜索.png"     style="width:30%;margin-top:4px"/></span></a>
</td>
</tr></table></div>
<div    id="tuiss">
</div>
<div   style="background:#5B5B5B;width:100%;font-size:20px;height:0px;color:white;text-align:center;display:none"     id="tuiss1"  ></div>
<div  class="space">woheni</div>
<div   id="msg">
';

$array=array();
$fy=$whn_xd314->body_fy($array,$y1,30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
if(count($array)>0){

}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px;color:#ADADAD">搜索内容显示在这里！</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
$whn_xd314->body_fyb();//---------------------------------------分页b 参数：
echo  '</div></div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=ssb1"','
var cont3=document.getElementById("leib").value;var cont2=document.getElementById("city").value;var cont1=document.getElementById("province").value;var cont=document.getElementById("sosu").value;var xxz=document.getElementById("xxz").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&xxz="+xxz+"&cont3="+cont3+"&cont2="+cont2+"&cont1="+cont1+"&cont="+cont');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
echo  '<script src="https://api.map.baidu.com/api?v=1.2" type="text/javascript"></script>  
<script language="javascript" type="text/javascript">
window.onload =chushihua;
';
$script='
var a="plugin.php?id=xd:xiangmu&ft=tuis";
function  fxx(){
connectSQJavascriptBridge(function(){
sq.share("'.$title.'", "点击查看详情",a, function(result){
  alert(result.errInfo);
});
});
}
 ';
echo  htmlspecialchars_decode($script , ENT_NOQUOTES );
echo   '
function chushihua(){
document.getElementById("xxz").value="'.$post[xxz].'";
document.getElementById("sosu").value="'.$post[content].'";
fy(0);
 }

function lbb(a){
document.getElementById("leib").value=a;
fy(0);
 }
$("#tuiss1").click(function(){
$("#tuiss1").fadeOut(500);
$("#gnt").fadeIn(1000);
$("#tuiss").fadeIn(1000);
});
function tuiss(){
$("#tuiss1").fadeIn(500);
$("#gnt").fadeOut(500);
$("#tuiss").fadeOut(500);
}

function sos(){
var c=document.getElementById("ssss").style.display;
if(c=="none"){
$("#ssss").fadeIn(500);
$("#sbg").fadeIn(1000);
$("#ssss1").fadeOut(500);
}else{
$("#sbg").fadeOut(1000);
$("#ssss").fadeOut(500);
$("#ssss1").fadeIn(1000);
}
 }
function sos1(){
$("#sbg").fadeOut(1000);
$("#ssss").fadeOut(500);
$("#ssss1").fadeIn(1000);
 }
$("#sbg").click(function(){
$("#sbg").fadeOut(1000);
$("#ssss").fadeOut(500);
$("#ssss1").fadeIn(1000);
});
function  m1(){
fy(0);
}
function  m(){
var   province=document.getElementById("province").value;
var   city=document.getElementById("city1");
if(province=="全国"){
city.innerHTML="<select   class=\'city\'   name=\'city\' id=\'city\'><option value=\'所有\'>所有</option></select>";
}else if(province=="北京"){
city.innerHTML="<select   class=\'city\'   name=\'city\'    id=\'city\'       onchange=\'m1()\'        onchange=\'m1()\' ><option value=\'东城区\'>东城区</option><option value=\'西城区\'>西城区</option><option value=\'崇文区\'>崇文区</option><option value=\'宣武区\'>宣武区</option><option value=\'朝阳区\'>朝阳区</option><option value=\'丰台区\'>丰台区</option><option value=\'石景山区\'>石景山区</option><option value=\'海淀区\'>海淀区</option><option value=\'门头沟区\'>门头沟区</option><option value=\'房山区\'>房山区</option><option value=\'通州区\'>通州区</option><option value=\'顺义区\'>顺义区</option><option value=\'昌平区\'>昌平区</option><option value=\'大兴区\'>大兴区</option><option value=\'怀柔区\'>怀柔区</option><option value=\'平谷区\'>平谷区</option><option value=\'密云县\'>密云县</option><option value=\'延庆县\'>延庆县</option></select>";
}else if(province=="上海"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'黄浦区\'>黄浦区</option><option value=\'卢湾区\'>卢湾区</option><option value=\'徐汇区\'>徐汇区</option><option value=\'长宁区\'>长宁区</option><option value=\'静安区\'>静安区</option><option value=\'普陀区\'>普陀区</option><option value=\'闸北区\'>闸北区</option><option value=\'虹口区\'>虹口区</option><option value=\'杨浦区\'>杨浦区</option><option value=\'闵行区\'>闵行区</option><option value=\'宝山区\'>宝山区</option><option value=\'嘉定区\'>嘉定区</option><option value=\'浦东新区\'>浦东新区</option><option value=\'金山区\'>金山区</option><option value=\'松江区\'>松江区</option><option value=\'青浦区\'>青浦区</option><option value=\'南汇区\'>南汇区</option><option value=\'奉贤区\'>奉贤区</option><option value=\'崇明县\'>崇明县</option></select>";
}else if(province=="天津"){
city.innerHTML="<select   class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'和平区\'>和平区</option><option value=\'河东区\'>河东区</option><option value=\'河西区\'>河西区</option><option value=\'南开区\'>南开区</option><option value=\'河北区\'>河北区</option><option value=\'红桥区\'>红桥区</option><option value=\'塘沽区\'>塘沽区</option><option value=\'汉沽区\'>汉沽区</option><option value=\'大港区\'>大港区</option><option value=\'东丽区\'>东丽区</option><option value=\'西青区\'>西青区</option><option value=\'津南区\'>津南区</option><option value=\'北辰区\'>北辰区</option><option value=\'武清区\'>武清区</option><option value=\'宝坻区\'>宝坻区</option><option value=\'宁河县\'>宁河县</option><option value=\'静海县\'>静海县</option><option value=\'蓟县\'>蓟县</option></select>";
}else if(province=="重庆"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'万州区\'>万州区</option><option value=\'涪陵区\'>涪陵区</option><option value=\'渝中区\'>渝中区</option><option value=\'大渡口区\'>大渡口区</option><option value=\'江北区\'>江北区</option><option value=\'沙坪坝区\'>沙坪坝区</option><option value=\'九龙坡区\'>九龙坡区</option><option value=\'南岸区\'>南岸区</option><option value=\'北碚区\'>北碚区</option><option value=\'万盛区\'>万盛区</option><option value=\'双桥区\'>双桥区</option><option value=\'渝北区\'>渝北区</option><option value=\'巴南区\'>巴南区</option><option value=\'黔江区\'>黔江区</option><option value=\'长寿区\'>长寿区</option><option value=\'綦江县\'>綦江县</option><option value=\'潼南县\'>潼南县</option><option value=\'铜梁县\'>铜梁县</option><option value=\'大足县\'>大足县</option><option value=\'荣昌县\'>荣昌县</option><option value=\'璧山县\'>璧山县</option><option value=\'梁平县\'>梁平县</option><option value=\'城口县\'>城口县</option><option value=\'丰都县\'>丰都县</option><option value=\'垫江县\'>垫江县</option><option value=\'武隆县\'>武隆县</option><option value=\'忠县\'>忠县</option><option value=\'开县\'>开县</oion><option value=\'云阳县\'>云阳县</option><option value=\'奉节县\'>奉节县</option><option value=\'巫山县\'>巫山县</option><option value=\'巫溪县\'>巫溪县</option><option value=\'石柱县\'>石柱县</option><option value=\'秀山县\'>秀山县</option><option value=\'酉阳县\'>酉阳县</option><option value=\'彭水县\'>彭水县</option><option value=\'江津\'>江津</option><option value=\'合川\'>合川</option><option value=\'永川\'>永川</option><option value=\'南川\'>南川</option></select>";
}else if(province=="四川"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'成都市\'>成都市</option><option value=\'自贡市\'>自贡市</option><option value=\'攀枝花市\'>攀枝花市</option><option value=\'泸州市\'>泸州市</option><option value=\'德阳市\'>德阳市</option><option value=\'绵阳市\'>绵阳市</option><option value=\'广元市\'>广元市</option><option value=\'遂宁市\'>遂宁市</option><option value=\'内江市\'>内江市</option><option value=\'乐山市\'>乐山市</option><option value=\'南充市\'>南充市</option><option value=\'眉山市\'>眉山市</option><option value=\'宜宾市\'>宜宾市</option><option value=\'广安市\'>广安市</option><option value=\'达州市\'>达州市</option><option value=\'雅安市\'>雅安市</option><option value=\'巴中市\'>巴中市</option><option value=\'资阳市\'>资阳市</option><option value=\'阿坝州\'>阿坝州</option><option value=\'甘孜州\'>甘孜州</option><option value=\'凉山州\'>凉山州</option></select>";
}else if(province=="贵州"){
city.innerHTML="<select     class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'贵阳市\'>贵阳市</option><option value=\'六盘水市\'>六盘水市</option><option value=\'遵义市\'>遵义市</option><option value=\'安顺市\'>安顺市</option><option value=\'铜仁地区\'>铜仁地区</option><option value=\'黔西州\'>黔西州</option><option value=\'毕节地区\'>毕节地区</option><option value=\'黔东南州\'>黔东南州</option><option value=\'黔南州\'>黔南州</option></select>";
}else if(province=="云南"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'昆明市\'>昆明市</option><option value=\'曲靖市\'>曲靖市</option><option value=\'玉溪市\'>玉溪市</option><option value=\'保山市\'>保山市</option><option value=\'昭通市\'>昭通市</option><option value=\'丽江市\'>丽江市</option><option value=\'普洱市\'>普洱市</option><option value=\'临沧市\'>临沧市</option><option value=\'楚雄州\'>楚雄州</option><option value=\'红河州\'>红河州</option><option value=\'文山州\'>文山州</option><option value=\'西双版纳州\'>西双版纳州</option><option value=\'大理州\'>大理州</option><option value=\'德宏州\'>德宏州</option><option value=\'怒江州\'>怒江州</option><option value=\'迪庆州\'>迪庆州</option></select>";
}else if(province=="西藏"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'拉萨市\'>拉萨市</option><option value=\'昌都地区\'>昌都地区</option><option value=\'山南地区\'>山南地区</option><option value=\'日喀则地区\'>日喀则地区</option><option value=\'那曲地区\'>那曲地区</option><option value=\'阿里地区\'>阿里地区</option><option value=\'林芝地区\'>林芝地区</option></select>";
}else if(province=="河南"){
city.innerHTML="<select      class=\'city\'       name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'郑州市\'>郑州市</option><option value=\'开封市\'>开封市</option><option value=\'洛阳市\'>洛阳市</option><option value=\'平顶山市\'>平顶山市</option><option value=\'安阳市\'>安阳市</option><option value=\'鹤壁市\'>鹤壁市</option><option value=\'新乡市\'>新乡市</option><option value=\'焦作市\'>焦作市</option><option value=\'濮阳市\'>濮阳市</option><option value=\'许昌市\'>许昌市</option><option value=\'漯河市\'>漯河市</option><option value=\'三门峡市\'>三门峡市</option><option value=\'南阳市\'>南阳市</option><option value=\'商丘市\'>商丘市</option><option value=\'信阳市\'>信阳市</option><option value=\'周口市\'>周口市</option><option value=\'驻马店市\'>驻马店市</option></select>";
}else if(province=="湖北"){
city.innerHTML="<select        class=\'city\'          name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'武汉市\'>武汉市</option><option value=\'黄石市\'>黄石市</option><option value=\'十堰市\'>十堰市</option><option value=\'宜昌市\'>宜昌市</option><option value=\'襄阳市\'>襄阳市</option><option value=\'鄂州市\'>鄂州市</option><option value=\'荆门市\'>荆门市</option><option value=\'孝感市\'>孝感市</option><option value=\'荆州市\'>荆州市</option><option value=\'黄冈市\'>黄冈市</option><option value=\'咸宁市\'>咸宁市</option><option value=\'随州市\'>随州市</option><option value=\'恩施州\'>恩施州</option><option value=\'仙桃市\'>仙桃市</option><option value=\'仙桃市\'>仙桃市</option><option value=\'潜江市\'>潜江市</option><option value=\'天门市\'>天门市</option><option value=\'神农架林区\'>神农架林区</option></select>";
}else if(province=="湖南"){
city.innerHTML="<select    class=\'city\'        name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'长沙市\'>长沙市</option><option value=\'株洲市\'>株洲市</option><option value=\'湘潭市\'>湘潭市</option><option value=\'衡阳市\'>衡阳市</option><option value=\'邵阳市\'>邵阳市</option><option value=\'岳阳市\'>岳阳市</option><option value=\'常德市\'>常德市</option><option value=\'张家界市\'>张家界市</option><option value=\'益阳市\'>益阳市</option><option value=\'郴州市\'>郴州市</option><option value=\'永州市\'>永州市</option><option value=\'怀化市\'>怀化市</option><option value=\'娄底市\'>娄底市</option><option value=\'湘西州\'>湘西州</option></select>";
}else if(province=="广东"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'广州市\'>广州市</option><option value=\'韶关市\'>韶关市</option><option value=\'深圳市\'>深圳市</option><option value=\'珠海市\'>珠海市</option><option value=\'汕头市\'>汕头市</option><option value=\'佛山市\'>佛山市</option><option value=\'江门市\'>江门市</option><option value=\'湛江市\'>湛江市</option><option value=\'茂名市\'>茂名市</option><option value=\'肇庆市\'>肇庆市</option><option value=\'惠州市\'>惠州市</option><option value=\'梅州市\'>梅州市</option><option value=\'汕尾市\'>汕尾市</option><option value=\'河源市\'>河源市</option><option value=\'阳江市\'>阳江市</option><option value=\'清远市\'>清远市</option><option value=\'东莞市\'>东莞市</option><option value=\'中山市\'>中山市</option><option value=\'潮州市\'>潮州市</option><option value=\'揭阳市\'>揭阳市</option><option value=\'云浮市\'>云浮市</option></select>";
}else if(province=="广西"){
city.innerHTML="<select      class=\'city\'           name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'南宁市\'>南宁市</option><option value=\'柳州市\'>柳州市</option><option value=\'桂林市\'>桂林市</option><option value=\'梧州市\'>梧州市</option><option value=\'北海市\'>北海市</option><option value=\'防城港市\'>防城港市</option><option value=\'钦州市\'>钦州市</option><option value=\'贵港市\'>贵港市</option><option value=\'玉林市\'>玉林市</option><option value=\'百色市\'>百色市</option><option value=\'贺州市\'>贺州市</option><option value=\'河池市\'>河池市</option><option value=\'来宾市\'>来宾市</option><option value=\'崇左市\'>崇左市</option></select>";
}else if(province=="陕西"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'西安市\'>西安市</option><option value=\'铜川市\'>铜川市</option><option value=\'宝鸡市\'>宝鸡市</option><option value=\'咸阳市\'>咸阳市</option><option value=\'渭南市\'>渭南市</option><option value=\'延安市\'>延安市</option><option value=\'汉中市\'>汉中市</option><option value=\'榆林市\'>榆林市</option><option value=\'安康市\'>安康市</option><option value=\'商洛市\'>商洛市</option></select>";
}else if(province=="甘肃"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'兰州市\'>兰州市</option><option value=\'嘉峪关市\'>嘉峪关市</option><option value=\'金昌市\'>金昌市</option><option value=\'白银市\'>白银市</option><option value=\'天水市\'>天水市</option><option value=\'武威市\'>武威市</option><option value=\'张掖市\'>张掖市</option><option value=\'平凉市\'>平凉市</option><option value=\'酒泉市\'>酒泉市</option><option value=\'庆阳市\'>庆阳市</option><option value=\'定西市\'>定西市</option><option value=\'陇南市\'>陇南市</option><option value=\'临夏州\'>临夏州</option><option value=\'甘南州\'>甘南州</option></select>";
}else if(province=="青海"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'西宁市\'>西宁市</option><option value=\'海东地区\'>海东地区</option><option value=\'海北州\'>海北州</option><option value=\'黄南州\'>黄南州</option><option value=\'海南州\'>海南州</option><option value=\'果洛州\'>果洛州</option><option value=\'玉树州\'>玉树州</option><option value=\'海西州\'>海西州</option></select>";
}else if(province=="宁夏"){
city.innerHTML="<select      class=\'city\'             name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'银川市\'>银川市</option><option value=\'石嘴山市\'>石嘴山市</option><option value=\'吴忠市\'>吴忠市</option><option value=\'固原市\'>固原市</option><option value=\'中卫市\'>中卫市</option></select>";
}else if(province=="新疆"){
city.innerHTML="<select      class=\'city\'               name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'乌鲁木齐市\'>乌鲁木齐市</option><option value=\'克拉玛依市\'>克拉玛依市</option><option value=\'吐鲁番地区\'>吐鲁番地区</option><option value=\'哈密地区\'>哈密地区</option><option value=\'昌吉州\'>昌吉州</option><option value=\'博尔塔拉蒙古州\'>博尔塔拉蒙古州</option><option value=\'巴音郭楞蒙古州\'>巴音郭楞蒙古州</option><option value=\'阿克苏地区\'>阿克苏地区</option><option value=\'克孜勒苏柯尔克孜州\'>克孜勒苏柯尔克孜州</option><option value=\'喀什地区\'>喀什地区</option><option value=\'和田地区\'>和田地区</option><option value=\'伊犁哈萨克州\'>伊犁哈萨克州</option><option value=\'塔城地区\'>塔城地区</option><option value=\'阿勒泰地区\'>阿勒泰地区</option><option value=\'石河子市\'>石河子市</option><option value=\'阿拉尔市\'>阿拉尔市</option><option value=\'图木舒克市\'>图木舒克市</option><option value=\'五家渠市\'>五家渠市</option></select>";
}else if(province=="河北"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'石家庄市\'>石家庄市</option><option value=\'唐山市\'>唐山市</option><option value=\'秦皇岛市\'>秦皇岛市</option><option value=\'邯郸市\'>邯郸市</option><option value=\'邢台市\'>邢台市</option><option value=\'保定市\'>保定市</option><option value=\'张家口市\'>张家口市</option><option value=\'承德市\'>承德市</option><option value=\'沧州市\'>沧州市</option><option value=\'廊坊市\'>廊坊市</option><option value=\'衡水市\'>衡水市</option></select>";
}else if(province=="山西"){
city.innerHTML="<select      class=\'city\'            name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'太原市\'>太原市</option><option value=\'大同市\'>大同市</option><option value=\'阳泉市\'>阳泉市</option><option value=\'长治市\'>长治市</option><option value=\'晋城市\'>晋城市</option><option value=\'朔州市\'>朔州市</option><option value=\'晋中市\'>晋中市</option><option value=\'运城市\'>运城市</option><option value=\'忻州市\'>忻州市</option><option value=\'临汾市\'>临汾市</option><option value=\'吕梁市\'>吕梁市</option></select>";
}else if(province=="内蒙古"){
city.innerHTML="<select        class=\'city\'                  name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'呼和浩特市\'>呼和浩特市</option><option value=\'包头市\'>包头市</option><option value=\'乌海市\'>乌海市</option><option value=\'赤峰市\'>赤峰市</option><option value=\'通辽市\'>通辽市</option><option value=\'鄂尔多斯市\'>鄂尔多斯市</option><option value=\'呼伦贝尔市\'>呼伦贝尔市</option><option value=\'巴彦淖尔市\'>巴彦淖尔市</option><option value=\'乌兰察布市\'>乌兰察布市</option><option value=\'兴安盟\'>兴安盟</option><option value=\'锡林郭勒盟\'>锡林郭勒盟</option><option value=\'阿拉善盟\'>阿拉善盟</option></select>";
}else if(province=="江苏"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'南京市\'>南京市</option><option value=\'无锡市\'>无锡市</option><option value=\'徐州市\'>徐州市</option><option value=\'常州市\'>常州市</option><option value=\'苏州市\'>苏州市</option><option value=\'南通市\'>南通市</option><option value=\'连云港市\'>连云港市</option><option value=\'淮安市\'>淮安市</option><option value=\'盐城市\'>盐城市</option><option value=\'扬州市\'>扬州市</option><option value=\'镇江市\'>镇江市</option><option value=\'泰州市\'>泰州市</option><option value=\'宿迁市\'>宿迁市</option></select>";
}else if(province=="浙江"){
city.innerHTML="<select       class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'杭州市\'>杭州市</option><option value=\'宁波市\'>宁波市</option><option value=\'温州市\'>温州市</option><option value=\'嘉兴市\'>嘉兴市</option><option value=\'湖州市\'>湖州市</option><option value=\'绍兴市\'>绍兴市</option><option value=\'金华市\'>金华市</option><option value=\'衢州市\'>衢州市</option><option value=\'舟山市\'>舟山市</option><option value=\'台州市\'>台州市</option><option value=\'丽水市\'>丽水市</option></select>";
}else if(province=="安徽"){
city.innerHTML="<select         class=\'city\'                 name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'合肥市\'>合肥市</option><option value=\'芜湖市\'>芜湖市</option><option value=\'蚌埠市\'>蚌埠市</option><option value=\'淮南市\'>淮南市</option><option value=\'马鞍山市\'>马鞍山市</option><option value=\'淮北市\'>淮北市</option><option value=\'铜陵市\'>铜陵市</option><option value=\'安庆市\'>安庆市</option><option value=\'黄山市\'>黄山市</option><option value=\'滁州市\'>滁州市</option><option value=\'阜阳市\'>阜阳市</option><option value=\'宿州市\'>宿州市</option><option value=\'巢湖市\'>巢湖市</option><option value=\'六安市\'>六安市</option><option value=\'亳州市\'>亳州市</option><option value=\'池州市\'>池州市</option><option value=\'宣城市\'>宣城市</option></select>";
}else if(province=="福建"){
city.innerHTML="<select         class=\'city\'                     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'福州市\'>福州市</option><option value=\'厦门市\'>厦门市</option><option value=\'莆田市\'>莆田市</option><option value=\'三明市\'>三明市</option><option value=\'泉州市\'>泉州市</option><option value=\'漳州市\'>漳州市</option><option value=\'南平市\'>南平市</option><option value=\'龙岩市\'>龙岩市</option><option value=\'宁德市\'>宁德市</option></select>";
}else if(province=="江西"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'南昌市\'>南昌市</option><option value=\'景德镇市\'>景德镇市</option><option value=\'萍乡市\'>萍乡市</option><option value=\'九江市\'>九江市</option><option value=\'新余市\'>新余市</option><option value=\'鹰潭市\'>鹰潭市</option><option value=\'赣州市\'>赣州市</option><option value=\'吉安市\'>吉安市</option><option value=\'宜春市\'>宜春市</option><option value=\'抚州市\'>抚州市</option><option value=\'上饶市\'>上饶市</option></select>";
}else if(province=="山东"){
city.innerHTML="<select        class=\'city\'                   name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'济南市\'>济南市</option><option value=\'青岛市\'>青岛市</option><option value=\'淄博市\'>淄博市</option><option value=\'枣庄市\'>枣庄市</option><option value=\'东营市\'>东营市</option><option value=\'烟台市\'>烟台市</option><option value=\'潍坊市\'>潍坊市</option><option value=\'济宁市\'>济宁市</option><option value=\'泰安市\'>泰安市</option><option value=\'威海市\'>威海市</option><option value=\'日照市\'>日照市</option><option value=\'莱芜市\'>莱芜市</option><option value=\'临沂市\'>临沂市</option><option value=\'德州市\'>德州市</option><option value=\'聊城市\'>聊城市</option><option value=\'滨州市\'>滨州市</option><option value=\'菏泽市\'>菏泽市</option></select>";
}else if(province=="辽宁"){
city.innerHTML="<select         class=\'city\'                  name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'沈阳市\'>沈阳市</option><option value=\'大连市\'>大连市</option><option value=\'鞍山市\'>鞍山市</option><option value=\'抚顺市\'>抚顺市</option><option value=\'本溪市\'>本溪市</option><option value=\'丹东市\'>丹东市</option><option value=\'锦州市\'>锦州市</option><option value=\'营口市\'>营口市</option><option value=\'阜新市\'>阜新市</option><option value=\'辽阳市\'>辽阳市</option><option value=\'盘锦市\'>盘锦市</option><option value=\'铁岭市\'>铁岭市</option><option value=\'朝阳市\'>朝阳市</option><option value=\'葫芦岛市\'>葫芦岛市</option></select>";
}else if(province=="吉林"){
city.innerHTML="<select         class=\'city\'                      name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'长春市\'>长春市</option><option value=\'吉林市\'>吉林市</option><option value=\'四平市\'>四平市</option><option value=\'辽源市\'>辽源市</option><option value=\'通化市\'>通化市</option><option value=\'白山市\'>白山市</option><option value=\'松原市\'>松原市</option><option value=\'白城市\'>白城市</option><option value=\'延边州\'>延边州</option></select>";
}else if(province=="黑龙江"){
city.innerHTML="<select       class=\'city\'                name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'哈尔滨市\'>哈尔滨市</option><option value=\'齐齐哈尔市\'>齐齐哈尔市</option><option value=\'鸡西市\'>鸡西市</option><option value=\'鹤岗市\'>鹤岗市</option><option value=\'双鸭山市\'>双鸭山市</option><option value=\'大庆市\'>大庆市</option><option value=\'伊春市\'>伊春市</option><option value=\'佳木斯市\'>佳木斯市</option><option value=\'七台河市\'>七台河市</option><option value=\'牡丹江市\'>牡丹江市</option><option value=\'黑河市\'>黑河市</option><option value=\'绥化市\'>绥化市</option><option value=\'大兴安岭地区\'>大兴安岭地区</option></select>";
}else if(province=="台湾"){
city.innerHTML="<select       class=\'city\'                         name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'台北市\'>台北市</option><option value=\'高雄市\'>高雄市</option><option value=\'台中县\'>台中县</option><option value=\'花莲县\'>花莲县</option><option value=\'基隆县\'>基隆县</option><option value=\'嘉义县\'>嘉义县</option><option value=\'金门县\'>金门县</option><option value=\'连江县\'>连江县</option><option value=\'苗栗县\'>苗栗县</option><option value=\'南投县\'>南投县</option><option value=\'澎湖县\'>澎湖县</option><option value=\'屏东县\'>屏东县</option><option value=\'台东县\'>台东县</option><option value=\'台南县\'>台南县</option><option value=\'桃园县\'>桃园县</option><option value=\'新竹县\'>新竹县</option><option value=\'宜兰县\'>宜兰县</option><option value=\'云林县\'>云林县</option><option value=\'彰化县\'>彰化县</option></select>";
}else if(province=="海南"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'海口市\'>海口市</option><option value=\'三亚市\'>三亚市</option><option value=\'三沙市\'>三沙市</option><option value=\'儋州市\'>儋州市</option><option value=\'五指山市\'>五指山市</option><option value=\'文昌市\'>文昌市</option><option value=\'琼海市\'>琼海市</option><option value=\'万宁市\'>万宁市</option><option value=\'东方市\'>东方市</option></select>";
}else if(province=="香港"){
city.innerHTML="<select       class=\'city\'                     name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'湾仔区\'>湾仔区</option><option value=\'观塘区\'>观塘区</option><option value=\'南区\'>南区</option><option value=\'东区\'>东区</option><option value=\'新界\'>新界</option><option value=\'沙田区\'>沙田区</option><option value=\'尖沙咀\'>尖沙咀</option><option value=\'油尖旺区\'>油尖旺区</option><option value=\'元朗区\'>元朗区</option></select>";
}else if(province=="澳门"){
city.innerHTML="<select         class=\'city\'             name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'花地玛堂区\'>花地玛堂区</option><option value=\'圣安多尼堂区\'>圣安多尼堂区</option><option value=\'大堂区\'>大堂区</option><option value=\'望德堂区\'>望德堂区</option><option value=\'风顺堂区\'>风顺堂区</option></select>";
}
fy(0);
}


</script>
';

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾	
}

function  ss(array  $_G,array  $post){//-----------------------------------------搜索ta的内容    参数：$_G,$content
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('搜索','搜索','搜索','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '<div class="funbar"   style="" >
<a  href="plugin.php?id=xd:mp"><img   src="wjxa/首页.png"    style="width:20px;margin:10px;margin-top:20px"></a>
<a  href="javascript:void(0);" onclick="fy(\'0\')"><span  style="float:right;color:white;margin-right:6px">搜索</span></a>
<input  id="sosu"   name="sosu" type="text"  style="width:40%;height:30px;float:right;margin:15px;background:#BEBEBE;border:0;font-size:18px;border-radius:8px;text-align:center"  value="'.$post[content].'"   placeholder="请输入账号"/>
<select name="xxz" id="xxz" style="width:20%;height:30px;float:right;margin-top:15px;border-radius:8px"       >		
<option value="名称">名称</option><option value="内容">内容</option><option value="工作室名">工作室名</option><option value="工作室账号">工作室账号</option><option value="视频名">视频名</option></select>
  </div><div  class="space">woheni</div>
<div   id="msg">';


echo  '<div  style="width:100%;text-align:center;padding-top:8px">搜索的内容将在这里显示！</div></div>';

//echo  '<div class="fixed_nav fixed_nav_no_wx"><ul><li><a href="plugin.php?id=xd:straight&a=chyu"> <span class="iconfont">&#xe607;</span>粉丝管理</a> </li><li> <a href="plugin.php?id=xd:straight&a=fsgl"> <span class="iconfont">&#xe61f;</span>我的关注</a> </li><li   class="on" > <a href="plugin.php?id=xd:straight&a=achyu"> <span class="iconfont">&#xe6a5;</span>新的大咖</a> </li>   </ul>  </div></div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=ssb1"','
var cont=document.getElementById("sosu").value;var xxz=document.getElementById("xxz").value;
','fya();',1,'"ym="+a+"&xxz="+xxz+"&cont="+cont');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾	
}





function leib1($uid,$content){//----------------------------------------地址设置    参数：$_G
$a= DB::query("UPDATE ".DB::table('mp')." SET x16='".$content."'   WHERE uid=".$uid);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
}
function  leib(array $_G){//-------------------------------------设置类别
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$_G['uid'])[0];
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('设置类别','设置类别','设置类别','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '


<form  id="f" action="plugin.php?id=xd:mp&ft=leib1" method="post"  accept-charset="utf-8"  >
<div  style="width:60%;height:60px;position:fixed;top:20%;left:20%;border-radius:8px;font-size:20px"  >请点击下面选择框设置工作室的类别！</div>
<select name="leib" id="leib" style="width:60%;height:60px;position:fixed;top:40%;left:20%;border-radius:8px"       >		
<option value="养生">养生</option><option value="中医">中医</option><option value="亲子">亲子</option><option value="教育">教育</option><option value="美容">美容</option><option value="商品">商品</option>
<option value="饮食">饮食</option><option value="旅游">旅游</option><option value="服装">服装</option><option value="秘方">秘方</option><option value="租住">租住</option></select>
<a href="javascript:void(0);" onclick="f()"><div   class="submit"   style="position:fixed;bottom:10%;">确认设置</div></a>
</form>
<script>';
if(!empty($mp[x16])){
echo  '
document.getElementById("leib").value="'.$mp[x16].'";
';
}
echo  '
function f(){
document.getElementById("f").submit();
}
</script>
';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}

function  wmgj(array $_G){//--------------------------------------完美工具箱
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('完美工具箱','完美工具箱','完美工具箱','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '
<div  style="">
<a href=""><div   class=""  style="height:20px;color:white">我</div></a>

<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
      <li><a href="plugin.php?id=xd:chpk&ft=chpml"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_资料平台.png"     style="width:50%"/></span> 完美产品资料 </a> </li>
<li><a href="plugin.php?id=xd:zhmd&ft=chxun"  class="add"> <span class="iconfont"><img   src="wjxa/查询.png"     style="width:47%;margin-top:1px"/></span> <span  style="margin-top:0px;font-size:11px"> 完美专卖店查询</span></a> </li>
<li><a href="plugin.php?id=xd:wmjsq"  class="add"> <span class="iconfont"><img   src="wjxa/计算器.png"     style="width:53%;margin-top:-2px"/></span><span  style="margin-top:-3px;font-size:11px"> 完美计算器</span></a> </li>
<li><a href="plugin.php?id=xlwsq_video"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_视频资料.png"     style="width:50%"/></span><span  style="margin-top:-1px;font-size:11px"> 完美视频</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
<li><a href="plugin.php?id=xd:schedule&b=1"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_每日计划.png"     style="width:50%"/></span> <span  style="margin-top:-3px;font-size:11px">计划管理</span></a> </li>
<li><a href="plugin.php?id=xd:customer&b=1"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_直排.png"     style="width:50%"/></span> <span  style="margin-top:-3px;font-size:11px">成员管理</span></a> </li>
    </ul>
  </div>
</div>
';
$title='完美工作室页面管理';
//$title1='工作管理';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}


function  gzshdt(array  $_G,$y1,$uid){//----------------------------------------工作室动态
$whn_xd314=new   whn_xd;
$whn_xd314->total_start1('工作室动态','工作室动态','工作室动态','','white');//-----------------------------------------------------------------------------------html文件主体开头1   $title,$keywords,$description,$head,background
$sublist=DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1   ORDER BY  dateline  DESC   LIMIT  0,1");
if(count($sublist)>0){
foreach($sublist as $key =>$value){
if(!empty($value)){
echo  '
<div   style="border-bottom:0px solid #E0E0E0;color:#5B5B5B;margin-bottom:8px;background:white;width:100%"><a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"  target="_blank">
<table   border="0"  cellspacing="8"  cellpadding="0"   style="width:100%"><tr><td  style=""> <div><div  style="color:#4F4F4F;padding:8px;font-size:12px;float:left">最新动态：'.$value[subject].'</div><span  style="font-size:12px;color:#BEBEBE;padding:8px;float:right">'.date("y年m月d日 H:i",$value[dateline]).'</span></div></td></tr><tr><td  style="">';
$ftype1=explode('[/attach]',$value[message]);    
$ftypee=explode('[attach]',$ftype1[0]);
$ftypee[0]=substr($ftypee[0], 0 ,80); 
$ftypee[0]=explode('[audio]',$ftypee[0])[0];
$ftypee[0]=explode('[media',$ftypee[0])[0];
$yinpin1=explode('[/audio]',$value[message]);    
$yinpin=explode('[audio]',$yinpin1[0]);
$shp1=explode('[/media]',$value[message]);    
$shp=explode('[media',$shp1[0]);
$shp=explode(']',$shp[1]);

echo  '
 <div  style="color:#BEBEBE;padding:8px;font-size:12px">'.$ftypee[0].'</div></td></tr><tr><td  style="">';
foreach($ftype1  as  $key => $value1){
if($key<=3){
$ftype2=explode('[attach]',$value1)[1];
if(!empty($ftype2)){
$n41=DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.substr($value[tid],-1))." WHERE  aid=".$ftype2)[0]; 
echo  '
<img  src="./data/attachment/forum/'.$n41[attachment].'"  style="width:20%;height:60px;margin-left:8px"   />
';
}
}
}
echo  '</td></tr>
<tr><td  style="width:100%">
<span   style="float:right;color:#BEBEBE">';
if(!empty($yinpin[1])){
echo  '<img  src="wjxa/语音播放.png"  style="width:20px;height:20px"   />';
}
if(!empty($shp[1])){
echo   '<img  src="wjxa/视频播放.png"  style="width:23px;height:23px;margin-left:8px;margin-bottom:-1.5px"   />';
}
echo   '
</span >
</td></tr></table></a></div>
              <!--{/loop}--></div>
';


}
}       
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有最新动态</div>';}

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾	
}

function  lb_usercenter(array  $_G,array  $get,$uid){//----------------------------------------用户中心     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid)[0];
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE  uid=".$uid)[0];
$xiangmu= DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE  x20=".$uid)[0];
if(empty($xiangmu[uid])){
$whn_xd314->total_start($array[username],$array[username],$array[username],'');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo '
<div class="wrap pb9">
  <div class="user_head">
    <div class="user_img_pb" style="background:url(uc_server/avatar.php?uid='.$uid.'&size=small) center;background-size:100%"></div>
    <div class="user_bg"></div>
    <div class="user_img">
      <table>
        <tr>
          <td><img src="uc_server/avatar.php?uid='.$uid.'&size=big">
<div class="user_name">
';
if(empty($array1[x18])){
echo  $array[username].'的工作室';
}else{
echo  $array1[x18];
}
echo  '
</div>
</td>
        </tr>
      </table>
    </div>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
<li><a href="plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$get[r].'"  class="add"> <span class="iconfont"><img   src="wjxa/展示.png"     style="width:53%"/></span>  <span  style="margin-top:-5px;font-size:12px">主页<span></a> </li>
<li><a href="javascript:void(0);" onclick="a11()"  class="add"> <span class="iconfont"><img   src="wjxa/二维码1.png"     style="margin-top:2px;width:48%"/></span> <span  style="margin-top:-2px;font-size:12px"> 二维码 <span></a> </li>
<li><a href="plugin.php?id=xd:straight&a=a1&b='.$uid.'"  class="add"> <span class="iconfont"   style="margin-top:0px"><img   src="wjxa/加入.png"     style="width:50%"/></span>  <span  style="margin-top:-3px;font-size:12px">关注<span></a> </li>
<li><a href="plugin.php?id=xd:communication&a=3&b='.$uid.'&c=1"  class="add"> <span class="iconfont"  style="margin-top:2px"><img   src="wjxa/消息发布.png"     style="width:45%"/></span> <span class="iconfont"  style="margin-top:-2px;font-size:12px">发消息</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
   <li> <a href="tel:'.$array1[x3].'"> <span class="iconfont"><img   src="wjxa/添加电话.png"     style="width:50%"    /> </span> 电话</a> </li>
<li> <a href="sms:'.$array1[x3].'"><span class="iconfont"><img   src="wjxa/发送短信.png"    style="width:50%" /> </span>短信 </a> </li>
      <li><a href="javascript:void(0);" onclick="wx()"  > <span class="iconfont"   class="wxx"><img   src="wjxa/添加微信.png"     style="width:50%"/></span>   微信 </li>
<li> <a href="javascript:void(0);" onclick="dizhi(\''.$array1[x15].'\')"> <span class="iconfont"><img   src="wjxa/gzsh_地址.png"   style="width:50%"  /></span>  地址 </a> </li>
    </ul>
  </div>
<div  style="display:none"  id="dizhi"></div>
<div id="erw1"  style="width:100%;height:800px;position:fixed;z-index:9;top:0px;left:0px;display:none;background:url(\'wjxa/fjj.jpg\') no-repeat;background-size:100% 100%;"><div style="margin:5px;float:right;width:10%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:10px;background:#272727">×</div></div>
  <div id="erw" style="position:fixed;z-index:9;top:10%;left:15%;width:70%;display:none"><div id="output"  style="width:100%"></div><div  style="width:100%;text-align:center"><span style="position:relative;top:20px;width:100%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:5px">'.$array[username].'的工作室二维码</span></div>
</div>
';
echo  '
<a    href="plugin.php?id=xd:straight1&a=shang&b='.$uid.'"><img   src="wjxa/打赏.png"     style="width:50px;position:fixed;bottom:5%;right:5%"    /></a>
<script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script>
 function wx(){
  $(\'.wxx1\').trigger(\'select\');
  document.execCommand(\'copy\');
  alert(\'微信号:'.$array1[x6].'\');

  } 
function dizhi(ppoint)
  {
var c=document.getElementById("dizhi").style.display;
if(c=="none"){
document.getElementById("dizhi").style.display="block";
document.getElementById("dizhi").innerHTML="<div style=\'width:95%;margin-left:2.5%;height:240px;\' id=\'container\'>woheni</div>";
  var map =new BMap.Map("container");
map.addControl(new BMap.GeolocationControl());
map.addControl(new BMap.NavigationControl());
var strArr = ppoint.split("|");
               var point =new BMap.Point(strArr[2],strArr[3]);        
map.centerAndZoom(point,10);         
var marker = new BMap.Marker(point); 
		map.addOverlay(marker);    
var         searchInfoWindow = null;
	searchInfoWindow = new BMapLib.SearchInfoWindow(map, strArr[1], {
			title:strArr[0],    
			width  : 240,           
			height : 30,              
			panel  : "panel",        
			enableAutoPan : true,    
			searchTypes   :[
				BMAPLIB_TAB_SEARCH,   
				BMAPLIB_TAB_TO_HERE,  
				BMAPLIB_TAB_FROM_HERE 
			]
		});
marker.addEventListener("click", function(e){          		
searchInfoWindow.open(marker);
	});
 var label = new BMap.Label(strArr[0], { "offset": new BMap.Size(10, -20) });
label.setStyle({
                borderColor: "#808080",
                color: "#333",
                cursor: "pointer"
            });
            marker.setLabel(label);	
}else{
document.getElementById("dizhi").style.display="none";
}
 }
jQuery(function(){
	jQuery(\'#output\').qrcode(\'plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$_G[uid].'\');
})
function a11(){
var c=document.getElementById("erw1").style.display;
if(c=="none"){
$("#erw1").fadeIn(500);
$("#erw").fadeIn(1000);
}else{
$("#erw1").fadeOut(1000);
$("#erw").fadeOut(500);
}
}
$("#erw1").click(function(){
$("#erw1").fadeOut(1000);
$("#erw").fadeOut(500);
});
</script>
';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}else{
$shangchenga=DB::fetch_all("SELECT * FROM ".DB::table('whn_shangchenga')." WHERE     x14='1'   AND  x16='".$uid."'" );
$dizhi=$xiangmu[x].'|'.$xiangmu[x3].'|'.$xiangmu[x4];
$whn_xd314->total_start1($xiangmu[x],$xiangmu[x],$xiangmu[x],'','white');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo '
<div  style="width:100%;height:200px;background:#66B3FF">
      <table   style="width:100%">
        <tr  style="height:60px">
          <td   align="center"    width="40%"   rowspan="3"><img src="uc_server/avatar.php?uid='.$uid.'&size=big"   style="width:100px;border-radius:50px" >
</td>
 <td   width="30%"      colspan="2">
<div   style="font-weight:bold;font-size:25px;color:white">'.$xiangmu[x].'</div>

</td>

        </tr>
<tr>
<td   width="30%" >
<span  style="font-size:15px;color:white">['.$xiangmu[x5].']</span>
</td>
 <td   width="30%"  >
<img   src="wjxa/xm已认证1.png"     style="width:60%;margin:8px"    />

</td>
        </tr>
  <tr>
          <td   width="30%"  colspan="2">
<div   style="font-size:15px;color:white">'.$xiangmu[x1].'</div>
</td>

        </tr>
      </table>
  </div>
<div class="user_nav"   style="border-top:1px solid #F0F0F0;display:none">
<ul>
<li   class="Logout"  style="color:#3C3C3C"><a href="plugin.php?id=xd:tuisong_dpu&ft=tuis&b='.$uid.'&r='.$get[r].'"  class="add"><span class="iconfont"><img  src="wjxa/xm店铺.png"   style="width:20px;margin-bottom:-4px"/></span>Ta的店铺(产品'.count($shangchenga).'个)<b  style="color:#8E8E8E">></b></a></li>
</ul>
    <div class="both"></div>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
<li><a href="plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$get[r].'"  class="add"> <span class="iconfont"><img   src="wjxa/xm主页.png"     style="width:53%"/></span>  <span  style="margin-top:-5px;font-size:12px">主页<span></a> </li>
      <li><a href="javascript:void(0);" onclick="a11()"  class="add"> <span class="iconfont"><img   src="wjxa/二维码1.png"     style="margin-top:2px;width:48%"/></span> <span  style="margin-top:-2px;font-size:12px"> 二维码 <span></a> </li>
<li><a href="plugin.php?id=xd:straight&a=a1&b='.$uid.'"  class="add"> <span class="iconfont"   style="margin-top:0px"><img   src="wjxa/加入.png"     style="width:50%"/></span>  <span  style="margin-top:-3px;font-size:12px">关注<span></a> </li>
<li><a href="plugin.php?id=xd:communication&a=3&b='.$uid.'&c=1"  class="add"> <span class="iconfont"  style="margin-top:2px"><img   src="wjxa/消息发布.png"     style="width:45%"/></span> <span class="iconfont"  style="margin-top:-2px;font-size:12px">发消息</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
   <li> <a href="tel:'.$xiangmu[x2].'"> <span class="iconfont"><img   src="wjxa/添加电话.png"     style="width:50%"    /> </span> 电话</a> </li>
<li> <a href="sms:'.$xiangmu[x2].'"><span class="iconfont"><img   src="wjxa/发送短信.png"    style="width:50%" /> </span>短信 </a> </li>
      <li   ><a href="plugin.php?id=xd:tuiguang&a=zhifux&b='.$uid.'"  > <span class="iconfont"   class="wxx"><img   src="wjxa/xm支付.png"     style="width:50%"/></span>支付 </li>
  <li  style="display:none"><a href="javascript:void(0);" onclick="wx()"  > <span class="iconfont"   class="wxx"><img   src="wjxa/添加微信.png"     style="width:50%"/></span>   微信 </li>
<li> <a href="javascript:void(0);" onclick="dizhi(\''.$dizhi.'\')"> <span class="iconfont"><img   src="wjxa/gzsh_地址.png"   style="width:50%"  /></span>  地址 </a> </li>
    </ul>
  </div>
<div  style="display:none"  id="dizhi"></div>
<div id="erw1"  style="width:100%;height:800px;position:fixed;z-index:9;top:0px;left:0px;display:none;background:url(\'wjxa/fjj.jpg\') no-repeat;background-size:100% 100%;"><div style="margin:5px;float:right;width:10%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:10px;background:#272727">×</div></div>
  <div id="erw" style="position:fixed;z-index:9;top:10%;left:15%;width:70%;display:none"><div id="output"  style="width:100%"></div><div  style="width:100%;text-align:center"><span style="position:relative;top:20px;width:100%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:5px">'.$array[username].'的工作室二维码</span></div>
</div>
';
echo  '
<div   style="margin:8px;background:white;overflow:scroll">
<table cellpadding="0" cellspacing="0">
<tr  style="line-height:40px"> ';
$ftype=explode('|',$xiangmu[x11]);
foreach($ftype   as   $value1){
if(!empty($value1)){
$dizhi= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE  yid=".$value1)[0];
if($dizhi[x2]!="undefined"){
echo  '
<td  align="center"  style="width:25%"><a href="plugin.php?id=xd:mp&ft=tt1&b='.$value1.'"    target="_blank">
<div style="float:left;margin-right:8px;border-radius:8px;width:180px;height:180px;background:url('.$dizhi[x2].') no-repeat;background-size:100% 100%""></div>
</a></td>';
}}}
echo  '
</tr> </table>
</div>
<div class="user_nav"   style="border-top:1px solid #F0F0F0">
<ul>

<li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/xm时间.png"   style="width:20px;margin-bottom:-4px"/></span>营业时间<b  style="color:#8E8E8E">'.$xiangmu[x6].'</b></li>
<li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"   style="margin-left:2px"><img  src="wjxa/xm人数.png"   style="width:16px;margin-bottom:-4px"/></span><span    style="margin-left:2px">员工人数</span><b  style="color:#8E8E8E">'.$xiangmu[x7].'</b></li>
</ul>
    <div class="both"></div>
  </div>
<div style="height:40px;line-height:40px;margin-left:12px"><img  src="wjxa/xm内容.png"   style="width:19px;margin-bottom:-4px"/><span    style="font-size:13px;color:#4F4F4F;margin-left:3px">工作室服务内容</span></div>
<pre  style="color:#8E8E8E;background:white;margin-left:16px;margin-right:16px">'.$xiangmu[x8].'</pre>

<div   class="space"  style="color:white">woheni</div>
<a    href="plugin.php?id=xd:straight1&a=shang&b='.$uid.'&r='.$get[r].'"><img   src="wjxa/打赏.png"     style="width:50px;position:fixed;bottom:5%;right:5%"    /></a>
<script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script>
 function wx(){
  $(\'.wxx1\').trigger(\'select\');
  document.execCommand(\'copy\');
  alert(\'微信号:'.$array1[x6].'\');

  } 
function dizhi(ppoint)
  {
var c=document.getElementById("dizhi").style.display;
if(c=="none"){
document.getElementById("dizhi").style.display="block";
document.getElementById("dizhi").innerHTML="<div style=\'width:95%;margin-left:2.5%;height:240px;\' id=\'container\'>woheni</div>";
  var map =new BMap.Map("container");
map.addControl(new BMap.GeolocationControl());
map.addControl(new BMap.NavigationControl());
var strArr=ppoint.split("|");
               var point =new BMap.Point(strArr[2],strArr[3]);        
map.centerAndZoom(point,10);         
var marker = new BMap.Marker(point); 
		map.addOverlay(marker);    
var         searchInfoWindow = null;
	searchInfoWindow = new BMapLib.SearchInfoWindow(map, strArr[1], {
			title:strArr[0],    
			width  : 240,           
			height : 30,              
			panel  : "panel",        
			enableAutoPan : true,    
			searchTypes   :[
				BMAPLIB_TAB_SEARCH,   
				BMAPLIB_TAB_TO_HERE,  
				BMAPLIB_TAB_FROM_HERE 
			]
		});
marker.addEventListener("click", function(e){          		
searchInfoWindow.open(marker);
	});
 var label = new BMap.Label(strArr[0], { "offset": new BMap.Size(10, -20) });
label.setStyle({
                borderColor: "#808080",
                color: "#333",
                cursor: "pointer"
            });
            marker.setLabel(label);	
}else{
document.getElementById("dizhi").style.display="none";
}
 }
jQuery(function(){
	jQuery(\'#output\').qrcode(\'plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$_G[uid].'\');
})
function a11(){
var c=document.getElementById("erw1").style.display;
if(c=="none"){
$("#erw1").fadeIn(500);
$("#erw").fadeIn(1000);
}else{
$("#erw1").fadeOut(1000);
$("#erw").fadeOut(500);
}
}
$("#erw1").click(function(){
$("#erw1").fadeOut(1000);
$("#erw").fadeOut(500);
});
</script>
';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾





}
}

function  lb_shpzhshb($uid,array  $post){//----------------------------------------视频列表     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[media%'  ORDER BY  dateline  DESC");
$fy=$whn_xd314->body_fy($array,$post[ym],6);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[media%'  ORDER BY  dateline  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[authorid])){
$value[subject]=substr($value[subject], 0 ,10);
$shpx=explode('[/media]',$value[message]);    
$shpx1=explode('[media',$shpx[0]); 
$shpx1=explode(']',$shpx1[1])[1];
echo  '<li class="a-bounceinR"  style="">
<a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/视频播放.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多视频!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}

function  lb_shpzhsh($uid,$y1){//----------------------------------------视频列表     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('视频','视频','视频','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp1&ft1='.$uid.'"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">返回</span></a>
</div><div class="space"     id="sosu">woheni</div>
<div   id="msg">
';
$whn_xd314->total_shangchuanw('plugin.php?id=xd:mp&ft=shangchuan&me=1','');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[media%'  ORDER BY  dateline  DESC");
$fy=$whn_xd314->body_fy($array,$y1,6);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[media%'  ORDER BY  dateline  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[authorid])){
$value[subject]=substr($value[subject], 0 ,10);
$shpx=explode('[/media]',$value[message]);    
$shpx1=explode('[media',$shpx[0]); 
$shpx1=explode(']',$shpx1[1])[1];
echo  '<li class="a-bounceinR"  style="">
<a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/视频播放.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多视频!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
echo  '</div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=shpzhshb&b='.$uid.'"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数



$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}

function  lb_yinyuezhshb($uid,array  $post){//----------------------------------------音乐列表     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC");

$fy=$whn_xd314->body_fy($array,$post[ym],6);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数

$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[authorid])){
$value[subject]=substr($value[subject], 0 ,10);
$yinpinx=explode('[/audio]',$value[message]);   
$yinpinx1=explode('[audio]',$yinpinx[0])[1];
echo  '<li class="a-bounceinR"  style="">
<a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/语音播放.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'</div>
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多音频!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}

function  lb_yinyuezhsh($uid,$y1){//----------------------------------------音乐列表     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('发布语音','发布语音','发布语音','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp1&ft1='.$uid.'"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">返回</span></a>
</div><div class="space"     id="sosu">woheni</div>
<div   id="msg">
';
$whn_xd314->total_shangchuanw('plugin.php?id=xd:mp&ft=shangchuan&me=1','');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC");
$fy=$whn_xd314->body_fy($array,$y1,6);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[authorid])){
$value[subject]=substr($value[subject], 0 ,10);
$yinpinx=explode('[/audio]',$value[message]);   
$yinpinx1=explode('[audio]',$yinpinx[0])[1];
echo  '<li class="a-bounceinR"  style="">
<a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/语音播放.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'</div>
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多音频!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
echo  '</div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=yinyuezhshbb&b='.$uid.'"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数



$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}

function  gzsh_user(array $_G){//------------------------------------------用户中心
$whn_xd314=new   whn_xd;
$n1= DB::fetch_all("SELECT * FROM ".DB::table('mpzp')." WHERE  (z=''  AND  ip=".$_G['uid'].") OR (z=''  AND  uid=".$_G['uid'].")");
$n= DB::fetch_all("SELECT  * FROM ".DB::table('mpzp')." WHERE  (ip=".$_G['uid'].") OR (uid=".$_G['uid'].")");
$sandd= DB::fetch_all("SELECT * FROM " .DB::table('sandd')."  WHERE      x11='".$_G[uid]."'");
$sandd='('.count($sandd).')';
$xd314= DB::fetch_all("SELECT  x2  FROM ".DB::table('mp')." WHERE  uid=".$_G[uid])[0][x2];
$cou= DB::fetch_all("SELECT extcredits3 FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$shouyi= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')." WHERE      x='".$_G[uid]."'"); 
foreach($shouyi as $key =>$value){
$a+=$value[x5];
}
if($a==''){$a=0;}
$shouyi=$a;
$shouyi1= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')." WHERE       x1='".$_G[uid]."'"); 
foreach($shouyi1 as $key =>$value){
$b+=$value[x5];
}
if($b==''){$b=0;}
$shouyi1=$b;
$title='用户中心';
$whn_xd314->total_start('用户中心','用户中心','用户中心','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo   '
<div class="wrap pb9">
  <div class="user_head">
    <div class="user_img_pb" style="background:url(uc_server/avatar.php?uid='.$_G[uid].'&size=small) center;background-size:100%"></div>
    <div class="user_bg"></div>
    <div class="user_img">
      <table>
        <tr>
          <td><img src="uc_server/avatar.php?uid='.$_G[uid].'&size=big">
            <div class="user_name">'.$_G[member][username];
if($_GET[ac] == 'pay'){echo  '<span class="money">'.$extcredit_tilte.':'.$user_info[extcredit_number].'</span>';}
echo  '
</div></td>
        </tr>
      </table>
    </div>
  </div>';
if($_G[uid]==8109){
echo  '
<a href="https://api.mch.weixin.qq.com/pay/unifiedorder"     style="display:none"><div   class="submit1"  style="background:#BEBEBE;border-radius:5px">小云APPjs接口</div></a>
 <a href="http://www.woheni99.com/mobcent/app/web/js/appbyme/xd314.html"><div   class="submit1"  style="background:#BEBEBE;border-radius:5px">小云APPjs接口</div></a>
';
 }
echo  '
<div class="user_nav"><div id="msg"></div>
    <ul>
<a href="plugin.php?id=fn_pinche&ac=pay"><li   class="PayStateGo"><span class="iconfont"><img  src="wjxa/久久币.png"   style="width:20px;margin-bottom:-4px"/></span>久久币:<span class="money">'.$cou[extcredits3].'</span><b>点击充值</b></li></a>
<a href="plugin.php?id=xd:tx_gl&ft=mytx"><li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/提现.png"   style="width:20px;margin-bottom:-4px"/></span>提现<b  style="color:#BEBEBE">》</b></li></a>
<a href="plugin.php?id=xd:tuiguang&a=fsgl"><li   class="Logout"  style="color:#3C3C3C;display:none"><span class="iconfont"><img  src="wjxa/center卡包.png"   style="width:20px;margin-bottom:-4px"/></span>我的卡包<b  style="color:#BEBEBE">》</b></li></a>
<a href="plugin.php?id=xd:tuiguang&a=zhfjl"><li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/tg记录.png"   style="width:20px;margin-bottom:-4px"/></span>支付记录('.$shouyi1.')<b  style="color:#BEBEBE">》</b></li></a>
<a href="plugin.php?id=xd:straight1&a=shouyi"><li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/收益.png"   style="width:20px;margin-bottom:-4px"/></span>收益记录('.$shouyi.')<b  style="color:#BEBEBE">》</b></li></a>

	  <li class="Logout"  style=""><a href="mobcent/app/web/js/appbyme/denglu.php"><span class="iconfont">&#xe60e;</span>退出<em class="iconfont">&#xe77b;</em></a></li>
    </ul>
    <div class="both"></div>
  </div>
<div class="space">dd</div>';
$yem='usercenter';
echo  '
<script>
var y1=0;

function ajax()
{
y1=y1+1;
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 
var url="https://api.mch.weixin.qq.com/pay/unifiedorder";
xmlHttp.onreadystatechange=function (){ if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ var resp=xmlHttp.responseText;var resp1=document.getElementById("msg").innerHTML;document.getElementById("msg").innerHTML=resp1+resp;alert(resp);
}}
xmlHttp.open("POST",url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
xmlHttp.send("f=GetPayFirst&orderid=2&formhash=ab67afbb");
} 
</script>
</div>
';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}

function  x_weizhi($uid){//-----------------------------------------地址页面     参数：$_G
$array= DB::fetch_all("SELECT  * FROM ".DB::table('mp')." WHERE     uid=".$uid)[0];
$ftype=explode('|',$array[x15]); 
$weizhi=$ftype[1];
$weizhi1=$ftype[2].'|'.$ftype[3];
$name=$ftype[0];
//echo '<script language="JavaScript">alert("'.$weizhi.'");</script>';
include template('xd:mp5');
}

function  dzh($uid,$ty){//----------------------------------------地址函数   参数：$uid用户uid，$ty文件类型
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

function shzh_tollstation(array  $_G,$b,$c){//----------------------------------------打赏扣除久久币  
//echo '<script language="JavaScript">alert("'.$gx.'");</script>';
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhipai')." WHERE   x4=1   AND     x1=".$c)[0]; 
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE   uid=".$_G[uid])[0];
$memb= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$c)[0];
if($b=='1'){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-0.1;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+0.05;
$cou1[extcredits4]=$cou1[extcredits4]+0.05;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET     extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'      WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','0.05','1','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.01;
$cou2[extcredits4]=$cou2[extcredits4]+0.01;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','0.01','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.01;
$cou2[extcredits4]=$cou2[extcredits4]+0.01;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','0.01','','','".$c."','','','','','','','','','','','','','','','','')");
}
}else  if($b==2){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-0.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+0.3;
$cou1[extcredits4]=$cou1[extcredits4]+0.3;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'        WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','0.3','2','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.06;
$cou2[extcredits4]=$cou2[extcredits4]+0.06;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET    extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'       WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','0.06','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.06;
$cou2[extcredits4]=$cou2[extcredits4]+0.06;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','0.06','','','".$c."','','','','','','','','','','','','','','','','')");
}
}else  if($b==3){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+3;
$cou1[extcredits4]=$cou1[extcredits4]+3;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'       WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','3','3','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.6;
$cou2[extcredits4]=$cou2[extcredits4]+0.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET     extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'        WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','0.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.6;
$cou2[extcredits4]=$cou2[extcredits4]+0.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','0.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
}else  if($b==4){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-16;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou[extcredits3]."'      WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+8;
$cou1[extcredits4]=$cou1[extcredits4]+8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET     extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'        WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','8','4','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+1.6;
$cou2[extcredits4]=$cou2[extcredits4]+1.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET     extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'      WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','1.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+1.6;
$cou2[extcredits4]=$cou2[extcredits4]+1.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','1.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
}else  if($b==5){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-66;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+33;
$cou1[extcredits4]=$cou1[extcredits4]+33;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'        WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','194','5','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+6.6;
$cou2[extcredits4]=$cou2[extcredits4]+6.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'       WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','6.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+6.6;
$cou2[extcredits4]=$cou2[extcredits4]+6.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','6.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
}else  if($b==6){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-128;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+64;
$cou1[extcredits4]=$cou1[extcredits4]+64;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'       WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','64','6','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+12.8;
$cou2[extcredits4]=$cou2[extcredits4]+12.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'       WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','12.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+12.8;
$cou2[extcredits4]=$cou2[extcredits4]+12.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','12.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
}else  if($b==7){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-288;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+144;
$cou1[extcredits4]=$cou1[extcredits4]+144;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'        WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','144','7','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+28.8;
$cou2[extcredits4]=$cou2[extcredits4]+28.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'      WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','28.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+28.8;
$cou2[extcredits4]=$cou2[extcredits4]+28.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','28.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
}else  if($b==8){
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou[extcredits3]=$cou[extcredits3]-388;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$c)[0];
$cou1[extcredits3]=$cou1[extcredits3]+194;
$cou1[extcredits4]=$cou1[extcredits4]+194;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET     extcredits3='".$cou1[extcredits3]."',extcredits4='".$cou1[extcredits4]."'       WHERE uid=".$c);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','打赏','194','8','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+38.8;
$cou2[extcredits4]=$cou2[extcredits4]+38.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'        WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','38.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+38.8;
$cou2[extcredits4]=$cou2[extcredits4]+38.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','提成','38.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
}


echo '<script language="JavaScript">alert("已打赏！当前还有【'.$cou[extcredits3].'】久久币");</script>';
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:straight1&a=shang&b='.$c.'";</script>';
}

function  x_kt(array $_G){//---------------------------------------开通工作室
/*
$whn_xd314=new   whn_xd;
//echo '<script language="JavaScript">alert("'.$tollstation.'");</script>';

$b='';
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
if(empty($cou[extcredits3])){$cou[extcredits3]=0;}
if(empty($cou[extcredits4])){$cou[extcredits4]=0;}
$mp=DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE  uid=".$_G[uid])[0];
if(empty($mp[x11])){$mp[x11]=0;}
$sandd= DB::fetch_all("SELECT * FROM " .DB::table('sandd')."  WHERE      x11='".$_G[uid]."'");
$sandd='('.count($sandd).')';
$n= DB::fetch_all("SELECT  * FROM ".DB::table('mpzp')." WHERE  (ip=".$_G['uid'].") OR (uid=".$_G['uid'].")");
if(count($n)>0){$b='<img   src="wjxa/post.png"  width=15px  style="" />';}
if(empty($array1[0][x3])){$jj='一键生成我的工作室';}else{$jj='查看我的工作室';}
$n1= DB::fetch_all("SELECT * FROM ".DB::table('mpzp')." WHERE  (z=''  AND  ip=".$_G['uid'].") OR (z=''  AND  uid=".$_G['uid'].")");
$n1=count($n1);
$tp= DB::fetch_all("SELECT  x10  FROM ".DB::table('mp')." WHERE  uid=".$_G[uid])[0][x10];
$sublist=DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$_G['uid']."  AND  fid=100    AND  first=1  ORDER  BY  pid   DESC    LIMIT  0,5");
$n3=DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$_G['uid'])[0];
$guanzhu= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x=".$_G[uid]); 
$guanzhu=count($guanzhu);
$dizhi_to='plugin.php?id=xd:mp1&ft1='.$_G[uid];//跳转地址
$dizhi_b='plugin.php?id=xd:mp&ft=ttouxiangshch';//表单提交地址
$ftype=explode('_',$tp); 
$title=$n3[username].'的工作室';
$script='
var a="plugin.php?id=xd:mp1&ft1='.$_G['uid'].'&r='.$_G['uid'].'";
function  fx(){
if(confirm("分享后您将可获得对方在此工作室中消费的提成！是否确认分享！(在[我和你99]APP中分享才有效！)")){
connectSQJavascriptBridge(function(){
sq.share("'.$title.'", "点击查看详情",a, function(result){
  alert(result.errInfo);
});
});
}
}
 ';
$script=htmlspecialchars_decode($script , ENT_NOQUOTES );



include template('xd:mp');
*/
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:notes_zhanshi&a=7";</script>';
}

function  jibie($j){//---------------------------------------打赏级别   参数：$uid用户uid，$ty文件类型
switch ($j){
case '1':
return '<img  src="wjxa_liwu/1 久久币 鲜花.png"    style="width:40px" />';
break;
case '2':
return '<img  src="wjxa_liwu/6 久久币 点赞.png"    style="width:40px" />';
break;
case '3':
return '<img  src="wjxa_liwu/66 久久币 蓝宝石.png"    style="width:40px" />';
break;
case '4':
return '<img  src="wjxa_liwu/168 世界名表.png"    style="width:40px" />';
break;
case '5':
return '<img  src="wjxa_liwu/388 豪华超跑.png"    style="width:40px" />';
break;
case '6':
return '<img  src="wjxa_liwu/888 久久币 豪华私人游艇.png"    style="width:40px" />';
break;
case '7':
return '<img  src="wjxa_liwu/6666 久久币 超级飞机.png"    style="width:40px" />';
break;
case '8':
return '<img  src="wjxa_liwu/9999 永恒火箭.png"    style="width:40px" />';
break;
default:
return '';
break;
}
}

function  x_tollstation(array $_G,$uid){//----------------------------------------打赏

}

function shzh_jinb(array  $_G){//----------------------------------------扣除金币  $gx专卖店uid
//echo '<script language="JavaScript">alert("'.$gx.'");</script>';
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('mp')."  WHERE   uid=".$_G[uid])[0];
if($cou1[x17]=='1'){
$cou[extcredits2]=$cou[extcredits2]-5;
$cou1[x17]=2;
}else  if($cou1[x17]==2){
$cou[extcredits2]=$cou[extcredits2]-10;
$cou1[x17]=3;
}else  if($cou1[x17]==3){
$cou[extcredits2]=$cou[extcredits2]-20;
$cou1[x17]=4;
}else  if($cou1[x17]==4){
$cou[extcredits2]=$cou[extcredits2]-40;
$cou1[x17]=5;
}else  if($cou1[x17]==5){
$cou[extcredits2]=$cou[extcredits2]-45;
$cou1[x17]=6;
}else  if($cou1[x17]==6){
$cou[extcredits2]=$cou[extcredits2]-80;
$cou1[x17]=6;
}else{
$cou[extcredits2]=$cou[extcredits2]-5;
$cou1[x17]=2;
}

$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits2='".$cou[extcredits2]."'     WHERE uid=".$_G[uid]);
$a= DB::query("UPDATE ".DB::table('mp')." SET    x='".$_G[timestamp]."',x17='".$cou1[x17]."'     WHERE uid=".$_G[uid]);
echo '<script language="JavaScript">alert("已升级名片！");</script>';
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
}
function  timetotime($time){//--------------------------------------获取下个月当天的时间戳 
$time=date('Y年m月d日 H:i:s', $time);
$y=explode('年',$time);
$m=explode('月',$y[1]);
$d=explode('日',$m[1]);
$date=$y[0].'-'.($m[0]+1).'-'.$d[0].$d[1];
return  strtotime($date);
}

function timetostring1($t,$t1){//-----------------------------------------------------------------------------------------------------------时间倒推  $t
$y=date("Y",$t);
$y1=date("Y",$t1);
$m=date("m",$t);
$m1=date("m",$t1);
$d=date("d",$t);
$d1=date("d",$t1);
$h=date("H",$t);
$h1=date("H",$t1);
$i=date("i",$t);
$i1=date("i",$t1);

if(($y-$y1)>1){$y2=$y-$y1;$y2=$y2.'年';
}else if(($y-$y1)==1){$m2=12+$m-$m1;$m2=$m2.'个月';
}else if($y==$y1){
if(($m-$m1)>1){$m2=$m-$m1;$m2=$m2.'个月';
}else if(($m-$m1)==1){$d2=30+$d-$d1;$d2=$d2.'天';
}else if($m==$m1){
if(($d-$d1)>1){$d2=$d-$d1;$d2=$d2.'天';
}else if(($d-$d1)==1){$h2=24+$h-$h1;$h2=$h2.'个小时';
}else if($d==$d1){
if(($h-$h1)>1){$h2=$h-$h1;$h2=$h2.'个小时';
}else if(($h-$h1)==1){$i2=60+$i-$i1;$i2=$i2.'分钟';
}else if($h==$h1){
if($i>$i1){$i2=$i-$i1;$i2=$i2.'分钟';
}
}
}
}
}

$t2=$y2.$m2.$d2.$h2.$i2;
//echo '<script language="JavaScript">alert("'.$t1.'");</script>';	
return  	$t2;
}


function  x_shji(array $_G){//----------------------------------------升级
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('mp')."  WHERE   uid=".$_G[uid])[0];
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------名片级别清零
if(!empty($cou1[x])){
$time=date('Y年m月d日 H:i:s', $cou1[x]);
$y=explode('年',$time);
$m=explode('月',$y[1]);
$d=explode('日',$m[1]);
$date=$y[0].'-'.($m[0]+1).'-'.$d[0].$d[1];
if(strtotime($date)<$_G['timestamp']){
$a= DB::query("UPDATE ".DB::table('mp')." SET  x17='1'     WHERE uid=".$_G[uid]);
}
}
if(empty($cou1[x17])){$cou1[x17]=1;}


$jinb=array("5","5","10","20","40","45","80");
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];

$title='升级名片样式';

$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
include template('xd:basic_mp_style');	
}


function  lb_dizhi(array $_G){//-----------------------------------------地址设置页面     参数：$_G
$n= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$_G['uid'])[0];
$ftype=explode('|',$n[x15]); 
$title=lang('plugin/xd', 'mp11.0');
$name=$_G['username'];
$tit=$ftype[0];
$content=$ftype[1];
$pointx=$ftype[2];
$pointy=$ftype[3];
if($ftype[4]=="true"){$pointdt="checked";}else{$pointdt="";}
//echo '<script language="JavaScript">alert("'.$ftype[4].'");</script>';
$dizhi_b='plugin.php?id=xd:mp&ft=tdizhi1';
include template('xd:mp3');	
}



function  lb_name($s){//----------------------------------------姓名设置页面    参数：$s默认数据

$body=lang('plugin/xd', 'mp6.0').'<input  autoFocus  name="name" id="name"   type="text"  value="'.date("Y-m-d  h:i:s",$s).'"  style="width:100%;height:50px;font-size:15px"/>';
$title=lang('plugin/xd', 'mp6');
$dizhi_b='plugin.php?id=xd:mp&ft=tname1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
include template('xd:mp2');	
}


function  lb_zhiwu($s){//----------------------------------------职务等级设置页面    参数：$s默认数据 
$action_f='plugin.php?id=xd:mp&ft=tzhiwu1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$placeholder='请在以下输入框中修改职务信息';
$name='name';
$value=$s;
$title='职务';
$text_fanhui='返回';
$text_baocun='保存';
//$type='tel';
include template('xd:customer_edit');
}
function  lb_dianhua($s){//----------------------------------------电话设置页面   参数：$s默认数据
$action_f='plugin.php?id=xd:mp&ft=tdianhua1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$placeholder='请在此修改电话号码';
$name='name';
$value=$s;
$title='电话';
$text_fanhui='返回';
$text_baocun='保存';
//$type='tel';
include template('xd:customer_edit');
}
function  lb_QQ($s){//----------------------------------------QQ设置页面       参数：$s默认数据
$action_f='plugin.php?id=xd:mp&ft=tQQ1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$placeholder='请在此修改QQ号';
$name='content';
$value=$s;
$title='QQ号';
$text_fanhui='返回';
$text_baocun='保存';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_youxiang($s){//-----------------------------------------邮箱设置页面      参数：$s默认数据
$action_f='plugin.php?id=xd:mp&ft=tyouxiang1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$placeholder='请在此修改邮箱地址';
$name='content';
$value=$s;
$title='邮箱地址';
$text_fanhui='返回';
$text_baocun='保存';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_wangzhi($s){//-----------------------------------------网站网址设置页面  参数：$s默认数据
$body=lang('plugin/xd', 'mp15').lang('plugin/xd', 'mp.2').'<input   autoFocus   name="name" id="name"   type="text"  value="'.$s.'" style="width:100%;height:50px"/>';
$title=lang('plugin/xd', 'mp15');
$dizhi_b='plugin.php?id=xd:mp&ft=twangzhi1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
include template('xd:mp2');	
}

function  lb_weixin($s){//----------------------------------------微信号设置页面  参数：$s默认数据
$action_f='plugin.php?id=xd:mp&ft=tweixin1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$placeholder='请在此修改微信号';
$name='name';
$value=$s;
$title='微信号';
$text_fanhui='返回';
$text_baocun='保存';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_weixinerwm($uid){//-----------------------------------------顾客邀请二维码设置页面     参数：$uid用户uid


$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid);
$ftype=explode('_',$array1[0][x7]); 
$a=0;

$b='<br/><a href="https://woheni99.com/forum.php?mod=viewthread&tid=10584&page=1&extra=#pid11829  "><div   align="center"  style=""><span     style="font-size:25px;color:white;border-radius:5px;border:1px solid #FF9797;background:#d41d3c;width:87%;height:40px;line-height:40px">&nbsp如何设置请点此查看&nbsp</span></div></a>';
while(!empty($ftype[$a])){ 
$flist=$ftype[$a];
$arr[$a]='<div   align="center"><img src="'.dzh($uid,'t').'/'.$flist.'" align="center"  style="width:200px;height:200px;"/> </div>';
$a+=1;
}

$title1="t1";
$title=lang('plugin/xd', 'mp13.1');
$dizhi_b='plugin.php?id=xd:mp&ft=shangchuan1&me=0';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$gl='<a href="plugin.php?id=xd:mp&ft=tmp">
<span  style="float:right;color:white;height:26px;margin-right:5px;font-size:15px">'.lang('plugin/xd', 'hdp15').'</span></a> ';
$b1='<br/><a href="javascript:void(0);" onclick="a()"><div   align="center"  style="font-size:25px;color:#3C3C3C">点击<button    style="font-size:25px;margin-right:5px;color:white;background:#d41d3c;border-radius:10%"  >上传</button>邀请二维码</div></a>';
$me=0;
include template('xd:hdp2');	
}

function  lb_qianming($s){//---------------------------------------滚动公告设置页面       参数：$s默认数据
$action_f='plugin.php?id=xd:mp&ft=tqianming1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$placeholder='请在此输入滚动公告';
$name='name';
$value=$s;
$title='滚动公告';
$text_fanhui='返回';
$text_baocun='保存';
//$type='tel';
include template('xd:customer_edit');
}

function   lb_biaoqian($s){//---------------------------------------我的标签设置页面   参数：$s默认数据
$body=lang('plugin/xd', 'mp17').lang('plugin/xd', 'mp.2').'<input     autoFocus      name="name" id="name"   type="text" value="'.$s.'" style="width:100%;height:50px"/>';
$title=lang('plugin/xd', 'mp17');
$dizhi_b='plugin.php?id=xd:mp&ft=tbiaoqian1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
include template('xd:mp2');	
}

function  lb_t1($uid){//----------------------------------------图片列表1     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid);
$ftype=explode('_',$array1[0][x10]); 
if(count($ftype)<=6){
$dizhi_b='plugin.php?id=xd:mp&ft=shangchuan&me=0';//表单提交地址
}else{echo '<script language="JavaScript">alert("最多可上传6张！");</script>';}

$whn_xd314->total_start('发布视频','发布视频','发布视频','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
$whn_xd314->total_shangchuant($dizhi_b,'');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">返回</span></a>
</div><div class="space"     id="sosu">woheni</div>
';

if(count($ftype)>0){
foreach($ftype as $key =>$value){
if(!empty($value)){
echo  '<div style="width:150px;height:200px;float:left;margin:0 0 10px   10px;background:url('.dzh($uid,'t1').'/'.$value.') no-repeat;background-size:100% 100%;"><a href="plugin.php?id=xd:mp&ft=delete&ft2='.$value.'&me=0"><input  type="button"  style="color:black;font-size:15px;background:#F0F0F0;margin:8px;border-radius:8px;float:right" value="'.lang('plugin/xd', 'hdp12').'"/></a><br/>
<a href="plugin.php?id=xd:mp&ft=tt&ft2='.$value.'&ft1='.$uid.'"    target="_blank"><input  type="button"  style="color:white;font-size:15px;margin:2px;margin-left:0px;width:150px;height:120px;background:white;filter:alpha(opacity=100);opacity: 0" value="点击查看"/></a>
<a href="plugin.php?id=xd:mp&ft=tyidongt&ft2='.$value.'&f=0"><input  type="button"  style="color:black;font-size:15px;background:#F0F0F0;margin:8px;border-radius:8px;" value="'.lang('plugin/xd', 'hdp13').'"/></a><a href="plugin.php?id=xd:mp&ft=tyidongt&ft2='.$value.'&f=1"><input  type="button"  style="color:black;font-size:15px;background:#F0F0F0;margin:8px;border-radius:8px;float:right" value="'.lang('plugin/xd', 'hdp14').'"/></a></div>';
}}
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有图片数据!</div>';}

echo  '<a href="javascript:void(0);" onclick="a()"> <div   class="submit" style="position:fixed;bottom:0px;">上传图片</div></a>';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}

function  lb_shpb($uid,array  $post){//----------------------------------------视频列表     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='视频'  ORDER BY  x3  DESC");

$fy=$whn_xd314->body_fy($array,$post[ym],6);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='视频'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
$flist1=explode('-',$value); 
$flist2=date('Y年m月d日 H:i:s',$flist1[0]);
if(empty($value[x4])){$value[x4]="无标题";}
if(empty($value[x5])){$value[x5]="无详情";}
if($value[x6]==1){$value[x6]="已发布";}else{$value[x6]="未发布";}
echo  '<li class="a-bounceinR"  style="background:#8E8E8E">
<div class="Table">
<table cellpadding="0" cellspacing="0"   style="width:100%">  
<tr   height="30px"  > <td align="center"  style="border-bottom:1px solid #D0D0D0;">
'.$value[x4].'</td><td align="center"  style="border-bottom:1px solid #D0D0D0;"><div  style="">
'.$flist2.'</div>
</td></tr>
<tr   height="90px"  > <td align="center"   colspan="2">
<video width="100%" height="100px"    src="'.dzh($uid,'shp').'/'.$value[x2].'" type="video/mp4"   poster="wjxa/视频.png"> </video>
</div>
</td></tr>
<tr   height="60px"  > <td align="center"  colspan="2">
   <div  style="">'.$value[x5].'</div>
</td></tr>
<tr> <td  align="center">
<div  style="background:#BEBEBE;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-size:20px"><span  style="color:white">'.$value[x6].'</span></td><td align="center"   width="50%">
<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><a href="plugin.php?id=xd:mp&ft=xq_shp&b='.$value[yid].'"><div  style="color:white;width:100%">管理</div></a>
</td></tr> </table></li>';
}}
echo  '</ul></div><div   class="space"    >woheni</div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多视频!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}

function  lb_shp($uid,$y1){//----------------------------------------视频列表     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('发布视频','发布视频','发布视频','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp&ft=tmp"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">返回</span></a>
</div><div class="space"     id="sosu">woheni</div>
<div   id="msg">
';
$whn_xd314->total_shangchuanshp('plugin.php?id=xd:mp&ft=shangchuan&me=2','');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='视频'   ORDER BY  x3  DESC");

$fy=$whn_xd314->body_fy($array,$y1,6);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='视频'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
$flist1=explode('-',$value[x2]); 
$flist2=date('Y年m月d日 H:i:s',$flist1[0]);
if(empty($value[x4])){$value[x4]="无标题";}
if(empty($value[x5])){$value[x5]="无详情";}
if($value[x6]==1){$value[x6]="已发布";}else{$value[x6]="未发布";}
echo  '<li class="a-bounceinR"  style="background:#8E8E8E">
<div class="Table">
<table cellpadding="0" cellspacing="0"   style="width:100%">  
<tr   height="30px"  > <td align="center"  style="border-bottom:1px solid #D0D0D0;">
'.$value[x4].'</td><td align="center"  style="border-bottom:1px solid #D0D0D0;"><div  style="">
'.$flist2.'</div>
</td></tr>
<tr   height="90px"  > <td align="center"   colspan="2">
<video width="100%" height="100px"    src="'.dzh($uid,'shp').'/'.$value[x2].'" type="video/mp4"   poster="wjxa/视频.png"> </video>
</div>
</td></tr>
<tr   height="60px"  > <td align="center"  colspan="2">
   <div  style="">'.$value[x5].'</div>
</td></tr>
<tr> <td  align="center">
<div  style="background:#BEBEBE;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-size:20px"><span  style="color:white">'.$value[x6].'</span></td><td align="center"   width="50%">
<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><a href="plugin.php?id=xd:mp&ft=xq_shp&b='.$value[yid].'"><div  style="color:white;width:100%">管理</div></a>
</td></tr> </table></li>';
}}
echo  '</ul></div><div   class="space"    >woheni</div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多视频!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
echo  '</div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=shpb"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
echo  '<a href="javascript:void(0);" onclick="a()"> <div   class="submit" style="position:fixed;bottom:0px;">上传视频</div></a>';


$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}


function  lb_yinyuec($uid,array  $post){//----------------------------------------论坛c     参数：$array  wjk数据,$array1  mp数据 
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE    x8='".$post[b]."'   ORDER BY  x3  DESC");
if($array[0][yid]!=$post[i]){
echo  $array[0][yid];
}else{
echo $post[i];
}
}

function  lb_yinyued(array  $_G,$uid,array  $post){//----------------------------------------论坛b     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC");
$ttsh=2;
$fy=$whn_xd314->body_fy($array,$post[ym],$ttsh);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='图片1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='文字'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px"></div>';}

}

function  lb_yinyueb(array  $_G,$uid,array  $post){//----------------------------------------论坛b     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC");
$ttsh=3;
$fy=$whn_xd314->body_fy($array,$post[ym],$ttsh);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='图片1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='文字'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px"></div>';}

}

function  lb_yinyue(array  $_G,$uid,$y1){//----------------------------------------论坛     参数：$array  wjk数据,$array1  mp数据 
$whn_xd314=new   whn_xd;
$xtt=$uid;
//echo '<script language="JavaScript">alert("'.$xtt.'");</script>';	
$whn_xd314->total_start('','讲坛','讲坛','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
$whn_xd314->total_shangchuanwz('plugin.php?id=xd:mp&ft=shangchuan&me=3&b='.$xtt,'');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
$whn_xd314->total_shangchuanshp('plugin.php?id=xd:mp&ft=shangchuan&me=2&b='.$xtt,'');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
$whn_xd314->total_shangchuany('plugin.php?id=xd:mp&ft=shangchuan&me=1&b='.$xtt,'');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
$whn_xd314->total_shangchuant('plugin.php?id=xd:mp&ft=shangchuan&me=0&b='.$xtt,'');//----------------------------------------------------------------------------------上传文件；$url        ($dizhi_b，post地址,$dizhi_b1  post地址1）
$ll=explode('luntan',$xtt); 
$array11= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE            x4='1'      AND     x=".$ll[0]); 

echo '
<div class="funbar"    style="height:40px;line-height:40px">
<a href="plugin.php?id=xd:mp1&ft1='.$ll[0].'"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">返回</span></a><img   id="cya"  src="wjxa/成员.png"   style="float:right;width:20px;margin-top:10px;margin-right:8px"/><span   style="float:right;color:white;margin-right:8px;font-size:15px"   >成员：'.count($array11).'</span>
</div><div class="space"  style="height:200px;background:white"   id="sosu">woheni</div>';

$whn_xd314->total_popup1('cy','display:block','','
<div style="background:#F0F0F0;overflow:scroll"><iframe style="border-bottom:solid 1px #9D9D9D;position:fixed;z-index:9;top:0px;left:0px;width:100%"   height="55px"   src="plugin.php?id=xd:assistant&a=5&c='.$ll[0].'" allowfullscreen="" frameborder="0"></iframe></div>

');//-----------------------------------------------------------------------------------弹出框1   $id,$css,$position,$content      启动按钮id为$id.a

$sublist=DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$ll[0]."      AND  first=1   ORDER BY  dateline  DESC   LIMIT  0,1");
if(count($sublist)>0){
foreach($sublist as $key =>$value){
if(!empty($value)){
echo  '
<div   style="position:fixed;z-index:5;top:40px;left:0px;border-bottom:0px solid #E0E0E0;color:#5B5B5B;margin-bottom:8px;background:white;width:100%"><a href="forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"  target="_blank">
<table   border="0"  cellspacing="8"  cellpadding="0"   style="width:100%"><tr><td  style=""> <div><div  style="color:#4F4F4F;padding:8px;font-size:12px;float:left">最新动态：'.$value[subject].'</div><span  style="font-size:12px;color:#BEBEBE;padding:8px;float:right">'.date("y年m月d日 H:i",$value[dateline]).'</span></div></td></tr><tr><td  style="">';
$ftype1=explode('[/attach]',$value[message]);    
$ftypee=explode('[attach]',$ftype1[0]);
$ftypee[0]=substr($ftypee[0], 0 ,80); 
$ftypee[0]=explode('[audio]',$ftypee[0])[0];
$ftypee[0]=explode('[media',$ftypee[0])[0];
$yinpin1=explode('[/audio]',$value[message]);    
$yinpin=explode('[audio]',$yinpin1[0]);
$shp1=explode('[/media]',$value[message]);    
$shp=explode('[media',$shp1[0]);
$shp=explode(']',$shp[1]);


foreach($ftype1  as  $key => $value1){
if($key<=3){
$ftype2=explode('[attach]',$value1)[1];
if(!empty($ftype2)){
$n41=DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.substr($value[tid],-1))." WHERE  aid=".$ftype2)[0]; 
echo  '
<img  src="./data/attachment/forum/'.$n41[attachment].'"  style="width:20%;height:60px;margin-left:8px"   />
';
}
}
}
echo  '</td></tr>
<tr><td  style="width:100%">
<span   style="color:#BEBEBE">';
if(!empty($yinpin[1])){
echo  '<img  src="wjxa/语音播放.png"  style="width:20%;height:50px;margin-left:40%;"   />';
}
if(!empty($shp[1])){
echo   '<img  src="wjxa/视频播放.png"  style="width:40%;height:90px;margin-left:30%;"   />';
}
echo   '
</span >
</td></tr></table></a></div>
              <!--{/loop}--></div>
';


}
}       
}else{echo  '<div  style="position:fixed;z-index:5;top:40px;left:0px;width:100%;text-align:center;padding-top:8px">没有最新动态</div>';}




echo  '

<div   id="msg">
';

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$xtt."'     ORDER BY  x3  DESC");
$fy=$whn_xd314->body_fy($array,$y1,2);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$xtt."'    ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
$qqxx= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE            x4='1'      AND     x='".$ll[0]."'  AND    x1=".$_G[uid]); 
$qqxx1= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE            x4='2'      AND     x='".$_G[uid]."'  AND    x1=".$ll[0]); 
if($_G[uid]==$ll[0]||!empty($qqxx[0])){
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='图片1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='文字'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y年m月d日 H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多消息!</div>';}


echo  '</div><div class="space"  >woheni</div>';
$whn_xd314->total_ajax2('wz1()','"plugin.php?id=xd:mp&ft=shangchuan&me=3"','
var  a=document.getElementById("wz").value;
if(a==""){alert("输入不可为空！");}else{var  content=a;}
','
document.getElementById("wz").value="";fy1(0);
',1,'"content="+content+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数

$whn_xd314->total_ajax2('shx()','"plugin.php?id=xd:mp&ft=tyinyuec"','
','if(resp!=ggxx){ggxx=resp;var k=0;fy1(k);}',1,'"i="+ggxx+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数

$whn_xd314->total_ajax3('fy1(a)','"plugin.php?id=xd:mp&ft=tyinyued"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数


$whn_xd314->total_ajax3('fy(a)','"plugin.php?id=xd:mp&ft=tyinyueb"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
echo  ' 


<div   id="jia"  class="font1" style="position:fixed;bottom:8px;left:10%;border-top:0px solid #3C3C3C;width:80%;display:none">
<div onclick="wz1()"   style="text-align:center;width:22%;margin-top:4px;margin-right:7px;font-size:18px;color:white;height:35px;border:1px solid #DCDCDC;background:#40C2F7;border-radius:10px;float:right">发送</div>

<textarea   autoFocus   placeholder=""   style="width:70%;margin-top:7px;font-size:24px;background:white;resize:none;border:1px solid #F0F0F0;border-radius:5px;margin-right:2%;float:right"   id="wz" rows="1" ></textarea>
</div>
<a     href="javascript:void(0);" onclick="jia()"   style=""><img id="jia1"  src="wjxa/发布.png"   style="width:10%;border-radius:0px;position:fixed;bottom:8px;right:2%;border-top:0px solid #3C3C3C;" ></img></a>
';
}else{
echo  '
<div  style="width:100%;text-align:center;color:red;margin-top:100px;font-size:20px"><span   style="color:#9D9D9D">共有'.$fy[2].'条评论信息！</span><br/><br/>
请登录并加入Ta的工作室<br/>才能查看并发表评论！
</div><br/><br/>
';
if(empty($_G[uid])){
echo  '<div   class="submit">登录</div>';
}else{
if(empty($qqxx1[0])){
echo  '<a  href="plugin.php?id=xd:straight&a=a1&b='.$ll[0].'"><div   class="submit">加入</div></a>';
}else{
echo  '<div   class="submit">请等待批准！</div>';
}
}


}

echo  '
<script>
setTimeout("cy()",2000)
function  cy(){
$("#cy").fadeOut(1000);
}
var zhqq=setInterval("shx()",2000);
var ggxx="'.$array[0][yid].'";
$("#jia1").click(function(){
var a1=document.getElementById("jia");
if(a1.style.display=="none"){$("#jia").fadeIn(1000);$("#jia1").fadeOut(1000);}
});



</script>

';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
}
function  lb_m1($uid){//----------------------------------------展示页模板列表1    参数：$array  wjk数据,$array1  mp数据      图片统一为 .jpg
$whn_xd314=new   whn_xd;
$whn_xd314->total_start(lang('plugin/xd', 'mp18'),lang('plugin/xd', 'mp18'),lang('plugin/xd', 'mp18'),'');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp&ft=tmp"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:18px;margin:18px  0  18px  5px">返回</span></a>
 <a href="plugin.php?id=xd:mp1&ft1='.$uid.'"><span   style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'xd21').'</span></a>
  </div>
<br/><br/><br/><br/>
';
$namee=array("默认风格","完美风格","默认风格","完美风格1");
$namee1=array("2","1","3");
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid)[0];
foreach($namee1   as   $value){
if($value==$array1[x9]){echo '<a href="plugin.php?id=xd:mp&ft=shezhimb&m='.$value.'"><div style="width:47%;height:160px;float:left;text-align:center;border:0px solid blue;color:blue"><img src="./source/plugin/xd/mp/im1/'.$value.'.jpg"   style="margin:10px;height:98px;width:98px" ><br/><span style="">'.$namee[$value].lang('plugin/xd', 'e0').'</span></div></a>';
}else{
echo '<a href="plugin.php?id=xd:mp&ft=shezhimb&m='.$value.'"><div style="width:50%;height:160px;float:left;text-align:center;color:black"><img src="./source/plugin/xd/mp/im1/'.$value.'.jpg"   style="margin:10px;height:100px;width:100px" ><br/><span  style="">'.$namee[$value].'</span></div></a>';
}
} 

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾	
}

function   lb_wqz(array  $_G,$s){//-----------------------------------------我的工作室名称        参数：$s默认数据
$array=DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$_G[uid])[0];
$action_f='plugin.php?id=xd:mp&ft=wqz1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
$placeholder='请在此输入工作室名称';
$name='name';
if(empty($s)){$s=$array[username].'的工作室';}
$value=$s;
$title='工作室名称';
$text_fanhui='返回';
$text_baocun='保存';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_wshd($s){//-----------------------------------------我的商店设置页面     参数：$s默认数据
$body1='<a href="https://woheni99.com/forum.php?mod=viewthread&tid=10589&page=1&extra=#pid11834"><div   align="center"  class="font" style="margin-top:10%"><div     style="font-size:25px;color:white;border-radius:5px;border:1px solid #FF9797;background:#d41d3c;width:87%;height:40px;line-height:40px">&nbsp如何设置请点此查看&nbsp</div></div></a>';

$body='
<br/><div  align="center"  style="100%"><input  autoFocus   placeholder="请在此输入核销商城地址"    name="name" id="name"   type="text"  value="'.$s.'" style="width:87%;height:40px;font-size:20px;border-radius:5px;padding:0px"/></div>
<br/><a href="javascript:void(0);" onclick="x()">
<div  align="center"  style="100%"> <div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#17314c;border-radius:5px" >&nbsp&nbsp保&nbsp存&nbsp&nbsp</div></div></a>
';

$title='核销商城地址';
$dizhi_b='plugin.php?id=xd:mp&ft=wshd1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
include template('xd:mp2');	
}

function  lb_gz_gzsh(array $_G){//------------------------------------------关注的工作室页面     参数：$_G
$n= DB::fetch_all("SELECT mid,time FROM ".DB::table('mpshou')." WHERE   uid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[mid])[0];
$arr[$key]='<a href="plugin.php?id=xd:mp1&ft1='.$value[mid].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[mid],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp59');
$dizhi_f='plugin.php?id=xd:mp';//返回键地址
include template('xd:wjx3');	
}

function  lb_gz_gzsh1(array $_G){//------------------------------------------谁关注了我     参数：$_G
$n= DB::fetch_all("SELECT uid,time FROM ".DB::table('mpshou')." WHERE   mid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[uid])[0];
$arr[$key]='<a href="plugin.php?id=xd:mp1&ft1='.$value[uid].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[uid],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp60');
$dizhi_f='plugin.php?id=xd:mp';//返回键地址
include template('xd:wjx3');	
}

function  lb_z(array $_G){//------------------------------------------谁赞了我     参数：$_G
$n= DB::fetch_all("SELECT time,ip FROM ".DB::table('mpz')." WHERE   uid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[ip])[0];
$arr[$key]='<a href="plugin.php?id=xd:mp1&ft1='.$value[ip].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[ip],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp60');
$dizhi_f='plugin.php?id=xd:mp';//返回键地址
include template('xd:wjx3');	
}

function  lb_quanzi1(array $_G,array $post){//-----------------------------------------圈子设置 参数：$s默认数据
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','圈子','".$name."','".$_G['timestamp']."','','','','','','','','','','','','','','','".$post[content5]."','".$post[content2]."','".$post[content]."','".$post[beizhu]."','".$post[zzhi]."','".$post[qz]."','2')");
return  $coun;
}

function  lb_quanzi(array $_G,$s){//-----------------------------------------圈子设置页面      参数：$s默认数据
$title='申请圈子';
$dizhi_b='plugin.php?id=xd:mp&ft=quanzi1';//表单提交地址
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//返回键地址
include template('xd:basic_edit');	
}


function  lb_wqz1($name,$uid){//----------------------------------------我的工作室名称lb_wqz1(设置       参数：$name数据名,$uid
$a= DB::query("UPDATE ".DB::table('mp')." SET x18='".$name."'   WHERE uid=".$uid);
}
function  lb_wshd1($name,$uid){//----------------------------------------我的商店设置       参数：$name数据名,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x19='".$name."'   WHERE uid=".$uid);
}

function shezhi_dizhi($uid,$content){//----------------------------------------地址设置    参数：$_G
$a= DB::query("UPDATE ".DB::table('mp')." SET x15='".$content."'   WHERE uid=".$uid);
}



function  lb_name1($name,$uid){//----------------------------------------姓名设置 参数：$name数据名,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x='".$name."'   WHERE uid=".$uid);
}
function  lb_zhiwu1($name,$uid){//----------------------------------------职务等级设置    参数：$name数据名,$uid   

$a= DB::query("UPDATE ".DB::table('mp')." SET x1='".$name."'   WHERE uid=".$uid);
}
function  lb_dianhua1($name,$uid){//----------------------------------------电话设置   参数：$name数据名,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x3='".$name."'   WHERE uid=".$uid);
}
function  lb_QQ1($name,$uid){//----------------------------------------QQ设置       参数：$name数据名,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x4='".$name."'   WHERE uid=".$uid);
}
function  lb_youxiang1($name,$uid){//-----------------------------------------邮箱设置      参数：$name数据名,$uid  	
$a= DB::query("UPDATE ".DB::table('mp')." SET x5='".$name."'   WHERE uid=".$uid);
}
/*
function  lb_wangzhi1($name,$uid){//-----------------------------------------网站网址设置  参数：$name数据名,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x9='".$name."'   WHERE uid=".$uid);
}
*/
function  lb_weixin1($name,$uid){//----------------------------------------微信号设置 参数：$name数据名,$uid
$a= DB::query("UPDATE ".DB::table('mp')." SET x6='".$name."'   WHERE uid=".$uid);
}
function  lb_weixinerwm1($t1,$uid){//-----------------------------------------微信二维码设置    参数：$name数据名,$uid  
if(!empty($t1)){$a= DB::query("UPDATE ".DB::table('mp')." SET x7='".$t1."'   WHERE uid=".$uid);}
}
function  lb_qianming1($name,$uid){//---------------------------------------个性签名设置       参数：$name数据名,$uid   
$a= DB::query("UPDATE ".DB::table('mp')." SET x8='".$name."'   WHERE uid=".$uid);
}
function   lb_biaoqian1($name,$uid){//---------------------------------------我的标签设置  参数：$name数据名,$uid   
$a= DB::query("UPDATE ".DB::table('mp')." SET x11='".$name."'   WHERE uid=".$uid);
}
function  shezhi_y($y,$uid){//----------------------------------------音乐设置    参数：$t设置的图片,$y设置的音乐,$array1 mp数据
$array1=DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE    uid=".$uid);
if(!empty($t)){$a= DB::query("UPDATE ".DB::table('mp')." SET x10='".$array1[0][x10].$t."'   WHERE uid=".$uid);}
if(!empty($y)){$a= DB::query("UPDATE ".DB::table('mp')." SET x13='".$y."'   WHERE uid=".$uid);}	
}
function  shezhi_t($t,$uid){//----------------------------------------图片设置    参数：$t设置的图片,$array1 mp数据
$array1=DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE    uid=".$uid);
if(!empty($t)){$a= DB::query("UPDATE ".DB::table('mp')." SET x10='".$array1[0][x10].$t."'   WHERE uid=".$uid);}
if(!empty($y)){$a= DB::query("UPDATE ".DB::table('mp')." SET x13='".$y."'   WHERE uid=".$uid);}	
}
function  shezhi_mb($m,$uid){//----------------------------------------皮肤设置    参数：$m设置的皮肤,$array1 mp数据
if(!empty($m)){$a= DB::query("UPDATE ".DB::table('mp')." SET x9='".$m."'   WHERE uid=".$uid);}
}

function  shpfabu(array  $_G,array $post){//---------------------------------------音乐发布设置    参数：$m是否发布的信息,$uid音乐id
if(!empty($post[c])){
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x6='".$post[c]."'   WHERE  yid=".$post[b]);
if($post[c]==1){echo  '1';}else{echo  '2';}
}else{
echo  '0';
}
}

function  yinyuefabu(array  $_G,array $post){//---------------------------------------音乐发布设置    参数：$m是否发布的信息,$uid音乐id
if(!empty($post[c])){
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x6='".$post[c]."'   WHERE  yid=".$post[b]);
if($post[c]==1){echo  '1';}else{echo  '2';}
}else{
echo  '0';
}
}

function  yinyueshzh1(array  $_G,array $post){//---------------------------------------音乐发布设置    参数：$m是否发布的信息,$uid音乐id
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x4='".$post[4]."',x5='".$post[5]."'   WHERE  yid=".$post[yid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=xq_y&b='.$post[yid].'";</script>';
}

function  shpshzh1(array  $_G,array $post){//---------------------------------------视频发布设置    参数：$m是否发布的信息,$uid音乐id
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x4='".$post[4]."',x5='".$post[5]."'   WHERE  yid=".$post[yid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=xq_shp&b='.$post[yid].'";</script>';
}

function  xq_shp($yid){//----------------------------------------视频详情     参数：$name文件系统名,$array文件箱数据
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE  yid=".$yid)[0]; 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('视频详情','视频详情','视频详情','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '<div   class="funbar"><a href="plugin.php?id=xd:mp&ft=shp"  style="color:white;margin:8px">返回</a> </div><div   class="space">woheni</div>
<div     id="xxi1"  style="display:none">
<fieldset>
<form action="plugin.php?id=xd:mp&ft=shpshzh1" method="post"   style="margin:8px"      accept-charset="utf-8">
<p   class="listbar">视频标题：
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">视频详情：
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>

</fieldset>
<p><input value="提交"  type="submit"   class="submit"      style=""></input></p>
<p><div    class="submit"      id="qqx">取消</div></p>
</form></div>

<div     id="xxi"  style="">
<div     id="xxi2"  style="margin:8px"  >
<p   class="listbar">视频标题：
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">视频详情：
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>
</div>
<hr/>
';
if($array[x6]==1){
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj"  class="yxz">发布</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="xz">不发布</div></a>
</td>
</tr>
</table>';
}else{
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj" class="xz">发布</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="yxz">不发布</div></a>
</td>
</tr>
</table>';
}




echo  '<a href="javascript:void(0);" onclick="delet()"><div class="submit1" style="">删除视频</div></a>
<script>
$("#xxi2").click(function(){
var c=document.getElementById("xxi1").style.display;
if(c=="none"){
$("#xxi1").fadeIn(1);
$("#xxi").fadeOut(1);
}else{
$("#xxi").fadeIn(1);
$("#xxi1").fadeOut(1);
}
});

$("#qqx").click(function(){
var c=document.getElementById("xxi1").style.display;
if(c=="none"){
$("#xxi1").fadeIn(1);
$("#xxi").fadeOut(1);
}else{
$("#xxi").fadeIn(1);
$("#xxi1").fadeOut(1);
}
});

function a(){
document.getElementById("content").value=document.getElementById("c").value;
document.getElementById("content1");
document.getElementById("fo").submit();
}

function delet(){
if(confirm("真要删除吗？")){
window.location.href="plugin.php?id=xd:mp&ft=delete&ft2='.$yid.'&&me=2";}
}

</script>
';
$whn_xd314->total_ajax2('shj(b,c)','"plugin.php?id=xd:mp&ft=shpfabu"','
','
if(resp=="1"){document.getElementById("shj").className="yxz";document.getElementById("xj").className="xz";}else{document.getElementById("xj").className="yxz";document.getElementById("shj").className="xz";}
',1,'"b="+b+"&c="+c');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
	
}


function  xq_y($yid){//----------------------------------------音乐详情     参数：$name文件系统名,$array文件箱数据
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE  yid=".$yid)[0]; 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('语音详情','语音详情','语音详情','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '<div   class="funbar"><a href="plugin.php?id=xd:mp&ft=tyinyue"  style="color:white;margin:8px">返回</a> </div><div   class="space">woheni</div>
<div     id="xxi1"  style="display:none">
<fieldset>
<form action="plugin.php?id=xd:mp&ft=yinyueshzh1" method="post"   style="margin:8px"      accept-charset="utf-8">
<p   class="listbar">语音标题：
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">语音详情：
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>

</fieldset>
<p><input value="提交"  type="submit"   class="submit"      style=""></input></p>
<p><div    class="submit"      id="qqx">取消</div></p>
</form></div>

<div     id="xxi"  style="">
<div     id="xxi2"  style="margin:8px"  >
<p   class="listbar">语音标题：
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">语音详情：
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>
</div>
<hr/>
';
if($array[x6]==1){
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj"  class="yxz">发布</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="xz">不发布</div></a>
</td>
</tr>
</table>';
}else{
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj" class="xz">发布</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="yxz">不发布</div></a>
</td>
</tr>
</table>';
}




echo  '<a href="javascript:void(0);" onclick="delet()"><div class="submit1" style="">删除语音</div></a>
<script>
$("#xxi2").click(function(){
var c=document.getElementById("xxi1").style.display;
if(c=="none"){
$("#xxi1").fadeIn(1);
$("#xxi").fadeOut(1);
}else{
$("#xxi").fadeIn(1);
$("#xxi1").fadeOut(1);
}
});

$("#qqx").click(function(){
var c=document.getElementById("xxi1").style.display;
if(c=="none"){
$("#xxi1").fadeIn(1);
$("#xxi").fadeOut(1);
}else{
$("#xxi").fadeIn(1);
$("#xxi1").fadeOut(1);
}
});

function a(){
document.getElementById("content").value=document.getElementById("c").value;
document.getElementById("content1");
document.getElementById("fo").submit();
}

function delet(){
if(confirm("真要删除吗？")){
window.location.href="plugin.php?id=xd:mp&ft=delete&ft2='.$yid.'&&me=1";}
}

</script>
';
$whn_xd314->total_ajax2('shj(b,c)','"plugin.php?id=xd:mp&ft=yinyuefabu"','
','
if(resp=="1"){document.getElementById("shj").className="yxz";document.getElementById("xj").className="xz";}else{document.getElementById("xj").className="yxz";document.getElementById("shj").className="xz";}
',1,'"b="+b+"&c="+c');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾
	
}

function  xq_t($name,$mid){//----------------------------------------图片详情     参数：$name 图片名,$mid 名片id
$path=dzh($mid,'t1').'/'.$name;   
$b='<img  id="i" src="'.$path.'" width=100%  />';
$dizhi_f='plugin.php?id=xd:mp1&ft1='.$mid;//返回键地址
include template('xd:xq');	
}
function  delete_lb_hdp($uid){//----------------------------------------要删除的幻灯片列表     参数：$array文件箱数据
$xsh=lang('plugin/xd', 'hdp1');
$fso=opendir(dzh($uid,'hdp')); 
$a=0;
$c= file_get_contents(dzh($uid,'hdp').'/xd.txt');
$hdp=unserialize($c);
while($flist=readdir($fso)){ 
if($flist!="."&&$flist!=".."&&$flist!="xd.txt"){
$flist1=$hdp[$flist];
$arr[$a]='
   <a href="plugin.php?id=xd:hdp&ft=deletehdp&run=1&ft2='.$flist.'" ><div  class="font1">'.$flist1.'</div></a>';
$a+=1;
}
} 
closedir($fso) ;
$title=lang('plugin/xd', 'wjx3');
$run="1";
include template('xd:hdp');	
}
function  delete_lb_y($name,$uid){//----------------------------------------要删除的音乐列表     参数：$name幻灯片名;$array文件箱数据
$fso=opendir(dzh($uid,'y')); 
$a=0;
$n=unserialize(file_get_contents(dzh($uid,'y').'/xd.txt'));
while($flist=readdir($fso)){ 
if($flist!="."&&$flist!=".."&&$flist!="xd.txt"){
$flist1=$n[$flist];
$arr[$a]='
   <a href="plugin.php?id=xd:hdp&ft=delete&ft1='.$name.'&run=1&ft2='.$flist.'&me=1" ><div   class="font1">'.$flist1.'</div></a>';
$a+=1;
}
} 
closedir($fso) ;
$dizhi_hdelete='plugin.php?id=xd:hdp&ft=thdp1y&ft1='.$name;//删除页面返回后地址
$run=1;
$title=$name;
$me="1";
include template('xd:wjx1');	
}
function  delete_lb_t($name,$uid){//----------------------------------------要删除的图片列表     参数：$name幻灯片名;$array文件箱数据
$fso=opendir(dzh($uid,'t2')); 
$a=0;
while($flist=readdir($fso)){ 
if($flist!="."&&$flist!=".."&&$flist!="xd.txt"){

$arr[$a]='
   <a href="plugin.php?id=xd:hdp&ft=delete&run=1&ft1='.$name.'&ft2='.$flist.'&me=0"  ><img src="'.dzh($uid,'t2').'/'.$flist.'" width=23% style="margin:0px 0px 10px 0px"></a>';
$a+=1;
}
} 
closedir($fso) ;
$dizhi_hdelete='plugin.php?id=xd:hdp&ft=thdp1t&ft1='.$name;//删除页面返回后地址
$run=1;
$title=lang('plugin/xd', 'wjx1');
$me="0";
include template('xd:wjx1');		
}
function  lb_shezhi($name,$uid){//----------------------------------------幻灯片设置列表    参数：$name幻灯片名；$uid用户序号
$n=unserialize(file_get_contents('wjx/'.$uid.'/hdp/xd.txt'));
$result=array_search($name,$n);
$hdpx1=file_get_contents('wjx/'.$uid.'/hdp/'.$result);
$hdpx=unserialize($hdpx1);
$fk1=explode('_',$hdpx[m])[0]; 
if($fk1==""){$fk1=lang('plugin/xd', 'hdp8.0');}
$fk2=explode('_',$hdpx[t])[0]; 
if($fk2==""){$fk2=lang('plugin/xd', 'hdp8.0');}else{$fk2=lang('plugin/xd', 'hdp8.1');}
$fk3=explode('_',$hdpx[y])[0];
if($fk3==""){$fk3=lang('plugin/xd', 'hdp8.0');}else{$n=unserialize(file_get_contents('wjx/y/xd.txt'));$fk3=$n[$fk3];}
$title=$name;
include template('xd:hdp1');	
}
function  chuangjian_hdp($name,$uid){//----------------------------------------创建幻灯片    参数：$name幻灯片名;$array文件箱数据
$hdp=unserialize(file_get_contents(dzh($uid,'hdp').'/xd.txt'));
$fp = fopen(dzh($uid,'hdp').'/'.$hdp[a].'.txt', 'w+');
$hdp[$hdp[a].'.txt']=$name;
$hdp[a]+=1;
file_put_contents (dzh($uid,'hdp').'/xd.txt',serialize($hdp));
}
function  chongmingming_hdp($name,$name1,$uid){//----------------------------------------幻灯片重命名    参数：$name幻灯片名;新$name幻灯片名;$array文件箱数据
$hdp=unserialize(file_get_contents(dzh($uid,'hdp').'/xd.txt'));
$result=array_search($name,$hdp);
$hdp[$result]=$name1;
file_put_contents(dzh($uid,'hdp').'/xd.txt',serialize($hdp));
}

function  lb_mp(array  $_G){//----------------------------------------我的名片编辑列表页面     参数：$_G
$namee=array("默认风格","简单风格","默认风格");
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$_G[uid]);
$fk15=lang('plugin/xd', 'mp6.1');
$fk1=$_G[username]; 
if($fk1==""){$fk1=lang('plugin/xd', 'hdp8.4');}
$fk2=$array1[0][x1]; 
if($fk2==""){$fk2=lang('plugin/xd', 'hdp8.2');}
$fk3=$array1[0][x3];
if($fk3==""){$fk3=lang('plugin/xd', 'hdp8.4');}
$fk4=$array1[0][x4]; 
if($fk4==""){$fk4=lang('plugin/xd', 'hdp8.2');}
$fk5=$array1[0][x5];
if($fk5==""){$fk5=lang('plugin/xd', 'hdp8.2');}else{$fk5=lang('plugin/xd', 'hdp8.3');}
/*
$fk6=$array1[0][x9]; 
if($fk6==""){$fk6=lang('plugin/xd', 'hdp8.2');}else{$fk6=lang('plugin/xd', 'hdp8.3');}
*/
$fk7=$array1[0][x6];
if($fk7==""){$fk7=lang('plugin/xd', 'hdp8.2');}
$fk8=$array1[0][x7]; 
if($fk8==""){$fk8=lang('plugin/xd', 'hdp8.2');}else{$fk8=lang('plugin/xd', 'hdp8.3');}
$fk9=$array1[0][x8];
if($fk9==""){$fk9=lang('plugin/xd', 'hdp8.2');}
$fk10=$array1[0][x11];
if($fk10==""){$fk10=lang('plugin/xd', 'hdp8.2');}else{$fk10=lang('plugin/xd', 'hdp8.3');}
$fk11=$array1[0][x10];
if($fk11==""){$fk11=lang('plugin/xd', 'hdp8.2');}else{$fk11=lang('plugin/xd', 'hdp8.3');}
$n1=unserialize(file_get_contents(dzh($_G[uid],'y').'/xd.txt'));
$fk12=$n1[$array1[0][x13]];
if($fk12==""){$fk12=lang('plugin/xd', 'hdp8.2');}
$fk13=$namee[$array1[0][x9]]; 
if($fk13==""){$fk13=lang('plugin/xd', 'hdp8.2');}
$fk14=$array1[0][x15];
if($fk14==""){$fk14=lang('plugin/xd', 'hdp8.2');}else{$fk14=lang('plugin/xd', 'hdp8.3');}
$fk15=$array1[0][x18];
if($fk15==""){$fk15=lang('plugin/xd', 'hdp8.2');}else{$fk15=lang('plugin/xd', 'hdp8.3');}
$fk16=$array1[0][x19];
if($fk16==""){$fk16=lang('plugin/xd', 'hdp8.2');}else{$fk16=lang('plugin/xd', 'hdp8.3');}
$fk17=$array1[0][x20];
if($fk17==""){$fk17=lang('plugin/xd', 'hdp8.2');}else{$fk17=lang('plugin/xd', 'hdp8.3');}
$dizhi_to='plugin.php?id=xd:mp1&ft1='.$_G[uid];//跳转地址
$dizhi_b='plugin.php?id=xd:mp&ft=ttouxiangshch';//表单提交地址
$title=lang('plugin/xd', 'mp.0');
include template('xd:mp1');	
}


function  yidongt($name1,array $array1,$f){//----------------------------------------移动图片    参数：$name1图片本地名,$array mp数据,$f 方向（0为左，1为右）
$n=$array1[0];
$ftype=explode('_',$n[x10]); 
$result1=array_search($name1,$ftype);
if("0"==$f){
$result2=$ftype[$result1-1].'_';
if($result2!='_'){
$result3=$name1.'_';
$ftype1=explode($result2.$result3,$n[x10]); 
$ftype1=$ftype1[0].$result3.$result2.$ftype1[1];
$a= DB::query("UPDATE ".DB::table('mp')." SET x10='".$ftype1."'   WHERE uid=".$array1[0][uid]);
}
}else if("1"==$f){
$result2=$ftype[$result1+1].'_';
if($result2!='_'){
$result3=$name1.'_';
$ftype1=explode($result3.$result2,$n[x10]); 
$ftype1=$ftype1[0].$result2.$result3.$ftype1[1];
$a= DB::query("UPDATE ".DB::table('mp')." SET x10='".$ftype1."'   WHERE uid=".$array1[0][uid]);
}
}
}
function  deletehdp($name,$uid,$delete){//----------------------------------------删除幻灯片    参数：$name文件名,$array文件箱数据;delete控制符
if("1"==$delete){
$n=unserialize(file_get_contents(dzh($uid,'hdp').'/xd.txt'));
unset($n[$name]);
file_put_contents (dzh($uid,'hdp').'/xd.txt',serialize($n));
 $n1=unserialize(file_get_contents(dzh($uid,'hdp').'/'.$name));
$ftype=explode('_',$n1[t]); 
foreach ($ftype as $value) 
{ 
 $result = unlink(dzh($uid,'t').'/'.$value); 
$result = unlink(dzh($uid,'t1').'/'.$value); 
$result = unlink(dzh($uid,'t2').'/'.$value); 
} 
 $result = unlink(dzh($uid,'hdp').'/'.$name); 
}
}
function  deletet($name,$uid){//----------------------------------------删除图片     参数：$name文件名,$array文件箱数据
$n=unserialize(file_get_contents(dzh($uid,'t').'/xd.txt'));
unset($n[$name]);
file_put_contents (dzh($uid,'t').'/xd.txt',serialize($n));
 $result = unlink(dzh($uid,'t').'/'.$name); 
$result = unlink(dzh($uid,'t1').'/'.$name); 
$result = unlink(dzh($uid,'t2').'/'.$name); 
}
function  deletet1($name,$uid){//----------------------------------------删除图片1     参数：$name文件名,$array文件箱数据
$array1= DB::fetch_all("SELECT x10 FROM ".DB::table('mp')." WHERE uid=".$uid);
$n=unserialize(file_get_contents(dzh($uid,'t').'/xd.txt'));
unset($n[$name]);
file_put_contents (dzh($uid,'t').'/xd.txt',serialize($n));
 $result = unlink(dzh($uid,'t').'/'.$name); 
$result = unlink(dzh($uid,'t1').'/'.$name); 
$result = unlink(dzh($uid,'t2').'/'.$name); 
$ftype=explode($name.'_',$array1[0][x10]); 
$array1[0][x10]=$ftype[0].$ftype[1];
$a= DB::query("UPDATE ".DB::table('mp')." SET x10='".$array1[0][x10]."'   WHERE uid=".$uid);
}

function  deleteshp($yid,$uid){//----------------------------------------删除视频     参数：$name文件名,$array文件箱数据
$array= DB::fetch_all("SELECT x2 FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
//echo '<script language="JavaScript">alert("'.$uid.'");</script>';	
 $result = unlink(dzh($uid,'shp').'/'.$array); 
$a= DB::query("DELETE  FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
}

function  deletey($yid,$uid){//----------------------------------------删除音乐     参数：$name文件名,$array文件箱数据
$array= DB::fetch_all("SELECT x2 FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
//echo '<script language="JavaScript">alert("'.$uid.'");</script>';	
 $result = unlink(dzh($uid,'y').'/'.$array); 
$a= DB::query("DELETE  FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
}
function  shangchuant1(array $file,$uid){//----------------------------------------上传头像     参数：$file上传图片信息,$array文件箱数据;返回值是本地图片地址
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/jpeg');
$max_size='10000000000';      // 最大文件限制（单位：byte）
   if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
   
  if($file['size']>$max_size){  //判断文件大小是否大于500000字节
     echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!in_array($file['type'],$arrType)){  //判断图片文件的格式
     echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }

    
$c=strrev($file['name']);
$ftype=explode('.',$c); 
$ftype=strrev($ftype[0]);
   if($ftype=="PNG"){$ftype="png";}
if($ftype=="JPG"){$ftype="jpg";}
$path=dzh($uid,'t').$file['name'];
 $path1='uc_server/data/avatar/'.get_avatar($uid,'middle');
$path2='uc_server/data/avatar/'.get_avatar($uid,'small');
$path3='uc_server/data/avatar/'.get_avatar($uid,'big');

   if(!move_uploaded_file($file['tmp_name'],$path)){  
    echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd15').'</div>';
    exit;
    }
   else{ 	 echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd16').'</div>';   }
      }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    if($ftype=="png"){ $img = imagecreatefrompng($path);}
else if($ftype=="jpg"){ $img = imagecreatefromjpeg($path);}
else if($ftype=="gif"){ $img = imagecreatefromgif($path);}
else if($ftype=="jpeg"){ $img = imagecreatefromjpeg($path);}
else if($ftype=="wbmp"){ $img = imagecreatefromwbmp($path);}
 list($width,$height) = getimagesize($path);//获取原图像尺寸的宽度与高度
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
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);//复制可调节尺寸，不可剪切
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(100,100);//为新图像创建一个画布
  imagecopyresized($_img1,$_img,0,0,0,0,100,100,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path1,0, 100);
       imagepng($_img1,$path1,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 
 list($width,$height) = getimagesize($path);//获取原图像尺寸的宽度与高度
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
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);//复制可调节尺寸，不可剪切
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(50,50);//为新图像创建一个画布
  imagecopyresized($_img1,$_img,0,0,0,0,50,50,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path2,0, 100);
       imagepng($_img1,$path2,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 
 list($width,$height) = getimagesize($path);//获取原图像尺寸的宽度与高度
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
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);//复制可调节尺寸，不可剪切
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(200,200);//为新图像创建一个画布
  imagecopyresized($_img1,$_img,0,0,0,0,200,200,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path3,0, 100);
       imagepng($_img1,$path3,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
        ImageDestroy($img);  
$result = unlink($path);
return  $path;
}
function  shangchuant(array $_G,array $file,$name){//----------------------------------------上传图片     参数：$file上传图片信息,$array文件箱数据;返回值是本地图片地址,$uid工作室uid+系统名
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/jpeg');
$max_size='10000000000';      // 最大文件限制（单位：byte）
$upfile=dzh($_G[uid],'t');  //图片目录路径
   if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
     if(!is_uploaded_file($file['tmp_name'])){ //判断上传文件是否存在
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
  if($file['size']>$max_size){  //判断文件大小是否大于500000字节
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!in_array($file['type'],$arrType)){  //判断图片文件的格式
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
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
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd14').'</div>';
    exit;
     }
   if(!move_uploaded_file($file['tmp_name'],$picName)){  
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd15').'</div>';
    exit;
    }
   else{ 	 echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd16').'</div>';   }
      }
$path=dzh($_G[uid],'t1').'/'.$fname; 
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
$path=dzh($_G[uid],'t2').'/'.$fname; 
      
      

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
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','图片1','".$fname."','".$_G['timestamp']."','无标题','无详情','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function  shangchuanshp(array $_G,array $file,$name){//----------------------------------------上传视频    参数：$file上传图片信息,$array文件箱数据
$max_size='90000000000';      // 最大文件限制（单位：byte）
$upfile=dzh($_G[uid],'shp');  //图片目录路径
  //echo '<script language="JavaScript">alert("大大大大大大大大大大");</script>';
   if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
     if(!is_uploaded_file($file['tmp_name'])){ //判断上传文件是否存在
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
 if($file['type']!='video/mp4'){  //判断图片文件的格式
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }

  if($file['size']>$max_size){  //判断文件大小是否大于500000字节
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!file_exists($upfile)){  // 判断存放文件目录是否存在
   mkdir($upfile,0777,true);
   } 
  
// echo '<script language="JavaScript">alert("'.$file['name'].'");</script>';	
$fname=$_G['timestamp'].'-'.$_G['uid'].'.mp4';
   $picName=$upfile.'/'.$fname;
  
   if(file_exists($picName)){
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd14').'</div>';
    exit;
     }
   if(!move_uploaded_file($file['tmp_name'],$picName)){  
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd15').'</div>';
    exit;
    }
   else{
     echo "<font color='#FF0000'>视频文件上传中</font>";
    }
      }
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','视频','".$fname."','".$_G['timestamp']."','无标题','无详情','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function  shangchuanwz(array $_G,array $post){//----------------------------------------上传文字     参数：$file上传图片信息,$array文件箱数据
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','文字','".$post[content]."','".$_G['timestamp']."','无标题','无详情','2','','".$post[b]."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function  shangchuany(array $_G,array $file,$name){//----------------------------------------上传音乐     参数：$file上传图片信息,$array文件箱数据
$max_size='10000000000';      // 最大文件限制（单位：byte）
$upfile=dzh($_G[uid],'y');  //图片目录路径
  
   if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
     if(!is_uploaded_file($file['tmp_name'])){ //判断上传文件是否存在
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
if($file['type']!='application/octet-stream'){  //判断图片文件的格式
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }

  if($file['size']>$max_size){  //判断文件大小是否大于500000字节
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!file_exists($upfile)){  // 判断存放文件目录是否存在
   mkdir($upfile,0777,true);
   } 
  
// echo '<script language="JavaScript">alert("'.$file['name'].'");</script>';	
$fname=$_G['timestamp'].'-'.$_G['uid'].'.mp3';
   $picName=$upfile.'/'.$fname;
  
   if(file_exists($picName)){
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd14').'</div>';
    exit;
     }
   if(!move_uploaded_file($file['tmp_name'],$picName)){  
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd15').'</div>';
    exit;
    }
   else{
     echo "<font color='#FF0000'>视频文件上传中</font>";
    }
      }
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','语音','".$fname."','".$_G['timestamp']."','无标题','无详情','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function get_lat_and_lng_ByIP($ip)
{
    if(empty($ip))
    {
         return 'IP不能为空';
    }
$content = file_get_contents('https://api.map.baidu.com/location/ip?ak=x2wdWWgqQ3iqSmYIKWk2xozRIj6TRNpZ&ip='.$ip.'&coor=bd09ll');
$json = json_decode($content,true);
     $lng=$json['content']['point']['lat'];//提取经度数据$json->lng;
         $lat=$json['content']['point']['lat'];//提取纬度数据
     return  $json;
}
function get_avatar($uid, $size = 'middle', $type = '') {
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$typeadd = $type == 'real' ? '_real' : '';
	return $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2).$typeadd."_avatar_$size.jpg";
}
//退出Discuz账号 
function discuz_logout($action){ 
if($action == "log"){  
	unset($_SESSION['userid']);  
	unset($_SESSION['username']);  
	echo '注销登录成功！点击此处 <a href="login.html">登录</a>';  
	exit;  
}  
} 
//登录Discuz账号 
function discuz_login($username,$password){ 
require 'E:/ku25.com/wwwroot/bbs/source/class/class_core.php'; //引入系统核心文件 
$discuz = & discuz_core::instance(); //以下代码为创建及初始化对象 
$discuz->cachelist = $cachelist; 
$discuz->init(); 
require libfile('function/member'); 
require libfile('class/member'); 
$_GET['formhash'] = $_G['formhash']; 
$_GET['from'] = 1; 
$_GET['loginsubmit'] = $_GET['infloat'] = 'yes'; 
$_GET['cookietime'] = '2592000'; 
$_GET['username'] = $username; 
$_GET['password'] = $password; 
$ctl_obj = new logging_ctl(); 
$ctl_obj->setting = $_G['setting']; 
$method = 'on_login'; 
//$ctl_obj->template = 'member/login'; 
$ctl_obj->$method(); 
echo "成功登录！".time(); 
} 
?>
