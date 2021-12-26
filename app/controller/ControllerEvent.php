<?php

namespace app\controller;

use app\entity\Article;
use app\entity\Event;
use app\entity\User;
use app\model\ModelEvent;
use app\model\ModelReservation;
use app\model\ModelUser;

class ControllerEvent
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelEvent();
    }

    /**
     * method to get an event used for other controllers
     * @param int $id_event
     * @return Event
     */
    public function getEvent(int $id_event){
        $event = new Event($this->model->find($id_event));
        return $event;
    }

    /**
     * Controller method to add an event
     * @param int $idArticle
     * @return void
     */
    public function createEvent(int $idArticle){
        $controllerArticle = new ControllerArticle();
        $nomArticle = $controllerArticle->getNomArticle($idArticle);
        if(isset($_POST['typeEvent']) && isset($_POST['description']) &&isset($_POST['placesLimit'])&&isset($_GET["id_article"])&&isset($_POST['dateEvent']))
        {
            $typeEvent = htmlspecialchars($_POST['typeEvent']);
            $description = htmlspecialchars($_POST['description']);
            $placesLimit = htmlspecialchars($_POST['placesLimit']);
            $articleId = htmlspecialchars($_GET["id_article"]);
            $remainingPlaces = $placesLimit;
            $dateEvent = htmlspecialchars($_POST['dateEvent'].":00");
            $dateEvent = str_replace("T"," ",$dateEvent);

            $data = array(
                "typeEvent" => $typeEvent,
                "id_article" => $articleId,
                "description" => $description,
                "remainingPlaces" => $placesLimit,
                "placesLimit" => $placesLimit,
                "dateEvent" => $dateEvent
            );
            $this->model->create($data);
            header("Location: index.php?action=getArticle&id_article=".$_GET["id_article"]);
        }else{
            include ("app/view/viewCreateEvent.php");
        }


    }

    /**
     * Controller method to edit an event
     * @param int $id
     * @return void
     */
    public function editEvent(int $id)
    {
        $controllerArticle = new ControllerArticle();
        $event = new Event($this->model->find($id));
        $article = $controllerArticle->getNomArticle($event->getId_article());
        $dateEventConvert = str_replace(" ","T",$event->getDateEvent());
        $event->setDateEvent($dateEventConvert);
        if(isset($_POST['typeEvent']) && isset($_POST['description']) &&isset($_POST['placesLimit'])&&isset($_GET["id_event"])&&isset($_POST['dateEvent']))
        {
            $typeEvent = htmlspecialchars($_POST['typeEvent']);
            $description = htmlspecialchars($_POST['description']);
            $placesLimit = htmlspecialchars($_POST['placesLimit']);
            $articleId = $event->getId_article();
            $remainingPlaces = $placesLimit;
            $dateEvent = htmlspecialchars($_POST['dateEvent']);
            $dateEvent = str_replace("T"," ",$dateEvent);

            $data = array(
                "id_event" => $id,
                "typeEvent" => $typeEvent,
                "description" => $description,
                "remainingPlaces" => $placesLimit,
                "placesLimit" => $placesLimit,
                "dateEvent" => $dateEvent
            );

            $this->model->update($data,$id);
            header("Location: index.php?action=getArticle&id_article=".$event->getId_article());
        }else{
            include ("app/view/viewEditEvent.php");
        }
    }

    /**
     * method to get an event used for other controllers
     * @param int $idArticle
     * @return array|false
     */
    public function getEventsFromArticle(int $idArticle)
    {
        $result = $this->model->findByParam("id_article",$idArticle);
        return $result;
    }

    public function listReservationEvent($id_event){
       $modelReservation = new ModelReservation();
       $event = new Event($this->model->find($id_event));
       $modelUser = new ModelUser();
       $listReservations = $modelReservation->findByParam("id_event",$id_event);
       $reservationsEvent = array();
       foreach ($listReservations as $reservation) {
           $user = new User($modelUser->find($reservation["id_user"]));

           $data = array(
               "id_reservation" => $reservation["id_reservation"],
               "username"=> $user->getNom()." ".$user->getPrenom(),
               "nbPlaces" => $reservation["nbplaces"]
           );
           array_push($reservationsEvent,$data);
       }
       include ("app/view/viewListReservationEvent.php");
    }
    /**
     * Controller method to delete an event
     * @param int $id
     * @return int
     */
    public function deleteEvent(int $id)
    {
        $event = new Event($this->model->find($id));
        $return = $this->model->delete($id);
        header("Location: index.php?action=getArticle&id_article=".$event->getId_article());
        return $return;
    }


}