<?php

namespace app\model;

use app\entity\User;

class ModelUser extends Model
{
    public function __construct()
    {
        $this->table="user";
        parent::__construct($this->table);
    }

    public function find(int $id) : array {
        $result=parent::find($id);
        return $result;
    }

    public function findByParam(string $param,string $value) : array {
        $result=parent::findByParam($param,$value);
        return $result;
    }

    public function findAll($data=array()) : array {
        $arrayUsers=parent::findAll();

        foreach ($arrayUsers as $user){
            $data[]=new User($user);
        }
        return $data;
    }

    public function create($data): int
    {

        $result = parent::create($data);
        return $result;
    }

    public function delete(int $id): int
    {
        $result = parent::delete($id);
        return $result;
    }

    public function update($data,$id): int
    {
        $result = parent::update($data,$id);
        return $result;
    }

}