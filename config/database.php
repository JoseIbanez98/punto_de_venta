<?php
class Database {
    private $host = "";
    private $db = "";
    private $user = "";
    private $pass = "";

    public function connect() {
        try {
            return new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
        } catch (PDOException $e) {
            die("Error DB: " . $e->getMessage());
        }
    }
}