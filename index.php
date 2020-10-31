<!DOCTYPE html>
<html>

<head>
    <link rel='stylesheet' href='css/style.css' />
    <link rel='stylesheet' href='css/album-style.css' />
    <meta charset="UTF-8" />
    <title>Gallery</title>
</head>

<body>
    <script src="js/nav.js"></script>

    <div class="container">
        <h1>Browse Albums</h1>
        <?php
        $directory = dir('./albums');

        while (($folder = $directory->read()) !== false) {
            if ($folder == "." || $folder == "..") continue;

            $album = './albums/' . $folder;

            if (!(count(glob("$album/*")) === 0)) {
                $img = random_pic($album);
                echo '<div class="album-container">';
                echo "<a href='./view_album.php?album=$folder'>
                    <img src='$img' style='object-fit: cover;width:230px;height:230px;' alt='$folder' class='album-image'>
                    </a>";
                echo '<div class="overlay">' . $folder . '</div>';
                echo '</div>';
            }
        }

        function random_pic($dir)
        {
            $files = glob($dir . '/*.*');
            $file = array_rand($files);
            return $files[$file];
        }
        ?>

    </div>

</body>

</html>