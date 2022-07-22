<?php

if (isset($_POST['email'])){

    $token = uniqid();
    $message = "nouveau lien reinitialisation : $password";
    $headers = 'Content-Type: text/plain; charset="utf-8"' ."";

    if(mail($_POST['email'], 'mot de passe oublié', $message, $headers)){

        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$token, $_POST['email']]);
        echo "mail envoyé";
    }
    else{
        echo "erreur";
    }
}