<!doctype html>
<html lang="fr">

<head>
    <title>Post - <?= $req_topic['titre'] ?></title>
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
            <div class="col-3"></div>
            <div class="col-6">
                <h1><?= $req_topic['titre'] ?></h1>
                <br>
                <a href="Projet-5/post/edit-topic.php?id=<?= $req_topic['id'] ?>">Editer mon topic</a>
                <br>
                <br>
            </div>
            <div class="col-3"></div>

        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div><?= nl2br($req_topic['contenu']); ?></div>
                <br>
                <div> De <?= $req_topic['prenom']; ?></div>
                <div> Catégorie : <?= $req_topic['titre_post']; ?></div>
                <div> Créé Le <?= date_format(date_create($req_topic['date_creation']), 'd/m/Y à H:i'); ?></div>

                <?php
                if ($req_topic['date_creation'] < $req_topic['date_modification']) {
                ?>
                <div> Modifié Le <?= date_format(date_create($req_topic['date_modification']), 'd/m/Y à H:i'); ?></div>
                <?php
                }
                ?>

            </div>
            <div class="col-3"></div>
        </div>
    </div>


    <br>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-3">
            <h1>Commentaires</h1>
        </div>



        <?php
        foreach ($req_topics_commentaires as $rtc) {


        ?>
        <div class="col-6">
        </div>
        <div class="col-3"></div>

    </div>

    <br>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div><?= nl2br($rtc['contenu']); ?></div>
            <br>
            <div> De <?= $rtc['prenom']; ?></div>
            <div> Créé Le <?= date_format(date_create($rtc['date_creation']), 'd/m/Y à H:i'); ?></div>

            <?php
            if ($rtc['date_creation'] < $rtc['date_modification']) {
            ?>
            <div> Modifié Le <?= date_format(date_create($rtc['date_modification']), 'd/m/Y à H:i'); ?></div>
            <?php
            }
            ?>

        </div>
        <div class="col-3"></div>
        <?php
        }
    ?>
    </div>
    </div>


    <?php
    require_once('../footer/footer.php');
    ?>
</body>

</html>