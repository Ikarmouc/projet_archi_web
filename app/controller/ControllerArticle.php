<?php

namespace app\controller;

use app\entity\Article;
use app\entity\Event;
use app\model\ModelArticle;
use app\model\ModelEvent;
use app\model\ModelReservation;

class ControllerArticle
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelArticle();
    }

    /**
     * Return all articles from the database
     * @return void
     */
    public function getAll()
    {
        $result = $this->model->findAll();

        include ("app/view/getAllArticles.php");
    }

    /**
     * Get an spécific article name
     * @param int $id
     * @return string
     */
    public function getNomArticle(int $id):string
    {
        $article = new Article($this->model->find($id));
        return $article->getNomArticle();
    }

    /**
     * Controller method to get a specific article and related events
     * @param int $id
     * @return void
     */
    public function getArticle(int $id)
    {
        $article = new Article($this->model->find($id));
        $modelEvent = new ModelEvent();
        $modelReservation = new ModelReservation();
        $events = $modelEvent->findAllById($id,"article");
        $reservation = $modelReservation->findAll();

        $currentDate = date('Y-m-d h:i:s');
        include("app/view/viewArticle.php");
    }

    /**
     * Controller method to add a new article
     * @return void
     */
    public function addArticle(){
        if($_POST!= null && isset($_POST['nomArticle']) && isset($_POST['description'])&& isset($_POST['typeArticle']) && isset($_POST['credits']) && isset($_FILES['image']['name']))
        {
            $img = $_FILES['image']['name'];
            $image = copy($_FILES['image']['tmp_name'], './img/'.$img);
            $data = array(
                "nomArticle" => $_POST["nomArticle"],
                "description" => htmlspecialchars($_POST["description"]),
                "typeArticle" => $_POST["typeArticle"],
                "img" => $img,
                "credits" => $_POST["credits"]
            );
            $this->model->create($data);
            header("Location: index.php");
        }else{
            include ("app/view/viewCreateArticle.php");
        }
    }

    /**
     * Controller method to edit a specific article
     * @param int $id
     * @return void
     */
    public function editArticle(int $id)
    {
        $article = new Article($this->model->find($id));
        if($_POST!= null && isset($_POST['nomArticle']) && isset($_POST['description'])&& isset($_POST['typeArticle']) && isset($_POST['credits']))
        {
            if($_FILES['image']['name'] != "")
            {
                $img = $_FILES['image']['name'];
                $image = copy($_FILES['image']['tmp_name'], './img/'.$img);
                $_POST["img"]= $img;
            }
            else
            {
                $img = $article->getImg();
                $_POST["img"]= $img;
            }

            $data = array(
                "id_article" => $id,
                "nomArticle" => $_POST["nomArticle"],
                "description" => $_POST["description"],
                "typeArticle" => $_POST["typeArticle"],
                "img" => $_POST["img"],
                "credits" => $_POST["credits"]
            );

            $this->model->update($data,$id);
            header("Location: index.php?getArticle&id_article=".$id);
        }
        else
        {
            $id_article = $article->getId_article();
            $nomArticle = $article->getNomArticle();
            $description = $article->getDescription();
            $typeArticle = $article->getTypeArticle();
            $img = $article->getImg();
            $credits = $article->getCredits();
        }
        include ("app/view/viewEditArticle.php");
    }

    /**
     * Controller method to delete an article
     * @param int $id
     * @return void
     */
    public function deleteArticle(int $id)
    {
        $this->model->delete($id);
        header("Location: index.php");
    }

}