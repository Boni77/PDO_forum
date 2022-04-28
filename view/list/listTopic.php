<?php ob_start();
$coms = $requete->fetch();
?>

<?php foreach ($requete2->fetchAll() as $topic) { ?>
    <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"><?= $topic["titre"] ?></div>
        <div class="card-body">
            <h4 class="card-title">Crée le <?= $topic["createdAt"] ?></h4>
            <h5 class="card-title">Par <?= $topic["pseudo"] ?></h5>
            <p class="card-text"><a href="index.php?action=Post&id=<?= $topic['id_topic'] ?>">Post</a></p>
        </div>
    </div>
<?php } ?>


<?php

$requete = null;

$titre = "Topic";
$titre_secondaire = "TOPICS";
$contenu = ob_get_clean();
require "view/template.php"
?>