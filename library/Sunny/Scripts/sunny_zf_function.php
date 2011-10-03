<?php 

function getMysqlPdo()
{
	$dbInfo = new Sunny_Db_Info();
	$connParams = array(
		"host"     => $dbInfo->dbHost,
		"port"     => $dbInfo->dbPort,
		"username" => $dbInfo->dbUsername,
		"password" => $dbInfo->dbPassword,
		"dbname"   => $dbInfo->dbName
	);
	
	$db = new Zend_Db_Adapter_Pdo_Mysql($connParams);
	return $db;
}
