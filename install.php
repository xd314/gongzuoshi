<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
//----------------------------------------------------------------------------------------------------------文件箱数据表
$a=DB::query("CREATE TABLE pre_wjx(
	`uid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL
	PRIMARY KEY (`uid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------名片数据表
$a=DB::query("CREATE TABLE pre_mp(
	`uid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`uid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");

//----------------------------------------------------------------------------------------------------------项目数据表
$a=DB::query("CREATE TABLE pre_whn_xiangmu(
	`uid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`uid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------项目日志数据表
$a=DB::query("CREATE TABLE pre_whn_xiangmu_log(
	`uid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`uid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------专卖店数据表
$a=DB::query("CREATE TABLE pre_zhmd(
	`uid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`uid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------专卖店日志数据表
$a=DB::query("CREATE TABLE pre_zhmd_log(
	`uid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`uid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------名片评论数据表
$a=DB::query("CREATE TABLE pre_mpzp(
	`hid` text NULL,`time` int(30) NOT NULL,`ip` text NULL,`uid` text NULL,`z` text NULL,`p` text NULL,`de` int(11) NOT NULL
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------名片赞数据表
$a=DB::query("CREATE TABLE pre_mpz(
	`time` int(30) NOT NULL,`ip` text NULL,`uid` text NULL,`z` text NULL,`p` text NULL,`de` int(11) NOT NULL
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------收藏名片数据表
$a=DB::query("CREATE TABLE pre_mpshou(
	`mid` int(20) NOT NULL,`uid` int(20) NOT NULL,`time` int(20) NOT NULL
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------产品库数据表
$a=DB::query("CREATE TABLE pre_chpk(
	`cid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL
	PRIMARY KEY (`cid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------助手系统数据表
$a=DB::query("CREATE TABLE pre_assistant(
	`aid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
	PRIMARY KEY (`aid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------情境控制
$a=DB::query("CREATE TABLE pre_assistant1(
	`time` int(30) NOT NULL,`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------用户需求数据表need
$a=DB::query("CREATE TABLE pre_assistant2(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------用户欲望数据表desire
$a=DB::query("CREATE TABLE pre_assistant3(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------助手系统可理解词数据表vocabulary
$a=DB::query("CREATE TABLE pre_assistant4(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------问答系统数据表
$a=DB::query("CREATE TABLE pre_answers(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------问答系统数据表1
$a=DB::query("CREATE TABLE pre_answers1(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------客户管理系统数据表
$a=DB::query("CREATE TABLE pre_customer(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------事务管理系统数据表
$a=DB::query("CREATE TABLE pre_work(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------笔记管理系统数据表
$a=DB::query("CREATE TABLE pre_notes(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//---------------------------------------------------------------------------------------------------------业绩管理系统数据表
$a=DB::query("CREATE TABLE pre_achievement(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//---------------------------------------------------------------------------------------------------------完美计算器数据表
$a=DB::query("CREATE TABLE pre_wmjsq(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//---------------------------------------------------------------------------------------------------------完美计算器数据表1
$a=DB::query("CREATE TABLE pre_wmjsq1(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------供需系统数据表
$a=DB::query("CREATE TABLE pre_sandd(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------提现数据表
$a=DB::query("CREATE TABLE pre_whn_tixian(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------地址数据表
$a=DB::query("CREATE TABLE pre_whn_dizhi(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------留言数据表
$a=DB::query("CREATE TABLE pre_whn_liuyan(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------关注数据表
$a=DB::query("CREATE TABLE pre_whn_guanzhu(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------直排数据表
$a=DB::query("CREATE TABLE pre_whn_zhipai(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------聚宝盆收益数据表
$a=DB::query("CREATE TABLE pre_whn_shouyi(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------收费站数据表
$a=DB::query("CREATE TABLE pre_whn_tollstation(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------推广系统数据表
$a=DB::query("CREATE TABLE pre_whn_tuiguang(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------账单系统数据表
$a=DB::query("CREATE TABLE pre_whn_zhangdan(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//----------------------------------------------------------------------------------------------------------信息系统数据表
$a=DB::query("CREATE TABLE pre_whn_xinxi(
	`yid` int(11) NOT NULL,
	`x` text NULL,`x1` text NULL,`x2` text NULL,`x3` text NULL,`x4` text NULL,`x5` text NULL,`x6` text NULL,`x7` text NULL,`x8` text NULL,`x9` text NULL,`x10` text NULL,`x11` text NULL,`x12` text NULL,`x13` text NULL,`x14` text NULL,`x15` text NULL,`x16` text NULL,`x17` text NULL,`x18` text NULL,`x19` text NULL,`x20` text NULL,
`x21` text NULL,`x22` text NULL,`x23` text NULL,`x24` text NULL,
	PRIMARY KEY (`yid`)
) ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8
CHECKSUM=0
DELAY_KEY_WRITE=0;");
//---------------------------------------------------------------------------------------------------------------产品库自增
$a=DB::query("ALTER TABLE `pre_chpk` 
	MODIFY COLUMN `cid` int(11) NOT NULL AUTO_INCREMENT FIRST;");
$a=DB::query("ALTER TABLE `pre_answers` 
	MODIFY COLUMN `yid` int(11) NOT NULL AUTO_INCREMENT FIRST;");
$a=DB::query("ALTER TABLE `pre_achievement` 
	MODIFY COLUMN `yid` int(11) NOT NULL AUTO_INCREMENT FIRST;");
$a=DB::query("ALTER TABLE `pre_wmjsq1` 
	MODIFY COLUMN `yid` int(11) NOT NULL AUTO_INCREMENT FIRST;");
?>