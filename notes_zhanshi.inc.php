<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(empty($_G['username'])){echo '<script language="JavaScript">window.location.href="member.php?mod=logging&action=login";</script>';	}else{
require_once (DISCUZ_ROOT .'./source/plugin/xd/function_xd314_xd.inc.php');
chushihua($_G['uid']);
switch ($_GET["a"]){
case '7'://-------------------------------------------------------------------------主页
$a= DB::query("DELETE  FROM ".DB::table('whn_zhangdan')." WHERE   x='".$_G['uid']."'   AND    x4=''");
if(!empty($_GET[r])){$a= DB::query("UPDATE ".DB::table('mp')." SET x27='".$_GET[r]."'   WHERE uid=".$_G[uid]);	
}else{
$a= DB::query("UPDATE ".DB::table('mp')." SET x27='".$_G[uid]."'   WHERE uid=".$_G[uid]);
}
j($_G,$_GET);	
break;
case '7aa'://-------------------------------------------------------------------------查找地址
jaa($_G,$_POST);	
break;
case 'shuaxin'://-------------------------------------------------------------------------刷新
shuaxin($_G,$_POST);	
break;
case '6_'://-------------------------------------------------------------------------增加主页
$i=i($_G,$_GET);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:notes_zhangdan&a=2a&b='.$i.'";</script>';	
break;
case 'ttouxiangshch'://-----------------------------------------------------------------------------------------------------------------------------头像上传
$t1=shangchuant1($_FILES['upfile'],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:notes_zhanshi&a=7";</script>';
break;
default:
echo '<script language="JavaScript">alert("地址错误！");</script>';	
break;
}
}


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------功能函数   
function  chushihua($uid){//----------------------------------------初始化     参数：$uid用户id,$array文件箱数据            注意：开始只能进行一次，中间如果出问题，需要咨询服务。
//echo '<script language="JavaScript">alert("'.dzh($uid,'hdp').'");</script>';	
if(!file_exists(dzh($uid,'t'))||!file_exists(dzh($uid,'t1'))||!file_exists(dzh($uid,'t2'))){
$a= DB::query("INSERT ".DB::table('mp')." VALUES (".$uid.",'','健康美容顾问','','','','','','','','','','','','完美之梦.mp3','','','','','','','','','','','','','','','','','')");
$a= DB::query("UPDATE ".DB::table('mp')." SET x14='".avatar($uid,'small',true)."'   WHERE uid=".$uid);	
$path2='./wjx/'.$uid.'/t2';   
$path1='./wjx/'.$uid.'/t1'; 
$path='./wjx/'.$uid.'/t'; 
mkdir($path2,0777,true);
mkdir($path1,0777,true);
mkdir($path,0777,true);
$fp = fopen($path.'/xd.txt', 'a+');
$t[a]=1;
file_put_contents ($path.'/xd.txt',serialize($t));
}
}
function  xl(){//----------------------------------------修理施工中   参数：$yid地址id
$whn_xd314=new   whn_xd;
$whn_xd314->total_start2('修理施工中','修理施工中','修理施工中','');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '
<div  style="text-align:center;width:100%;margin-top:20%">
<div  class="kuang"  style="font-size:20px;margin-left:16px;margin-right:16px;border-radius:5px">修理施工中请稍候！！！</div>
</div>';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾	
}

function  i(array $_G,array $get){//----------------------------------------增加   参数：     
$shangchenga= DB::fetch_all("SELECT * FROM ".DB::table('whn_shangchenga')." WHERE uid=".$get[c])[0]; 
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhangdan')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_zhangdan')." VALUES (".$yid.",'".$_G[uid]."','".$get[b]."','".$get[c]."','','','".$shangchenga[x4]."','','','','','".$_G['timestamp']."','','','1','','','','','','','','','','','')");
return  $yid;
}

function  dzh($uid,$ty){//----------------------------------------地址函数   参数：$uid用户uid，$ty文件类型
switch ($ty){
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

function shu($t){//-----------------------------------------------------------------------------------------------------------计数换算  $t
 if($t>=10000){$t1=floor($t/10000).'万';
}else if($t==''){$t1=0;
}else if($t>=100000000){$t1=floor($t/100000000).'亿';
}else{$t1=$t;}
return  	$t1;
}

function  shuaxin(array  $_G,array  $post){//---------------------------------------刷新   参数：     $content搜索内容
echo  '
<input  id="shuaxin1"   type="hidden"    value="'.count($shuaxin1).'"  />
<input  id="shuaxin2"   type="hidden"    value="'.count($shuaxin2).'"  />
';
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


function  jaa(array  $_G,array  $post){//-----------------------------------------主页客户端   参数：     $content搜索内容
$whn_xd314=new   whn_xd;
switch ($post['caidan']){
case '工作室类别1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x16='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '工作室类别1';
break;
case '工作室类别':
$text_baocun='保存';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
if(empty($mp[x16])){$mp[x16]="请点击设置";}
echo   '
<div   style="text-align:center">
设置工作室类别：<br/><br/>
<select name="gzslb" id="gzslb" style="width:60%;height:60px;border-radius:8px"   value="">		
<option value="'.$mp[x16].'">'.$mp[x16].'</option><option value="养生">养生</option><option value="中医">中医</option><option value="亲子">亲子</option><option value="教育">教育</option><option value="美容">美容</option><option value="商品">商品</option>
<option value="饮食">饮食</option><option value="旅游">旅游</option><option value="服装">服装</option><option value="秘方">秘方</option><option value="租住">租住</option></select><br/><br/><br/><br/><br/><br/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="gzslb1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case '自我介绍1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x1='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '自我介绍1';
break;
case '自我介绍':
$text_baocun='保存';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
设置自我介绍：
<input  autoFocus      placeholder="'.$placeholder.'"    name="zwjs"    id="zwjs"   type="text"    value="'.$mp[x1].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="zwjs1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '添加电话1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x3='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '添加电话1';
break;
case '添加电话':
$text_baocun='保存';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
设置联系电话：
<input  autoFocus      placeholder="'.$placeholder.'"    name="tjdh"    id="tjdh"   type="text"    value="'.$mp[x3].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="tjdh1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '添加微信1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x6='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '添加微信1';
break;
case '添加微信':
$text_baocun='保存';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
设置微信号：
<input  autoFocus      placeholder="'.$placeholder.'"    name="tjwx"    id="tjwx"   type="text"    value="'.$mp[x6].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="tjwx1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '工作室名1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x18='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '工作室名1';
break;
case '工作室名':
$text_baocun='保存';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
设置工作室名称：
<input  autoFocus      placeholder="'.$placeholder.'"    name="gzshm"    id="gzshm"   type="text"    value="'.$mp[x18].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="gzshm1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '升级名片样式1':
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('mp')."  WHERE   uid=".$_G[uid])[0];
if($cou1[x17]=='1'){
$cou[extcredits3]=$cou[extcredits3]-0.1;
$cou1[x17]=2;
}else  if($cou1[x17]==2){
$cou[extcredits3]=$cou[extcredits3]-0.5;
$cou1[x17]=3;
}else  if($cou1[x17]==3){
$cou[extcredits3]=$cou[extcredits3]-1;
$cou1[x17]=4;
}else  if($cou1[x17]==4){
$cou[extcredits3]=$cou[extcredits3]-2;
$cou1[x17]=5;
}else  if($cou1[x17]==5){
$cou[extcredits3]=$cou[extcredits3]-2;
$cou1[x17]=6;
}else  if($cou1[x17]==6){
$cou[extcredits3]=$cou[extcredits3]-3;
$cou1[x17]=6;
}else{
$cou[extcredits3]=$cou[extcredits3]-0.1;
$cou1[x17]=2;
}

$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou[extcredits3]."'     WHERE uid=".$_G[uid]);
$a= DB::query("UPDATE ".DB::table('mp')." SET    x='".$_G[timestamp]."',x17='".$cou1[x17]."'     WHERE uid=".$_G[uid]);
echo   '升级名片样式1';
break;
case '升级名片样式':
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('mp')."  WHERE   uid=".$_G[uid])[0];
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
$jinb=array("0.1","0.1","0.5","1","2","2","3");
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
if($cou1[x17]==6){
echo   '
<br/>
<div   style="margin-left:6%;margin-right:6%;width:87%;color:#8E8E8E;font-size:20px;border-radius:10px;border:1px solid #FF9797" >当前级别'.$cou1[x17].'级；已达到顶级！</div>
<br/>
<div   style="margin-left:8px;margin-bottom:8px;text-align:center" >当前级别样式</div>
<div   style="text-align:center" ><img   src="wjxa/jb6l.jpg"    style="width:80%;height:400px;border-radius:10px"  /></div>
<div   style="color:white;height:90px">woheni</div>
</form>';
}else{
echo  '
<br/>
 <div   style="margin-left:6%;margin-right:6%;color:#8E8E8E;font-size:20px;border-radius:10px;border:1px solid #FF9797" >当前级别'.$cou1[x17].'级；是否要升级到'.($cou1[x17]+1).'级！<br/>升级后可以获得'.($cou1[x17]+1).'级的帖子显示与名片式样！</div>
<br/>
<div   style="margin-left:8px;text-align:center;margin-bottom:8px" >当前级别样式</div>
<div   style="text-align:center" ><img   src="wjxa/jb'.$cou1[x17].'l.jpg"    style="width:80%;height:400px;border-radius:10px"  /></div>
<div   style="color:white;height:90px">woheni</div>
<div   style="margin-left:8px;text-align:center;margin-bottom:8px" >升级后样式</div>
<div   style="text-align:center" ><img   src="wjxa/jb'.($cou1[x17]+1).'l.jpg"    style="width:80%;height:400px;border-radius:10px"  /></div>

<br/>
<div   style="color:white;height:90px">woheni</div>
<a href="javascript:void(0);" onclick="shjmpysh1(\''.$cou[extcredits3].'\',\''.$jinb[$cou1[x17]].'\')">
<div   align="center"  style="100%"> <div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >现在升级</div></div></a>

<div   style="color:white;height:100px">woheni</div>';
}

if(!empty($cou1[x17])&&$cou1[x17]!=1){
echo  '
<div   style="color:#8E8E8E;font-size:20px;border-radius:10px;border:0px solid #FF9797;text-align:center;margin-bottom:8px" >距离当前样式使用期限还有'.timetostring1(timetotime($cou1[x]),$_G[timestamp]).'</div>
';
}

break;
case   '发布公告1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x8='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '发布公告1';
break;
case '发布公告':
$text_baocun='保存';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
设置公告内容：
<input  autoFocus      placeholder="'.$placeholder.'"    name="fbgg"    id="fbgg"   type="text"    value="'.$mp[x8].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="fbgg1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case '列表1':
$whn_xd314=new   whn_xd;
if($post[leixing]=="名称"){
if(!empty($post[neirong])&&$post[neirong]!=""){$post[neirong]=" WHERE   username   LIKE  '%".$post[neirong]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[neirong]); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[neirong]."      LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x='".$_G[uid]."'    AND   x1=".$value[uid])[0]; 
if(!empty($arr[yid])){$xshi='已关注';}else{$xshi='关注';}
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$value[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="javascript:void(0);" onclick="gzshguanzhu(\''.$value[uid].'\')"><span  style="margin-left:8px;color:white">'.$xshi.'</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有符合条件的工作室!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}else  if($post[leixing]=="账号"){
if(!empty($post[neirong])&&$post[neirong]!=""){$post[neirong]=$post[neirong]-1001212;$post[neirong]=" WHERE   uid=".$post[neirong];}
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[neirong]."    ORDER BY  x11  DESC  "); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[neirong]."         ORDER BY  x11  DESC       LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x='".$_G[uid]."'    AND   x1=".$value[uid])[0]; 
if(!empty($arr[yid])){$xshi='已关注';}else{$xshi='关注';}
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="javascript:void(0);" onclick="gzshguanzhu(\''.$value[uid].'\')"><span  style="margin-left:8px;color:white">'.$xshi.'</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有符合条件的工作室!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}else{
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member')); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member')."      LIMIT   ".$fy[0].",".$fy[3]);
//echo 'hhh';
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
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
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
}
break;
case '列表':
$whn_xd314=new   whn_xd;
if($post[leixing]=="账号"){
if(!empty($post[neirong])&&$post[neirong]!=""){$post[neirong]=$post[neirong]-1001212;$post[neirong]=" AND   x1='".$post[neirong]."'";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x4='2'   ".$post[neirong]."  AND       x=".$_G[uid]); 

$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE       x4='2'     ".$post[neirong]."     AND      x='".$_G[uid]."'      LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if($value[x1]!=$_G[uid]){
$member= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[x1])[0];
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE   uid=".$value[x1])[0];
echo  '<li class="a-bounceinR">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[x1].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$member[uid].'&size=big" class="Face">
          <div class="Name">'.$member[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td   align="center">
<div id="'.$value[yid].'"></div>
</td></tr>
<tr> <td   align="center">
<a href="javascript:void(0);" onclick="gl(\''.$value[yid].'\',\''.$value[yid].'a\')"><div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><span  style="margin-left:8px;color:white"    id="'.$value[yid].'a">管理</span></div></a>
</td></tr> </table></a></li>';
}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有关注的大咖!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
echo  '</div>';
}else{
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE        x4='2'   AND       x=".$_G[uid]); 

$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE       x4='2'   AND      x='".$_G[uid]."'      LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if($value[x1]!=$_G[uid]){
$member= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[x1])[0];
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE   uid=".$value[x1])[0];
echo  '<li class="a-bounceinR">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[x1].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$member[uid].'&size=big" class="Face">
          <div class="Name">'.$member[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">查看工作室</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td   align="center">
<div id="'.$value[yid].'"></div>
</td></tr>
<tr> <td   align="center">
<a href="javascript:void(0);" onclick="gl(\''.$value[yid].'\',\''.$value[yid].'a\')"><div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><span  style="margin-left:8px;color:white"    id="'.$value[yid].'a">管理</span></div></a>
</td></tr> </table></a></li>';
}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">没有更多要加入的粉丝!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数。
echo  '</div>';
}
break;
case '取消':

echo '取消';
break;
case '删除关注':
$a= DB::query("DELETE  FROM ".DB::table('whn_guanzhu')." WHERE   yid=".$post['canshu2']);
echo '删除关注';
break;
case '工作室关注':
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x='".$_G[uid]."'    AND   x1=".$post['canshu2'])[0]; 
$member= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$post['canshu2'])[0];
if(!empty($arr[yid])){
echo '已关注';
}else{
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_guanzhu')." VALUES (".$yid.",'".$_G[uid]."','".$post['canshu2']."','".$member[username]."','".$_G['timestamp']."','2','','','','','','','','','','','','','','','','','','','','')");
echo '已关注';
}
break;
case '关注':
$whn_xd314=new   whn_xd;
$arraya= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE       x4='2'   AND    x5=5     AND        x=".$post['canshu']); 
$fy=$whn_xd314->body_fy($arraya,$post[ym],12);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE        x4='2'    AND    x5=5      AND        x=".$post['canshu']."      ORDER BY  x5  DESC  LIMIT   ".$fy[0].",".$fy[3]);
//$www=$post['canshu2']+count($array)*60+20;
if(count($arraya)>0){
echo  '
<table   border="0"  cellspacing="4"  cellpadding="0"    style="height:45px;float:left">
<tr style="height:45px"  >';
foreach($array as $key =>$value){
if(!empty($value[yid])){
if($value[x5]==5){
$xxi='<span   style="color:red;position:relative;top:-40px;left:0px">●</span>';
}else{
$xxi='';
}
$mem= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE      uid=".$value[x1])[0]; 
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE      uid=".$value[x1])[0]; 
$mem=mb_substr($mem[username], 0 ,2,"gbk");
if(empty($mp[x16])){
$mp[x16]="养";
}else{
$xiangmu= DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE      x20=".$value[x1])[0];
if(empty($xiangmu[uid])){   
$mp[x16]=mb_substr($mp[x16], 0 ,1,"gbk");
}else{
$mp[x16]=mb_substr($xiangmu[x5], 0 ,1,"gbk");
}
}
 echo   '
<td  style="border:solid 0px #F0F0F0;border-radius:12%"><a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[x1].'"  target="_blank"><div   style="width:50px">
<img src="'.avatar($value[x1],middle,true).'"   style="height:40px;width:40px;border-radius:20px;margin-left:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:10px"><span  style="color:#8E8E8E;font-size:8px;font-weight:bold">['.$mp[x16].']</span>'.$mem.$xxi.'</div></div>
</a>
</td>
';
 }
}

echo  '<td    id="ff2">';
$yy=$whn_xd314->body_fy4_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数 输出  显示内容，下个页码
echo   '
<a  href="javascript:void(0);"   onclick="';
if($yy[0]!="到底啦！"){
echo  'guanzhu(\''.$yy[1].'\')';
}
echo  '"   style="color:black"><div  style="color:#4F4F4F;font-size:15px;width:60px;height:60px;float:left;text-align:center;line-height:60px">'.$yy[0].'</div></a>
</td></tr></table>';
}else{
 echo   '
<td  style="width:60px"><div  style="font-size:20px;margin-left:8px;color:#9D9D9D">还没有关注工作室的信息！</div></td>
';
}      
break;
case '工作室':
$whn_xd314=new   whn_xd;
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')."     ORDER   BY  x11 DESC "); 
$fy=$whn_xd314->body_fy($array1,$post[ym],29);//---------------------------------------列表(输出区间限制数组array($t2,$t3,$t,$t1,$y,$y1))   参数：array $array  列表数据,$y1  页码(固定为$_GET[ft0]),$t1每页条数
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp')."      ORDER   BY  x11  DESC     LIMIT   ".$fy[0].",".$fy[3]);
foreach($array as $key =>$value){
if(!empty($value)){
//$value= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE      uid=".$value[uid])[0]; 
$mem= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE      uid=".$value[uid])[0]; 
$mem=mb_substr($mem[username], 0 ,3,"gbk");
if(empty($value[x16])){
$value[x16]="养";
}else{
$xiangmu= DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE      x20=".$value[uid])[0];
if(empty($xiangmu[uid])){   
$value[x16]=mb_substr($value[x16], 0 ,1,"gbk");
}else{
$value[x16]=mb_substr($xiangmu[x5], 0 ,1,"gbk");
}
}
if($post[ym]==0){
if($key==0){
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border:1px solid #EA7500;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px">'.$mem.'</div>
<img src="wjxa/zhmda.png"   style="margin-left:27.5px;height:20px;width:15px">
</div>
</a>
';
}else  if($key==1){
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border:1px solid #00CACA;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px">'.$mem.'</div>
<img src="wjxa/zhmdb.png"   style="margin-left:27.5px;height:21px;width:15px">
</div>
</a>
';
}else  if($key==2){
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border:1px solid #EA7500;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px">'.$mem.'</div>
<img src="wjxa/zhmdc.png"   style="margin-left:27.5px;height:20px;width:15px">
</div>
</a>
';
}else  if($key>2&&$key<=11){$key=$key+1;
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px"><span  style="color:#8E8E8E;font-size:8px;font-weight:bold">['.$value[x16].']</span>'.$mem.'</div>
<div  style="color:#AD5A5A;width:100%;text-align:center;font-size:8px">'.$key.'</div></div>
</a>
';
}else  if($key>11&&$key<=20){$key=$key+1;
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px"><span  style="color:#8E8E8E;font-size:8px;font-weight:bold">['.$value[x16].']</span>'.$mem.'</div>
<div  style="color:#AFAF61;width:100%;text-align:center;font-size:8px">'.$key.'</div></div>
</a>
';
}else  if($key>20&&$key<=28){$key=$key+1;
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px"><span  style="color:#8E8E8E;font-size:8px;font-weight:bold">['.$value[x16].']</span>'.$mem.'</div>
<div  style="color:#5CADAD;width:100%;text-align:center;font-size:8px">'.$key.'</div></div>
</a>
';
}else{$key=$key+1;
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px"><span  style="color:#8E8E8E;font-size:8px;font-weight:bold">['.$value[x16].']</span>'.$mem.'</div><div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px">'.$key.'</div></div>
</a>
';}
 
}else{
 echo   '
<a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"  target="_blank"><div   style="width:70px;height:70px;float:left">
<img src="'.avatar($value[uid],middle,true).'"   style="margin-left:20px;height:30px;width:30px;border-radius:20px;margin-top:5px">
<div  style="color:#8E8E8E;width:100%;text-align:center;font-size:8px"><span  style="color:#8E8E8E;font-size:8px;font-weight:bold">['.$value[x16].']</span>'.$mem.'</div></div>
</a>
';
}
 }
}
echo  '<div    id="ff1">';
$yy=$whn_xd314->body_fy4_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------列表   参数：$t2,$t3,$t,$t1,$y,$y1,开始条号，结束条号，总条数，每页条数，总页数,页码；$dzh地址中的参数 输出  显示内容，下个页码
echo   '
<a  href="javascript:void(0);"   onclick="';
if($yy[0]!="到底啦！"){
echo  'paihang(\''.$yy[1].'\')';
}
echo  '"   style="color:black"><div  style="color:#4F4F4F;font-size:15px;width:70px;height:60px;float:left;text-align:center;line-height:60px">'.$yy[0].'</div></a>
</div>';
break;
default:
echo    '参数错误！';
break;
}
}

function  j(array  $_G,array  $get){//----------------------------------------主页客户端   参数：     $content搜索内容
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
$dizhi_to='plugin.php?id=xd:notes_zhuye&a=7&c='.$_G[uid];//跳转地址
$dizhi_b='plugin.php?id=xd:notes_zhanshi&a=ttouxiangshch';//表单提交地址
$ftype=explode('_',$tp); 
$title=$n3[username].'的工作室';


$whn_xd314=new   whn_xd;
$whn_xd314->total_start1($title,$title,$title,'','#F0F0F0');//-----------------------------------------------------------------------------------html文件主体开头   $title,$keywords,$description,$head
echo  '<style type="text/css">
.city{font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white}
select{  -webkit-appearance: none;}   
.cd1{width:100%;border-top:1px solid #F0F0F0;background:white;color:#0080FF;height:100%;font-size:20px;padding-top:2px}  
.cd{width:100%;border-top:1px solid #F0F0F0;background:white;color:#7B7B7B;height:100%;font-size:20px;padding-top:2px}  
.prompt{color:#7B7B7B;text-align:center}   
li{float:left;width:25%;text-align:center}
.iconfont1{color:#7B7B7B}
</style>
<form id="a1" action="'.$dizhi_b.'" method="post" enctype="multipart/form-data">  
  <input name="upfile" id="upfile" type="file" accept="image/*"  style="display:none"  onchange="b(this)"/>
  <input name="upload" id="upload" type="submit" value="上传" style="display:none" />
</form>
<input  id="canshu"   name="canshu"   type="hidden"    value="'.$_G[uid].'"  />
<input  id="canshu1"   name="canshu1"   type="hidden"    value=""  />
<input  id="canshu2"   name="canshu2"   type="hidden"    value=""  />
<div   id="msg1"></div>
<div   style="width:100%;height:800px;position:fixed;z-index:5;top:0px;left:0px;display:none"     id="sbg"  ></div>
<div   style="display:none"   id="ssss">
<table   width="100%"     bordercolor="#E0E0E0"  border="0"  cellspacing="8"  cellpadding="0"    style="">
<tr  align="center">
<td>
<select name="leixing" id="leixing" style="font-size:15px;width:100px;color:#4F4F4F;border-radius:5px;border:1px solid #d41d3c;padding:0px;height:36px;float:left;background:white"       >		
<option value="账号">工作室账号</option><option value="名称">工作室名称</option></select>
</td>
<td   width="70%">
<input  id="neirong"   name="neirong"   type="text"  style="width:100%;font-size:15px;color:#4F4F4F;border-radius:5px;border:1px solid #d41d3c;padding:0px;height:36px"  value=""   placeholder="请输入"/>
</td>
<td>
<a  href="javascript:void(0);" onclick="fy(\'0\')"><span  style="width:70px;float:right;height:36px;color:#d41d3c;border-radius:5px;background:white;line-height:36px">搜索</span></a>
</td>
</tr>
</table></div>
<div  style="background:#5B5B5B;height:40px;display:none">
<table   width="100%"     bordercolor="#E0E0E0"  border="0"  cellspacing="8"  cellpadding="0"    style="">
<tr  align="center"   style="">
<td   align="left"    width="20%"   style="">
<a href="javascript:history.back(-1)"><span style="margin-left:8px;color:white">返回</span></a>
</td>
<td    align="left"    width="25%"   style="border-radius:18px"> 
<select name="caidan" id="caidan" style="font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white;width:70%"       onchange="chuli()"   >		
<option value="初始">初始</option><option value="工作室类别">工作室类别</option><option value="工作室类别1">工作室类别1</option><option value="自我介绍">自我介绍</option><option value="自我介绍1">自我介绍1</option><option value="添加电话1">添加电话1</option><option value="添加电话">添加电话</option><option value="添加电话1">添加电话1</option><option value="添加微信">添加微信</option><option value="添加微信1">添加微信1</option><option value="升级名片样式">升级名片样式</option><option value="升级名片样式1">升级名片样式1</option><option value="工作室名">工作室名</option><option value="工作室名1">工作室名1</option><option value="发布公告">发布公告</option><option value="发布公告1">发布公告1</option><option value="关注">关注</option><option value="设置">设置</option><option value="工作室">工作室</option><option value="工作室关注">工作室关注</option><option value="删除关注">删除关注</option><option value="列表">列表</option><option value="列表1">列表1</option><option value="历史">历史</option></select>
</td>
<td      width="20%">
</td>
</tr></table></div>
<div    id="tuiss"  style="display:none">
<div     style="background:none">
    <div class="TopLogo"> 
      <div class="TopLogoName"   style="margin-left:5px">';
if(empty($mp[x16])){
$mp[x16]="养生";
}else{
$mp[x16]=mb_substr($mp[x16], 0 ,3,"gbk");
}

$title=mb_substr($title, 0 ,10,"gbk");
$i=1001212+$mp[uid];
echo   '<div  style="color:white;line-height:40px;float:right"> 编号:'.$i.'</div>';


echo  '
</div>
    </div>
   <a href="javascript:void(0);" onclick="fx()"    style="color:white"><img  src="wjxa/分享.png"   style="width:30px;margin-top:3px;float:right;margin-right:8px"/></a>

  </div>
<div     style="background:url(wjxa/zhuye_bg.jpg) no-repeat;background-size:100%  100%;background-attachment:fixed;padding-top:30px">
 <table    style="width:100%">
        <tr   align="center">
          <td><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$_G[uid].'"><img src="uc_server/avatar.php?uid='.$_G[uid].'&size=big"    style="border-radius:360%;width:70px;height:70px"></a>
            
        </tr>
<tr  align="center">
          <td><div style="color:white">'.$title.'<span  style="color:#E0E0E0;font-size:10px;font-weight:bold">['.$mp[x16].']</span></div><br/></td>
        </tr>
      </table></div>
<div class="Top bg"   style="height:100px;line-height:100px;position:static;background:#46A3FF;display:none">
    <a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$_G[uid].'" ><div class="TopLogo" > <img src="'.avatar($_G[uid],middle,true).'"     style="margin-top:16px;width:70px;height:70px">
      <div>';
if(empty($mp[x16])){
$mp[x16]="养生";
}else{
$mp[x16]=mb_substr($mp[x16], 0 ,3,"gbk");
}

$title=mb_substr($title, 0 ,4,"gbk");
echo   '<span  style="font-size:18px">'.$title.'</span><span  style="color:#E0E0E0;font-size:15px;font-weight:bold">['.$mp[x16].']</span>';

$i=1001212+$mp[uid];
echo  '
</div>
    </div></a>
   <a href="javascript:void(0);" onclick="fx()"    style="color:white"><img  src="wjxa/分享.png"   style="width:30px;margin-top:3px;float:right;margin-right:9px"/></a>
 <div  style="color:white;line-height:40px;float:right"> 编号:'.$i.'</div>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx"    style="border-top:0.1px solid #97CBFF;border-bottom:0px solid #97CBFF">
    <ul>
<li   style="width:30%"><a href="plugin.php?id=fn_pinche&ac=pay"     style="color:#7B7B7B;font-size:20px"> '.$cou[extcredits3].'<br/><span      style="color:#7B7B7B;font-size:12px">余额</span></a> </li>
<li   style="width:40%"><a  style="color:#7B7B7B;font-size:20px">'.$mp[x11].'<br/><span      style="color:#7B7B7B;font-size:12px">主页浏览量</span></a></li>
<li   style="width:30%"><a href="plugin.php?id=xd:straight1&a=shouyi"    style="color:#7B7B7B;font-size:20px">'.$cou[extcredits4].'<br/><span      style="color:#7B7B7B;font-size:12px">聚宝盆收益</span></a> </li>
    </ul>
  </div>
';

$xiangmu=DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE     x24='1'   AND   x20=".$_G['uid'])[0]; 
 if(!empty($xiangmu[uid])){
echo '
<div class="fixed1_nav fixed1_nav_no_wx"   style="border-bottom:solid 1px #F0F0F0;border-top:8px solid #F0F0F0;">
    <ul>
      <a href="javascript:void(0);" onclick="lieb()"><li   style="width:100%;color:#4F4F4F"><span   style="float:left;font-size:13px;margin-left:8px">关注的工作室:('.$guanzhu.')</span> <span   style="float:right;font-size:13px;margin-right:8px;color:#4F4F4F">管理我的关注</span><span  style="float:right;font-size:20px;margin-top:-2px;margin-right:5px;color:#4F4F4F">+</span></li></a>
    </ul>
  </div>
<div style="background:#FCFCFC;overflow:scroll">
<div   id="msg2"  style="width:1550px" ></div></div>

<div class="fixed1_nav fixed1_nav_no_wx"   style="border-top:solid 8px #F0F0F0;border-bottom:solid 1px #F0F0F0">
    <ul>
      <li     style="width:100%"> <span   style="font-size:15px;color:#4F4F4F">项目管理</span> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
<li   style="width:25%"><a href="plugin.php?id=xd:tuiguang&a=chyu"  > <span class="iconfont"><img   src="wjxa/gzsh会员管理.png"     style="width:45%;"/></span> 会员管理</a> </li>
<li   style="width:25%"><a href="plugin.php?id=xd:xiangmu&ft=ttupiantb&b='.$_G['uid'].'"  > <span class="iconfont"><img   src="wjxa/gzsh项目图片.png"     style="width:45%;"/></span>项目图片</a> </li> 
<li   style="width:25%"><a href="plugin.php?id=xd:shangchuan_dpu&ft=ttupiantb&b='.$_G['uid'].'"  > <span class="iconfont"><img   src="wjxa/gzsh店铺广告图.png"     style="width:45%;"/></span>店铺公告图</a> </li> 
<li  style="width:25%"><a href="plugin.php?id=xd:shangchengb"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh项目产品.png"     style="width:45%;"/></span> 项目产品 </a> </li>
<li  style="width:25%"><a  href="plugin.php?id=xd:notes_dingdanb&a=7"  ><span class="iconfont"><img   src="wjxa/gzsh订单管理.png"     style="width:45%"/></span>订单管理</a> </li>
';
}

echo  '


<div class="fixed1_nav fixed1_nav_no_wx"  style="display:none">
    <ul>

 <li  style=""><a href="plugin.php?id=xd:shangchengb"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_商城.png"     style="width:50%"/></span>  发布产品 </a> </li>
<li><a href=""  class="add"   style="display:none"> <span class="iconfont"    > <img   src="wjxa/留言.png"     style="width:50%"/></span>  留言管理</a> </li>
    </ul>
  </div>


<div class="fixed1_nav fixed1_nav_no_wx"   style="border-bottom:solid 1px #F0F0F0;border-top:solid 8px #F0F0F0">
    <ul>
      <li     style="width:100%"> <span   style="font-size:15px;color:#4F4F4F"> 我的专区</span> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
  <li><a href="javascript:void(0);" onclick="dongtai()"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh发布动态.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">发布</span></a> </li>
      <li><a href="javascript:void(0);" onclick="a11()"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh我的二维码.png"      style="width:37%"/></span> <span   style="line-height:27px;font-size:15px">二维码 </span></a> </li>
<li><a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$_G['uid'].'"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh查看主页.png"      style="width:40%"/></span>  <span   style="line-height:20px;font-size:15px">主页</span></a> </li>
<li><a href="javascript:void(0);" onclick="fx()"  class="add"> <span class="iconfont"   style="margin-top:3px"><img   src="wjxa/gzsh分享工作室.png"      style="width:40%"/></span>  <span   style="line-height:20px;font-size:15px">分享</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>';
if($n1!=0){
echo  '
<li   style="width:25%"><a href="plugin.php?id=xd:communication&a=xiaoxi"  > <span class="iconfont"><img   src="wjxa/gzshi消息.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">消息('.$n1.')</span></a> </li> ';
}
echo  '
<li  style="width:25%"><a href="plugin.php?id=xd:mpa&ft=shpzhsh"  > <span class="iconfont"><img   src="wjxa/gzsh发布视频.png"      style="width:40%"/></span> <span   style="line-height:18px;font-size:15px">视频</span></a> </li>  
<li    style="width:25%"><a href="plugin.php?id=xd:straight&a=chyu"  > <span class="iconfont"><img   src="wjxa/gzsh粉丝管理.png"      style="width:40%"/></span><span   style="line-height:26px;font-size:15px"> 粉丝</span></a> </li>
';
$zhipai= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhipai')." WHERE   x4=1  AND    x=".$_G[uid]);
$zhipai=count($zhipai);
echo  '
<li  style="width:25%"><a href="plugin.php?id=xd:straight1&a=wdkt"  > <span class="iconfont"><img   src="wjxa/gzsh下级合伙人.png"      style="width:40%"/></span> <span   style="line-height:21px;font-size:15px">下级('.$zhipai.')</span></a> </li>  
';
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhipai')." WHERE   x4=2  AND    x1=".$_G[uid])[0];
$arr1= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhipai')." WHERE   x4=1  AND    x1=".$_G[uid])[0];
if(!empty($arr[yid])){
echo   '
<li  style="width:25%"><a href="plugin.php?id=xd:straight1&a=chyu"  > <span class="iconfont"><img   src="wjxa/gzsh邀请通知.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">邀请(1)</span></a> </li>  
';
}
if(!empty($arr1[yid])){
echo   '
<li  style="width:25%"><a href="plugin.php?id=xd:straight1&a=hhr"  > <span class="iconfont"><img   src="wjxa/gzsh上级合伙人.png"      style="width:40%"/></span> <span   style="line-height:22px;font-size:15px">上级</span></a> </li>  
';
}
$xingmu= DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE   x20=".$_G[uid]);
$xingmu=count($xingmu);
echo  '
<li  style="width:25%"><a href="plugin.php?id=xd:xiangmu&ft=0"  > <span class="iconfont"><img   src="wjxa/gzsh立项申请.png"      style="width:40%;margin-top:2px"/></span> <span   style="line-height:20px;font-size:15px">立项('.$xingmu.')</span></a> </li>  
';
if($sandd!="(0)"){
echo  '
<li   style="width:25%"><a href="plugin.php?id=xd:sandd&a=x_xq2"  > <span class="iconfont"><img   src="wjxa/gzsh咨询.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">咨询'.$sandd.'</span></a> </li> ';}
echo  '
   </ul>
  </div> ';


echo '
<div class="fixed1_nav fixed1_nav_no_wx"   style="border-bottom:solid 1px #F0F0F0;border-top:solid 8px #F0F0F0;margin-top:16px">
    <ul>
      <a href="javascript:void(0);" onclick="lieb1()"><li   style="width:100%"><span   style="float:left;font-size:13px;margin-left:8px;color:#4F4F4F">工作室人气排行</span> <span   style="float:right;font-size:13px;margin-right:8px;color:#4F4F4F">查看所有</span></li></a>
    </ul>
  </div>
<div style="background:white;overflow:scroll;width:100%;height:90px"><div   id="msg3"   style="width:2100px"></div></div>

<div   style="height:60px;color:white">woheni</div></div>

<div id="datePlugin"></div>
<div id="erw1"  style="width:100%;height:800px;position:fixed;z-index:9;top:0px;left:0px;display:none;background:url(\'wjxa/fjj.jpg\') no-repeat;background-size:100% 100%;"><div style="margin:5px;float:right;width:10%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:10px;background:#272727">×</div></div>
<div id="erw" style="position:fixed;z-index:9;top:10%;left:15%;width:70%;display:none"><div id="output"  style="width:100%"></div><div  style="width:100%;text-align:center"><span style="position:relative;top:20px;width:100%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:5px">'.$n3[username].'的工作室二维码</span></div>
</div>';
 if(empty($mp[x3])||empty($mp[x6])){
echo  '
<form  id="f1"  action="plugin.php?id=xd:mp1&ft=shzh" method="post"   accept-charset="utf-8" >
<div    align="center"  style="position:fixed;z-index:9;top:20%;left:20%;background:white;width:60%;border-radius:5px;padding:8px"> <div   style="width:87%;color:#3C3C3C;font-size:20px;border-radius:10px;border:1px solid #FF9797" >&nbsp&nbsp请填写联系信息&nbsp&nbsp</div>
<br/><div  align="center"  style="100%"><input   autoFocus   placeholder="请输入电话号码"  name="dh"    id="dh"   type="text" value="'.$mp[x3].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/></div>
<br/><div  align="center"  style="100%"><input  autoFocus   placeholder="请输入微信号"   name="wx"      id="wx"    type="text" value="'.$mp[x6].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/></div>
<br/>
</form>
<div  align="center"  style="100%">
<a href="javascript:void(0);" onclick="tdwx()">
 <div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#40C2F7;border-radius:10px" >&nbsp&nbsp提&nbsp交&nbsp&nbsp</div></a>
<div    align="left"  style="background:white;width:90%;border-radius:5px;padding:8px"> <div   style="color:#3C3C3C;font-size:15px;border-radius:10px;" >您也可以在下方设置工作室中设置！</div></div>';
}


echo  '
</div>
<div   id="msg"></div>
 

<table   width="100%"     bordercolor="white"  border="0"  cellspacing="0"  cellpadding="0"    style="position:fixed;bottom:0px;z-index:9">
<tr  align="center"   style="">
<td      style="width:25%;height:50px">
<a  href="javascript:void(0);" onclick="zhifuu()"  style=""><div       id="cd1"><span class="iconfont"   style="font-size:25px;">&#xe60c;</span><br/><div   style="font-size:12px;margin-top:-4px">主页</div></div> </a>
</td>
<td      style="width:25%;height:50px">
<a  href="javascript:void(0);" onclick="shzh()"  > <div   id="cd2"><span class="iconfont"  style="font-size:25px;"><img   src="wjxa/设置.png"    style="width:15%" /></span><br/><div   style="font-size:12px;margin-top:-4px">设置工作室</div></div></a>
</td>
<td      style="width:25%;height:50px">
<a  href="plugin.php?id=xd:mp&ft=gzsh_user"  > <div   id="cd3"><span class="iconfont"   style="font-size:25px;" >&#xe629;</span><br/><div   style="font-size:12px;margin-top:-6px">我的</div></div></a>
</td>
</tr></table>

<div style="width:100%;position:fixed;z-index:5;bottom:30%;left:0px;display:none;background:white;height:40%;padding-top:20%"    id="shzh">
<ul>
       <li><a href="javascript:void(0);" onclick="fbgg()"  class="add"> <span class="iconfont"><img   src="wjxa/公告.png"     style="width:21%"/></span> <br/><span class="iconfont1">发布公告 </span></a> </li>
      <li> <a href="javascript:void(0);" onclick="shjmpysh()"> <span class="iconfont"><img   src="wjxa/升级.png"     style="width:25%"    /> </span><br/><span class="iconfont1"> 升级名片样式</span></a> </li> 
      <li> <a href="javascript:void(0);" onclick="tt()"> <span class="iconfont"><img   src="wjxa/头像修改.png"     style="width:25%"    /> </span><br/> <span class="iconfont1">修改头像</span></a> </li>
      <li><a href="javascript:void(0);" onclick="gzshm()"  class="add"> <span class="iconfont"><img   src="wjxa/修改.png"     style="width:25%"/></span><br/><span class="iconfont1">添加工作室名</span></a> </li>
      <li> <a href="javascript:void(0);" onclick="tjwx()"><span class="iconfont"><img   src="wjxa/微信.png"    style="width:21%" /> </span> <br/><span class="iconfont1">添加微信 </span></a> </li>
       <li> <a href="javascript:void(0);" onclick="tjdh()"> <span class="iconfont"><img   src="wjxa/电话.png"   style="width:21%"  /></span>  <br/> <span class="iconfont1">添加电话 </span></a> </li>
       <li> <a href="plugin.php?id=xd:mp&ft=tdizhi"><span class="iconfont"><img   src="wjxa/地址.png"    style="width:25%" /> </span> <br/><span class="iconfont1">添加地址 </span></a> </li>
      <li><a href="javascript:void(0);" onclick="zwjs()"><span class="iconfont" style=""><img   src="wjxa/样式库.png"    style="width:25%" /></span><br/><span class="iconfont1">自我介绍 </span></a></li>
 <li><a href="javascript:void(0);" onclick="gzslb()""><span class="iconfont" style=""><img   src="wjxa/类别.png"    style="width:25%" /></span><br/><span class="iconfont1">工作室类别 </span></a></li>
<li  style="float:right"><a  href="javascript:void(0);" onclick="shzh1()"  ><div class="fixed_close iconfont"   style="margin-top:10px">&#xe608;</div></a></li>
</ul>
</div>


';

$whn_xd314->body_fyb();//---------------------------------------分页b 参数：
//echo  '<div class="fixed_nav fixed_nav_no_wx"><ul><li><a href="plugin.php?id=xd:xiangmu&a=chyu"> <span class="iconfont">&#xe607;</span>粉丝管理</a> </li><li> <a href="plugin.php?id=xd:xiangmu&a=fsgl"> <span class="iconfont">&#xe61f;</span>我的关注</a> </li><li   class="on" > <a href="plugin.php?id=xd:xiangmu&a=achyu"> <span class="iconfont">&#xe6a5;</span>新的大咖</a> </li>   </ul>  </div></div>';
$whn_xd314->total_ajax2('fy(a)','"plugin.php?id=xd:notes_zhanshi&a=7aa"','
var caidan=document.getElementById("caidan").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
var  ff=document.getElementById("ff");if(ff){document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));}
','
document.getElementById("msg").innerHTML=resp;fya();
',1,'"ym="+a+"&leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu="+canshu+"&neirong="+neirong');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
$whn_xd314->total_ajax2('chuli()','"plugin.php?id=xd:notes_zhanshi&a=7aa"','var  a=0;
var caidan=document.getElementById("caidan").value;var canshu2=document.getElementById("canshu2").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
','
if(caidan=="关注"){document.getElementById("msg2").innerHTML=resp;paihang(0);}else{
if(resp=="提交"){alert("已提交！");window.location.href="plugin.php?id=xd:tuiguang&a=zhifuxx&b='.$get[b].'&c='.$i.'";}else  if(resp=="工作室类别1"){alert("已设置工作室类别！");zhifuu();}else  if(resp=="自我介绍1"){alert("已设置自我介绍！");zhifuu();}else  if(resp=="添加电话1"){alert("已设置联系电话！");zhifuu();}else  if(resp=="添加微信1"){alert("已设置微信号！");zhifuu();}else  if(resp=="工作室名1"){alert("已设置工作室名称！");zhifuu();}else  if(resp=="升级名片样式1"){alert("已升级名片样式！");zhifuu();}else  if(resp=="发布公告1"){alert("已设置公告！");zhifuu();}else  if(resp=="已关注"){alert("已关注！");document.getElementById("caidan").value="列表1";chuli();}else  if(resp=="删除关注"){alert("已删除关注！");document.getElementById("caidan").value="列表";
fy(0);}else  if(resp=="取消"){alert("已取消！");window.location.href="javascript:history.back(-1)";}else  if(resp=="退款1"){alert("已申请退款！");window.location.href="plugin.php?id=xd:notes_zhanshi&a=7&d=1";}else  if(resp=="取消退款"){alert("已取消退款！");window.location.href="plugin.php?id=xd:notes_zhanshi&a=7&d=1";}else  if(resp=="退款1"){alert("已申请退款！");window.location.href="plugin.php?id=xd:notes_zhanshi&a=7&d=1";}else{document.getElementById("msg").innerHTML=resp;}}
',1,'"ym="+a+"&leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu="+canshu+"&canshu2="+canshu2+"&neirong="+neirong');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
$whn_xd314->total_ajax2_shx('shuaxin()','"plugin.php?id=xd:notes_zhanshi&a=shuaxin"','
','
document.getElementById("msg1").innerHTML=resp;document.getElementById("shx1").innerHTML=document.getElementById("shuaxin1").value;document.getElementById("shx2").innerHTML=document.getElementById("shuaxin2").value;
',1,'');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数

$whn_xd314->total_ajax2('chuli2(a)','"plugin.php?id=xd:notes_zhanshi&a=7aa"','
var caidan=document.getElementById("caidan").value;var canshu2=document.getElementById("canshu2").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
var  ff2=document.getElementById("ff2");if(ff2){document.getElementById("ff2").parentNode.removeChild(document.getElementById("ff2"));}
','
document.getElementById("msg2").innerHTML=document.getElementById("msg2").innerHTML+resp;
',1,'"ym="+a+"leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu2="+canshu2+"&canshu="+canshu+"&neirong="+neirong');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数
$whn_xd314->total_ajax2('chuli3(a)','"plugin.php?id=xd:notes_zhanshi&a=7aa"','
var caidan=document.getElementById("caidan").value;var canshu2=document.getElementById("canshu2").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
var  ff1=document.getElementById("ff1");if(ff1){document.getElementById("ff1").parentNode.removeChild(document.getElementById("ff1"));}
','
document.getElementById("msg3").innerHTML=document.getElementById("msg3").innerHTML+resp;
',1,'"ym="+a+"leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu2="+canshu2+"&canshu="+canshu+"&neirong="+neirong');//----------------------------------------------------------------------------------ajax模块；$url        (需要html中id="msg";按钮为<a href="javascript:void(0);" onclick="ajax()">);$name函数名  默认为ajax(a);$before之前的js,$after之后的js,$post是否为post方式,$send发送的参数

echo  ' 
<script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script language="javascript" type="text/javascript">';
$script='
function  fx(){
if(confirm("分享后您将可获得对方在此工作室中消费的提成！是否确认分享！(在[我和你99]APP中分享才有效！)")){
connectSQJavascriptBridge(function(){
sq.share("'.$title.'", "点击查看详情","plugin.php?id=xd:notes_zhuye&a=7&c='.$uid.'&r='.$_G['uid'].'", function(result){
  alert(result.errInfo);
});
});
}
}
';
echo   htmlspecialchars_decode($script , ENT_NOQUOTES );
echo   '
window.onload = chushihua;

function  gl(a,b){
var z=document.getElementById(a).innerHTML;
if(z==""){
document.getElementById(a).innerHTML="<a href=\'javascript:void(0);\' onclick=\'deletgzh("+a+")\'><div  style=\'margin:8px;color:#4F4F4F;font-size:25px;float:right\'>删除</div></a>";
document.getElementById(b).innerHTML="——";
}else{
document.getElementById(a).innerHTML="";
document.getElementById(b).innerHTML="管理";
}
}

function shjmpysh1(a,b){
if(a>=b){
if(confirm("您当前有"+a+"久久币!是否确定使用【"+b+"】久久币升级名片风格？")){
$("#tuiss").fadeOut(1000);
document.getElementById("caidan").value="升级名片样式1";
chuli();
}
}else{
alert("当前久久币不足【"+b+"】个！");
}
}
function shjmpysh(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="升级名片样式";
chuli();
}

function gzslb1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("gzslb").value;
document.getElementById("caidan").value="工作室类别1";
chuli();
}

function gzslb(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="工作室类别";
chuli();
}

function zwjs1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("zwjs").value;
document.getElementById("caidan").value="自我介绍1";
chuli();
}

function zwjs(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="自我介绍";
chuli();
}

function tjdh1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("tjdh").value;
document.getElementById("caidan").value="添加电话1";
chuli();
}

function tjdh(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="添加电话";
chuli();
}

function tjwx1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("tjwx").value;
document.getElementById("caidan").value="添加微信1";
chuli();
}

function tjwx(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="添加微信";
chuli();
}

function gzshm1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("gzshm").value;
document.getElementById("caidan").value="工作室名1";
chuli();
}

function gzshm(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="工作室名";
chuli();
}

function gzshguanzhu(c){
document.getElementById("canshu2").value=c;
document.getElementById("caidan").value="工作室关注";
chuli();
}

function fbgg1(){
document.getElementById("neirong").value=document.getElementById("fbgg").value;
document.getElementById("caidan").value="发布公告1";
chuli();
}

function fbgg(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="发布公告";
chuli();
}



function deletgzh(c){
if(confirm("真要删除吗？")){
document.getElementById("canshu2").value=c;
document.getElementById("caidan").value="删除关注";
chuli();
}
}


function paihang(a){
document.getElementById("caidan").value="工作室";
var a1=a+1;
var a2=a1*2100;
document.getElementById("msg3").style.width=a2+"px";
$("#ssss").fadeOut(1000);
$("#tuiss").fadeIn(2000);
chuli3(a);
 }
function guanzhu(a){
document.getElementById("caidan").value="关注";
var a1=a+1;
var a2=a1*1550;
document.getElementById("msg2").style.width=a2+"px";
$("#ssss").fadeOut(1000);
$("#tuiss").fadeIn(2000);
chuli2(a);
 }
function shzh(){
$("#shzh").fadeIn(500);
 }

function shzh1(){
$("#shzh").fadeOut(2000);
 }
function zhifuu(){
document.getElementById("msg2").innerHTML="";
document.getElementById("cd1").className="cd1";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd";
$("#msg").fadeOut(1000);
$("#ssss").fadeOut(1000);
$("#shzh").fadeOut(1000);
$("#tuiss").fadeIn(1000);
document.getElementById("caidan").value="关注";
chuli2(0);
 }
function quxiao(){
document.getElementById("caidan").value="取消";
chuli();
 }
function lishi(){
$("#msg").fadeIn(1000);
document.getElementById("cd1").className="cd";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd1";
$("#tuiss").fadeOut(1000);
document.getElementById("caidan").value="历史";
fy(0);
 }
function lieb1(){
$("#msg").fadeIn(1000);
document.getElementById("cd1").className="cd1";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd";
$("#tuiss").fadeOut(1000);
$("#ssss").fadeIn(2000);
document.getElementById("caidan").value="列表1";
fy(0);
 }

function lieb(){
$("#msg").fadeIn(1000);
document.getElementById("cd1").className="cd";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd";
$("#tuiss").fadeOut(1000);
$("#ssss").fadeIn(2000);
document.getElementById("caidan").value="列表";
fy(0);
 }
function tijiao(){
var str=a+"|"+b+"|"+c+"|"+d+"|"+e+"|"+f; 
document.getElementById("canshu1").value=str;
document.getElementById("caidan").value="提交";
chuli();
}
';

if($get['d']=='1'){
echo  '
function chushihua(){
document.getElementById("cd1").className="cd";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd";
$("#tuiss").fadeOut(1000);
document.getElementById("caidan").value="列表";
fy(0);
 }
';
}else{
echo  '
function chushihua(){
document.getElementById("cd1").className="cd1";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd";
$("#tuiss").fadeIn(2000);
document.getElementById("caidan").value="关注";
chuli();
 }
';
}
echo  '
  function wx(){
  alert("微信号:'.$mp[x6].'");
  } 
';
if(empty($mp[x3])||empty($mp[x6])){
echo  '
function tdwx(){
var xd2=document.getElementById("dh").value;
var wx=document.getElementById("wx").value;
if(xd2.length<1){
alert("请填写电话！");
}else if(wx.length<1){
alert("请填写微信！");
}else{
document.getElementById("f1").submit();
}
}';
}
echo  '
function dongtai(){
connectSQJavascriptBridge(function(){
    sq3.publish({
        boardId:362,
        boardName: "发布动态",
        classifyId:0,
        hasTitle:false,
        talkId: 0,
        success: function(data) {
            alert(JSON.stringify(data));alert("ddddddddd");
        },
        error: function(data) {
            showResult("publish error errNo: " + data.errNo + ", errMsg: " + data.errMsg);
        },
        complete: function(result) {
alert("ddddddddd");
        }
    });
});
}

jQuery(function(){
	jQuery("#output").qrcode("plugin.php?id=xd:notes_zhuye&a=7&c='.$_G[uid].'&r='.$_G[uid].'");
})

function syss(){
connectSQJavascriptBridge(function(){
sq.scan(function(result){
window.location.href=result.url;
});

});
  }
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
$(document).on(\'click\',".fixed_nav .add",function(){

	$(\'.fixed_box\').show().addClass(\'fixed_nav_box\');
	$(\'.fixed_add\').animate({bottom:\'0\'},150);
  })
  $(document).on(\'click\',".fixed_add .fixed_close,.fixed_nav_box",function(){
	$(\'.fixed_add\').animate({bottom:\'-100%\'},300,function(){
		$(\'.fixed_box\').removeClass(\'fixed_nav_box\').hide();  
	});
  })
function tt(){  
var upfile=document.getElementById("upfile");
upfile.click();
 }
function b(){
var a1=document.getElementById("a1");
a1.submit();
 }
function c(){
var c=document.getElementById("qit").style.display;
if(c=="none"){
document.getElementById("qit").style="display:block";
document.getElementById("qit1").innerHTML="<img   src=\'wjxa/更多b.png\'    style=\'width:50%\' />";
}else{
document.getElementById("qit").style="display:none";
document.getElementById("qit1").innerHTML="<img   src=\'wjxa/更多a.png\'    style=\'width:50%\' />";
}
}
function  m(){
var   province=document.getElementById("content3").value;
var   city=document.getElementById("city1");
if(province=="北京"){
city.innerHTML="<select   class=\'city\'   name=\'city\'    id=\'city\'><option value=\'东城区\'>东城区</option><option value=\'西城区\'>西城区</option><option value=\'崇文区\'>崇文区</option><option value=\'宣武区\'>宣武区</option><option value=\'朝阳区\'>朝阳区</option><option value=\'丰台区\'>丰台区</option><option value=\'石景山区\'>石景山区</option><option value=\'海淀区\'>海淀区</option><option value=\'门头沟区\'>门头沟区</option><option value=\'房山区\'>房山区</option><option value=\'通州区\'>通州区</option><option value=\'顺义区\'>顺义区</option><option value=\'昌平区\'>昌平区</option><option value=\'大兴区\'>大兴区</option><option value=\'怀柔区\'>怀柔区</option><option value=\'平谷区\'>平谷区</option><option value=\'密云县\'>密云县</option><option value=\'延庆县\'>延庆县</option></select>";
}else if(province=="上海"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'><option value=\'黄浦区\'>黄浦区</option><option value=\'卢湾区\'>卢湾区</option><option value=\'徐汇区\'>徐汇区</option><option value=\'长宁区\'>长宁区</option><option value=\'静安区\'>静安区</option><option value=\'普陀区\'>普陀区</option><option value=\'闸北区\'>闸北区</option><option value=\'虹口区\'>虹口区</option><option value=\'杨浦区\'>杨浦区</option><option value=\'闵行区\'>闵行区</option><option value=\'宝山区\'>宝山区</option><option value=\'嘉定区\'>嘉定区</option><option value=\'浦东新区\'>浦东新区</option><option value=\'金山区\'>金山区</option><option value=\'松江区\'>松江区</option><option value=\'青浦区\'>青浦区</option><option value=\'南汇区\'>南汇区</option><option value=\'奉贤区\'>奉贤区</option><option value=\'崇明县\'>崇明县</option></select>";
}else if(province=="天津"){
city.innerHTML="<select   class=\'city\'     name=\'city\'    id=\'city\'><option value=\'和平区\'>和平区</option><option value=\'河东区\'>河东区</option><option value=\'河西区\'>河西区</option><option value=\'南开区\'>南开区</option><option value=\'河北区\'>河北区</option><option value=\'红桥区\'>红桥区</option><option value=\'塘沽区\'>塘沽区</option><option value=\'汉沽区\'>汉沽区</option><option value=\'大港区\'>大港区</option><option value=\'东丽区\'>东丽区</option><option value=\'西青区\'>西青区</option><option value=\'津南区\'>津南区</option><option value=\'北辰区\'>北辰区</option><option value=\'武清区\'>武清区</option><option value=\'宝坻区\'>宝坻区</option><option value=\'宁河县\'>宁河县</option><option value=\'静海县\'>静海县</option><option value=\'蓟县\'>蓟县</option></select>";
}else if(province=="重庆"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'><option value=\'万州区\'>万州区</option><option value=\'涪陵区\'>涪陵区</option><option value=\'渝中区\'>渝中区</option><option value=\'大渡口区\'>大渡口区</option><option value=\'江北区\'>江北区</option><option value=\'沙坪坝区\'>沙坪坝区</option><option value=\'九龙坡区\'>九龙坡区</option><option value=\'南岸区\'>南岸区</option><option value=\'北碚区\'>北碚区</option><option value=\'万盛区\'>万盛区</option><option value=\'双桥区\'>双桥区</option><option value=\'渝北区\'>渝北区</option><option value=\'巴南区\'>巴南区</option><option value=\'黔江区\'>黔江区</option><option value=\'长寿区\'>长寿区</option><option value=\'綦江县\'>綦江县</option><option value=\'潼南县\'>潼南县</option><option value=\'铜梁县\'>铜梁县</option><option value=\'大足县\'>大足县</option><option value=\'荣昌县\'>荣昌县</option><option value=\'璧山县\'>璧山县</option><option value=\'梁平县\'>梁平县</option><option value=\'城口县\'>城口县</option><option value=\'丰都县\'>丰都县</option><option value=\'垫江县\'>垫江县</option><option value=\'武隆县\'>武隆县</option><option value=\'忠县\'>忠县</option><option value=\'开县\'>开县</oion><option value=\'云阳县\'>云阳县</option><option value=\'奉节县\'>奉节县</option><option value=\'巫山县\'>巫山县</option><option value=\'巫溪县\'>巫溪县</option><option value=\'石柱县\'>石柱县</option><option value=\'秀山县\'>秀山县</option><option value=\'酉阳县\'>酉阳县</option><option value=\'彭水县\'>彭水县</option><option value=\'江津\'>江津</option><option value=\'合川\'>合川</option><option value=\'永川\'>永川</option><option value=\'南川\'>南川</option></select>";
}else if(province=="四川"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'><option value=\'成都市\'>成都市</option><option value=\'自贡市\'>自贡市</option><option value=\'攀枝花市\'>攀枝花市</option><option value=\'泸州市\'>泸州市</option><option value=\'德阳市\'>德阳市</option><option value=\'绵阳市\'>绵阳市</option><option value=\'广元市\'>广元市</option><option value=\'遂宁市\'>遂宁市</option><option value=\'内江市\'>内江市</option><option value=\'乐山市\'>乐山市</option><option value=\'南充市\'>南充市</option><option value=\'眉山市\'>眉山市</option><option value=\'宜宾市\'>宜宾市</option><option value=\'广安市\'>广安市</option><option value=\'达州市\'>达州市</option><option value=\'雅安市\'>雅安市</option><option value=\'巴中市\'>巴中市</option><option value=\'资阳市\'>资阳市</option><option value=\'阿坝州\'>阿坝州</option><option value=\'甘孜州\'>甘孜州</option><option value=\'凉山州\'>凉山州</option></select>";
}else if(province=="贵州"){
city.innerHTML="<select     class=\'city\'     name=\'city\'    id=\'city\'><option value=\'贵阳市\'>贵阳市</option><option value=\'六盘水市\'>六盘水市</option><option value=\'遵义市\'>遵义市</option><option value=\'安顺市\'>安顺市</option><option value=\'铜仁地区\'>铜仁地区</option><option value=\'黔西州\'>黔西州</option><option value=\'毕节地区\'>毕节地区</option><option value=\'黔东南州\'>黔东南州</option><option value=\'黔南州\'>黔南州</option></select>";
}else if(province=="云南"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'><option value=\'昆明市\'>昆明市</option><option value=\'曲靖市\'>曲靖市</option><option value=\'玉溪市\'>玉溪市</option><option value=\'保山市\'>保山市</option><option value=\'昭通市\'>昭通市</option><option value=\'丽江市\'>丽江市</option><option value=\'普洱市\'>普洱市</option><option value=\'临沧市\'>临沧市</option><option value=\'楚雄州\'>楚雄州</option><option value=\'红河州\'>红河州</option><option value=\'文山州\'>文山州</option><option value=\'西双版纳州\'>西双版纳州</option><option value=\'大理州\'>大理州</option><option value=\'德宏州\'>德宏州</option><option value=\'怒江州\'>怒江州</option><option value=\'迪庆州\'>迪庆州</option></select>";
}else if(province=="西藏"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'><option value=\'拉萨市\'>拉萨市</option><option value=\'昌都地区\'>昌都地区</option><option value=\'山南地区\'>山南地区</option><option value=\'日喀则地区\'>日喀则地区</option><option value=\'那曲地区\'>那曲地区</option><option value=\'阿里地区\'>阿里地区</option><option value=\'林芝地区\'>林芝地区</option></select>";
}else if(province=="河南"){
city.innerHTML="<select      class=\'city\'       name=\'city\'    id=\'city\'><option value=\'郑州市\'>郑州市</option><option value=\'开封市\'>开封市</option><option value=\'洛阳市\'>洛阳市</option><option value=\'平顶山市\'>平顶山市</option><option value=\'安阳市\'>安阳市</option><option value=\'鹤壁市\'>鹤壁市</option><option value=\'新乡市\'>新乡市</option><option value=\'焦作市\'>焦作市</option><option value=\'濮阳市\'>濮阳市</option><option value=\'许昌市\'>许昌市</option><option value=\'漯河市\'>漯河市</option><option value=\'三门峡市\'>三门峡市</option><option value=\'南阳市\'>南阳市</option><option value=\'商丘市\'>商丘市</option><option value=\'信阳市\'>信阳市</option><option value=\'周口市\'>周口市</option><option value=\'驻马店市\'>驻马店市</option></select>";
}else if(province=="湖北"){
city.innerHTML="<select        class=\'city\'          name=\'city\'    id=\'city\'><option value=\'武汉市\'>武汉市</option><option value=\'黄石市\'>黄石市</option><option value=\'十堰市\'>十堰市</option><option value=\'宜昌市\'>宜昌市</option><option value=\'襄阳市\'>襄阳市</option><option value=\'鄂州市\'>鄂州市</option><option value=\'荆门市\'>荆门市</option><option value=\'孝感市\'>孝感市</option><option value=\'荆州市\'>荆州市</option><option value=\'黄冈市\'>黄冈市</option><option value=\'咸宁市\'>咸宁市</option><option value=\'随州市\'>随州市</option><option value=\'恩施州\'>恩施州</option><option value=\'仙桃市\'>仙桃市</option><option value=\'仙桃市\'>仙桃市</option><option value=\'潜江市\'>潜江市</option><option value=\'天门市\'>天门市</option><option value=\'神农架林区\'>神农架林区</option></select>";
}else if(province=="湖南"){
city.innerHTML="<select    class=\'city\'        name=\'city\'    id=\'city\'><option value=\'长沙市\'>长沙市</option><option value=\'株洲市\'>株洲市</option><option value=\'湘潭市\'>湘潭市</option><option value=\'衡阳市\'>衡阳市</option><option value=\'邵阳市\'>邵阳市</option><option value=\'岳阳市\'>岳阳市</option><option value=\'常德市\'>常德市</option><option value=\'张家界市\'>张家界市</option><option value=\'益阳市\'>益阳市</option><option value=\'郴州市\'>郴州市</option><option value=\'永州市\'>永州市</option><option value=\'怀化市\'>怀化市</option><option value=\'娄底市\'>娄底市</option><option value=\'湘西州\'>湘西州</option></select>";
}else if(province=="广东"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'><option value=\'广州市\'>广州市</option><option value=\'韶关市\'>韶关市</option><option value=\'深圳市\'>深圳市</option><option value=\'珠海市\'>珠海市</option><option value=\'汕头市\'>汕头市</option><option value=\'佛山市\'>佛山市</option><option value=\'江门市\'>江门市</option><option value=\'湛江市\'>湛江市</option><option value=\'茂名市\'>茂名市</option><option value=\'肇庆市\'>肇庆市</option><option value=\'惠州市\'>惠州市</option><option value=\'梅州市\'>梅州市</option><option value=\'汕尾市\'>汕尾市</option><option value=\'河源市\'>河源市</option><option value=\'阳江市\'>阳江市</option><option value=\'清远市\'>清远市</option><option value=\'东莞市\'>东莞市</option><option value=\'中山市\'>中山市</option><option value=\'潮州市\'>潮州市</option><option value=\'揭阳市\'>揭阳市</option><option value=\'云浮市\'>云浮市</option></select>";
}else if(province=="广西"){
city.innerHTML="<select      class=\'city\'           name=\'city\'    id=\'city\'><option value=\'南宁市\'>南宁市</option><option value=\'柳州市\'>柳州市</option><option value=\'桂林市\'>桂林市</option><option value=\'梧州市\'>梧州市</option><option value=\'北海市\'>北海市</option><option value=\'防城港市\'>防城港市</option><option value=\'钦州市\'>钦州市</option><option value=\'贵港市\'>贵港市</option><option value=\'玉林市\'>玉林市</option><option value=\'百色市\'>百色市</option><option value=\'贺州市\'>贺州市</option><option value=\'河池市\'>河池市</option><option value=\'来宾市\'>来宾市</option><option value=\'崇左市\'>崇左市</option></select>";
}else if(province=="陕西"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'><option value=\'西安市\'>西安市</option><option value=\'铜川市\'>铜川市</option><option value=\'宝鸡市\'>宝鸡市</option><option value=\'咸阳市\'>咸阳市</option><option value=\'渭南市\'>渭南市</option><option value=\'延安市\'>延安市</option><option value=\'汉中市\'>汉中市</option><option value=\'榆林市\'>榆林市</option><option value=\'安康市\'>安康市</option><option value=\'商洛市\'>商洛市</option></select>";
}else if(province=="甘肃"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'><option value=\'兰州市\'>兰州市</option><option value=\'嘉峪关市\'>嘉峪关市</option><option value=\'金昌市\'>金昌市</option><option value=\'白银市\'>白银市</option><option value=\'天水市\'>天水市</option><option value=\'武威市\'>武威市</option><option value=\'张掖市\'>张掖市</option><option value=\'平凉市\'>平凉市</option><option value=\'酒泉市\'>酒泉市</option><option value=\'庆阳市\'>庆阳市</option><option value=\'定西市\'>定西市</option><option value=\'陇南市\'>陇南市</option><option value=\'临夏州\'>临夏州</option><option value=\'甘南州\'>甘南州</option></select>";
}else if(province=="青海"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'><option value=\'西宁市\'>西宁市</option><option value=\'海东地区\'>海东地区</option><option value=\'海北州\'>海北州</option><option value=\'黄南州\'>黄南州</option><option value=\'海南州\'>海南州</option><option value=\'果洛州\'>果洛州</option><option value=\'玉树州\'>玉树州</option><option value=\'海西州\'>海西州</option></select>";
}else if(province=="宁夏"){
city.innerHTML="<select      class=\'city\'             name=\'city\'    id=\'city\'><option value=\'银川市\'>银川市</option><option value=\'石嘴山市\'>石嘴山市</option><option value=\'吴忠市\'>吴忠市</option><option value=\'固原市\'>固原市</option><option value=\'中卫市\'>中卫市</option></select>";
}else if(province=="新疆"){
city.innerHTML="<select      class=\'city\'               name=\'city\'    id=\'city\'><option value=\'乌鲁木齐市\'>乌鲁木齐市</option><option value=\'克拉玛依市\'>克拉玛依市</option><option value=\'吐鲁番地区\'>吐鲁番地区</option><option value=\'哈密地区\'>哈密地区</option><option value=\'昌吉州\'>昌吉州</option><option value=\'博尔塔拉蒙古州\'>博尔塔拉蒙古州</option><option value=\'巴音郭楞蒙古州\'>巴音郭楞蒙古州</option><option value=\'阿克苏地区\'>阿克苏地区</option><option value=\'克孜勒苏柯尔克孜州\'>克孜勒苏柯尔克孜州</option><option value=\'喀什地区\'>喀什地区</option><option value=\'和田地区\'>和田地区</option><option value=\'伊犁哈萨克州\'>伊犁哈萨克州</option><option value=\'塔城地区\'>塔城地区</option><option value=\'阿勒泰地区\'>阿勒泰地区</option><option value=\'石河子市\'>石河子市</option><option value=\'阿拉尔市\'>阿拉尔市</option><option value=\'图木舒克市\'>图木舒克市</option><option value=\'五家渠市\'>五家渠市</option></select>";
}else if(province=="河北"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'    id=\'city\'><option value=\'石家庄市\'>石家庄市</option><option value=\'唐山市\'>唐山市</option><option value=\'秦皇岛市\'>秦皇岛市</option><option value=\'邯郸市\'>邯郸市</option><option value=\'邢台市\'>邢台市</option><option value=\'保定市\'>保定市</option><option value=\'张家口市\'>张家口市</option><option value=\'承德市\'>承德市</option><option value=\'沧州市\'>沧州市</option><option value=\'廊坊市\'>廊坊市</option><option value=\'衡水市\'>衡水市</option></select>";
}else if(province=="山西"){
city.innerHTML="<select      class=\'city\'            name=\'city\'    id=\'city\'><option value=\'太原市\'>太原市</option><option value=\'大同市\'>大同市</option><option value=\'阳泉市\'>阳泉市</option><option value=\'长治市\'>长治市</option><option value=\'晋城市\'>晋城市</option><option value=\'朔州市\'>朔州市</option><option value=\'晋中市\'>晋中市</option><option value=\'运城市\'>运城市</option><option value=\'忻州市\'>忻州市</option><option value=\'临汾市\'>临汾市</option><option value=\'吕梁市\'>吕梁市</option></select>";
}else if(province=="内蒙古"){
city.innerHTML="<select        class=\'city\'                  name=\'city\'    id=\'city\'><option value=\'呼和浩特市\'>呼和浩特市</option><option value=\'包头市\'>包头市</option><option value=\'乌海市\'>乌海市</option><option value=\'赤峰市\'>赤峰市</option><option value=\'通辽市\'>通辽市</option><option value=\'鄂尔多斯市\'>鄂尔多斯市</option><option value=\'呼伦贝尔市\'>呼伦贝尔市</option><option value=\'巴彦淖尔市\'>巴彦淖尔市</option><option value=\'乌兰察布市\'>乌兰察布市</option><option value=\'兴安盟\'>兴安盟</option><option value=\'锡林郭勒盟\'>锡林郭勒盟</option><option value=\'阿拉善盟\'>阿拉善盟</option></select>";
}else if(province=="江苏"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'><option value=\'南京市\'>南京市</option><option value=\'无锡市\'>无锡市</option><option value=\'徐州市\'>徐州市</option><option value=\'常州市\'>常州市</option><option value=\'苏州市\'>苏州市</option><option value=\'南通市\'>南通市</option><option value=\'连云港市\'>连云港市</option><option value=\'淮安市\'>淮安市</option><option value=\'盐城市\'>盐城市</option><option value=\'扬州市\'>扬州市</option><option value=\'镇江市\'>镇江市</option><option value=\'泰州市\'>泰州市</option><option value=\'宿迁市\'>宿迁市</option></select>";
}else if(province=="浙江"){
city.innerHTML="<select       class=\'city\'              name=\'city\'    id=\'city\'><option value=\'杭州市\'>杭州市</option><option value=\'宁波市\'>宁波市</option><option value=\'温州市\'>温州市</option><option value=\'嘉兴市\'>嘉兴市</option><option value=\'湖州市\'>湖州市</option><option value=\'绍兴市\'>绍兴市</option><option value=\'金华市\'>金华市</option><option value=\'衢州市\'>衢州市</option><option value=\'舟山市\'>舟山市</option><option value=\'台州市\'>台州市</option><option value=\'丽水市\'>丽水市</option></select>";
}else if(province=="安徽"){
city.innerHTML="<select         class=\'city\'                 name=\'city\'    id=\'city\'><option value=\'合肥市\'>合肥市</option><option value=\'芜湖市\'>芜湖市</option><option value=\'蚌埠市\'>蚌埠市</option><option value=\'淮南市\'>淮南市</option><option value=\'马鞍山市\'>马鞍山市</option><option value=\'淮北市\'>淮北市</option><option value=\'铜陵市\'>铜陵市</option><option value=\'安庆市\'>安庆市</option><option value=\'黄山市\'>黄山市</option><option value=\'滁州市\'>滁州市</option><option value=\'阜阳市\'>阜阳市</option><option value=\'宿州市\'>宿州市</option><option value=\'巢湖市\'>巢湖市</option><option value=\'六安市\'>六安市</option><option value=\'亳州市\'>亳州市</option><option value=\'池州市\'>池州市</option><option value=\'宣城市\'>宣城市</option></select>";
}else if(province=="福建"){
city.innerHTML="<select         class=\'city\'                     name=\'city\'    id=\'city\'><option value=\'福州市\'>福州市</option><option value=\'厦门市\'>厦门市</option><option value=\'莆田市\'>莆田市</option><option value=\'三明市\'>三明市</option><option value=\'泉州市\'>泉州市</option><option value=\'漳州市\'>漳州市</option><option value=\'南平市\'>南平市</option><option value=\'龙岩市\'>龙岩市</option><option value=\'宁德市\'>宁德市</option></select>";
}else if(province=="江西"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'><option value=\'南昌市\'>南昌市</option><option value=\'景德镇市\'>景德镇市</option><option value=\'萍乡市\'>萍乡市</option><option value=\'九江市\'>九江市</option><option value=\'新余市\'>新余市</option><option value=\'鹰潭市\'>鹰潭市</option><option value=\'赣州市\'>赣州市</option><option value=\'吉安市\'>吉安市</option><option value=\'宜春市\'>宜春市</option><option value=\'抚州市\'>抚州市</option><option value=\'上饶市\'>上饶市</option></select>";
}else if(province=="山东"){
city.innerHTML="<select        class=\'city\'                   name=\'city\'    id=\'city\'><option value=\'济南市\'>济南市</option><option value=\'青岛市\'>青岛市</option><option value=\'淄博市\'>淄博市</option><option value=\'枣庄市\'>枣庄市</option><option value=\'东营市\'>东营市</option><option value=\'烟台市\'>烟台市</option><option value=\'潍坊市\'>潍坊市</option><option value=\'济宁市\'>济宁市</option><option value=\'泰安市\'>泰安市</option><option value=\'威海市\'>威海市</option><option value=\'日照市\'>日照市</option><option value=\'莱芜市\'>莱芜市</option><option value=\'临沂市\'>临沂市</option><option value=\'德州市\'>德州市</option><option value=\'聊城市\'>聊城市</option><option value=\'滨州市\'>滨州市</option><option value=\'菏泽市\'>菏泽市</option></select>";
}else if(province=="辽宁"){
city.innerHTML="<select         class=\'city\'                  name=\'city\'      id=\'city\'><option value=\'沈阳市\'>沈阳市</option><option value=\'大连市\'>大连市</option><option value=\'鞍山市\'>鞍山市</option><option value=\'抚顺市\'>抚顺市</option><option value=\'本溪市\'>本溪市</option><option value=\'丹东市\'>丹东市</option><option value=\'锦州市\'>锦州市</option><option value=\'营口市\'>营口市</option><option value=\'阜新市\'>阜新市</option><option value=\'辽阳市\'>辽阳市</option><option value=\'盘锦市\'>盘锦市</option><option value=\'铁岭市\'>铁岭市</option><option value=\'朝阳市\'>朝阳市</option><option value=\'葫芦岛市\'>葫芦岛市</option></select>";
}else if(province=="吉林"){
city.innerHTML="<select         class=\'city\'                      name=\'city\'      id=\'city\'><option value=\'长春市\'>长春市</option><option value=\'吉林市\'>吉林市</option><option value=\'四平市\'>四平市</option><option value=\'辽源市\'>辽源市</option><option value=\'通化市\'>通化市</option><option value=\'白山市\'>白山市</option><option value=\'松原市\'>松原市</option><option value=\'白城市\'>白城市</option><option value=\'延边州\'>延边州</option></select>";
}else if(province=="黑龙江"){
city.innerHTML="<select       class=\'city\'                name=\'city\'      id=\'city\'><option value=\'哈尔滨市\'>哈尔滨市</option><option value=\'齐齐哈尔市\'>齐齐哈尔市</option><option value=\'鸡西市\'>鸡西市</option><option value=\'鹤岗市\'>鹤岗市</option><option value=\'双鸭山市\'>双鸭山市</option><option value=\'大庆市\'>大庆市</option><option value=\'伊春市\'>伊春市</option><option value=\'佳木斯市\'>佳木斯市</option><option value=\'七台河市\'>七台河市</option><option value=\'牡丹江市\'>牡丹江市</option><option value=\'黑河市\'>黑河市</option><option value=\'绥化市\'>绥化市</option><option value=\'大兴安岭地区\'>大兴安岭地区</option></select>";
}else if(province=="台湾"){
city.innerHTML="<select       class=\'city\'                         name=\'city\'      id=\'city\'><option value=\'台北市\'>台北市</option><option value=\'高雄市\'>高雄市</option><option value=\'台中县\'>台中县</option><option value=\'花莲县\'>花莲县</option><option value=\'基隆县\'>基隆县</option><option value=\'嘉义县\'>嘉义县</option><option value=\'金门县\'>金门县</option><option value=\'连江县\'>连江县</option><option value=\'苗栗县\'>苗栗县</option><option value=\'南投县\'>南投县</option><option value=\'澎湖县\'>澎湖县</option><option value=\'屏东县\'>屏东县</option><option value=\'台东县\'>台东县</option><option value=\'台南县\'>台南县</option><option value=\'桃园县\'>桃园县</option><option value=\'新竹县\'>新竹县</option><option value=\'宜兰县\'>宜兰县</option><option value=\'云林县\'>云林县</option><option value=\'彰化县\'>彰化县</option></select>";
}else if(province=="海南"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'      id=\'city\'><option value=\'海口市\'>海口市</option><option value=\'三亚市\'>三亚市</option><option value=\'三沙市\'>三沙市</option><option value=\'儋州市\'>儋州市</option><option value=\'五指山市\'>五指山市</option><option value=\'文昌市\'>文昌市</option><option value=\'琼海市\'>琼海市</option><option value=\'万宁市\'>万宁市</option><option value=\'东方市\'>东方市</option></select>";
}else if(province=="香港"){
city.innerHTML="<select       class=\'city\'                     name=\'city\'      id=\'city\'><option value=\'湾仔区\'>湾仔区</option><option value=\'观塘区\'>观塘区</option><option value=\'南区\'>南区</option><option value=\'东区\'>东区</option><option value=\'新界\'>新界</option><option value=\'沙田区\'>沙田区</option><option value=\'尖沙咀\'>尖沙咀</option><option value=\'油尖旺区\'>油尖旺区</option><option value=\'元朗区\'>元朗区</option></select>";
}else if(province=="澳门"){
city.innerHTML="<select         class=\'city\'             name=\'city\'      id=\'city\'><option value=\'花地玛堂区\'>花地玛堂区</option><option value=\'圣安多尼堂区\'>圣安多尼堂区</option><option value=\'大堂区\'>大堂区</option><option value=\'望德堂区\'>望德堂区</option><option value=\'风顺堂区\'>风顺堂区</option></select>";
}
}


</script>
';

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html文件主体结尾	
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

?>