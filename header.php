<?php
require_once "request.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/header.css">
    <title>Intranet</title>
</head>

<header>
    <a href="menu.php">
        <h1>✨Intranet✨</h1>
    </a>
    <h2>
        <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
    </h2>
    <div class="logout">
        <a href="logout.php">logout</a>
    </div>
</header>

</html>