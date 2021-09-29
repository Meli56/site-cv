<?php 
    class Activity {
        private $id;
        private $date;
        private $descr;
        private $user;
     
        public function  __construct() { }
        
        public function init($id, $date, $descr, $user){
            $this->id = $id;
            $this->date = $date;
            $this->descr = $descr;
            $this->user = $user;
        }

        public function getID() {
            return $this->id;
        }
     
        public function getDate(){
            return $this->date;
        }
        
        public function getDescr(){
            return $this->descr;
        }

        public function getUser() {
            return $this->user;
        }

        
        public function  __toString() {
            return $this->nom. " ". $this->prenom;
        }
    }
?>