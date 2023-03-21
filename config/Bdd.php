<?php
    class Bdd {
        protected $server_name;
        protected $username;
        protected $db_password;
        protected $dbname;
        protected $conn;

        public function __construct($server_name = "localhost", $username = "root", $db_password = "", $dbname = "revision-memory") {
            if(!session_id()) {
                session_start();
            }

            $this->server_name = $server_name;
            $this->username = $username;
            $this->db_password = $db_password;
            $this->dbname = $dbname;
            
            return $this->connection();

            
        }

        private function connection() {
            try {
                $this->conn = new PDO("mysql:host=$this->server_name; dbname=$this->dbname", $this->username, $this->db_password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //echo "connexion réussie";
                return $this->conn;

            } catch (PDOException $e){
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }