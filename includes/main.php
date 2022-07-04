<main>

<h1>MAIN</h1>
<?php
// isset verifie si la page existe
// syntaxe conventionnelle
// if(isset($_get['page'])){
//     $page = $_get['page'];
//     dump($page);
// }else{
//     $page = ['accueil'];
// }
// syntaxe ternaire
// $page = isset($_GET['page']) ? $_GET['page'] : "accueil"; 

// Null coalescent operator (php8 surtout pour les booleens)


$page = $_GET['page'] ?? "accueil";
require_once './includes/' . $page . ".inc.php";



?>


</main>