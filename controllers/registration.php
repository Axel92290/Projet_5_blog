<?php

require_once('../model/user.php');
require_once("include.php");

if (!empty($_REQUEST)) {
    extract($_REQUEST);


    if (isset($_REQUEST['inscription'])) {

        [$err_nom, $err_prenom, $err_mail, $err_pword] = $_registration->verif_registration($nom, $prenom, $mail, $confmail, $pword, $confpassword);
    }
}


$user = new User;

class Registration
{
    private $err_nom;
    private $err_prenom;
    private $err_mail;
    private $err_pword;
    private $valid;


    public function verif_registration($nom, $prenom, $mail, $confmail, $pword, $confpassword)
    {

        global $DB;

        // Variables d'entrées
        $nom = (string) ucfirst(trim($nom));
        $prenom = (string) ucfirst(trim($prenom));
        $mail = (string) trim($mail);
        $confmail  = (string) trim($confmail);
        $pword = (string) trim($pword);
        $confpassword  = (string) trim($confpassword);


        // Variables déclarées
        $this->err_nom = (string) '';
        $this->err_prenom = (string) '';
        $this->err_mail = (string) '';
        $this->err_pword = (string) '';
        $this->valid = (bool) true;

        $this->verif_nom($nom);

        $this->verif_prenom($prenom);

        $this->verif_mail($mail, $confmail);

        $this->verif_pword($pword, $confpassword);




        if ($this->valid) {

            $crypt_pword = password_hash($pword, PASSWORD_ARGON2ID);
            $date_creation = date('Y-m-d H:i:s');
            $date_connexion = date('Y-m-d H:i:s');



            $param = [$nom, $prenom, $mail, $crypt_pword, $date_creation, $date_connexion];


            if ($this->user->add_user($param) == true) {

                header("Location: login.php");
            }

            exit;
        }

        return [$this->err_nom, $this->err_prenom, $this->err_mail, $this->err_pword];
    }

    private function verif_nom($nom)
    {

        global $DB;

        if (empty($nom)) {
            $this->valid = false;
            $this->err_nom = "Ce champ ne peut pas être vide";
        }

        return [$this->err_nom];
    }


    private function verif_prenom($prenom)
    {

        global $DB;

        if (empty($prenom)) {
            $this->valid = false;
            $this->err_prenom = "Ce champ ne peut pas être vide";
        }
    }


    private function verif_mail($mail, $confmail)
    {

        global $DB;

        if (empty($mail)) {
            $this->valid = false;
            $this->err_mail = "Ce champ ne peut pas être vide";
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $this->valid = false;
            $this->err_mail = "Le format du mail est invalide.";
        } elseif ($mail <> $confmail) {
            $this->valid = false;
            $this->err_mail = "Le mail est différent de la confirmation.";
        } else {


            if ($this->user->verif_mail($mail) != null) {
                $this->valid = false;
                $this->err_mail = "Ce mail est déjà utilisé";
            }
        }
    }


    private function verif_pword($pword, $confpassword)
    {
        global $DB;

        if (empty($pword)) {
            $this->valid  = false;
            $this->err_pword = "Ce champ ne peut pas être vide";
        } elseif ($pword <> $confpassword) {
            $this->valid = false;
            $this->err_pword = "Le mot de passe est différent de la confirmation";
        }
    }
}

require_once('../views/registration.php');