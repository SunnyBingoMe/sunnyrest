<?php

class Application_Model_DbTable_AccountsRestaurants extends Zend_Db_Table_Abstract
{

    protected $_name = 'accounts_restaurants';

    public function myInsert(Application_Form_AddRestaurant $form){
    		$data = array(
    		    "account_id"	=>    $_SESSION['id'],
    		    "restaurant_id"			=>    $form->getValue('restaurant_id'),
    		    "rating"		=>    $form->getValue('rating'),
    		    "is_fav"		=>    $form->getValue('isFav'),
    		    "created_date"		=>    new Zend_Db_Expr("NOW()")
    		);
    		$this->insert($data);
    }
    
    public function fetchFavouriteRestaurantsByUserId($userId){
        try {
            $favouriteRestaurants = $this->_db->query("
            	SELECT r.restaurant_name, r.id, ar.created_date AS date_became_fan 
            	FROM restaurants AS r
            	INNER JOIN accounts_restaurants ar 
            	ON ar.restaurant_id = r.id 
            	WHERE ar.account_id = $userId AND ar.is_fav = 1 
            ")->fetchAll();
        } catch (Zend_Db_Exception $e) {
            echo $e->getMessage();
        }
        return $favouriteRestaurants;
    
    }
    
    
}

