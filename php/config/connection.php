<?php
/**
 * DbConnection Class Doc comments
 * PHP version: *^8
 * 
 * @category Class
 *  
 * @package Null
 * 
 * @author "Andrew Tonui <Cyborg1999.github.com>"
 *  
 * @license * Null
 *   
 * @link * Null
 */

// class DbConnection
// {

//     /**
//      * DbConnection Class file in the project
//      * PHP version: *^8
//      * 
//      * @category Class
//      *  
//      * @package Null
//      * 
//      * @author "Andrew Tonui <Cyborg1999.github.com>"
//      *  
//      * @license * Null
//      *   
//      * @link localhost
//      */


//     private $_Connect;
//     private $_dbType;
//     private $_dbHost;
//     private $_dbName;
//     private $_dbUser;
//     private $_dbPass;
//     private $_dbPort;

//     /**
//      * Function __construct()
//      * 
//      * @param String $DBTYPE the type of database used
//      * @param String $DBHOST the host of database used
//      * @param String $DBNAME the name of database used
//      * @param String $DBUSER the user of database used
//      * @param String $DBPASS the password of database used
//      * @param String $DBPORT the port of database used       
//      * 
//      * @var this this 
//      */  
//     public function __construct($DBTYPE, $DBHOST, $DBNAME, $DBUSER, $DBPASS, $DBPORT)
//     {
//         $this->_dbType = $DBTYPE;
//         $this->_dbHost = $DBHOST;
//         $this->_dbName = $DBNAME;
//         $this->_dbUser = $DBUSER;
//         $this->_dbPass = $DBPASS;
//         $this->_dbPort = $DBPORT;

//         $this->connection($DBTYPE, $DBHOST, $DBNAME, $DBUSER, $DBPASS, $DBPORT);
//     }
//     /**
//      * Function connection()
//      * 
//      * @param String $DBTYPE the type of database used
//      * @param String $DBHOST the host of database used
//      * @param String $DBNAME the name of database used
//      * @param String $DBUSER the user of database used
//      * @param String $DBPASS the password of database used
//      * @param String $DBPORT the port of database used
//      *        
//      * @var this $this 
//      * 
//      * @return String connection status
//      */
//     public function connection($DBTYPE, $DBHOST, $DBNAME, $DBUSER, $DBPASS, $DBPORT) 
//     {
//         switch($DBTYPE){
//         case 'MySQLi':
//             if ($DBPORT<> null) {
//                     $DBHOST.= ":" .$DBPORT;
//             }
//                 $this->_Connect = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);
//             if ($this->_Connect->connect_error) {
//                     return "Connection Failure: ".$this->_Connect->connect_error;
//             } else {
//                 print "Connection Successfull";
//             }
//             break;
//         case 'PDO':
//             if ($DBPORT<>null) {
//                 $DBHOST.=":".$DBPORT;
//             }
//             try{
//                 $dsn = "mysql:host =.$DBHOST; dbname = $DBNAME; port = $DBPORT";
//                 $this->_Connect = new PDO($dsn, $DBUSER, $DBPASS);

//                 $this->_Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                 echo "Connected Successfully";
//             } catch (PDOException $err) {
//                 echo "connection failed: " .$err->getMessage();
//             }
//             break;
//         }

//     }

//     /**
//      * Implement extracted ()
//      * 
//      * @param query String $sth contains String values to be passed to the database
//      * 
//      * @return String sql statements
//      */    
//     public function extracted(string $sth) 
//     {
//         switch ($this->_dbType) {
//         case 'MySQli':
//             if ($this->_Connect->query($sth) === true) { 
//                     // change to query later          
//                     return true;
//             } else {
//                     return "Failed!";
//             }
//             break;
//         case 'PDO':
//             try {
//                     $stmt = $this->_Connect->prepare($sth);
    
//                     $stmt->execute();
//                     return true;
//             } catch (PDOException $e) {
//                     return $sth . "<br />" . $e->getMessage();
//             }
//             break;
//         }
//     }

//     /**
//      * Implement update()
//      * 
//      * @param query String $table contains data stored in the table
//      * @param Array|String $data  contains the array of fields to be inserted 
//      * 
//      * @var String|Array $table 
//      * @var Array|String $data  
//      * @var String $sth 
//      * 
//      * @return String sql statements
//      */    
//     public function insert($table, $data)
//     {

//         ksort($data);
//         $fieldDetails = null;
//         $fieldNames = implode('`, `', array_keys($data));
//         $fieldValues = implode(" ',' ", array_keys($data));
//         $sth = "INSERT INTO $table ('$fieldNames') VALUES ('$fieldValues')";
//         return $this->extracted($sth);
//     }

//     /**
//      * Implement delete()
//      * 
//      * @param query String $table contains data stored in the table
//      * @param Array|String $where contains the array of fields to be deleted 
//      * 
//      * @var String|Array $table 
//      * @var Array|String $data  
//      * @var String $sth 
//      * 
//      * @return String sql statements
//      */    
//     public function delete($table,$where) 
//     {
//         $wer = '';
//         if (is_array($where)) {
//             foreach ($where as $clave=>$value) {
//                 $wer.= $clave."='".$value."' and ";
//             }
//             $wer   = substr($wer, 0, -4);
//             $where = $wer;
//         }
//         if ($where == null or $where =='') {
//             $sth = "DELETE FROM $table";
//         } else {
//             $sth = "DELETE FROM $table WHERE $where";
//         }
//             return $this->extracted($sth);
//     }

// }

$host = 'localhost';
$db = 'joke_generator';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}