<?php
function callback_install() {
	global $m;
	option::set('xy_autoclean','1');
	option::set('xy_autoclean_day','1');
	option::set('xy_autoclean_hour','22');
	$m->query("UPDATE `".DB_NAME."`.`".DB_PREFIX."plugins` SET `order`='20' WHERE `name`='xy_autoclean';");
}

function callback_init() {
	$day = (int)option::get('xy_autoclean_day');
	$hour = (int)option::get('xy_autoclean_hour');
	if (empty($day)) option::set('xy_autoclean_day','1');
	if (empty($hour)) option::set('xy_autoclean_hour','22');
	cron::set('xy_autoclean','plugins/xy_autoclean/cron.php',0,'自动清理绑定过期的BDUSS和贴吧。',1800);
}

function callback_inactive() {
	cron::del('xy_autoclean');
}

function callback_remove() {
	global $m;
	$m->query("DELETE FROM `".DB_NAME."`.`".DB_PREFIX."options` WHERE `name` LIKE '%xy_autoclean%'");
}
