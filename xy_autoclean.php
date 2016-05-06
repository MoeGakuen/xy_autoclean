<?php 
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 

function xy_autoclean_navi() { 
	echo '<li ';
	if(isset($_GET['plug']) && $_GET['plug'] == 'xy_autoclean') { echo 'class="active"'; }
	echo '><a href="index.php?mod=admin:setplug&plug=xy_autoclean"><span class="
glyphicon glyphicon-trash"></span> 自动清理设置</a></li>';
}

addAction('navi_9','xy_autoclean_navi');
?>