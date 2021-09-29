<?php
class ActivityEntry
{

   private $id;
   private $time;
   private $carioFrequency;
   private $latitude;
   private $longitude;
   private $altitude;
   private $activityID;

   public function  __construct()
   {
   }

   public function init($id, $time, $carioFrequency, $latitude, $longitude, $altitude, $activityID)
   {

      $this->id = $id;
      $this->time = $time;
      $this->carioFrequency = $carioFrequency;
      $this->latitude = $latitude;
      $this->longitude = $longitude;
      $this->altitude = $altitude;
      $this->activityID = $activityID;
   }

   public function getID()
   {
      return $this->id;
   }

   public function getTime()
   {
      return $this->time;
   }

   public function getCardioFrequency()
   {
      return $this->carioFrequency;
   }

   public function getLatitude()
   {
      return $this->latitude;
   }

   public function getLongitude()
   {
      return $this->longitude;
   }

   public function getAltitude()
   {
      return $this->altitude;
   }

   public function getActivityID()
   {
      return $this->activityID;
   }
}
