<?php

class Application_Form_NewAccount extends Zend_Form
{

    public function init()
    {
        $this
        	->setMethod('post')
        	->setDescription('sign up form')
        	->setAttrib('sitename', 'sunnyrest');
        	
        $username = new Zend_Form_Element_Text("username");
        $username
        	->setLabel('Username:')
        	->setOrder(0)
        	->setRequired(true);
        
        $email = new Sunny_Form_Element_Email('email');
        $email
        	->setLabel('Email:')
        	->setOrder(3)
        	->setRequired(true);
        
        $password = new Sunny_Form_Element_Password('password');
        $password
        	->setLabel('Password:')
        	->setOrder(1)
        	->setRequired(true);
        
        $captcha = new Zend_Form_Element_Captcha('captcha', array(
            'captcha' => array(
                'captcha' => 'Image',
                'wordLen' => 6,
                'timeout' => 300,
                'width' => 150,
                'height' => 50,
                'imgUrl' => '/captcha',
                'imgDir' => APPLICATION_PATH . '/../public/captcha',
				'font' => APPLICATION_PATH . '/../public/asset/font/LiberationSans/LiberationSans-Regular.ttf', 
			)
		));
        $captcha
        	->setLabel("What's this?")
        	->setOrder(4)
        	->setRequired(true);
        	
        $submit = new Sunny_Form_Element_Submit('submit');
        $submit
        	->setLabel('Create My Account!')
        	->setOrder(5);
        
        $this->addElements(array($username, $email, $password, $captcha, $submit));
        
	}


}

