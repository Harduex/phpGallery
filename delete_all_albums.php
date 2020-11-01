<?php

require_once('users/authenticate.php');

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

rrmdir('./albums/' . $_SESSION['username']);
mkdir("./albums/" . $_SESSION['username'], 0700);

header("Location: ./dashboard.php");
