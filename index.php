<?php

use Controller\CategorieController;
use Controller\AccueilController;
use Controller\TopicController;
use Controller\PostController;


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCategorie = new CategorieController();
$ctrlAccueil = new AccueilController();
$ctrlTopic = new TopicController();
$ctrlPost = new PostController();

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "accueil":
            $ctrlAccueil->Accueil();
            break;
        case "categorie":
            $ctrlCategorie->listCategorie();
            break;
        case "listTopic":
            $ctrlTopic->listTopic($_GET["id"]);
            break;
        case "view_topic":
            $ctrlTopic->ViewTopic();
            break;
        case "Post":
            $ctrlPost->listPost($_GET["id"]);
            break;
        case "view_post":
            $ctrlPost->ViewPost();
            break;
    }
} else {
    $ctrlCategorie->listCategorie();
}
