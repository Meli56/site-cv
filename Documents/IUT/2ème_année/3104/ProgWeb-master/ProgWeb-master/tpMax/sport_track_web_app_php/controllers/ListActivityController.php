<?php

require_once('Controller.php');
require_once(__DIR__.'/../model/Users.php');
require_once(__DIR__.'/../model/UsersDAO.php');

class ListActivityController implements Controller{

    public function handle($request){
        if (isset($_SESSION['email'])) {
            $dao = ActivityDAO::getInstance();
            $activities = $dao->findAllUser($_SESSION['email']);
            $_SESSION['acts'] = $activities;
            $_SESSION['message'] = "Ajouté";
        } else {
            $_SESSION['message'] = "Vous devez être connecté(e) pour accéder à cette page.";
            header("Location: index.php?page=user_connect_form");
        }

        
        
    }

}

?>