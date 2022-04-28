<?php

namespace Controller;

use Model\Connect;

class PostController
{
    public function listPost($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare('SELECT * FROM post WHERE id_topic = :id');
        $requete2 = $pdo->prepare('
        SELECT p.message, p.createdAt, m.pseudo
        FROM post p
        INNER JOIN membre m
        ON p.id_topic = m.id_topic
        WHERE p.id_topic = :id
        ');
        $requete2->execute(['id' => $id]);

        $requetemembre = $pdo->query(
            "SELECT * FROM membre"
        );
        $requetemembre->execute();

        $requete->execute(['id' => $id]);

        require "view/list/listPost.php";
    }

    public function ViewPost()
    {
        require "view/list/listPost.php";
    }
}
