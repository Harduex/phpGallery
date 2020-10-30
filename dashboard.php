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

        <?php
        $directory = dir('./albums');
        echo "<ul>";
        while (($album = $directory->read()) !== false) {
            if ($album == "." || $album == "..") continue;
            echo "<li>";

            echo "<a href='./list_album.php?album=$album'>" . $album . "</a>";
            echo "<a class='delete' href='delete_album.php?album=$album'> Delete</a>";
            echo "</li>";
        }
        echo "</ul>";
    
        echo "<br><a class='delete-all' onclick='return comfirmDelete()'>Delete all albums</a>"
        ?>
        <script>
            function comfirmDelete() {
                var conf = confirm("Are you sure you want to delete all albums?");
                if(conf) {
                    window.location='delete_all_albums.php';
                }
            }
        </script>

        <!-- <div class="upload">
            <fieldset>
                <legend>Upload:</legend>
                <form method="post" enctype="multipart/form-data" action="dashboard.php">
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


        if (isset($_FILES['userImg']) && $_FILES['userImg']['error'] == 0) {
            $fileinfo = pathinfo($_FILES['userImg']['name']);
            $filename = $_FILES['userImg']['name'];

            if (array_search($fileinfo['extension'], $alowed_ext) !== false) {

                if (file_exists("./images/" . $filename)) {
                    $ext   = pathinfo($filename, PATHINFO_EXTENSION);
                    $newfile = basename($filename, ".$ext") . '_' . uniqid() . '.' . $ext;
                    move_uploaded_file($_FILES['userImg']['tmp_name'], './images/' . $newfile);
                } else {
                    move_uploaded_file($_FILES['userImg']['tmp_name'], './images/' . $filename);
                }
            } else {
                echo "Bad file extension";
            }
        }


        $directory = dir('./images');
        echo "<ul>";
        while (($entry = $directory->read()) !== false) {
            if ($entry == "." || $entry == "..") continue;
            echo "<li>";
            echo " <img src='./images/" . $entry . "'height='40'> ";

            echo $entry;

            $size = filesize('./images/' . $entry);
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

            if (is_file('./images/' . $entry)) {
                echo "<a href='download.php?f=$entry'>";
                echo 'Download';
                echo "</a>";
            } else {
                echo $entry;
            }

            echo "<a class='delete' href='delete.php?f=$entry'> Delete</a>";
            echo "</li>";
        }
        echo "</ul>";
        echo "<br><a class='delete-all' onclick='return comfirmDelete()'>Delete all images</a>"
        ?>
        <script>
            function comfirmDelete() {
                var conf = confirm("Are you sure you want to delete all images in this gallery?");
                if (conf) {
                    window.location = 'delete_all.php'
                }
            }
        </script> -->
    </div>

</body>