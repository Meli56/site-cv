<?php
    require_once('Controller.php');
    require_once('./model/User.php');
    require_once('./model/UserDAO.php');

    class AddUserController implements Controller{
        public function handle($request){
            $array = [];
            $error= false;
            $dao = UserDAO::getInstance();
            if(isset($_SESSION['mail'])) {
                $_SESSION['msg'] = "You are already connected";
            }
            elseif ($dao->find($_POST['mail'])){
                $_SESSION['message'] = "User already exist";
            }
            else{
                if(empty($_POST['fname'])) $error = true;
                else $array['fname'] = strip_tags($_POST['fname']);

                if(empty($_POST['lname'])) $error = true;
                else $array['lname'] = strip_tags($_POST['lname']);

                if(empty($_POST['birthDate'])) $error = true;
                else {
                    $array['birthDate'] = str_replace("-","/",$_POST['birthDate']);
                }

                if(empty($_POST['gender'])) $error = true;
                else $array['gender'] = strip_tags($_POST['gender']);

                if(empty($_POST['height'])) $error = true;
                else {
                    if(is_numeric($_POST['height'])){
                        $array['height'] = strip_tags($_POST['height']);
                    }
                }
                if(empty($_POST['weight'])) $error = true;
                else {
                    if(is_numeric($_POST['weight'])){
                        $array['weight'] = strip_tags($_POST['weight']);
                    }
                }
                if(empty($_POST['mail'])) $error = true;
                else {
                    $array['mail'] = strip_tags($_POST['mail']);
                }

                if(empty($_POST['password'])) $error = true;
                else $array['passwd'] = strip_tags($_POST['password']);

            }

            if($error) $_SESSION['message'] = "Error : One of your values are wrong";
            else{
                $user = new User();
                $user->init($array);
                $dao = UserDAO::getInstance();

                $dao->insert($user);

                // Getting user info
                $u = $dao->find($array['mail']);

                setcookie("qzdqzd","test");
                $_COOKIE["qlhvzdlqu"] = "test";
               /*
                $_SESSION['mail']=$u->getMail();
                $_SESSION['weight']=$u->getWeight();
                $_SESSION['birthdate']=$u->getBirthDate();
                $_SESSION['name']=$u->getName();
                $_SESSION['fname']=$u->getFname();
                $_SESSION['height']=$u->getHeight();
                */
            }
        }
    }