<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
require_once (DISCUZ_ROOT .'./source/plugin/xd/function_xd314_xd.inc.php');
if(empty($_G['username'])){
//echo '<script language="JavaScript">window.location.href="https://m.woheni99.com/m/login";</script>';
jru();
//echo '<script language="JavaScript">window.location.href="https://www.woheni99.com/member.php?mod=logging&action=login";</script>';
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
case 'ss'://-----------------------------------------------------------------------------------------------------------------------------����
ss($_G,$_POST);
break;
case 'ssb'://-------------------------------------------------------------------------------------------------------------------------����
ssb($_G,$_POST);
break;
case 'ss1'://-----------------------------------------------------------------------------------------------------------------------------����������
ss1($_G,$_POST);
break;
case 'ssb1'://-------------------------------------------------------------------------------------------------------------------------����
ssb1($_G,$_POST);
break;
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
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue";</script>';
}else if("2"==$_GET[me]){
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ɾ����Ƶ
deleteshp($_GET[ft2],$_G['uid']);	
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=shp";</script>';
}
break;
case 'shangchuan'://-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�
//echo '<script language="JavaScript">alert("�����������");</script>';
if("0"==$_GET[me]){
$t=shangchuant($_G,$_FILES['upfilet'],$_GET[b]).'_';
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
}else if("1"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�����
shangchuany($_G,$_FILES['upfiley'],$_GET[b]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
//tyinyue($_G['uid']);
}else if("2"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ���Ƶ
shangchuanshp($_G,$_FILES['upfileshp'],$_GET[b]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
//tyinyue($_G['uid']);
}
else if("3"==$_GET[me]){//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�����
if(!empty($_POST[content])&&$_POST[content]!=''&&$_POST[content]!=undefined){
shangchuanwz($_G,$_POST);
}
//echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=tyinyue&b='.$_GET[b].'";</script>';
}
break;
case 'shangchuan1'://-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------�ϴ�΢�Ŷ�ά��
deletet1($array1[0][x7],$_G['uid']);
$t1=shangchuant($_G,$_FILES['upfile'],$_G['uid']);
 lb_weixinerwm1($t1,$_G[uid]);
lb_weixinerwm($_G[uid]);	
break;

case 'ttouxiangshch'://-----------------------------------------------------------------------------------------------------------------------------ͷ���ϴ�
$t1=shangchuant1($_FILES['upfile'],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
//echo $t1;
break;
case 'tt'://------------------------------------------------------------------------------------------------------------------------------ͼƬ����
 xq_t($_GET[ft2],$_GET[ft1]);
break;
case 'tdizhi'://------------------------------------------------------------------------------------------------------------------------------��ַ����ҳ��
lb_dizhi($_G);
break;
case 'tdizhi1'://------------------------------------------------------------------------------------------------------------------------------��ַ����1
shezhi_dizhi($_G[uid],$_POST[content]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tping'://------------------------------------------------------------------------------------------------------------------------------˽��
lb_ping($_GET[ft1],$_G['uid']);
break;
case 'tname'://------------------------------------------------------------------------------------------------------------------------------------------��������ҳ��
 lb_name($array1[0][x]);
break;
case 'tzhiwu'://--------------------------------------------------------------------------------------------------------------------------------------------ְ��ȼ�����ҳ��    
  lb_zhiwu($array1[0][x1]);
break;
case 'tdianhua'://-------------------------------------------------------------------------------------------------------------------------------------------�绰����ҳ��    
  lb_dianhua($array1[0][x3]);
break;
case 'tQQ'://--------------------------------------------------------------------------------------------------------------------------------------------QQ����ҳ��    
  lb_QQ($array1[0][x4]);
break;
case 'tyouxiang'://--------------------------------------------------------------------------------------------------------------------------------------------��������ҳ��    
  lb_youxiang($array1[0][x5]);
break;
case 'twangzhi'://--------------------------------------------------------------------------------------------------------------------------------------------��վ��ַ����ҳ��    
  lb_wangzhi($array1[0][x9]);
break;
case 'tweixin'://--------------------------------------------------------------------------------------------------------------------------------------------΢�ź�����ҳ��    
  lb_weixin($array1[0][x6]);
break;
case 'tweixinerwm'://--------------------------------------------------------------------------------------------------------------------------------------------΢�Ŷ�ά������ҳ��    
  lb_weixinerwm($_G[uid]);
break;
case 'tqianming'://--------------------------------------------------------------------------------------------------------------------------------------------����ǩ������ҳ��    
  lb_qianming($array1[0][x8]);
break;
case 'tbiaoqian'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵı�ǩ����ҳ��    
  lb_biaoqian($array1[0][x11]);
break;
case 'ttupian'://--------------------------------------------------------------------------------------------------------------------------------------------ͼƬ����ҳ��    
  lb_t1($_G['uid']);
break;
case 'ttupian1'://--------------------------------------------------------------------------------------------------------------------------------------------ͼƬ����ҳ��1   
$b='<div  style="font-size:70px;position:fixed;top:40%;left:20%;">'.lang('plugin/xd', 'mp40').'</div>'; 
 include template('xd:xq');
break;
case 'tyinyuec'://--------------------------------------------------------------------------------------------------------------------------------------------�����б�ҳ��    
  lb_yinyuec($_G['uid'],$_POST);
break;
case 'tyinyueb'://--------------------------------------------------------------------------------------------------------------------------------------------�����б�ҳ��    
  lb_yinyueb($_G,$_POST[b],$_POST);
break;
case 'tyinyued'://--------------------------------------------------------------------------------------------------------------------------------------------�����б�ҳ��    
  lb_yinyued($_G,$_POST[b],$_POST);
break;
case 'tyinyue'://--------------------------------------------------------------------------------------------------------------------------------------------�����б�ҳ��    
if(empty($_GET[b])){echo '<script language="JavaScript">alert("û�й�������Ϣ��");</script>';}else{
  lb_yinyue($_G,$_GET[b],$_GET[ym]);
}
break;
case 'shpb'://--------------------------------------------------------------------------------------------------------------------------------------------��Ƶ�б�ҳ��    
  lb_shpb($_G['uid'],$_POST);
break;
case 'shp'://--------------------------------------------------------------------------------------------------------------------------------------------��Ƶ�б�ҳ��    
  lb_shp($_G['uid'],$_GET[ym]);
break;
case 'tyinyuezhshb'://--------------------------------------------------------------------------------------------------------------------------------------------�����б�ҳ��    
  lb_yinyuezhshb($_GET['b'],$_POST);
break;
case 'tyinyuezhsh'://--------------------------------------------------------------------------------------------------------------------------------------------�����б�ҳ��    
  lb_yinyuezhsh($_GET['b'],$_GET[ym]);
break;
case 'shpzhshb'://---------------------------------------------------------------------------------------------------------------------------------------------��Ƶ�б�ҳ��    
  lb_shpzhshb($_GET['b'],$_POST);
break;
case 'shpzhsh'://---------------------------------------------------------------------------------------------------------------------------------------------��Ƶ�б�ҳ��    
  lb_shpzhsh($_GET['b'],$_GET[ym]);
break;
case 'wqz'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵĹ�������������ҳ��    
  lb_wqz($_G,$array1[0][x18]);
break;
case 'wshd'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵ��̵�����ҳ��    
  lb_wshd($array1[0][x19]);
break;
case 'tpifu'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵ�Ƥ������ҳ��    
 lb_m($_G['uid']);
break;
case 'tpifu1'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵ�Ƥ������ҳ��1    
 lb_m1($_G['uid']);
break;
case 'tpifu2'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵ�Ƥ������ҳ��2    
 lb_m2($_GET['ft1'],$_G['uid']);
break;
case 'gz_gzsh'://-----------------------------------------------------------------------------------------------------------------------------��ע�Ĺ�����ҳ��
lb_gz_gzsh($_G);
break;
case 'gz_gzsh1'://-----------------------------------------------------------------------------------------------------------------------------˭��ע����
lb_gz_gzsh1($_G);
break;
case 'lb_z'://-----------------------------------------------------------------------------------------------------------------------------˭������
lb_z($_G);
break;
case 'quanzi'://----------------------------------------------------------------------------------------------------------------------------Ȧ������ҳ��
lb_quanzi($_G,$array1[0][x20]);
break;
case 'quanzi1'://----------------------------------------------------------------------------------------------------------------------------Ȧ������ҳ��
lb_quanzi1($_G,$_POST);
break;
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------�������б�ҳ������������ҳ��

case 'wqz1'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵĹ�������������    
  lb_wqz1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'wshd1'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵ��̵�����
  lb_wshd1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tname1'://------------------------------------------------------------------------------------------------------------------------------------------��������
 lb_name1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tzhiwu1'://--------------------------------------------------------------------------------------------------------------------------------------------ְ��ȼ�����   
  lb_zhiwu1($_POST[name],$_G['uid']);
 echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tdianhua1'://-------------------------------------------------------------------------------------------------------------------------------------------�绰���� 
  lb_dianhua1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tQQ1'://--------------------------------------------------------------------------------------------------------------------------------------------QQ����   
  lb_QQ1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tyouxiang1'://--------------------------------------------------------------------------------------------------------------------------------------------��������    
  lb_youxiang1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'twangzhi1'://--------------------------------------------------------------------------------------------------------------------------------------------��վ��ַ����  
  lb_wangzhi1($_POST[name],$_G['uid']);
 echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tweixin1'://--------------------------------------------------------------------------------------------------------------------------------------------΢�ź�����    
  lb_weixin1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tweixinerwm1'://--------------------------------------------------------------------------------------------------------------------------------------------΢�Ŷ�ά������
  lb_weixinerwm1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tqianming1'://--------------------------------------------------------------------------------------------------------------------------------------------����ǩ������  
  lb_qianming1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tbiaoqian1'://--------------------------------------------------------------------------------------------------------------------------------------------�ҵı�ǩ����   
  lb_biaoqian1($_POST[name],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'thdp1b'://-------------------------------------------------------------------------------------------------------------------------------��������
shezhi_y($_GET['y'],$_G[uid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'shezhimb'://-------------------------------------------------------------------------------------------------------------------------------Ƥ������
shezhi_mb($_GET['m'],$_G['uid']);
 lb_m1($_G['uid']);
break;
case 'tmp'://------------------------------------------------------------------------------------------------------------------------------------------��Ƭ�༭ҳ��
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
break;
case 'tyidongt'://-------------------------------------------------------------------------------------------------------------------------------------------------�ƶ�ͼƬ
yidongt($_GET['ft2'],$array1,$_GET['f']);
lb_t1($_G['uid']);
break;
case 'deletehdp'://-------------------------------------------------------------------------------------------------------------------------------ɾ���õ�Ƭ
deletehdp($_GET[ft2],$_G['uid'],$_GET[run]);
lb_hdp($_G['uid']);
break;
case 'shji'://-------------------------------------------------------------------------------------------------------------------------------����
x_shji($_G);
break;
case 'shzh_jinb'://-------------------------------------------------------------------------------------------------------------------------------����
shzh_jinb($_G);
break;
case 'x_kt'://------------------------------------------------------------------------------------------------------------------------------��ͨ������
x_kt($_G);
break;
case 'tollstation'://-------------------------------------------------------------------------------------------------------------------------------����
x_tollstation($_G,$_GET[b]);
break;
case 'shzh_tollstation'://----------------------------------------------------------------------------------------------------------------------------����
shzh_tollstation($_G,$_GET[b],$_GET[c]);
break;
case 'cz'://-------------------------------------------------------------------------------------------------------------------------����
//cz();
break;
case 'x_weizhi':
x_weizhi($_GET[b]);//-------------------------------------------------------------------------��ַҳ
break;
case 'gzsh_user'://----------------------------------------------------------------------------------------------------------------------------------------------------------------------------�û�����
if(empty($_G['username'])){
echo '<script language="JavaScript">window.location.href="https://www.woheni99.com/member.php?mod=logging&action=login";</script>';	
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
lb_usercenter($_G,$_GET,$_GET[b]);//--------------------------------------�û�����    ������$m�Ƿ񷢲�����Ϣ,$uid����id
break;
case 'gzshdt'://----------------------------------------------------------------------------------------------------------------------------��Ա
gzshdt($_G,$_GET["b"],$_GET["c"]);
break;
case 'wmgj'://--------------------------------------------------------------------------------------------------------------------------��������
wmgj($_G);
break;
case 'leib1'://-------------------------------------------------------------------------------------------------------------------------���
leib1($_G[uid],$_POST["leib"]);
//echo '<script language="JavaScript">alert("dddddd");</script>';
break;
case 'leib'://--------------------------------------------------------------------------------------------------------------------------���
leib($_G);
break;
case 'jru1'://-------------------------------------------------------------------------------------------------------------------------����
jru1();
break;
case 'tuis'://------------------------------------------------------------------------------------------------------------------------------��Ŀ����
tuis($_G,$_POST,$_GET[ft0]);
break;
case 'achyub'://------------------------------------------------------------------------------------------------------------------------------��Ŀ��ѯ
achyub($_G,$_POST);
break;
case 'tt1'://------------------------------------------------------------------------------------------------------------------------------ͼƬ����
if(empty($_G['username'])){
echo '<script language="JavaScript">window.location.href="https://www.woheni99.com/member.php?mod=logging&action=login";</script>';	
}else{
 xq_t1($_GET[b],$_GET[c]);
}
break;
default:
x_kt($_G);
break;
}
}


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

function  xq_t1($name,$mid){//----------------------------------------ͼƬ����     ������$name ͼƬ��,$mid ��Ƭid
$dizhi= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE  yid=".$name)[0]; 
$b='<img  id="i" src="'.$dizhi[x2].'" width=100%  />';
echo  '
<html>
<head>
<meta charset="utf-8">
 <meta name="description" content="ͼƬ����">
  <meta name="keywords" content="ͼƬ����">
  
  <title>ͼƬ����</title>

<body>
<a    href="javascript:history.back(-1)"><img   src="wjxa/xm����.png"     style="width:50px;position:fixed;top:5px;left:5px"    /></a>
<a    href="javascript:history.back(-1)"><img   src="wjxa/xm����.png"     style="width:50px;position:fixed;bottom:5px;right:5px"    /></a>
'.$b.'
</body>
</html>
';
}

function  jru(){//--------------------------------------����
echo '<script language="JavaScript">window.location.href="https://www.woheni99.com/mobcent/app/web/js/appbyme/denglu.php";</script>';
}
function  jru1(){//--------------------------------------����
if(empty($_G['username'])){
echo '<script language="JavaScript">window.location.href="https://www.woheni99.com/mobcent/app/web/js/appbyme/denglu.php?b=aa";</script>';
}else{
x_kt($_G);
}
}


function  ssb(array  $_G,array  $post){//-----------------------------------------����ta������    ������$_G,$content
$whn_xd314=new   whn_xd;
if($post[xxz]=="����"){
if(!empty($post[cont])&&$post[cont]!=""){$post[cont]=" WHERE   username   LIKE  '%".$post[cont]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]."        LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list">';
foreach($array as $key =>$value){
          
echo  '<div   style="border-bottom:1px solid #E0E0E0;color:black;margin-bottom:8px;background:white"><a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"  target="_blank">
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
</div><span  style="font-size:13px;color:black;padding:8px">'.date("y��m��d�� H:i",$value[dateline]).'</span><span   style="float:right;color:black">'.$value[author].'</span >
</td></tr></table></a></div>';
              }
echo  '</div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�з��������Ĺ�����!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}else  if($post[xxz]=="�˺�"){

}else{

}

}

function  ssb1(array  $_G,array  $post){//-----------------------------------------����ta������    ������$_G,$content
$whn_xd314=new   whn_xd;
if($post[xxz]=="����"){
if(!empty($post[cont])&&$post[cont]!=""){$post1[cont]=" WHERE   subject   LIKE  '%".$post[cont]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont] ); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont]."            LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[authorid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC"><a href="plugin.php?id=xd:mp1&ft1='.$value[authorid].'">
 <div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[authorid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center" >
<a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"    style="color:#BEBEBE">'.$value[subject].'</a>
</td>
</tr>

 </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�з��������Ĺ���������!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}else  if($post[xxz]=="������1"){
if(!empty($post[cont])&&$post[cont]!=""){$post[cont]=" WHERE   username   LIKE  '%".$post[cont]."%' ";}

$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[cont]."      LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:mp1&ft1='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$value[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="plugin.php?id=xd:straight&a=a1&b='.$value[uid].'"><span  style="margin-left:8px;color:white">��ע</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�з��������Ĺ�����!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}else  if($post[xxz]=="������2"){
if(!empty($post[cont])&&$post[cont]!=""){$post[cont]=$post[cont]-1001212;$post[cont]=" WHERE   uid=".$post[cont];}
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[cont]."    ORDER BY  x11  DESC  "); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[cont]."         ORDER BY  x11  DESC       LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:mp1&ft1='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="plugin.php?id=xd:straight&a=a1&b='.$value[uid].'"><span  style="margin-left:8px;color:white">��ע</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�з��������Ĺ�����!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}else{
if(!empty($post[cont])&&$post[cont]!=""){$post1[cont]=" WHERE   subject   LIKE  '%".$post[cont]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont] ); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post').$post1[cont]."            LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[authorid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC"><a href="plugin.php?id=xd:mp1&ft1='.$value[authorid].'">
 <div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[authorid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center" >
<a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"    style="color:#BEBEBE">'.$value[subject].'</a>
</td>
</tr>

 </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�з��������Ĺ���������!</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}
}



function  tuis(array  $_G,array  $post,$y1){//-----------------------------------------��Ŀ����     ������$_G,$content$_POST,$y1
$whn_xd314=new   whn_xd;
//echo '<script language="JavaScript">alert("'.$post[content].'");</script>';
$whn_xd314->total_start1('����','����','����','','#F0F0F0');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
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
<option value="����">����������</option><option value="������1">������(�Թ�������������)</option><option value="������2">������(�Թ�����ID����)</option></select>
</td>
<td   width="70%">
<input  id="sosu"   name="sosu" type="text"  style="width:100%;font-size:15px;color:#4F4F4F;border-radius:18px;border:1px solid #d41d3c;padding:0px;height:36px"  value=""   placeholder="������"/>
</td>
<td>
<a  href="javascript:void(0);" onclick="fy(\'0\')"><span  style="width:70px;float:right;height:36px;color:#d41d3c;border-radius:20px;background:white;line-height:36px">����</span></a>
</td>
</tr>

</table></div>
<div  style="background:white;display:none">
<table   width="100%"     bordercolor="#E0E0E0"  border="0"  cellspacing="8"  cellpadding="0"    style="">
<tr  align="center"   style="">
<td   align="left"    width="20%"   style=""><span  style="color:#8E8E8E;margin-left:0px">��</span>
<select name="province" id="province" style="font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white"     onchange="m()"     >		
<option value="ȫ��">ȫ��</option><option value="����">����</option><option value="�Ϻ�">�Ϻ�</option><option value="���">���</option><option value="����">����</option><option value="�Ĵ�">�Ĵ�</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="�㶫">�㶫</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="�ຣ">�ຣ</option><option value="����">����</option><option value="�½�">�½�</option><option value="�ӱ�">�ӱ�</option><option value="ɽ��">ɽ��</option><option value="���ɹ�">���ɹ�</option><option value="����">����</option><option value="�㽭">�㽭</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="ɽ��">ɽ��</option><option value="����">����</option><option value="����">����</option><option value="������">������</option><option value="̨��">̨��</option><option value="����">����</option><option value="���">���</option><option value="����">����</option></select>
<td    align="left"    width="20%"  style="border-radius:18px"><span  style="color:#8E8E8E;margin-top:5.5px;float:left">��</span>
<span   name="city1"   id="city1"   >
<select     class="city"  name="city"    id="city"     onchange="m1()" ><option value="����">����</option></select>
  </span>  
</td>
<td    align="left"    width="25%"   style="border-radius:18px"> <span  style="color:#8E8E8E;margin-top:6px;float:left">��</span>
<select name="leib" id="leib" style="font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white;width:70%"       onchange="fy(0)"   >		
<option value="������">������</option><option value="����">����</option><option value="��Ƶ">��Ƶ</option></select>
</td>
<td      width="20%">
<a  href="javascript:void(0);" onclick="sos()"  ><span  style="width:70px;float:right;height:30px;color:#d41d3c;border-radius:20px;background:#E0E0E0;line-height:30px"  id="ssss1" ><img      src="wjxa/����.png"     style="width:30%;margin-top:4px"/></span></a>
</td>
</tr></table></div>
<div    id="tuiss">
</div>
<div   style="background:#5B5B5B;width:100%;font-size:20px;height:0px;color:white;text-align:center;display:none"     id="tuiss1"  ></div>
<div  class="space">woheni</div>
<div   id="msg">
';

$array=array();
$fy=$whn_xd314->body_fy($array,$y1,30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
if(count($array)>0){

}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px;color:#ADADAD">����������ʾ�����</div>';}
$whn_xd314->body_fyb_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
$whn_xd314->body_fyb();//---------------------------------------��ҳb ������
echo  '</div></div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=ssb1"','
var cont3=document.getElementById("leib").value;var cont2=document.getElementById("city").value;var cont1=document.getElementById("province").value;var cont=document.getElementById("sosu").value;var xxz=document.getElementById("xxz").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&xxz="+xxz+"&cont3="+cont3+"&cont2="+cont2+"&cont1="+cont1+"&cont="+cont');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
echo  '<script src="https://api.map.baidu.com/api?v=1.2" type="text/javascript"></script>  
<script language="javascript" type="text/javascript">
window.onload =chushihua;
';
$script='
var a="https://www.woheni99.com/plugin.php?id=xd:xiangmu&ft=tuis";
function  fxx(){
connectSQJavascriptBridge(function(){
sq.share("'.$title.'", "����鿴����",a, function(result){
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
if(province=="ȫ��"){
city.innerHTML="<select   class=\'city\'   name=\'city\' id=\'city\'><option value=\'����\'>����</option></select>";
}else if(province=="����"){
city.innerHTML="<select   class=\'city\'   name=\'city\'    id=\'city\'       onchange=\'m1()\'        onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��̨��\'>��̨��</option><option value=\'ʯ��ɽ��\'>ʯ��ɽ��</option><option value=\'������\'>������</option><option value=\'��ͷ����\'>��ͷ����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'ͨ����\'>ͨ����</option><option value=\'˳����\'>˳����</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'ƽ����\'>ƽ����</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="�Ϻ�"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'¬����\'>¬����</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'բ����\'>բ����</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ζ���\'>�ζ���</option><option value=\'�ֶ�����\'>�ֶ�����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ɽ���\'>�ɽ���</option><option value=\'������\'>������</option><option value=\'�ϻ���\'>�ϻ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="���"){
city.innerHTML="<select   class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'��ƽ��\'>��ƽ��</option><option value=\'�Ӷ���\'>�Ӷ���</option><option value=\'������\'>������</option><option value=\'�Ͽ���\'>�Ͽ���</option><option value=\'�ӱ���\'>�ӱ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'����\'>����</option></select>";
}else if(province=="����"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɿ���\'>��ɿ���</option><option value=\'������\'>������</option><option value=\'ɳƺ����\'>ɳƺ����</option><option value=\'��������\'>��������</option><option value=\'�ϰ���\'>�ϰ���</option><option value=\'������\'>������</option><option value=\'��ʢ��\'>��ʢ��</option><option value=\'˫����\'>˫����</option><option value=\'�山��\'>�山��</option><option value=\'������\'>������</option><option value=\'ǭ����\'>ǭ����</option><option value=\'������\'>������</option><option value=\'�뽭��\'>�뽭��</option><option value=\'������\'>������</option><option value=\'ͭ����\'>ͭ����</option><option value=\'������\'>������</option><option value=\'�ٲ���\'>�ٲ���</option><option value=\'�ɽ��\'>�ɽ��</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'�ǿ���\'>�ǿ���</option><option value=\'�ᶼ��\'>�ᶼ��</option><option value=\'�潭��\'>�潭��</option><option value=\'��¡��\'>��¡��</option><option value=\'����\'>����</option><option value=\'����\'>����</oion><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��Ϫ��\'>��Ϫ��</option><option value=\'ʯ����\'>ʯ����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'��ˮ��\'>��ˮ��</option><option value=\'����\'>����</option><option value=\'�ϴ�\'>�ϴ�</option><option value=\'����\'>����</option><option value=\'�ϴ�\'>�ϴ�</option></select>";
}else if(province=="�Ĵ�"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'�ɶ���\'>�ɶ���</option><option value=\'�Թ���\'>�Թ���</option><option value=\'��֦����\'>��֦����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��Ԫ��\'>��Ԫ��</option><option value=\'������\'>������</option><option value=\'�ڽ���\'>�ڽ���</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ϳ���\'>�ϳ���</option><option value=\'üɽ��\'>üɽ��</option><option value=\'�˱���\'>�˱���</option><option value=\'�㰲��\'>�㰲��</option><option value=\'������\'>������</option><option value=\'�Ű���\'>�Ű���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option></select>";
}else if(province=="����"){
city.innerHTML="<select     class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'����ˮ��\'>����ˮ��</option><option value=\'������\'>������</option><option value=\'��˳��\'>��˳��</option><option value=\'ͭ�ʵ���\'>ͭ�ʵ���</option><option value=\'ǭ����\'>ǭ����</option><option value=\'�Ͻڵ���\'>�Ͻڵ���</option><option value=\'ǭ������\'>ǭ������</option><option value=\'ǭ����\'>ǭ����</option></select>";
}else if(province=="����"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��Ϫ��\'>��Ϫ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��ͨ��\'>��ͨ��</option><option value=\'������\'>������</option><option value=\'�ն���\'>�ն���</option><option value=\'�ٲ���\'>�ٲ���</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��˫������\'>��˫������</option><option value=\'������\'>������</option><option value=\'�º���\'>�º���</option><option value=\'ŭ����\'>ŭ����</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'ɽ�ϵ���\'>ɽ�ϵ���</option><option value=\'�տ������\'>�տ������</option><option value=\'��������\'>��������</option><option value=\'�������\'>�������</option><option value=\'��֥����\'>��֥����</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'       name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'֣����\'>֣����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'ƽ��ɽ��\'>ƽ��ɽ��</option><option value=\'������\'>������</option><option value=\'�ױ���\'>�ױ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'�����\'>�����</option><option value=\'�����\'>�����</option><option value=\'����Ͽ��\'>����Ͽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�ܿ���\'>�ܿ���</option><option value=\'פ�����\'>פ�����</option></select>";
}else if(province=="����"){
city.innerHTML="<select        class=\'city\'          name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'�人��\'>�人��</option><option value=\'��ʯ��\'>��ʯ��</option><option value=\'ʮ����\'>ʮ����</option><option value=\'�˲���\'>�˲���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Т����\'>Т����</option><option value=\'������\'>������</option><option value=\'�Ƹ���\'>�Ƹ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ʩ��\'>��ʩ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Ǳ����\'>Ǳ����</option><option value=\'������\'>������</option><option value=\'��ũ������\'>��ũ������</option></select>";
}else if(province=="����"){
city.innerHTML="<select    class=\'city\'        name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'��ɳ��\'>��ɳ��</option><option value=\'������\'>������</option><option value=\'��̶��\'>��̶��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�żҽ���\'>�żҽ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'¦����\'>¦����</option><option value=\'������\'>������</option></select>";
}else if(province=="�㶫"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'�ع���\'>�ع���</option><option value=\'������\'>������</option><option value=\'�麣��\'>�麣��</option><option value=\'��ͷ��\'>��ͷ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'տ����\'>տ����</option><option value=\'ï����\'>ï����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'÷����\'>÷����</option><option value=\'��β��\'>��β��</option><option value=\'��Դ��\'>��Դ��</option><option value=\'������\'>������</option><option value=\'��Զ��\'>��Զ��</option><option value=\'��ݸ��\'>��ݸ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�Ƹ���\'>�Ƹ���</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'           name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'���Ǹ���\'>���Ǹ���</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'��ɫ��\'>��ɫ��</option><option value=\'������\'>������</option><option value=\'�ӳ���\'>�ӳ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'ͭ����\'>ͭ����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'μ����\'>μ����</option><option value=\'�Ӱ���\'>�Ӱ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'��ˮ��\'>��ˮ��</option><option value=\'������\'>������</option><option value=\'��Ҵ��\'>��Ҵ��</option><option value=\'ƽ����\'>ƽ����</option><option value=\'��Ȫ��\'>��Ȫ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'¤����\'>¤����</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="�ຣ"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'             name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'ʯ��ɽ��\'>ʯ��ɽ��</option><option value=\'������\'>������</option><option value=\'��ԭ��\'>��ԭ��</option><option value=\'������\'>������</option></select>";
}else if(province=="�½�"){
city.innerHTML="<select      class=\'city\'               name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'��³ľ����\'>��³ľ����</option><option value=\'����������\'>����������</option><option value=\'��³������\'>��³������</option><option value=\'���ܵ���\'>���ܵ���</option><option value=\'������\'>������</option><option value=\'���������ɹ���\'>���������ɹ���</option><option value=\'���������ɹ���\'>���������ɹ���</option><option value=\'�����յ���\'>�����յ���</option><option value=\'�������տ¶�������\'>�������տ¶�������</option><option value=\'��ʲ����\'>��ʲ����</option><option value=\'�������\'>�������</option><option value=\'�����������\'>�����������</option><option value=\'���ǵ���\'>���ǵ���</option><option value=\'����̩����\'>����̩����</option><option value=\'ʯ������\'>ʯ������</option><option value=\'��������\'>��������</option><option value=\'ͼľ�����\'>ͼľ�����</option><option value=\'�������\'>�������</option></select>";
}else if(province=="�ӱ�"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'ʯ��ׯ��\'>ʯ��ׯ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ػʵ���\'>�ػʵ���</option><option value=\'������\'>������</option><option value=\'��̨��\'>��̨��</option><option value=\'������\'>������</option><option value=\'�żҿ���\'>�żҿ���</option><option value=\'�е���\'>�е���</option><option value=\'������\'>������</option><option value=\'�ȷ���\'>�ȷ���</option><option value=\'��ˮ��\'>��ˮ��</option></select>";
}else if(province=="ɽ��"){
city.innerHTML="<select      class=\'city\'            name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'̫ԭ��\'>̫ԭ��</option><option value=\'��ͬ��\'>��ͬ��</option><option value=\'��Ȫ��\'>��Ȫ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'˷����\'>˷����</option><option value=\'������\'>������</option><option value=\'�˳���\'>�˳���</option><option value=\'������\'>������</option><option value=\'�ٷ���\'>�ٷ���</option><option value=\'������\'>������</option></select>";
}else if(province=="���ɹ�"){
city.innerHTML="<select        class=\'city\'                  name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'���ͺ�����\'>���ͺ�����</option><option value=\'��ͷ��\'>��ͷ��</option><option value=\'�ں���\'>�ں���</option><option value=\'�����\'>�����</option><option value=\'ͨ����\'>ͨ����</option><option value=\'������˹��\'>������˹��</option><option value=\'���ױ�����\'>���ױ�����</option><option value=\'�����׶���\'>�����׶���</option><option value=\'�����첼��\'>�����첼��</option><option value=\'�˰���\'>�˰���</option><option value=\'���ֹ�����\'>���ֹ�����</option><option value=\'��������\'>��������</option></select>";
}else if(province=="����"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'�Ͼ���\'>�Ͼ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ͨ��\'>��ͨ��</option><option value=\'���Ƹ���\'>���Ƹ���</option><option value=\'������\'>������</option><option value=\'�γ���\'>�γ���</option><option value=\'������\'>������</option><option value=\'����\'>����</option><option value=\'̩����\'>̩����</option><option value=\'��Ǩ��\'>��Ǩ��</option></select>";
}else if(province=="�㽭"){
city.innerHTML="<select       class=\'city\'              name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'����\'>����</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'̨����\'>̨����</option><option value=\'��ˮ��\'>��ˮ��</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                 name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'�Ϸ���\'>�Ϸ���</option><option value=\'�ߺ���\'>�ߺ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'ͭ����\'>ͭ����</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                     name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Ȫ����\'>Ȫ����</option><option value=\'������\'>������</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'�ϲ���\'>�ϲ���</option><option value=\'��������\'>��������</option><option value=\'Ƽ����\'>Ƽ����</option><option value=\'�Ž���\'>�Ž���</option><option value=\'������\'>������</option><option value=\'ӥ̶��\'>ӥ̶��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�˴���\'>�˴���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="ɽ��"){
city.innerHTML="<select        class=\'city\'                   name=\'city\'    id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'�ൺ��\'>�ൺ��</option><option value=\'�Ͳ���\'>�Ͳ���</option><option value=\'��ׯ��\'>��ׯ��</option><option value=\'��Ӫ��\'>��Ӫ��</option><option value=\'��̨��\'>��̨��</option><option value=\'Ϋ����\'>Ϋ����</option><option value=\'������\'>������</option><option value=\'̩����\'>̩����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�ĳ���\'>�ĳ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                  name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��˳��\'>��˳��</option><option value=\'��Ϫ��\'>��Ϫ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Ӫ����\'>Ӫ����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�̽���\'>�̽���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��«����\'>��«����</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                      name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'��Դ��\'>��Դ��</option><option value=\'ͨ����\'>ͨ����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��ԭ��\'>��ԭ��</option><option value=\'�׳���\'>�׳���</option><option value=\'�ӱ���\'>�ӱ���</option></select>";
}else if(province=="������"){
city.innerHTML="<select       class=\'city\'                name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'��������\'>��������</option><option value=\'���������\'>���������</option><option value=\'������\'>������</option><option value=\'�׸���\'>�׸���</option><option value=\'˫Ѽɽ��\'>˫Ѽɽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ľ˹��\'>��ľ˹��</option><option value=\'��̨����\'>��̨����</option><option value=\'ĵ������\'>ĵ������</option><option value=\'�ں���\'>�ں���</option><option value=\'�绯��\'>�绯��</option><option value=\'���˰������\'>���˰������</option></select>";
}else if(province=="̨��"){
city.innerHTML="<select       class=\'city\'                         name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'̨����\'>̨����</option><option value=\'������\'>������</option><option value=\'̨����\'>̨����</option><option value=\'������\'>������</option><option value=\'��¡��\'>��¡��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��Ͷ��\'>��Ͷ��</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'̨����\'>̨����</option><option value=\'̨����\'>̨����</option><option value=\'��԰��\'>��԰��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�û���\'>�û���</option></select>";
}else if(province=="����"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɳ��\'>��ɳ��</option><option value=\'������\'>������</option><option value=\'��ָɽ��\'>��ָɽ��</option><option value=\'�Ĳ���\'>�Ĳ���</option><option value=\'����\'>����</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="���"){
city.innerHTML="<select       class=\'city\'                     name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'����\'>����</option><option value=\'����\'>����</option><option value=\'�½�\'>�½�</option><option value=\'ɳ����\'>ɳ����</option><option value=\'��ɳ��\'>��ɳ��</option><option value=\'�ͼ�����\'>�ͼ�����</option><option value=\'Ԫ����\'>Ԫ����</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'             name=\'city\'      id=\'city\'       onchange=\'m1()\' ><option value=\'����������\'>����������</option><option value=\'ʥ����������\'>ʥ����������</option><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'��˳����\'>��˳����</option></select>";
}
fy(0);
}


</script>
';

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β	
}

function  ss(array  $_G,array  $post){//-----------------------------------------����ta������    ������$_G,$content
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('����','����','����','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo  '<div class="funbar"   style="" >
<a  href="plugin.php?id=xd:mp"><img   src="wjxa/��ҳ.png"    style="width:20px;margin:10px;margin-top:20px"></a>
<a  href="javascript:void(0);" onclick="fy(\'0\')"><span  style="float:right;color:white;margin-right:6px">����</span></a>
<input  id="sosu"   name="sosu" type="text"  style="width:40%;height:30px;float:right;margin:15px;background:#BEBEBE;border:0;font-size:18px;border-radius:8px;text-align:center"  value="'.$post[content].'"   placeholder="�������˺�"/>
<select name="xxz" id="xxz" style="width:20%;height:30px;float:right;margin-top:15px;border-radius:8px"       >		
<option value="����">����</option><option value="����">����</option><option value="��������">��������</option><option value="�������˺�">�������˺�</option><option value="��Ƶ��">��Ƶ��</option></select>
  </div><div  class="space">woheni</div>
<div   id="msg">';


echo  '<div  style="width:100%;text-align:center;padding-top:8px">���������ݽ���������ʾ��</div></div>';

//echo  '<div class="fixed_nav fixed_nav_no_wx"><ul><li><a href="plugin.php?id=xd:straight&a=chyu"> <span class="iconfont">&#xe607;</span>��˿����</a> </li><li> <a href="plugin.php?id=xd:straight&a=fsgl"> <span class="iconfont">&#xe61f;</span>�ҵĹ�ע</a> </li><li   class="on" > <a href="plugin.php?id=xd:straight&a=achyu"> <span class="iconfont">&#xe6a5;</span>�µĴ�</a> </li>   </ul>  </div></div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=ssb1"','
var cont=document.getElementById("sosu").value;var xxz=document.getElementById("xxz").value;
','fya();',1,'"ym="+a+"&xxz="+xxz+"&cont="+cont');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β	
}





function leib1($uid,$content){//----------------------------------------��ַ����    ������$_G
$a= DB::query("UPDATE ".DB::table('mp')." SET x16='".$content."'   WHERE uid=".$uid);
echo '<script language="JavaScript">window.location.href="https://www.woheni99.com/plugin.php?id=xd:mp";</script>';
}
function  leib(array $_G){//-------------------------------------�������
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$_G['uid'])[0];
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('�������','�������','�������','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo  '


<form  id="f" action="plugin.php?id=xd:mp&ft=leib1" method="post"  accept-charset="utf-8"  >
<div  style="width:60%;height:60px;position:fixed;top:20%;left:20%;border-radius:8px;font-size:20px"  >��������ѡ������ù����ҵ����</div>
<select name="leib" id="leib" style="width:60%;height:60px;position:fixed;top:40%;left:20%;border-radius:8px"       >		
<option value="����">����</option><option value="��ҽ">��ҽ</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="��Ʒ">��Ʒ</option>
<option value="��ʳ">��ʳ</option><option value="����">����</option><option value="��װ">��װ</option><option value="�ط�">�ط�</option><option value="��ס">��ס</option></select>
<a href="javascript:void(0);" onclick="f()"><div   class="submit"   style="position:fixed;bottom:10%;">ȷ������</div></a>
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
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}

function  wmgj(array $_G){//--------------------------------------����������
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('����������','����������','����������','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo  '
<div  style="">
<a href=""><div   class=""  style="height:20px;color:white">��</div></a>

<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
      <li><a href="plugin.php?id=xd:chpk&ft=chpml"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_����ƽ̨.png"     style="width:50%"/></span> ������Ʒ���� </a> </li>
<li><a href="plugin.php?id=xd:zhmd&ft=chxun"  class="add"> <span class="iconfont"><img   src="wjxa/��ѯ.png"     style="width:47%;margin-top:1px"/></span> <span  style="margin-top:0px;font-size:11px"> ����ר�����ѯ</span></a> </li>
<li><a href="plugin.php?id=xd:wmjsq"  class="add"> <span class="iconfont"><img   src="wjxa/������.png"     style="width:53%;margin-top:-2px"/></span><span  style="margin-top:-3px;font-size:11px"> ����������</span></a> </li>
<li><a href="plugin.php?id=xlwsq_video"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_��Ƶ����.png"     style="width:50%"/></span><span  style="margin-top:-1px;font-size:11px"> ������Ƶ</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
<li><a href="plugin.php?id=xd:schedule&b=1"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_ÿ�ռƻ�.png"     style="width:50%"/></span> <span  style="margin-top:-3px;font-size:11px">�ƻ�����</span></a> </li>
<li><a href="plugin.php?id=xd:customer&b=1"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_ֱ��.png"     style="width:50%"/></span> <span  style="margin-top:-3px;font-size:11px">��Ա����</span></a> </li>
    </ul>
  </div>
</div>
';
$title='����������ҳ�����';
//$title1='��������';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}


function  gzshdt(array  $_G,$y1,$uid){//----------------------------------------�����Ҷ�̬
$whn_xd314=new   whn_xd;
$whn_xd314->total_start1('�����Ҷ�̬','�����Ҷ�̬','�����Ҷ�̬','','white');//-----------------------------------------------------------------------------------html�ļ����忪ͷ1   $title,$keywords,$description,$head,background
$sublist=DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1   ORDER BY  dateline  DESC   LIMIT  0,1");
if(count($sublist)>0){
foreach($sublist as $key =>$value){
if(!empty($value)){
echo  '
<div   style="border-bottom:0px solid #E0E0E0;color:#5B5B5B;margin-bottom:8px;background:white;width:100%"><a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"  target="_blank">
<table   border="0"  cellspacing="8"  cellpadding="0"   style="width:100%"><tr><td  style=""> <div><div  style="color:#4F4F4F;padding:8px;font-size:12px;float:left">���¶�̬��'.$value[subject].'</div><span  style="font-size:12px;color:#BEBEBE;padding:8px;float:right">'.date("y��m��d�� H:i",$value[dateline]).'</span></div></td></tr><tr><td  style="">';
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
echo  '<img  src="wjxa/��������.png"  style="width:20px;height:20px"   />';
}
if(!empty($shp[1])){
echo   '<img  src="wjxa/��Ƶ����.png"  style="width:23px;height:23px;margin-left:8px;margin-bottom:-1.5px"   />';
}
echo   '
</span >
</td></tr></table></a></div>
              <!--{/loop}--></div>
';


}
}       
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�����¶�̬</div>';}

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β	
}

function  lb_usercenter(array  $_G,array  $get,$uid){//----------------------------------------�û�����     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid)[0];
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE  uid=".$uid)[0];
$xiangmu= DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE  x20=".$uid)[0];
if(empty($xiangmu[uid])){
$whn_xd314->total_start($array[username],$array[username],$array[username],'');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
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
echo  $array[username].'�Ĺ�����';
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
<li><a href="plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$get[r].'"  class="add"> <span class="iconfont"><img   src="wjxa/չʾ.png"     style="width:53%"/></span>  <span  style="margin-top:-5px;font-size:12px">��ҳ<span></a> </li>
<li><a href="javascript:void(0);" onclick="a11()"  class="add"> <span class="iconfont"><img   src="wjxa/��ά��1.png"     style="margin-top:2px;width:48%"/></span> <span  style="margin-top:-2px;font-size:12px"> ��ά�� <span></a> </li>
<li><a href="plugin.php?id=xd:straight&a=a1&b='.$uid.'"  class="add"> <span class="iconfont"   style="margin-top:0px"><img   src="wjxa/����.png"     style="width:50%"/></span>  <span  style="margin-top:-3px;font-size:12px">��ע<span></a> </li>
<li><a href="plugin.php?id=xd:communication&a=3&b='.$uid.'&c=1"  class="add"> <span class="iconfont"  style="margin-top:2px"><img   src="wjxa/��Ϣ����.png"     style="width:45%"/></span> <span class="iconfont"  style="margin-top:-2px;font-size:12px">����Ϣ</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
   <li> <a href="tel:'.$array1[x3].'"> <span class="iconfont"><img   src="wjxa/��ӵ绰.png"     style="width:50%"    /> </span> �绰</a> </li>
<li> <a href="sms:'.$array1[x3].'"><span class="iconfont"><img   src="wjxa/���Ͷ���.png"    style="width:50%" /> </span>���� </a> </li>
      <li><a href="javascript:void(0);" onclick="wx()"  > <span class="iconfont"   class="wxx"><img   src="wjxa/���΢��.png"     style="width:50%"/></span>   ΢�� </li>
<li> <a href="javascript:void(0);" onclick="dizhi(\''.$array1[x15].'\')"> <span class="iconfont"><img   src="wjxa/gzsh_��ַ.png"   style="width:50%"  /></span>  ��ַ </a> </li>
    </ul>
  </div>
<div  style="display:none"  id="dizhi"></div>
<div id="erw1"  style="width:100%;height:800px;position:fixed;z-index:9;top:0px;left:0px;display:none;background:url(\'wjxa/fjj.jpg\') no-repeat;background-size:100% 100%;"><div style="margin:5px;float:right;width:10%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:10px;background:#272727">��</div></div>
  <div id="erw" style="position:fixed;z-index:9;top:10%;left:15%;width:70%;display:none"><div id="output"  style="width:100%"></div><div  style="width:100%;text-align:center"><span style="position:relative;top:20px;width:100%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:5px">'.$array[username].'�Ĺ����Ҷ�ά��</span></div>
</div>
';
echo  '
<a    href="plugin.php?id=xd:straight1&a=shang&b='.$uid.'"><img   src="wjxa/����.png"     style="width:50px;position:fixed;bottom:5%;right:5%"    /></a>
<script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script>
 function wx(){
  $(\'.wxx1\').trigger(\'select\');
  document.execCommand(\'copy\');
  alert(\'΢�ź�:'.$array1[x6].'\');

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
	jQuery(\'#output\').qrcode(\'https://www.woheni99.com/plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$_G[uid].'\');
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
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}else{
$shangchenga=DB::fetch_all("SELECT * FROM ".DB::table('whn_shangchenga')." WHERE     x14='1'   AND  x16='".$uid."'" );
$dizhi=$xiangmu[x].'|'.$xiangmu[x3].'|'.$xiangmu[x4];
$whn_xd314->total_start1($xiangmu[x],$xiangmu[x],$xiangmu[x],'','white');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
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
<img   src="wjxa/xm����֤1.png"     style="width:60%;margin:8px"    />

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
<li   class="Logout"  style="color:#3C3C3C"><a href="plugin.php?id=xd:tuisong_dpu&ft=tuis&b='.$uid.'&r='.$get[r].'"  class="add"><span class="iconfont"><img  src="wjxa/xm����.png"   style="width:20px;margin-bottom:-4px"/></span>Ta�ĵ���(��Ʒ'.count($shangchenga).'��)<b  style="color:#8E8E8E">></b></a></li>
</ul>
    <div class="both"></div>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
<li><a href="plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$get[r].'"  class="add"> <span class="iconfont"><img   src="wjxa/xm��ҳ.png"     style="width:53%"/></span>  <span  style="margin-top:-5px;font-size:12px">��ҳ<span></a> </li>
      <li><a href="javascript:void(0);" onclick="a11()"  class="add"> <span class="iconfont"><img   src="wjxa/��ά��1.png"     style="margin-top:2px;width:48%"/></span> <span  style="margin-top:-2px;font-size:12px"> ��ά�� <span></a> </li>
<li><a href="plugin.php?id=xd:straight&a=a1&b='.$uid.'"  class="add"> <span class="iconfont"   style="margin-top:0px"><img   src="wjxa/����.png"     style="width:50%"/></span>  <span  style="margin-top:-3px;font-size:12px">��ע<span></a> </li>
<li><a href="plugin.php?id=xd:communication&a=3&b='.$uid.'&c=1"  class="add"> <span class="iconfont"  style="margin-top:2px"><img   src="wjxa/��Ϣ����.png"     style="width:45%"/></span> <span class="iconfont"  style="margin-top:-2px;font-size:12px">����Ϣ</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
   <li> <a href="tel:'.$xiangmu[x2].'"> <span class="iconfont"><img   src="wjxa/��ӵ绰.png"     style="width:50%"    /> </span> �绰</a> </li>
<li> <a href="sms:'.$xiangmu[x2].'"><span class="iconfont"><img   src="wjxa/���Ͷ���.png"    style="width:50%" /> </span>���� </a> </li>
      <li   ><a href="plugin.php?id=xd:tuiguang&a=zhifux&b='.$uid.'"  > <span class="iconfont"   class="wxx"><img   src="wjxa/xm֧��.png"     style="width:50%"/></span>֧�� </li>
  <li  style="display:none"><a href="javascript:void(0);" onclick="wx()"  > <span class="iconfont"   class="wxx"><img   src="wjxa/���΢��.png"     style="width:50%"/></span>   ΢�� </li>
<li> <a href="javascript:void(0);" onclick="dizhi(\''.$dizhi.'\')"> <span class="iconfont"><img   src="wjxa/gzsh_��ַ.png"   style="width:50%"  /></span>  ��ַ </a> </li>
    </ul>
  </div>
<div  style="display:none"  id="dizhi"></div>
<div id="erw1"  style="width:100%;height:800px;position:fixed;z-index:9;top:0px;left:0px;display:none;background:url(\'wjxa/fjj.jpg\') no-repeat;background-size:100% 100%;"><div style="margin:5px;float:right;width:10%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:10px;background:#272727">��</div></div>
  <div id="erw" style="position:fixed;z-index:9;top:10%;left:15%;width:70%;display:none"><div id="output"  style="width:100%"></div><div  style="width:100%;text-align:center"><span style="position:relative;top:20px;width:100%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:5px">'.$array[username].'�Ĺ����Ҷ�ά��</span></div>
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

<li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/xmʱ��.png"   style="width:20px;margin-bottom:-4px"/></span>Ӫҵʱ��<b  style="color:#8E8E8E">'.$xiangmu[x6].'</b></li>
<li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"   style="margin-left:2px"><img  src="wjxa/xm����.png"   style="width:16px;margin-bottom:-4px"/></span><span    style="margin-left:2px">Ա������</span><b  style="color:#8E8E8E">'.$xiangmu[x7].'</b></li>
</ul>
    <div class="both"></div>
  </div>
<div style="height:40px;line-height:40px;margin-left:12px"><img  src="wjxa/xm����.png"   style="width:19px;margin-bottom:-4px"/><span    style="font-size:13px;color:#4F4F4F;margin-left:3px">�����ҷ�������</span></div>
<pre  style="color:#8E8E8E;background:white;margin-left:16px;margin-right:16px">'.$xiangmu[x8].'</pre>

<div   class="space"  style="color:white">woheni</div>
<a    href="plugin.php?id=xd:straight1&a=shang&b='.$uid.'&r='.$get[r].'"><img   src="wjxa/����.png"     style="width:50px;position:fixed;bottom:5%;right:5%"    /></a>
<script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script>
 function wx(){
  $(\'.wxx1\').trigger(\'select\');
  document.execCommand(\'copy\');
  alert(\'΢�ź�:'.$array1[x6].'\');

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
	jQuery(\'#output\').qrcode(\'https://www.woheni99.com/plugin.php?id=xd:mp1&ft1='.$uid.'&r='.$_G[uid].'\');
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
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β





}
}

function  lb_shpzhshb($uid,array  $post){//----------------------------------------��Ƶ�б�     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[media%'  ORDER BY  dateline  DESC");
$fy=$whn_xd314->body_fy($array,$post[ym],6);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
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
<a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/��Ƶ����.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и�����Ƶ!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}

function  lb_shpzhsh($uid,$y1){//----------------------------------------��Ƶ�б�     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('��Ƶ','��Ƶ','��Ƶ','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp1&ft1='.$uid.'"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">����</span></a>
</div><div class="space"     id="sosu">woheni</div>
<div   id="msg">
';
$whn_xd314->total_shangchuanw('plugin.php?id=xd:mp&ft=shangchuan&me=1','');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[media%'  ORDER BY  dateline  DESC");
$fy=$whn_xd314->body_fy($array,$y1,6);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
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
<a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/��Ƶ����.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и�����Ƶ!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
echo  '</div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=shpzhshb&b='.$uid.'"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���



$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}

function  lb_yinyuezhshb($uid,array  $post){//----------------------------------------�����б�     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC");

$fy=$whn_xd314->body_fy($array,$post[ym],6);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����

$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[authorid])){
$value[subject]=substr($value[subject], 0 ,10);
$yinpinx=explode('[/audio]',$value[message]);   
$yinpinx1=explode('[audio]',$yinpinx[0])[1];
echo  '<li class="a-bounceinR"  style="">
<a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/��������.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'</div>
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и�����Ƶ!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}

function  lb_yinyuezhsh($uid,$y1){//----------------------------------------�����б�     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('��������','��������','��������','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp1&ft1='.$uid.'"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">����</span></a>
</div><div class="space"     id="sosu">woheni</div>
<div   id="msg">
';
$whn_xd314->total_shangchuanw('plugin.php?id=xd:mp&ft=shangchuan&me=1','');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC");
$fy=$whn_xd314->body_fy($array,$y1,6);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$uid."      AND  first=1  AND message LIKE  '%[audio]%'  ORDER BY  dateline  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[authorid])){
$value[subject]=substr($value[subject], 0 ,10);
$yinpinx=explode('[/audio]',$value[message]);   
$yinpinx1=explode('[audio]',$yinpinx[0])[1];
echo  '<li class="a-bounceinR"  style="">
<a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"><div     class="btn-audio1">
<img  src="wjxa/��������.png"  style="width:30px;margin:15px;float:left"   /><div  style="width:40%;height:20px;float:left">'.$value[subject].'</div>
</div></a></li>';}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и�����Ƶ!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
echo  '</div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=yinyuezhshbb&b='.$uid.'"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���



$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}

function  gzsh_user(array $_G){//------------------------------------------�û�����
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
$title='�û�����';
$whn_xd314->total_start('�û�����','�û�����','�û�����','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
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
<a href="https://api.mch.weixin.qq.com/pay/unifiedorder"     style="display:none"><div   class="submit1"  style="background:#BEBEBE;border-radius:5px">С��APPjs�ӿ�</div></a>
 <a href="http://www.woheni99.com/mobcent/app/web/js/appbyme/xd314.html"><div   class="submit1"  style="background:#BEBEBE;border-radius:5px">С��APPjs�ӿ�</div></a>
';
 }
echo  '
<div class="user_nav"><div id="msg"></div>
    <ul>
<a href="plugin.php?id=fn_pinche&ac=pay"><li   class="PayStateGo"><span class="iconfont"><img  src="wjxa/�þñ�.png"   style="width:20px;margin-bottom:-4px"/></span>�þñ�:<span class="money">'.$cou[extcredits3].'</span><b>�����ֵ</b></li></a>
<a href="plugin.php?id=xd:tx_gl&ft=mytx"><li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/����.png"   style="width:20px;margin-bottom:-4px"/></span>����<b  style="color:#BEBEBE">��</b></li></a>
<a href="plugin.php?id=xd:tuiguang&a=fsgl"><li   class="Logout"  style="color:#3C3C3C;display:none"><span class="iconfont"><img  src="wjxa/center����.png"   style="width:20px;margin-bottom:-4px"/></span>�ҵĿ���<b  style="color:#BEBEBE">��</b></li></a>
<a href="plugin.php?id=xd:tuiguang&a=zhfjl"><li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/tg��¼.png"   style="width:20px;margin-bottom:-4px"/></span>֧����¼('.$shouyi1.')<b  style="color:#BEBEBE">��</b></li></a>
<a href="plugin.php?id=xd:straight1&a=shouyi"><li   class="Logout"  style="color:#3C3C3C"><span class="iconfont"><img  src="wjxa/����.png"   style="width:20px;margin-bottom:-4px"/></span>�����¼('.$shouyi.')<b  style="color:#BEBEBE">��</b></li></a>

	  <li class="Logout"  style=""><a href="https://www.woheni99.com/mobcent/app/web/js/appbyme/denglu.php"><span class="iconfont">&#xe60e;</span>�˳�<em class="iconfont">&#xe77b;</em></a></li>
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
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
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

function shzh_tollstation(array  $_G,$b,$c){//----------------------------------------���Ϳ۳��þñ�  
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','0.05','1','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.01;
$cou2[extcredits4]=$cou2[extcredits4]+0.01;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','0.01','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.01;
$cou2[extcredits4]=$cou2[extcredits4]+0.01;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','0.01','','','".$c."','','','','','','','','','','','','','','','','')");
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','0.3','2','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.06;
$cou2[extcredits4]=$cou2[extcredits4]+0.06;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET    extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'       WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','0.06','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.06;
$cou2[extcredits4]=$cou2[extcredits4]+0.06;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','0.06','','','".$c."','','','','','','','','','','','','','','','','')");
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','3','3','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.6;
$cou2[extcredits4]=$cou2[extcredits4]+0.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET     extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'        WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','0.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+0.6;
$cou2[extcredits4]=$cou2[extcredits4]+0.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','0.6','','','".$c."','','','','','','','','','','','','','','','','')");
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','8','4','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+1.6;
$cou2[extcredits4]=$cou2[extcredits4]+1.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET     extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'      WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','1.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+1.6;
$cou2[extcredits4]=$cou2[extcredits4]+1.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','1.6','','','".$c."','','','','','','','','','','','','','','','','')");
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','194','5','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+6.6;
$cou2[extcredits4]=$cou2[extcredits4]+6.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'       WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','6.6','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+6.6;
$cou2[extcredits4]=$cou2[extcredits4]+6.6;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','6.6','','','".$c."','','','','','','','','','','','','','','','','')");
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','64','6','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+12.8;
$cou2[extcredits4]=$cou2[extcredits4]+12.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'       WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','12.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+12.8;
$cou2[extcredits4]=$cou2[extcredits4]+12.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','12.8','','','".$c."','','','','','','','','','','','','','','','','')");
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','144','7','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+28.8;
$cou2[extcredits4]=$cou2[extcredits4]+28.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'      WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','28.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+28.8;
$cou2[extcredits4]=$cou2[extcredits4]+28.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','28.8','','','".$c."','','','','','','','','','','','','','','','','')");
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
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$c."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','����','194','8','','','','','','','','','','','','','','','','','','')");
if(!empty($mp[x27])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$mp[x27])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+38.8;
$cou2[extcredits4]=$cou2[extcredits4]+38.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET      extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'        WHERE uid=".$mp[x27]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$mp[x27]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','38.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
if(!empty($arr[x])){
$cou2= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$arr[x])[0];
$cou2a[extcredits3]=$cou2[extcredits3]+38.8;
$cou2[extcredits4]=$cou2[extcredits4]+38.8;
$a= DB::query("UPDATE ".DB::table('common_member_count')." SET   extcredits3='".$cou2a[extcredits3]."',extcredits4='".$cou2[extcredits4]."'     WHERE uid=".$arr[x]);
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_shouyi')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_shouyi')." VALUES (".$yid.",'".$arr[x]."','".$_G[uid]."','".$memb[username]."','".$_G['timestamp']."','���','38.8','','','".$c."','','','','','','','','','','','','','','','','')");
}
}


echo '<script language="JavaScript">alert("�Ѵ��ͣ���ǰ���С�'.$cou[extcredits3].'���þñ�");</script>';
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:straight1&a=shang&b='.$c.'";</script>';
}

function  x_kt(array $_G){//---------------------------------------��ͨ������
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
if(empty($array1[0][x3])){$jj='һ�������ҵĹ�����';}else{$jj='�鿴�ҵĹ�����';}
$n1= DB::fetch_all("SELECT * FROM ".DB::table('mpzp')." WHERE  (z=''  AND  ip=".$_G['uid'].") OR (z=''  AND  uid=".$_G['uid'].")");
$n1=count($n1);
$tp= DB::fetch_all("SELECT  x10  FROM ".DB::table('mp')." WHERE  uid=".$_G[uid])[0][x10];
$sublist=DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$_G['uid']."  AND  fid=100    AND  first=1  ORDER  BY  pid   DESC    LIMIT  0,5");
$n3=DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$_G['uid'])[0];
$guanzhu= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x=".$_G[uid]); 
$guanzhu=count($guanzhu);
$dizhi_to='plugin.php?id=xd:mp1&ft1='.$_G[uid];//��ת��ַ
$dizhi_b='plugin.php?id=xd:mp&ft=ttouxiangshch';//���ύ��ַ
$ftype=explode('_',$tp); 
$title=$n3[username].'�Ĺ�����';
$script='
var a="https://www.woheni99.com/plugin.php?id=xd:mp1&ft1='.$_G['uid'].'&r='.$_G['uid'].'";
function  fx(){
if(confirm("����������ɻ�öԷ��ڴ˹����������ѵ���ɣ��Ƿ�ȷ�Ϸ���(��[�Һ���99]APP�з������Ч��)")){
connectSQJavascriptBridge(function(){
sq.share("'.$title.'", "����鿴����",a, function(result){
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

function  jibie($j){//---------------------------------------���ͼ���   ������$uid�û�uid��$ty�ļ�����
switch ($j){
case '1':
return '<img  src="wjxa_liwu/1 �þñ� �ʻ�.png"    style="width:40px" />';
break;
case '2':
return '<img  src="wjxa_liwu/6 �þñ� ����.png"    style="width:40px" />';
break;
case '3':
return '<img  src="wjxa_liwu/66 �þñ� ����ʯ.png"    style="width:40px" />';
break;
case '4':
return '<img  src="wjxa_liwu/168 ��������.png"    style="width:40px" />';
break;
case '5':
return '<img  src="wjxa_liwu/388 ��������.png"    style="width:40px" />';
break;
case '6':
return '<img  src="wjxa_liwu/888 �þñ� ����˽����ͧ.png"    style="width:40px" />';
break;
case '7':
return '<img  src="wjxa_liwu/6666 �þñ� �����ɻ�.png"    style="width:40px" />';
break;
case '8':
return '<img  src="wjxa_liwu/9999 ������.png"    style="width:40px" />';
break;
default:
return '';
break;
}
}

function  x_tollstation(array $_G,$uid){//----------------------------------------����

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
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp";</script>';
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


function  x_shji(array $_G){//----------------------------------------����
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('mp')."  WHERE   uid=".$_G[uid])[0];
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------��Ƭ��������
if(!empty($cou1[x])){
$time=date('Y��m��d�� H:i:s', $cou1[x]);
$y=explode('��',$time);
$m=explode('��',$y[1]);
$d=explode('��',$m[1]);
$date=$y[0].'-'.($m[0]+1).'-'.$d[0].$d[1];
if(strtotime($date)<$_G['timestamp']){
$a= DB::query("UPDATE ".DB::table('mp')." SET  x17='1'     WHERE uid=".$_G[uid]);
}
}
if(empty($cou1[x17])){$cou1[x17]=1;}


$jinb=array("5","5","10","20","40","45","80");
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];

$title='������Ƭ��ʽ';

$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
include template('xd:basic_mp_style');	
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
$dizhi_b='plugin.php?id=xd:mp&ft=tdizhi1';
include template('xd:mp3');	
}



function  lb_name($s){//----------------------------------------��������ҳ��    ������$sĬ������

$body=lang('plugin/xd', 'mp6.0').'<input  autoFocus  name="name" id="name"   type="text"  value="'.date("Y-m-d  h:i:s",$s).'"  style="width:100%;height:50px;font-size:15px"/>';
$title=lang('plugin/xd', 'mp6');
$dizhi_b='plugin.php?id=xd:mp&ft=tname1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
include template('xd:mp2');	
}


function  lb_zhiwu($s){//----------------------------------------ְ��ȼ�����ҳ��    ������$sĬ������ 
$action_f='plugin.php?id=xd:mp&ft=tzhiwu1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$placeholder='����������������޸�ְ����Ϣ';
$name='name';
$value=$s;
$title='ְ��';
$text_fanhui='����';
$text_baocun='����';
//$type='tel';
include template('xd:customer_edit');
}
function  lb_dianhua($s){//----------------------------------------�绰����ҳ��   ������$sĬ������
$action_f='plugin.php?id=xd:mp&ft=tdianhua1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$placeholder='���ڴ��޸ĵ绰����';
$name='name';
$value=$s;
$title='�绰';
$text_fanhui='����';
$text_baocun='����';
//$type='tel';
include template('xd:customer_edit');
}
function  lb_QQ($s){//----------------------------------------QQ����ҳ��       ������$sĬ������
$action_f='plugin.php?id=xd:mp&ft=tQQ1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$placeholder='���ڴ��޸�QQ��';
$name='content';
$value=$s;
$title='QQ��';
$text_fanhui='����';
$text_baocun='����';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_youxiang($s){//-----------------------------------------��������ҳ��      ������$sĬ������
$action_f='plugin.php?id=xd:mp&ft=tyouxiang1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$placeholder='���ڴ��޸������ַ';
$name='content';
$value=$s;
$title='�����ַ';
$text_fanhui='����';
$text_baocun='����';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_wangzhi($s){//-----------------------------------------��վ��ַ����ҳ��  ������$sĬ������
$body=lang('plugin/xd', 'mp15').lang('plugin/xd', 'mp.2').'<input   autoFocus   name="name" id="name"   type="text"  value="'.$s.'" style="width:100%;height:50px"/>';
$title=lang('plugin/xd', 'mp15');
$dizhi_b='plugin.php?id=xd:mp&ft=twangzhi1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
include template('xd:mp2');	
}

function  lb_weixin($s){//----------------------------------------΢�ź�����ҳ��  ������$sĬ������
$action_f='plugin.php?id=xd:mp&ft=tweixin1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$placeholder='���ڴ��޸�΢�ź�';
$name='name';
$value=$s;
$title='΢�ź�';
$text_fanhui='����';
$text_baocun='����';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_weixinerwm($uid){//-----------------------------------------�˿������ά������ҳ��     ������$uid�û�uid


$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid);
$ftype=explode('_',$array1[0][x7]); 
$a=0;

$b='<br/><a href="https://woheni99.com/forum.php?mod=viewthread&tid=10584&page=1&extra=#pid11829  "><div   align="center"  style=""><span     style="font-size:25px;color:white;border-radius:5px;border:1px solid #FF9797;background:#d41d3c;width:87%;height:40px;line-height:40px">&nbsp����������˲鿴&nbsp</span></div></a>';
while(!empty($ftype[$a])){ 
$flist=$ftype[$a];
$arr[$a]='<div   align="center"><img src="'.dzh($uid,'t').'/'.$flist.'" align="center"  style="width:200px;height:200px;"/> </div>';
$a+=1;
}

$title1="t1";
$title=lang('plugin/xd', 'mp13.1');
$dizhi_b='plugin.php?id=xd:mp&ft=shangchuan1&me=0';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$gl='<a href="plugin.php?id=xd:mp&ft=tmp">
<span  style="float:right;color:white;height:26px;margin-right:5px;font-size:15px">'.lang('plugin/xd', 'hdp15').'</span></a> ';
$b1='<br/><a href="javascript:void(0);" onclick="a()"><div   align="center"  style="font-size:25px;color:#3C3C3C">���<button    style="font-size:25px;margin-right:5px;color:white;background:#d41d3c;border-radius:10%"  >�ϴ�</button>�����ά��</div></a>';
$me=0;
include template('xd:hdp2');	
}

function  lb_qianming($s){//---------------------------------------������������ҳ��       ������$sĬ������
$action_f='plugin.php?id=xd:mp&ft=tqianming1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$placeholder='���ڴ������������';
$name='name';
$value=$s;
$title='��������';
$text_fanhui='����';
$text_baocun='����';
//$type='tel';
include template('xd:customer_edit');
}

function   lb_biaoqian($s){//---------------------------------------�ҵı�ǩ����ҳ��   ������$sĬ������
$body=lang('plugin/xd', 'mp17').lang('plugin/xd', 'mp.2').'<input     autoFocus      name="name" id="name"   type="text" value="'.$s.'" style="width:100%;height:50px"/>';
$title=lang('plugin/xd', 'mp17');
$dizhi_b='plugin.php?id=xd:mp&ft=tbiaoqian1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
include template('xd:mp2');	
}

function  lb_t1($uid){//----------------------------------------ͼƬ�б�1     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid);
$ftype=explode('_',$array1[0][x10]); 
if(count($ftype)<=6){
$dizhi_b='plugin.php?id=xd:mp&ft=shangchuan&me=0';//���ύ��ַ
}else{echo '<script language="JavaScript">alert("�����ϴ�6�ţ�");</script>';}

$whn_xd314->total_start('������Ƶ','������Ƶ','������Ƶ','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
$whn_xd314->total_shangchuant($dizhi_b,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">����</span></a>
</div><div class="space"     id="sosu">woheni</div>
';

if(count($ftype)>0){
foreach($ftype as $key =>$value){
if(!empty($value)){
echo  '<div style="width:150px;height:200px;float:left;margin:0 0 10px   10px;background:url('.dzh($uid,'t1').'/'.$value.') no-repeat;background-size:100% 100%;"><a href="plugin.php?id=xd:mp&ft=delete&ft2='.$value.'&me=0"><input  type="button"  style="color:black;font-size:15px;background:#F0F0F0;margin:8px;border-radius:8px;float:right" value="'.lang('plugin/xd', 'hdp12').'"/></a><br/>
<a href="plugin.php?id=xd:mp&ft=tt&ft2='.$value.'&ft1='.$uid.'"    target="_blank"><input  type="button"  style="color:white;font-size:15px;margin:2px;margin-left:0px;width:150px;height:120px;background:white;filter:alpha(opacity=100);opacity: 0" value="����鿴"/></a>
<a href="plugin.php?id=xd:mp&ft=tyidongt&ft2='.$value.'&f=0"><input  type="button"  style="color:black;font-size:15px;background:#F0F0F0;margin:8px;border-radius:8px;" value="'.lang('plugin/xd', 'hdp13').'"/></a><a href="plugin.php?id=xd:mp&ft=tyidongt&ft2='.$value.'&f=1"><input  type="button"  style="color:black;font-size:15px;background:#F0F0F0;margin:8px;border-radius:8px;float:right" value="'.lang('plugin/xd', 'hdp14').'"/></a></div>';
}}
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û��ͼƬ����!</div>';}

echo  '<a href="javascript:void(0);" onclick="a()"> <div   class="submit" style="position:fixed;bottom:0px;">�ϴ�ͼƬ</div></a>';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}

function  lb_shpb($uid,array  $post){//----------------------------------------��Ƶ�б�     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='��Ƶ'  ORDER BY  x3  DESC");

$fy=$whn_xd314->body_fy($array,$post[ym],6);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='��Ƶ'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
$flist1=explode('-',$value); 
$flist2=date('Y��m��d�� H:i:s',$flist1[0]);
if(empty($value[x4])){$value[x4]="�ޱ���";}
if(empty($value[x5])){$value[x5]="������";}
if($value[x6]==1){$value[x6]="�ѷ���";}else{$value[x6]="δ����";}
echo  '<li class="a-bounceinR"  style="background:#8E8E8E">
<div class="Table">
<table cellpadding="0" cellspacing="0"   style="width:100%">  
<tr   height="30px"  > <td align="center"  style="border-bottom:1px solid #D0D0D0;">
'.$value[x4].'</td><td align="center"  style="border-bottom:1px solid #D0D0D0;"><div  style="">
'.$flist2.'</div>
</td></tr>
<tr   height="90px"  > <td align="center"   colspan="2">
<video width="100%" height="100px"    src="'.dzh($uid,'shp').'/'.$value[x2].'" type="video/mp4"   poster="wjxa/��Ƶ.png"> </video>
</div>
</td></tr>
<tr   height="60px"  > <td align="center"  colspan="2">
   <div  style="">'.$value[x5].'</div>
</td></tr>
<tr> <td  align="center">
<div  style="background:#BEBEBE;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-size:20px"><span  style="color:white">'.$value[x6].'</span></td><td align="center"   width="50%">
<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><a href="plugin.php?id=xd:mp&ft=xq_shp&b='.$value[yid].'"><div  style="color:white;width:100%">����</div></a>
</td></tr> </table></li>';
}}
echo  '</ul></div><div   class="space"    >woheni</div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и�����Ƶ!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}

function  lb_shp($uid,$y1){//----------------------------------------��Ƶ�б�     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('������Ƶ','������Ƶ','������Ƶ','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp&ft=tmp"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">����</span></a>
</div><div class="space"     id="sosu">woheni</div>
<div   id="msg">
';
$whn_xd314->total_shangchuanshp('plugin.php?id=xd:mp&ft=shangchuan&me=2','');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='��Ƶ'   ORDER BY  x3  DESC");

$fy=$whn_xd314->body_fy($array,$y1,6);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x='".$uid."'  AND  x1='��Ƶ'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
$flist1=explode('-',$value[x2]); 
$flist2=date('Y��m��d�� H:i:s',$flist1[0]);
if(empty($value[x4])){$value[x4]="�ޱ���";}
if(empty($value[x5])){$value[x5]="������";}
if($value[x6]==1){$value[x6]="�ѷ���";}else{$value[x6]="δ����";}
echo  '<li class="a-bounceinR"  style="background:#8E8E8E">
<div class="Table">
<table cellpadding="0" cellspacing="0"   style="width:100%">  
<tr   height="30px"  > <td align="center"  style="border-bottom:1px solid #D0D0D0;">
'.$value[x4].'</td><td align="center"  style="border-bottom:1px solid #D0D0D0;"><div  style="">
'.$flist2.'</div>
</td></tr>
<tr   height="90px"  > <td align="center"   colspan="2">
<video width="100%" height="100px"    src="'.dzh($uid,'shp').'/'.$value[x2].'" type="video/mp4"   poster="wjxa/��Ƶ.png"> </video>
</div>
</td></tr>
<tr   height="60px"  > <td align="center"  colspan="2">
   <div  style="">'.$value[x5].'</div>
</td></tr>
<tr> <td  align="center">
<div  style="background:#BEBEBE;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-size:20px"><span  style="color:white">'.$value[x6].'</span></td><td align="center"   width="50%">
<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><a href="plugin.php?id=xd:mp&ft=xq_shp&b='.$value[yid].'"><div  style="color:white;width:100%">����</div></a>
</td></tr> </table></li>';
}}
echo  '</ul></div><div   class="space"    >woheni</div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и�����Ƶ!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
echo  '</div>';
$whn_xd314->total_ajax0('fy(a)','"plugin.php?id=xd:mp&ft=shpb"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
echo  '<a href="javascript:void(0);" onclick="a()"> <div   class="submit" style="position:fixed;bottom:0px;">�ϴ���Ƶ</div></a>';


$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}


function  lb_yinyuec($uid,array  $post){//----------------------------------------��̳c     ������$array  wjk����,$array1  mp���� 
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE    x8='".$post[b]."'   ORDER BY  x3  DESC");
if($array[0][yid]!=$post[i]){
echo  $array[0][yid];
}else{
echo $post[i];
}
}

function  lb_yinyued(array  $_G,$uid,array  $post){//----------------------------------------��̳b     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC");
$ttsh=2;
$fy=$whn_xd314->body_fy($array,$post[ym],$ttsh);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='ͼƬ1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='����'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px"></div>';}

}

function  lb_yinyueb(array  $_G,$uid,array  $post){//----------------------------------------��̳b     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC");
$ttsh=3;
$fy=$whn_xd314->body_fy($array,$post[ym],$ttsh);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$uid."'   ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='ͼƬ1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='����'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px"></div>';}

}

function  lb_yinyue(array  $_G,$uid,$y1){//----------------------------------------��̳     ������$array  wjk����,$array1  mp���� 
$whn_xd314=new   whn_xd;
$xtt=$uid;
//echo '<script language="JavaScript">alert("'.$xtt.'");</script>';	
$whn_xd314->total_start('','��̳','��̳','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
$whn_xd314->total_shangchuanwz('plugin.php?id=xd:mp&ft=shangchuan&me=3&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuanshp('plugin.php?id=xd:mp&ft=shangchuan&me=2&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuany('plugin.php?id=xd:mp&ft=shangchuan&me=1&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$whn_xd314->total_shangchuant('plugin.php?id=xd:mp&ft=shangchuan&me=0&b='.$xtt,'');//----------------------------------------------------------------------------------�ϴ��ļ���$url        ($dizhi_b��post��ַ,$dizhi_b1  post��ַ1��
$ll=explode('luntan',$xtt); 
$array11= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE            x4='1'      AND     x=".$ll[0]); 

echo '
<div class="funbar"    style="height:40px;line-height:40px">
<a href="plugin.php?id=xd:mp1&ft1='.$ll[0].'"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:15px;margin:18px  0  18px  5px">����</span></a><img   id="cya"  src="wjxa/��Ա.png"   style="float:right;width:20px;margin-top:10px;margin-right:8px"/><span   style="float:right;color:white;margin-right:8px;font-size:15px"   >��Ա��'.count($array11).'</span>
</div><div class="space"  style="height:200px;background:white"   id="sosu">woheni</div>';

$whn_xd314->total_popup1('cy','display:block','','
<div style="background:#F0F0F0;overflow:scroll"><iframe style="border-bottom:solid 1px #9D9D9D;position:fixed;z-index:9;top:0px;left:0px;width:100%"   height="55px"   src="plugin.php?id=xd:assistant&a=5&c='.$ll[0].'" allowfullscreen="" frameborder="0"></iframe></div>

');//-----------------------------------------------------------------------------------������1   $id,$css,$position,$content      ������ťidΪ$id.a

$sublist=DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE  authorid=".$ll[0]."      AND  first=1   ORDER BY  dateline  DESC   LIMIT  0,1");
if(count($sublist)>0){
foreach($sublist as $key =>$value){
if(!empty($value)){
echo  '
<div   style="position:fixed;z-index:5;top:40px;left:0px;border-bottom:0px solid #E0E0E0;color:#5B5B5B;margin-bottom:8px;background:white;width:100%"><a href="https://www.woheni99.com/forum.php?mod=viewthread&tid='.$value[tid].'&mobile=2"  target="_blank">
<table   border="0"  cellspacing="8"  cellpadding="0"   style="width:100%"><tr><td  style=""> <div><div  style="color:#4F4F4F;padding:8px;font-size:12px;float:left">���¶�̬��'.$value[subject].'</div><span  style="font-size:12px;color:#BEBEBE;padding:8px;float:right">'.date("y��m��d�� H:i",$value[dateline]).'</span></div></td></tr><tr><td  style="">';
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
echo  '<img  src="wjxa/��������.png"  style="width:20%;height:50px;margin-left:40%;"   />';
}
if(!empty($shp[1])){
echo   '<img  src="wjxa/��Ƶ����.png"  style="width:40%;height:90px;margin-left:30%;"   />';
}
echo   '
</span >
</td></tr></table></a></div>
              <!--{/loop}--></div>
';


}
}       
}else{echo  '<div  style="position:fixed;z-index:5;top:40px;left:0px;width:100%;text-align:center;padding-top:8px">û�����¶�̬</div>';}




echo  '

<div   id="msg">
';

$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$xtt."'     ORDER BY  x3  DESC");
$fy=$whn_xd314->body_fy($array,$y1,2);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE   x8='".$xtt."'    ORDER BY  x3  DESC    LIMIT   ".$fy[0].",".$fy[3]);
$qqxx= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE            x4='1'      AND     x='".$ll[0]."'  AND    x1=".$_G[uid]); 
$qqxx1= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE            x4='2'      AND     x='".$_G[uid]."'  AND    x1=".$ll[0]); 
if($_G[uid]==$ll[0]||!empty($qqxx[0])){
$whn_xd314->body_fy2_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
krsort($array);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
if(!empty($value[x2])){
 if($value[x1]=='ͼƬ1'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white"><img   src="'.dzh($value[x],'t1').'/'.$value[x2].'"    style="width:40%"></img></span ></div>
</li>';
}

}else  if($value[x1]=='����'){
if($_G[uid]!=$value[x]){
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:left;margin-bottom:12px"><span  style="float:left;margin-right:5px">&nbsp<a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a></span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:left;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}else{
echo  '<li class=""  style="background:#F0F0F0">
<div  style="width:100%;text-align:center"><span  style="background:#F0F0F0;border-radius:3px;color:#9D9D9D">'.date("y��m��d�� H:i:s",$value[x3]).'</span></div><div  style="width:100%;float:right;margin-bottom:12px"><span  style="float:right;margin-left:5px"><a href="plugin.php?id=xd:mp&ft=lb_usercenter&b='.$value[x].'"  target="_blank"><img src="'.avatar($value[x],middle,true).'"   style="height:40px;width:40px;border-radius:20px"></a>&nbsp</span><span  style="overflow:hidden;word-break:break-all;border-radius:6px;font-size:22px;float:right;border:1px solid #F0F0F0;margin-top:10px;max-width:70%;background:white">&nbsp'.$value[x2].'&nbsp</span ></div>
</li>';
}
}
}
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и�����Ϣ!</div>';}


echo  '</div><div class="space"  >woheni</div>';
$whn_xd314->total_ajax2('wz1()','"plugin.php?id=xd:mp&ft=shangchuan&me=3"','
var  a=document.getElementById("wz").value;
if(a==""){alert("���벻��Ϊ�գ�");}else{var  content=a;}
','
document.getElementById("wz").value="";fy1(0);
',1,'"content="+content+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

$whn_xd314->total_ajax2('shx()','"plugin.php?id=xd:mp&ft=tyinyuec"','
','if(resp!=ggxx){ggxx=resp;var k=0;fy1(k);}',1,'"i="+ggxx+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

$whn_xd314->total_ajax3('fy1(a)','"plugin.php?id=xd:mp&ft=tyinyued"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���


$whn_xd314->total_ajax3('fy(a)','"plugin.php?id=xd:mp&ft=tyinyueb"','
var cont=document.getElementById("sosu").value;document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));
','fya();',1,'"ym="+a+"&cont="+cont+"&b='.$xtt.'"');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
echo  ' 


<div   id="jia"  class="font1" style="position:fixed;bottom:8px;left:10%;border-top:0px solid #3C3C3C;width:80%;display:none">
<div onclick="wz1()"   style="text-align:center;width:22%;margin-top:4px;margin-right:7px;font-size:18px;color:white;height:35px;border:1px solid #DCDCDC;background:#40C2F7;border-radius:10px;float:right">����</div>

<textarea   autoFocus   placeholder=""   style="width:70%;margin-top:7px;font-size:24px;background:white;resize:none;border:1px solid #F0F0F0;border-radius:5px;margin-right:2%;float:right"   id="wz" rows="1" ></textarea>
</div>
<a     href="javascript:void(0);" onclick="jia()"   style=""><img id="jia1"  src="wjxa/����.png"   style="width:10%;border-radius:0px;position:fixed;bottom:8px;right:2%;border-top:0px solid #3C3C3C;" ></img></a>
';
}else{
echo  '
<div  style="width:100%;text-align:center;color:red;margin-top:100px;font-size:20px"><span   style="color:#9D9D9D">����'.$fy[2].'��������Ϣ��</span><br/><br/>
���¼������Ta�Ĺ�����<br/>���ܲ鿴���������ۣ�
</div><br/><br/>
';
if(empty($_G[uid])){
echo  '<div   class="submit">��¼</div>';
}else{
if(empty($qqxx1[0])){
echo  '<a  href="plugin.php?id=xd:straight&a=a1&b='.$ll[0].'"><div   class="submit">����</div></a>';
}else{
echo  '<div   class="submit">��ȴ���׼��</div>';
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
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
}
function  lb_m1($uid){//----------------------------------------չʾҳģ���б�1    ������$array  wjk����,$array1  mp����      ͼƬͳһΪ .jpg
$whn_xd314=new   whn_xd;
$whn_xd314->total_start(lang('plugin/xd', 'mp18'),lang('plugin/xd', 'mp18'),lang('plugin/xd', 'mp18'),'');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo '
<div class="funbar" >
<a href="plugin.php?id=xd:mp&ft=tmp"><span  style="color:white;border-radius: 0 15px 15px;height:26px;font-size:18px;margin:18px  0  18px  5px">����</span></a>
 <a href="plugin.php?id=xd:mp1&ft1='.$uid.'"><span   style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'xd21').'</span></a>
  </div>
<br/><br/><br/><br/>
';
$namee=array("Ĭ�Ϸ��","�������","Ĭ�Ϸ��","�������1");
$namee1=array("2","1","3");
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE uid=".$uid)[0];
foreach($namee1   as   $value){
if($value==$array1[x9]){echo '<a href="plugin.php?id=xd:mp&ft=shezhimb&m='.$value.'"><div style="width:47%;height:160px;float:left;text-align:center;border:0px solid blue;color:blue"><img src="./source/plugin/xd/mp/im1/'.$value.'.jpg"   style="margin:10px;height:98px;width:98px" ><br/><span style="">'.$namee[$value].lang('plugin/xd', 'e0').'</span></div></a>';
}else{
echo '<a href="plugin.php?id=xd:mp&ft=shezhimb&m='.$value.'"><div style="width:50%;height:160px;float:left;text-align:center;color:black"><img src="./source/plugin/xd/mp/im1/'.$value.'.jpg"   style="margin:10px;height:100px;width:100px" ><br/><span  style="">'.$namee[$value].'</span></div></a>';
}
} 

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β	
}

function   lb_wqz(array  $_G,$s){//-----------------------------------------�ҵĹ���������        ������$sĬ������
$array=DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$_G[uid])[0];
$action_f='plugin.php?id=xd:mp&ft=wqz1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
$placeholder='���ڴ����빤��������';
$name='name';
if(empty($s)){$s=$array[username].'�Ĺ�����';}
$value=$s;
$title='����������';
$text_fanhui='����';
$text_baocun='����';
//$type='tel';
include template('xd:customer_edit');
}

function  lb_wshd($s){//-----------------------------------------�ҵ��̵�����ҳ��     ������$sĬ������
$body1='<a href="https://woheni99.com/forum.php?mod=viewthread&tid=10589&page=1&extra=#pid11834"><div   align="center"  class="font" style="margin-top:10%"><div     style="font-size:25px;color:white;border-radius:5px;border:1px solid #FF9797;background:#d41d3c;width:87%;height:40px;line-height:40px">&nbsp����������˲鿴&nbsp</div></div></a>';

$body='
<br/><div  align="center"  style="100%"><input  autoFocus   placeholder="���ڴ���������̳ǵ�ַ"    name="name" id="name"   type="text"  value="'.$s.'" style="width:87%;height:40px;font-size:20px;border-radius:5px;padding:0px"/></div>
<br/><a href="javascript:void(0);" onclick="x()">
<div  align="center"  style="100%"> <div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#17314c;border-radius:5px" >&nbsp&nbsp��&nbsp��&nbsp&nbsp</div></div></a>
';

$title='�����̳ǵ�ַ';
$dizhi_b='plugin.php?id=xd:mp&ft=wshd1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
include template('xd:mp2');	
}

function  lb_gz_gzsh(array $_G){//------------------------------------------��ע�Ĺ�����ҳ��     ������$_G
$n= DB::fetch_all("SELECT mid,time FROM ".DB::table('mpshou')." WHERE   uid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[mid])[0];
$arr[$key]='<a href="plugin.php?id=xd:mp1&ft1='.$value[mid].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[mid],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp59');
$dizhi_f='plugin.php?id=xd:mp';//���ؼ���ַ
include template('xd:wjx3');	
}

function  lb_gz_gzsh1(array $_G){//------------------------------------------˭��ע����     ������$_G
$n= DB::fetch_all("SELECT uid,time FROM ".DB::table('mpshou')." WHERE   mid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[uid])[0];
$arr[$key]='<a href="plugin.php?id=xd:mp1&ft1='.$value[uid].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[uid],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp60');
$dizhi_f='plugin.php?id=xd:mp';//���ؼ���ַ
include template('xd:wjx3');	
}

function  lb_z(array $_G){//------------------------------------------˭������     ������$_G
$n= DB::fetch_all("SELECT time,ip FROM ".DB::table('mpz')." WHERE   uid=".$_G['uid']);
foreach($n as $key =>$value){
$array3= DB::fetch_all("SELECT username FROM ".DB::table('common_member')." WHERE uid=".$value[ip])[0];
$arr[$key]='<a href="plugin.php?id=xd:mp1&ft1='.$value[ip].'"><table  width="100%" border="0" cellspacing="0" cellpadding="0" style="height:70px;border-bottom:1px solid #000;color:black"><tr><td width=15%><img  src="'.avatar($value[ip],small,true).'"     /></td><td  style="vertical-align:top;"><span style="font-size:20px;">'.$array3[username].'</span></td><td  width=35%  style="vertical-align:top;"><span  style="float:right;font-size:15px">'.date("y-m-d H:i:s",$value[time]).'</span></td></tr></table></a>';
}
$b='<br/><br/><hr/>';
$dizhi_gl='<a href=""><span  style="color:white;height:26px;font-size:15px;margin-right:5px;float:right">'.lang('plugin/xd', 'mp46').'</span></a>';
$title=lang('plugin/xd', 'mp60');
$dizhi_f='plugin.php?id=xd:mp';//���ؼ���ַ
include template('xd:wjx3');	
}

function  lb_quanzi1(array $_G,array $post){//-----------------------------------------Ȧ������ ������$sĬ������
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','Ȧ��','".$name."','".$_G['timestamp']."','','','','','','','','','','','','','','','".$post[content5]."','".$post[content2]."','".$post[content]."','".$post[beizhu]."','".$post[zzhi]."','".$post[qz]."','2')");
return  $coun;
}

function  lb_quanzi(array $_G,$s){//-----------------------------------------Ȧ������ҳ��      ������$sĬ������
$title='����Ȧ��';
$dizhi_b='plugin.php?id=xd:mp&ft=quanzi1';//���ύ��ַ
$dizhi_f='plugin.php?id=xd:mp&ft=tmp';//���ؼ���ַ
include template('xd:basic_edit');	
}


function  lb_wqz1($name,$uid){//----------------------------------------�ҵĹ���������lb_wqz1(����       ������$name������,$uid
$a= DB::query("UPDATE ".DB::table('mp')." SET x18='".$name."'   WHERE uid=".$uid);
}
function  lb_wshd1($name,$uid){//----------------------------------------�ҵ��̵�����       ������$name������,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x19='".$name."'   WHERE uid=".$uid);
}

function shezhi_dizhi($uid,$content){//----------------------------------------��ַ����    ������$_G
$a= DB::query("UPDATE ".DB::table('mp')." SET x15='".$content."'   WHERE uid=".$uid);
}



function  lb_name1($name,$uid){//----------------------------------------�������� ������$name������,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x='".$name."'   WHERE uid=".$uid);
}
function  lb_zhiwu1($name,$uid){//----------------------------------------ְ��ȼ�����    ������$name������,$uid   

$a= DB::query("UPDATE ".DB::table('mp')." SET x1='".$name."'   WHERE uid=".$uid);
}
function  lb_dianhua1($name,$uid){//----------------------------------------�绰����   ������$name������,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x3='".$name."'   WHERE uid=".$uid);
}
function  lb_QQ1($name,$uid){//----------------------------------------QQ����       ������$name������,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x4='".$name."'   WHERE uid=".$uid);
}
function  lb_youxiang1($name,$uid){//-----------------------------------------��������      ������$name������,$uid  	
$a= DB::query("UPDATE ".DB::table('mp')." SET x5='".$name."'   WHERE uid=".$uid);
}
/*
function  lb_wangzhi1($name,$uid){//-----------------------------------------��վ��ַ����  ������$name������,$uid  
$a= DB::query("UPDATE ".DB::table('mp')." SET x9='".$name."'   WHERE uid=".$uid);
}
*/
function  lb_weixin1($name,$uid){//----------------------------------------΢�ź����� ������$name������,$uid
$a= DB::query("UPDATE ".DB::table('mp')." SET x6='".$name."'   WHERE uid=".$uid);
}
function  lb_weixinerwm1($t1,$uid){//-----------------------------------------΢�Ŷ�ά������    ������$name������,$uid  
if(!empty($t1)){$a= DB::query("UPDATE ".DB::table('mp')." SET x7='".$t1."'   WHERE uid=".$uid);}
}
function  lb_qianming1($name,$uid){//---------------------------------------����ǩ������       ������$name������,$uid   
$a= DB::query("UPDATE ".DB::table('mp')." SET x8='".$name."'   WHERE uid=".$uid);
}
function   lb_biaoqian1($name,$uid){//---------------------------------------�ҵı�ǩ����  ������$name������,$uid   
$a= DB::query("UPDATE ".DB::table('mp')." SET x11='".$name."'   WHERE uid=".$uid);
}
function  shezhi_y($y,$uid){//----------------------------------------��������    ������$t���õ�ͼƬ,$y���õ�����,$array1 mp����
$array1=DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE    uid=".$uid);
if(!empty($t)){$a= DB::query("UPDATE ".DB::table('mp')." SET x10='".$array1[0][x10].$t."'   WHERE uid=".$uid);}
if(!empty($y)){$a= DB::query("UPDATE ".DB::table('mp')." SET x13='".$y."'   WHERE uid=".$uid);}	
}
function  shezhi_t($t,$uid){//----------------------------------------ͼƬ����    ������$t���õ�ͼƬ,$array1 mp����
$array1=DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE    uid=".$uid);
if(!empty($t)){$a= DB::query("UPDATE ".DB::table('mp')." SET x10='".$array1[0][x10].$t."'   WHERE uid=".$uid);}
if(!empty($y)){$a= DB::query("UPDATE ".DB::table('mp')." SET x13='".$y."'   WHERE uid=".$uid);}	
}
function  shezhi_mb($m,$uid){//----------------------------------------Ƥ������    ������$m���õ�Ƥ��,$array1 mp����
if(!empty($m)){$a= DB::query("UPDATE ".DB::table('mp')." SET x9='".$m."'   WHERE uid=".$uid);}
}

function  shpfabu(array  $_G,array $post){//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
if(!empty($post[c])){
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x6='".$post[c]."'   WHERE  yid=".$post[b]);
if($post[c]==1){echo  '1';}else{echo  '2';}
}else{
echo  '0';
}
}

function  yinyuefabu(array  $_G,array $post){//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
if(!empty($post[c])){
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x6='".$post[c]."'   WHERE  yid=".$post[b]);
if($post[c]==1){echo  '1';}else{echo  '2';}
}else{
echo  '0';
}
}

function  yinyueshzh1(array  $_G,array $post){//---------------------------------------���ַ�������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x4='".$post[4]."',x5='".$post[5]."'   WHERE  yid=".$post[yid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=xq_y&b='.$post[yid].'";</script>';
}

function  shpshzh1(array  $_G,array $post){//---------------------------------------��Ƶ��������    ������$m�Ƿ񷢲�����Ϣ,$uid����id
$a= DB::query("UPDATE ".DB::table('whn_dizhi')." SET x4='".$post[4]."',x5='".$post[5]."'   WHERE  yid=".$post[yid]);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:mp&ft=xq_shp&b='.$post[yid].'";</script>';
}

function  xq_shp($yid){//----------------------------------------��Ƶ����     ������$name�ļ�ϵͳ��,$array�ļ�������
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE  yid=".$yid)[0]; 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('��Ƶ����','��Ƶ����','��Ƶ����','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo  '<div   class="funbar"><a href="plugin.php?id=xd:mp&ft=shp"  style="color:white;margin:8px">����</a> </div><div   class="space">woheni</div>
<div     id="xxi1"  style="display:none">
<fieldset>
<form action="plugin.php?id=xd:mp&ft=shpshzh1" method="post"   style="margin:8px"      accept-charset="utf-8">
<p   class="listbar">��Ƶ���⣺
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">��Ƶ���飺
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>

</fieldset>
<p><input value="�ύ"  type="submit"   class="submit"      style=""></input></p>
<p><div    class="submit"      id="qqx">ȡ��</div></p>
</form></div>

<div     id="xxi"  style="">
<div     id="xxi2"  style="margin:8px"  >
<p   class="listbar">��Ƶ���⣺
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">��Ƶ���飺
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>
</div>
<hr/>
';
if($array[x6]==1){
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj"  class="yxz">����</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="xz">������</div></a>
</td>
</tr>
</table>';
}else{
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj" class="xz">����</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="yxz">������</div></a>
</td>
</tr>
</table>';
}




echo  '<a href="javascript:void(0);" onclick="delet()"><div class="submit1" style="">ɾ����Ƶ</div></a>
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
if(confirm("��Ҫɾ����")){
window.location.href="plugin.php?id=xd:mp&ft=delete&ft2='.$yid.'&&me=2";}
}

</script>
';
$whn_xd314->total_ajax2('shj(b,c)','"plugin.php?id=xd:mp&ft=shpfabu"','
','
if(resp=="1"){document.getElementById("shj").className="yxz";document.getElementById("xj").className="xz";}else{document.getElementById("xj").className="yxz";document.getElementById("shj").className="xz";}
',1,'"b="+b+"&c="+c');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
	
}


function  xq_y($yid){//----------------------------------------��������     ������$name�ļ�ϵͳ��,$array�ļ�������
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')." WHERE  yid=".$yid)[0]; 
$whn_xd314=new   whn_xd;
$whn_xd314->total_start('��������','��������','��������','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo  '<div   class="funbar"><a href="plugin.php?id=xd:mp&ft=tyinyue"  style="color:white;margin:8px">����</a> </div><div   class="space">woheni</div>
<div     id="xxi1"  style="display:none">
<fieldset>
<form action="plugin.php?id=xd:mp&ft=yinyueshzh1" method="post"   style="margin:8px"      accept-charset="utf-8">
<p   class="listbar">�������⣺
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">�������飺
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>

</fieldset>
<p><input value="�ύ"  type="submit"   class="submit"      style=""></input></p>
<p><div    class="submit"      id="qqx">ȡ��</div></p>
</form></div>

<div     id="xxi"  style="">
<div     id="xxi2"  style="margin:8px"  >
<p   class="listbar">�������⣺
<input name="yid" type="hidden"  class="input"   value="'.$yid.'"/>
<input name="4" type="text"  class="input"   value="'.$array[x4].'"/>
</p>
<p   class="listbar">�������飺
<textarea name="5" rows="9"    class="input"  >'.$array[x5].'</textarea>
</p>
</div>
<hr/>
';
if($array[x6]==1){
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj"  class="yxz">����</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="xz">������</div></a>
</td>
</tr>
</table>';
}else{
echo    '<table   width="100%"  border="0" cellspacing="8" cellpadding="0"  >
<tr  align="center">
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'1\')"><div  id="shj" class="xz">����</div></a>
</td>
<td><a href="javascript:void(0);" onclick="shj(\''.$yid.'\',\'2\')"><div    id="xj"  class="yxz">������</div></a>
</td>
</tr>
</table>';
}




echo  '<a href="javascript:void(0);" onclick="delet()"><div class="submit1" style="">ɾ������</div></a>
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
if(confirm("��Ҫɾ����")){
window.location.href="plugin.php?id=xd:mp&ft=delete&ft2='.$yid.'&&me=1";}
}

</script>
';
$whn_xd314->total_ajax2('shj(b,c)','"plugin.php?id=xd:mp&ft=yinyuefabu"','
','
if(resp=="1"){document.getElementById("shj").className="yxz";document.getElementById("xj").className="xz";}else{document.getElementById("xj").className="yxz";document.getElementById("shj").className="xz";}
',1,'"b="+b+"&c="+c');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β
	
}

function  xq_t($name,$mid){//----------------------------------------ͼƬ����     ������$name ͼƬ��,$mid ��Ƭid
$path=dzh($mid,'t1').'/'.$name;   
$b='<img  id="i" src="'.$path.'" width=100%  />';
$dizhi_f='plugin.php?id=xd:mp1&ft1='.$mid;//���ؼ���ַ
include template('xd:xq');	
}
function  delete_lb_hdp($uid){//----------------------------------------Ҫɾ���Ļõ�Ƭ�б�     ������$array�ļ�������
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
function  delete_lb_y($name,$uid){//----------------------------------------Ҫɾ���������б�     ������$name�õ�Ƭ��;$array�ļ�������
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
$dizhi_hdelete='plugin.php?id=xd:hdp&ft=thdp1y&ft1='.$name;//ɾ��ҳ�淵�غ��ַ
$run=1;
$title=$name;
$me="1";
include template('xd:wjx1');	
}
function  delete_lb_t($name,$uid){//----------------------------------------Ҫɾ����ͼƬ�б�     ������$name�õ�Ƭ��;$array�ļ�������
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
$dizhi_hdelete='plugin.php?id=xd:hdp&ft=thdp1t&ft1='.$name;//ɾ��ҳ�淵�غ��ַ
$run=1;
$title=lang('plugin/xd', 'wjx1');
$me="0";
include template('xd:wjx1');		
}
function  lb_shezhi($name,$uid){//----------------------------------------�õ�Ƭ�����б�    ������$name�õ�Ƭ����$uid�û����
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
function  chuangjian_hdp($name,$uid){//----------------------------------------�����õ�Ƭ    ������$name�õ�Ƭ��;$array�ļ�������
$hdp=unserialize(file_get_contents(dzh($uid,'hdp').'/xd.txt'));
$fp = fopen(dzh($uid,'hdp').'/'.$hdp[a].'.txt', 'w+');
$hdp[$hdp[a].'.txt']=$name;
$hdp[a]+=1;
file_put_contents (dzh($uid,'hdp').'/xd.txt',serialize($hdp));
}
function  chongmingming_hdp($name,$name1,$uid){//----------------------------------------�õ�Ƭ������    ������$name�õ�Ƭ��;��$name�õ�Ƭ��;$array�ļ�������
$hdp=unserialize(file_get_contents(dzh($uid,'hdp').'/xd.txt'));
$result=array_search($name,$hdp);
$hdp[$result]=$name1;
file_put_contents(dzh($uid,'hdp').'/xd.txt',serialize($hdp));
}

function  lb_mp(array  $_G){//----------------------------------------�ҵ���Ƭ�༭�б�ҳ��     ������$_G
$namee=array("Ĭ�Ϸ��","�򵥷��","Ĭ�Ϸ��");
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
$dizhi_to='plugin.php?id=xd:mp1&ft1='.$_G[uid];//��ת��ַ
$dizhi_b='plugin.php?id=xd:mp&ft=ttouxiangshch';//���ύ��ַ
$title=lang('plugin/xd', 'mp.0');
include template('xd:mp1');	
}


function  yidongt($name1,array $array1,$f){//----------------------------------------�ƶ�ͼƬ    ������$name1ͼƬ������,$array mp����,$f ����0Ϊ��1Ϊ�ң�
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
function  deletehdp($name,$uid,$delete){//----------------------------------------ɾ���õ�Ƭ    ������$name�ļ���,$array�ļ�������;delete���Ʒ�
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
function  deletet($name,$uid){//----------------------------------------ɾ��ͼƬ     ������$name�ļ���,$array�ļ�������
$n=unserialize(file_get_contents(dzh($uid,'t').'/xd.txt'));
unset($n[$name]);
file_put_contents (dzh($uid,'t').'/xd.txt',serialize($n));
 $result = unlink(dzh($uid,'t').'/'.$name); 
$result = unlink(dzh($uid,'t1').'/'.$name); 
$result = unlink(dzh($uid,'t2').'/'.$name); 
}
function  deletet1($name,$uid){//----------------------------------------ɾ��ͼƬ1     ������$name�ļ���,$array�ļ�������
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

function  deleteshp($yid,$uid){//----------------------------------------ɾ����Ƶ     ������$name�ļ���,$array�ļ�������
$array= DB::fetch_all("SELECT x2 FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
//echo '<script language="JavaScript">alert("'.$uid.'");</script>';	
 $result = unlink(dzh($uid,'shp').'/'.$array); 
$a= DB::query("DELETE  FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
}

function  deletey($yid,$uid){//----------------------------------------ɾ������     ������$name�ļ���,$array�ļ�������
$array= DB::fetch_all("SELECT x2 FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
//echo '<script language="JavaScript">alert("'.$uid.'");</script>';	
 $result = unlink(dzh($uid,'y').'/'.$array); 
$a= DB::query("DELETE  FROM ".DB::table('whn_dizhi')." WHERE yid=".$yid);
}
function  shangchuant1(array $file,$uid){//----------------------------------------�ϴ�ͷ��     ������$file�ϴ�ͼƬ��Ϣ,$array�ļ�������;����ֵ�Ǳ���ͼƬ��ַ
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/jpeg');
$max_size='10000000000';      // ����ļ����ƣ���λ��byte��
   if($_SERVER['REQUEST_METHOD']=='POST'){ //�ж��ύ��ʽ�Ƿ�ΪPOST
   
  if($file['size']>$max_size){  //�ж��ļ���С�Ƿ����500000�ֽ�
     echo '<div   style="font-size:30px;margin-top:40%;margin-left:5%;color:#FF0000">'.lang('plugin/xd', 'xd12').'</div>';
    exit;
   } 
  if(!in_array($file['type'],$arrType)){  //�ж�ͼƬ�ļ��ĸ�ʽ
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
 list($width,$height) = getimagesize($path);//��ȡԭͼ��ߴ�Ŀ����߶�
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
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);//���ƿɵ��ڳߴ磬���ɼ���
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(100,100);//Ϊ��ͼ�񴴽�һ������
  imagecopyresized($_img1,$_img,0,0,0,0,100,100,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path1,0, 100);
       imagepng($_img1,$path1,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 
 list($width,$height) = getimagesize($path);//��ȡԭͼ��ߴ�Ŀ����߶�
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
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);//���ƿɵ��ڳߴ磬���ɼ���
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(50,50);//Ϊ��ͼ�񴴽�һ������
  imagecopyresized($_img1,$_img,0,0,0,0,50,50,$wh1,$wh1);      
//imagecopy($_img,$img, 0, 0, $_width,$_height,$wh1,$wh1); 
        imagejpeg($_img1,$path2,0, 100);
       imagepng($_img1,$path2,0, 100);
        ImageDestroy( $_img);  
        ImageDestroy( $_img1);  
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 
 list($width,$height) = getimagesize($path);//��ȡԭͼ��ߴ�Ŀ����߶�
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
//imagecopyresized($_img,$img,0,0,0,0,$_width,$_height,$width,$height);//���ƿɵ��ڳߴ磬���ɼ���
    //imagecopyresampled($_img,$img,0,0,0,0,$_width,$_height,$width,$height);
}
     $_img1= imagecreatetruecolor(200,200);//Ϊ��ͼ�񴴽�һ������
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
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','ͼƬ1','".$fname."','".$_G['timestamp']."','�ޱ���','������','2','','".$name."','','','','','','','','','','','','','','','','')");
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
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','��Ƶ','".$fname."','".$_G['timestamp']."','�ޱ���','������','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function  shangchuanwz(array $_G,array $post){//----------------------------------------�ϴ�����     ������$file�ϴ�ͼƬ��Ϣ,$array�ļ�������
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','����','".$post[content]."','".$_G['timestamp']."','�ޱ���','������','2','','".$post[b]."','','','','','','','','','','','','','','','','')");
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
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_dizhi')."      ORDER BY  yid  DESC")[0];
$coun=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_dizhi')." VALUES ($coun,'".$_G[uid]."','����','".$fname."','".$_G['timestamp']."','�ޱ���','������','2','','".$name."','','','','','','','','','','','','','','','','')");
return  $coun;
}

function get_lat_and_lng_ByIP($ip)
{
    if(empty($ip))
    {
         return 'IP����Ϊ��';
    }
$content = file_get_contents('https://api.map.baidu.com/location/ip?ak=x2wdWWgqQ3iqSmYIKWk2xozRIj6TRNpZ&ip='.$ip.'&coor=bd09ll');
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