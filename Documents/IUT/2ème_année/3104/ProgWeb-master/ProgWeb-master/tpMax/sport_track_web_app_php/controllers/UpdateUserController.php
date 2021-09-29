<?php

require_once('Controller.php');
require_once(__DIR__.'/../model/Users.php');
require_once(__DIR__.'/../model/UsersDAO.php');



class UpdateUserController implements Controller{

    public function handle($request){
        if (isset($_SESSION['email'])) {
            
            $dao = UsersDAO::getInstance();
            $oldUserData = $dao->find($_SESSION['email']);

            if (empty($_POST['name'])) {
                $n = $oldUserData->getName();
            } else $n = strip_tags($_POST['name']);
            
            if (empty($_POST['fname'])) {
                $fn = $oldUserData->getFname();
            } else $fn = strip_tags($_POST['fname']);
            
            if (empty($_POST['birthdate'])) {
                $birth = $oldUserData->getBirthDate();
            } else $birth = strip_tags($_POST['birthdate']);

            if (isset($_POST['gender'])) {
                if (!is_numeric($_POST['gender'])) {
                    $g = $oldUserData->getGender();
                } else {
                    $g = $_POST['gender'];
                }
            } else $g = $oldUserData->getGender();

            if (isset($_POST['size'])) {
                if (!is_numeric($_POST['size'])) {
                    $s = $oldUserData->getSize();
                } else {
                    $s = $_POST['size'];
                }
            } else $s = $oldUserData->getSize();

            if (isset($_POST['weight'])) {
                if (!is_numeric($_POST['weight'])) {
                    $w = $oldUserData->getWeight();
                } else {
                    $w = $_POST['weight'];
                }
            } else $w = $oldUserData->getWeight();

            if (isset($_POST['email'])) {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $mail = $oldUserData->getEmail();
                } else {
                    $mail = $_POST['email'];
                }
            } else $mail = $oldUserData->getEmail();
            
            if (isset($_POST['password'])) {
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else $pass = $oldUserData->getPassword();


            $newUserData = new Users();
            $newUserData->init($n, $fn, $birth, $g, $s, $w, $mail, $pass);

            $dao->update($newUserData, $_SESSION['email']);

            $u = $dao->find($mail);

            $_SESSION['email']=$u->getEmail();
            $_SESSION['weight']=$u->getWeight();
            $_SESSION['birthdate']=$u->getBirthDate();
            $_SESSION['name']=$u->getName();
            $_SESSION['fname']=$u->getFname();
            $_SESSION['size']=$u->getSize();

            $_SESSION['message'] = "Votre profil a été mis à jour !";
        } else {
            $_SESSION['message'] = "Vous devez être connecté(e) pour accéder à cette page.";
            header("Location: index.php?page=user_connect_form");
        }
        
    }

}

?>