<?php
class Sunny_Form_Element_Username extends Zend_Form_Element_Text {
	function init() {
		$this
			->setLabel("Username")
			->setRequired(true)
			->setAutoInsertNotEmptyValidator(true)
			
			->addValidator(new Zend_Validate_StringLength(6, 45))
			->addValidator(new Zend_Validate_Alnum())
			
			->addFilter(new Zend_Filter_StripTags())
			->addFilter(new Zend_Filter_HtmlEntities())
			->addFilter(new Zend_Filter_StringToLower())
			;
	}
}