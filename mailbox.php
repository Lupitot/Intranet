<?php
require_once "request.php";
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Boîte mail POP3</title>
</head>

<body>
    <h1>Boîte mail POP3</h1>

    <?php
    // Configuration de la connexion POP3
    $serveur_pop3 = "intranet.local";
    $nom_utilisateur = $_SESSION['mail'];
    $mot_de_passe = $_SESSION['password'];

    try {
        // Connexion au serveur POP3
        $pop3 = @imap_open("{" . $serveur_pop3 . ":110/pop3}", $nom_utilisateur, $mot_de_passe);

        if ($pop3) {
            // Récupération des en-têtes des e-mails
            $en_tetes = imap_headers($pop3);

            // Parcours des en-têtes pour afficher les informations de chaque e-mail
            foreach ($en_tetes as $en_tete) {
                echo "<h2>En-tête :</h2>";
                echo "<pre>" . htmlentities($en_tete) . "</pre>";
                echo "<hr>";
            }

            // Fermeture de la connexion POP3
            imap_close($pop3);
        } else {
            echo "Erreur lors de la connexion POP3.";
        }
    } catch (Exception $e) {
        echo 'Erreur lors de la connexion\nException reçue : ',  $e->getMessage(), "\n";
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des valeurs du formulaire
        $serveur_smtp = "smtp.example.com";
        $nom_utilisateur = "nom_utilisateur";
        $mot_de_passe = "mot_de_passe";
        $expediteur = $_POST["expediteur"];
        $destinataire = $_POST["destinataire"];
        $sujet = $_POST["sujet"];
        $message = $_POST["message"];

        // Configuration des paramètres SMTP
        ini_set("SMTP", $serveur_smtp);
        ini_set("smtp_port", 25);
        ini_set("sendmail_from", $expediteur);

        // Envoi de l'e-mail
        $resultat = mail($destinataire, $sujet, $message);

        if ($resultat) {
            echo "L'e-mail a été envoyé avec succès.";
        } else {
            echo "Erreur lors de l'envoi de l'e-mail.";
        }
    }
    ?>
    <h1>Envoi d'un e-mail</h1>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="expediteur">Expéditeur :</label>
        <input type="text" id="expediteur" name="expediteur"><br><br>

        <label for="destinataire">Destinataire :</label>
        <input type="text" id="destinataire" name="destinataire"><br><br>

        <label for="sujet">Sujet :</label>
        <input type="text" id="sujet" name="sujet"><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="5" cols="40"></textarea><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>

</html>