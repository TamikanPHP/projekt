<?php

class Db 
{

    private static $link;

    private static $setting = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function linkdb($host, $user, $password, $database) {
        if (!isset(self::$link)) {
            self::$link = @new PDO (
                "mysql:host=$host;dbname=$database",
                $user,
                $password,
                self::$setting
            );
        }
    }
    public static function onequestion ($quest, $parameters = array())
    {
        $comeback = self::$link->prepare($quest);
        $comeback->execute($parameters);
        return $comeback->fetch();
    }
    public static function allquestion ($quest, $parameters = array())
    {
        $comeback = self::$link->prepare($quest);
        $comeback->execute($parameters);
        return $comeback->fetchAll();
    }
    public static function alonequestion ($quest, $parameters = array())
    {
        $result = self::onequestion($quest, $parameters);
        return $result[0];
    }
    public static function question($quest, $parameters = array())
    {
        $comeback = self::$link->prepare($quest);
        $comeback->execute($parameters);
        return $comeback->rowCount();
    }
    public static function additem($table, $parameters = array())
    {
        return self::question("INSERT INTO `$table`
        (`". implode('`, `', array_keys($parameters)). 
        "`) VALUES (".str_repeat('?,', count($parameters)-1)."?)",
            array_values($parameters));
    }
    public static function changeitem ($table, $value = array(), $condition, $parameters = array())
    {
        return self::question("UPDATE `$table` SET `".
        implode('` = ?, `', array_keys($value)).
        "` = ? " . $condition,
        array_merge(array_values($value), $parameters ));
    }
    public static function getLastId()
{
        return self::$link->lastInsertId();
}
    
}