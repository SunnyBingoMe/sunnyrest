# Database creation
CREATE DATABASE sunnyrest;


# Change into the database to run commands
USE sunnyrest;


# accounts Table Creation
CREATE TABLE accounts (
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  username varchar(20) NOT NULL UNIQUE,
  email varchar(200) NOT NULL UNIQUE,
  password varchar(20) NOT NULL,
  status varchar(10) DEFAULT 'pending',
  email_newsletter_status varchar(3) DEFAULT 'out',
  email_type varchar(4) DEFAULT 'text',
  email_favorite_restaurants_status varchar(3) DEFAULT 'out',
  created_date DATETIME
);


# restaurants Table Creation
CREATE TABLE restaurants (
id int(11) AUTO_INCREMENT PRIMARY KEY,
restaurant_name varchar(200) NOT NULL,
savour varchar(100) NOT NULL,
created_date DATETIME,
email varchar(200) NOT NULL
);


# accounts_restaurants Table Creation
CREATE TABLE accounts_restaurants (
id int(11) AUTO_INCREMENT PRIMARY KEY,
account_id int(11) NOT NULL,
restaurant_id int(11) NOT NULL,
created_date DATETIME,
rating int(1),
is_fav int(1)
);

