<?php
class CalculDistanceImpl implements CalculDistance{


    /**
    * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
    * @param float $lat1 Latitude du premier point GPS
    * @param float $long1 Longitude du premier point GPS
    * @param float $lat2 Latitude du second point GPS
    * @param float $long2 Longitude du second point GPS
    * @return float La distance entre les deux points GPS
    */
    public static function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2){
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $long1 *= $pi80;
        $lat2 *= $pi80;
        $long2 *= $pi80;
  
        $r = 6378.137; // rayon moyen de la Terre en km
        $dlat = $lat2 - $lat1;
        $dlng = $long2 - $long1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;
      
        return ($km);

    }


    /**
    * Retourne la distance en metres du parcours passé en paramètres. Le parcours est
    * défini par un tableau ordonné de points GPS.
    * @param Array $parcours Le tableau contenant les points GPS
    * @return float La distance du parcours
    */
    public function calculDistanceTrajet(Array $parcours){
      
        $distance=0;
        $count= count($parcours);
        for($i=0; $i<$count-1; $i++){
            $distance += self::calculDistance2PointsGPS($parcours[$i][2],$parcours[$i][3],$parcours[$i+1][2],$parcours[$i+1][3]);
        }
        return $distance;
    }
}