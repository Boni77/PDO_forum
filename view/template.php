<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.css">
    <script src="https://kit.fontawesome.com/81ab4e445e.js" crossorigin="anonymous"></script>
    <title>Forum</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?action=accueil">FORUM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" a href="index.php?action=categorie">CATEGORIE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="wrapper">
        <main>
            <div class="contenu">

                <br>
                <h2><?= $titre_secondaire ?>
                    <br>
                    <p><?= $contenu ?>
            </div>
        </main>
    </div>

</body>

</html>