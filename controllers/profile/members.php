<?php
require_once('../include.php');
require_once("../../model/user.php");

$user_id = $_SESSION['id'];

if (isset($user_id)) {
    $req_members = $this->user->get_members($user_id);
} else {
    $req_members = $this->user->get_members();
}


require_once("../../views/profile/members.php");