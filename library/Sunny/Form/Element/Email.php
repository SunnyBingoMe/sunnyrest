<?php
class Sunny_Form_Element_Email extends Zend_Form_Element_Text{
	public function init(){
		$this
			->setLabel("Email")
			->setRequired()
			->setAutoInsertNotEmptyValidator(true)
			
			->addValidator(new Zend_Validate_EmailAddress())
			->addValidator(new Zend_Validate_StringLength(4, 200))
			
			->addFilter(new Zend_Filter_HtmlEntities())
			->addFilter(new Zend_Filter_StripTags())
			->addFilter(new Zend_Filter_StringToLower())
			;
			
	}
}