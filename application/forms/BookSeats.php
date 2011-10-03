<?php

class Application_Form_BookSeats extends Zend_Form
{

    public function init()
    {
        $restId = new Zend_Form_Element_Hidden('restId');
        $restId
            ->setRequired()
            ->addValidator(new Zend_Validate_Digits())
            ->addValidator(new Zend_Validate_StringLength(1, 45))
        ;
        
        $dateTime = new Zend_Form_Element_Text('dateTime');
        $dateTime
//            ->setAttrib('readonly', 'readonly')
            ->setRequired()
            ->setLabel("Date & Time")
        ;
        
        $personNr = new Zend_Form_Element_Text('personNr');
        $personNr
            ->setRequired()
            ->setLabel("How many seats?")
            ->addValidator(new Zend_Validate_Digits())
            ->addValidator(new Zend_Validate_StringLength(1, 4))
        ;
        
        $phone = new Zend_Form_Element_Text('phone');
        $phone
            ->setRequired()
            ->setLabel("Your phone number")
            ->addValidator(new Zend_Validate_Digits())
            ->addValidator(new Zend_Validate_StringLength(4, 45))
        ;
        
        
        $submit = new Sunny_Form_Element_Submit('submit');
        
        $this->addElements(array($restId, $dateTime, $personNr, $phone, $submit));
        
    }


}

