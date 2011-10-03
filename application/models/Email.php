<?php

class Application_Model_Email
{
    public function smtpSendMail($to, $subject, $bodyText, $gotoUrl = NULL)
    {
        $smtpTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
        	'auth'=>'login',
            'username'=>"teamwork@sunnyboy.me",
            'password'=>'workteam',
            'ssl'=>'ssl',
            'port'=>'465',
        ));

        $oMail = new Zend_Mail();
        $oMail
            ->setBodyText($bodyText)
            ->setFrom("teamwork@sunnyboy.me", 'Sunny Rest')
            ->addTo($to)
            ->setSubject($subject)
            ;
            
        try {
            $oMail->send($smtpTransport);
//            echo("Email sent successfuly");
            
        } catch (Zend_Mail_Exception $e) {
            echo $e->getCode().$e->getMessage();
        }
        
        if (isset($gotoUrl)){
            header("Location: http://".$_SERVER['HTTP_HOST'].$gotoUrl);
        }

    }
    

}

