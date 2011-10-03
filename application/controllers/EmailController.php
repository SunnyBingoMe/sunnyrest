<?php

class EmailController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function sendMailAction()
    {
        // action body
    }

    public function smtpSendMailAction()
    {
        $smtpHost = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
        	'auth'=>'login',
            'username'=>"teamwork@sunnyboy.me",
            'password'=>'workteam',
            'ssl'=>'ssl',
            'port'=>'465',
        ));

        $oMail = new Zend_Mail();
        $oMail
            ->setBodyText("this is smtp mail 2")
            ->setFrom("teamworktestmail@gmail.com", 'teamworktestmail')
            ->addTo("binsunsunny@gmail.com", 'bin')
            ->setSubject("this is an example")
            ;
            
        try {
            $oMail->send($smtpHost);
            echo("Email sent successfuly");
            
        } catch (Zend_Mail_Exception $e) {
            echo $e->getCode().$e->getMessage();
        }
        
        $this->_helper->viewRenderer->setNoRender();
    }


}





