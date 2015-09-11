<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="form-group">
    <?php  echo $form->label("optionclass", t("options class name")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('optionclass', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php  print $form->textarea("optionclass", $optionclass, array (
  'rows' => 5,
)); ?>
</div>

<div class="form-group">
    <?php  echo $form->label("optionspage", t("Page")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('optionspage', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
	<?php  echo Loader::helper("form/page_selector")->selectPage("optionspage", $optionspage); ?>

	<?php  echo $form->label("optionspage", t("Page") . " " . t("Text")); ?>
    <?php  echo $form->text("optionspage_text", $optionspage_text, array()); ?>
</div>