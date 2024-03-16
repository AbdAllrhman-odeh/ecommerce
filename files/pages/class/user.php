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
    }

    // $dbObj=new dataBase();
    // $db=$dbObj->getConnection();

    // $obj=new usre($db);

?>