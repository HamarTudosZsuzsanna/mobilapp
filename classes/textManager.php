<?php

class TextManager
{
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function createText($text, $icon) {
        $stmt = $this->connection->prepare("INSERT INTO text (text, icon) VALUES (:text, :icon)");
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':icon', $icon);

        return $stmt->execute([
            ':text' => $text,
            ':icon' => $icon
        ]);
    }

    public function getTexts() {
        $stmt = $this->connection->prepare("SELECT * FROM text");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteText($id) {
        $stmt = $this->connection->prepare("DELETE FROM text WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
    public function updateText($id, $text, $icon) {
        $stmt = $this->connection->prepare("UPDATE text SET text = :text, icon = :icon WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':icon', $icon);
        return $stmt->execute();
    }

}



?>