<?php 

include './inc/pdo.php';

if(isset($_GET['token']) && $_GET['token'] != '')
{
    $stmt = $pdo->prepare('SELECT email from utilisateurs WHERE token = ?');
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();

    if($email) 
    {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Récupération de mot de passe</title>
        </head>
        <body>
            <form method="">
                <label for="newPassword">Nouveau mot de passe</label>
                <input type="password" name="newPassword">
                <input type="submit" name="Confirmer">
            </form>
        </body>
        </html>
        <?php
    }
}
?>