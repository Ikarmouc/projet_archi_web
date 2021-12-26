<?php

namespace app\controller;

use app\entity\Event;
use app\entity\Reservation;
use app\model\ModelEvent;
use app\model\ModelReservation;

class ControllerReservation
{
    private $model;


    public function __construct()
    {
        $this->model = new ModelReservation();
    }

    /**
     * Controller method to add a new reservation
     * @param int $id_event
     * @return void
     */
    public function addreservation(int $id_event){
        session_start();
        $eventController = new ControllerEvent();
        $userController = new ControllerLogin();
        $event = $eventController->getEvent($id_event);
        $modelEvent = new ModelEvent();

        if (isset($_POST["nbplaces"])){
            if($_POST["nbplaces"] > $event->getRemainingPlaces()){
                $_POST = null;
                $error = "Nombre de places supérieures aux places restantes pour cet evenement";
                include ("app/view/viewAddReservation.php");
            }
            else
            {
                $user = $userController->getUserInfo($_SESSION["username"]);

                $nbPlaces = $_POST["nbplaces"];
                $data = array(
                    "id_user" => $user->getId_user(),
                    "id_event"=> $id_event,
                    "nbplaces" => $nbPlaces
                );

                $this->model->create($data);
                $remainingPlaces = $event->getRemainingPlaces();
                $remainingPlaces-=$nbPlaces;


                $dataEvent = array(
                    "remainingPlaces" => $remainingPlaces,
                );

                $modelEvent->update($dataEvent,$event->getId_event());

                header("Location: index.php?action=getArticle&id_article=".$event->getId_article());

            }
        }else{
            include ("app/view/viewAddReservation.php");
        }
    }

    /**
     * Controller method to edit a reservation
     * @param $id_reservation
     * @return void
     */
    public function editReservation($id_reservation)
    {

        $reservation = new Reservation($this->model->find($id_reservation));
        $controllerEvent = new ControllerEvent();
        $event = $controllerEvent->getEvent($reservation->getId_event());
        $modelEvent = new ModelEvent();
        if (isset($_POST["nbplaces"])) {
            if ($_POST["nbplaces"] > $event->getRemainingPlaces()) {
                $_POST = null;
                $error = "Nombre de places supérieures aux places restantes pour cet evenement";
                include("app/view/viewEditUser.php");
            } else {
                // case new amount of places > actual amount of places
                if ($_POST["nbplaces"] > $reservation->getNbplaces()) {
                    $placesDiff = $_POST["nbplaces"] -= $reservation->getNbplaces();
                    $remainingPlaces = $event->getRemainingPlaces();
                    $remainingPlaces -= $placesDiff;
                    $newPlaces = $reservation->getNbplaces();
                    $newPlaces+=$_POST["nbplaces"];
                    if ($remainingPlaces >= 0) {
                        $dataEvent = array(
                            "remainingPlaces" => $remainingPlaces,
                        );
                        $modelEvent->update($dataEvent, $event->getId_event());
                        $dataReservation = array(
                            "nbplaces" => $newPlaces
                        );
                        $this->model->update($dataReservation,$id_reservation);
                        header("Location: index.php?action=listReservation");

                    } else {
                        $error = "Nombre de places supérieures aux places restantes pour cet evenement";
                        include("app/view/viewAddReservation.php");
                    }
                    // case new amount of places < actual amount of places
                } elseif ($_POST["nbplaces"] < $reservation->getNbplaces()) {
                    $placesDiff = $reservation->getNbplaces();
                    $placesDiff -= $_POST["nbplaces"];
                    $remainingPlaces = $event->getRemainingPlaces();
                    $remainingPlaces += $placesDiff;
                    if ($remainingPlaces >= 0) {
                        $dataEvent = array(
                            "remainingPlaces" => $remainingPlaces
                        );
                        $modelEvent->update($dataEvent, $event->getId_event());
                        $dataReservation = array(
                            "nbplaces" => htmlspecialchars($_POST["nbplaces"])
                        );
                        $this->model->update($dataReservation,$id_reservation);
                        header("Location: index.php?action=listReservation");

                    } else {
                        $error = "Nombre de places supérieures aux places restantes pour cet evenement";
                        include("app/view/viewAddReservation.php");
                    }

                }elseif ($_POST["nbplaces"] == $reservation->getNbplaces()){
                    header("Location: index.php?action=listReservation");
                }
            }
        }else{
            include("app/view/viewEditReservation.php");
        }
    }

    /**
     * Controller method to show reservation of the logged user
     * @return void
     */
    public function getReservations(){
        session_start();
        $controllerLogin = new ControllerLogin();
        $controllerEvent = new ControllerEvent();
        $listReservation = array();

        $idUser = $controllerLogin->getUserInfo($_SESSION["username"])->getId_user();
        $reservations = $this->model->findByParam("id_user",$idUser);

        foreach ($reservations as $reservation){
            $event = $controllerEvent->getEvent($reservation["id_event"]);
            $nbplaces = $reservation["nbplaces"];

            $data = array(
                "id_reservation"=>$reservation["id_reservation"],
                "event" => $event->getTypeEvent(),
                "dateEvent" => $event->getDateEvent(),
                "nbPlaces" => $nbplaces
            );
            array_push($listReservation,$data);
        }
        include ("app/view/viewListReservationUser.php");
    }

    /**
     * Admin controller method to show reservation from a user
     * @param int $id_user
     * @return void
     */
    public function listReservationUser(int $id_user)
    {
        session_start();
        $controllerLogin = new ControllerLogin();
        $controllerEvent = new ControllerEvent();
        $listReservation = array();

        $reservations = $this->model->findByParam("id_user",$id_user);

        foreach ($reservations as $reservation){
            $event = $controllerEvent->getEvent($reservation["id_event"]);
            $nbplaces = $reservation["nbplaces"];

            $data = array(
                "id_reservation"=>$reservation["id_reservation"],
                "event" => $event->getTypeEvent(),
                "dateEvent" => $event->getDateEvent(),
                "nbPlaces" => $nbplaces
            );
            array_push($listReservation,$data);
        }
        include ("app/view/viewListReservationUser.php");
    }

    /**
     * Controller method to delete a reservation
     * @param $id_reservation
     * @return void
     */
    public function deleteReservation($id_reservation){
        $reservation = new Reservation($this->model->find($id_reservation));
        $controllerEvent = new ControllerEvent();
        $event = $controllerEvent->getEvent($reservation->getId_event());
        $modelEvent = new ModelEvent();
        $remainingPlaces= $event->getRemainingPlaces();
        $remainingPlaces+=$reservation->getNbplaces();

        $data = array(
            "remainingPlaces"=>$remainingPlaces
        );
        $modelEvent->update($data,$reservation->getId_event());

        $this->model->delete($id_reservation);
        header("Location: index.php?action=listReservation");

    }
}