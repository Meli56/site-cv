<?php

   require_once('SqliteConnection.php');

   class ActivityEntryDAO{

      private static $dao;

      private function __construct(){}

      public final static function getInstance() {
         if(!isset(self::$dao)) {
             self::$dao= new ActivityEntryDAO();
         }
         return self::$dao;
     }

     public final function findAll(){

      $dbc = SqliteConnection::getInstance()->getConnection();
      $query = "select * from TrackingData order by cardioFrequency";
      $stmt = $dbc->query($query);
      $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'ActivityDAO');
      return $results;

     }

     public final function insert($trakingData){

      if($trakingData instanceof ActivityEntry){
         $dbc = SqliteConnection::getInstance()->getConnection();
         $query = "insert into TrackingData(id, time, cardioFrequency, latitude, longitude, altitude, activityID) values (:id, :t, :cf, :lat, :long, :alt, :actID)";
         $stmt = $dbc -> prepare($query);

         $stmt->bindValue(':id',$trakingData->getID(), PDO::PARAM_STR);
         $stmt->bindValue(':t',$trakingData->getTime(), PDO::PARAM_STR);
         $stmt->bindValue(':cf',$trakingData->getCardioFrequency(), PDO::PARAM_STR);
         $stmt->bindValue(':lat',$trakingData->getLatitude(), PDO::PARAM_STR);
         $stmt->bindValue(':long',$trakingData->getLongitude(), PDO::PARAM_STR);
         $stmt->bindValue(':alt',$trakingData->getAltitude(), PDO::PARAM_STR);
         $stmt->bindValue(':actID',$trakingData->getActivityID(), PDO::PARAM_STR);


         $stmt-> execute();
      }
     }

     public function delete($obj){

      if($obj instanceof ActivityEntry){
         $dbc = SqliteConnection::getInstance()->getConnection();
         $query = "delete from TrackingData where id = :id";

         $stmt = $dbc->prepare($query);
         $stmt->bindValue(':id', $obj->getID(), PDO::PARAM_STR);
         $stmt->execute();

      }
     }

     public function update($obj){

      if($obj instanceof ActivityEntry){

         $dbc = SqliteConnection::getInstance()->getConnection();

         $query = "UPDATE TrackingData SET cardioFrequency = :cf, latitude = :lat, longitude = :lon, altitude = :alt, id = :id";
         $stmt = $dbc->prepare($query);

         $stmt->bindValue(':cf', $obj->getCardioFrequency(), PDO::PARAM_INT);
         $stmt->bindValue(':lat', $obj->getLatitude(), PDO::PARAM_INT);
         $stmt->bindValue(':lon', $obj->getLongitude(), PDO::PARAM_INT);
         $stmt->bindValue(':alt', $obj->getAltitude(), PDO::PARAM_INT);
         $stmt->bindValue(':id', $obj->getID(), PDO::PARAM_INT);

         $stmt->execute();
      }
     }

   
   }

?>