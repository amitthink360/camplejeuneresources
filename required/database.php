<?php
date_default_timezone_set('America/New_York');
class Database
{
    private static $dbName = 'camplejeuneresources';
    private static $dbHost = '147.182.189.109';
    private static $dbUsername = 'domain_user';
    //private static $dbUserPassword = 'STXMNZP7rJAlIie0pI5ob74j2XbkuT_3X26a3PPfYzcfe_8MdIjVycE';
    private static $dbUserPassword = 'Jbp=aZb1QZ={96Pi';

    private static $cont = null;

    public function __construct()
    {
        exit('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword, [PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}

?>