<?php 
    class Users {
        private $name;
        private $fname;
        private $birthDate;
        private $gender;
        private $size;
        private $weight;
        private $email;
        private $password;
     
        public function  __construct() { }
        
        public function init($n, $fn, $birth, $g, $s, $w, $mail, $pass){
            $this->name = $n;
            $this->fname = $fn;
            $this->birthDate = $birth;
            $this->gender = $g;
            $this->size = $s;
            $this->weight = $w;
            $this->email = $mail;
            $this->password = $pass;
        }
     
        public function getName(){
            return $this->name;
        }
        
        public function getFname(){
            return $this->fname;
        }

        public function getBirthDate() {
            return $this->birthDate;
        }

        public function getGender() {
            return $this->gender;
        }

        public function getSize() {
            return $this->size;
        }

        public function getWeight() {
            return $this->weight;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        
        public function  __toString() {
            return $this->nom. " ". $this->prenom;
        }
    }
?>