<?php require_once "request.php" ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/contact.css">
    <title>Intranet</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>

    <content>
        <?php generateContactInfo() ?>
    </content>
</body>

</html>