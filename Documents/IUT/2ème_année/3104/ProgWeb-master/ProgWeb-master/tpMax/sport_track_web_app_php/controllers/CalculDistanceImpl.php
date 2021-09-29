<?php 

    require_once("CalculDistance.php");
    
    class CalculDistanceImpl implements CalculDistance {

        private $R = 6378.137;
        
        public function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2) {
            //echo print_r($lat1 . ",", 1);
            $radLat1 = $this->toRad($lat1);
            //echo print_r($radLat1 . "\n", 1);

            //echo print_r($long1 . ",", 1);
            $radLong1 = $this->toRad($long1);
            //echo print_r($radLong1 . "\n", 1);

            //echo print_r($lat2 . ",", 1);
            $radLat2 = $this->toRad($lat2);
            //echo print_r($radLat2 . "\n", 1);

            //echo print_r($long2 . ",", 1);
            $radLong2 = $this->toRad($long2);
            //echo print_r($radLong2 . "\n", 1);


            $d=$this->R*acos(sin($radLat2)*sin($radLat1)+cos($radLat2)*cos($radLat1)*cos($radLong2-$radLong1));

            return $d;
        }

        public function calculDistanceTrajet(Array $parcours) {
            $distance = 0.0;
            for ($i = 0; $i <= sizeof($parcours)-2; $i++) {
                $distance += $this->calculDistance2PointsGPS($parcours[$i]['latitude'], $parcours[$i]['longitude'], $parcours[$i+1]['latitude'], $parcours[$i+1]['longitude']);
            }

            return $distance;
            
        }

        public function toRad($DegAngle) {
            return $DegAngle * M_PI / 180;
        }

        public function __construct() {
            $file = 'data.json';
            $data = file_get_contents($file);
            $obj = json_decode($data, true);

            $test = $this->calculDistanceTrajet($obj['data']);

            echo $test;
        }
        
    }


    $t = new CalculDistanceImpl();

    //$rep = $t->calculDistance2PointsGPS(47.6586772,-2.7599079,48.3905283,-4.486008);
    //echo $rep;



?>