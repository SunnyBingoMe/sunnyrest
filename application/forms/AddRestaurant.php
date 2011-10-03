<?php

class Application_Form_AddRestaurant extends Zend_Form
{

    public function init()
    {
        $this
        	->setMethod('post')
        	->setName('addrestaurant')
        	;
        	
        $restaurantName = new Zend_Form_Element_Text('restaurantName');
        $restaurantName
            ->setLabel('Restaurant Name')
            ->setRequired()
            ->addValidator(new Zend_Validate_StringLength(1, 45))
            ->addFilter(new Zend_Filter_HtmlEntities())
            ->addFilter(new Zend_Filter_StripTags())
//            ->addFilter(new Zend_Filter_StringTrim())
            ;
        
        
        $savours = array("multiOptions"=>array(
			"Spicy"=>"Spicy",
			"Crisp"=>"Crisp",
			"Light"=>"Light",
			"Greasy"=>"Greasy",
			"Sour"=>"Sour",
			"Salty"=>"Salty",
			"Fried"=>"Fried",
			"Grilled"=>"Grilled"
        ));
        $savour = new Zend_Form_Element_Select('savour', $savours);
        $savour
        	->setLabel("Savour")
        	->setRequired(true)
        	->addFilter(new Zend_Filter_Alpha());
/*        	
        $favouriteOptions = array("multiOptions"=>array(
        	'1'=>'yes',
        	'0'=>'no'
        ));
        $isFavouriteList = new Zend_Form_Element_Radio('isFavourite', $favouriteOptions);
        $isFavouriteList
        	->setLabel('Add to Favourite List:')
        	->setRequired(true)
        	->addFilter(new Zend_Filter_Alpha());
        	
        $ratingOptions = array("multiOptions"=>array(
        	'1'=>'1',
			'2'=>'2',
			'3'=>'3',
			'4'=>'4',
			'5'=>'5'
		));
        $rating = new Zend_Form_Element_Radio('rating', $ratingOptions);
        $rating
        	->setLabel('Rating:')
        	->setRequired()
        	->addValidator(new Zend_Validate_Alnum())
        	;
*/        	
        
        $email = new Sunny_Form_Element_Email('email');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Add Restaurant');
        
        $this->addElements(array(
        	$restaurantName,
        	$savour,
//        	$isFavouriteList,
//        	$rating,
            $email,
        	$submit,
        ));
    }
    
    


}

