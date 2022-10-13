<?php

require_once("controllers/include.php");


if (isset($_SESSION['id'])) {
    $welcome = "Bonjour " . $_SESSION['prenom'];
} else {
    $welcome = "Bonjour à toi cher visiteur";
}

require_once("views/home.php");