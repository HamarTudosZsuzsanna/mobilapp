<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeroesAPP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">

    <script src="../../api/api.js"></script>
    <script src="main.js" defer></script>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="details-container">
            <div class="label">Dátum kiválasztása</div>
            <input type="date" name="date" id="date">
        </div>
        <button class="btn" id="showPlayer">Résztvevő játékosok</button>

        <div class="data-container">
            <form action="" method="post" id="checkboxForm">
                
            </form>
            <div id="message"></div>
            
            <button class="btn" id="close" class="margin">Bezárás</button>
        </div>


        <a href="../index.php" class="btn">Vissza</a>
    </main>
    <footer>
        2025 &copy; HeroesAPP
    </footer>

</body>

</html>