<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    class SqliteConnection{

        private static $instance;
        private $db;

        private function __construct(){
            try{
                $this->db = new PDO("sqlite: ./../db/sport_track.db");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage()."\n";
                echo dirname(__FILE__).'../db/sport_track.db';

                die();
            }
        }

        public static function getInstance(){
            if (is_null(self::$instance)){
                self::$instance = new SqliteConnection();
            }
            return self::$instance;
        }

        public function getConnection(){
            return $this->db;
        }
    } 
?>