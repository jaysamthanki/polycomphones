<h1>Poly Phones</h1>
<p>Welcome to the Poly phones module. If this is your first time here, follow the steps below to get started.</p>
<ol>
    <li>
        Click On General Settings first. Ensure the extension length is correct for your organization. Set the 
        default device usernames and passwords to something non standard so that the phones do not complain about this.
    </li>
    <li>
        Click on Networks, and edit the default network. Use this screen to define what the devices will get when they
        first, and consequently, boot up with. We recommend that you set a password on the provisioning as we have noticed
        that robots will try and infiltrate your setup and gain access to your pbx by using dummy mac addresses. You can use the "Update Settings"
        section to move to another pbx in the future. Ensure the registration address and port are correct for your deployment. Phones that register to 
        this module from the Network CIDR will use the settings defined on the section, so you can use this to have customized setting for 
        where the phone is coming from.
    </li>
    <li>
        Finally, edit the configuration on a phone to pull configuration from http(s)://(your server ip or hostname)/polycom
        Remember to tell the phone to use the username and password you set in the network settings. If you have this correct, your 
        phones will automatically show up in the phones list.
    </li>
</ol>
