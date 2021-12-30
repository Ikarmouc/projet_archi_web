<?php

namespace app\model;

use app\config\Database;
use \PDO;



class Model{

    protected string $table;

    private \PDO $connexion;



    public function __construct( ){

        $db = new Database();
        $this->connexion=$db->getConnection();
    }


    /**
     * Find a row in the database from an specified id
     * @param int $id
     * @return array
     */
    public function find(int $id) : array
    {
        $sql="SELECT * FROM ".$this->table." WHERE id_".$this->table."=".$id;
        $retour=$this->connexion->query($sql);
        $content=$retour->fetch(PDO::FETCH_ASSOC);
        return $content;
    }

    /**
     * method to find a spécific row with an custom parameter and value
     * @param string $param
     * @param string $value
     * @return array|false
     */
   public function findByParam(string $param,string $value)
   {
       $sql="SELECT * FROM ".$this->table." WHERE ".$param." = '$value'";
       $retour=$this->connexion->query($sql);
       $content=$retour->fetchAll(PDO::FETCH_ASSOC);
       return $content;
   }


    /**
     * method that return all rows from a table
     * @param $data
     * @return array
     */
    public function findAll($data=array()) : array
    {
        $sql = "Select * FROM " . $this->table;
        $exec=$this->connexion->prepare($sql);
        $exec->execute();
        $data=$exec->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    /**
     * method that return all rows related to a spécific id in the table
     * @param int $id
     * @param string $param
     * @param $data
     * @return array
     */
    public function findAllById(int $id,string $param,$data=array()) : array
    {
        $sql = "Select * FROM " . $this->table . " where id_".$param." = ".$id;
        $exec=$this->connexion->prepare($sql);
        $exec->execute();

        $data=$exec->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    /**
     * method to add a new row in a specific table
     * @param $data
     * @return int
     */
    public function create($data) : int {

            $sql="INSERT INTO ".$this->table."(";
            foreach ($data as $key => $value) {
                unset($data["id"]);
                $sql.="`$key`,";
            }
            $sql=substr($sql,0,-1);
            $sql.=" ) VALUES (";

            // data to add
            foreach ($data as $key => $value) {

                if(is_numeric($value)) {
                    $sql.=$value.",";
                }
                else{
                    $value=str_replace("'","''",$value);
                    $sql.="'$value',";
                }

            }
            $sql=substr($sql,0,-1);
            $sql.=" )";
        // execution of the request
        $return=$this->connexion->exec($sql);
        return $return;
    }


    /**
     * method that delete a specific row by the id
     * @param int $id
     * @return int
     */
    public function delete(int $id) : int {

        $sql="Delete from ".$this->table." where id_".$this->table." = ".$id;
        $request=$this->connexion->exec($sql);

        $result = $request;
        return $result;
    }

    /**
     * method to update an existing row in a table
     * @param $data
     * @param int $id
     * @return int
     */
    public function update($data,int $id) : int {

        $sql="UPDATE ".$this->table." SET ";
        foreach ($data as $key => $value) {
            unset($data["id"]);
            $sql.="`$key` = ";
            if(is_numeric($value)) {
                $sql.=$value.",";
            }
            else{
                $value=str_replace("'","''",$value);
                $sql.="'$value',";
            }
        }
        $sql=substr($sql,0,-1);
        $sql.="  where id_".$this->table."=".$id;
        // execution of the request
        $retour=$this->connexion->exec($sql);
        return $retour;
    }


}