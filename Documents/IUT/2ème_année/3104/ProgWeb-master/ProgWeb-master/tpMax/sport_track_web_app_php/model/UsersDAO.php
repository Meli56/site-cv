<?php

    require_once('SqliteConnection.php');
    require_once('Users.php');

    class UsersDAO {
        private static $dao;

        private function __construct() {}

        public final static function getInstance() {
            if(!isset(self::$dao)) {
                self::$dao= new UsersDAO();
            }
            return self::$dao;
        }

        public final function findAll(){
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "select * from Users order by name,fname";
            $stmt = $dbc->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Users');
            return $results;
        }

        public final function find($mail){
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "select * from Users where email = :mail";
            $stmt = $dbc->prepare($query);
            $stmt->execute(array(':mail' => $mail));
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Users')[0];
            return $result;
        }

        public final function insert($user){
            if($user instanceof Users){
                $dbc = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $query = "insert into Users(name, fname, birthDate, gender, size, weight, email, password) values (:n,:f,:b,:g,:s,:w,:e,:p)";
                $stmt = $dbc->prepare($query);

                // bind the paramaters
                $stmt->bindValue(':n',$user->getFname(),PDO::PARAM_STR);
                $stmt->bindValue(':f',$user->getFname(),PDO::PARAM_STR);
                $stmt->bindValue(':b',$user->getBirthDate(),PDO::PARAM_STR);
                $stmt->bindValue(':g',$user->getGender(),PDO::PARAM_STR);
                $stmt->bindValue(':s',$user->getSize(),PDO::PARAM_STR);
                $stmt->bindValue(':w',$user->getWeight(),PDO::PARAM_STR);
                $stmt->bindValue(':e',$user->getEmail(),PDO::PARAM_STR);
                $stmt->bindValue(':p',$user->getPassword(),PDO::PARAM_STR);

                // execute the prepared statement
                $stmt->execute();
            }
        }

        public function delete($user){

            if($user instanceof Users){
                $dbc = SqliteConnection::getInstance()->getConnection();
                $query = "delete from Users where email = :e";
                
                $stmt = $dbc->prepare($query);
                $stmt->bindValue(':e',$user->getEmail(),PDO::PARAM_STR);
                $stmt->execute();
             }

        }

        public function update($user, $oldEmail){

            if($user instanceof Users){

                $dbc = SqliteConnection::getInstance()->getConnection();

                // prepare the SQL statement
                $query = "update Users set name = :n, fname = :f, birthDate = :b, gender = :g, size = :s, weight = :w, email = :e, password = :p WHERE email = :old";
                $stmt = $dbc->prepare($query);

                // bind the paramaters
                $stmt->bindValue(':n',$user->getName(),PDO::PARAM_STR);
                $stmt->bindValue(':f',$user->getFname(),PDO::PARAM_STR);
                $stmt->bindValue(':b',$user->getBirthDate(),PDO::PARAM_STR);
                $stmt->bindValue(':g',$user->getGender(),PDO::PARAM_STR);
                $stmt->bindValue(':s',$user->getSize(),PDO::PARAM_STR);
                $stmt->bindValue(':w',$user->getWeight(),PDO::PARAM_STR);
                $stmt->bindValue(':e',$user->getEmail(),PDO::PARAM_STR);
                $stmt->bindValue(':p',$user->getPassword(),PDO::PARAM_STR);
                $stmt->bindValue(':old',$oldEmail,PDO::PARAM_STR);


                $stmt->execute();
             }
        }
    }
?>
