<?php

class DatabaseManager
{
    private $connection;

    public function __construct()
    {
        // Adatbázis kapcsolat beállítása

        $host = 'localhost';
        $dbname = 'heroesapp';
        $username = 'localuser';
        $password = 'localpass';

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kapcsolódási hiba: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
    
}



?>