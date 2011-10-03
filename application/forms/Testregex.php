<?php

class Application_Form_Testregex extends Zend_Form
{

    public function init()
    {
       $text = new Zend_Form_Element_Textarea("text");
       $text->addValidator(new Zend_Validate_Regex("/^((a|b)|c((a|b)(a|b)|cc)*(c(a|b)|(a|b)c))(((a|b)(a|b)|cc)|((a|b)c|c(a|b))((a|b)(a|b)|cc)*((a|b)c|c(a|b)))*$/"));
       
       $submit = new Zend_Form_Element_Submit("ok");
       $this->addElements(array($text, $submit));
    }


}

