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
    <span>
        <a href="menu.php" class="backMenu">
            <h1>✨Intranet✨</h1>
        </a>
    </span>
    <span>
        <h2 class="sessionName">
            <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
        </h2>
    </span>
    <span>
        <a href="logout.php" class="logout">
            Logout
        </a>
    </span>
</header>

</html>