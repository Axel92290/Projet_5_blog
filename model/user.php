<?php


class User
{



    public function add_user($param)
    {

        global $DB;


        try {

            $req = $DB->prepare("INSERT INTO utilisateur(nom, prenom, mail, pword, date_creation, date_connexion) VALUES (?, ?, ?, ?, ?, ?)");
            $req->execute(array($param[0], $param[1], $param[2], $param[3], $param[4], $param[5]));
        } catch (Exception $e) {

            echo "Erreur : L'insert des données ne s'est pas effectué  ";

            return false;
        }

        return true;
    }


    public function verif_mail($mail)
    {

        global $DB;

        try {

            $req = $DB->prepare("SELECT id FROM utilisateur WHERE mail = ?");

            $req->execute(array($mail));

            $req = $req->fetch();
        } catch (Exception $e) {

            echo "Erreur : La sélection des données ne s'est pas effectuée  ";

            return null;
        }

        return $req["id"];
    }


    public function verif_pword($mail)
    {


        global $DB;

        try {
            $req = $DB->prepare("SELECT pword FROM utilisateur WHERE mail =?");
            $req->execute(array($mail));

            $req = $req->fetch();
        } catch (Exception $e) {

            echo "Erreur : La sélection des données ne s'est pas effectuée  ";

            return null;
        }
    }
}