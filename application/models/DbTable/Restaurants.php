<?php

class Application_Model_DbTable_Restaurants extends Zend_Db_Table_Abstract
{

    protected $_name = 'restaurants';

    public function myInsert(Application_Form_AddRestaurant $form){
        try {
            $data = array(
    		    "restaurant_name"	=>    $form->getValue('restaurantName'),
    		    "savour"			=>    $form->getValue('savour'),
    		    "email"				=>    $form->getValue('email'),
    		    "created_date"		=>    new Zend_Db_Expr("NOW()"),
                "map"				=>    $form->getValue('latlng'),
	            "restaurantStreetNr"	=>    $form->getValue('restaurantStreetNr'),
            	"restaurantPostcode"	=>    $form->getValue('restaurantPostcode'),
	            "restaurantCity"		=>    $form->getValue('restaurantCity'),
	            "restaurantArea"		=>    $form->getValue('restaurantArea'),
	            "restaurantInfo"		=>    $form->getValue('restaurantInfo'),
    		);
    		$this->insert($data);
        }catch (Zend_Db_Exception $e){
            throw $e;
        }
    }
    
    
    
    
}

