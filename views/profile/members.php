<!doctype html>
<html lang="fr">

<head>
    <title>Membres</title>
    <?php
    require_once('../head/meta.php');
    require_once('../head/link.php');
    require_once('../head/script.php');
    ?>


</head>

<body>
    <?php
    require_once('../menu/menu.php');
    ?>
    <div class="container-sm">
        <div class="row">
            <div class="col-12">
                <h1>Membres</h1>
            </div>
            <?php
            foreach ($req_membres as $rm) {

            ?>

            <div class="col-3">
                <?= $rm['nom'] . " " . $rm['prenom']; ?> <br>
                <a href="Projet-5/Profile/voir_profil.php?id=<?= $rm['id'] ?>">Voir profil</a>
            </div>
            <?php
            }
            ?>


            <?php
            require_once('../footer/footer.php');
            ?>
</body>

</html>