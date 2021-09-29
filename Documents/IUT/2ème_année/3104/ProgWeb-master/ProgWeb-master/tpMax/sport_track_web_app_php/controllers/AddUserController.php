<?php

require_once('Controller.php');
require_once(__DIR__.'/../model/Users.php');
require_once(__DIR__.'/../model/UsersDAO.php');


class AddUserController implements Controller{

    public function handle($request){
        if (isset($_SESSION['email'])) {
            $_SESSION['message'] = "Erreur vous êtes déjà connecté(e)";
            header("Location: index.php?page");
        
        } else {
            $error = false;

            if (empty($_POST['name'])) {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié de nom";
                $error = true;
            } else {
                $n = strip_tags($_POST['name']);
            }

            if (empty($_POST['fname'])) {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié de prénom";
                $error = true;
            } else {
                $fn = strip_tags($_POST['fname']);
            }

            if (empty($_POST['birthdate'])) {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié de date de naissance";
                $error = true;
            } else {
                $birth = strip_tags($_POST['birthdate']);
            }

            if (isset($_POST['gender'])) {
                if (!is_numeric($_POST['gender'])) {
                    $_SESSION['message'] = "Erreur Le genre est invalide.";
                    $error = true;
                } else {
                    $g = $_POST['gender'];
                }
            } else {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié de genre";
                $error = true;
            }

            if (isset($_POST['size'])) {
                if (!is_numeric($_POST['size'])) {
                    $_SESSION['message'] = "Erreur La taille est invalide.";
                    $error = true;
                } else {
                    $s = $_POST['size'];
                }
            } else {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié de taille";
                $error = true;
            }

            if (isset($_POST['weight'])) {
                if (!is_numeric($_POST['weight'])) {
                    $_SESSION['message'] = "Erreur Le poids est invalide.";
                    $error = true;
                } else {
                    $w = $_POST['weight'];
                }
            } else {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié de poids.";
                $error = true;
            }

            if (isset($_POST['email'])) {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['message'] = "Erreur Votre email n'est pas valide";
                    $error = true;
                } else {
                    $mail = $_POST['email'];
                }
            } else {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié d'e-mail";
                $error = true;
            }
            
            if (isset($_POST['password'])) {
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $_SESSION['message'] = "Erreur Vous n'avez pas spécifié de mot de passe";
                $error = true;
            }

            if (!$error) {
                $user = new Users();
                $user->init($n, $fn, $birth, $g, $s, $w, $mail, $pass);
    
                $dao = UsersDAO::getInstance();
                $dao->insert($user);

                // Getting user info
                $u = $dao->find($mail);
    
                $_SESSION['email']=$u->getEmail();
                $_SESSION['weight']=$u->getWeight();
                $_SESSION['birthdate']=$u->getBirthDate();
                $_SESSION['name']=$u->getName();
                $_SESSION['fname']=$u->getFname();
                $_SESSION['size']=$u->getSize();

                $_SESSION['message'] = "Bienvenue sur votre nouveau compte SportTrack";
            }
            
        }
    }
}

?>