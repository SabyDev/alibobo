<h1>Articles</h1>
<?php

$requeteCategoriesNiveau1 = "
    SELECT *
    FROM categories
   
    ORDER BY libelle
";

$connexionCategories = new Sql();

$resultatCaterogies = $connexionCategories->select($requeteCategoriesNiveau1);

$menuCategories = "<ul>";

for ($i = 0 ; $i < count($resultatCaterogies) ; $i++) {
    $menuCategories .= "<li>";
    $menuCategories .= "<a href=\"index.php?page=articles&amp;id_categorie=" . $resultatCaterogies[$i]['id_categorie'] . "\">";
    $menuCategories .= $resultatCaterogies[$i]['libelle'];
    $menuCategories .= "</a>";
    $menuCategories .= "</li>";
}

$menuCategories .= "<ul>";

echo $menuCategories;


//  si on récupère qqch dans l'Id categorie
if (isset($_GET['id_categorie'])) {
    // on fait une variable id categarie qui est égale à l'id catégorie que l'on récupère
    $id_categorie = $_GET['id_categorie'];

// on fait une requete on seltionne les articles dans id_ categorie et on prend les designations de categorie
    $requeteArticlesParCategorie = "
        SELECT *
        FROM articles
        WHERE id_categorie = $id_categorie
        ORDER BY designation
    ";
// on fait une nouvelle fonction sql
    $connexionArticles = new Sql();
// on se connecte à la base de donné via new sql et on lui donne l'ordre d exécuter la requete
    $resultatArticles = $connexionArticles->select($requeteArticlesParCategorie);
//  on déclare une liste en html
    $articles = "<ul>";
// on lui passe une condition pour ajouter des éléments tant qu'il y en a.
    for ($i = 0 ; $i < count($resultatArticles) ; $i++) {
        $articles .= "<li>";        
        $articles .= "<a href=\"index.php?page=articleDetail&amp;id_article=" . $resultatArticles[$i]['id_article'] . "\">";
        $articles .= $resultatArticles[$i]['designation'];
        $articles .= "</li>";        
    }
// on ferme la liste html
    $articles .= "</ul>";
// on affiche le resultat.
    echo $articles;
}
