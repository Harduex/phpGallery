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
        echo "<div class='dashboard'>";
        echo "<h1>" . $_SESSION['username'] . " Dashboard</h1>";
        echo '<a class="new opacity" href="create_album.php">New Album</a>';

        $directory = dir('./albums/' . $_SESSION['username']);
        echo "<ul>";
        while (($album = $directory->read()) !== false) {
            if ($album == "." || $album == "..") continue;
            echo "<li>";
            echo "<b><a class='opacity' href='./view_album.php?album=$album'>" . $album . "</a></b>";
            echo "<a class='manage opacity' href='./manage_album.php?album=$album'> Manage</a>";
            echo "<a class='delete opacity' href='delete_album.php?album=$album'> Delete</a>";
            echo "</li>";
        }
        echo "</ul>";

        echo "<br><a class='delete-all opacity' onclick='return comfirmDelete()'>Delete all albums</a>";
        echo "</div>";
        ?>
        <script>
            function comfirmDelete() {
                var conf = confirm("Are you sure you want to delete all albums?");
                if (conf) {
                    window.location = 'delete_all_albums.php';
                }
            }
        </script>

    </div>

</body>