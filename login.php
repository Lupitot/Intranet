<?php 
require_once "request.php" ;
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/menu.css"> -->
    <title>Intranet</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>

    <form method="POST">
        <label for="mail">Mail</label>
        <input type="text" name="mail" id="mail" placeholder="mail" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="submit" value="Login" name="login">

        <?php if (isset($_POST['login'])) {
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $db = openDB();
            $sql = $db->prepare("SELECT * FROM intranettable WHERE mail = ? AND MDP = ?");
            $sql->bind_param("ss", $mail, $password);
            $sql->execute();
            $resultQuery = $sql->get_result();
            $row = mysqli_fetch_assoc($resultQuery);
            if ($row) {
                echo "Login successful";
                $_SESSION['mail'] = $mail;
                $_SESSION['password'] = $password;
                // ----------------- //
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['tel'] = $row['tel'];
                $_SESSION['grade'] = $row['grade'];
                $_SESSION['id'] = $row['id'];
                header("Location: menu.php");
                session_start();
            } else {
                echo "Login failed";
            }
        }
        ?>
    </form>

</body>

</html>