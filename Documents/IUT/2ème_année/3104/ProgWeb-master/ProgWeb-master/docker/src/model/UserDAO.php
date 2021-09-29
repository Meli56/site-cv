<?php 
require_once('SqliteConnection.php');
require_once('User.php');

    class UserDAO{
        private static $dao;
        private function __construct(){}

        public final static function getInstance(){
            if( !isset(self::$dao)){
                self::$dao = new UserDAO();
            }
            return self::$dao;
        }

        public function findAll(){
            $db = SqliteConnection::getInstance()->getConnection();
            $query = "select * from users order by lname,fname";
            $stmt = $db->query($query);
            $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            return $results;
        }

        public function find($mail){
            try{
                $db = SqliteConnection::getInstance()->getConnection();
                $query = "select * from users where mail = :mail";
                $stmt = $db->prepare($query);
                $stmt->bindValue(':mail',$mail,PDO::PARAM_STR);

                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
                return $result;
            }
            catch (PDOException $e){
                return null;
            }

        }

        public function insert($user){
            if ($user instanceof User){
                $db = SqliteConnection::getInstance()->getConnection();
                $query = "insert into users(mail,lname,fname,birthDate,gender,height,weight, password) values (:m,:n,:f,:b,:g,:h,:w,:p)";
                $stmt = $db->prepare($query);

                $stmt->bindValue(':m',$user->getMail(),PDO::PARAM_STR);
                $stmt->bindValue(':n',$user->getLname(),PDO::PARAM_STR);
                $stmt->bindValue(':f',$user->getFname(),PDO::PARAM_STR);
                $stmt->bindValue(':b',$user->getBirthDate(),PDO::PARAM_STR);
                $stmt->bindValue(':g',$user->getGender(),PDO::PARAM_STR);
                $stmt->bindValue(':h',$user->getHeight(),PDO::PARAM_INT);
                $stmt->bindValue(':w',$user->getWeight(),PDO::PARAM_INT);
                $stmt->bindValue(':p',$user->getPassword(),PDO::PARAM_STR);

                $stmt->execute();

            }
        }

        public function delete($user){
            if($user instanceof User){
                $db = SqliteConnection::getInstance()->getConnection();
                $query = "delete from users where mail= :m";
                $stmt = $db->prepare($query);
                $stmt->bindValue(':e',$user->getMail(),PDO::PARAM_STR);
                $stmt->execute();
            }
        }

        public function update($user, $oldMail){
            if($user instanceof User){
                $dbc = SqliteConnection::getInstance()->getConnection();
                // prepare the SQL statement
                $query = "update users set lname = :n, fname = :f, birthDate = :b, gender = :g, height = :s, weight = :w, mail = :e, password = :p WHERE mail = :old";
                $stmt = $dbc->prepare($query);
                // bind the paramaters
                $stmt->bindValue(':n',$user->getLName(),PDO::PARAM_STR);
                $stmt->bindValue(':f',$user->getFname(),PDO::PARAM_STR);
                $stmt->bindValue(':b',$user->getBirthDate(),PDO::PARAM_STR);
                $stmt->bindValue(':g',$user->getGender(),PDO::PARAM_STR);
                $stmt->bindValue(':s',$user->getHeight(),PDO::PARAM_INT);
                $stmt->bindValue(':w',$user->getWeight(),PDO::PARAM_INT);
                $stmt->bindValue(':e',$user->getMail(),PDO::PARAM_STR);
                $stmt->bindValue(':p',$user->getPassword(),PDO::PARAM_STR);
                $stmt->bindValue(':old',$oldMail,PDO::PARAM_STR);


                $stmt->execute();
            }

        }
        
    }
?>