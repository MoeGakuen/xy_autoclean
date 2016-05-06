<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
global $m;
if(option::get('xy_autoclean')==1){
	$hour = (int)option::get('xy_autoclean_hour');
	if (empty($hour)) option::set('xy_autoclean_hour','22');
	if (date('G') >= $hour) {
		$today = strtotime(date('Y-m-d'));
		$lastdo = strtotime(option::get('xy_autoclean_lastdo'));
		$c = round(($today-$lastdo)/3600/24);
		$day = (int)option::get('xy_autoclean_day');
		if (empty($day)) option::set('xy_autoclean_day','1');
		if ($c >= $day) {
			$tiebas = unserialize(option::get('fb_tables'));
			array_unshift($tiebas,'tieba');
			$sum = $d_t_num = $d_b_num = 0;
			for($i=0;$i<count($tiebas);$i++){
				$s = $m->query("SELECT distinct `uid`,`pid` FROM `".DB_NAME."`.`".DB_PREFIX.$tiebas[$i]."` WHERE `status` = 1;");
				if ($m->num_rows($s) > 0) {
					$sum++;
					while ($u = $m->fetch_array($s)) {
						$d_b = $m->query("DELETE FROM `".DB_NAME."`.`".DB_PREFIX."baiduid` WHERE `uid` = '".$u['uid']."' and `id` = '".$u['pid']."';");
						$tieba_num = $m->fetch_array($m->query("SELECT count(*) FROM `".DB_NAME."`.`".DB_PREFIX.$tiebas[$i]."` WHERE `uid` = '".$u['uid']."' and `pid` = '".$u['pid']."';"),MYSQL_NUM);
						$d_t = $m->query("DELETE FROM `".DB_NAME."`.`".DB_PREFIX.$tiebas[$i]."` WHERE `uid` = '".$u['uid']."' and `pid` = '".$u['pid']."';");
						if($d_t) $d_t_num += $tieba_num[0];
						if($d_b) $d_b_num++;
					}
				}
			}
			option::set('xy_autoclean_lastdo',date('Y-m-d'));
			option::set('xy_autoclean_log','['.date('Y-m-d H:i:s') . ']<br/>上次清理日期：' . date('Y-m-d').'<br/>贴吧表总数：['.count($tiebas).']<br/>清理表：['.$sum.']<br/>清理贴吧：['.$d_t_num.']<br/>清理BDUSS：['.$d_b_num.']');
		}
	}
}