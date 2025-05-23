<?php

class TrainingManager
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createTraining($date, $players)
    {
        $stmt = $this->connection->prepare("INSERT INTO trainings (date, players) VALUES (:date, :players)");
        $playersJson = json_encode($players);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':players', $playersJson);
        return $stmt->execute();
    }
}
