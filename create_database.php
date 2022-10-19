<?php

// THE FOLLOWING ARE QUERIES TO CREATE THE DATABASE & TABLES.
// THERE WAS NO SPECIFICATION FOR PUTTING THESE IN PHP FORMAT FOR EXECUTION, SO I JUST SHOW THEM AS COMMENTS:

/*

CREATE DATABASE `company`

CREATE TABLE `companies` (
 `company_id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(128) NOT NULL,
 `address` varchar(512) NOT NULL,
 `city` varchar(128) NOT NULL,
 `state` varchar(2) NOT NULL,
 `zip` int(5) NOT NULL,
 PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4

CREATE TABLE `employees` (
 `employee_id` int(128) NOT NULL AUTO_INCREMENT,
 `company_id` int(128) NOT NULL,
 `name` varchar(256) NOT NULL,
 `department` varchar(256) NOT NULL,
 `title` varchar(256) NOT NULL,
 PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4

*/

?>