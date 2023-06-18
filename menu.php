<?php
require_once "request.php";
session_start()
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/menu.css">
    <title>Intranet</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>
    <h1>
        <?php echo "Welcome " . $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
    </h1>
    <div class="content">
        <div class="newsletter">
            <img src="./assets/img/Salam6.png" alt="Image d'une personne heureuse pour promouvoir l'entreprise ">
            <p>Subscribe to our newsletter to receive the latest news.</p>
        </div>
        <div class="app">
            <a href="contact.php" class="contact">contact</a>
            <a href="mailbox.php" class="mailbox">mailbox</a>
            <a href="agenda.php" class="agenda">agenda</a>
            <a href="note.php" class="note">note</a>
            <a href="folder.php" class="folder">folder </a>
        </div>
    </div>
</body>

</html>