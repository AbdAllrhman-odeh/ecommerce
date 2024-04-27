<?php
    class user{

        private $db;

        public function __construct($db)
        {
            $this->db=$db;
        }

        public function addNewUser($name,$email,$password)
        {
            $hashedPassword=password_hash($password,PASSWORD_DEFAULT);

            $qurey="INSERT INTO users (name,email,password,role) VALUES(:name,:email,:password,'user')";
            try{
                $stmt=$this->db->prepare($qurey);
                
                $stmt->bindParam(':name',$name);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':password',$hashedPassword);

                $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo('could not add new user due to: '.$e->getMessage());
            }
        }

        public function checkIfEmailExists($email)
        {
            $qurey="SELECT email FROM users where email=:email";
            try{
                $stmt=$this->db->prepare($qurey);
                
                $stmt->bindParam(':email',$email);

                $stmt->execute();

                $user=$stmt->fetch(PDO::FETCH_ASSOC);

                if(empty($user))
                return false;
                
                return true;
            }
            catch(PDOException $e)
            {
                echo('cannot search for the user due to: '.$e->getMessage());
            }
        }

        public function checkPassword($email,$password)
        {
            $query="SELECT * FROM users where email=:email";

            try{
                $stmt=$this->db->prepare($query);

                $stmt->bindParam(':email',$email);

                $stmt->execute();

                $user=$stmt->fetch(PDO::FETCH_ASSOC);

                if($user)
                {
                    if(password_verify($password,$user['password']))
                    return true;

                    return false;
                }
            }
            catch(PDOException $e)
            {
                echo('cannot compare password due to: '.$e->getMessage());
            }
        }
    }

    // $dbObj=new dataBase();
    // $db=$dbObj->getConnection();

    // $obj=new usre($db);

?>