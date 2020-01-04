<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  9-12-2019      Sam Shayan     Added Database Class
  ----------------------------------------------------------------------------->
<?php





//class Database {
    //Connecting the database with username and password 
     $dsn ='mysql:host=localhost;dbname=businessdb';
     $username =  'root';
     $password ='Pa$$word1';
    try{
        $db = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e){
        $error_msg = $e->getMessage();
        include('database_error.php');
        exit();
    }

     //$db ;

    //private function __construct() {}

    // public static function getDB () {
    //     if (!isset(self::$db)) {
    //         try {
    //             self::$db = new PDO(self::$dsn,
    //                                  self::$username,
    //                                  self::$password);
    //         // getting error if the creditials are wrong
    //         } catch (PDOException $e) {
    //             $error_message = $e->getMessage();
    //             return $error_message;
    //            // include('database_error.php');
    //            // exit();
    //         }
    //     }else{
    //         $error_message = false;
    //         return $error_message;
    //     }
    //     return self::$db;
    // }
//}

?>

