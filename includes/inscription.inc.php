<h1>Inscription</h1>
<?php
// formaulaire récurcif

if (isset($_POST['frmInscription'])) {
    echo "Je viens du formulaire";

    $nom = isset($_POST['nom']) ? htmlentities(trim($_POST['nom'])) : "";
    $prenom = isset($_POST['prenom']) ? htmlentities(trim($_POST['prenom'])) : "";
    $email = isset($_POST['email']) ? htmlentities(trim($_POST['email'])) : "";
    $mdp1 = isset($_POST['mdp1']) ? htmlentities(trim($_POST['mdp1'])) :  "";
    $mdp2 = isset($_POST['mdp2']) ? htmlentities(trim($_POST['mdp2'])) :  "";

    $erreurs = array();
// vérifier que les champs sont remplis et renvoyé un message d'erreur quand le champs est vide
    if (mb_strlen($nom) === 0)
        array_push($erreurs, "Veuillez saisir votre nom");

    if (mb_strlen($prenom) === 0)
        array_push($erreurs, "Veuillez saisir votre prénom");

    if (mb_strlen($email) === 0)
        array_push($erreurs, "Veuillez saisir une adresse mail");
// filter_validate_email vérifie la validité de l'email
    elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
        array_push($erreurs, "Veuillez saisir une adresse mail conforme");
//  verifier que les mdp sont remplis
    if (mb_strlen($mdp1) === 0 || mb_strlen($mdp2) === 0) 
        array_push($erreurs, "Veuillez saisis deux fois votre mot de passe");
// vérifier que les mdp sont identiques
    elseif ($mdp1 !== $mdp2) 
        array_push($erreurs, "Vos mots de passe ne sont pas identiques");
// création message erreur sous fome de liste html
    if (count($erreurs) > 0) {
        $messageErreurs = "<ul>";

        for ($i = 0 ; $i < count($erreurs) ; $i++) {
            $messageErreurs .= "<li>";
            $messageErreurs .= $erreurs[$i];
            $messageErreurs .= "</li>";
        }
    
        $messageErreurs .= "</ul>";
    
        echo $messageErreurs;
        require_once 'frmInscription.php';
    }

    else {
        // hachage du mdp
        $mdp1 = sha1($mdp1);
        // envoyer les info dans le sql
        $requeteInscription = "INSERT INTO t_utilisateurs
        (id_utilisateur, nom, prenom, email, mdp)
        VALUES (NULL, '$nom', '$prenom', '$email', '$mdp1')
        ";
    }
}

else {
    // <!-- réinitianisation pour que le tableau rivient vide pour une nouvelle saisi-->
    $nom= $prenom = $email = " ";
    require_once 'frmInscription.php';
}