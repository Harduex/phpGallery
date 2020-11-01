<html>

<head>
    <link rel='stylesheet' href='css/style.css' />
    <link rel='stylesheet' href='css/lightbox.min.css' />
    <script src="js/lightbox-plus-jquery.min.js"></script>
</head>

<body>
    <?php
    require_once('users/authenticate.php');
    ?>
    <script src="js/nav.js"></script>

    <div class="container">

        <div class="gallery">
            <?php
            $album = basename($_GET['album']);
            $filelist = glob("./albums/" . $_SESSION['username'] . "/" . $album . "/*");
            echo '<h1>Album ' . $album . '</h1>';
            echo '<br>';
            foreach ($filelist as $filename) {
                echo "<a href='" . $filename . "' data-lightbox='mygallery'><img class='square' src='" . $filename . "'></a>";
            }
            ?>
        </div>
    </div>


</body>

</html>