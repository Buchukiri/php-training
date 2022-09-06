<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>
        <?=isset($pageTitle) ? $pageTitle: "Titre par défault"?>
    </title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl"> <?=isset($pageTitle) ? $pageTitle: "Titre par défault"?></h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link <?=isset($pageNumber) && $pageNumber === 1 ? ' active': ''?>" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link <?=isset($pageNumber) && $pageNumber === 2 ? ' active': ''?>" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link <?=isset($pageNumber) && $pageNumber === 3 ? ' active': ''?>" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link <?=isset($pageNumber) && $pageNumber === 4 ? ' active': ''?>" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link <?=isset($pageNumber) && $pageNumber === 5 ? ' active': ''?>" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>