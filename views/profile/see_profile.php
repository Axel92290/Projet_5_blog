<!doctype html>
<html lang="fr">

<head>
    <?php
    require_once('../head/meta.php');
    require_once('../head/script.php');
    require_once('../head/link.php');
    ?>

    <title>Profil de <?= $req_user['prenom'] ?> </title>
</head>

<body>
    <?php
    require_once('../menu/menu.php');
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1> <?= $req_user['prenom'] ?> <?= $req_user['nom'] ?></h1>

                <div>
                    Date d'inscription : <?= $date_registration ?>
                </div>

                <div>
                    Date de dernière connexion : <?= $date_connexion ?>
                </div>

                <div>
                    Rôle utilisateur : <?= $role ?>
                </div>





            </div>


        </div>

    </div>

    <?php
    require_once('../footer/footer.php');
    ?>
</body>

</html>