<?php

session_start();

require_once("../initdb.php");
require_once("registration.php");
require_once("login.php");

//Déclaration des classes sous formes de variables

$_registration = new Registration;
$_Connexion = new Login;