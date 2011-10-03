<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this
            ->setMethod('post')
            ->setName('login')
            ->setAction('')
            ;
            
        $email = new Sunny_Form_Element_Email('email');
        
        $password = new Sunny_Form_Element_Password('password');
        
        $submit = new Zend_Form_Element_Submit('submit');
        
        $this->addElements(array($email, $password, $submit));
        
    }


}

