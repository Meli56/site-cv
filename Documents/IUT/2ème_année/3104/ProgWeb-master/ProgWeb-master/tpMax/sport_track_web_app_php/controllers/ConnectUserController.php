<?php

require_once('Controller.php');
require_once(__DIR__.'/../model/Users.php');
require_once(__DIR__.'/../model/UsersDAO.php');



class ConnectUserController implements Controller{

    public function handle($request){
        if (isset($_SESSION['email'])) {
            $_SESSION['message'] = "Vous êtes déjà connecté(e)";
        
        } else {
            $mail = $_POST['email'];
            $pass = $_POST['password'];

            $dao = UsersDAO::getInstance();
            $u = $dao->find($mail);

            if (isset($u)) {
                if (password_verify($pass, $u->getPassword())) {
                    // OK Login user
                    $_SESSION['message'] = "Vous êtes bien connecté(e). Bienvenue sur votre espace";

                    $_SESSION['email']=$u->getEmail();
                    $_SESSION['weight']=$u->getWeight();
                    $_SESSION['birthdate']=$u->getBirthDate();
                    $_SESSION['name']=$u->getName();
                    $_SESSION['fname']=$u->getFname();
                    $_SESSION['size']=$u->getSize();
                } else {
                    // NOK Wrong password
                    $_SESSION['message'] = "Ces identifiants ne correspondent pas";
                }
            } else {
                // NOK Not exists
                $_SESSION['message'] = "Ces identifiants ne correspondent pas";
            }
        }
        
    }

}

?>