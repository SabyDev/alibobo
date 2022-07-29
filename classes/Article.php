<?php
class Article
{
    public function affichArticle(int $id): string
    {

        $sql_edit_article = "SELECT * FROM articles WHERE id_article = $id";
// die($sql_edit_article);
        $connexionArticle = new Sql();

        $resultatArticle = $connexionArticle->select($sql_edit_article);
// var_dump($resultatArticle);
        $articlePage = "<ul>";
        $articlePage .= "<li>";
        $articlePage .= $resultatArticle[0]['designation'];
        $articlePage .= $resultatArticle[0]['description'];
        $articlePage .= $resultatArticle[0]['puht'];
        $articlePage .= $resultatArticle[0]['reference'];
        $articlePage .= $resultatArticle[0]['masse'];
        $articlePage .= $resultatArticle[0]['qtestock'];
        $articlePage .= $resultatArticle[0]['qtestocksecu'];
        $articlePage .= "</li>";
        $articlePage .= "<a href=\"index.php?page=articleModif&amp;id_article=" . $resultatArticle[0]['id_article'] . "\">";        
        $articlePage .=' <input  type="submit" name="submitted" value="modifier">  ';
        $articlePage .= "</a>";
        $articlePage .= "<ul>";

        return $articlePage;
    }
    public function updateArticle(int $id): string
    {  
        $sql_edit_article = "SELECT * FROM articles WHERE id_article = $id";
// die($sql_edit_article);
        $connexionArticle = new Sql();

        $resultatArticle = $connexionArticle->select($sql_edit_article);
var_dump($resultatArticle[0]['designation']);
        $articlePage = "<ul>";
        $articlePage .= "<li>";
        // faire une concaténation dans le input
        $articlePage .= '<label for="designation">' . 'désignation' .': </label>';
        $articlePage .= '<input type=\"text\" value='.$resultatArticle[0]['designation']. '>' ;
        $articlePage .= '<label for="designation">' . 'description' .': </label>';
        $articlePage .= '<input type=\"text\" value='.$resultatArticle[0]['description']. '>' ;
        $articlePage .= '<label for="designation">' . 'puht' .': </label>';
        $articlePage .= '<input type=\"text\" value='.$resultatArticle[0]['puht']. '>' ;
        $articlePage .= '<label for="designation">' . 'Référence' .': </label>';
        $articlePage .= '<input type=\"text\" value='.$resultatArticle[0]['reference']. '>' ;
        $articlePage .= '<label for="designation">' . 'masse' .': </label>';
        $articlePage .= '<input type=\"text\" value='.$resultatArticle[0]['masse']. '>' ;
        $articlePage .= '<label for="designation">' . 'qtestock' .': </label>';
        $articlePage .= '<input type=\"text\" value='.$resultatArticle[0]['qtestock']. '>' ;
        $articlePage .= '<label for="designation">' . 'qtestocksecu' .': </label>';
        $articlePage .= '<input type=\"text\" value='.$resultatArticle[0]['qtestocksecu']. '>' ;
        $articlePage .= "<a href=\"index.php?page=articleModif&amp;id_article=" . $resultatArticle[0]['id_article'] . "\">";        
        $articlePage .=' <input  type="submit" name="submitted" value="modifier">  ';
        $articlePage .= "</a>";
        $articlePage .= "<ul>";
         
        return $articlePage;
    }
    // }
    // public function deleteArticle(string $sql): bool
    // {
    //     $resultatDelete = $this->connexion->prepare($sql)->execute();
    //     if ($resultatDelete->rowCount() > 0)
    //         return true;
    //     else
    //         return false;
    // }
    
}
