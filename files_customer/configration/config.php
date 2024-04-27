<?php
    class dataBase{
        private $dbname="mysql:host=localhost;dbname=ecommerce";
        private $user="root";
        private $password="";
        private $db;

        public function __construct()
        {
            try{
                $this->db=new PDO($this->dbname,$this->user,$this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                echo('falid to connecet to the dataBase due to: '.$e->getMessage());
            }
        }

        public function getConnection()
        {
            return $this->db;
        }

        public function __destruct()
        {
            $this->db=null;
        }
    }

?>