<?php
require_once 'library/Sunny/Scripts/sunny_function.php';
class AccountController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        echo "ttt";
        //$this->_helper->viewRenderer->setNoRender();
    }

    public function successAction()
    {
        //sent welcome email
    	
    }

    public function newAction()
    {
        $form = new Application_Form_NewAccount();
        if ($_POST){
        	if($form->isValid($_POST)){
        	    try{
    		        // save new user into sys
    		        $tableAccounts = new Application_Model_DbTable_Accounts();
    		        $lastInsertId = $tableAccounts->myInsert($form);
    	        
    	        	//send out thank you email
    	        	$oEmail = new Application_Model_Email();
    	        	$oEmail->smtpSendMail($form->getValue('email'), "Welcome Letter", "Welcome to Sunny Rest!");
    	        	$oEmail->smtpSendMail($form->getValue('email'), "Activate", "go to this url to activate your account: \n http://".$_SERVER['HTTP_HOST']."/account/activate?email=".$form->getValue('email'), "/account/success");
    	        }catch (Zend_Db_Exception $e){
    	            $this->view->errors = $e->getTrace();
    	        	$this->view->form = $form;
    	        }
        	}else {
        		$this->view->errors = $form->getMessages();
        		$this->view->form = $form;
        	}
        }else{
           	$this->view->form = $form;
        }
       	//add form to view
    }

    public function activateAction()
    {
        $emailToActivate = $this->_request->getQuery('email');
        if (isEmailAddress($emailToActivate)) {
            try {
                $tableAccounts = new Application_Model_DbTable_Accounts();
                if($tableAccounts->activatePendingUser($emailToActivate)){
                    $this->view->activated = TRUE;
                }else {
                    $this->view->activated = FALSE;
                }
            }catch (Exception $e){
                throw $e;
            }
        }else {
            $this->view->activated = FALSE;
        }
        
    }

    public function updateAction()
    {
        //check user login
        if (!isset($_SESSION['id'])) {
            $this->_forward('login');
        }
        
        //get user id
        //get user info
        
    	//create form
    	$form = new Application_Form_AccountUpdate();
    	if ($_POST) {
    		if ($form->isValid($_POST)) {
    			//get values
    			$username = $form->getValue('username');
    			$password = $form->getValue('password');
    			$email = $form->getvalue('email');
    			$aboutMe = $form->getvalue('aboutme');
    			
    			//save file
//    			$form->avatar->receive();
    			
    			//save
    		}else{
    			$this->view->form = $form;
    		};
    	}else{
    		$this->view->form = $form;
    	}
    	
    	/*create Zend_View obj
    	$view = new Zend_View();
    	//assign variables if any
    	$view->setScriptPath("../view/scripts/");
    	$view->render("update.phtml");
    	*/
    }

    public function regexAction()
    {
        $form = new Application_Form_Testregex();
        if($_POST){
        	if($form->isValid($_POST)){
        		$this->view->content = "ok";
        	}else{
        		$this->view->content = "fail";
        	}
        }
        $this->view->form = $form;
    }

    public function testConnAction()
    {
		try{
			require_once 'library/Sunny/Scripts/sunny_zf_function.php';
			$db = getMysqlPdo();
		}catch(Zend_Db_Exception $e){
			echo $e->getMessage();
		}
		
		echo "Database object created.";
		
		//Turn off View Rendering.
		$this->_helper->viewRenderer->setNoRender();
    }

    public function testInsertAction()
    {
    	try{
	        require_once 'library/Sunny/Scripts/sunny_zf_function.php';
	        $db = getMysqlPdo();
	        
			$userData1 = array("username"    => 'test_4',
				 "email"       => 'test4@loudbite.com',
				 "password"    => 'password',
				 "status"      => 'active',
				 "created_date" => '0000-00-00 00:00:00');
			$userData2 = array("username"    => 'test_5',
				 "email"       => 'test5@loudbite.com',
				 "password"    => 'password',
				 "status"      => 'active',
				 "created_date"=> '0000-00-00 00:00:00');
			$userData3 = array("username"    => 'test_6',
				 "email"       => 'test6@loudbite.com',
				 "password"    => 'password',
				 "status"      => 'active',
				 "created_date"=> '0000-00-00 00:00:00');
			
			$db->insert('accounts', $userData1);
			$db->insert('accounts', $userData2);
			$db->insert('accounts', $userData3);
			
			$db->closeConnection();
			
			echo 'completed inserting';
    	}catch (Zend_Db_Exception $e){
    		echo 'db query error: '.$e->getMessage();
    	}
    	
    	$this->_helper->viewRenderer->setNoRender();
    }

    public function testExpressionAction()
    {
    	try{
	        require_once 'library/Sunny/Scripts/sunny_zf_function.php';
	        $db = getMysqlPdo();
	        
			$userData1 = array(
				 "username"    => 'test_3',
				 "email"       => 'test3@loudbite.com',
				 "password"    => 'password',
				 "status"      => 'active',
				 "created_date" => new Zend_Db_Expr("NOW()")
			);
			
			$db->insert('accounts', $userData1);
			
			$db->closeConnection();
			
			echo 'completed inserting';
    	}catch (Zend_Db_Exception $e){
    		echo 'db query error: '.$e->getMessage();
    	}
    	
    	$this->_helper->viewRenderer->setNoRender();
    }

    public function viewAllAction()
    {
        try{
            $tableAccounts = new Application_Model_DbTable_Accounts();
            
            $where = "status = 'active' ";
            $resultList = $tableAccounts->fetchAll($where);
            $this->view->resultList = $resultList;
            
            $this->view->totalMemberNr = $tableAccounts->fetchAllNr();
        }catch (Zend_Db_Exception $e){
            echo $e->getMessage();
        }
    }

    
    public function loginAction()
    {
        $form = new Application_Form_Login();
        if($_POST){
            if ($form->isValid($_POST)) {
                $tableAccounts = new Application_Model_DbTable_Accounts();
                if ($tableAccounts->isAuthLogin($form)){
                    //fetch user data
                    $userData = $tableAccounts->fetchUserDataByEmail($form->getValue('email'));
                    
                    //set user session
                    $_SESSION['id'] = $userData['id'];
                    $_SESSION['username'] = $userData['username'];
                    $_SESSION['email'] = $userData['email'];
                    $_SESSION['status'] = $userData['status'];
                    $_SESSION['dateJoined'] = $userData['created_date'];
                    
                    $originalUrl = $_SESSION['originalUrl'];
                    header("Location: $originalUrl");
                    exit;
                }else {
                    $this->view->message = "Username or password incorrect or you have not activate your account via email.";
                    $this->view->form = $form;
                }
            }else {
                $this->view->form = $form;
            }
        }else {
            if (isset($_SERVER['HTTP_REFERER'])){
                $_SESSION['originalUrl'] = $_SERVER["HTTP_REFERER"];
            }else {
                $_SESSION['originalUrl'] = "http://".$_SERVER['HTTP_HOST'];
            }
            $this->view->form = $form;
        }
    }

    
    public function managerAction()
    {
        //check if loged in
        if(!isset($_SESSION['id'])){
            $this->_helper->redirector("login");
        }
        
        $tableAccountsRestaurants = new Application_Model_DbTable_AccountsRestaurants();
        $favouriteRestaurants = $tableAccountsRestaurants->fetchFavouriteRestaurantsByUserId($_SESSION['id']);
        $this->view->restaurants = $favouriteRestaurants;
    }

    
    public function logoutAction()
    {
        if (isset($_SESSION['id'])){
            session_unset();
        }
        
        $this->_helper->redirector->gotoUrl('/');
    }


}













