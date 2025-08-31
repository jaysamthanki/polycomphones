<?php
$dir_corp_address = null;
$dir_corp_port = null;
$dir_corp_baseDN = null;
$dir_corp_user = null;
$dir_corp_password = null;
$exchange_server_url = null;
$feature_corporateDirectory_enabled = null;
$feature_exchangeCalendar_enabled = null;

if (isset($general["dir_corp_address"]))
{
  $dir_corp_address = $general["dir_corp_address"];
}

if (isset($general["dir_corp_port"]))
{
  $dir_corp_port = $general["dir_corp_port"];
}

if (isset($general["dir_corp_baseDN"]))
{
  $dir_corp_baseDN = $general["dir_corp_baseDN"];
}

if (isset($general["dir_corp_user"]))
{
  $dir_corp_user = $general["dir_corp_user"];
}

if (isset($general["dir_corp_password"]))
{
  $dir_corp_password = $general["dir_corp_password"];
}

if (isset($general["exchange_server_url"])) $exchange_server_url = $general["exchange_server_url"];
if (isset($general["feature_corporateDirectory_enabled"])) $feature_corporateDirectory_enabled = $general["feature_corporateDirectory_enabled"];
if (isset($general["feature_exchangeCalendar_enabled"])) $feature_exchangeCalendar_enabled = $general["feature_exchangeCalendar_enabled"];
?>
<h2>Corporate Settings</h2>
<hr />

<form name="polycomphones_corporate" method="post" action="config.php?type=setup&display=polycomphones&polycomphones_form=corporate_edit">
<table>		
<tbody>
	<tr><td colspan="2"><h5><?php echo _("Directory Options")?><hr/></h5></td></tr>	
	<tr>
		<td width="175"><?php echo _("Active Directory URL")?>*<span class="help">?<span style="display: none;">Example: ldap://server.domain.com</span></span></td>
		<td><?php echo form_input('dir_corp_address', $dir_corp_address, 'size="40"'); ?></td>	
	</tr>
	<tr>
		<td width="175"><?php echo _("Active Directory Port")?>*<span class="help">?<span style="display: none;">Example: 389</span></span></td>
		<td><?php echo form_input('dir_corp_port', $dir_corp_port, 'size="10"'); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("Base DN")?>*<span class="help">?<span style="display: none;">Example: DC=domain,DC=com</span></span></td>
		<td><?php echo form_input('dir_corp_baseDN', $dir_corp_baseDN, 'size="40"'); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("Username")?>*<span class="help">?<span style="display: none;">Example: username@domain.com</span></span></td>
		<td><?php echo form_input('dir_corp_user', $dir_corp_user); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("Password")?>*</td>
		<td><?php echo form_password('dir_corp_password', $dir_corp_password); ?></td>	
	</tr>
	<tr><td colspan="2"><h5><?php echo _("Exchange Options")?><hr/></h5></td></tr>	
	<tr>
		<td><?php echo _("Exchange Server URL")?>*<span class="help">?<span style="display: none;">Example: https://server.domain.com/EWS/Exchange.asmx</span></span></td>
		<td><?php echo form_input('exchange_server_url', $exchange_server_url, 'size="40"'); ?></td>	
	</tr>
	<tr><td colspan="2"><h5><?php echo _("Default Options")?><hr/></h5></td></tr>	
	<tr>
		<td><?php echo _("Corporate Directory")?></td>
		<td><?php echo form_dropdown('feature_corporateDirectory_enabled', polycomphones_dropdown('disabled_enabled'), $feature_corporateDirectory_enabled); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("Exchange Calendar")?>*</td>
		<td><?php echo form_dropdown('feature_exchangeCalendar_enabled', polycomphones_dropdown('disabled_enabled'), $feature_exchangeCalendar_enabled); ?></td>	
	</tr>
</tbody>
</table>
<br />

<input type="hidden" name="action" value="edit">
<input type="submit" value="<?php echo _("Submit")?>">
</form>
