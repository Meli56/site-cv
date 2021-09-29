<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    class SqliteConnection {

        private static $instance;

        private $connection;
        
        /**
         * Constructeur de la classe
         * @param void
         * @return void
         */
        private function __construct() {
            try {
                $this->connection = new PDO('sqlite:'.dirname(__FILE__).'/../sport_track.db');
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(Exception $e) {
                echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
                echo dirname(__FILE__).'/../sport_track.db';
                die();
            }
            
        }
        
        /**
         * Méthode qui crée l'unique instance de la classe
         * si elle n'existe pas encore puis la retourne.
         *
         * @param void
         * @return SqliteConnection
         */
        public static function getInstance() {
        
            if(is_null(self::$instance)) {
                self::$instance = new SqliteConnection();
            }
        
            return self::$instance;
        }

        /**
         * Méthode qui retourne l'objet PDO, connexion qui fait
         * le lien avec la base de donnée SQLite3.
         * 
         * @return PDO
         */
        public function getConnection() {
            return $this->connection;
        }

    }
?>