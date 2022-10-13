<!doctype html>
<html lang="fr">

<head>
    <title>Accueil</title>
    <?php
    require_once('head/meta.php');
    require_once('head/link.php');
    require_once('head/script.php');
    ?>



</head>

<body>
    <?php
    require_once('menu/menu.php');
    ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/pictures/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1><?= $welcome ?> </h1>
                        <span class="subheading">Bienvenue sur mon blog</span>
                    </div>
                </div>
            </div>
        </div>
    </header>




    <?php

    require_once("contact.php");
    ?>

    {%}
    <?php
    require_once('footer/footer.php');
    ?>

</body>