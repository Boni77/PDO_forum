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
            SELECT c.nom_categorie, t.titre, t.id_topic, t.createdAt, m.pseudo, t.id_categorie, t.verrouille AS verrouille
            FROM categorie c
            INNER JOIN topic t 
            ON c.id_categorie = t.id_categorie
            INNER JOIN membre m 
            ON m.id_membre = t.id_membre
            WHERE t.id_categorie = :id
        ');

        $requeteX = $pdo->query(
            "SELECT * FROM membre"
        );
        $requeteX->execute(['id' => $id]);

        $requete->execute(['id' => $id]);
        $requete2->execute(['id' => $id]);
        require "view/list/listTopic.php";
    }

    public function addTopic()
    {

        $pdo = Connect::seConnecter();

        $noerror = [
            $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $createdAt = filter_input(INPUT_POST, 'createdAt', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $verrouille = filter_input(INPUT_POST, 'verrouille', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $id_membre = filter_input(INPUT_POST, 'id_membre', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
        ];

        if (!empty($noerror)) {

            $requete = $pdo->prepare(
                "INSERT INTO topic (titre, createdAt, verrouille, id_membre, id_categorie)
                VALUES (:titre, :createdAt, :verrouille, :id_membre, :id_categorie)"
            );
            $requete->execute(
                [
                    'titre' => $titre,
                    'createdAt' => $createdAt,
                    'verrouille' => $verrouille,
                    'id_membre' => $id_membre,
                    'id_categorie' => $id_categorie
                ]
            );
            header('location:' . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            echo 'une erreur est survenue';
        }
    }
}
