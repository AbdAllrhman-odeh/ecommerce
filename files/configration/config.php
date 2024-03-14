<?php
    class dataBase{
        private $dbn="mysql:host=localhost;dbname=ecommerce";
        private $userName="root";
        private $password="";
        private $db;

        public function __construct()
        {
            try
            {
                $this->db=new PDO($this->dbn,$this->userName,$this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                echo('Flaid to connect due to :'.$e->getMessage());
            }
        }

        public function __destruct()
        {
            $this->db=null;
        }
    }
?>