<?php
    class Activity{
      private $idActivity;
      private $dateActivity;
      private $description;
      private $start;
      private $duration;
      private $distance;
      private $maxFrequency;
      private $minFrequency;
      private $moyFrequency;
      private $athlete;

      public function __construct(){ }


      public function init($array){
        $this->idActivity = $array['id'];
        $this->dateActivity = $array['date'];
        $this->description = $array['desc'];
        $this->start = $array['start'];
        $this->duration = $array['duration'];
        $this->distance = $array['dist'];
        $this->maxFrequency = $array['maxF'];
        $this->minFrequency = $array['minF'];
        $this->moyFrequency = $array['moyF'];
        $this->athlete = $array['athlete'];
      }

    public function getId() {
        return $this->idActivity;
    }
 
    public function getDate(){
        return $this->dateActivity;
    }
    
    public function getDesc(){
        return $this->description;
    }

    public function getStart() {
        return $this->start;
    }

    public function getDuration() {
        return $this->duration;
    }
 
    public function getDistance(){
        return $this->distance;
    }
    
    public function getMaxF(){
        return $this->maxFrequency;
    }

    public function getMinF() {
        return $this->minFrequency;
    }

    public function getMoyF(){
        return $this->moyFrequency;
    }

    public function getAthlete() {
        return $this->athlete;
    }
      

    public function __toString()
    {
        return "Activity: ".$this->idActivity."\nDate : ".$this->dateActivity."\nDescription : ".$this->description."\nStart : ".$this->start."\nDuration : ".$this->duration."\nDistance : ".$this->distance."\nMaximum frequency : ".$this->maxFrequency."\nMinimum frequency : ".$this->minFrequency."\nAverage frequency : ".$this->moyFrequency;
     }

    }

    

?>