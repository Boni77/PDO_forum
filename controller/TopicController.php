<?php

namespace Controller;

use Model\Connect;

class TopicController
{
    public function listTopic($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare('SELECT * FROM topic WHERE id_topic = :id');
        $requete2 = $pdo->prepare('
        SELECT c.nom_categorie, t.titre, t.id_topic, t.createdAt, m.pseudo
        FROM categorie c
        INNER JOIN topic t 
        ON c.id_categorie = t.id_categorie
        INNER JOIN membre m 
        ON m.id_membre = t.id_membre
        WHERE t.id_categorie = :id
        ');
        $requete->execute(['id' => $id]);
        $requete2->execute(['id' => $id]);
        require "view/list/listTopic.php";
    }

    public function ViewTopic()
    {
        require "view/list/listTopic.php";
    }
}
