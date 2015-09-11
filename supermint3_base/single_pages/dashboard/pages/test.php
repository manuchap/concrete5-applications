<pre>
<?php
$pt = PageTheme::getByHandle('supermint');
$preset = $pt->getThemeCustomizablePreset('business');
$styleList = $pt->getThemeCustomizableStyleList();
$sets = $styleList->getSets();
$valueList = $preset->getStyleValueList();
$vl = new Concrete\Core\StyleCustomizer\Style\ValueList();

foreach ($sets as $set) :
	 foreach($set->getStyles() as $style)  :
	 	$valueObject = $style->getValueFromList($valueList);
	 	if (is_object($valueObject))
	 	 	$vl->addValue($valueObject);
	 endforeach;
endforeach;
// $pt->setCustomStyleObject($vl, $preset);

 
// print_r($vl);
?>
</pre>