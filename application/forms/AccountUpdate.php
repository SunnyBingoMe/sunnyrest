<?php

class Application_Form_AccountUpdate extends Zend_Form
{

    public function init()
    {
        $this
        	->setAction('update')
        	->setMethod('post')
        	->setAttrib('sitename', 'sunnyrest')
        	;
        	
        $aboutme = new Zend_Form_Element_Textarea('aboutme');
        $aboutme
        	->setLabel('About Me:')
        	->setAttribs(array(
        		'cols'=>15,
        		'rows'=>5
        	));
        	
        $fileUpload = new Zend_Form_Element_File('avatar');
        $fileUpload
        	->setLabel("Your Avatar:")
        	->addValidator('Count', false, 1)
        	->addValidator('Extension',false,'jpg,gif')
        	->addValidator('Size',false,2)
        	->setDestination('../public/users')
        	;
        	
//	    $captcha = new Sunny_Form_Element_Captcha('signup');
//	    $captcha->setLabel('Please type in the words below to continue');        	
        
	    $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Update My Account');
        
        $this->addElements(array(
        	new Sunny_Form_Element_Username("username"),
        	new Sunny_Form_Element_Email('email'),
        	new Sunny_Form_Element_Password('password'),
        	$fileUpload,
//        	$captcha,
        	$aboutme,
        	$submit
        ));
    }


}

