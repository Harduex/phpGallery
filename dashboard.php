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

    </div>

</body>