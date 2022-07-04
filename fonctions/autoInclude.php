<?php

function autoInclude(string $file): void {
    // glob renvoie dans un tableau toous les fichiers avec double extention .inc.php
    $includedFiles = glob("./includes/*.inc.php");
    $file = "./includes/" . $file . ".inc.php";

    // si includeFiles est + que 0 et que dans le tableau il y a nom de page ($file) et includeFiles
    if (count($includedFiles) !== 0 && in_array($file, $includedFiles)) {
        require_once $file;
    } else {
        require_once './includes/accueil.inc.php';
    }
}