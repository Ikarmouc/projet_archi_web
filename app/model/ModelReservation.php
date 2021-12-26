<?php

namespace app\model;

use app\entity\Reservation;

class ModelReservation extends Model
{
    public function __construct()
    {
        $this->table="reservation";
        parent::__construct($this->table);
    }

    public function findAll($data=array()) : array {
        $arrayReservation=parent::findAll();

        foreach ($arrayReservation as $event){
            $data[]=new Reservation($event);
        }
        return $data;
    }

    public function findAllById(int $id,string $param,$data=array()) : array {
        $arrayReservation=parent::findAllById($id,$param);
        foreach ($arrayReservation as $reservation){
            $data[]=new Reservation($reservation);
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