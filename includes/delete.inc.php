<?php



// vérification de l'ID dans la bdd
if (!empty($_GET['articleId']) && is_numeric($_GET['articleId'])) {
   // global $pdo;
   $pdo = pdo();
   $id = $_GET['articleId'];
   $sql = "SELECT * FROM articles WHERE id_article = $id";
   $query =  $pdo->query($sql)->fetch();


   //  verification si l'id dans l'URL existe. s'il existe on fait une requete à la bdd delete
   if (!empty($_GET['articleId']) && is_numeric($_GET['articleId'])) {
      $id = $_GET['articleId'];
      // requete bdd
      $sql_supp = "DELETE  FROM articles WHERE id_article = :id_article";
      // on prepare une requête à l'exécution et retourne un objet
      $query = $pdo->prepare($sql_supp);
      //  on associe une valeur à un paramètre
      $query->bindValue(':id_article', $id, PDO::PARAM_INT);
      // exécution de la requete
      $query->execute();
      // une fois la requete executé on retourne sur une autre page
      echo "<script>alert(`vous avez bien supprimé l'article`)</script>";
      echo "<script>window.location.replace('http://localhost/DWWM-Vernon-2022-PHP-Alibobo/index.php?page=articlesAdmin')</script>";
   }
} else {
      // si erreur on arrete le code ab=vec message d'erreur
      die('404');
   ;
}
