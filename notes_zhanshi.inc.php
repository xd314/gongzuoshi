<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(empty($_G['username'])){echo '<script language="JavaScript">window.location.href="member.php?mod=logging&action=login";</script>';	}else{
require_once (DISCUZ_ROOT .'./source/plugin/xd/function_xd314_xd.inc.php');
chushihua($_G['uid']);
switch ($_GET["a"]){
case '7'://-------------------------------------------------------------------------��ҳ
$a= DB::query("DELETE  FROM ".DB::table('whn_zhangdan')." WHERE   x='".$_G['uid']."'   AND    x4=''");
if(!empty($_GET[r])){$a= DB::query("UPDATE ".DB::table('mp')." SET x27='".$_GET[r]."'   WHERE uid=".$_G[uid]);	
}else{
$a= DB::query("UPDATE ".DB::table('mp')." SET x27='".$_G[uid]."'   WHERE uid=".$_G[uid]);
}
j($_G,$_GET);	
break;
case '7aa'://-------------------------------------------------------------------------���ҵ�ַ
jaa($_G,$_POST);	
break;
case 'shuaxin'://-------------------------------------------------------------------------ˢ��
shuaxin($_G,$_POST);	
break;
case '6_'://-------------------------------------------------------------------------������ҳ
$i=i($_G,$_GET);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:notes_zhangdan&a=2a&b='.$i.'";</script>';	
break;
case 'ttouxiangshch'://-----------------------------------------------------------------------------------------------------------------------------ͷ���ϴ�
$t1=shangchuant1($_FILES['upfile'],$_G['uid']);
echo '<script language="JavaScript">window.location.href="plugin.php?id=xd:notes_zhanshi&a=7";</script>';
break;
default:
echo '<script language="JavaScript">alert("��ַ����");</script>';	
break;
}
}


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------���ܺ���   
function  chushihua($uid){//----------------------------------------��ʼ��     ������$uid�û�id,$array�ļ�������            ע�⣺��ʼֻ�ܽ���һ�Σ��м���������⣬��Ҫ��ѯ����
//echo '<script language="JavaScript">alert("'.dzh($uid,'hdp').'");</script>';	
if(!file_exists(dzh($uid,'t'))||!file_exists(dzh($uid,'t1'))||!file_exists(dzh($uid,'t2'))){
$a= DB::query("INSERT ".DB::table('mp')." VALUES (".$uid.",'','�������ݹ���','','','','','','','','','','','','����֮��.mp3','','','','','','','','','','','','','','','','','')");
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
function  xl(){//----------------------------------------����ʩ����   ������$yid��ַid
$whn_xd314=new   whn_xd;
$whn_xd314->total_start2('����ʩ����','����ʩ����','����ʩ����','');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
echo  '
<div  style="text-align:center;width:100%;margin-top:20%">
<div  class="kuang"  style="font-size:20px;margin-left:16px;margin-right:16px;border-radius:5px">����ʩ�������Ժ򣡣���</div>
</div>';
$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β	
}

function  i(array $_G,array $get){//----------------------------------------����   ������     
$shangchenga= DB::fetch_all("SELECT * FROM ".DB::table('whn_shangchenga')." WHERE uid=".$get[c])[0]; 
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhangdan')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_zhangdan')." VALUES (".$yid.",'".$_G[uid]."','".$get[b]."','".$get[c]."','','','".$shangchenga[x4]."','','','','','".$_G['timestamp']."','','','1','','','','','','','','','','','')");
return  $yid;
}

function  dzh($uid,$ty){//----------------------------------------��ַ����   ������$uid�û�uid��$ty�ļ�����
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

function shu($t){//-----------------------------------------------------------------------------------------------------------��������  $t
 if($t>=10000){$t1=floor($t/10000).'��';
}else if($t==''){$t1=0;
}else if($t>=100000000){$t1=floor($t/100000000).'��';
}else{$t1=$t;}
return  	$t1;
}

function  shuaxin(array  $_G,array  $post){//---------------------------------------ˢ��   ������     $content��������
echo  '
<input  id="shuaxin1"   type="hidden"    value="'.count($shuaxin1).'"  />
<input  id="shuaxin2"   type="hidden"    value="'.count($shuaxin2).'"  />
';
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


function  jaa(array  $_G,array  $post){//-----------------------------------------��ҳ�ͻ���   ������     $content��������
$whn_xd314=new   whn_xd;
switch ($post['caidan']){
case '���������1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x16='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '���������1';
break;
case '���������':
$text_baocun='����';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
if(empty($mp[x16])){$mp[x16]="��������";}
echo   '
<div   style="text-align:center">
���ù��������<br/><br/>
<select name="gzslb" id="gzslb" style="width:60%;height:60px;border-radius:8px"   value="">		
<option value="'.$mp[x16].'">'.$mp[x16].'</option><option value="����">����</option><option value="��ҽ">��ҽ</option><option value="����">����</option><option value="����">����</option><option value="����">����</option><option value="��Ʒ">��Ʒ</option>
<option value="��ʳ">��ʳ</option><option value="����">����</option><option value="��װ">��װ</option><option value="�ط�">�ط�</option><option value="��ס">��ס</option></select><br/><br/><br/><br/><br/><br/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="gzslb1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case '���ҽ���1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x1='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '���ҽ���1';
break;
case '���ҽ���':
$text_baocun='����';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
�������ҽ��ܣ�
<input  autoFocus      placeholder="'.$placeholder.'"    name="zwjs"    id="zwjs"   type="text"    value="'.$mp[x1].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="zwjs1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '��ӵ绰1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x3='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '��ӵ绰1';
break;
case '��ӵ绰':
$text_baocun='����';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
������ϵ�绰��
<input  autoFocus      placeholder="'.$placeholder.'"    name="tjdh"    id="tjdh"   type="text"    value="'.$mp[x3].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="tjdh1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '���΢��1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x6='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '���΢��1';
break;
case '���΢��':
$text_baocun='����';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
����΢�źţ�
<input  autoFocus      placeholder="'.$placeholder.'"    name="tjwx"    id="tjwx"   type="text"    value="'.$mp[x6].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="tjwx1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '��������1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x18='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '��������1';
break;
case '��������':
$text_baocun='����';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
���ù��������ƣ�
<input  autoFocus      placeholder="'.$placeholder.'"    name="gzshm"    id="gzshm"   type="text"    value="'.$mp[x18].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="gzshm1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case   '������Ƭ��ʽ1':
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
echo   '������Ƭ��ʽ1';
break;
case '������Ƭ��ʽ':
$cou1= DB::fetch_all("SELECT * FROM " .DB::table('mp')."  WHERE   uid=".$_G[uid])[0];
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
$jinb=array("0.1","0.1","0.5","1","2","2","3");
$cou= DB::fetch_all("SELECT * FROM " .DB::table('common_member_count')."  WHERE   uid=".$_G[uid])[0];
if($cou1[x17]==6){
echo   '
<br/>
<div   style="margin-left:6%;margin-right:6%;width:87%;color:#8E8E8E;font-size:20px;border-radius:10px;border:1px solid #FF9797" >��ǰ����'.$cou1[x17].'�����Ѵﵽ������</div>
<br/>
<div   style="margin-left:8px;margin-bottom:8px;text-align:center" >��ǰ������ʽ</div>
<div   style="text-align:center" ><img   src="wjxa/jb6l.jpg"    style="width:80%;height:400px;border-radius:10px"  /></div>
<div   style="color:white;height:90px">woheni</div>
</form>';
}else{
echo  '
<br/>
 <div   style="margin-left:6%;margin-right:6%;color:#8E8E8E;font-size:20px;border-radius:10px;border:1px solid #FF9797" >��ǰ����'.$cou1[x17].'�����Ƿ�Ҫ������'.($cou1[x17]+1).'����<br/>��������Ի��'.($cou1[x17]+1).'����������ʾ����Ƭʽ����</div>
<br/>
<div   style="margin-left:8px;text-align:center;margin-bottom:8px" >��ǰ������ʽ</div>
<div   style="text-align:center" ><img   src="wjxa/jb'.$cou1[x17].'l.jpg"    style="width:80%;height:400px;border-radius:10px"  /></div>
<div   style="color:white;height:90px">woheni</div>
<div   style="margin-left:8px;text-align:center;margin-bottom:8px" >��������ʽ</div>
<div   style="text-align:center" ><img   src="wjxa/jb'.($cou1[x17]+1).'l.jpg"    style="width:80%;height:400px;border-radius:10px"  /></div>

<br/>
<div   style="color:white;height:90px">woheni</div>
<a href="javascript:void(0);" onclick="shjmpysh1(\''.$cou[extcredits3].'\',\''.$jinb[$cou1[x17]].'\')">
<div   align="center"  style="100%"> <div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >��������</div></div></a>

<div   style="color:white;height:100px">woheni</div>';
}

if(!empty($cou1[x17])&&$cou1[x17]!=1){
echo  '
<div   style="color:#8E8E8E;font-size:20px;border-radius:10px;border:0px solid #FF9797;text-align:center;margin-bottom:8px" >���뵱ǰ��ʽʹ�����޻���'.timetostring1(timetotime($cou1[x]),$_G[timestamp]).'</div>
';
}

break;
case   '��������1':
$a= DB::query("UPDATE ".DB::table('mp')." SET x8='".$post['neirong']."'   WHERE   uid=".$post['canshu']);
echo   '��������1';
break;
case '��������':
$text_baocun='����';
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')."   WHERE   uid=".$post['canshu'])[0]; 
echo   '
<div   style="text-align:center">
���ù������ݣ�
<input  autoFocus      placeholder="'.$placeholder.'"    name="fbgg"    id="fbgg"   type="text"    value="'.$mp[x8].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/><br/><br/>
<div   align="center"  style="100%"> <a href="javascript:void(0);" onclick="fbgg1()"><div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#0080FF;border-radius:10px" >'.$text_baocun.'</div></a></div>
</div>
';
break;
case '�б�1':
$whn_xd314=new   whn_xd;
if($post[leixing]=="����"){
if(!empty($post[neirong])&&$post[neirong]!=""){$post[neirong]=" WHERE   username   LIKE  '%".$post[neirong]."%' ";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[neirong]); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member').$post[neirong]."      LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x='".$_G[uid]."'    AND   x1=".$value[uid])[0]; 
if(!empty($arr[yid])){$xshi='�ѹ�ע';}else{$xshi='��ע';}
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$value[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="javascript:void(0);" onclick="gzshguanzhu(\''.$value[uid].'\')"><span  style="margin-left:8px;color:white">'.$xshi.'</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�з��������Ĺ�����!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}else  if($post[leixing]=="�˺�"){
if(!empty($post[neirong])&&$post[neirong]!=""){$post[neirong]=$post[neirong]-1001212;$post[neirong]=" WHERE   uid=".$post[neirong];}
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[neirong]."    ORDER BY  x11  DESC  "); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp').$post[neirong]."         ORDER BY  x11  DESC       LIMIT   ".$fy[0].",".$fy[3]);
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x='".$_G[uid]."'    AND   x1=".$value[uid])[0]; 
if(!empty($arr[yid])){$xshi='�ѹ�ע';}else{$xshi='��ע';}
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
          <div class="Name">'.$mp[username].'</div>	 
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td  align="center">';
echo   '<div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px">
<a href="javascript:void(0);" onclick="gzshguanzhu(\''.$value[uid].'\')"><span  style="margin-left:8px;color:white">'.$xshi.'</span></a>
</td></tr> </table></a></li>';
}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�з��������Ĺ�����!</div>';}
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}else{
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member')); 
$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('common_member')."      LIMIT   ".$fy[0].",".$fy[3]);
//echo 'hhh';
if(count($array)>0){
echo  '<div class="whn_pinfang_list"><ul>';
foreach($array as $key =>$value){
$mp= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$value[uid])[0];
echo  '<li class="a-bounceinR"  style="background:#FCFCFC">
 <a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$value[uid].'"><div class="NameType"> <img src="uc_server/avatar.php?uid='.$value[uid].'&size=big" class="Face">
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
$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
}
break;
case '�б�':
$whn_xd314=new   whn_xd;
if($post[leixing]=="�˺�"){
if(!empty($post[neirong])&&$post[neirong]!=""){$post[neirong]=$post[neirong]-1001212;$post[neirong]=" AND   x1='".$post[neirong]."'";}
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x4='2'   ".$post[neirong]."  AND       x=".$_G[uid]); 

$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����

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
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td   align="center">
<div id="'.$value[yid].'"></div>
</td></tr>
<tr> <td   align="center">
<a href="javascript:void(0);" onclick="gl(\''.$value[yid].'\',\''.$value[yid].'a\')"><div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><span  style="margin-left:8px;color:white"    id="'.$value[yid].'a">����</span></div></a>
</td></tr> </table></a></li>';
}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�й�ע�Ĵ�!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
echo  '</div>';
}else{
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE        x4='2'   AND       x=".$_G[uid]); 

$fy=$whn_xd314->body_fy($array,$post[ym],30);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����

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
          <div class="Type"><span  style="margin-left:8px;color:#5B5B5B">�鿴������</span></div>
        </div></a>
<div class="Table">
<table cellpadding="0" cellspacing="0">
<tr> <td   align="center">
<div id="'.$value[yid].'"></div>
</td></tr>
<tr> <td   align="center">
<a href="javascript:void(0);" onclick="gl(\''.$value[yid].'\',\''.$value[yid].'a\')"><div    style="background:#6C6C6C;color:white;border-radius:8px 8px 8px 8px;box-shadow:inset 0 0 1px 1px #ccc;font-weight:bold;font-size:20px"><span  style="margin-left:8px;color:white"    id="'.$value[yid].'a">����</span></div></a>
</td></tr> </table></a></li>';
}}
echo  '</ul></div>';
}else{echo  '<div  style="width:100%;text-align:center;padding-top:8px">û�и���Ҫ����ķ�˿!</div>';}

$whn_xd314->body_fy0_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$y1,'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ�����
echo  '</div>';
}
break;
case 'ȡ��':

echo 'ȡ��';
break;
case 'ɾ����ע':
$a= DB::query("DELETE  FROM ".DB::table('whn_guanzhu')." WHERE   yid=".$post['canshu2']);
echo 'ɾ����ע';
break;
case '�����ҹ�ע':
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE   x='".$_G[uid]."'    AND   x1=".$post['canshu2'])[0]; 
$member= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE   uid=".$post['canshu2'])[0];
if(!empty($arr[yid])){
echo '�ѹ�ע';
}else{
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')."   ORDER BY  yid  DESC")[0];
$yid=$array[yid]+1;
$a= DB::query("INSERT ".DB::table('whn_guanzhu')." VALUES (".$yid.",'".$_G[uid]."','".$post['canshu2']."','".$member[username]."','".$_G['timestamp']."','2','','','','','','','','','','','','','','','','','','','','')");
echo '�ѹ�ע';
}
break;
case '��ע':
$whn_xd314=new   whn_xd;
$arraya= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE       x4='2'   AND    x5=5     AND        x=".$post['canshu']); 
$fy=$whn_xd314->body_fy($arraya,$post[ym],12);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('whn_guanzhu')." WHERE        x4='2'    AND    x5=5      AND        x=".$post['canshu']."      ORDER BY  x5  DESC  LIMIT   ".$fy[0].",".$fy[3]);
//$www=$post['canshu2']+count($array)*60+20;
if(count($arraya)>0){
echo  '
<table   border="0"  cellspacing="4"  cellpadding="0"    style="height:45px;float:left">
<tr style="height:45px"  >';
foreach($array as $key =>$value){
if(!empty($value[yid])){
if($value[x5]==5){
$xxi='<span   style="color:red;position:relative;top:-40px;left:0px">��</span>';
}else{
$xxi='';
}
$mem= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE      uid=".$value[x1])[0]; 
$mp= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE      uid=".$value[x1])[0]; 
$mem=mb_substr($mem[username], 0 ,2,"gbk");
if(empty($mp[x16])){
$mp[x16]="��";
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
$yy=$whn_xd314->body_fy4_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ��� ���  ��ʾ���ݣ��¸�ҳ��
echo   '
<a  href="javascript:void(0);"   onclick="';
if($yy[0]!="��������"){
echo  'guanzhu(\''.$yy[1].'\')';
}
echo  '"   style="color:black"><div  style="color:#4F4F4F;font-size:15px;width:60px;height:60px;float:left;text-align:center;line-height:60px">'.$yy[0].'</div></a>
</td></tr></table>';
}else{
 echo   '
<td  style="width:60px"><div  style="font-size:20px;margin-left:8px;color:#9D9D9D">��û�й�ע�����ҵ���Ϣ��</div></td>
';
}      
break;
case '������':
$whn_xd314=new   whn_xd;
$array1= DB::fetch_all("SELECT * FROM ".DB::table('mp')."     ORDER   BY  x11 DESC "); 
$fy=$whn_xd314->body_fy($array1,$post[ym],29);//---------------------------------------�б�(���������������array($t2,$t3,$t,$t1,$y,$y1))   ������array $array  �б�����,$y1  ҳ��(�̶�Ϊ$_GET[ft0]),$t1ÿҳ����
$array= DB::fetch_all("SELECT * FROM ".DB::table('mp')."      ORDER   BY  x11  DESC     LIMIT   ".$fy[0].",".$fy[3]);
foreach($array as $key =>$value){
if(!empty($value)){
//$value= DB::fetch_all("SELECT * FROM ".DB::table('mp')." WHERE      uid=".$value[uid])[0]; 
$mem= DB::fetch_all("SELECT * FROM ".DB::table('common_member')." WHERE      uid=".$value[uid])[0]; 
$mem=mb_substr($mem[username], 0 ,3,"gbk");
if(empty($value[x16])){
$value[x16]="��";
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
$yy=$whn_xd314->body_fy4_ajax($fy[0],$fy[1],$fy[2],$fy[3],$fy[4],$post[ym],'');//---------------------------------------�б�   ������$t2,$t3,$t,$t1,$y,$y1,��ʼ���ţ��������ţ���������ÿҳ��������ҳ��,ҳ�룻$dzh��ַ�еĲ��� ���  ��ʾ���ݣ��¸�ҳ��
echo   '
<a  href="javascript:void(0);"   onclick="';
if($yy[0]!="��������"){
echo  'paihang(\''.$yy[1].'\')';
}
echo  '"   style="color:black"><div  style="color:#4F4F4F;font-size:15px;width:70px;height:60px;float:left;text-align:center;line-height:60px">'.$yy[0].'</div></a>
</div>';
break;
default:
echo    '��������';
break;
}
}

function  j(array  $_G,array  $get){//----------------------------------------��ҳ�ͻ���   ������     $content��������
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
$dizhi_to='plugin.php?id=xd:notes_zhuye&a=7&c='.$_G[uid];//��ת��ַ
$dizhi_b='plugin.php?id=xd:notes_zhanshi&a=ttouxiangshch';//���ύ��ַ
$ftype=explode('_',$tp); 
$title=$n3[username].'�Ĺ�����';


$whn_xd314=new   whn_xd;
$whn_xd314->total_start1($title,$title,$title,'','#F0F0F0');//-----------------------------------------------------------------------------------html�ļ����忪ͷ   $title,$keywords,$description,$head
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
  <input name="upload" id="upload" type="submit" value="�ϴ�" style="display:none" />
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
<option value="�˺�">�������˺�</option><option value="����">����������</option></select>
</td>
<td   width="70%">
<input  id="neirong"   name="neirong"   type="text"  style="width:100%;font-size:15px;color:#4F4F4F;border-radius:5px;border:1px solid #d41d3c;padding:0px;height:36px"  value=""   placeholder="������"/>
</td>
<td>
<a  href="javascript:void(0);" onclick="fy(\'0\')"><span  style="width:70px;float:right;height:36px;color:#d41d3c;border-radius:5px;background:white;line-height:36px">����</span></a>
</td>
</tr>
</table></div>
<div  style="background:#5B5B5B;height:40px;display:none">
<table   width="100%"     bordercolor="#E0E0E0"  border="0"  cellspacing="8"  cellpadding="0"    style="">
<tr  align="center"   style="">
<td   align="left"    width="20%"   style="">
<a href="javascript:history.back(-1)"><span style="margin-left:8px;color:white">����</span></a>
</td>
<td    align="left"    width="25%"   style="border-radius:18px"> 
<select name="caidan" id="caidan" style="font-size:15px;color:#6C6C6C;border:0px solid #d41d3c;padding:0px;height:30px;background:white;width:70%"       onchange="chuli()"   >		
<option value="��ʼ">��ʼ</option><option value="���������">���������</option><option value="���������1">���������1</option><option value="���ҽ���">���ҽ���</option><option value="���ҽ���1">���ҽ���1</option><option value="��ӵ绰1">��ӵ绰1</option><option value="��ӵ绰">��ӵ绰</option><option value="��ӵ绰1">��ӵ绰1</option><option value="���΢��">���΢��</option><option value="���΢��1">���΢��1</option><option value="������Ƭ��ʽ">������Ƭ��ʽ</option><option value="������Ƭ��ʽ1">������Ƭ��ʽ1</option><option value="��������">��������</option><option value="��������1">��������1</option><option value="��������">��������</option><option value="��������1">��������1</option><option value="��ע">��ע</option><option value="����">����</option><option value="������">������</option><option value="�����ҹ�ע">�����ҹ�ע</option><option value="ɾ����ע">ɾ����ע</option><option value="�б�">�б�</option><option value="�б�1">�б�1</option><option value="��ʷ">��ʷ</option></select>
</td>
<td      width="20%">
</td>
</tr></table></div>
<div    id="tuiss"  style="display:none">
<div     style="background:none">
    <div class="TopLogo"> 
      <div class="TopLogoName"   style="margin-left:5px">';
if(empty($mp[x16])){
$mp[x16]="����";
}else{
$mp[x16]=mb_substr($mp[x16], 0 ,3,"gbk");
}

$title=mb_substr($title, 0 ,10,"gbk");
$i=1001212+$mp[uid];
echo   '<div  style="color:white;line-height:40px;float:right"> ���:'.$i.'</div>';


echo  '
</div>
    </div>
   <a href="javascript:void(0);" onclick="fx()"    style="color:white"><img  src="wjxa/����.png"   style="width:30px;margin-top:3px;float:right;margin-right:8px"/></a>

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
$mp[x16]="����";
}else{
$mp[x16]=mb_substr($mp[x16], 0 ,3,"gbk");
}

$title=mb_substr($title, 0 ,4,"gbk");
echo   '<span  style="font-size:18px">'.$title.'</span><span  style="color:#E0E0E0;font-size:15px;font-weight:bold">['.$mp[x16].']</span>';

$i=1001212+$mp[uid];
echo  '
</div>
    </div></a>
   <a href="javascript:void(0);" onclick="fx()"    style="color:white"><img  src="wjxa/����.png"   style="width:30px;margin-top:3px;float:right;margin-right:9px"/></a>
 <div  style="color:white;line-height:40px;float:right"> ���:'.$i.'</div>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx"    style="border-top:0.1px solid #97CBFF;border-bottom:0px solid #97CBFF">
    <ul>
<li   style="width:30%"><a href="plugin.php?id=fn_pinche&ac=pay"     style="color:#7B7B7B;font-size:20px"> '.$cou[extcredits3].'<br/><span      style="color:#7B7B7B;font-size:12px">���</span></a> </li>
<li   style="width:40%"><a  style="color:#7B7B7B;font-size:20px">'.$mp[x11].'<br/><span      style="color:#7B7B7B;font-size:12px">��ҳ�����</span></a></li>
<li   style="width:30%"><a href="plugin.php?id=xd:straight1&a=shouyi"    style="color:#7B7B7B;font-size:20px">'.$cou[extcredits4].'<br/><span      style="color:#7B7B7B;font-size:12px">�۱�������</span></a> </li>
    </ul>
  </div>
';

$xiangmu=DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE     x24='1'   AND   x20=".$_G['uid'])[0]; 
 if(!empty($xiangmu[uid])){
echo '
<div class="fixed1_nav fixed1_nav_no_wx"   style="border-bottom:solid 1px #F0F0F0;border-top:8px solid #F0F0F0;">
    <ul>
      <a href="javascript:void(0);" onclick="lieb()"><li   style="width:100%;color:#4F4F4F"><span   style="float:left;font-size:13px;margin-left:8px">��ע�Ĺ�����:('.$guanzhu.')</span> <span   style="float:right;font-size:13px;margin-right:8px;color:#4F4F4F">�����ҵĹ�ע</span><span  style="float:right;font-size:20px;margin-top:-2px;margin-right:5px;color:#4F4F4F">+</span></li></a>
    </ul>
  </div>
<div style="background:#FCFCFC;overflow:scroll">
<div   id="msg2"  style="width:1550px" ></div></div>

<div class="fixed1_nav fixed1_nav_no_wx"   style="border-top:solid 8px #F0F0F0;border-bottom:solid 1px #F0F0F0">
    <ul>
      <li     style="width:100%"> <span   style="font-size:15px;color:#4F4F4F">��Ŀ����</span> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
<li   style="width:25%"><a href="plugin.php?id=xd:tuiguang&a=chyu"  > <span class="iconfont"><img   src="wjxa/gzsh��Ա����.png"     style="width:45%;"/></span> ��Ա����</a> </li>
<li   style="width:25%"><a href="plugin.php?id=xd:xiangmu&ft=ttupiantb&b='.$_G['uid'].'"  > <span class="iconfont"><img   src="wjxa/gzsh��ĿͼƬ.png"     style="width:45%;"/></span>��ĿͼƬ</a> </li> 
<li   style="width:25%"><a href="plugin.php?id=xd:shangchuan_dpu&ft=ttupiantb&b='.$_G['uid'].'"  > <span class="iconfont"><img   src="wjxa/gzsh���̹��ͼ.png"     style="width:45%;"/></span>���̹���ͼ</a> </li> 
<li  style="width:25%"><a href="plugin.php?id=xd:shangchengb"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh��Ŀ��Ʒ.png"     style="width:45%;"/></span> ��Ŀ��Ʒ </a> </li>
<li  style="width:25%"><a  href="plugin.php?id=xd:notes_dingdanb&a=7"  ><span class="iconfont"><img   src="wjxa/gzsh��������.png"     style="width:45%"/></span>��������</a> </li>
';
}

echo  '


<div class="fixed1_nav fixed1_nav_no_wx"  style="display:none">
    <ul>

 <li  style=""><a href="plugin.php?id=xd:shangchengb"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh_�̳�.png"     style="width:50%"/></span>  ������Ʒ </a> </li>
<li><a href=""  class="add"   style="display:none"> <span class="iconfont"    > <img   src="wjxa/����.png"     style="width:50%"/></span>  ���Թ���</a> </li>
    </ul>
  </div>


<div class="fixed1_nav fixed1_nav_no_wx"   style="border-bottom:solid 1px #F0F0F0;border-top:solid 8px #F0F0F0">
    <ul>
      <li     style="width:100%"> <span   style="font-size:15px;color:#4F4F4F"> �ҵ�ר��</span> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>
  <li><a href="javascript:void(0);" onclick="dongtai()"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh������̬.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">����</span></a> </li>
      <li><a href="javascript:void(0);" onclick="a11()"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh�ҵĶ�ά��.png"      style="width:37%"/></span> <span   style="line-height:27px;font-size:15px">��ά�� </span></a> </li>
<li><a href="plugin.php?id=xd:notes_zhuye&a=7&c='.$_G['uid'].'"  class="add"> <span class="iconfont"><img   src="wjxa/gzsh�鿴��ҳ.png"      style="width:40%"/></span>  <span   style="line-height:20px;font-size:15px">��ҳ</span></a> </li>
<li><a href="javascript:void(0);" onclick="fx()"  class="add"> <span class="iconfont"   style="margin-top:3px"><img   src="wjxa/gzsh��������.png"      style="width:40%"/></span>  <span   style="line-height:20px;font-size:15px">����</span></a> </li>
    </ul>
  </div>
<div class="fixed1_nav fixed1_nav_no_wx">
    <ul>';
if($n1!=0){
echo  '
<li   style="width:25%"><a href="plugin.php?id=xd:communication&a=xiaoxi"  > <span class="iconfont"><img   src="wjxa/gzshi��Ϣ.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">��Ϣ('.$n1.')</span></a> </li> ';
}
echo  '
<li  style="width:25%"><a href="plugin.php?id=xd:mpa&ft=shpzhsh"  > <span class="iconfont"><img   src="wjxa/gzsh������Ƶ.png"      style="width:40%"/></span> <span   style="line-height:18px;font-size:15px">��Ƶ</span></a> </li>  
<li    style="width:25%"><a href="plugin.php?id=xd:straight&a=chyu"  > <span class="iconfont"><img   src="wjxa/gzsh��˿����.png"      style="width:40%"/></span><span   style="line-height:26px;font-size:15px"> ��˿</span></a> </li>
';
$zhipai= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhipai')." WHERE   x4=1  AND    x=".$_G[uid]);
$zhipai=count($zhipai);
echo  '
<li  style="width:25%"><a href="plugin.php?id=xd:straight1&a=wdkt"  > <span class="iconfont"><img   src="wjxa/gzsh�¼��ϻ���.png"      style="width:40%"/></span> <span   style="line-height:21px;font-size:15px">�¼�('.$zhipai.')</span></a> </li>  
';
$arr= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhipai')." WHERE   x4=2  AND    x1=".$_G[uid])[0];
$arr1= DB::fetch_all("SELECT * FROM ".DB::table('whn_zhipai')." WHERE   x4=1  AND    x1=".$_G[uid])[0];
if(!empty($arr[yid])){
echo   '
<li  style="width:25%"><a href="plugin.php?id=xd:straight1&a=chyu"  > <span class="iconfont"><img   src="wjxa/gzsh����֪ͨ.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">����(1)</span></a> </li>  
';
}
if(!empty($arr1[yid])){
echo   '
<li  style="width:25%"><a href="plugin.php?id=xd:straight1&a=hhr"  > <span class="iconfont"><img   src="wjxa/gzsh�ϼ��ϻ���.png"      style="width:40%"/></span> <span   style="line-height:22px;font-size:15px">�ϼ�</span></a> </li>  
';
}
$xingmu= DB::fetch_all("SELECT * FROM ".DB::table('whn_xiangmu')." WHERE   x20=".$_G[uid]);
$xingmu=count($xingmu);
echo  '
<li  style="width:25%"><a href="plugin.php?id=xd:xiangmu&ft=0"  > <span class="iconfont"><img   src="wjxa/gzsh��������.png"      style="width:40%;margin-top:2px"/></span> <span   style="line-height:20px;font-size:15px">����('.$xingmu.')</span></a> </li>  
';
if($sandd!="(0)"){
echo  '
<li   style="width:25%"><a href="plugin.php?id=xd:sandd&a=x_xq2"  > <span class="iconfont"><img   src="wjxa/gzsh��ѯ.png"      style="width:40%"/></span> <span   style="line-height:20px;font-size:15px">��ѯ'.$sandd.'</span></a> </li> ';}
echo  '
   </ul>
  </div> ';


echo '
<div class="fixed1_nav fixed1_nav_no_wx"   style="border-bottom:solid 1px #F0F0F0;border-top:solid 8px #F0F0F0;margin-top:16px">
    <ul>
      <a href="javascript:void(0);" onclick="lieb1()"><li   style="width:100%"><span   style="float:left;font-size:13px;margin-left:8px;color:#4F4F4F">��������������</span> <span   style="float:right;font-size:13px;margin-right:8px;color:#4F4F4F">�鿴����</span></li></a>
    </ul>
  </div>
<div style="background:white;overflow:scroll;width:100%;height:90px"><div   id="msg3"   style="width:2100px"></div></div>

<div   style="height:60px;color:white">woheni</div></div>

<div id="datePlugin"></div>
<div id="erw1"  style="width:100%;height:800px;position:fixed;z-index:9;top:0px;left:0px;display:none;background:url(\'wjxa/fjj.jpg\') no-repeat;background-size:100% 100%;"><div style="margin:5px;float:right;width:10%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:10px;background:#272727">��</div></div>
<div id="erw" style="position:fixed;z-index:9;top:10%;left:15%;width:70%;display:none"><div id="output"  style="width:100%"></div><div  style="width:100%;text-align:center"><span style="position:relative;top:20px;width:100%;text-align:center;color:white;font-weight:bold;font-size:20px;border-radius:5px">'.$n3[username].'�Ĺ����Ҷ�ά��</span></div>
</div>';
 if(empty($mp[x3])||empty($mp[x6])){
echo  '
<form  id="f1"  action="plugin.php?id=xd:mp1&ft=shzh" method="post"   accept-charset="utf-8" >
<div    align="center"  style="position:fixed;z-index:9;top:20%;left:20%;background:white;width:60%;border-radius:5px;padding:8px"> <div   style="width:87%;color:#3C3C3C;font-size:20px;border-radius:10px;border:1px solid #FF9797" >&nbsp&nbsp����д��ϵ��Ϣ&nbsp&nbsp</div>
<br/><div  align="center"  style="100%"><input   autoFocus   placeholder="������绰����"  name="dh"    id="dh"   type="text" value="'.$mp[x3].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/></div>
<br/><div  align="center"  style="100%"><input  autoFocus   placeholder="������΢�ź�"   name="wx"      id="wx"    type="text" value="'.$mp[x6].'" style="width:87%;height:40px;font-size:20px;border-radius:10px;padding:0px"/></div>
<br/>
</form>
<div  align="center"  style="100%">
<a href="javascript:void(0);" onclick="tdwx()">
 <div  style="width:87%;color:white;height:40px;line-height:40px;font-size:25px;background:#40C2F7;border-radius:10px" >&nbsp&nbsp��&nbsp��&nbsp&nbsp</div></a>
<div    align="left"  style="background:white;width:90%;border-radius:5px;padding:8px"> <div   style="color:#3C3C3C;font-size:15px;border-radius:10px;" >��Ҳ�������·����ù����������ã�</div></div>';
}


echo  '
</div>
<div   id="msg"></div>
 

<table   width="100%"     bordercolor="white"  border="0"  cellspacing="0"  cellpadding="0"    style="position:fixed;bottom:0px;z-index:9">
<tr  align="center"   style="">
<td      style="width:25%;height:50px">
<a  href="javascript:void(0);" onclick="zhifuu()"  style=""><div       id="cd1"><span class="iconfont"   style="font-size:25px;">&#xe60c;</span><br/><div   style="font-size:12px;margin-top:-4px">��ҳ</div></div> </a>
</td>
<td      style="width:25%;height:50px">
<a  href="javascript:void(0);" onclick="shzh()"  > <div   id="cd2"><span class="iconfont"  style="font-size:25px;"><img   src="wjxa/����.png"    style="width:15%" /></span><br/><div   style="font-size:12px;margin-top:-4px">���ù�����</div></div></a>
</td>
<td      style="width:25%;height:50px">
<a  href="plugin.php?id=xd:mp&ft=gzsh_user"  > <div   id="cd3"><span class="iconfont"   style="font-size:25px;" >&#xe629;</span><br/><div   style="font-size:12px;margin-top:-6px">�ҵ�</div></div></a>
</td>
</tr></table>

<div style="width:100%;position:fixed;z-index:5;bottom:30%;left:0px;display:none;background:white;height:40%;padding-top:20%"    id="shzh">
<ul>
       <li><a href="javascript:void(0);" onclick="fbgg()"  class="add"> <span class="iconfont"><img   src="wjxa/����.png"     style="width:21%"/></span> <br/><span class="iconfont1">�������� </span></a> </li>
      <li> <a href="javascript:void(0);" onclick="shjmpysh()"> <span class="iconfont"><img   src="wjxa/����.png"     style="width:25%"    /> </span><br/><span class="iconfont1"> ������Ƭ��ʽ</span></a> </li> 
      <li> <a href="javascript:void(0);" onclick="tt()"> <span class="iconfont"><img   src="wjxa/ͷ���޸�.png"     style="width:25%"    /> </span><br/> <span class="iconfont1">�޸�ͷ��</span></a> </li>
      <li><a href="javascript:void(0);" onclick="gzshm()"  class="add"> <span class="iconfont"><img   src="wjxa/�޸�.png"     style="width:25%"/></span><br/><span class="iconfont1">��ӹ�������</span></a> </li>
      <li> <a href="javascript:void(0);" onclick="tjwx()"><span class="iconfont"><img   src="wjxa/΢��.png"    style="width:21%" /> </span> <br/><span class="iconfont1">���΢�� </span></a> </li>
       <li> <a href="javascript:void(0);" onclick="tjdh()"> <span class="iconfont"><img   src="wjxa/�绰.png"   style="width:21%"  /></span>  <br/> <span class="iconfont1">��ӵ绰 </span></a> </li>
       <li> <a href="plugin.php?id=xd:mp&ft=tdizhi"><span class="iconfont"><img   src="wjxa/��ַ.png"    style="width:25%" /> </span> <br/><span class="iconfont1">��ӵ�ַ </span></a> </li>
      <li><a href="javascript:void(0);" onclick="zwjs()"><span class="iconfont" style=""><img   src="wjxa/��ʽ��.png"    style="width:25%" /></span><br/><span class="iconfont1">���ҽ��� </span></a></li>
 <li><a href="javascript:void(0);" onclick="gzslb()""><span class="iconfont" style=""><img   src="wjxa/���.png"    style="width:25%" /></span><br/><span class="iconfont1">��������� </span></a></li>
<li  style="float:right"><a  href="javascript:void(0);" onclick="shzh1()"  ><div class="fixed_close iconfont"   style="margin-top:10px">&#xe608;</div></a></li>
</ul>
</div>


';

$whn_xd314->body_fyb();//---------------------------------------��ҳb ������
//echo  '<div class="fixed_nav fixed_nav_no_wx"><ul><li><a href="plugin.php?id=xd:xiangmu&a=chyu"> <span class="iconfont">&#xe607;</span>��˿����</a> </li><li> <a href="plugin.php?id=xd:xiangmu&a=fsgl"> <span class="iconfont">&#xe61f;</span>�ҵĹ�ע</a> </li><li   class="on" > <a href="plugin.php?id=xd:xiangmu&a=achyu"> <span class="iconfont">&#xe6a5;</span>�µĴ�</a> </li>   </ul>  </div></div>';
$whn_xd314->total_ajax2('fy(a)','"plugin.php?id=xd:notes_zhanshi&a=7aa"','
var caidan=document.getElementById("caidan").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
var  ff=document.getElementById("ff");if(ff){document.getElementById("ff").parentNode.removeChild(document.getElementById("ff"));}
','
document.getElementById("msg").innerHTML=resp;fya();
',1,'"ym="+a+"&leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu="+canshu+"&neirong="+neirong');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
$whn_xd314->total_ajax2('chuli()','"plugin.php?id=xd:notes_zhanshi&a=7aa"','var  a=0;
var caidan=document.getElementById("caidan").value;var canshu2=document.getElementById("canshu2").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
','
if(caidan=="��ע"){document.getElementById("msg2").innerHTML=resp;paihang(0);}else{
if(resp=="�ύ"){alert("���ύ��");window.location.href="plugin.php?id=xd:tuiguang&a=zhifuxx&b='.$get[b].'&c='.$i.'";}else  if(resp=="���������1"){alert("�����ù��������");zhifuu();}else  if(resp=="���ҽ���1"){alert("���������ҽ��ܣ�");zhifuu();}else  if(resp=="��ӵ绰1"){alert("��������ϵ�绰��");zhifuu();}else  if(resp=="���΢��1"){alert("������΢�źţ�");zhifuu();}else  if(resp=="��������1"){alert("�����ù��������ƣ�");zhifuu();}else  if(resp=="������Ƭ��ʽ1"){alert("��������Ƭ��ʽ��");zhifuu();}else  if(resp=="��������1"){alert("�����ù��棡");zhifuu();}else  if(resp=="�ѹ�ע"){alert("�ѹ�ע��");document.getElementById("caidan").value="�б�1";chuli();}else  if(resp=="ɾ����ע"){alert("��ɾ����ע��");document.getElementById("caidan").value="�б�";
fy(0);}else  if(resp=="ȡ��"){alert("��ȡ����");window.location.href="javascript:history.back(-1)";}else  if(resp=="�˿�1"){alert("�������˿");window.location.href="plugin.php?id=xd:notes_zhanshi&a=7&d=1";}else  if(resp=="ȡ���˿�"){alert("��ȡ���˿");window.location.href="plugin.php?id=xd:notes_zhanshi&a=7&d=1";}else  if(resp=="�˿�1"){alert("�������˿");window.location.href="plugin.php?id=xd:notes_zhanshi&a=7&d=1";}else{document.getElementById("msg").innerHTML=resp;}}
',1,'"ym="+a+"&leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu="+canshu+"&canshu2="+canshu2+"&neirong="+neirong');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
$whn_xd314->total_ajax2_shx('shuaxin()','"plugin.php?id=xd:notes_zhanshi&a=shuaxin"','
','
document.getElementById("msg1").innerHTML=resp;document.getElementById("shx1").innerHTML=document.getElementById("shuaxin1").value;document.getElementById("shx2").innerHTML=document.getElementById("shuaxin2").value;
',1,'');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

$whn_xd314->total_ajax2('chuli2(a)','"plugin.php?id=xd:notes_zhanshi&a=7aa"','
var caidan=document.getElementById("caidan").value;var canshu2=document.getElementById("canshu2").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
var  ff2=document.getElementById("ff2");if(ff2){document.getElementById("ff2").parentNode.removeChild(document.getElementById("ff2"));}
','
document.getElementById("msg2").innerHTML=document.getElementById("msg2").innerHTML+resp;
',1,'"ym="+a+"leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu2="+canshu2+"&canshu="+canshu+"&neirong="+neirong');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���
$whn_xd314->total_ajax2('chuli3(a)','"plugin.php?id=xd:notes_zhanshi&a=7aa"','
var caidan=document.getElementById("caidan").value;var canshu2=document.getElementById("canshu2").value;var canshu1=document.getElementById("canshu1").value;var canshu=document.getElementById("canshu").value;var neirong=document.getElementById("neirong").value;var leixing=document.getElementById("leixing").value;
var  ff1=document.getElementById("ff1");if(ff1){document.getElementById("ff1").parentNode.removeChild(document.getElementById("ff1"));}
','
document.getElementById("msg3").innerHTML=document.getElementById("msg3").innerHTML+resp;
',1,'"ym="+a+"leixing="+leixing+"&caidan="+caidan+"&canshu1="+canshu1+"&canshu2="+canshu2+"&canshu="+canshu+"&neirong="+neirong');//----------------------------------------------------------------------------------ajaxģ�飻$url        (��Ҫhtml��id="msg";��ťΪ<a href="javascript:void(0);" onclick="ajax()">);$name������  Ĭ��Ϊajax(a);$before֮ǰ��js,$after֮���js,$post�Ƿ�Ϊpost��ʽ,$send���͵Ĳ���

echo  ' 
<script type="text/javascript" src="source/plugin/xd/xd_js-css/jquery.qrcode.min.js"></script>
<script language="javascript" type="text/javascript">';
$script='
function  fx(){
if(confirm("����������ɻ�öԷ��ڴ˹����������ѵ���ɣ��Ƿ�ȷ�Ϸ���(��[�Һ���99]APP�з������Ч��)")){
connectSQJavascriptBridge(function(){
sq.share("'.$title.'", "����鿴����","plugin.php?id=xd:notes_zhuye&a=7&c='.$uid.'&r='.$_G['uid'].'", function(result){
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
document.getElementById(a).innerHTML="<a href=\'javascript:void(0);\' onclick=\'deletgzh("+a+")\'><div  style=\'margin:8px;color:#4F4F4F;font-size:25px;float:right\'>ɾ��</div></a>";
document.getElementById(b).innerHTML="����";
}else{
document.getElementById(a).innerHTML="";
document.getElementById(b).innerHTML="����";
}
}

function shjmpysh1(a,b){
if(a>=b){
if(confirm("����ǰ��"+a+"�þñ�!�Ƿ�ȷ��ʹ�á�"+b+"���þñ�������Ƭ���")){
$("#tuiss").fadeOut(1000);
document.getElementById("caidan").value="������Ƭ��ʽ1";
chuli();
}
}else{
alert("��ǰ�þñҲ��㡾"+b+"������");
}
}
function shjmpysh(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="������Ƭ��ʽ";
chuli();
}

function gzslb1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("gzslb").value;
document.getElementById("caidan").value="���������1";
chuli();
}

function gzslb(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="���������";
chuli();
}

function zwjs1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("zwjs").value;
document.getElementById("caidan").value="���ҽ���1";
chuli();
}

function zwjs(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="���ҽ���";
chuli();
}

function tjdh1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("tjdh").value;
document.getElementById("caidan").value="��ӵ绰1";
chuli();
}

function tjdh(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="��ӵ绰";
chuli();
}

function tjwx1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("tjwx").value;
document.getElementById("caidan").value="���΢��1";
chuli();
}

function tjwx(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="���΢��";
chuli();
}

function gzshm1(){
$("#tuiss").fadeOut(1000);
document.getElementById("neirong").value=document.getElementById("gzshm").value;
document.getElementById("caidan").value="��������1";
chuli();
}

function gzshm(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="��������";
chuli();
}

function gzshguanzhu(c){
document.getElementById("canshu2").value=c;
document.getElementById("caidan").value="�����ҹ�ע";
chuli();
}

function fbgg1(){
document.getElementById("neirong").value=document.getElementById("fbgg").value;
document.getElementById("caidan").value="��������1";
chuli();
}

function fbgg(){
$("#msg").fadeIn(1000);
$("#tuiss").fadeOut(1000);
$("#shzh").fadeOut(1000);
document.getElementById("caidan").value="��������";
chuli();
}



function deletgzh(c){
if(confirm("��Ҫɾ����")){
document.getElementById("canshu2").value=c;
document.getElementById("caidan").value="ɾ����ע";
chuli();
}
}


function paihang(a){
document.getElementById("caidan").value="������";
var a1=a+1;
var a2=a1*2100;
document.getElementById("msg3").style.width=a2+"px";
$("#ssss").fadeOut(1000);
$("#tuiss").fadeIn(2000);
chuli3(a);
 }
function guanzhu(a){
document.getElementById("caidan").value="��ע";
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
document.getElementById("caidan").value="��ע";
chuli2(0);
 }
function quxiao(){
document.getElementById("caidan").value="ȡ��";
chuli();
 }
function lishi(){
$("#msg").fadeIn(1000);
document.getElementById("cd1").className="cd";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd1";
$("#tuiss").fadeOut(1000);
document.getElementById("caidan").value="��ʷ";
fy(0);
 }
function lieb1(){
$("#msg").fadeIn(1000);
document.getElementById("cd1").className="cd1";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd";
$("#tuiss").fadeOut(1000);
$("#ssss").fadeIn(2000);
document.getElementById("caidan").value="�б�1";
fy(0);
 }

function lieb(){
$("#msg").fadeIn(1000);
document.getElementById("cd1").className="cd";
document.getElementById("cd2").className="cd";
document.getElementById("cd3").className="cd";
$("#tuiss").fadeOut(1000);
$("#ssss").fadeIn(2000);
document.getElementById("caidan").value="�б�";
fy(0);
 }
function tijiao(){
var str=a+"|"+b+"|"+c+"|"+d+"|"+e+"|"+f; 
document.getElementById("canshu1").value=str;
document.getElementById("caidan").value="�ύ";
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
document.getElementById("caidan").value="�б�";
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
document.getElementById("caidan").value="��ע";
chuli();
 }
';
}
echo  '
  function wx(){
  alert("΢�ź�:'.$mp[x6].'");
  } 
';
if(empty($mp[x3])||empty($mp[x6])){
echo  '
function tdwx(){
var xd2=document.getElementById("dh").value;
var wx=document.getElementById("wx").value;
if(xd2.length<1){
alert("����д�绰��");
}else if(wx.length<1){
alert("����д΢�ţ�");
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
        boardName: "������̬",
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
document.getElementById("qit1").innerHTML="<img   src=\'wjxa/����b.png\'    style=\'width:50%\' />";
}else{
document.getElementById("qit").style="display:none";
document.getElementById("qit1").innerHTML="<img   src=\'wjxa/����a.png\'    style=\'width:50%\' />";
}
}
function  m(){
var   province=document.getElementById("content3").value;
var   city=document.getElementById("city1");
if(province=="����"){
city.innerHTML="<select   class=\'city\'   name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��̨��\'>��̨��</option><option value=\'ʯ��ɽ��\'>ʯ��ɽ��</option><option value=\'������\'>������</option><option value=\'��ͷ����\'>��ͷ����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'ͨ����\'>ͨ����</option><option value=\'˳����\'>˳����</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'ƽ����\'>ƽ����</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="�Ϻ�"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'¬����\'>¬����</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'բ����\'>բ����</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ζ���\'>�ζ���</option><option value=\'�ֶ�����\'>�ֶ�����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ɽ���\'>�ɽ���</option><option value=\'������\'>������</option><option value=\'�ϻ���\'>�ϻ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="���"){
city.innerHTML="<select   class=\'city\'     name=\'city\'    id=\'city\'><option value=\'��ƽ��\'>��ƽ��</option><option value=\'�Ӷ���\'>�Ӷ���</option><option value=\'������\'>������</option><option value=\'�Ͽ���\'>�Ͽ���</option><option value=\'�ӱ���\'>�ӱ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'����\'>����</option></select>";
}else if(province=="����"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɿ���\'>��ɿ���</option><option value=\'������\'>������</option><option value=\'ɳƺ����\'>ɳƺ����</option><option value=\'��������\'>��������</option><option value=\'�ϰ���\'>�ϰ���</option><option value=\'������\'>������</option><option value=\'��ʢ��\'>��ʢ��</option><option value=\'˫����\'>˫����</option><option value=\'�山��\'>�山��</option><option value=\'������\'>������</option><option value=\'ǭ����\'>ǭ����</option><option value=\'������\'>������</option><option value=\'�뽭��\'>�뽭��</option><option value=\'������\'>������</option><option value=\'ͭ����\'>ͭ����</option><option value=\'������\'>������</option><option value=\'�ٲ���\'>�ٲ���</option><option value=\'�ɽ��\'>�ɽ��</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'�ǿ���\'>�ǿ���</option><option value=\'�ᶼ��\'>�ᶼ��</option><option value=\'�潭��\'>�潭��</option><option value=\'��¡��\'>��¡��</option><option value=\'����\'>����</option><option value=\'����\'>����</oion><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��Ϫ��\'>��Ϫ��</option><option value=\'ʯ����\'>ʯ����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'��ˮ��\'>��ˮ��</option><option value=\'����\'>����</option><option value=\'�ϴ�\'>�ϴ�</option><option value=\'����\'>����</option><option value=\'�ϴ�\'>�ϴ�</option></select>";
}else if(province=="�Ĵ�"){
city.innerHTML="<select    class=\'city\'   name=\'city\'    id=\'city\'><option value=\'�ɶ���\'>�ɶ���</option><option value=\'�Թ���\'>�Թ���</option><option value=\'��֦����\'>��֦����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��Ԫ��\'>��Ԫ��</option><option value=\'������\'>������</option><option value=\'�ڽ���\'>�ڽ���</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ϳ���\'>�ϳ���</option><option value=\'üɽ��\'>üɽ��</option><option value=\'�˱���\'>�˱���</option><option value=\'�㰲��\'>�㰲��</option><option value=\'������\'>������</option><option value=\'�Ű���\'>�Ű���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option></select>";
}else if(province=="����"){
city.innerHTML="<select     class=\'city\'     name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'����ˮ��\'>����ˮ��</option><option value=\'������\'>������</option><option value=\'��˳��\'>��˳��</option><option value=\'ͭ�ʵ���\'>ͭ�ʵ���</option><option value=\'ǭ����\'>ǭ����</option><option value=\'�Ͻڵ���\'>�Ͻڵ���</option><option value=\'ǭ������\'>ǭ������</option><option value=\'ǭ����\'>ǭ����</option></select>";
}else if(province=="����"){
city.innerHTML="<select    class=\'city\'     name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��Ϫ��\'>��Ϫ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��ͨ��\'>��ͨ��</option><option value=\'������\'>������</option><option value=\'�ն���\'>�ն���</option><option value=\'�ٲ���\'>�ٲ���</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��˫������\'>��˫������</option><option value=\'������\'>������</option><option value=\'�º���\'>�º���</option><option value=\'ŭ����\'>ŭ����</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'ɽ�ϵ���\'>ɽ�ϵ���</option><option value=\'�տ������\'>�տ������</option><option value=\'��������\'>��������</option><option value=\'�������\'>�������</option><option value=\'��֥����\'>��֥����</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'       name=\'city\'    id=\'city\'><option value=\'֣����\'>֣����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'ƽ��ɽ��\'>ƽ��ɽ��</option><option value=\'������\'>������</option><option value=\'�ױ���\'>�ױ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'�����\'>�����</option><option value=\'�����\'>�����</option><option value=\'����Ͽ��\'>����Ͽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�ܿ���\'>�ܿ���</option><option value=\'פ�����\'>פ�����</option></select>";
}else if(province=="����"){
city.innerHTML="<select        class=\'city\'          name=\'city\'    id=\'city\'><option value=\'�人��\'>�人��</option><option value=\'��ʯ��\'>��ʯ��</option><option value=\'ʮ����\'>ʮ����</option><option value=\'�˲���\'>�˲���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Т����\'>Т����</option><option value=\'������\'>������</option><option value=\'�Ƹ���\'>�Ƹ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ʩ��\'>��ʩ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Ǳ����\'>Ǳ����</option><option value=\'������\'>������</option><option value=\'��ũ������\'>��ũ������</option></select>";
}else if(province=="����"){
city.innerHTML="<select    class=\'city\'        name=\'city\'    id=\'city\'><option value=\'��ɳ��\'>��ɳ��</option><option value=\'������\'>������</option><option value=\'��̶��\'>��̶��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�żҽ���\'>�żҽ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'¦����\'>¦����</option><option value=\'������\'>������</option></select>";
}else if(province=="�㶫"){
city.innerHTML="<select     class=\'city\'       name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'�ع���\'>�ع���</option><option value=\'������\'>������</option><option value=\'�麣��\'>�麣��</option><option value=\'��ͷ��\'>��ͷ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'տ����\'>տ����</option><option value=\'ï����\'>ï����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'÷����\'>÷����</option><option value=\'��β��\'>��β��</option><option value=\'��Դ��\'>��Դ��</option><option value=\'������\'>������</option><option value=\'��Զ��\'>��Զ��</option><option value=\'��ݸ��\'>��ݸ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�Ƹ���\'>�Ƹ���</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'           name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'���Ǹ���\'>���Ǹ���</option><option value=\'������\'>������</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'��ɫ��\'>��ɫ��</option><option value=\'������\'>������</option><option value=\'�ӳ���\'>�ӳ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'ͭ����\'>ͭ����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'μ����\'>μ����</option><option value=\'�Ӱ���\'>�Ӱ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'��ˮ��\'>��ˮ��</option><option value=\'������\'>������</option><option value=\'��Ҵ��\'>��Ҵ��</option><option value=\'ƽ����\'>ƽ����</option><option value=\'��Ȫ��\'>��Ȫ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'¤����\'>¤����</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="�ຣ"){
city.innerHTML="<select      class=\'city\'              name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select      class=\'city\'             name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'ʯ��ɽ��\'>ʯ��ɽ��</option><option value=\'������\'>������</option><option value=\'��ԭ��\'>��ԭ��</option><option value=\'������\'>������</option></select>";
}else if(province=="�½�"){
city.innerHTML="<select      class=\'city\'               name=\'city\'    id=\'city\'><option value=\'��³ľ����\'>��³ľ����</option><option value=\'����������\'>����������</option><option value=\'��³������\'>��³������</option><option value=\'���ܵ���\'>���ܵ���</option><option value=\'������\'>������</option><option value=\'���������ɹ���\'>���������ɹ���</option><option value=\'���������ɹ���\'>���������ɹ���</option><option value=\'�����յ���\'>�����յ���</option><option value=\'�������տ¶�������\'>�������տ¶�������</option><option value=\'��ʲ����\'>��ʲ����</option><option value=\'�������\'>�������</option><option value=\'�����������\'>�����������</option><option value=\'���ǵ���\'>���ǵ���</option><option value=\'����̩����\'>����̩����</option><option value=\'ʯ������\'>ʯ������</option><option value=\'��������\'>��������</option><option value=\'ͼľ�����\'>ͼľ�����</option><option value=\'�������\'>�������</option></select>";
}else if(province=="�ӱ�"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'    id=\'city\'><option value=\'ʯ��ׯ��\'>ʯ��ׯ��</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'�ػʵ���\'>�ػʵ���</option><option value=\'������\'>������</option><option value=\'��̨��\'>��̨��</option><option value=\'������\'>������</option><option value=\'�żҿ���\'>�żҿ���</option><option value=\'�е���\'>�е���</option><option value=\'������\'>������</option><option value=\'�ȷ���\'>�ȷ���</option><option value=\'��ˮ��\'>��ˮ��</option></select>";
}else if(province=="ɽ��"){
city.innerHTML="<select      class=\'city\'            name=\'city\'    id=\'city\'><option value=\'̫ԭ��\'>̫ԭ��</option><option value=\'��ͬ��\'>��ͬ��</option><option value=\'��Ȫ��\'>��Ȫ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'˷����\'>˷����</option><option value=\'������\'>������</option><option value=\'�˳���\'>�˳���</option><option value=\'������\'>������</option><option value=\'�ٷ���\'>�ٷ���</option><option value=\'������\'>������</option></select>";
}else if(province=="���ɹ�"){
city.innerHTML="<select        class=\'city\'                  name=\'city\'    id=\'city\'><option value=\'���ͺ�����\'>���ͺ�����</option><option value=\'��ͷ��\'>��ͷ��</option><option value=\'�ں���\'>�ں���</option><option value=\'�����\'>�����</option><option value=\'ͨ����\'>ͨ����</option><option value=\'������˹��\'>������˹��</option><option value=\'���ױ�����\'>���ױ�����</option><option value=\'�����׶���\'>�����׶���</option><option value=\'�����첼��\'>�����첼��</option><option value=\'�˰���\'>�˰���</option><option value=\'���ֹ�����\'>���ֹ�����</option><option value=\'��������\'>��������</option></select>";
}else if(province=="����"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'><option value=\'�Ͼ���\'>�Ͼ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ͨ��\'>��ͨ��</option><option value=\'���Ƹ���\'>���Ƹ���</option><option value=\'������\'>������</option><option value=\'�γ���\'>�γ���</option><option value=\'������\'>������</option><option value=\'����\'>����</option><option value=\'̩����\'>̩����</option><option value=\'��Ǩ��\'>��Ǩ��</option></select>";
}else if(province=="�㽭"){
city.innerHTML="<select       class=\'city\'              name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'����\'>����</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'̨����\'>̨����</option><option value=\'��ˮ��\'>��ˮ��</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                 name=\'city\'    id=\'city\'><option value=\'�Ϸ���\'>�Ϸ���</option><option value=\'�ߺ���\'>�ߺ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'ͭ����\'>ͭ����</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                     name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Ȫ����\'>Ȫ����</option><option value=\'������\'>������</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select          class=\'city\'                  name=\'city\'    id=\'city\'><option value=\'�ϲ���\'>�ϲ���</option><option value=\'��������\'>��������</option><option value=\'Ƽ����\'>Ƽ����</option><option value=\'�Ž���\'>�Ž���</option><option value=\'������\'>������</option><option value=\'ӥ̶��\'>ӥ̶��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�˴���\'>�˴���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="ɽ��"){
city.innerHTML="<select        class=\'city\'                   name=\'city\'    id=\'city\'><option value=\'������\'>������</option><option value=\'�ൺ��\'>�ൺ��</option><option value=\'�Ͳ���\'>�Ͳ���</option><option value=\'��ׯ��\'>��ׯ��</option><option value=\'��Ӫ��\'>��Ӫ��</option><option value=\'��̨��\'>��̨��</option><option value=\'Ϋ����\'>Ϋ����</option><option value=\'������\'>������</option><option value=\'̩����\'>̩����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�ĳ���\'>�ĳ���</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                  name=\'city\'      id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��˳��\'>��˳��</option><option value=\'��Ϫ��\'>��Ϫ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'Ӫ����\'>Ӫ����</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�̽���\'>�̽���</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��«����\'>��«����</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'                      name=\'city\'      id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ƽ��\'>��ƽ��</option><option value=\'��Դ��\'>��Դ��</option><option value=\'ͨ����\'>ͨ����</option><option value=\'��ɽ��\'>��ɽ��</option><option value=\'��ԭ��\'>��ԭ��</option><option value=\'�׳���\'>�׳���</option><option value=\'�ӱ���\'>�ӱ���</option></select>";
}else if(province=="������"){
city.innerHTML="<select       class=\'city\'                name=\'city\'      id=\'city\'><option value=\'��������\'>��������</option><option value=\'���������\'>���������</option><option value=\'������\'>������</option><option value=\'�׸���\'>�׸���</option><option value=\'˫Ѽɽ��\'>˫Ѽɽ��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ľ˹��\'>��ľ˹��</option><option value=\'��̨����\'>��̨����</option><option value=\'ĵ������\'>ĵ������</option><option value=\'�ں���\'>�ں���</option><option value=\'�绯��\'>�绯��</option><option value=\'���˰������\'>���˰������</option></select>";
}else if(province=="̨��"){
city.innerHTML="<select       class=\'city\'                         name=\'city\'      id=\'city\'><option value=\'̨����\'>̨����</option><option value=\'������\'>������</option><option value=\'̨����\'>̨����</option><option value=\'������\'>������</option><option value=\'��¡��\'>��¡��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��Ͷ��\'>��Ͷ��</option><option value=\'�����\'>�����</option><option value=\'������\'>������</option><option value=\'̨����\'>̨����</option><option value=\'̨����\'>̨����</option><option value=\'��԰��\'>��԰��</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'�û���\'>�û���</option></select>";
}else if(province=="����"){
city.innerHTML="<select       class=\'city\'                      name=\'city\'      id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'��ɳ��\'>��ɳ��</option><option value=\'������\'>������</option><option value=\'��ָɽ��\'>��ָɽ��</option><option value=\'�Ĳ���\'>�Ĳ���</option><option value=\'����\'>����</option><option value=\'������\'>������</option><option value=\'������\'>������</option></select>";
}else if(province=="���"){
city.innerHTML="<select       class=\'city\'                     name=\'city\'      id=\'city\'><option value=\'������\'>������</option><option value=\'������\'>������</option><option value=\'����\'>����</option><option value=\'����\'>����</option><option value=\'�½�\'>�½�</option><option value=\'ɳ����\'>ɳ����</option><option value=\'��ɳ��\'>��ɳ��</option><option value=\'�ͼ�����\'>�ͼ�����</option><option value=\'Ԫ����\'>Ԫ����</option></select>";
}else if(province=="����"){
city.innerHTML="<select         class=\'city\'             name=\'city\'      id=\'city\'><option value=\'����������\'>����������</option><option value=\'ʥ����������\'>ʥ����������</option><option value=\'������\'>������</option><option value=\'��������\'>��������</option><option value=\'��˳����\'>��˳����</option></select>";
}
}


</script>
';

$whn_xd314->total_end();//-----------------------------------------------------------------------------------html�ļ������β	
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

?>