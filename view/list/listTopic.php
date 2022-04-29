<?php ob_start();
?>


<div class="centerTopic">
    <table>
        <tr>
            <th>Topic</th>
            <th>Etat</th>
            <th>Date de création</th>
            <th>Auteur</th>
            <th>Post</th>


        </tr>
        <?php foreach ($requete2->fetchAll() as $topic) { ?>
            <tr>
                <td><?= $topic["titre"] ?></td>
                <td><?php if ($topic["verrouille"] == 1) {
                        echo '<i class="fa-solid fa-lock"></i>';
                    } elseif ($topic["verrouille"] == 0) {
                        echo '<i class="fa-solid fa-lock-open"></i>';
                    }; ?></td>
                <td><?= $topic["createdAt"] ?></td>
                <td><?= $topic["pseudo"] ?></td>
                <td><a href="index.php?action=Post&id=<?= $topic['id_topic'] ?>">
                        <div class="coms"><i class="fa-solid fa-comment-dots"></i></div>
                    </a></td>
            </tr>
        <?php } ?>
    </table>
</div>
<br>
<br>
<section>
    <div class="addmsg">
        <div class="add">
            <h5>Crée un topic</h5>
            <form action="index.php?action=addTopic" method="post">
                <p><input type="text" name="titre" placeholder="Titre du Topic"></p>
                <p><input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="createdAt">
                <p><input type="hidden" value="0" name="verrouille"></p>
                <p>
                    <label for="id_membre">
                        <h6>Choisir le membre</h6>
                    </label>
                    <select name="id_membre">
                        <?php foreach ($requeteX->fetchAll() as $add) { ?>
                            <option value="<?= $add['id_membre'] ?>"><?= $add['pseudo'] ?></option>
                        <?php } ?>
                    </select>
                </p>
                <p><input type="hidden" value="<?= $topic['id_categorie'] ?>" name="id_categorie"></p>
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-primary" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php

$requete = null;

$titre = "Topic";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php"
?>