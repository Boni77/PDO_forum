<?php ob_start();
$top = $requete->fetch();
?>

<section>
    <?php foreach ($requete2->fetchAll() as $post) { ?>
        <div class="card border-primary mb-3" style="max-width: 20rem;">
            <div class="card-header"><?= $post["pseudo"] ?></div>
            <div class="card-body">
                <h5 class="card-title"><?= $post["message"] ?></h5>
                <h6 class="card-title">Post du <?= $post["createdAt"] ?></h6>
            </div>
        </div>
    <?php } ?>
</section>

<section>
    <form action="index.php?action=view_post" method="post">
        <p><textarea name="message" placeholder="Message..." required></textarea></p>
        <p><input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="createdAt">

        <p>
            <label for="id_membre">
                <h6>Choisir le membre</h6>
            </label>
            <select name="id_membre">
                <?php foreach ($requetemembre->fetchAll() as $membre) { ?>
                    <option value="<?= $membre["id_membre"] ?>"><?= $membre["pseudo"] ?></option>
                <?php } ?>
            </select>
        </p>

        <p><input type="text" value="<?php $top["id_topic"] ?>" name="id_topic"></p>
        <p><input type="submit"></p>

    </form>
</section>

<?php

$requete = null;
$requete2 = null;

$titre = "Post";
$titre_secondaire = "Les posts";
$contenu = ob_get_clean();
require "view/template.php";
