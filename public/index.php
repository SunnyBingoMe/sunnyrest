<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/../'),
    get_include_path(),
)));//

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);


/* Routing info */
$FrontController = Zend_Controller_Front::getInstance();

$Router = $FrontController->getRouter();
/*$ Router->addRoute(
	"restaurantprofile",
	new Zend_Controller_Router_Route(
		"restaurant/:restaurantname",
		array(
			"restaurantname"=>"New Peking",
			"controller"=>"restaurant",
			"action"=>"profile"
		)
	)
);*/
$Router->addRoute(
	"restaurantstore",
	new Zend_Controller_Router_Route(
		"restaurant/store",
		array(
			"controller"=>"restaurant",
			"action"=>"restaurantaffiliatecontent"
		)
	)
);


/* app-error controller*/
//$FrontController = Zend_Controller_Front::getInstance();
/*
$plugin = new Zend_Controller_Plugin_ErrorHandler();
$plugin->setErrorHandlerController('ApplicationError');
$plugin->setErrorHandlerAction('index');
$FrontController->registerPlugin($plugin);

*/

$application->bootstrap()
            ->run();

            