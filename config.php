<?php

class Config{
    private static $pdo = NULL;
    public static function dbConnect(){
        if (!(isset(self::$pdo))){
            try{
                $servername = 'localhost';
                $username = 'root';
                $password ='';
                $dbName ='LesAssembleurs_CoronArt';

                self::$pdo = new PDO('mysql:host='. $servername . ';dbname=' . $dbName , $username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION , PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);
            }
            catch(PDOException $e){
                die('Erreur:' . $e.getMessage());
            }
        }
        return self::$pdo;
    }
}

?>