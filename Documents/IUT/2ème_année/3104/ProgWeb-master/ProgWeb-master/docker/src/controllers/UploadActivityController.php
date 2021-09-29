<?php
require_once('Controller.php');
require_once(__DIR__.'/../model/Users.php');
require_once(__DIR__.'/../model/UsersDAO.php');
require_once(__DIR__.'/../model/Activity.php');
require_once(__DIR__.'/../model/ActivityDAO.php');
require_once(__DIR__.'/../model/ActivityEntry.php');
require_once(__DIR__.'/../model/ActivityEntryDAO.php');


class UploadActivityController implements Controller
{
    private $uploaddir = __DIR__.'/../upload';
    private $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    private static $idData = 0;

    public function handle($request)
    {
        if (isset($_SESSION['email'])) {
            if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0){
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $this->uploadfile)) {
                    // Read the JSON file
                    $json = file_get_contents($_FILES['file']['name']);
                    // Decode the JSON file
                    $json_data = json_decode($json, true);

                    if(($json_data['activity'] != null) && ($json_data['activity']['description'] != null)  && ($json_data['activity']['date'] != null)){

                        $idAct = $_FILES['userfile']['name'];
                        $date = $json_data['activity']['date'];
                        $desc = $json_data['activity']['description'];


                        $Act = new Activity();

                        $maxF=0;
                        $minF=300;
                        $cumul=0;
                        $nbData=0;



                        $actDao = ActivityDAO::getInstance();
                        $actDao->insert($Act);
                    }

                }
            }
            


        }



       
    }

    private function calculDuree($t1,$t2){
        $tab=explode(":", $t1); 
       $tab2=explode(":", $t2); 
       
       $h=$tab[0]; 
       $m=$tab[1]; 
       $s=$tab[2]; 
       $h2=$tab2[0]; 
       $m2=$tab2[1]; 
       $s2=$tab2[2];  
      
       if ($h2>$h) { 
       $h=$h+24; 
       }  
       if ($m2>$m) { 
       $m=$m+60; 
       $h2++; 
       } 
       if ($s2>$s) { 
       $s=$s+60; 
       $m2++; 
       } 
       
       $ht=$h-$h2; 
       $mt=$m-$m2; 
       $st=$s-$s2; 
       if (strlen($ht)==1) { 
       $ht="0".$ht; 
       }  
       if (strlen($mt)==1) { 
       $mt="0".$mt; 
       }  
       if (strlen($st)==1) { 
       $st="0".$st; 
       }  
       
       return $ht.":".$mt.":".$st;  

    }
}
?>

// Read the JSON file
        $json = file_get_contents($_FILES['file']['name']);
        // Decode the JSON file
        $json_data = json_decode($json, true);
        // Display data
        //debug echo '<pre>' . print_r($json_data, true) . '</pre>';

        $i = 0;
        while ($i < sizeof($json_data['data'])) {
            $parcours[$i][0] = $json_data['data'][$i]['latitude'];
            $parcours[$i][1] = $json_data['data'][$i]['longitude'];
            $i = $i + 1;
        }

        //debug echo '<pre>' . print_r($parcours, true) . '</pre>';



        $Test = new CalculDistanceImpl();
        $d = $Test->calculDistanceTrajet($parcours);

        echo '<pre>' . print_r($d, true) . '</pre>';