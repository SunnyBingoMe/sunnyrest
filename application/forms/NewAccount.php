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
        
        $email = new Zend_Form_Element_Text('email');
        $email
        	->setLabel('Email:')
        	->setOrder(3)
        	->setRequired(true);
        
        $password = new Zend_Form_Element_Password('password');
        $password
        	->setLabel('Password:')
        	->setOrder(1)
        	->setRequired(true);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit
        	->setLabel('Create My Account!')
        	->setOrder(4);
        
        $this->addElements(array($username, $email, $password, $submit));
        
	}


}

