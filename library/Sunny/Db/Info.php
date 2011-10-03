<?php
class Sunny_Db_Info {
	public function __construct()
	{
		$this->dbHost = '127.0.0.1';//hellosweden.db.6009281.hostedresource.com
		$this->dbPort = "3306";
		$this->dbUsername = "root";
		$this->dbPassword = "workteam";
		$this->dbName = "sunnyrest";
		
		$this->tableAccounts = "accounts";
		$this->tableAccountsColumnNameList = array(
			"id",//0
			"username",//1
			"email",//2
			"password",//3
			"status",//4
			"email_newsletter_status",//5
			"email_type",//6
			"email_favorite_restaurants_status",//7
			"created_date" //8
		);
	}
	
	public $dbHost;
	public $dbPort;
	public $dbUsername;
	public $dbPassword;
	public $dbName;
	
	// names
	public $tableAccounts;
	public $tableAccountsColumnNameList;

	
}