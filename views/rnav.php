<?php

if (isset($_GET['polycomphones_form'])) 
{
  $polycomphonesForm = $_GET['polycomphones_form'];
} 
else 
{
  $polycomphonesForm = null;
}

$show['Phones'] = '<li><a ' 
	. ($polycomphonesForm == 'phones_list' || $polycomphonesForm == 'phones_edit'
	? 'class="current ui-state-highlight" ' : '') 
	. 'href="config.php?type=setup&display=polycomphones&polycomphones_form=phones_list">' . _("Phones") . '</a></li>';			

$show['External Lines'] = '<li><a ' 
	. ($polycomphonesForm == 'externallines_list' || $polycomphonesForm == 'externallines_edit'
	? 'class="current ui-state-highlight" ' : '') 
	. 'href="config.php?type=setup&display=polycomphones&polycomphones_form=externallines_list">' . _("External Lines") . '</a></li>';

$show['Alert Info'] = '<li><a ' 
	. ($polycomphonesForm == 'alertinfo_list' || $polycomphonesForm == 'alertinfo_edit'
	? 'class="current ui-state-highlight" ' : '') 
	. 'href="config.php?type=setup&display=polycomphones&polycomphones_form=alertinfo_list">' . _("Alert Info") . '</a></li>';

$show['Networks'] = '<li><a ' 
	. ($polycomphonesForm == 'networks_list' || $polycomphonesForm == 'networks_edit'
	? 'class="current ui-state-highlight" ' : '') 
	. 'href="config.php?type=setup&display=polycomphones&polycomphones_form=networks_list">' . _("Networks") . '</a></li>';

$show['Corporate Settings'] = '<li><a ' 
	. ($polycomphonesForm == 'corporate_edit' ? 'class="current ui-state-highlight" ' : '') 
	. 'href="config.php?type=setup&display=polycomphones&polycomphones_form=corporate_edit">' . _("Corporate Settings") . '</a></li>';
	
$show['General Settings'] = '<li><a ' 
	. ($polycomphonesForm == 'general_edit' ? 'class="current ui-state-highlight" ' : '') 
	. 'href="config.php?type=setup&display=polycomphones&polycomphones_form=general_edit">' . _("General Settings") . '</a></li>';

echo '
<div class="col-sm-2 rnav"><ul>';
foreach ($show as $s) {
	echo $s;
}
echo '
</ul></div>';
?>
