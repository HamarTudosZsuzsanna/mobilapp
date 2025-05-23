<?php

include_once '../../../classes/playerManager.php';
include_once '../../../classes/databaseManager.php';

$db = new DatabaseManager();
$connection = $db->getConnection();

$message = '';

$playerManager = new PlayerManager($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $birthday = htmlspecialchars(trim($_POST['birthday'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $license = htmlspecialchars(trim($_POST['license'] ?? ''));
    $number = htmlspecialchars(trim($_POST['number'] ?? ''));

    if (empty($name) || empty($birthday) || empty($address) || empty($email) || empty($license) || empty($number)) {
        $message = "Kérjük, töltse ki az összes mezőt.";
    } else {
        if ($playerManager->createPlayer($name, $birthday, $address, $email, $license, $number)) {
            header("Location: ../index.php");
            exit();
        } else {
            $message = "Hiba történt a játékos mentésekor.";
        }
    }
};

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Érvénytelen email cím.";
};;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeroesAPP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="style.css">

    <script src="../../../api/api.js"></script>
</head>

<body>
    <header>

    </header>
    <main>
        <form action="" method="POST">
            <div class="details-container">
                <label for="name" class="label">név</label>
                <input type="text" class="data" name="name">
            </div>

            <div class="details-container">
                <label class="label" for="birthday">születési dátum</label>
                <input type="text" class="data" name="birthday">
            </div>

            <div class="details-container">
                <label class="label" for="address">lakcím</label>
                <input type="text" class="data" name="address">
            </div>

            <div class="details-container">
                <label class="label" for="email">email</label>
                <input type="text" class="data" name="email">
            </div>

            <hr>
            <div class="details-container">
                <label class="label" for="license">versenyeng. szám</label>
                <input type="text" class="data" name="license">
            </div>

            <div class="details-container">
                <label class="label" for="number">mezszám</label>
                <input type="text" class="data" name="number">
            </div>

        <div class="message">
            <?php if ($message): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
        </div>
            <button id="submit" type="submit" class="btn">Mentés</button>
        </form>


        <a href="../index.php" class="btn">Vissza</a>

    </main>
    <footer>
        2025 &copy; HeroesAPP
    </footer>

</body>

</html>