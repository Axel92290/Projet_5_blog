<?php
require_once('include.php');
require_once('../model/user.php');


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






$user = new User;

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

            $req_pword_by_mail = $this->user->get_pword_by_mail($mail);

            if ($req_pword_by_mail != null) {
                if (isset($req_pword_by_mail)) {
                    if (!password_verify($pword, $req_pword_by_mail)) {
                        $this->valid  = false;
                        $this->err_pword = "Les informations rentrées sont incorrectes.";
                    }
                } else {
                    $this->valid  = false;
                    $this->err_pword = "Les informations rentrées sont incorrectes.";
                }
            }
        }





        if ($this->valid) {

            $req_user_by_mail = $this->user->get_user_by_mail($mail);
            $req_user_id = $req_user_by_mail['id'];


            if (isset($req_user_id)) {
                $date_login = date('Y-m-d H:i:s');


                $set_User_DateLogin_By_Id = $this->user->set_User_DateLogin_By_Id($date_login, $req_user_id);

                if (isset($set_User_DateLogin_By_Id)) {
                    $_SESSION['id'] = $req_user_by_mail['id'];
                    $_SESSION['prenom'] = $req_user_by_mail['prenom'];
                    $_SESSION['mail'] = $req_user_by_mail['mail'];
                    $_SESSION['role'] = $req_user_by_mail['role'];
                }

                header('Location: ../index.php');
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