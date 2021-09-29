<?php 

class ActivityEntry{
    private $idData;
    private $activityTime;
    private $cardioFrequency;
    private $latitude;
    private $longitude;
    private $altitude;
    private $theActivity;

    public function __construct(){}

    //Get an array with all his data
    public function init($array){
        $this->idData = $array['idData'];
        $this->activityTime = $array['activityTime'];
        $this->cardioFrequency = $array['cardioFrequency'];
        $this->latitude =$array['latitude'];
        $this->longitude = $array['longitude'];
        $this->altitude = $array['altitude'];
        $this->theActivity =  $array['theActivity'];
    }

    public function getIdData(){return $this->idData;}
    public function getActivityTime(){return $this->activityTime;}
    public function getCardioFrequency(){return $this->cardioFrequency;}
    public function getLatitude(){return $this->latitude;}
    public function getLongitude(){return $this->longitude;}
    public function getAltitude(){return $this->altitude;}
    public function getTheActivity(){return $this->theActivity;}

    public function __toString()
    {
        return "Activity time: ".$this->activityTime."\nCardiac frequency : ".$this->cardioFrequency."\nLatitude : ".$this->latitude."\nLongitude : ".$this->longitude."\nAltitude : ".$this->altitude;
    }

}
?>