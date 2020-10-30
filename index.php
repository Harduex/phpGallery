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