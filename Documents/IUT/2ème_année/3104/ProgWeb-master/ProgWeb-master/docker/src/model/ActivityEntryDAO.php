<?php
require_once('SqliteConnection.php');
require_once('ActivityEntry.php');
class ActivityEntryDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
       if(!isset(self::$dao)) {
           self::$dao= new ActivityEntryDAO();
       }
       return self::$dao;
    }

    public final function findAll(){
       $dbc = SqliteConnection::getInstance()->getConnection();
       $query = "select * from data order by theActivity, activityTime";
       $stmt = $dbc->query($query);
       $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
       return $results;
    }

    public final function findAllActivity($idA){
      $dbc = SqliteConnection::getInstance()->getConnection();
      $query = "select * from Data where theActivity = :id order by activityTime";
      $stmt = $dbc->query($query);
      $stmt->execute(array(':id' => $idA));
      $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
      return $results;
   }

   public final function insert($st){
      if($st instanceof ActivityEntry){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "insert into data(idData, activityTime, cardioFrequency, latitude, longitude, altitude, theActivity) values (:id, :time, :card, :lat, :long, :alt, :act)";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
         $stmt->bindValue(':time',$st->getActivityTime(),PDO::PARAM_STR);
         $stmt->bindValue(':card',$st->getCardioFrequency(),PDO::PARAM_STR);
         $stmt->bindValue(':lat',$st->getLatitude(),PDO::PARAM_STR);
         $stmt->bindValue(':long',$st->getLongitude(),PDO::PARAM_STR);
         $stmt->bindValue(':alt',$st->getAltitude(),PDO::PARAM_STR);
         $stmt->bindValue(':act',$st->getTheActivity(),PDO::PARAM_STR);

         // execute the prepared statement
         $stmt->execute();
      }
   }

  public function delete($obj){ 
      if($obj instanceof ActivityEntry){
         $dbc = SqliteConnection::getInstance()->getConnection();
         $query = "DELETE FROM Data WHERE idData = :id";
         $stmt = $dbc->prepare($query);
         $stmt->bindValue(':id', $obj->getID(), PDO::PARAM_STR);
         $stmt->execute();
      }
   }

   public function update($st,$oldId){
      if($st instanceof ActivityEntry){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "update DATA set idData = :id, activityTime = :time, cardioFrequency = :card, latitude = :lat, longitude = :long, altitude = :alt, theActivity = :act WHERE idData = :old";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
         $stmt->bindValue(':time',$st->getActivityTime(),PDO::PARAM_STR);
         $stmt->bindValue(':card',$st->getCardioFrequency(),PDO::PARAM_STR);
         $stmt->bindValue(':lat',$st->getLatitude(),PDO::PARAM_STR);
         $stmt->bindValue(':long',$st->getLongitude(),PDO::PARAM_STR);
         $stmt->bindValue(':alt',$st->getAltitude(),PDO::PARAM_STR);
         $stmt->bindValue(':act',$st->getTheActivity(),PDO::PARAM_STR);

         // execute the prepared statement
         $stmt->execute();
      }
   }
}
?>