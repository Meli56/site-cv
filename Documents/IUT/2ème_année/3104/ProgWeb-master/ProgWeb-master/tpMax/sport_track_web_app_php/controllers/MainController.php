<?php
require('Controller.php');

class MainController implements Controller{

    public function handle($request){
        if (!isset($_SESSION['email'])) {
            $_SESSION['message'] = "Connectez-vous ou créez un compte pour utiliser SportTrack !";
            header("Location: index.php?page=user_connect_form");
        }
    }
}
?>
