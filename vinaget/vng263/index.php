<?php
/*
* Home page: http://vinaget.us
* Blog:	http://blog.vinaget.us
* Script Name: Vinaget 
* Version: 2.6.3
* Description: 
	- Vinaget is script generator premium link that allows you to download files instantly and at the best of your Internet speed.
	- Vinaget is your personal proxy host protecting your real IP to download files hosted on hosters like RapidShare, megaupload, hotfile...
	- You can now download files with full resume support from filehosts using download managers like IDM etc
	- Vinaget is a Free Open Source, supported by a growing community.
* Code LeechViet by VinhNhaTrang
* Developed by ..:: [H] ::..

*/

ob_start();
error_reporting (E_ALL);
ob_implicit_flush (TRUE);
ignore_user_abort (0);
if( !ini_get('safe_mode') ){
            set_time_limit(30);
} 
define('vinaget', 'yes');
include("class.php");
$obj = new stream_get(); 

if ($obj->Deny == false && isset($_POST['urllist'])) $obj->main();
elseif(isset($_GET['infosv'])) $obj->notice();
############################################### Begin Secure ###############################################
elseif($obj->Deny == false) {
	if (!isset($_POST['urllist'])) {
		include ("hosts/hosts.php");
		asort($host);
?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml"><head profile="http://gmpg.org/xfn/11">
		<head>
			<link rel="SHORTCUT ICON" href="images/vngicon.png" type="image/x-icon" />
			<title><?php printf($obj->lang['title'],$obj->lang['version']); ?></title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="keywords" content="<?php printf($obj->lang['version']); ?>, download, get, vinaget, file, generator, premium, link, sharing, bitshare.com, crocko.com, depositfiles.com, extabit.com, filefactory.com, filepost.com, filesmonster.com, freakshare.com, gigasize.com, hotfile.com, jumbofiles.com, letitbit.net, mediafire.com, megashares.com, netload.in, oron.com, rapidgator.net, rapidshare.com, ryushare.com, sendspace.com, share-online.biz, shareflare.net, uploaded.to, uploading.com" />
			<link title="Rapidleech Style" href="rl_style_pm.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
			<script type="text/javascript" language="javascript" src="images/jquery-1.7.1.min.js"></script>
			<script type="text/javascript" src="images/ZeroClipboard.js"></script>
			<script type="text/javascript" language="javascript">
				var title = '<?php echo $obj->title; ?>';
				var colorname = '<?php echo $obj->colorfn; ?>';
				var colorfile = '<?php echo $obj->colorfs; ?>';

				var more_acc ='<?php printf($obj->lang["moreacc"]); ?>';
				var less_acc ='<?php printf($obj->lang["lessacc"]); ?>';
				var d_error ='<?php printf($obj->lang["invalid"]); ?>';
				var d_succ1 ='<?php printf($obj->lang["dsuccess"]); ?>';
				var d_succ2 ='<?php printf($obj->lang["success"]); ?>';
				var get_loading ='<?php printf($obj->lang["getloading"]); ?>';
				var notf ='<?php printf($obj->lang["notfound"]); ?>';
			</script> 
			<!--
			<center><img src="images/logo.png" alt="RapidLeech PlugMod" border="0" /></center><br />
			-->
			<div id="showlistlink" class="showlistlink" align="center">
				<div style="border:1px #ffffff solid; width:960px; padding:5px; margin-top:50px;">
					<div id="listlinks"><textarea style='width:950px;height:400px' id="textarea"></textarea></div>
					<table style='width:950px;'><tr>
					<td width="50%" vAlign="left" align="left">	
					<input type='button' value="bbcode" onclick="return bbcode('list');" />
					<input type='button' id ='SelectAll' value="Select All"/>
					<input type='button' id="copytext" value="Copy To Clipboard"/>
					
					</td>
					<td id="report"  width="50%" align="center"></td>
					</tr></table>
				</div>
				<div style="width:120px; padding:5px; margin:2px;border:1px #ffffff solid;">
					<a onclick="return makelist(document.getElementById('showresults').innerHTML);" href="javascript:void(0)" style='TEXT-DECORATION: none'><font color=#FF6600>Click to close</font></a>
				</div>
			</div>
			<table align="center"><tbody>
				<tr>
				<!-- ########################## Begin Plugins ########################## -->
				<td valign="top">
					<table width="100%"  border="0">
						<tr><td valign="top">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr><td width="140" height="100%"><div class="cell-plugin"><?php printf($obj->lang['plugins']); ?></div></td></tr>
								<tr><td><div align="center" class="plugincolhd"><b><small><?php echo count($host);?></small></b> <?php printf($obj->lang['plugins']); ?></div></td></tr>
								<tr><td height="100%" style="padding:3px;">
									<div dir="rtl" align="left" style="overflow-y:scroll; height:150px; padding-left:5px;">
									<?php
										foreach ($host as $file => $site){
											$site = substr($site,0,-4);
											$site = str_replace("_",".",$site) ;
											echo "<span class='plugincollst'>" .$site."</span><br />";
										}
									?>
									</div><br />
									<div class="cell-plugin"><?php printf($obj->lang['premium']); ?></div>
									<table border="0">
										<tr><td height="100%" style="padding:3px;">
											<div dir="rtl" align="left" style="padding-left:5px;">
												<?php $obj->showplugin(); ?>
											</div>
										</td></tr>
									</table><br />
								</td></tr>
							</table>
						</td></tr>
					</table>
				</td>
				<!-- ########################## End Plugins ########################## -->
				<!-- ########################## Begin Main ########################### -->
				<td align="center" valign="top">
					<table border="0" cellpadding="0" cellspacing="1"><tbody>
						<tr>
							<td class="cell-nav"><a class="ServerFiles" href="./"><?php printf($obj->lang['main']); ?></a></td>
							<td class="cell-nav"><a class="ServerFiles" href="./?id=donate"><?php printf($obj->lang['donate']); ?></a></td>
							<td class="cell-nav"><a class="ServerFiles" href="./?id=listfile"><?php printf($obj->lang['listfile']); ?></a></td>
							<td class="cell-nav"><a class="ServerFiles" href="./?id=check"><?php printf($obj->lang['check']); ?></a></td>
							<?php if ($obj->Secure == true) 
							echo '<td class="cell-nav"><a class="ServerFiles" href="./login.php?go=logout"> '.$obj->lang['log'].'</a></td>'; ?>
						</tr>
					</tbody></table>
					<table id="tb_content"><tbody>
						<tr><td height="5px"></td></tr>
						<tr><td align="center">
<?php 
						#---------------------------- begin list file ----------------------------#
						if ((isset($_GET['id']) && $_GET['id']=='listfile') || isset($_POST['listfile']) || isset($_POST['option']) || isset($_POST['renn']) || isset($_POST['remove']))  {
							if($obj->listfile==true)$obj->fulllist();
							else echo "<BR><BR><font color=red size=2>".$obj->lang['notaccess']."</b></font>";
						}
						#---------------------------- end list file ----------------------------#

						#---------------------------- begin donate  ----------------------------#
						else if (isset($_GET['id']) && $_GET['id']=='donate') { 
?>
							<div align="center">
								<div id="wait"><?php printf($obj->lang['donations']); ?></div><BR>
								<form action="javascript:donate(document.getElementById('donateform'));" name="donateform" id="donateform">
									<table>
										<tr>
											<td>
												<?php printf($obj->lang['acctype']); ?> 
												<select name='type' id='type'>
													<option value="bitshare">bitshare.com</option>
													<option value="rapidshare">rapidshare.com</option>
													<option value="hotfile">hotfile.com</option>
													<option value="depositfiles">depositfiles.com</option>
													<option value="oron">oron.com</option>
													<option value="uploading">uploading.com</option>
													<option value="uploaded">uploaded.to</option>
												</select>
											</td>
											<td>
												&nbsp; &nbsp; &nbsp; <input type="text" name="accounts" id="accounts" value="" size="50" maxlength="50"><br />
											</td>
											<td>&nbsp; &nbsp; &nbsp; <input type=submit value="<?php printf($obj->lang['sbdonate']); ?>">
											</td>
										</tr>
									</table>
								</form>
								<div id="check"><font color=#FF6600>user:pass</font> or <font color=#FF6600>cookie</font></div>
							</div>
<?php					
						}
						#---------------------------- end donate  ----------------------------#

						#---------------------------- begin check  ---------------------------#
						else if (isset($_GET['id']) && $_GET['id']=='check'){
							if($obj->checkacc==true) include("checkaccount.php");
							else echo "<BR><BR><font color=red size=2>".$obj->lang['notaccess']."</b></font>";
						}
						#---------------------------- end check  ------------------------------#

						#---------------------------- begin get  ------------------------------#
						else {
?>
							<form action="javascript:get(document.getElementById('linkform'));" name="linkform" id="linkform">
								<?php printf($obj->lang['welcome'],$obj->lang['homepage']); ?><br/><font face=Arial size=1><?php printf($obj->lang['maxline']); ?></font><BR>
								<textarea id='links' style='width:550px;height:100px;' name='links'></textarea><BR>
								<?php printf($obj->lang['example']); ?><BR>
								<input type="submit"  id ='submit' value='<?php printf($obj->lang['sbdown']); ?>'/>&nbsp;&nbsp;&nbsp;
								<input type="button" onclick="reseturl();return false;" value="Reset">&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="autoreset" id="autoreset" checked>&nbsp;Auto reset&nbsp;&nbsp;&nbsp;
							</form><BR><BR>
							<div id="dlhere" align="left" style="display: none;">
								<BR><hr /><small style="color:#55bbff"><?php printf($obj->lang['dlhere']); ?></small>
								<div align="right"><a onclick="return bbcode('bbcode');" href="javascript:void(0)" style='TEXT-DECORATION: none'><font color=#FF6600>BB code</font></a>&nbsp;&nbsp;&nbsp;
								<a onclick="return makelist(document.getElementById('showresults').innerHTML);" href="javascript:void(0)" style='TEXT-DECORATION: none'><font color=#FF6600>Make List</font></a></div>
							</div>
							<div id="bbcode" align="center" style="display: none;"></div>
							<div id="showresults" align="center"></div>
<?php						
						}
						#---------------------------- end get  ------------------------------#
?>
						</td></tr>
					</tbody></table>
				</td></tr>
				<!-- ########################## End Main ########################### -->
			</tbody></table>

			<table width="60%" align="center" cellpadding="0" cellspacing="0">
				<tr><td>
					<div align="center" style="color:#ccc">
						<!-- Start Server Info -->
							<hr />
						<div id="server_stats">
							<?php echo $obj->notice();?>
						</div>
						<!-- End Server Info -->
						<hr />
						
						<script type="text/javascript" language="javascript" src="ajax.js?ver=1.0"></script> 
					<!-- Copyright please don't remove-->
						<SPAN class='powered'>Code LeechViet. Developed by ..:: [H] ::..<br/><a href='http://vinaget.us/'>Powered by <?php printf($obj->lang['version']); ?></a></SPAN><br/>
						<SPAN class='copyright'>Copyright 2009-<?php echo date('Y');?> by <a href='http://vinaget.us/'>http://vinaget.us</a>. All rights reserved. </SPAN><br />
					<!-- Copyright please don't remove-->	
					</div>
				</td></tr>
			</table>
		</body>
	</html>

<?php
	} #(!$_POST['urllist'])
} 
############################################### End Secure ###############################################
else {
?>
	<html>
	<head>
		<meta http-equiv="Content-Language" content="en-us">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="SHORTCUT ICON" href="images/vngicon.png" type="image/x-icon" />
		<meta name="keywords" content="<?php printf($obj->lang['version']); ?>, download, get, vinaget, file, generator, premium, link, sharing, bitshare.com, crocko.com, depositfiles.com, extabit.com, filefactory.com, filepost.com, filesmonster.com, freakshare.com, gigasize.com, hotfile.com, jumbofiles.com, letitbit.net, mediafire.com, megashares.com, netload.in, oron.com, rapidgator.net, rapidshare.com, ryushare.com, sendspace.com, share-online.biz, shareflare.net, uploaded.to, uploading.com" />
		<title><?php printf($obj->lang['title'],$obj->lang['version']); ?></title>
		<style>
		body {
			background: #000000 repeat-x;
			font: 75%/170% Arial, Helvetica, sans-serif;
			padding: 0px;
			margin: 0px;
			color: #333333;
		}
		a { color: #55aaff; }
		.login {
			color: #FFFFFF;
			font-weight:bold;
			font-family: Arial;
		}
		.pass {
			color: #CCCCCC;
			font-weight:bold;
			font-family: Bookman Old Style;
		}
		.powered {
			font-family: Arial;
			color: #FF8700;
			font-size: 10px;
			line-height: 14px;
			font-weight:bold;
		}
		.copyright {
			font-family: Arial;
			line-height: 14px;
			color: #CCCCCC;
			font-size: 10px;
			font-weight:bold;
		}
		.copyright a {
			color: red;
			TEXT-DECORATION: none;
		}
		</style>
	</head>
	<body>
		<p align="center"><br/>
		<code><span style="color: #FF3300; FONT-SIZE: 14px"><B>
			::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::<BR>
			::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::<BR>
			::HHHHHH::::::HHHHHH::HHHHHH::::HHHH::::::::::HHHH::::::HHHHHHHHHH::::::::::::HHHHHHHHHHHH::::::HHHHHHHHHHHHHH::HHHHHHHHHHHHHHHHHH::<BR>
			::HHHHHH::::::HHHHHH::HHHHHH::::HHHHHH::::::::HHHH::::::HHHHHHHHHH::::::::::HHHHHHHHHHHHHHHH::::HHHHHHHHHHHHHH::HHHHHHHHHHHHHHHHHH::<BR>
			::::HHHHHH::HHHHHH::::HHHHHH::::HHHHHHHH::::::HHHH::::HHHHHHHHHHHHHH::::::HHHHHHHH::::HHHHHH::::HHHHHH::::::::::::::::HHHHHH::::::::<BR>
			::::HHHHHH::HHHHHH::::HHHHHH::::HHHHHHHHHH::::HHHH::::HHHHHH::HHHHHH::::::HHHHHH::::::::::::::::HHHHHH::::::::::::::::HHHHHH::::::::<BR>
			::::HHHHHH::HHHHHH::::HHHHHH::::HHHH::HHHHHH::HHHH::::HHHHHH::HHHHHH::::::HHHHHH::::HHHHHHHH::::HHHHHHHHHHHHHH::::::::HHHHHH::::::::<BR>
			::::::HHHH::HHHH::::::HHHHHH::::HHHH::HHHHHH::HHHH::::HHHHHH::HHHHHH::::::HHHHHH::::HHHHHHHH::::HHHHHHHHHHHHHH::::::::HHHHHH::::::::<BR>
			::::::HHHH::HHHH::::::HHHHHH::::HHHH::::HHHHHHHHHH::::HHHHHHHHHHHHHH::::::HHHHHH::::::HHHHHH::::HHHHHH::::::::::::::::HHHHHH::::::::<BR>
			::::::HHHHHHHHHH::::::HHHHHH::::HHHH::::::HHHHHHHH::HHHHHHHHHHHHHHHHHH::::HHHHHHHH::::HHHHHH::::HHHHHH::::::::::::::::HHHHHH::::::::<BR>
			::::::::HHHHHH::::::::HHHHHH::::HHHH::::::::HHHHHH::HHHHHH::::::HHHHHH::::::HHHHHHHHHHHHHHHH::::HHHHHHHHHHHHHH::::::::HHHHHH::::::::<BR>
			::::::::HHHHHH::::::::HHHHHH::::HHHH::::::::::HHHH::HHHHHH::::::HHHHHH::::::::HHHHHHHHHH::::::::HHHHHHHHHHHHHH::::::::HHHHHH::::::::<BR>
			::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::<BR>
			::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::<BR>
			</B><BR></span>
		</code>
		<div align="center">
			<form method="POST" action="login.php">
				<span class='login'><?php printf($obj->lang['login']); ?></span>
				<table border="0" width="500" height="32">
					<tr>
						<td height="28" width="108"><span class='pass'><?php printf($obj->lang['password']); ?></span></td>
						<td height="28" width="316"><input type="password" name="secure" size="44"></td>
						<td height="28" width="56"><input type="submit" value="Submit" name="submit"></td>
					</tr>
				</table>
			</form>
			<br/>
		<!-- Copyright please don't remove-->
			<STRONG><SPAN class='powered'>Code LeechViet. Developed by ..:: [H] ::..<br/><a href='http://vinaget.us/'>Powered by <?php printf($obj->lang['version']); ?></a></SPAN><br/>
			<SPAN class='copyright'>Copyright 2009-<?php echo date('Y');?> by <a href='http://vinaget.us/'>http://vinaget.us</a>. All rights reserved. </SPAN><br />
		<!-- Copyright please don't remove-->	
		</div>
	</body>
	</html>
<?php
}
ob_end_flush();
?>