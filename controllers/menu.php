<?php
require_once("../views/menu.php");

if (!isset($_SESSION['id'])) {

?>
<ul class="navbar-nav ms-auto py-4 py-lg-0">
    <li class="nav-item">
        <a class="nav-link px-lg-3 py-3 py-lg-4" href="registration.php">Inscription</a>
    </li>
    <li class="nav-item">
        <a class="nav-link px-lg-3 py-3 py-lg-4" href="login.php">Connexion</a>
    </li>
</ul>

<?php
} else {
?>


<li class="nav-item">
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="profile/profile.php">Mon profil</a>
</li>

<li class="nav-item">
    <a class="nav-link px-lg-3 py-3 py-lg-4" href="logout.php">Deconnexion</a>
</li>
<?php
} ?>