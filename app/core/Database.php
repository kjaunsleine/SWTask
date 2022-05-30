<?php

namespace App\Core;

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    /**
     * Upon initialization establishes connection to the database and sets it in $dbh property
     */
    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = [
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new \PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepares sql statement and sets it in $stmt property
     * 
     * @param string $sql
     * 
     * @return void
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Binds values ($value) to statement placeholders ($param) in $stmt
     * 
     * @param string $param
     * @param mixed $value
     * @param null $type
     * 
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Executes statement
     * 
     * @return bool
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * Executes statement and returns from $stmt object all results as an array of objects
     * 
     * @return array
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Returns single result of $stmt as an object
     * 
     * @return object
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Returns result count of $stmt
     * 
     * @return int
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}