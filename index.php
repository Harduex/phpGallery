<html>

<head>
    <link rel='stylesheet' href='css/style.css' />
    <link rel='stylesheet' href='css/lightbox.min.css' />
    <script src="js/lightbox-plus-jquery.min.js"></script>
</head>

<body>
    <script src="js/nav.js"></script>

    <div class="container">
        <h1>Image Gallery</h1>

        <?php
        $directory = dir('./albums');
        echo "<ul>";
        while (($folder = $directory->read()) !== false) {
            if ($folder == "." || $folder == "..") continue;
            echo "<li>";

            echo "<a href='./albums/$folder'>" . $folder . "</a>";

            echo "</li>";
        }
        echo "</ul>";
        ?>

        <div class="gallery">
            <?php
            $filelist = glob("./images/*");

            foreach ($filelist as $filename) {
                echo "<a href='" . $filename . "' data-lightbox='mygallery'><img src='" . $filename . "'></a>";
            }
            ?>
        </div>
    </div>


</body>

</html>