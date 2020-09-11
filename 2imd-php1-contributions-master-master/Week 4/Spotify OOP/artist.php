<?php
    require_once("bootstrap.php");
    if(!isset($_SESSION["id"])){
        header("location: login.php");
    }
    if(!empty($_GET["id"])){
        $artist = Artist::getArtistById($_GET["id"]);
        $albums = Album::getAlbumsByArtistId($_GET["id"]);
    } else {
        header("location: index.php");
    }
?>
<html lang="en">
<?php include_once("head.inc.php") ?>
<body>
    <div class="grid-container">
        <?php include_once("nav.inc.php") ?>
        <main>
            <h1>Albums by <?php echo $artist ?></h1>
            <?php foreach($albums as $album):?>
              <a href="tracks.php?<?php echo "artist=" . $_GET["id"] . "&album=" . $album["id"]; ?>" class="artist">
                <img src="<?php echo $album["cover"]; ?>" alt="" width="180px" height="180px">
                <?php echo $album["title"] . " (" . $album["year"] . ")"; ?>
              </a>
            <?php endforeach; ?>
        </main>
    </div>
</body>
</html>