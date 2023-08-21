<?php
/**
 * Autoload file will contain the directories to all the file in the project
 * PHP version * ^7
 * 
 * @category Autoload
 *  
 * @package MyPackage
 * 
 * @author "Andrew Tonui <Cyborg1999.github.com>"
 *  
 * @license * Null
 *   
 * @link * Null
 */
session_start();

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config/config.php";
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config/constants.php";
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config/connection.php";


$MSQL = new Dbconnection(DBTYPE, DBHOST, DBNAME, DBUSER, DBPASS, DBPORT);

print "<PRE>";
print_r($MSQL);
//echo gethostbyname(DBHOST);
print "</PRE>";