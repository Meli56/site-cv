<?php
require_once('SqliteConnection.php');
require_once('Activity.php');
class ActivityDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
       if(!isset(self::$dao)) {
           self::$dao= new ActivityDAO();
       }
       return self::$dao;
    }

    public final function findAll(){
       $dbc = SqliteConnection::getInstance()->getConnection();
       $query = "select * from activity order by athlete";
       $stmt = $dbc->query($query);
       $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
       return $results;
    }

    public final function findAllUser($mail){
      $dbc = SqliteConnection::getInstance()->getConnection();
      $query = "select * from Activity where athlete = :mail order by date";
      $stmt = $dbc->query($query);
      $stmt->execute(array(':mail' => $mail));
      $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
      return $results;
   }

   public final function insert($st){
      if($st instanceof Activity){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "insert into activity(idActivity, dateActivity, description, start, duration, distance, maxFrequency, minFrequency, moyFrequency, athlete)
          values (:id, :date, :desc, :start, :duration, :dist, :maxF, :minF, :moyF, :athlete)";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
         $stmt->bindValue(':date',$st->getDate(),PDO::PARAM_STR);
         $stmt->bindValue(':desc',$st->getDesc(),PDO::PARAM_STR);
         $stmt->bindValue(':start',$st->getStart(),PDO::PARAM_STR);
         $stmt->bindValue(':duration',$st->getDuration(),PDO::PARAM_STR);
         $stmt->bindValue(':dist',$st->getDistance(),PDO::PARAM_STR);
         $stmt->bindValue(':maxF',$st->getMaxF(),PDO::PARAM_STR);
         $stmt->bindValue(':minF',$st->getMinF(),PDO::PARAM_STR);
         $stmt->bindValue(':moyF',$st->getMoyF(),PDO::PARAM_STR);
         $stmt->bindValue(':athlete',$st->getAthlete(),PDO::PARAM_STR);

         // execute the prepared statement
         $stmt->execute();
      }
   }

  public function delete($obj){ 
      if($obj instanceof Activity){
         $dbc = SqliteConnection::getInstance()->getConnection();
         $query = "DELETE FROM Activity WHERE idActivity = :id";
         $stmt = $dbc->prepare($query);
         $stmt->bindValue(':id', $obj->getID(), PDO::PARAM_STR);
         $stmt->execute();
      }
   }

   public function update($st,$oldId){
      if($st instanceof Activity){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "update Activity set idActivity = :id, dateActivity = :date, description = :desc, start = :start, duration = :duration, distance = :dist, maxFrequency = :maxF, minFrequency = :minF, moyFrequency = :moyF, athlete = :athlete WHERE idActivity = :old";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
         $stmt->bindValue(':date',$st->getDate(),PDO::PARAM_STR);
         $stmt->bindValue(':desc',$st->getDesc(),PDO::PARAM_STR);
         $stmt->bindValue(':start',$st->getStart(),PDO::PARAM_STR);
         $stmt->bindValue(':duration',$st->getDuration(),PDO::PARAM_STR);
         $stmt->bindValue(':dist',$st->getDistance(),PDO::PARAM_STR);
         $stmt->bindValue(':maxF',$st->getMaxF(),PDO::PARAM_STR);
         $stmt->bindValue(':minF',$st->getMinF(),PDO::PARAM_STR);
         $stmt->bindValue(':moyF',$st->getMoyF(),PDO::PARAM_STR);
         $stmt->bindValue(':athlete',$st->getAthlete(),PDO::PARAM_STR);  
         $stmt->bindValue(':old',$oldId,PDO::PARAM_STR);

         // execute the prepared statement
         $stmt->execute();
      }
   }
}
?>
