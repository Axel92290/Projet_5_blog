<!doctype html>
<html lang="fr">

<head>
    <?php
    require_once('../head/meta.php');
    require_once('../head/script.php');
    require_once('../head/link.php');
    ?>

    <title>Modifier mon profil</title>
</head>

<body>
    <?php
    require_once('../menu/menu.php');
    ?>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1>Modifier mes informations</h1>

                <form method="post">
                    <div class="mb-3">
                        <?php if (isset($err_mail)) {
                            echo '<div>' . $err_mail . '</div>';
                        } ?>
                        <input class="form-control" type="email" name="mail" value="" placeholder="Mail" />
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-outline-dark" type="submit" name="form1" value="Modifier" />
                    </div>
                </form>

                <form method="post">

                    <div class=mb-3>
                        <?php if (isset($err_pword)) {
                            echo '<div>' . $err_pword . '</div>';
                        } ?>
                        <input class="form-control" type="password" name="oldpword" placeholder="Ancien Mot de passe"
                            value="" />
                    </div>

                    <div class=mb-3>
                        <input class="form-control" type="password" name="newpword" placeholder="Nouveau Mot de passe"
                            value="" />
                    </div>

                    <div class=mb-3>
                        <input class="form-control" type="password" name="confpword"
                            placeholder="Confirmation du Mot de passe" value="" />
                    </div>

                    <div class=mb-3>
                        <input class="btn btn-outline-dark" type="submit" name="form2" value="Modifier" />
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php
    require_once('../footer/footer.php');
    ?>
</body>

</html>