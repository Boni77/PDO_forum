<?php

namespace Controller;

use Model\Connect;

class PostController
{
    public function listPost($id)
    {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query(
            "SELECT verrouille FROM topic"
        );
        $requete->execute();

        $requete2 = $pdo->prepare('
        SELECT p.message, p.createdAt, m.pseudo, p.id_topic, t.verrouille AS verrouille
        FROM post p
        INNER JOIN membre m
        ON p.id_membre = m.id_membre
        INNER JOIN topic t
        ON t.id_topic = p.id_topic 
        WHERE p.id_topic = :id
        ');
        $requete2->execute(['id' => $id]);

        $requetemembre = $pdo->query(
            "SELECT * FROM membre"
        );
        $requetemembre->execute();

        require "view/list/listPost.php";
    }

    public function AddPost()
    {
        $noerror = [
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $createdAt = filter_input(INPUT_POST, 'createdAt', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $id_membre = filter_input(INPUT_POST, 'id_membre', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $id_topic = filter_input(INPUT_POST, 'id_topic', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare(
                "INSERT INTO post(message, createdAt, id_membre, id_topic)
                VALUES (:message, :createdAt, :id_membre, :id_topic)"
            );
            $requete->execute(
                [
                    'message' => $message,
                    'createdAt' => $createdAt,
                    'id_membre' => $id_membre,
                    'id_topic' => $id_topic
                ]
            );
            header('location:' . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }

    public function ViewPost()
    {
        require "view/list/listPost.php";
    }
}
