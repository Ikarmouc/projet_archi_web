<?php
use app\controller\ControllerArticle;
use app\controller\ControllerEvent;
use app\controller\ControllerLogin;
use app\controller\ControllerReservation;

//autoload method
function autoLoad($classe)
{
    $classe=str_replace('\\','/',$classe);
    require $classe . '.php';
}
spl_autoload_register('autoLoad'); //fin Autoload

// Creation controllers for actions
$controllerArticle = new ControllerArticle();
$controllerLogin = new ControllerLogin();
$controllerEvent = new ControllerEvent();
$controllerReservation = new ControllerReservation();


if (isset($_GET["action"]))
{
    switch ($_GET["action"]){
        case "addArticle":
            $controllerArticle->addArticle();
            break;
        case "getArticle":
            if (isset($_GET["id_article"])){
                $controllerArticle->getArticle($_GET["id_article"]);
            }
            break;
        case "editArticle":
            if (isset($_GET["id_article"])) {
                $controllerArticle->editArticle($_GET["id_article"]);
            }
            break;
        case "deleteArticle":
            if (isset($_GET["id_article"])) {
                $controllerArticle->deleteArticle($_GET["id_article"]);
            }
            break;
        case "createEvent":
            if (isset($_GET["id_article"])) {
                $controllerEvent->createEvent($_GET["id_article"]);
            }
            break;
        case "getEvent":
            if (isset($_GET["id_event"])){
                //$controllerArticle->getEvent($_GET["id_article"]);
            }
            break;
        case "editEvent":
            if (isset($_GET["id_event"])) {
                $controllerEvent->editEvent($_GET["id_event"]);
            }
            break;
        case "deleteEvent":
            if (isset($_GET["id_event"])) {
                $controllerEvent->deleteEvent($_GET["id_event"]);
            }
            break;
        case "addReservation":
            if (isset($_GET["id_event"])) {
                $controllerReservation->addreservation($_GET["id_event"]);
            }
            break;
        case "listReservation":
            if (isset($_GET["id_user"]) || isset($_SESSION['isAdmin'])) {
                $controllerReservation->listReservationUser($_GET["id_user"]);
            }else{
                if (isset($_GET["id_event"]) || isset($_SESSION['isAdmin']))
                {
                    $controllerEvent->listReservationEvent($_GET["id_event"]);
                }
                else{
                    $controllerReservation->getReservations();
                }
            }
            break;
        case "editReservation":
            if (isset($_GET["id_reservation"]))
                $controllerReservation->editReservation($_GET["id_reservation"]);
            break;
        case "cancelReservation":
            if (isset($_GET["id_reservation"]))
                $controllerReservation->deleteReservation($_GET["id_reservation"]);
            break;
        case "login":
            $controllerLogin->login();
            break;
        case "logout":
            $controllerLogin->logout();
            break;
        case "register":
            $controllerLogin->createUser();
            break;
        case "adminControlPanel":
            $controllerLogin->getAllUsers();
        case "editUser":
            if (isset($_GET["id_user"]))
            {
                $controllerLogin->editUser($_GET["id_user"]);
            }
            break;
        case "deleteUser":
            if (isset($_GET["id_user"]))
            {
                $controllerLogin->deleteUser($_GET["id_user"]);
            }
            break;

        default:
            include ("app/view/viewPageNotFound.php");
            break;

    }
}elseif (isset($_GET))
{
    $controllerArticle->getAll();
}

?>
