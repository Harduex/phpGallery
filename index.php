<html>

<head>
    <link rel='stylesheet' href='css/style.css' />
    <link rel='stylesheet' href='css/lightbox.min.css' />
    <script src="js/lightbox-plus-jquery.min.js"></script>
</head>

<body>
    <script src="js/nav.js"></script>

    <div class="container">
        <h1>Browse Albums</h1>
        <?php
        $directory = dir('./albums');
        echo "<ul>";
        while (($folder = $directory->read()) !== false) {
            if ($folder == "." || $folder == "..") continue;
            echo "<li>";

            echo "<a href='./view_album.php?album=$folder'>" . $folder . "</a>";

            echo "</li>";
        }
        echo "</ul>";
        ?>
    </div>


</body>

</html>