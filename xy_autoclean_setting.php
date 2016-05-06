<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
?>
<section class="content-header"><h1> 自动清理 <small>AutoClean</small></h1></section>
<form id="autoclean_set" action="index.php?mod=view:xy_autoclean:ajax&set" method="post">
	<div class="input-group">
		<span class="input-group-addon">清理间隔（天）</span>
		<input type="number" name="day" class="form-control" value="<?php echo option::get('xy_autoclean_day'); ?>" min="1" max="365" required/>
	</div><br/>
	<div class="input-group">
		<span class="input-group-addon">清理时间（小时）</span>
		<input type="number" name="hour" class="form-control" value="<?php echo option::get('xy_autoclean_hour'); ?>" min="0" max="23" required/>
	</div><br/>
	<div class="input-group">
       	<label><input type="checkbox" name="autoclean" value="1" <?php echo option::get('xy_autoclean') == 1 ? 'checked' : ''; ?>> 开启清理</label>
	</div><br/>
    <button type="submit" class="btn btn-success">保存设置</button>
</form><br/><br/><br/>
<?php
$log = option::get('xy_autoclean_log');
if (!empty($log)) {?>
<div class="panel panel-default">
	<div class="panel-heading" onClick="$('#log').fadeToggle();"><h3 class="panel-title"><span class="glyphicon glyphicon-chevron-down"></span> 执行日志</h3></div>
	<div class="panel-body" id="log">
		<?php echo $log;?>
	</div>
</div>
<?php }?>
<div class="panel panel-default">
	<div class="panel-heading" onClick="$('#jianjie').fadeToggle();"><h3 class="panel-title"><span class="glyphicon glyphicon-chevron-down"></span> 参数简介</h3></div>
	<div class="panel-body" id="jianjie">
		<p>1、<b>清理间隔</b> 每过X天清理一次。</p>
		<p>2、<b>清理时间</b> 当天X小时开始清理（24小时制，0=24）。</p>
	</div>
</div>
<link href="//cdn.bootcss.com/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://libs.useso.com/js/jquery.form/3.50/jquery.form.min.js"></script>
<script type="text/javascript" src="//cdn.bootcss.com/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>
<script type="text/javascript" src="plugins/xy_autoclean/js.js"></script>