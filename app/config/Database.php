<?php

namespace app\config;


class Database{
 
    // specify your own database credentials
    private string $_host = "localhost";
    private string $_db_name = "thescienceplace";
    private string $_username = "root";
    private string $_password = "";
    private \PDO $_conn;


    /**
     * Get the database connection
     * @return \PDO
     */
    public function getConnection() : \PDO {
        try{
            $this->_conn = new \PDO("mysql:host=" . $this->_host . ";dbname=" . $this->_db_name, $this->_username, $this->_password);
            $this->_conn->exec("set names utf8");
        }catch(\PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->_conn;
    }
}
?>