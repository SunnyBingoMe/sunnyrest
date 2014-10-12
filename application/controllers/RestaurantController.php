<?php

class RestaurantController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function newAction()
    {
    	//check login
    	if ($_SESSION['status'] != 'admin') {
    	    $this->_helper->redirector->gotoUrl('/');
    	}
    	
    	$form = new Application_Form_AddRestaurant();
    	if ($_POST) {
    	    if ($form->isValid($_POST)) {
    	        try {
        	        $tableRestaurants = new Application_Model_DbTable_Restaurants();
        	        $tableRestaurants->myInsert($form);
    	        }catch (Zend_Db_Exception $e){
    	            echo $e->getTrace();
    	        }
    	        $this->view->added = true;
    	    }else {
    	        $this->view->errors = $form->getMessages();
    	        $this->view->form = $form;
    	    }
    	}else {
    	    $this->view->form = $form;
    	}
    	
    	
    }

    public function listAllRestaurantsAction()
    {
        $tableRestaurants = new Application_Model_DbTable_Restaurants();
        $resultList = $tableRestaurants->fetchAll();
        $this->view->resultList = $resultList;
    }

    public function restaurantaffiliatecontentAction()
    {
        // action body
    }

    public function saveRestaurantAction()
    {
        if (!isset($_SESSION['id'])) {
            $this->_forward('login');
        }
        
        //Initialize variables
        $escapeObj = new Sunny_Escape();
//		$this->view->setEscape('strip_tags');
        $this->view->setEscape(array($escapeObj, "doEnhancedEscape"));
		
		
		//Validate
		$form = new Application_Form_AddRestaurant();
		if($form->isValid($_POST)){
    		try {
    		    $tableRestauants = new Application_Model_DbTable_AccountsRestaurants();
    		    $tableRestauants->myInsert($form);
    		} catch (Zend_Db_Exception $e) {
    		    echo $e->getMessage();
    		    $this->view->form = $form;
    		}
		}else {
		    $this->view->errors = $form->getMessages();
		    $this->view->form = $form;
		}
		
		//Save the input into the DB
    	
    }

    public function profileAction()
    {
        $restId = $this->_request->getQuery('id');
        $tableRestaurants = new Application_Model_DbTable_Restaurants();
        if ($resultObj = $tableRestaurants->fetchRow("id = $restId")){
            $result = $resultObj->toArray();
            $this->view->result = $result;
        }else {
            $this->_redirect("/restaurant/list-all-restaurants");
        }
        
    }

    public function removeAction()
    {
		//Check if the user is logged in
		
		//Get the user's Id
		
    	//get the user's rest with rating
    	$restaurants = array(
    		array("name"=>"New Peking", "rating"=>5),
    		array("name"=>"Thai", "rating"=>4),
    		array("name"=>"Mountain View", "rating"=>5),
    	);
    	
		//Set the view variables
		$this->view->totalRestaurant = count($restaurants);
		$this->view->restaurants = $restaurants;
    }

    public function bookAction()
    {
    	//check login
    	if (!isset($_SESSION['id'])) {
    	    $this->_helper->redirector->gotoUrl('/account/login');
    	}
    	
    	$form = new Application_Form_BookSeats();
    	$form->getElement('restId')->setValue($this->_request->getQuery('id'));
    	$this->view->booked = false;
    	if ($_POST) {
    	    if ($form->isValid($_POST)) {
    	        try {
    	            $tableRestaurants = new Application_Model_DbTable_Restaurants();
    	            $restId = $form->getValue('restId');
    	            $result = $tableRestaurants->fetchRow(" id = $restId")->toArray();
    	            
    	            $bodyText = "Hi, ".$result['restaurant_name'].": \n".
    	                "You have a new booking for ".$form->getValue('personNr')." person(s) at ".$form->getValue('dateTime').". \n".
    	                "From Customer: \n".
    	                $_SESSION['username'].". \n".
    	                "\t Email: ".$_SESSION['email']."\n".
    	                "\t Phone: ".$form->getValue('phone')."\n".
    	                "Thank you for your reading. \n\n".
    	                "Yours Sincerely, \n".
    	                "Sunny Rest"
    	            ;
    	            $mail = new Application_Model_Email();
    	            if (! (getDomain() == "rest.sunnyboy.me")){
	    	            $mail->smtpSendMail($result['email'], "New Booking", $bodyText);
    	            }
    	        }catch (Zend_Db_Exception $e){
    	            echo $e->getTrace();
    	            $this->view->form = $form;
    	        }
    	        
    	        $this->view->booked = true;
    	    }else {
    	        $this->view->errors = $form->getMessages();
    	        $this->view->form = $form;
    	    }
    	}else {
    	    $this->view->form = $form;
    	}
    	
    	
    }

    public function mapAction()
    {
        // action body
    }


}




















