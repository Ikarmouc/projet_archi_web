<?php
define("SERVEUR","localhost");
define("USER","root");
define("MDP","");
define("BD","thescienceplace");
define('ROOT',str_replace('index.php','',$_SERVER["SCRIPT_FILENAME"]));

function connexionBd($serveur="localhost",$bd="thescienceplace",$user="root",$mdp = "")
{
    try
    {
        $connexion= new PDO('mysql:host='.$serveur.';dbname='.$bd, $user, $mdp);

        $connexion->exec("SET CHARACTER SET utf8");   //Gestion des accents
    }
        //gestion des erreurs
    catch(Exception $e)
    {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
    }
    return $connexion;
}