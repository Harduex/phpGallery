<?php
$files = glob("./images/*");
foreach ($files as $file) {
    if (is_file($file)) {
        header("Location: ./dashboard.php");
        unlink($file);
    }
}
