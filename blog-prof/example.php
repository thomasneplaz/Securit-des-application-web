<?php

# Fonction pour sauvergarder les données dans le fichier JSON. + redirection
function save($data)
{
    file_put_contents('db.json', json_encode($data, JSON_FORCE_OBJECT));
    header('Location: example.php');
}

# On charge les articles
$articles = json_decode(file_get_contents('db.json'), true);

# Si le formulaire d'édition a été déclenché, on modifie la valeur de content et on sauvegarde.
if (isset($_GET['content']) && isset($_GET['form_edit'])) {
    $articles[$_GET['form_edit']]['content'] = $_GET['content'];
    save($articles);
}

# Si le formulaire d'ajout a été déclenché, on ajoute au tableau d'articles une ligne et on sauvegarde.
if (isset($_GET['content']) && strlen($_GET['content']) > 3 && isset($_GET['add']) && $_GET['add'] == 1) {
    $articles[] = [
        'date' => date('Y-m-d H:i:s'),
        'content' => $_GET['content'],
    ];
    save($articles);
}

# Si une suppression est demandé, on enlève la valeur du tableau et on sauvegarde.
if (isset($_GET['delete'])) {
    unset($articles[$_GET['delete']]);
    save($articles);
}

?>

<h1>Mon blog</h1>
<a href="example.php">Accueil</a>

<?php
# Si un article a été séléctionné, on l'affiche
if (isset($_GET['view']) && isset($articles[$_GET['view']])) {
    echo "<h2>" . $articles[$_GET['view']]['date'] . "</h2>";
    echo "<p>" . $articles[$_GET['view']]['content'] . "</p>";
    ?>
    <a href="example.php?view=<?=$_GET['view']?>">Voir</a>
    <a href="example.php?edit=<?=$_GET['view']?>">Editer</a>
    <a href="example.php?delete=<?=$_GET['view']?>">Supprimer</a>
    <?php
}
?>

<?php
# Si aucun article n'a été séléctionné, on les liste tous.
if (!isset($_GET['view']) && !isset($_GET['edit'])) {
    foreach (($articles) as $index => &$article) {
        ?>

<h2><?=$article['date']?></h2>
<p><?=$article['content']?></p>
<a href="example.php?view=<?=$index?>">Voir</a>
<a href="example.php?edit=<?=$index?>">Editer</a>
<a href="example.php?delete=<?=$index?>">Supprimer</a>

<?php
}}
?>


<hr>

<?php 
# Si aucune demande d'édition n'a été déclenchée, on affiche le formulaire d'ajout
if (!isset($_GET['edit'])) {?>
<h2>Ajouter un article</h2>
<form action="" method="get">
    <textarea name="content" required></textarea><br/>
    <button name="add" value="1" type="submit">Ajouter</button>
</form>

<?php } 
# Si une demande d'édition a été déclenchée, on affiche le formulaire d'édition
else {?>
    <h2>Modifier l'article <?=$articles[$_GET['edit']]['date']?></h2>
    <form action="" method="get">
    <textarea name="content" required><?=$articles[$_GET['edit']]['content']?></textarea><br/>
    <button name="form_edit" value="<?=$_GET['edit']?>" type="submit">Modifier</button>
</form>
<?php }?>