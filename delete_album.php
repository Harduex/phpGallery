<?php
$album = basename($_GET['album']);

header("Location: ./dashboard.php");
rmdir('./albums/'.$album);
