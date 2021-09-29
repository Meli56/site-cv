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

    public function handle($request)
    {
        if (isset($_SESSION['email'])) {
            if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0){
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $this->uploadfile)) {
                    // Read the JSON file
                    $json = file_get_contents($_FILES['file']['name']);
                    // Decode the JSON file
                    $json_data = json_decode($json, true);

                }
            }
            


        }



       
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