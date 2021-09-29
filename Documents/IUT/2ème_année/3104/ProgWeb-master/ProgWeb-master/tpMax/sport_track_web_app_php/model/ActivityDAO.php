<?php

    require_once('SqliteConnection.php');

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
            $query = "select * from Activity order by date";
            $stmt = $dbc->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
            return $results;
        }

        public final function findAllUser($mail){
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "select * from Activity where email = :mail order by date";
            $stmt = $dbc->query($query);
            $stmt->execute(array(':mail' => $mail));
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
            return $results;
        }

        public final function insert($act){
            if($act instanceof Activity){
                $dbc = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $query = "insert into Activity(id, date, descr, user) values (:id,:date,:descr,:user)";
                $stmt = $dbc->prepare($query);

                // bind the paramaters
                $stmt->bindValue(':id',$act->getID(),PDO::PARAM_STR);
                $stmt->bindValue(':date',$act->getDate(),PDO::PARAM_STR);
                $stmt->bindValue(':descr',$act->getDescr(),PDO::PARAM_STR);
                $stmt->bindValue(':user',$act->getUser(),PDO::PARAM_STR);

                // execute the prepared statement
                $stmt->execute();
            }
        }

        public function delete($obj){

            if($obj instanceof Activity){
                $dbc = SqliteConnection::getInstance()->getConnection();
                $query = "DELETE FROM Activity WHERE id = :id";
                $stmt = $dbc->prepare($query);
                $stmt->bindValue(':id', $obj->getID(), PDO::PARAM_STR);
                $stmt->execute();
             }
        }

        public function update($obj){
            if($obj instanceof Activity){

                $dbc = SqliteConnection::getInstance()->getConnection();
                $query = "UPDATE Activity SET date = :date, descr = :d WHERE id = :id";

                $stmt = $dbc->prepare($query);
                $stmt->bindValue(':date', $obj->getDate(), PDO::PARAM_STR);
                $stmt->bindValue(':d', $obj->getDescr(), PDO::PARAM_STR);
                $stmt->bindValue(':id', $obj->getID(), PDO::PARAM_STR);
                                  
                $stmt->execute();
             }
        }
    }

?>
