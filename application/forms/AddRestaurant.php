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
        
        
        $restaurantStreetNr = new Zend_Form_Element_Text('restaurantStreetNr');
        $restaurantStreetNr
        ->setLabel('Restaurant Street & No.')
        ->setRequired()
        ->addValidator(new Zend_Validate_StringLength(1, 45))
        ->addFilter(new Zend_Filter_HtmlEntities())
        ->addFilter(new Zend_Filter_StripTags())
        //            ->addFilter(new Zend_Filter_StringTrim())
        ;
        
        $restaurantPostcode = new Zend_Form_Element_Text('restaurantPostcode');
        $restaurantPostcode
        ->setLabel('Restaurant Postcode')
        ->setRequired()
        ->addValidator(new Zend_Validate_StringLength(1, 45))
        ->addFilter(new Zend_Filter_HtmlEntities())
        ->addFilter(new Zend_Filter_StripTags())
        //            ->addFilter(new Zend_Filter_StringTrim())
        ;
        
        $restaurantCity = new Zend_Form_Element_Text('restaurantCity');
        $restaurantCity
        ->setLabel('Restaurant City')
        ->setRequired()
        ->addValidator(new Zend_Validate_StringLength(1, 45))
        ->addFilter(new Zend_Filter_HtmlEntities())
        ->addFilter(new Zend_Filter_StripTags())
        //            ->addFilter(new Zend_Filter_StringTrim())
        ;
        
        $restaurantArea = new Zend_Form_Element_Text('restaurantArea');
        $restaurantArea
        ->setLabel('Restaurant Area')
        ->setRequired()
        ->addValidator(new Zend_Validate_StringLength(1, 45))
        ->addFilter(new Zend_Filter_HtmlEntities())
        ->addFilter(new Zend_Filter_StripTags())
        //            ->addFilter(new Zend_Filter_StringTrim())
        ;
        
        $restaurantInfo = new Zend_Form_Element_Text('restaurantInfo');
        $restaurantInfo
        ->setLabel('Restaurant Info')
        ->setRequired()
        ->addValidator(new Zend_Validate_StringLength(1, 200))
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
        
        $latlng = new Zend_Form_Element_Text('latlng');
        $latlng
            ->setLabel('Latitude & Longitude')
            ->setAttrib('maxlength', 25)
            ->setValue('56.164963,15.588613')
            ;
        
        $this->addElements(array(
        	$restaurantName,
        	$restaurantStreetNr,
        	$restaurantPostcode,
        	$restaurantCity,
        	$restaurantArea,
	        $restaurantInfo,
        	$savour,
//        	$isFavouriteList,
//        	$rating,
            $email,
        	$latlng,
        	$submit,
        ));
    }
    
    


}

