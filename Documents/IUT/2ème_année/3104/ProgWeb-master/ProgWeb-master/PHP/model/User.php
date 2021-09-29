<?php 

class User{
    private $fname;
    private $lname;
    private $birthDate;
    private $gender;
    private $height;
    private $weight;
    private $mail;
    private $passwd;

    public function __construct(){}

    //Get an array with all his data
    public function init($array){
        $this->fname = $array['fname'];
        $this->lname = $array['lname'];
        $this->birthDate = $array['birthDate'];
        $this->gender = $array['gender'];
        $this->height = $array['height'];
        $this->weight = $array['weight'];
        $this->mail =  $array['mail'];
        $this->passwd = $array['passwd'];
    }

    public function getFname(){return $this->fname;}
    public function getLname(){return $this->lname;}
    public function getBirthDate(){return $this->birthDate;}
    public function getGender(){return $this->gender;}
    public function getHeight(){return $this->height;}
    public function getWeight(){return $this->weight;}
    public function getMail(){return $this->mail;}
    public function getPassword(){return $this->passwd;}

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "First Name : ".$this->fname."\nLast Name : ".$this->lname."\nBirthDate : ".$this->birthDate."\nGender : ".$this->gender."\nHeight : ".$this->weight."\nMail : ";
     }


}
?>