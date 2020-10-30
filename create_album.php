<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>New Album</title>
    <link rel='stylesheet' href='css/style.css' />
</head>

<body>
    <script src="js/nav.js"></script>

    <div class="container">

        <h1>Create Album</h1>

        <form method="POST" action="create_album.php">
            <label for="name">Album name:</label><br>
            <input type="text" name="albumName"><br>
            <input type="submit" value="Create" name="submit">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            mkdir("./albums/" . $_POST["albumName"], 0700);
            header("Location: ./dashboard.php");
        }
        ?>

    </div>

</body>