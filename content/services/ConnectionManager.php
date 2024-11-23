<?php

/**
 * Database connection management class.
 * This class is designed as Singleton pattern.
 * 
 * @author Yuto Saito / w23042608
 */
class ConnectionManager
{
    /** 
     * Self instance.
     * 
     * @var ConnectionManager
     */
    private static $instance = null;

    /** 
     * Database connection.
     * 
     * @var mysqli|false
     */
    private $conn;

    /**
     * Private constructor.
     * Must be called via getInstance method.
     */
    private function __construct()
    {
        $config = require 'DbConfig.php';
        $this->conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['dbname']);
    }

    /**
     * Get instance.
     * 
     * @return ConnectionManager
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new ConnectionManager();
        }
        return self::$instance;
    }

    /**
     * Get database connection.
     * 
     * @return mysqli|false
     */
    public function getConnection()
    {
        return $this->conn;
    }
}
