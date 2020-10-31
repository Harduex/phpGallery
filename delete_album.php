<?php
$album = basename($_GET['album']);

header("Location: ./dashboard.php");
function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object);
                else unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

rrmdir('./albums/' . $album);
