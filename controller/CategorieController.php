<?php

namespace Controller;

use Model\Connect;

class CategorieController
{
    public function listCategorie()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * from categorie
    ");
        require "view/list/categorie.php";
    }
}
