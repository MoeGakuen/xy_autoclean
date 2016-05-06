<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 
return array(
	'plugin' => array(
		'name'        => '自动清理',
		'version'     => '1.0',
		'description' => '自动清理绑定过期的BDUSS和贴吧。',
		'onsale'      =>  false,
		'url'         => 'http://tb.hydd.cc',
		'for'         => '3.8+',
        'forphp'      => '5.3'
	),
	'author' => array(
		'author'      => '学园',
		'email'       => 'i@hydd.cc',
		'url'         => 'http://www.xybk.cc'
	),
	'view'   => array(
		'setting'     => true,
		'show'        => false,
		'vip'         => false,
		'private'     => false,
		'public'      => false,
		'update'      => false,
	),
	'page'   => array(
		'ajax'
	)
);
