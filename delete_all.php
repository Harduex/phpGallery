<?php

require_once('users/authenticate.php');

$album = basename($_GET['album']);
$files = glob("./albums/" . $_SESSION['username'] . "/" . $album . "/*");
foreach ($files as $file) {
    if (is_file($file)) {
        header("Location: ./manage_album.php?album=$album");
        unlink($file);
    }
}
header("Location: ./manage_album.php?album=$album");
