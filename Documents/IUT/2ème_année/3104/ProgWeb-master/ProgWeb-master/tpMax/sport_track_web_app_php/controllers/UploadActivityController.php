<?php

require_once('Controller.php');
require_once(__DIR__.'/../model/Users.php');
require_once(__DIR__.'/../model/UsersDAO.php');
require_once(__DIR__.'/../model/Activity.php');
require_once(__DIR__.'/../model/ActivityDAO.php');
require_once(__DIR__.'/../model/ActivityEntry.php');
require_once(__DIR__.'/../model/ActivityEntryDAO.php');

class UploadActivityController implements Controller{

    public function handle($request){
        if (isset($_SESSION['email'])) {
            
            if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0){

                 // Testons si l'extension est autorisée
                 $infosfichier = pathinfo($_FILES['myFile']['name']);
                 $extension_upload = $infosfichier['extension'];
                 $extensions_autorisees = array('json');
                 if (in_array($extension_upload, $extensions_autorisees))
                 {
                    $json = file_get_contents($_FILES['monfichier']['tmp_name']);
                    $content = json_decode($json);  
                    
                    if(($content['activity'] != null) && ($content['activity']['description'] != null)  && ($content['activity']['date'] != null)){

                        $randomNbM1 = rand(1, 143);
                        $randomNbM2 = rand(1, 132);
                        $randomNbD = rand(2, 100);

                        $newActId = intval($randomNbM1 * $randomNbM2 / $randomNbD);
                        $newDate = $content['activity']['date'];
                        $newDesc = $content['activity']['description'];


                        $newAct = new Activity($newActId, $newDate, $newDesc, $_SESSION['mail']);

                        $actDao = ActivityDAO::getInstance();
                        $actDao->insert($newAct);

                        if($content['data'] != null){

                            foreach($content['data'] as $data){

                                if(($content['time'] != null)  && ($content['cardio_frequency'] != null)  && ($content['latitude'] != null)  && ($content['longitude'] != null) && ($content['altitude'] != null)){
                                        
                                    $randomNbM1 = rand(1, 143);
                                    $randomNbM2 = rand(1, 132);
                                    $randomNbD = rand(2, 100);

                                    $newActEntId = intval($randomNbM1 * $randomNbM2 / $randomNbD);
                                    $newTime = $data['time'];
                                    $newCF = $data['cardio_frequency'];
                                    $newLat = $data['latitude'];
                                    $newLong = $data['longitude'];
                                    $newAlt = $data['altitude'];
                                    $newActId_ref = $newActId;

                                    $newActEnt = new ActivityEntry($newActEntId, $newTime, $newCF, $newLat, $newLong, $newAlt, $newActId_ref);

                                    $actEntDao = ActivityEntryDAO::getInstance();
                                    $actEntDao->insert($newActEnt);

                                }else{
                                    $err = true;
                                }
                            }
                        }
                    }
                  
                 }
            }

        
        } else {
            $_SESSION['message'] = "Vous devez être connecté(e) pour accéder à cette page.";
            header("Location: index.php?page=user_connect_form");
        }
    }
}
?>