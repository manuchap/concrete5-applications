<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>

<?php

if (file_exists(DIR_PACKAGES . $optionclass)) :
	// Cette variable permettra de ne pas afficher les options
	$passThrough = true;    
	include (DIR_PACKAGES . $optionclass);
	$controller->renderOptions($options);
else :
	echo t('Can\'t find file');
endif?>
