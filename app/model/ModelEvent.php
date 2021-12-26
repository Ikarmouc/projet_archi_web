<?php

namespace app\model;


use app\entity\Event;

class ModelEvent extends Model
{
    public function __construct()
    {
        $this->table="event";
        parent::__construct($this->table);
    }

    public function findAll($data=array()) : array {
        $arrayEvent=parent::findAll();

        foreach ($arrayEvent as $event){
            $data[]=new Event($event);
        }
        return $data;
    }

    public function findAllById(int $id,string $param,$data=array()) : array {
        $arrayEvent=parent::findAllById($id,$param);

        foreach ($arrayEvent as $event){
            $data[]=new Event($event);
        }
        return $data;
    }
    public function find(int $id) : array {
        $result=parent::find($id);
        return $result;
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