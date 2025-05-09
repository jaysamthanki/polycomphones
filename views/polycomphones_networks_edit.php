<h2><?php echo empty($_GET['edit']) ? 'Add' : 'Edit'; ?> Network</h2>
<hr />

<script type="text/javascript">
$(function(){
	$('input[name="cidr"]').keyup(function() {
		$(this).removeClass("duplicate-exten");
		$(this).next("span").css("display", "none");
		var inputVal = $(this).val();
		var characterReg = /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])(\/(\d|[1-2]\d|3[0-2]))$/;
		if(!characterReg.test(inputVal)) {
			$(this).addClass("duplicate-exten");
			$(this).next("span").css("display", "");
		}
	});
	
	$("form").submit(function( event ) {
		if($('input[name="cidr"]').hasClass("duplicate-exten")) {
			event.preventDefault();
		}
	});
});
</script>

<form name="polycomphones_networks_edit" method="post" action="config.php?type=setup&display=polycomphones&polycomphones_form=networks_edit&edit=<?php echo $_GET['edit'];?>">
<table>
<tbody>	
	<tr><td colspan="2"><h5><?php echo _("Network")?><hr/></h5></td></tr>	
	<tr>
		<td width="195"><?php echo _("Name")?></td>
		<td><?php echo form_input('name', $network['name']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Network CIDR")?><span class="help">?<span style="display: none;">The CIDR network address to match for connecting phones. Example: 10.0.0.0/8</span></span></td>
		<?php if($_GET['edit'] == '-1') { ?>
		<td><?php echo $network['cidr'] ?><input type="hidden" name="cidr" value="<?php echo $network['cidr'] ?>"></td>
		<?php } else { ?>
		<td>
			<?php echo form_input('cidr', $network['cidr']); ?>
			<span style="display: none"><a href="#" title="Invalid CIDR network address">
				<img src="images/notify_critical.png" />
			</a></span>
		</td>
		<?php } ?>
	</tr>
	
	<tr><td colspan="2"><h5><?php echo _("Provisioning")?><hr/></h5></td></tr>
	<tr>
		<td><?php echo _("Require SSL")?><span class="help">?<span style="display: none;">If 'Enabled', an HTTPS url must be used for phone provisioning. DHCP or phone provisioning server settings must be configured to match.<br />DHCP Option 160: https://voip.domain.com/polycom/</span></span></td>
		<td><?php echo form_dropdown('prov_ssl', polycomphones_dropdown('disabled_enabled'), $network['settings']['prov_ssl']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Username")?><span class="help">?<span style="display: none;">If a username is provided authentication will be required for phone provisioning. DHCP or phone provisioning server settings must be configured to match. Multiple usernames to be accepted should be delimited by |.<br />DHCP Option 160: http://username:password@voip.domain.com/polycom/<br />Default: PlcmSpIp</span></span></td>
		<td><?php echo form_input('prov_username', $network['settings']['prov_username']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Password")?><span class="help">?<span style="display: none;">Password to use in combination with the username. Multiple passwords to be accepted should be delimited by |.<br />Default: PlcmSpIp</span></span></td>
		<td><?php echo form_input('prov_password', $network['settings']['prov_password']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Allow Uploads")?><span class="help">?<span style="display: none;">If 'Enabled', the phone will be allowed to upload logs, overrides, and the contact directory.</span></span></td>
		<td><?php echo form_dropdown('prov_uploads', polycomphones_dropdown('disabled_enabled'), $network['settings']['prov_uploads']); ?></td>
	</tr>
	
	<tr><td colspan="2"><h5><?php echo _("Update Settings")?><hr/></h5></td></tr>
	<tr>
		<td><?php echo _("Boot Server")?><span class="help">?<span style="display: none;">If selected the DHCP option for provisioning will be updated on the phone.</span></span></td>
		<td><?php echo form_dropdown('device_dhcp_bootSrvUseOpt', polycomphones_dropdown('device_dhcp_bootSrvUseOpt', true, ''), $network['settings']['device_dhcp_bootSrvUseOpt']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Boot Server Opt")?><span class="help">?<span style="display: none;">If provided the numeric DHCP option for provisioning will be updated on the phone.<br />Example: 160</span></span></td>
		<td><?php echo form_input('device_dhcp_bootSrvOpt', $network['settings']['device_dhcp_bootSrvOpt']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Provisioning Server Type")?><span class="help">?<span style="display: none;">If selected the server type for provisioning will be update on the phone.</span></span></td>
		<td><?php echo form_dropdown('device_prov_serverType', polycomphones_dropdown('protocol', true, ''), $network['settings']['device_prov_serverType']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Provisioning Server Name")?><span class="help">?<span style="display: none;">If provided the server name for provisioning will be updated on the phone.<br />Example: voip.domain.com/polycom</span></span></td>
		<td><?php echo form_input('device_prov_serverName', $network['settings']['device_prov_serverName']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Provisioning Username")?><span class="help">?<span style="display: none;">If provided the user name for provisioning will be updated on the phone.</span></span></td>
		<td><?php echo form_input('device_prov_user', $network['settings']['device_prov_user']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Provisioning Password")?><span class="help">?<span style="display: none;">If provided the password for provisioning will be updated on the phone.</span></span></td>
		<td><?php echo form_input('device_prov_password', $network['settings']['device_prov_password']); ?></td>
	</tr>
	
	<tr><td colspan="2"><h5><?php echo _("Options")?><hr/></h5></td></tr>	
	<tr>
		<td><?php echo _("Registration Address")?>*<span class="help">?<span style="display: none;">FreePBX server IP or hostname. Example: voip.domain.com</span></span></td>
		<td><?php echo form_input('address', $network['settings']['address']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Registration Port")?>*<span class="help">?<span style="display: none;">FreePBX server SIP port. Example: 5060</span></span></td>
		<td><?php echo form_input('port', $network['settings']['port'], 'size="10"'); ?></td>
	</tr>
	<?php
	if ($kamailio_module) {
	?>		
	<tr>
		<td><?php echo _("Kamailio Address")?>*<span class="help">?<span style="display: none;">Kamailio server IP or hostname. Example: sbc.domain.com</span></span></td>
		<td><?php echo form_input('kamailio_address', $network['settings']['kamailio_address']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("Kamailio Port")?>*<span class="help">?<span style="display: none;">Kamailio server SIP port. Example: 5060</span></span></td>
		<td><?php echo form_input('kamailio_port', $network['settings']['kamailio_port'], 'size="10"'); ?></td>
	</tr>
	<?php
	} else { 
	?>
	<input type="hidden" name="kamailio_address" value="">
	<input type="hidden" name="kamailio_port" value="">
	<?php
	}
	?>
	<tr>
		<td><?php echo _("Registration Expiry")?>*<span class="help">?<span style="display: none;">Sets the requested registration period in seconds. Default: 3600</span></span></td>
		<td><?php echo form_input('expires', $network['settings']['expires'], 'size="10"'); ?></td>
	</tr>
	<tr>
		<td><?php echo _("NAT Keepalive Interval")?><span class="help">?<span style="display: none;">Sets the interval at which phones will send a keep-alive packet to the gateway/NAT device to keep the communication port open.</span></span></td>
		<td><?php echo form_dropdown('nat_keepalive_interval', polycomphones_dropdown('nat_keepalive_interval'),  $network['settings']['nat_keepalive_interval']); ?></td>
	</tr>
	<tr>
		<td><?php echo _("NTP Resync Period")?><span class="help">?<span style="display: none;">The period of time that passes before the phone resynchronizes with the SNTP server.</span></span></td>
		<td><?php echo form_dropdown('tcpIpApp_sntp_resyncPeriod', polycomphones_dropdown('tcpIpApp_sntp_resyncPeriod'), $network['settings']['tcpIpApp_sntp_resyncPeriod']); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("NTP Server")?><span class="help">?<span style="display: none;">Example: pool.ntp.org</span></span></td>
		<td><?php echo form_input('tcpIpApp_sntp_address', $network['settings']['tcpIpApp_sntp_address']); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("NTP Override")?><span class="help">?<span style="display: none;">If 'Disabled', the DHCP values for the NTP server address will be used. If 'Enabled', the configured value will override the DHCP values.</span></span></td>
		<td><?php echo form_dropdown('tcpIpApp_sntp_address_overrideDHCP', polycomphones_dropdown('disabled_enabled'), $network['settings']['tcpIpApp_sntp_address_overrideDHCP']); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("Time Zone")?></td>
		<td><?php echo form_dropdown('tcpIpApp_sntp_gmtOffset', polycomphones_dropdown('tcpIpApp_sntp_gmtOffset', true, ''), $network['settings']['tcpIpApp_sntp_gmtOffset']); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("Time Zone Override")?><span class="help">?<span style="display: none;">If 'Disabled', the DHCP values for the GMT offset will be used. If 'Enabled', the configured value will override the DHCP values.</span></span></td>
		<td><?php echo form_dropdown('tcpIpApp_sntp_gmtOffset_overrideDHCP', polycomphones_dropdown('disabled_enabled'), $network['settings']['tcpIpApp_sntp_gmtOffset_overrideDHCP']); ?></td>	
	</tr>
	
	<tr><td colspan="2"><h5><?php echo _("Codec Priority")?><hr/></h5></td></tr>
	<tr>
		<td><?php echo _("G.711 U-law")?><span class="help">?<span style="display: none;">Default: 6</span></span></td>
		<td><?php echo form_dropdown('voice_codecPref_G711_Mu', polycomphones_dropdown_numbers(0, 27), $network['settings']['voice_codecPref_G711_Mu']); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("G.711 A-law")?><span class="help">?<span style="display: none;">Default: 7</span></span></td>
		<td><?php echo form_dropdown('voice_codecPref_G711_A', polycomphones_dropdown_numbers(0, 27), $network['settings']['voice_codecPref_G711_A']); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("G.722")?><span class="help">?<span style="display: none;">Default: 4</span></span></td>
		<td><?php echo form_dropdown('voice_codecPref_G722', polycomphones_dropdown_numbers(0, 27), $network['settings']['voice_codecPref_G722']); ?></td>	
	</tr>
	<tr>
		<td><?php echo _("G.729 AB")?><span class="help">?<span style="display: none;">Default: 8</span></span></td>
		<td><?php echo form_dropdown('voice_codecPref_G729_AB', polycomphones_dropdown_numbers(0, 27), $network['settings']['voice_codecPref_G729_AB']); ?></td>	
	</tr>
</tbody>
</table>
<br />

<input type="hidden" name="action" value="edit">
<input type="submit" value="<?php echo _("Submit")?>">
</form>