<main>

<h1>MAIN</h1>
<?php
// isset verifie si la page existe
if(isset($_get['page'])){
    $page = $_get['page'];
    dump($page);
}else{
    $page = ['accueil'];
}
?>


</main>