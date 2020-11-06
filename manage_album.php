<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel='stylesheet' href='css/style.css' />
</head>

<body>
    <?php
    require_once('users/authenticate.php');
    ?>
    <script src="js/nav.js"></script>

    <div class="container">
        <?php
        echo "<a href='view_album.php?album=" . $_GET['album'] . "'><h1 class='opacity'>Album " . $_GET['album'] . "</h1></a>";
        ?>
        <a class="new opacity" href="create_album.php">New Album</a>
        <br>
        <br>
        <div class="options">
            <fieldset>
                <legend>Options:</legend>
                <form method="post" enctype="multipart/form-data" action="manage_album.php?album=<?php echo urlencode($_GET['album']) ?>">
                    <label class="file-upload">
                        <input type="file" name="userImg">
                        Choose Image
                    </label>
                    <input type="Submit" value='Upload image'>
                    <a class='delete-all delete' onclick='return comfirmDelete()'>Delete all images</a>
                </form>
            </fieldset>
        </div>
        <br>
        <?php
        $alowed_ext = array('jpg', 'png', 'gif');
        $album = basename($_GET['album']);

        if (isset($_FILES['userImg']) && $_FILES['userImg']['error'] == 0) {
            $fileinfo = pathinfo($_FILES['userImg']['name']);
            $filename = $_FILES['userImg']['name'];

            if (array_search($fileinfo['extension'], $alowed_ext) !== false) {

                if (file_exists("./albums/" . $_SESSION['username'] . "/" . $album . '/' .  $filename)) {
                    $ext   = pathinfo($filename, PATHINFO_EXTENSION);
                    $newfile = basename($filename, ".$ext") . '_' . uniqid() . '.' . $ext;
                    move_uploaded_file($_FILES['userImg']['tmp_name'], './albums/' . $_SESSION['username'] . "/" . $album . '/' . $newfile);
                } else {
                    move_uploaded_file($_FILES['userImg']['tmp_name'], './albums/' . $_SESSION['username'] . "/" . $album . '/' . $filename);
                }
            } else {
                echo "Bad file extension";
            }
        }


        $directory = dir('./albums/' . $_SESSION['username'] . "/" . $album);
        echo "<ul>";
        while (($entry = $directory->read()) !== false) {
            if ($entry == "." || $entry == "..") continue;
            echo "<li>";
            $img_url = "./albums/" . $_SESSION['username'] . "/" . $album . "/" . $entry;
            echo "<a href='$img_url'>
                    <img src='$img_url' class='square-mini'>
                  </a>";

            echo $entry;

            $size = filesize('./albums/' . $_SESSION['username'] . "/" . $album . '/' .  $entry);
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

            echo "<a class='delete opacity' href='delete.php?f=$entry&album=$album' style='padding-top: 25px'> Delete</a>";
            echo "<hr>";
            echo "</li>";
        }
        echo "</ul>";
        ?>
        <script>
            function comfirmDelete() {
                var album = "<?php echo $album ?>"
                var conf = confirm("Are you sure you want to delete all images in " + album + "?");
                if (conf) {
                    window.location = 'delete_all.php?album=' + album;
                }
            }
        </script>
    </div>

</body>