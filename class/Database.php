<?php

class Database {
    private $host = "localhost";
    private $db_name = "db_karta";
    private $username = "root";
    private $password = ""; // Make sure to set the correct password if any
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Construct the DSN (Data Source Name)
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

            // Create a PDO instance
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Set PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Koneksaun ho Sucessu";

        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}

?>
