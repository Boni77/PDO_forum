<?php ob_start();
?>

<section>
    <?php foreach ($requete2->fetchAll() as $post) { ?>
        <div class="card border-primary mb-3" style="max-width: 80rem;">
            <div class="card-header"><?= $post["pseudo"] ?> <h6>auteur</h6>
            </div>
            <div class="card-body">
                <h5 class="card-title">« <?= $post["message"] ?> »</h5>
                <h6 class="card-title" style="text-align: right;">Post du <?= $post["createdAt"] ?></h6>
            </div>
        </div>
    <?php } ?>
</section>
<br>
<br>

<section class="addmsg">
    <?php if ($post["verrouille"] == 0) { ?>
        <div class="add">
            <h5>Ajouter un post</h5>
            <form action="index.php?action=addPost" method="post">
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

                <p><input type="hidden" name="id_topic" value="<?= $post["id_topic"] ?>" name="id_topic"></p>
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-primary" type="submit">Envoyer</button>
                </div>

            </form>
        </div>
    <?php } ?>
</section>

<?php

$requete2 = null;

$titre = "Post";
$titre_secondaire = "Les posts";
$contenu = ob_get_clean();
require "view/template.php";
