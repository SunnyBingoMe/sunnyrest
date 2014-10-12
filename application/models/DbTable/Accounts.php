<?php
class Application_Model_DbTable_Accounts extends Zend_Db_Table_Abstract
{
    protected $_name = 'accounts';
    
    public function myInsert (Application_Form_NewAccount $form)
    {
	    $username = $form->getValue('username');
        $email = $form->getValue('email');
        $password = crypt($form->getValue('password'), '$5$Sunny_Cr$');
        
        $dbInfo = new Sunny_Db_Info();
        $data = array(
            "username" => "$username", 
            "email" => "$email", 
            "password" => "$password", 
            "status" => "pending", 
            "created_date" => new Zend_Db_Expr("NOW()")
        );
        
        try{
            $this->insert($data);
        }catch (Zend_Db_Exception $e){
            throw $e;
        }
        return 0;
    }
    
    public function fetchAllNr(){
        try {
            $resultList = $this->_db->query("SELECT COUNT(id) AS total_member_nr FROM $this->_name WHERE status = 'active' ")->fetchAll();
        }catch (Zend_Db_Exception $e){
            throw $e;
        }
        return $resultList[0]['total_member_nr'];
    }
    
    public function isAuthLogin(Application_Form_Login $form){
        $email = $form->getValue('email');
        $password = crypt($form->getValue('password'), '$5$Sunny_Cr$');
        
        if($this->fetchRow(" email = '$email' AND password = '$password' AND ( status = 'active'  OR status = 'admin' ) ") ){
//        SELECT * FROM accounts WHERE email = 'bisu10@student.bth.se' AND password = 'bisu10' AND status = 'active' 
//        if(1){
            return true;
        }else {
            return FALSE;
        }
        
    }
    
    public function fetchUserDataByEmail($email){
//        $resultList = $this->_db->query("SELECT * FROM accounts WHERE email = 'bisu10@student.bth.se' AND password = 'bisu10' AND status = 'active'")->fetchAll();
        $result = $this->fetchRow(" email = '$email' ")->toArray();
        return $result;
    }
    
    public function activatePendingUser($email) {
        try {
            $updatedRowNr = $this->update(array("status"=>"active"), " email = '$email' AND status = 'pending' ");
        }catch (Zend_Db_Exception $e){
            throw new Exception($e);
        }
        return $updatedRowNr; 
    }
    
}

