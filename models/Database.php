<?php

class Database
{
    
    public static function connection(){
       
        $dbhost = "localhost";
        $dbname = "Recuerdo_1101";
        $dbuser = "root";
        $dbpass = "";
        $charset = "utf8";


        $dsn = "mysql:host={$dbhost};dbname={$dbname};charset={$charset}";

        try{
            $dbh = new PDO($dsn,$dbuser,$dbpass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            
            return $dbh;

        }catch(PDOException $e){
           exit($e->getMessage());
        }
    }
}
 
?>