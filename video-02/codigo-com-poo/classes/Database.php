<?php
class Database
{
    private \mysqli $conn;

    public function __construct()
    {
        $this->conn = new \mysqli("localhost", "root", "", "loja");

        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public function getConnection(): \mysqli
    {
        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
