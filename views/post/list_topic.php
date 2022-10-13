<!doctype html>
<html lang="fr">

<head>
    <title>Post - <?= $req_post['titre'] ?></title>
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
                <h1><?= $req_post['titre'] ?></h1>
            </div>
            <?php
            foreach ($req_list_topics as $rlt) {

            ?>

            <div class="col-3">
                <?= $rlt['titre']; ?> <br>
                <a href="Projet-5/post/topic.php?id=<?= $rlt['id'] ?>">Lire le topic</a>
            </div>
            <?php
            }
            ?>


            <?php
            require_once('../footer/footer.php');
            ?>
</body>

</html>