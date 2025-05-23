<?php

include_once '../../classes/textManager.php';
include_once '../../classes/databaseManager.php';


$message = '';

$db = new DatabaseManager();
$connection = $db->getConnection();
$textManager = new TextManager($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = htmlspecialchars(trim($_POST['text'] ?? ''));
    $icon = $_POST['icon'] ?? '';

    if ($textManager->createText($text, $icon)) {
        $message = "Üzenet sikeresen elküldve!";
        echo "<script>
            alert('Üzenet sikeresen elküldve!');
            window.location.href = window.location.href;
            </script>";
    exit;
    } else {
        $message = "Hiba történt az üzenet küldésekor.";
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeroesAPP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="adminstyle.css">

    <script src=""></script>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="../../assets/img/logo.png" alt="" id="logo">
        </div>

    </header>
    <main>

        <form action="" method="post" class="text-container">
            <div class="select container">
                <div class="text">Válassz!</div>
                <select name="icon" id="icons">
                    <option value="fontos">Fontos</option>
                    <option value="info">Információ</option>
                    <option value="kerdes">Kérdés</option>
                    <option value="penz">Pénz</option>
                    <option value="szuletesnap">Születésnap</option>
                </select>
            </div>
            <div class="container">
                <div class="text">Üzenet!</div>
                <textarea name="text" id="textarea" cols="50" rows="20" required></textarea>
            </div>
            <button id="submit" type="submit">Küldés</button>
        </form>

        <div class="message"><?php echo $message ?></div>
        <a href="../index.php" class="btn">Vissza a főoldalra</a>
    </main>
    <footer>
        2025 &copy; HeroesAPP
    </footer>
</body>

</html>