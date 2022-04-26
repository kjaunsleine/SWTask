<?php
namespace SWTask\DatabaseConnection;

/**
 * Ensures database connection
 */
abstract class DbConnect
{
    /**
     * Connects to the database
     * 
     * @return object
     */
    protected function connect()
    {
        try {
            $username = "root";
            $password = "";
            $dbh = new \PDO('mysql:host=localhost;dbname=products', $username, $password);
            return $dbh;
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
