<?php
$album = basename($_GET['album']);
$files = glob("./albums/$album/*");
foreach ($files as $file) {
    if (is_file($file)) {
        header("Location: ./list_album.php?album=$album");
        unlink($file);
    }
}
header("Location: ./list_album.php?album=$album");
