<?php

require_once('Controller.php');

class DisconnectUserController implements Controller{

    public function handle($request){
        unset($_SESSION['email']);
        session_destroy();

        $_SESSION['message'] = "You are disconnected";

    }

}

?>