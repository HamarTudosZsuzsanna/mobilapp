<?php

class PlayerManager
{
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function createPlayer($name, $birthday, $address, $email, $license, $number) {
        $stmt = $this->connection->prepare("INSERT INTO players (name, birthday, address, email, license, number) VALUES (:name, :birthday, :address, :email, :license, :number)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':license', $license);
        $stmt->bindParam(':number', $number);
        return $stmt->execute();

    }

    function getPlayers() {
        $stmt = $this->connection->prepare("SELECT * FROM players");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPlayer($id) {
        $stmt = $this->connection->prepare("SELECT * FROM players WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function updatePlayer($id, $name, $birthday, $address, $email, $license, $number) {
        $stmt = $this->connection->prepare("UPDATE players SET name = :name, birthday = :birthday, address = :address, email = :email, license = :license, number = :number WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':license', $license);
        $stmt->bindParam(':number', $number);
        return $stmt->execute();
    }
    
    function deletePlayer($id) {
        $stmt = $this->connection->prepare("DELETE FROM players WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}



?>