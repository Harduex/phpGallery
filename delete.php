<?php
require_once('users/authenticate.php');

$file = basename($_GET['f']);
$album = basename($_GET['album']);
if (is_file("./albums/" . $_SESSION['username'] . "/" . $album . '/' . $file)) {
    header("Location: ./manage_album.php?album=$album");
    unlink("./albums/" . $_SESSION['username'] . "/" . $album . '/' . $file);
    exit();
} else {
    echo 'error';
}
