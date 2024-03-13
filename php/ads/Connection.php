<?php 

    class DBConnection{
        private $sever;
        private $user;
        private $pass;
        private $db;
        private $conn;

        public function __construct()
        {
            $this->sever = "127.0.0.1:3366";
            $this->user = "admin";
            $this->pass  = "0000";
            $this->db = "btl";
            
            $this->conn= new mysqli($this->sever, $this->user , $this->pass, $this->db);
            if(mysqli_connect_errno()){
                echo "loi ket noi".mysqli_connect_error();
                exit();
            }
        }
        public function getConnection(){
            return $this->conn;
        }
    }

?>