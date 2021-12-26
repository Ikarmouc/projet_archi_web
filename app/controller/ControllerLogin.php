<?php

namespace app\controller;
use app\entity\User;
use app\model\ModelUser;

class ControllerLogin
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelUser();
    }

    /**
     * Controller method to show all user
     * @return void
     */
    public function getAllUsers()
    {
        $listUsers = $this->model->findAll();
        include ("app/view/viewListUsers.php");
    }

    /**
     * Method to get an user by his id
     * @param int $id
     * @return User
     */
    public function getUser(int $id)
    {
        $user = $this->model->find($id);
        return new User($user);
    }

    /**
     * Controller method to edit an user
     * @param int $id
     * @return void
     */
    public function editUser(int $id)
    {

        if(isset($_POST) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) && isset($_POST["username"]))
        {
            $data = array(
                "nom" => htmlspecialchars($_POST["nom"]),
                "prenom" =>htmlspecialchars($_POST["prenom"]),
                "adresse" => htmlspecialchars($_POST["adresse"]),
                "username" => htmlspecialchars($_POST["username"]),
                "email"=>htmlspecialchars($_POST["email"])
            );
            $this->model->update($data,$id);
            if (isset($_SESSION["isAdmin"])&& $_SESSION["isAdmin"] == true)
            {
                header("Location: ./index.php?action=adminControlPanel");
            }else{
                header("Location: ./index.php");
            }
        }else{
            $user = $this->getUser($id);
            include ("app/view/viewEditUser.php");
        }

    }

    /**
     * Controller method to create an account on the app
     * @return void
     */
    public function createUser()
    {
        if($_POST != null && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) && isset($_POST["username"]) && isset($_POST["password"]))
        {
            $data = array(
                "nom" => htmlspecialchars($_POST["nom"]),
                "prenom" => htmlspecialchars($_POST["prenom"]),
                "adresse" => htmlspecialchars($_POST["adresse"]),
                "username" => htmlspecialchars($_POST["username"]),
                "password" => password_hash(htmlspecialchars($_POST["password"]),PASSWORD_DEFAULT),
                "email"=>htmlspecialchars($_POST["email"])
            );
            $this->model->create($data);
            header("Location: ./index.php");
        }else{
            include ("app/view/viewRegister.php");
        }

    }

    /**
     * Return user wanted with username
     * @param string $param
     * @return User
     */
    public function getUserInfo(string $param){
        $data = $this->model->findByParam("username",$param);
        $result = new User($data[0]);
        return $result;
    }

    /**
     * Controller method for the logging system
     * @return void
     */
    public function login(){

        if($_POST)
        {
            $userData = $this->model->findByParam("username",htmlspecialchars($_POST["username"]));
            if ($userData == array())
            {
                $_POST = null;
                header("Location: index.php?action=login");
            }
            else{
                $user = new User($userData[0]);
                if(password_verify(htmlspecialchars($_POST["password"]),$user->getPassword()))
                {
                    session_start();
                    $_SESSION["username"] = htmlspecialchars($_POST["username"]);
                    $_SESSION["id_user"] = $user->getId_user();
                    if ($_POST["username"] == "Admin")
                    {
                        $_SESSION["isAdmin"] = true;
                    }
                    else
                    {
                        $_SESSION["isAdmin"] = false;
                    }
                    $controllerArticle = new ControllerArticle();
                    $controllerArticle->getAll();
                }
            }


        }else{

            include ("app/view/viewLogin.php");
        }
    }

    /**
     * Controller method to logout a user
     * @return void
     */
    public function logout(){
        session_start();
        session_destroy();
        header("location: ../index.php");
    }

    /**
     * Controller method that delete an user
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id)
    {
        $result = $this->model->delete($id);
        header("location: ../index.php?action=adminControlPanel");
    }
}