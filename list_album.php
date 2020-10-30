<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel='stylesheet' href='css/style.css' />
</head>

<body>
    <script src="js/nav.js"></script>

    <div class="container">

        <h1>Dashboard</h1>
        <a href="create_album.php">New Album</a>
        <div class="upload">
            <fieldset>
                <legend>Upload:</legend>
                <form method="post" enctype="multipart/form-data" action="list_album.php?album=<?php echo urlencode($_GET['album']) ?>">
                    <label class="file-upload">
                        <input type="file" name="userImg">
                        Choose Image
                    </label>
                    <input type="Submit" value='Upload image'>
                </form>
            </fieldset>
        </div>
        <?php
        $alowed_ext = array('jpg', 'png', 'gif');
        $album = basename($_GET['album']);

        if (isset($_FILES['userImg']) && $_FILES['userImg']['error'] == 0) {
            $fileinfo = pathinfo($_FILES['userImg']['name']);
            $filename = $_FILES['userImg']['name'];

            if (array_search($fileinfo['extension'], $alowed_ext) !== false) {

                if (file_exists("./albums/" . $album . '/' .  $filename)) {
                    $ext   = pathinfo($filename, PATHINFO_EXTENSION);
                    $newfile = basename($filename, ".$ext") . '_' . uniqid() . '.' . $ext;
                    move_uploaded_file($_FILES['userImg']['tmp_name'], './albums/'. $album . '/' . $newfile);
                } else {
                    move_uploaded_file($_FILES['userImg']['tmp_name'], './albums/' . $album . '/' . $filename);
                }
            } else {
                echo "Bad file extension";
            }
        }


        $directory = dir('./albums/'.$album);
        echo "<ul>";
        while (($entry = $directory->read()) !== false) {
            if ($entry == "." || $entry == "..") continue;
            echo "<li>";
            echo " <img src='./albums/" . $album . '/' . $entry . " 'height='40'> ";

            echo $entry;

            $size = filesize('./albums/' . $album . '/' .  $entry);
            if ($size > 1024) {
                $fsize = round($size / 1024) . "KB";
            }
            if ($size > 1048576) {
                $fsize = round($size / 1048576) . "MB";
            }
            if ($size > 1073741824) {
                $fsize = round($size / 1073741824) . "GB";
            }
            echo " [" . $fsize . "] ";

            if (is_file('./albums/' . $entry)) {
                echo "<a href='download.php?f=$entry'>";
                echo 'Download';
                echo "</a>";
            } else {
                echo $entry;
            }

            echo "<a class='delete' href='delete.php?f=$entry&album=$album'> Delete</a>";
            echo "</li>";
        }
        echo "</ul>";
        echo "<br><a class='delete-all' onclick='return comfirmDelete()'>Delete all images</a>"
        ?>
        <script>
            function comfirmDelete() {
                var album = "<?php echo $album ?>"
                var conf = confirm("Are you sure you want to delete all images in " + album + "?");
                if(conf) {
                    window.location='delete_all.php?album='+album;
                }
            }
        </script>
    </div>

</body>