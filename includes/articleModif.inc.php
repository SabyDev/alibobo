<?php

if (isset($_GET['id_article'])) {
    // on fait une variable id categarie qui est égale à l'id catégorie que l'on récupère
    $id_article= $_GET['id_article'];
    $resultatArticle = new Article();
    echo $resultatArticle->updateArticle($id_article);}