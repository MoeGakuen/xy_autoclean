<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
if (ROLE != 'admin') die('{"type":"error","emsg":"权限不足！"}');
global $m;
//基本设置
if (isset($_GET['set'])) {
		$day = (int)$_POST['day'];
		if ($day < 1 or $day > 365) die('{"type":"error","emsg":"清理间隔天数错误！<br/>必须大于0小于365。"}');
		$hour = (int)$_POST['hour'];
		if ($hour < 0 or $hour > 23) die('{"type":"error","emsg":"清理时间错误！<br/>必须大于等于0小于23。"}');
		$autoclean = !empty($_POST['autoclean']) ? 1 : 0;
		option::set('xy_autoclean',$autoclean);
		option::set('xy_autoclean_day',$day);
		option::set('xy_autoclean_hour',$hour);
		die('{"type":"success"}');
}