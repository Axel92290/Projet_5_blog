<?php
require_once('include.php');


if (isset($_SESSION['id'])) {

    header('Location : ../index.php');
    exit;
}

if (!empty($_REQUEST)) {
    extract($_REQUEST);

    if (isset($_REQUEST['connexion'])) {

        [$err_mail, $err_pword] = $_Login->verif_connexion($mail, $pword);
    }
}








class Login
{
    private $valid;
    private $err_mail;
    private $err_pword;


    public function verif_connexion($mail, $pword)
    {

        //Variables d'entrées

        //Variables déclarées
        $this->valid = (bool) true;




        global $DB;

        $mail = trim($mail);
        $pword = trim($pword);

        if (empty($mail)) {
            $this->valid  = false;
            $this->err_mail = "Ce champ ne peut pas être vide";
        }

        if (empty($pword)) {
            $this->valid  = false;
            $this->err_pword = "Ce champ ne peut pas être vide";
        }



        if ($this->valid) {
            $req = $DB->prepare("SELECT pword FROM utilisateur WHERE mail =?");
            $req->execute(array($mail));

            $req = $req->fetch();


            if (isset($req['pword'])) {
                if (!password_verify($pword, $req['pword'])) {
                    $this->valid  = false;
                    $this->err_pword = "Les informations rentrées sont incorrectes.";
                }
            } else {
                $this->valid  = false;
                $this->err_pword = "Les informations rentrées sont incorrectes.";
            }
        }


        if ($this->valid) {
            $req = $DB->prepare("SELECT * FROM utilisateur WHERE mail =?");
            $req->execute(array($mail));

            $req_user = $req->fetch();

            if (isset($req_user['id'])) {
                $date_connexion = date('Y-m-d H:i:s');


                $req = $DB->prepare("UPDATE utilisateur SET date_connexion = ? WHERE id = ?");
                $req->execute(array($date_connexion, $req_user['id']));

                $_SESSION['id'] = $req_user['id'];
                $_SESSION['prenom'] = $req_user['prenom'];
                $_SESSION['mail'] = $req_user['mail'];
                $_SESSION['role'] = $req_user['role'];

                header('Location: index.php');
                exit;
            } else {
                $this->valid  = false;
                $this->err_pword = "Les informations rentrées sont incorrectes.";
            }
        }

        return [$this->err_mail, $this->err_pword];
    }
}

require_once('../views/login.php');