<?php

// Affichage des articles pour les utilisateurs connectés avec les droits admin

if (verifierAdmin()) {
    if ($pdo = pdo()) {
        $champ = $_GET['champ'] ?? "designation";
        $orderby = $_GET['orderby'] ?? "asc";

        $requeteArticles = "SELECT * FROM articles ORDER BY $champ $orderby";

        $tableauResultats = "<table>";
        $tableauResultats .= "<thead>";
        $tableauResultats .= "<tr>";
        $tableauResultats .= "<th>";
        $tableauResultats .= genererUrl('Catégories', 'categorie', $champ, $orderby);
        $tableauResultats .= "</th>";
        $tableauResultats .= "<th>";
        $tableauResultats .= "Référence";
        $tableauResultats .= "</th>";
        $tableauResultats .= "<th>";
        $tableauResultats .= genererUrl('Désignation', 'designation', $champ, $orderby);
        $tableauResultats .= "</th>";
        $tableauResultats .= "<th>";
        $tableauResultats .= genererUrl('PUHT', 'puht', $champ, $orderby);;
        $tableauResultats .= "</th>";
        $tableauResultats .= "<th>";
        $tableauResultats .= "Taux de TVA";
        $tableauResultats .= "</th>";
        $tableauResultats .= "<th>";
        $tableauResultats .= genererUrl('Masse', 'masse', $champ, $orderby);;
        $tableauResultats .= "</th>";
        $tableauResultats .= "<th>";
        $tableauResultats .= genererUrl('Quantité en stock', 'qtestock', $champ, $orderby);
        $tableauResultats .= "</th>";
        $tableauResultats .= "<th>";
        $tableauResultats .= genererUrl('Stock de sécurité', ' 	qtestockesecu ', $champ, $orderby);
        $tableauResultats .= "</th>";
        $tableauResultats .= "</tr>";
        $tableauResultats .= "</thead>";
        $tableauResultats .= "<tbody>";

        $resultatRequeteArticles = $pdo->query($requeteArticles)->fetchAll();

        foreach($resultatRequeteArticles as $row) {
            $tableauResultats .= "<tr>";
            $tableauResultats .= "<td>" . $row['id_categorie'] . "</td>";
            $tableauResultats .= "<td>" . $row['reference'] . "</td>";
            $tableauResultats .= "<td><a href=\"index.php?page=articleDetailAdmin&amp;articleId=" . $row['id_article'] . "\">" . $row['designation'] . "</a></td>";
            $tableauResultats .= "<td>" . $row['puht'] . "</td>";
            $tableauResultats .= "<td>" . $row['id_tva'] . "</td>";
            $tableauResultats .= "<td>" . $row['masse'] . "</td>";
            $tableauResultats .= "<td>" . $row['id_categorie'] . "</td>";
            $tableauResultats .= "<td>" . $row['qtestock'] . "</td>";
            $tableauResultats .= "<td>" . $row['qtestocksecu'] . "</td>";
            $tableauResultats .= "<td><a href=\"index.php?page=update&amp;articleId=" . $row['id_article'] . "\">" .  "Modifier</a></td>";
            $tableauResultats .= "<td><a href=\"index.php?page=delete&amp;articleId=" . $row['id_article'] . "\">" .  "Supprimer </a></td>";
            $tableauResultats .= "</tr>";

        }

        $tableauResultats .= "</tbody>";
        $tableauResultats .= "</table>";

        echo $tableauResultats;

        if (isset($_POST['frmInscription'])) {
            $nom = isset($_POST['nom']) ? htmlentities(trim($_POST['nom'])) : "";
            $prenom = isset($_POST['prenom']) ? htmlentities(trim($_POST['prenom'])) : "";
            $email = isset($_POST['email']) ? htmlentities(trim($_POST['email'])) : "";
            $mdp1 = isset($_POST['mdp1']) ? htmlentities(trim($_POST['mdp1'])) :  "";
            $mdp2 = isset($_POST['mdp2']) ? htmlentities(trim($_POST['mdp2'])) :  "";
            $cgu = isset($_POST['cgu']) ? $_POST['cgu'] :  "";

    } else {
        echo "<p>Erreur PDO</p>";
    }
} else {
    $codeJs = "<p>Vous allez être redirigé dans 5 secondes.<br />Si la redirection n'est pas automatique, <a href=\"http://localhost:8080/DWWM-Vernon-2022-PHP-Alibobo/\">cliquez ici</a></p>";
    $codeJs .= "
    <script>
        setTimeout(function() {
            window.location.replace('http://localhost:8080/DWWM-Vernon-2022-PHP-Alibobo/')
        }, 5000);
    </script>
    ";
    echo $codeJs;
}}