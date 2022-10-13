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


    public function get_pword_by_mail($mail)
    {


        global $DB;

        try {
            $req = $DB->prepare("SELECT pword FROM utilisateurs WHERE mail =?");
            $req->execute(array($mail));

            $req = $req->fetch();
        } catch (Exception $e) {

            echo "Erreur : La sélection des données ne s'est pas effectuée  ";

            return null;
        }

        return $req["pword"];
    }



    public function get_user_by_mail($mail)
    {

        global $DB;

        try {
            $req = $DB->prepare("SELECT * FROM utilisateur WHERE mail =?");
            $req->execute(array($mail));
            $req_user = $req->fetch();
        } catch (Exception $e) {
            echo "Erreur : La sélection des données ne s'est pas effectuée  ";

            return null;
        }

        return $req_user;
    }



    public function set_User_DateLogin_By_Id($date_login, $req_user_id)
    {
        global $DB;
        try {
            $req = $DB->prepare("UPDATE utilisateur SET date_connexion = ? WHERE id = ?");
            $req->execute(array($date_login, $req_user_id));
        } catch (Exception $e) {
            echo "Erreur : La mise à jour des données ne s'est pas effectuée  ";

            return null;
        }
        return $req;
    }

    public function get_members($user_id = null)
    {
        global $DB;

        try {
            $req_sql = "SELECT id, nom, prenom FROM utilisateur";

            if (isset($user_id)) {
                $req_sql = "SELECT id, nom, prenom FROM utilisateur WHERE id <> ?";
            }

            $req = $DB->prepare($req_sql);


            if (isset($user_id)) {
                $req->execute([$user_id]);
            } else {
                $req->execute();
            }

            $req_members = $req->fetchAll();
        } catch (Exception $e) {
            echo "Erreur : La sélection des données ne s'est pas effectuée  ";
        }

        return $req_members;
    }
}