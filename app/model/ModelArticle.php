<?php

namespace app\model;

use app\entity\Article;

class ModelArticle extends Model
{
    public function __construct()
    {
        $this->table="article";
        parent::__construct($this->table);
    }

    public function findAll($data=array()) : array {
        $arrayArticles=parent::findAll();
        foreach ($arrayArticles as $article){
            $data[]=new Article($article);
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