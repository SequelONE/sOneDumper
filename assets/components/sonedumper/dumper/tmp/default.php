<?php

declare(strict_types = 1);

// Templates
function sod_tpl_page()
{
    global $SOD;

    return <<<HTML
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>{$SOD->name}</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="load.php?styles.v119.css">
<script type="text/javascript" src="load.php?main.v114.js"></script>
<script type="text/javascript" src="load.php?{$SOD->LNG['name']}.lng.js"></script>
<link rel="shortcut icon" href="load.php?favicon.v100.ico">
</head>

<body>
<div id="main_div">
	<div id="header"></div>
	<div id="sodToolbar"></div>
	<div id="name"><div id="loading"></div><b></b></div>
	<div id="content" class="content">
	    <div class="container" id="tab_backup">
	        <div class="row">
	            <div class="col-lg-3 col-12">
	                <div class="caption">{$SOD->LNG['combo_db']}</div><div id="backup_db"></div>
					<div class="caption">{$SOD->LNG['combo_charset']}</div><div id="backup_charset"></div>
					<div class="caption">{$SOD->LNG['combo_zip']}</div><div id="backup_zip"></div>
					<div class="caption">{$SOD->LNG['combo_comments']}</div>
					<div class="border"><textarea cols="10" rows="3" id="backup_comment"></textarea></div>
					<div class="caption" style="margin-top:12px;">
						<fieldset><legend>{$SOD->LNG['del_legend']}</legend>
						<div class="caption">&nbsp;– {$SOD->LNG['del_date']}</div>
						<div class="caption">&nbsp;– {$SOD->LNG['del_count']}</div>
						</fieldset>
					</div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="caption">{$SOD->LNG['tree']}</div><div id=backup_tree class="zTree"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12">
                
                </div>
                <div class="col-lg-9 col-12">
                    <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_save']}" onclick="sod.showDialog('savejob');z('sj_name').value = sod.combos.backup_db.value;"> <input class="btn btn-success" type="button" value="{$SOD->LNG['btn_exec']}" onclick="sod.runBackup();">
                </div>
            </div>
        </div>
		<div class="container" id="tab_restore" style="display:none;">
	        <div class="row">
	            <div class="col-lg-3 col-12">
	                <div class="caption">{$SOD->LNG['combo_db']}</div><div id="restore_db"></div>
					<div class="caption">{$SOD->LNG['combo_charset']}</div><div id="restore_charset"></div>
					<div class="caption">{$SOD->LNG['combo_file']}</div><div id="restore_file"></div>
					<div class="caption">{$SOD->LNG['combo_comments']}</div>
					<div class="border"><textarea cols="10" rows="3" id="restore_comment" readonly></textarea></div>
					<div class="caption">{$SOD->LNG['combo_strategy']}</div><div id="restore_type"></div>
					<div class="caption" style="margin-top:17px;">
						<fieldset><legend>{$SOD->LNG['ext_legend']}</legend>
						<div class="caption"><label><input type="checkbox" id="correct"> {$SOD->LNG['correct']}</label></div>
						<div class="caption"><label><input type="checkbox" id="autoinc"> {$SOD->LNG['autoinc']}</label></div>
						</fieldset>
					</div>
	            </div>
	            <div class="col-lg-9 col-12">
	                <div class="caption">{$SOD->LNG['tree']}</div><div id=restore_tree class="zTree"></div>
	            </div>
	        </div>
	        <div class="row">
                <div class="col-lg-3 col-12">
                
                </div>
                <div class="col-lg-9 col-12">
                    <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_save']}" onclick="sod.showDialog('savejob');z('sj_name').value = sod.combos.restore_db.value;" id=restore_savejob> <input class="btn btn-success" type="button" value="{$SOD->LNG['btn_exec']}" onclick="sod.runRestore();" id=restore_runjob>
                </div>
            </div>
	    </div>
	    <div class="container" id="tab_log" style="display:none;">
	        <div class="row">
	            <div class="col-lg-12 col-12">
	                <div id=sodGrid1></div> 
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-12 col-12">
	                <table class=progress>
                        <tr><td>{$SOD->LNG['status_current']}</td><td><div id="sodProc1"></div></td><td width=60>{$SOD->LNG['time_elapsed']}</td><td width=40 align=right id="sodTime1">00:00</td></tr>
                        <tr><td>{$SOD->LNG['status_total']}</td><td><div id="sodProc2"></div></td><td>{$SOD->LNG['time_left']}</td><td align=right id="sodTime2">00:00</td></tr>
                    </table>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-3 col-12">
	                <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_clear']}" onclick="sod.log.clear();">
	            </div>
	            <div class="col-lg-9 col-12">
	                <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_download']}" id="btn_down" onclick="sod.runFiles('download', this.file);" style="display:none;">
                    <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_again']}" id="btn_again" onclick="sod.runAgain();" disabled>
                    <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_stop']}" id="btn_stop" onclick="sod.stopJob();" disabled>
                    <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_pause']}" id="btn_pause" onclick="sod.pauseJob();" disabled>
                    <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_resume']}" id="btn_resume" onclick="sod.resumeJob();" style="display:none;">
	            </div>
	        </div>
	    </div>
	    <div class="container" id="tab_result" style="display:none;">
	        <div class="row">
	            <div class="col-lg-12 col-12">
	                <div id=sodGrid3></div> 
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-12 col-12">
	                <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_clear']}" onclick="sod.result.clear();">
	            </div>
	        </div>
	    </div>
	    <div class="container" id="tab_files" style="display:none;">
	        <div class="row">
	            <div class="col-lg-12 col-12">
	                <div id=sodGrid2></div> 
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-3 col-12">
	                <form id="save_file" method="GET" style="visibility:hidden;display:inline;" target=save></form><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_delete']}" onclick="sod.runFiles('delete')">
	            </div>
	            <div class="col-lg-9 col-12">
	                <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_download']}" onclick="sod.runFiles('download')">
			        <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_open']}" onclick="sod.runFiles('open')">
                </div>
	        </div>
	    </div>
		
		<table cellspacing="0" id="tab_services" style="display:none;">
			<tr>
				<td valign="top">
					<div class="caption">{$SOD->LNG['combo_db']}</div><div id="services_db"></div>
					<br>
					<div class="caption">{$SOD->LNG['opt_check']}</div><div id="services_check"></div>
					<div class="caption">{$SOD->LNG['opt_repair']}</div><div id="services_repair"></div>
				</td>
				<td valign="top">
					<div class="caption">{$SOD->LNG['tree']}</div><div id=services_tree class="zTree"></div>
				</td>
			</tr>
			<tr><td align="right" colspan=2><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_delete_db']}" onclick="sod.runServices('delete')" style="float:left;"> <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_check']}" onclick="sod.runServices('check')"> <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_repair']}" onclick="sod.runServices('repair')"> <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_analyze']}" onclick="sod.runServices('analyze')">  <input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_optimize']}" onclick="sod.runServices('optimize')"></td></tr>
		</table>
		<table cellspacing="0" id="tab_options" style="display:none;">
			<tr>
				<td valign="top" colspan=2>
					<div style="height: 341px;">
					<fieldset>
					<legend>{$SOD->LNG['cfg_legend']}</legend>
						<table cellspacing="0">
							<tr>
								<td width=190>{$SOD->LNG['cfg_time_web']}</td>
								<td width=45><input type="text" id="time_web" style="width:40px;"></td>
								<td align="right">{$SOD->LNG['cfg_time_cron']}</td>
								<td width=40 align="right"><input type="text" id="time_cron" style="width:40px;"></td>
							</tr>
							<tr>
								<td>{$SOD->LNG['cfg_backup_path']}</td>
								<td colspan=3><input type="text" id="backup_path" style="width:351px;"></td>
							</tr>
							<tr>
								<td>{$SOD->LNG['cfg_backup_url']}</td>
								<td colspan=3><input type="text" id="backup_url" style="width:351px;"></td>
							</tr>
							<tr>
								<td>{$SOD->LNG['cfg_globstat']}</td>
								<td colspan=3><input type="checkbox" id="globstat" value="1"></td>
							</tr>
						</table>
					</fieldset>
					<fieldset>
					<legend>{$SOD->LNG['cfg_confirm']}</legend>
						<table cellspacing="0">
							<tr>
								<td width="33%"><label><input type="checkbox" id="conf_import" value="1"> {$SOD->LNG['cfg_conf_import']}</label></td>
								<td width="34%"><label><input type="checkbox" id="conf_file" value="1"> {$SOD->LNG['cfg_conf_file']}</label></td>
								<td width="33%"><label><input type="checkbox" id="conf_db" value="1"> {$SOD->LNG['cfg_conf_db']}</label></td>
							</tr>
						</table>
					</fieldset>
					<fieldset>
					<legend>{$SOD->LNG['cfg_extended']}</legend>
						<table cellspacing="0">
							<tr>
								<td width=190>{$SOD->LNG['cfg_charsets']}</td>
								<td><input type="text" id="charsets" value="" style="width:351px;"></td>
							</tr>
							<tr>
								<td>{$SOD->LNG['cfg_only_create']}</td>
								<td><input type="text" id="only_create" value="" style="width:351px;"></td>
							</tr>
							<tr>
								<td>{$SOD->LNG['cfg_auth']}</td>
								<td><input type="text" id="auth" value="" style="width:351px;"></td>
							</tr>
						</table>
					</fieldset>
					</div>
				</td>
			</tr>
			<tr><td align="right" colspan=2><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_save']}" onclick="sod.saveOptions();"></td></tr>
		</table>
	</div>
</div>

<div id="overlay"></div>
<div class="dialog" id ="dia_connect">
	<div class="header">{$SOD->LNG['con_header']}</div>
	<div class="content">
		<table cellspacing="5">
			<tr>
				<td valign="top">
				<fieldset>
				<legend>{$SOD->LNG['connect']}</legend>
					<table cellspacing="3">
						<tr>
							<td width="80">{$SOD->LNG['my_host']}</td>
							<td width="126"><input type="text" id="con_host" style="width:120px;"></td>
							<td width="40" align="right">{$SOD->LNG['my_port']}</td>
							<td width="36"><input type="text" id="con_port" maxlength="5" style="width:30px;"></td>
						</tr>
						<tr>
							<td>{$SOD->LNG['my_user']}</td>
							<td colspan="3"><input type="text" id="con_user" name="user" style="width:202px;"></td>
						</tr>
						<tr>
							<td>{$SOD->LNG['my_pass']}</td>
							<td colspan="3"><input type="password" id="con_pass" name="pass" title="{$SOD->LNG['my_pass_hidden']}" style="width:202px;" onchange="this.changed = true;"></td>
						</tr>
						<tr>
							<td></td>
							<td colspan="3"><label><input type="checkbox" id="con_comp" value="1"> {$SOD->LNG['my_comp']}</label></td>
						</tr>
						<tr>
							<td>{$SOD->LNG['my_db']}</td>
							<td colspan="3"><input type="text" id="con_db" style="width:202px;"></td>
						</tr>
					</table></fieldset>
				</td>
			</tr>
			<tr class="buttons"><td align="right"><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_save']}" onclick="sod.saveConnect();"><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_cancel']}" onclick="sod.hideDialog('connect');"></td></tr>
		</table>
	</div>
</div>
<div class="dialog" id ="dia_savejob">
	<div class="header">{$SOD->LNG['sj_header']}</div>
	<div class="content">
		<table cellspacing="5">
			<tr>
				<td valign="top">
				<fieldset>
				<legend>{$SOD->LNG['sj_job']}</legend>
					<table cellspacing="3">
						<tr>
							<td width="80">{$SOD->LNG['sj_name']}</td>
							<td><input type="text" id="sj_name" style="width:202px;" maxlength="12" value=""></td>
						</tr>
						<tr>
							<td>{$SOD->LNG['sj_title']}</td>
							<td><input type="text" id="sj_title" maxlength="64" style="width:202px;"></td>
						</tr>
					</table></fieldset>
				</td>
			</tr>
			<tr class="buttons"><td align="right"><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_save']}" onclick="sod.saveJob();"><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_cancel']}" onclick="sod.hideDialog('savejob');"></td></tr>
		</table>
	</div>
</div>
<div class=dialog id="dia_createdb">
	<div class="header">{$SOD->LNG['cdb_header']}</div>
	<div class="content">
		<table cellspacing="5">
			<tr>
				<td valign="top">
				<fieldset>
				<legend>{$SOD->LNG['cdb_detail']}</legend>
					<table cellspacing="3">
						<tr>
							<td width="80">{$SOD->LNG['cdb_name']}</td>
							<td width="202"><input type="text" id="db_name" value="my_db_1" style="width:202px;"></td>
						</tr>
						<tr>
							<td>{$SOD->LNG['combo_charset']}</td>
							<td><div id="db_charset"></div></td>
						</tr>
						<tr>
							<td>{$SOD->LNG['combo_collate']}</td>
							<td><div id="db_charset_col"></div></td>
						</tr>
					</table>
				</fieldset>
				</td>
			</tr>
			<tr class="buttons"><td align="right"><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_create']}" onclick="sod.addDb();"><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_cancel']}" onclick="sod.hideDialog('createdb');"></td></tr>
		</table>
	</div>
</div>

<div id=sodMenu style="display:none;z-index:9999;"></div>
<script type="text/javascript">
sod.init();
sod.backupUrl = '{$SOD->CFG['backup_url']}';
sod.tbar.init('sodToolbar', {$SOD->VAR['toolbar']}); 
{$SOD->VAR['combos']}
sod.actions.tab_backup();
</script>
</body>
</html>
HTML;
}

function sod_tpl_auth($error = '')
{
    global $SOD;

    return <<<HTML
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>{$SOD->name}</title>
<link rel="shortcut icon" href="load.php?favicon.v100.ico">
<link rel="stylesheet" type="text/css" href="load.php?styles.v119.css">
</head>
<body>
<div class="dialog" id="dia_auth">
	<div class="header"><a href="https://sequel.one/">sOneDumper</a></div>
	<div class="content" id="div_1" style="line-height:50px;text-align:center;">{$SOD->LNG['js_required']}</div>
	<div class="content" id="div_2" style="display:none;">
		<form method="post">
		<table cellspacing="5">
			<tr>
				<td valign="top" colspan="3">
				<fieldset>
				<legend>{$SOD->LNG['auth']}</legend>
					<table cellspacing="3">
						<tr>
							<td width="90">{$SOD->LNG['auth_user']}</td>
							<td width="192"><input type="text" name="user" value="{$_POST['user']}" class="i202"></td>
						</tr>
						<tr>
							<td>{$SOD->LNG['my_pass']}</td>
							<td><input type="password" name="pass" value="{$_POST['pass']}" class="i202"></td>
						</tr>
						<tr>
							<td></td>
							<td><label><input type="checkbox" name="save" value="1"{$_POST['save']}> {$SOD->LNG['auth_remember']}</label></td>
						</tr>
						<tr>
							<td>Language:</td>
							<td><select type="text" name="lang" style="width:198px;" onChange="this.form.submit();">{$SOD->lng_list}</select></td>
						</tr>
					</table>
					<table cellspacing="3" id="hst" style="display:none;">
						<tr>
							<td width="90">{$SOD->LNG['my_host']}</td>
							<td width="116"><input type="text" name="host" style="width:110px;" value="{$_POST['host']}"></td>
							<td width="40" align="right">{$SOD->LNG['my_port']}</td>
							<td width="36"><input type="text" name="port" maxlength="5" style="width:30px;" value="{$_POST['port']}"></td>
						</tr>
					</table>
				</fieldset>
				</td>
			</tr>
			<tr class="buttons"><td align="left"><input class="btn btn-primary" type="button" value="{$SOD->LNG['btn_details']}" onclick="var s = document.getElementById('hst').style; s.display = (s.display == 'block') ? 'none' : 'block';"></td><td align="right"><input class="btn btn-primary" type="submit" value="{$SOD->LNG['btn_enter']}"></td></tr>
		</table>
		</form>
	</div>
	<script type="text/javascript">document.getElementById('div_1').style.display = 'none';document.getElementById('div_2').style.display = 'block';</script>
</div>
</body>
</html>
HTML;
}
