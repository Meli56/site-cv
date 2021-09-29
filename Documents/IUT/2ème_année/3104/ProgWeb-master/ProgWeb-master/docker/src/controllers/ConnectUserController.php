<?php
    require_once('Controller.php');
    require_once('./model/User.php');
    require_once('./model/UserDAO.php');
class ConnectUserController implements Controller{


    public function handle($request){
        if(isset($_SESSION['mail'])){
            $_SESSION['message'] = "You are already connected";
        }
        else{
            $mail = $_POST['mail'];
            $password = $_POST['password'];

            $dao = UserDAO::getInstance();
            $u = $dao->find($mail)[0];

            if (isset($u)) {
                if ($password == $u->getPassword()) {
                    // OK Login user
                    $_SESSION['message'] = "You are connected !";
                    $_SESSION['mail']=$u->getMail();
                    $_SESSION['weight']=$u->getWeight();
                    $_SESSION['birthDate']=$u->getBirthDate();
                    $_SESSION['lname']=$u->getLname();
                    $_SESSION['fname']=$u->getFname();
                    $_SESSION['height']=$u->getHeight();
                } else {
                    // NOK Wrong password
                    $_SESSION['message'] = "Wrong Username / Password";
                }
            } else {
                // NOK Not exists
                $_SESSION['message'] = "User not found";
            }
        }
    }
}