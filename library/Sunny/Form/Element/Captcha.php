<?php
class Sunny_Form_Element_Captcha extends Zend_Form_Element_Captcha{
    public function __construct($spec, $options = array(
    		'captcha' => array(
			'captcha' => 'Figlet',
			'wordLen' => 6,
			'timeout' => 600
    )))
    {
        parent::__construct($spec, $options);
        $this->setAllowEmpty(true)
             ->setRequired(true)
             ->setAutoInsertNotEmptyValidator(false)
             ->addValidator($this->getCaptcha(), true);
    }
}