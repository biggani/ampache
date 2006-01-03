<?php
/*

 Copyright (c) 2001 - 2006 Ampache.org
 All rights reserved.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/
$htmllang = str_replace("_","-",conf('lang'));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $htmllang; ?>" lang="<?php echo $htmllang; ?>">
<head>
<link rel="shortcut icon" href="<?php echo conf('web_path'); ?>/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo conf('site_charset'); ?>" />
<?php show_template('style'); ?>
<title><?php echo conf('site_title'); ?> - <?php echo $location['title']; ?></title>
</head>
<body>
<script src="<?php echo conf('web_path'); ?>/lib/general.js" language="javascript" type="text/javascript"></script>

<div id="maincontainer">
<!-- This is the topbar row -->
<div id="topbar">
	<div id="topbarleft">
	<a href="http://www.ampache.org">
        <img class="pageheader" src="<?php echo conf('web_path'); ?><?php echo conf('theme_path'); ?>/images/ampache.gif" border="0" title="Ampache: For the love of music" alt="Ampache: For the love of music" />
	</a>
	</div>
</div>
<br /><br />
<?php

$action = scrub_in($_REQUEST['action']);
$fullname = scrub_in($_REQUEST['fullname']);
$username = scrub_in($_REQUEST['username']);
$email = scrub_in($_REQUEST['email']);
?>

<div align="center">
<form name="update_user" method="post" action="<?php echo conf('web_path'); ?>/register.php" enctype="multipart/form-data">
    <table class="border" width='700' cellpadding='0' cellspacing='0' border='0'>
    	<tr class="table-header">
    		<td>
    			<font size="2"><b><u><?php echo _("Ampache New User Registration"); ?></u></b></font>
    		</td>
    	</tr>
	<?php
	/*  If we should show the user agreement */
	if(conf('user_agreement')){ ?>
    	<tr>
    		<td height='15' bgcolor="<?php print conf('base_color2'); ?>">
    		</td>
    	</tr>
	<tr>
		<td bgcolor="<?php print conf('base_color2'); ?>" align='center' valign='top'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0'>
				<tr class="table-header">
					<td align='center'>
						<font size="1"><b><u><?php echo _('User Agreement'); ?></u></b></font>
					</td>
				</tr>
				<tr>
					<td>
						<?php show_registration_agreement(); ?>
					</td>
				</tr>
				<tr>
					<td align='center' height='35' valign='center'>
						<input type='checkbox' name='accept_agreement'> <?php echo _('I Accept'); ?>
						<?php $GLOBALS['error']->print_error('user_agreement'); ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<? } ?>
	<tr>
		<td height='15' bgcolor="<?php print conf('base_color2'); ?>">
		</td>
	</tr>
	<tr>
		<td bgcolor="<?php print conf('base_color2'); ?>" align="center" valign="top">
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr class="table-header">
					<td align='center'>
						<font size="1"><b><u><?php echo _('User Information'); ?></u></b></font>
					</td>
				</tr>
			</table>
			<br />
			<table width='99%' cellpadding='0' cellspacing='0' border='0'>
				<tr>
					<td align='right'>
						<?php echo _("Username"); ?>:
					</td>
					<td>
						<font color='red'>*</font> <input type='text' name='username' id='username' value='<?php echo scrub_out($username); ?>' />
						<?php $GLOBALS['error']->print_error('username'); ?>
						<?php $GLOBALS['error']->print_error('duplicate_user'); ?>
					</td>
				</tr>
				<tr>
					<td align='right'>
						<?php echo _("Full Name"); ?>:
					</td>
					<td>
						<font color='red'>*</font> <input type='text' name='fullname' id='fullname' value='<?php echo scrub_out($fullname); ?>' />
						<?php $GLOBALS['error']->print_error('fullname'); ?>
					</td>
				</tr>
				<tr>
					<td align='right'>
						<?php echo _("E-mail"); ?>:
					</td>
					<td>
						<font color='red'>*</font> <input type='text' name='email' id='email' value='<?php echo scrub_out($email); ?>' />
						<?php $GLOBALS['error']->print_error('email'); ?>
					</td>
				</tr>
				<tr>
					<td align='right'>
						<?php echo _("Password"); ?>:
					</td>
					<td>
						<font color='red'>*</font> <input type='password' name='password_1' id='password_1' />
						<?php $GLOBALS['error']->print_error('password'); ?>
					</td>
				</tr>
				<tr>
					<td align='right'>
						<?php echo _("Confirm Password"); ?>:
					</td>
					<td>
						<font color='red'>*</font> <input type='password' name='password_2' id='password_2' />
					</td>
				</tr>
				<?php if (conf('captcha_public_reg')) { ?>
				<tr>
						<?php echo captcha::form(); ?>
						<?php $GLOBALS['error']->print_error('captcha'); ?>
				</tr>
				<?php } ?>
				<tr>
					<td colspan='2' bgcolor="<?php print conf('base_color2'); ?>" align='center' height='20'>
						<font color='red'>*</font>Required fields
					</td>
				</tr>
				<tr>
					<td colspan='2' bgcolor="<?php print conf('base_color2'); ?>" align='center' height='50'>
						<input type="hidden" name="action" value="add_user" />
						<input type='reset' name='clear_info' id='clear_info' value='<?php echo _('Clear Info'); ?>' />
						<input type='submit' name='submit_registration' id='submit_registration' value='<?php echo _("Register User"); ?>' />
					</td>
				</tr>
			</table>
		</td>
	 </tr>
  </table>
</form>
</div>
</div><!--end <div>id="maincontainer-->
</body>
</html>
