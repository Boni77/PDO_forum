<?php ob_start(); ?>
<br>

<table class="table table-active">
    <thead>
        <?php foreach ($requete as $categorie) { ?>
            <tr>
                <td><a href="index.php?action=listTopic&id=<?= $categorie['id_categorie'] ?>"><?= $categorie["nom_categorie"] ?></a></th>
            </tr>
        <?php } ?>
    </thead>
</table>

<?php

$requete = null;

$titre = "Catégorie";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php"
?>