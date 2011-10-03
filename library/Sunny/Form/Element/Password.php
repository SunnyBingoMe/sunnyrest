<?php
class Sunny_Form_Element_Password extends Zend_Form_Element_Password {
	function init() {
		$this
			->setLabel("Password")
			->setRequired()
			->setAutoInsertNotEmptyValidator(true)
			
			->addValidator(new Zend_Validate_StringLength(6, 45))
			->addValidator(new Zend_Validate_Alnum())
			
			->addFilter(new Zend_Filter_HtmlEntities())
			->addFilter(new Zend_Filter_StripTags())
			;
	}
}