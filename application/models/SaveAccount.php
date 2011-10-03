<?php

class Application_Model_SaveAccount
{
	public function saveAccount($username, $password, $email){
        //Clean up data
        $username = $this->_db->escape($username);
        $password = $this->_db->escape($password);
        $email    = $this->_db->escape($email);
        //Set up mysqli instance
        $dbconn = mysqli('localhost',
                       '<Your Username>',
                       '<Your Password>');
        $dbconn->select_db('loudbite');
        //Create the SQL statement and insert.
        $statement = "INSERT INTO Accounts (username, password, email)
                      VALUES ('".$username."',
                              '".$password."',
                              '".$email."')";
        $dbconn->query($statement);
        //Close db connection
        $dbconn->close();
	}
}

