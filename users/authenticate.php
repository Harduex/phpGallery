<?php
session_start();
if (empty($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true) {
    header('Location: users/login.php');
}
