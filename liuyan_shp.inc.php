<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once (DISCUZ_ROOT .'./source/plugin/xd/function_xd314_xd.inc.php');
//if(empty($_G['username'])){
//echo '<script language="JavaScript">window.location.href="http://m.woheni99.com/m/login";</script>';
//if(empty($_GET[b])){echo '<script language="JavaScript">alert("û�й�������Ϣ��");</script>';}else{
  //lb_yinyuett($_G,$_GET[b],$_GET[ym]);
//}
//echo '<script language="JavaScript">window.location.href="http://www.woheni99.com/member.php?mod=logging&action=login";</script>';
//}else{	
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$_G['uid']);
chushihua($_G['uid']);
if(!file_exists(dzh($_G['uid'],'y'))){
mkdir(dzh($_G['uid'],'y'),0777,true);
}
if(!file_exists(dzh($_G['uid'],'shp'))){
mkdir(dzh($_G['uid'],'shp'),0777,true);
}
switch ($_GET['ft']){
case 'logout'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ɾ���ļ�
discuz_logout($_GET['action']);
break;

case 'delete'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ɾ���ļ�
if("0"==$_GET[me]){
deletet1($_GET[ft2],$_G['uid']);
lb_t1($_G['uid']);
}else if("1"==$_GET[me]){
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ɾ������
deletey($_GET[ft2],$_G['uid']);	
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=tyinyue";</script>';
}else if("2"==$_GET[me]){
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ɾ����Ƶ
deleteshp($_GET[ft2],$_G['uid']);	
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=shp";</script>';
}
break;
case 'shangchuan'://-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�
//echo '<script language="JavaScript">alert("�����������");</script>';
if("0"==$_GET[me]){
$t=shangchuant($_G,$_FILES['upfilet'],$_GET[b]).'_';
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=tyinyue&b='.$_GET[b].'";</script>';
}else if("1"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�����
shangchuany($_G,$_FILES['upfiley'],$_GET[b]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=tyinyue&b='.$_GET[b].'";</script>';
//tyinyue($_G['uid']);
}else if("2"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ���Ƶ
shangchuanshp($_G,$_FILES['upfileshp'],$_GET[b]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=tyinyue&b='.$_GET[b].'";</script>';
//tyinyue($_G['uid']);
}
else if("3"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�����
if(!empty($_POST[content])&&$_POST[content]!=''&&$_POST[content]!=undefined){
shangchuanwz($_G,$_POST);
}
//echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=tyinyue&b='.$_GET[b].'";</script>';
}
break;
case 'shangchuan1'://-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�΢�Ŷ�ά��
deletet1($array1[0][x7],$_G['uid']);
$t1=shangchuant($_G,$_FILES['upfile'],$_G['uid']);
 lb_weixinerwm1($t1,$_G[uid]);
lb_weixinerwm($_G[uid]);	
break;

case 'tt'://------------------------------------------------------------------------------------------------------------------------------ͼƬ����
 xq_t($_GET[ft2],$_GET[ft1]);
break;
case 'tdizhi'://------------------------------------------------------------------------------------------------------------------------------��ַ����ҳ��
lb_dizhi($_G);
break;
case 'tdizhi1'://------------------------------------------------------------------------------------------------------------------------------��ַ����1
shezhi_dizhi($_G[uid],$_POST[content]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan";</script>';
break;
case 'tping'://------------------------------------------------------------------------------------------------------------------------------˽��
lb_ping($_GET[ft1],$_G['uid']);
break;
case 'tyinyuec'://--------------------------------------------------------------------------------------------------------------------------------------------��̳�б�ҳ��    
  lb_yinyuec($_G['uid'],$_POST);
break;
case 'tyinyueb'://---------------------------------------------------------------------------------------------------------------------------------------------��̳�б�ҳ��    
  lb_yinyueb($_G,$_POST[b],$_POST);
break;
case 'tyinyued'://--------------------------------------------------------------------------------------------------------------------------------------------��̳�б�ҳ��    
  lb_yinyued($_G,$_POST[b],$_POST);
break;
case 'tyinyue'://---------------------------------------------------------------------------------------------------------------------------------------------��̳�б�ҳ��    
if(empty($_GET[b])){echo '<script language="JavaScript">alert("û�й�������Ϣ��");</script>';}else{
  lb_yinyue($_G,$_GET[b],$_GET[ym]);
}
break;

case 'gz_gzsh1'://-----------------------------------------------------------------------------------------------------------------------------˭��ע����
lb_gz_gzsh1($_G);
break;
case 'lb_z'://-----------------------------------------------------------------------------------------------------------------------------˭������
lb_z($_G);
break;

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------�������б�ҳ������������ҳ��

case 'tyidongt'://-------------------------------------------------------------------------------------------------------------------------------------------------�ƶ�ͼƬ
yidongt($_GET['ft2'],$array1,$_GET['f']);
lb_t1($_G['uid']);
break;

case 'deletehdp'://-------------------------------------------------------------------------------------------------------------------------------ɾ���õ�Ƭ
deletehdp($_GET[ft2],$_G['uid'],$_GET[run]);
lb_hdp($_G['uid']);
break;
case 'cz'://-------------------------------------------------------------------------------------------------------------------------����
//cz();
break;
case 'x_weizhi':
x_weizhi($_GET[b]);//-------------------------------------------------------------------------��ַҳ
break;
case 'gzsh_user'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------�û�����
if(empty($_G['username'])){
echo '<script language="JavaScript">window.location.href="http://www.woheni99.com/member.php?mod=logging&action=login";</script>';	
}else{
gzsh_user($_G);
}
break;
case 'xq_y'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------��Ƶ���� 
xq_y($_GET[b]);//----------------------------------------��������     ������$name�ļ�ϵͳ��,$array�ļ�������
break;
case 'yinyuefabu'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------��Ƶ���� 
yinyuefabu($_G,$_POST);//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
break;
case 'yinyueshzh1'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------��Ƶ���� 
yinyueshzh1($_G,$_POST);//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
break;
case 'xq_shp'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------�������� 
xq_shp($_GET[b]);//----------------------------------------��Ƶ����     ������$name�ļ�ϵͳ��,$array�ļ�������
break;
case 'shpfabu'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------�������� 
shpfabu($_G,$_POST);//---------------------------------------��Ƶ��������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
break;
case 'shpshzh1'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------�������� 
shpshzh1($_G,$_POST);//---------------------------------------��Ƶ��������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
break;
case 'lb_usercenter'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------�û�����
lb_usercenter($_GET,$_GET[b]);//--------------------------------------�û�����    ������$m�Ƿ񷢲�����Ϣ,$uid����id
break;
case 'gzshdt'://----------------------------------------------------------------------------------------------------------------------------��Ա
gzshdt($_G,$_GET["b"],$_GET["c"]);
break;
case 'wmgj'://--------------------------------------------------------------------------------------------------------------------------��������
wmgj($_G);
break;
default:
break;
}
//}


 //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------���ܺ���
function  chushihua($uid){//----------------------------------------��ʼ��     ������$uid�û�id,$array�ļ�������            ע�⣺��ʼֻ�ܽ���һ�Σ��м���������⣬��Ҫ��ѯ����
//echo '<script language="JavaScript">alert("'.dzh($uid,'hdp').'");</script>';	
if(!file_exists(dzh($uid,'t'))||!file_exists(dzh($uid,'t1'))||!file_exists(dzh($uid,'t2'))){
$a= DB::query("INSERT ".DB::table('mp')." VALUES (".$uid.",'','�������ݹ���','','','','','','','','','','','','����֮��.mp3','','','','','','','','','','','','','','','','','')");
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

function  cz(){//----------------------------------------����
$a= DB::query("UPDATE ".DB::table('mp')." SET x8='����д����'");
}





function  lb_usercenter(array  $get,$uid){//----------------------------------------�û�����     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE  uid=".$uid)[0];
$whn_xd314->total_start($array[username],$array[username],$array[username],'');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head

echo '
<div class="wrap pb9">
  <div class="user_head">
    <div class="user_img_pb" style="background:url(uc_server/avatar.php?uid='.$uid.'&size=small) center;background-size:100%"></div>
    <div class="user_bg"></div>
    <div class="user_img">
      <table>
        <tr>
          <td><img src="uc_server/avatar.php?uid='.$uid.'&size=big"></td>
        </tr>
 <tr>
          <td>'.$array[username].'</td>
        </tr>
      </table>
    </div>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
      <li><a href="javascript:void(0);" onclick="a11()"  class="add"> <span class="iconfont"><img   src="wjxa/��ά��1.png"     style="margin-top:2px;width:48%"/></span> <span  style="margin-top:-2px;font-size:12px"> �ҵĶ�ά�� <span></a> </li>
<li><a href="plugin.php?id=xd:liuyan1&ft1='.$uid.'"  class="add"> <span class="iconfont"><img   src="wjxa/չʾ.png"     style="width:53%"/></span>  <span  style="margin-top:-5px;font-size:12px">�鿴չʾ<span></a> </li>
<li><a href="plugin.php?id=xd:straight&a=a1&b='.$uid.'"  class="add"> <span class="iconfont"   style="margin-top:0px"><img   src="wjxa/����.png"     style="width:50%"/></span>  <span  style="margin-top:-3px;font-size:12px">����<span></a> </li>
<li><a href="plugin.php?id=xd:communication&a=3&b='.$uid.'&c=1"  class="add"> <span class="iconfont"  style="margin-top:2px"><img   src="wjxa/��Ϣ����.png"     style="width:45%"/></span> <span class="iconfont"  style="margin-top:-2px;font-size:12px">����Ϣ</span></a> </li>
    </ul>
  </div>

<div id="erw1"  style="width:100%;height:800px;position:fixed;z-index:9;top:0px;left:0px;display:none;background:url(\'wjxa/fjj.jpg\') no-repeat;background-size:100% 100%;"><div style="margin:5px;float:right;width:10%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:10px;background:#272727">��</div></div>
  <div id="erw" style="position:fixed;z-index:9;top:10%;left:15%;width:70%;display:none"><div id="output"  style="width:100%"></div><div  style="width:100%;text-align:center"><span style="position:relative;top:20px;width:100%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:5px">'.$array[username].'�Ĺ����Ҷ�ά��</span></div>

</div>
';
echo  '
<script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script>

jQuery(function(){
	jQuery(\'#output\').qrcode(\'http://www.woheni99.com/plugin.php?id=xd:liuyan1&ft1='.$uid.'\');
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
function startChat(){
connectSQJavascriptBridge(function(){
    sq3.startChat({
        userId: \''.$uid.'\',
        userName: \''.$array[username].'\',
        userAvator: \'http://h.hiphotos.baidu.com/zhidao/wh%3D600%2C800/sign=06657d529a22720e7b9beafc4bfb267e/b219ebc4b74543a98db422fc1c178a82b9011456.jpg\',
        success: function(data) {
            alert(JSON.stringify(data));
        },
        error: function(data) {
            showResult("startChat error errNo: " + data.errNo + ", errMsg: " + data.errMsg);
        },
        complete: function(result) {
        }
    });
  });
}

</script>
';

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}


function  gzsh_user(array $_G){//------------------------------------------�û�����
$n1= DB::fetch_all("SELECT * FROM ".DB::table('mpzp')." WHERE  (z=''  AND  ip=".$_G['uid'].") OR (z=''  AND  uid=".$_G['uid'].")");
$n= DB::fetch_all("SELECT  * FROM ".DB::table('mpzp')." WHERE  (ip=".$_G['uid'].") OR (uid=".$_G['uid'].")");
$sandd= DB::fetch_all("SELECT * FROM " .DB::table('sandd')."  WHERE      x11='".$_G[uid]."'");
$sandd='('.count($sandd).')';
$xd314= DB::fetch_all("SELECT  x2  FROM ".DB::table('mp')." WHERE  uid=".$_G[uid])[0][x2];
$cou= DB::fetch_all("SELECT extcredits2 FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
$title='�û�����';
include template('xd:gzsh_user');
}

function  x_weizhi($uid){//-----------------------------------------��ַҳ��     ������$_G
$array= DB::fetch_all("SELECT  * FROM ".DB::table('mp')." WHERE     uid=".$uid)[0];
$ftype=explode('|',$array[x15]); 
$weizhi=$ftype[1];
$weizhi1=$ftype[2].'|'.$ftype[3];
$name=$ftype[0];
//echo '<script language="JavaScript">alert("'.$weizhi.'");</script>';
include template('xd:mp5');
}

function  dzh($uid,$ty){//----------------------------------------��ַ����   ������$uid�û�uid��$ty�ļ�����
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

function shzh_tollstation(array  $_G){//----------------------------------------�۳����  $gxר����uid
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
}


function shzh_jinb(array  $_G){//----------------------------------------�۳����  $gxר����uid
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
echo '<script language="JavaScript">alert("��������Ƭ��");</script>';
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan";</script>';
}
function  timetotime($time){//--------------------------------------��ȡ�¸��µ����ʱ��� 
$time=date('Y��m��d�� H:i:s', $time);
$y=explode('��',$time);
$m=explode('��',$y[1]);
$d=explode('��',$m[1]);
$date=$y[0].'-'.($m[0]+1).'-'.$d[0].$d[1];
return  strtotime($date);
}

function timetostring1($t,$t1){//-----------------------------------------------------------------------------------------------------------ʱ�䵹��  $t
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

if(($y-$y1)>1){$y2=$y-$y1;$y2=$y2.'��';
}else if(($y-$y1)==1){$m2=12+$m-$m1;$m2=$m2.'����';
}else if($y==$y1){
if(($m-$m1)>1){$m2=$m-$m1;$m2=$m2.'����';
}else if(($m-$m1)==1){$d2=30+$d-$d1;$d2=$d2.'��';
}else if($m==$m1){
if(($d-$d1)>1){$d2=$d-$d1;$d2=$d2.'��';
}else if(($d-$d1)==1){$h2=24+$h-$h1;$h2=$h2.'��Сʱ';
}else if($d==$d1){
if(($h-$h1)>1){$h2=$h-$h1;$h2=$h2.'��Сʱ';
}else if(($h-$h1)==1){$i2=60+$i-$i1;$i2=$i2.'����';
}else if($h==$h1){
if($i>$i1){$i2=$i-$i1;$i2=$i2.'����';
}
}
}
}
}

$t2=$y2.$m2.$d2.$h2.$i2;
//echo '<script language="JavaScript">alert("'.$t1.'");</script>';	
return  	$t2;
}




function  lb_dizhi(array $_G){//-----------------------------------------��ַ����ҳ��     ������$_G
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
$dizhi_b='plugin.php?id=xd:liuyan_shp&ft=tdizhi1';
include template('xd:mp3');	
}









function  lb_yinyuec($uid,array  $post){//----------------------------------------��̳c     ������$array  wjk����,$array1  mp���� 
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE    x24=''   AND       x8='".$post[b]."'   ORDER BY  x3  DESC");
echo  $array[0][yid];
}

function  lb_yinyued(array  $_G,$uid,array  $post){//----------------------------------------��̳b     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE    x24=''   AND      x8='".$uid."'   ORDER BY  x3  DESC");
$ttsh=5;
$fy=$whn_xd314->body_fy($array,$post[ym],$ttsh);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
//echo  '<div class="space"  style="height:60px" >woheni</div>';
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE    x24=''   AND      x8='".$uid."'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);

//krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='ͼƬ1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='����'){
$mem= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[x])[0];
echo  '<li class=""  style="background:white;margin-top:8px">
<table width="100%"border="1"cellspacing="0"cellpadding="0">
<tr>
<td ><div  style="width:100%;line-height:20px;font-size:20px;border-bottom:1px solid #F0F0F0;height:30px"><a href="plugin.php?id=xd:mp1&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:30px;width:30px;border-radius:15px;float:left"><span  style="color:#4F4F4F;float:left;margin-top:5px;margin-left:5px">'.$mem[username].'</span></a></div>
</td>
</tr>
<tr>
<td><div  style="width:100%;text-align:center;margin-bottom:8px"><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;margin-right:20px;margin-top:10px;max-width:70%;background:white;color:#7B7B7B">&nbsp'.$value[x2].'&nbsp</span></div>
<div  style="width:100%"><span  style="border-radius:3px;color:#9D9D9D;float:right">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div></td>
</tr>
</table>


</li>';
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px"></div>';}
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}

function  lb_yinyueb(array  $_G,$uid,array  $post){//----------------------------------------��̳b     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE    x24=''   AND      x8='".$uid."'   ORDER BY  x3  DESC");
$ttsh=5;
$fy=$whn_xd314->body_fy($array,$post[ym],$ttsh);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
//echo  '<div class="space"  style="height:60px" >woheni</div>';
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE    x24=''   AND      x8='".$uid."'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
//krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='ͼƬ1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='����'){
$mem= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[x])[0];
echo  '<li class=""  style="background:white;margin-top:8px">
<table width="100%"border="1"cellspacing="0"cellpadding="0">
<tr>
<td ><div  style="width:100%;line-height:20px;font-size:20px;border-bottom:1px solid #F0F0F0;height:30px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:25px;width:25px;border-radius:15px;float:left"><span  style="color:#4F4F4F;float:left;margin-top:5px;margin-left:5px;font-size:16px">'.$mem[username].'</span></a></div>
</td>
</tr>
<tr>
<td><div  style="width:100%;text-align:center;margin-bottom:8px"><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:13px;margin-right:20px;margin-top:10px;max-width:70%;background:white;color:#7B7B7B">&nbsp'.$value[x2].'&nbsp</span></div>
<div  style="width:100%"><span  style="border-radius:3px;color:#9D9D9D;float:right;font-size:10px">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div></td>
</tr>
</table>
</li>';
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px"></div>';}
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}

function  lb_yinyue(array  $_G,$uid,$y1){//----------------------------------------��̳     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$xtt=$uid;
//echo '<script language="JavaScript">alert("'.$xtt.'");</script>';	
$whn_xd314->total_start1('','��̳','��̳','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
$whn_xd314->total_shangchuanwz('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=3&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuanshp('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=2&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuany('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=1&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuant('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=0&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$ll=explode('luntan',$xtt); 
$n= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."  WHERE    yid=".$uid)[0];
$n[x12]=$n[x12]+1;
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x12='".$n[x12]."' WHERE yid=".$uid);
$zan= DB::fetch_all("SELECT * FROM ".DB::table('whn_liuyan')."  WHERE    x24=''   AND     x2='��'   AND     x8='".$xtt."'      AND  x=".$_G[uid])[0];
$zan1= DB::fetch_all("SELECT * FROM ".DB::table('whn_liuyan')."  WHERE    x24=''   AND     x2='��'   AND     x8='".$xtt."'");
if(count($zan1)==0){$zan1=0;}else{$zan1=count($zan1);}
$whn_xd314->body_top2($n[x],'http://www.woheni99.com/plugin.php?id=xd:liuyan_shp&ft=tyinyue&b='.$n[yid]);//-----------------------------------------------------------------------------------����������


echo  '<div  style="width:100%" ><iframe frameborder="0"  style="scrolling:no"      width="100%"       height="300px"   src="'.$n[x2].'" allowfullscreen></iframe></div>';
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE       x24=''   AND       x8='".$xtt."'     ORDER BY  x3  DESC");
if(count($array)==0){$coun=0;}else{$coun=count($array);}
echo  '
<div   style="background:#F0F0F0;width:100%;"><div   style="background:white">
<div  style="font-size:25px;margin:10px;color:#272727">'.$n[x4].'<span  style="float:right;border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C"   >   '.$n[x12].'�β��� </span></div>
<div   style="margin-bottom:20px;color:#6C6C6C;width:80%;margin-left:10%">'.$n[x5].'</div>
<div   style="width:100%;height:40px;line-height:40px;border-top:1px solid #E0E0E0"><span   style="border-left:0px solid #6C6C6C;margin:8px;font-size:20px;color:#6C6C6C">��������('.$coun.'):</span><span  class="jia1"  style="background:#6C6C6C;float:right;border:0.5px solid #6C6C6C;font-size:15px;color:white;border-radius:3px;height:20px;line-height:20px;margin:10px">��������</span>
<span  id="zan">
';


if(empty($_G['username'])){
if(empty($zan[yid])){
echo  '<a href="http://www.woheni99.com/member.php?mod=logging&action=login"><span  style="background:#6C6C6C;float:right;border:0.5px solid #6C6C6C;font-size:15px;margin:8px;color:white;margin-bottom:12px;border-radius:3px;height:20px;line-height:20px;margin:10px">��</span></a><span    style="border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C;margin-bottom:12px">����('.$zan1.')</span>';
}else{
echo  '<span    style="border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C;margin-bottom:12px">����('.$zan1.')</span>';
}
}else{
if(empty($zan[yid])){
echo  '<span  class="jia3"  style="background:#6C6C6C;float:right;border:0.5px solid #6C6C6C;font-size:15px;margin:8px;color:white;margin-bottom:12px;border-radius:3px;;height:20px;line-height:20px;margin:10px">��</span><span    style="border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C;margin-bottom:12px">����('.$zan1.')</span>';
}else{
echo  '<span    style="font-size:15px;margin:8px;color:#6C6C6C;">����('.$zan1.')</span>';
}
}

echo  '
</span>
</div></div><div  style="width:100%;">
<div   id="msg"   style="">
';


$fy=$whn_xd314->body_fy($array,$y1,5);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE    x24=''   AND    x8='".$xtt."'    ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);


//krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='ͼƬ1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='����'){
$mem= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[x])[0];
echo  '<li class=""  style="background:white;margin-top:8px">
<table width="100%"border="1"cellspacing="0"cellpadding="0">
<tr>
<td ><div  style="width:100%;line-height:20px;font-size:20px;border-bottom:1px solid #F0F0F0;height:30px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:25px;width:25px;border-radius:15px;float:left"><span  style="color:#4F4F4F;float:left;margin-top:5px;margin-left:5px;font-size:16px">'.$mem[username].'</span></a></div>
</td>
</tr>
<tr>
<td><div  style="width:100%;text-align:center;margin-bottom:8px"><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:13px;margin-right:20px;margin-top:10px;max-width:70%;background:white;color:#7B7B7B">&nbsp'.$value[x2].'&nbsp</span></div>
<div  style="width:100%"><span  style="border-radius:3px;color:#9D9D9D;float:right;font-size:10px">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div></td>
</tr>
</table>
</li>';
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">��û�����ۣ�������һ�����۰ɣ�</div>';}
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����

echo  '</div><div class="space"  style="height:40px;"   id="sosu">woheni</div>';
$whn_xd314->total_ajax2('wz1()','"plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=3"','
var  a=document.getElementById("wz").value;
if(a==""){alert("���벻��Ϊ�գ�");}else{var  content=a;}
','
document.getElementById("wz").value="";$("#jia").fadeOut(1000);$("#jia1").fadeIn(1000);$("#jia2").fadeOut(1000);fy1(0);
',1,'"content="+content+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

$whn_xd314->total_ajax2_shx('shx()','"plugin.php?id=xd:liuyan_shp&ft=tyinyuec"','
','if(resp!=ggxx){ggxx=resp;fy1(0);}',1,'"i="+ggxx+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

$whn_xd314->total_ajax1('fy1(a)','"plugin.php?id=xd:liuyan_shp&ft=tyinyued"','
var cont="";document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���


$whn_xd314->total_ajax1('fy(a)','"plugin.php?id=xd:liuyan_shp&ft=tyinyueb"','
var cont="";document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
echo  ' 


<div   id="jia"  class="font1" style="position:fixed;bottom:10%;left:10%;border:2px solid #F0F0F0;width:80%;height:150px;display:none;background:white;border-radius:5px">
<textarea   autoFocus   placeholder="�������ۣ�"   style="width:100%;font-size:24px;background:white;resize:none;border:0px solid #3C3C3C;border-bottom:1px solid #F0F0F0"   id="wz" rows="3" ></textarea>';
if(empty($_G['username'])){
echo   '
<a href="http://www.woheni99.com/member.php?mod=logging&action=login"><div   style="text-align:center;width:30%;margin-top:4px;margin-right:10%;font-size:18px;color:white;height:35px;border:1px solid #DCDCDC;background:#40C2F7;border-radius:10px;float:right">����</div></a>';
}else{
echo   '
<div onclick="wz1()"   style="text-align:center;width:30%;margin-top:4px;margin-right:10%;font-size:18px;color:white;height:35px;border:1px solid #DCDCDC;background:#40C2F7;border-radius:10px;float:right">����</div>';
}
echo  '
<div id="jia2"   style="text-align:center;width:30%;margin-top:4px;margin-left:10%;font-size:18px;color:#6C6C6C;height:35px;border:1px solid #6C6C6C;background:white;border-radius:10px;float:left">ȡ��</div>

</div>


<img id="jia1"  class="jia1"  src="wjxa/����.png"   style="width:10%;border-radius:0px;position:fixed;z-index:9;bottom:8px;right:2%;border-top:0px solid #3C3C3C;" ></img>

';


echo  '
<script>

setTimeout("cy()",2000)
function  cy(){
$("#cy").fadeOut(1000);
}
var zhqq=setInterval("shx()",2000);
var ggxx="'.$array[0][yid].'";
$(".jia3").click(function(){
document.getElementById("wz").value="��";wz1();
document.getElementById("zan").innerHTML="<span    style=\'border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C;margin-bottom:12px\'>����('.$zan1.')</span>";
});
$(".jia1").click(function(){
$("#jia").fadeIn(1000);$("#jia1").fadeOut(1000);$("#jia2").fadeIn(1000);
});
$("#jia2").click(function(){
$("#jia").fadeOut(1000);$("#jia1").fadeIn(1000);$("#jia2").fadeOut(1000);
});


</script>

';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}

function  lb_yinyuett(array  $_G,$uid,$y1){//----------------------------------------��̳tt     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$xtt=$uid;
//echo '<script language="JavaScript">alert("'.$xtt.'");</script>';	
$whn_xd314->total_start1('','��̳','��̳','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
$whn_xd314->total_shangchuanwz('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=3&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuanshp('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=2&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuany('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=1&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuant('plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=0&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$ll=explode('luntan',$xtt); 
$n= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."  WHERE    yid=".$uid)[0];
$n[x12]=$n[x12]+1;
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x12='".$n[x12]."' WHERE yid=".$uid);
$zan= DB::fetch_all("SELECT * FROM ".DB::table('whn_liuyan')."  WHERE     x24=''   AND  x2='��'   AND     x8='".$xtt."'      AND  x=".$_G[uid])[0];
$zan1= DB::fetch_all("SELECT * FROM ".DB::table('whn_liuyan')."  WHERE     x24=''   AND  x2='��'   AND     x8='".$xtt."'");
if(count($zan1)==0){$zan1=0;}else{$zan1=count($zan1);}
$whn_xd314->body_top2($n[x],'http://www.woheni99.com/plugin.php?id=xd:liuyan_shp&ft=tyinyue&b='.$n[yid]);//-----------------------------------------------------------------------------------����������


echo  '<div  style="width:100%" ><iframe frameborder="0"  style="scrolling:no"      width="100%" height="300px"   src="'.$n[x2].'" allowfullscreen></iframe></div>';
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE     x24=''   AND   x8='".$xtt."'     ORDER BY  x3  DESC");
if(count($array)==0){$coun=0;}else{$coun=count($array);}
echo  '
<div   style="background:#F0F0F0;width:100%;"><div   style="background:white">
<div  style="font-size:25px;margin:10px;color:#272727">'.$n[x4].'<span  style="float:right;border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C"   >   '.$n[x12].'�β��� </span></div>
<div   style="margin-bottom:20px;color:#6C6C6C;width:80%;margin-left:10%">'.$n[x5].'</div>
<div   style="width:100%;height:40px"><span   style="border-left:3px solid #6C6C6C;margin:8px;font-size:20px;color:#6C6C6C">��������('.$coun.'):</span><span  class="jia1"  style="background:#6C6C6C;float:right;border:0.5px solid #6C6C6C;font-size:15px;margin:8px;color:white;margin-bottom:12px">��������</span>
<span  id="zan">
';
if(empty($zan[yid])){
echo  '
<a href="http://www.woheni99.com/member.php?mod=logging&action=login">
<span   style="background:#6C6C6C;float:right;border:0.5px solid #6C6C6C;font-size:15px;margin:8px;color:white;margin-bottom:12px">��</span></a><span    style="border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C;margin-bottom:12px">����('.$zan1.')</span>';
}else{
echo  '<span    style="border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C;margin-bottom:12px">����('.$zan1.')</span>';
}



echo  '
</span>
</div></div><div  style="width:100%;">
<div   id="msg"   style="">
';


$fy=$whn_xd314->body_fy($array,$y1,2);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')." WHERE     x24=''   AND  x8='".$xtt."'    ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);


//krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='ͼƬ1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:liuyan_shp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='����'){
$mem= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[x])[0];
echo  '<li class=""  style="background:white;margin-top:8px">
<table width="100%"border="1"cellspacing="0"cellpadding="0">
<tr>
<td ><div  style="width:100%;line-height:20px;font-size:20px;border-bottom:1px solid #F0F0F0;height:30px"><a href="plugin.php?id=xd:mp1&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:30px;width:30px;border-radius:15px;float:left"><span  style="color:#4F4F4F;float:left;margin-top:5px;margin-left:5px">'.$mem[username].'</span></a></div>
</td>
</tr>
<tr>
<td><div  style="width:100%;text-align:center;margin-bottom:8px"><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;margin-right:20px;margin-top:10px;max-width:70%;background:white;color:#7B7B7B">&nbsp'.$value[x2].'&nbsp</span></div>
<div  style="width:100%"><span  style="border-radius:3px;color:#9D9D9D;float:right">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div></td>
</tr>
</table>


</li>';
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">��û�����ۣ�������һ�����۰ɣ�</div>';}
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����

echo  '</div><div class="space"  style="background:white;height:40px"   id="sosu">woheni</div>';
$whn_xd314->total_ajax2('wz1()','"plugin.php?id=xd:liuyan_shp&ft=shangchuan&me=3"','
var  a=document.getElementById("wz").value;
if(a==""){alert("���벻��Ϊ�գ�");}else{var  content=a;}
','
document.getElementById("wz").value="";fy1(0);$("#jia").fadeOut(1000);$("#jia1").fadeIn(1000);$("#jia2").fadeOut(1000);document.getElementById("shpp").style="width:100%;position:fixed;z-index:1;top:20px;";
',1,'"content="+content+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

$whn_xd314->total_ajax2('shx()','"plugin.php?id=xd:liuyan_shp&ft=tyinyuec"','
','if(resp!=ggxx){ggxx=resp;var k=0;fy1(k);}',1,'"i="+ggxx+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

$whn_xd314->total_ajax1('fy1(a)','"plugin.php?id=xd:liuyan_shp&ft=tyinyued"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���


$whn_xd314->total_ajax1('fy(a)','"plugin.php?id=xd:liuyan_shp&ft=tyinyueb"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
echo  ' 


<div   id="jia"  class="font1" style="position:fixed;bottom:10%;left:10%;border:2px solid #F0F0F0;width:80%;height:150px;display:none;background:white;border-radius:5px">
<textarea   autoFocus   placeholder="�������ۣ�"   style="width:100%;font-size:24px;background:white;resize:none;border:0px solid #3C3C3C;border-bottom:1px solid #F0F0F0"   id="wz" rows="3" ></textarea>
<a href="http://www.woheni99.com/member.php?mod=logging&action=login"><div    style="text-align:center;width:30%;margin-top:4px;margin-right:10%;font-size:18px;color:white;height:35px;border:1px solid #DCDCDC;background:#40C2F7;border-radius:10px;float:right">����</div></a>
<div id="jia2"   style="text-align:center;width:30%;margin-top:4px;margin-left:10%;font-size:18px;color:#6C6C6C;height:35px;border:1px solid #6C6C6C;background:white;border-radius:10px;float:left">ȡ��</div>

</div>


<img id="jia1"  class="jia1"  src="wjxa/����.png"   style="width:10%;border-radius:0px;position:fixed;bottom:8px;right:2%;border-top:0px solid #3C3C3C;" ></img>

';


echo  '
<script>

setTimeout("cy()",2000)
function  cy(){
$("#cy").fadeOut(1000);
}
var zhqq=setInterval("shx()",2000);
var ggxx="'.$array[0][yid].'";
$(".jia3").click(function(){
document.getElementById("wz").value="��";wz1();
document.getElementById("zan").innerHTML="<span    style=\'border:0px solid #6C6C6C;font-size:15px;margin:8px;color:#6C6C6C;margin-bottom:12px\'>����('.$zan1.')</span>";
});
$(".jia1").click(function(){
$("#jia").fadeIn(1000);$("#jia1").fadeOut(1000);$("#jia2").fadeIn(1000);document.getElementById("shpp").style="width:100%;position:fixed;z-index:-1;top:20px;";
});
$("#jia2").click(function(){
$("#jia").fadeOut(1000);$("#jia1").fadeIn(1000);$("#jia2").fadeOut(1000);document.getElementById("shpp").style="width:100%;position:fixed;z-index:1;top:20px;";
});


</script>

';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}



function  lb_gz_gzsh(array $_G){//------------------------------------------��ע�Ĺ�����ҳ��     ������$_G
$n= DB::fetch_all("SELECT mid,time FROM ".DB::table('mpshou')." WHERE   uid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[mid])[0];
$arr[$key]='<a href="plugin.php?id=xd:liuyan1&ft1='.$value[mid].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[mid],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp59');
$dizhi_f='plugin.php?id=xd:liuyan';//���ؼ���ַ
include template('xd:wjx3');	
}

function  lb_gz_gzsh1(array $_G){//------------------------------------------˭��ע����     ������$_G
$n= DB::fetch_all("SELECT uid,time FROM ".DB::table('mpshou')." WHERE   mid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[uid])[0];
$arr[$key]='<a href="plugin.php?id=xd:liuyan1&ft1='.$value[uid].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[uid],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp60');
$dizhi_f='plugin.php?id=xd:liuyan';//���ؼ���ַ
include template('xd:wjx3');	
}

function  lb_z(array $_G){//------------------------------------------˭������     ������$_G
$n= DB::fetch_all("SELECT time,ip FROM ".DB::table('mpz')." WHERE   uid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[ip])[0];
$arr[$key]='<a href="plugin.php?id=xd:liuyan1&ft1='.$value[ip].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[ip],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp60');
$dizhi_f='plugin.php?id=xd:liuyan';//���ؼ���ַ
include template('xd:wjx3');	
}





function  shpfabu(array  $_G,array $post){//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
if(!empty($post[c])){
$a= DB::query("UPDATE ". DB::table('whn_liuyan')." SET x6='".$post[c]."'   WHERE  yid=".$post[b]);
if($post[c]==1){echo  '1';}else{echo  '2';}
}else{
echo  '0';
}
}

function  yinyuefabu(array  $_G,array $post){//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
if(!empty($post[c])){
$a= DB::query("UPDATE ". DB::table('whn_liuyan')." SET x6='".$post[c]."'   WHERE  yid=".$post[b]);
if($post[c]==1){echo  '1';}else{echo  '2';}
}else{
echo  '0';
}
}

function  yinyueshzh1(array  $_G,array $post){//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
$a= DB::query("UPDATE ". DB::table('whn_liuyan')." SET x4='".$post[4]."',x5='".$post[5]."'   WHERE  yid=".$post[yid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=xq_y&b='.$post[yid].'";</script>';
}

function  shpshzh1(array  $_G,array $post){//---------------------------------------��Ƶ��������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
$a= DB::query("UPDATE ". DB::table('whn_liuyan')." SET x4='".$post[4]."',x5='".$post[5]."'   WHERE  yid=".$post[yid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:liuyan_shp&ft=xq_shp&b='.$post[yid].'";</script>';
}



function  shangchuant(array $_G,array $file,$name){//----------------------------------------�ϴ�ͼƬ     ������$file�ϴ�ͼƬ��Ϣ,$array�ļ�������;����ֵ�Ǳ���ͼƬ��ַ,$uid������uid+ϵͳ��
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/jpeg');
$max_size='10000000000';      // ����ļ����ƣ���λ��byte��
$upfile=dzh($_G[uid],'t');  //ͼƬĿ¼·��
   if($_SERVER['REQUEST_METHOD']=='POST'){ //�ж��ύ��ʽ�Ƿ�ΪPOST
     if(!is_uploaded_file($file['tmp_name'])){ //�ж��ϴ��ļ��Ƿ����
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
  if($file['size']>$max_size){  //�ж��ļ���С�Ƿ����500000�ֽ�
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!in_array($file['type'],$arrType)){  //�ж�ͼƬ�ļ��ĸ�ʽ
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }
  if(!file_exists($upfile)){  // �жϴ���ļ�Ŀ¼�Ƿ����
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
        list($width,$height) = getimagesize($picName);//��ȡԭͼ��ߴ�Ŀ����߶�
$c1=501111;//�趨��ͼƬ�������ػ�
if($width*$height>=$c1){$c=$width/$height; $c=$c1/$c;$_height=sqrt($c);$_width=$c1/$_height;$_height=round($_height);$_width=round($_width); 
}else{$_height=$width;$_width=$height;}
        $_img = imagecreatetruecolor($_width,$_height);//Ϊ��ͼ�񴴽�һ������
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
      
      

  list($width,$height) = getimagesize($picName);//��ȡԭͼ��ߴ�Ŀ����߶�
if($width>$height){
$wh=($width-$height)/2;
$wh1=$height;
$_img = imagecreatetruecolor($wh1,$wh1);//Ϊ��ͼ�񴴽�һ������
imagecopy($_img,$img,0,0,$wh,0,$wh1,$wh1); 
   // imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}else{
$wh=($height-$width)/2;
$wh1=$width;
$_img = imagecreatetruecolor($wh1,$wh1);//Ϊ��ͼ�񴴽�һ������
imagecopy($_img,$img,0,0,0,$wh,$wh1,$wh1); //�����޷����ڳߴ磬�ɼ���
//imagecopyresized($_img,$img,0,0,0,0,$wh1,$wh1,$width,$height);//���ƿɵ��ڳߴ磬���ɼ���
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(200,200);//Ϊ��ͼ�񴴽�һ������
  imagecopyresized($_img1,$_img,0,0,0,0,200,200,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path,0, 100);
       imagepng($_img1,$path,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
        ImageDestroy($img);  
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ". DB::table('whn_liuyan')." VALUES ($coun,'".$_G[uid]."','ͼƬ1','".$fname."','".$_G['timestamp']."','�ޱ���','������','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function  shangchuanshp(array $_G,array $file,$name){//----------------------------------------�ϴ���Ƶ    ������$file�ϴ�ͼƬ��Ϣ,$array�ļ�������
$max_size='90000000000';      // ����ļ����ƣ���λ��byte��
$upfile=dzh($_G[uid],'shp');  //ͼƬĿ¼·��
  //echo '<script language="JavaScript">alert("�����������");</script>';
   if($_SERVER['REQUEST_METHOD']=='POST'){ //�ж��ύ��ʽ�Ƿ�ΪPOST
     if(!is_uploaded_file($file['tmp_name'])){ //�ж��ϴ��ļ��Ƿ����
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
 if($file['type']!='video/mp4'){  //�ж�ͼƬ�ļ��ĸ�ʽ
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }

  if($file['size']>$max_size){  //�ж��ļ���С�Ƿ����500000�ֽ�
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!file_exists($upfile)){  // �жϴ���ļ�Ŀ¼�Ƿ����
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
     echo "<font color='#FF0000'>��Ƶ�ļ��ϴ���</font>";
    }
      }
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ". DB::table('whn_liuyan')." VALUES ($coun,'".$_G[uid]."','��Ƶ','".$fname."','".$_G['timestamp']."','�ޱ���','������','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function  shangchuanwz(array $_G,array $post){//----------------------------------------�ϴ�����     ������$file�ϴ�ͼƬ��Ϣ,$array�ļ�������
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ". DB::table('whn_liuyan')." VALUES ($coun,'".$_G[uid]."','����','".$post[content]."','".$_G['timestamp']."','�ޱ���','������','2','','".$post[b]."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function  shangchuany(array $_G,array $file,$name){//----------------------------------------�ϴ�����     ������$file�ϴ�ͼƬ��Ϣ,$array�ļ�������
$max_size='10000000000';      // ����ļ����ƣ���λ��byte��
$upfile=dzh($_G[uid],'y');  //ͼƬĿ¼·��
  
   if($_SERVER['REQUEST_METHOD']=='POST'){ //�ж��ύ��ʽ�Ƿ�ΪPOST
     if(!is_uploaded_file($file['tmp_name'])){ //�ж��ϴ��ļ��Ƿ����
    echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd11').'</div>';
    exit;
    }
   
if($file['type']!='application/octet-stream'){  //�ж�ͼƬ�ļ��ĸ�ʽ
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd13').'</div>';
     exit;
   }

  if($file['size']>$max_size){  //�ж��ļ���С�Ƿ����500000�ֽ�
     echo '<div   style="font-size:80px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!file_exists($upfile)){  // �жϴ���ļ�Ŀ¼�Ƿ����
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
     echo "<font color='#FF0000'>��Ƶ�ļ��ϴ���</font>";
    }
      }
$array= DB::fetch_all("SELECT * FROM ". DB::table('whn_liuyan')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ". DB::table('whn_liuyan')." VALUES ($coun,'".$_G[uid]."','����','".$fname."','".$_G['timestamp']."','�ޱ���','������','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function get_lat_and_lng_ByIP($ip)
{
    if(empty($ip))
    {
         return 'IP����Ϊ��';
    }
$content = file_get_contents('http://api.map.baidu.com/location/ip?ak=x2wdWWgqQ3iqSmYIKWk2xozRIj6TRNpZ&ip='.$ip.'&coor=bd09ll');
$json = json_decode($content,true);
     $lng=$json['content']['point']['lat'];//��ȡ��������$json->lng;
         $lat=$json['content']['point']['lat'];//��ȡγ������
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
//�˳�Discuz�˺� 
function discuz_logout($action){ 
if($action == "log"){  
	unset($_SESSION['userid']);  
	unset($_SESSION['username']);  
	echo 'ע����¼�ɹ�������˴� <a href="login.html">��¼</a>';  
	exit;  
}  
} 
//��¼Discuz�˺� 
function discuz_login($username,$password){ 
require 'E:/ku25.com/wwwroot/bbs/source/class/class_core.php'; //����ϵͳ�����ļ� 
$discuz = & discuz_core::instance(); //���´���Ϊ��������ʼ������ 
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
echo "�ɹ���¼��".time(); 
} 
?>