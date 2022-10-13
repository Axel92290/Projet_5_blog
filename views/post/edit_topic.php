<!doctype html>
<html lang="fr">

<head>
    <title>Editer mon Topic</title>
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
                <h1>Editer mon topic</h1>
                <form method="post">
                    <div class="sm-3">
                        <?php if (isset($err_titre)) {
                            echo '<div>' . $err_titre . '</div>';
                        } ?>
                        <label class="form-label">Titre</label>
                        <input class="form-control" type="text" name="titre" value="<?php if (isset($titre)) {
                                                                                        echo $titre;
                                                                                    } else {
                                                                                        echo $req_topic['titre'];
                                                                                    } ?>" placeholder="Titre" />
                    </div>
                    <div class="sm-3">
                        <?php if (isset($err_cat)) {
                            echo '<div>' . $err_cat . '</div>';
                        } ?>
                        <label class="form-label">Catégorie</label>
                        <select class="form-control" name="categorie">

                            <?php
                            if (isset($categorie)) {
                            ?>
                            <option value="<?= $req_post_verif['id'] ?>"> <?= $req_post_verif['titre'] ?> </option>
                            <?php
                            } elseif (isset($req_topic['id_post'])) {

                            ?>

                            <option value="<?= $req_topic['id_post'] ?>"> <?= $req_topic['titre_post'] ?> </option>

                            <?php
                            } else {
                            ?>
                            <option hidden>Choisissez votre catégorie</option>
                            <?php
                            }
                            ?>


                            <?php
                            foreach ($req_post as $rp) {

                            ?>
                            <option value="<?= $rp['id'] ?>"><?= $rp['titre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="sm-3">
                        <?php if (isset($err_contenu)) {
                            echo '<div>' . $err_contenu . '</div>';
                        } ?>
                        <label class="form-label">Contenu</label>
                        <textarea class="form-control" type="text" name="contenu"
                            placeholder="Votre topic..."><?php if (isset($contenu)) {
                                                                                                                    echo $contenu;
                                                                                                                } else {
                                                                                                                    echo $req_topic['contenu'];
                                                                                                                }  ?></textarea>
                    </div>

                    <div class="sm-3">
                        <button type="submit" name="edit" class="btn btn-outline-dark">Modifier mon topic </button>
                    </div>
                </form>




            </div>
        </div>

        <?php
        require_once('../footer/footer.php');
        ?>
</body>

</html>