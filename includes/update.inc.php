<?php
// vérifier que l'id existe s'il existe agir sur la bdd avec une requete select pour aller chercher l'info dans la bdd
if (!empty($_GET['articleId']) && is_numeric($_GET['articleId'])) {
    $pdo = pdo();
    $id = $_GET['articleId'];
    // requete bdd
    $sql = "SELECT * FROM articles LEFT JOIN categories ON articles.id_categorie = categories.id_categorie  LEFT JOIN tva ON articles.id_tva = tva.id_tva WHERE id_article = $id";
    // Prépare une requête à l'exécution et retourne un objet
    $query = $pdo->query($sql)->fetch();

    $tvaAll = "SELECT * FROM `tva`";
    $tvaInd = $pdo->query($tvaAll)->fetchAll();

    $cat = "SELECT * FROM `categories`";
    $catChoix = $pdo->query($cat)->fetchAll();


    // En cas d'erreur retourne un tableau
    $errors = [];
    if (!empty($_POST['submitted'])) {

        // Faille XSS enlève les espace avec trim et les balises avec strip_tags pour eviter l'injection de code
        $categorie = trim(strip_tags($_POST['id_categorie']));
        $reference = trim(strip_tags($_POST['reference']));
        $designation = trim(strip_tags($_POST['designation']));
        $description = trim(strip_tags($_POST['description']));
        $puht = trim(strip_tags($_POST['puht']));
        $tva = trim(strip_tags($_POST['indice']));
        $qtestock = trim(strip_tags($_POST['qtestock']));
        $qtestocksecu = trim(strip_tags($_POST['qtestocksecu']));
        $masse = trim(strip_tags($_POST['masse']));
        // Validation



        // Si pas d'erreur modification. un envoie la requete de modif a la bdd
        if (count($errors) === 0) {

            $requete_update = "UPDATE `articles` SET `designation` = :designation, `description` = :description, `puht` = :puht, `reference` = :reference, `qtestock` = :qtestock, `qtestocksecu` = :qtestocksecu, `masse` = :masse, `id_categorie` = :id_categorie, `id_tva` = :id_tva WHERE id_article =  $id";
            $query = $pdo->query($sql);
           
            $query->bindValue(':reference', $reference, PDO::PARAM_STR);
            $query->bindValue(':designation', $designation, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            $query->bindValue(':puht', $puht, PDO::PARAM_STR);
            $query->bindValue(':qtestock', $qtestock, PDO::PARAM_STR);
            $query->bindValue(':qtestocksecu', $qtestocksecu, PDO::PARAM_STR);
            $query->bindValue(':masse', $masse, PDO::PARAM_INT);
            $query->execute();
            echo "<script>alert(`Article modifié`)</script>";
            // echo "<script>window.location.replace('http://localhost/alibobo/alibobo/index.php?page=articlesAdmin')</script>";
        }
    }
    var_dump($query);
    // var_dump($catChoix);
?>
    <!-- on edit par exemple l'article pour poouvoir proceder à la modification -->
    <form action="" method="post">
    <div>
            <?php
            // pour offrir deux option à status création d'un tableau avec les 2 choix
            $status = array(
                $catChoix['0']['libelle'],
                $catChoix['1']['libelle'],
                $catChoix['2']['libelle'],
                $catChoix['3']['libelle'],
                $catChoix['4']['libelle'],
                $catChoix['5']['libelle'],
                $catChoix['6']['libelle'],
                $catChoix['7']['libelle'],
                $catChoix['8']['libelle']
            );

            ?>
            <label for="categorie">Catégories :</label>
            <select name="categorie">
                <option value="">---------------------</option>
                <!-- faire une fonction  -->
                <?php foreach ($status as $key => $value) {
                    $selected = '';
                    if (!empty($_POST['libelle'])) {
                        if ($_POST['libelle'] == $key) {
                            $selected = ' selected="selected"';
                        }
                    }
                ?>
                    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <span class="error"><?php if (!empty($errors['libelle'])) {
                                    echo $errors['libelle'];
                                } ?></span>

        </div>
        <div>
            <label for="reference">réference :</label>
            <input type="text" id="reference" name="reference" value="<?= $query['reference'] ?>" />
        </div>
        <div>
            <label for="designation">designation :</label>
            <input type="text" id="designation" name="designation" value="<?= $query['designation'] ?>" />
        </div>
        <div>
            <label for="description">description :</label>
            <input type="text" id="description" name="description" value="<?= $query['description'] ?>" />
        </div>
        <div>
            <label for="puht">puht :</label>
            <input type="text" id="puht" name="puht" value="<?= $query['puht'] ?>" />
        </div>
        <div>
            <?php
            // pour offrir deux option à status création d'un tableau avec les 2 choix
            $status = array(
                $tvaInd['0']['indice'],
                $tvaInd['1']['indice'],
                $tvaInd['2']['indice'],
                $tvaInd['3']['indice'],
            );

            ?>
            <label for="tva">tva :</label>
            <select name="tva">
                <option value="">---------------------</option>
                <!-- faire une fonction  -->
                <?php foreach ($status as $key => $value) {
                    $selected = '';
                    if (!empty($_POST['indice'])) {
                        if ($_POST['indice'] == $key) {
                            $selected = ' selected="selected"';
                        }
                    }
                ?>
                    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <span class="error"><?php if (!empty($errors['indice'])) {
                                    echo $errors['indice'];
                                } ?></span>

        </div>
        <div>
            <label for="qtestock">qtestock :</label>
            <input type="text" id="qtestock" name="qtestock" value="<?= $query['qtestock'] ?>" />
        </div>
        <div>
            <label for="qtestocksecu">qtestocksecu :</label>
            <input type="text" id="qtestocksecu" name="qtestocksecu" value="<?= $query['qtestocksecu'] ?>" />
        </div>
        <div>
            <label for="masse">Masse</label>
            <input type="text" id="masse" name="masse" value="<?= $query['masse'] ?>" />
        </div>
        <div>
            <input type="submit" name="submitted" value="modifier">           
        </div>

    </form>
<?php } ?>