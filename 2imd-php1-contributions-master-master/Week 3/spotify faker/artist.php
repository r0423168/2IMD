<?php
require_once("database/connection.php");

if (!empty($_GET["id"])) {
  $id = $_GET["id"];
} else {
  header("Location: index.php");
}

$id = $conn->real_escape_string($id);
$sql = "SELECT *, A.title AS aTitle
        FROM albums A, artists AR
        WHERE A.artist_id = AR.id AND AR.id = $id";
$result = mysqli_query($conn, $sql);

?><!DOCTYPE html>
<html>
<head>
  <title>Artist</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.3.0/nouislider.min.css">
  <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="css/artist.css">
</head>
<body>
  <?php 
  require_once("header.php");
  ?>
  <section class="playlist"><a href="#">
   <i class="ion-ios-plus-outline"></i>New Playlist
 </a>
</section>
<section class="playing"><div class="playing__art"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/cputh.jpg" alt="Album Art" /></div>
 <div class="playing__song"><a class="playing__song__name">Some Type of Love</a><a class="playing__song__artist">Charlie Puth</a></div>
 <div class="playing__add"><i class="ion-checkmark"></i></div>
</section>
</div>
<div class="content__middle"><div class="artist is-verified"><div class="artist__header"><div class="artist__info"><div class="profile__img"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/g_eazy_propic.jpg" alt="G-Eazy" /></div>
<div class="artist__info__meta"><div class="artist__info__type">Artist</div><div class="artist__info__name">G-Eazy</div><div class="artist__info__actions"><button class="button-dark"><i class="ion-ios-play"></i>Play
</button>
<button class="button-light">Follow</button><button class="button-light more"><i class="ion-ios-more"></i></button>
</div>
</div>
</div>
<div class="artist__listeners"><div class="artist__listeners__count">15,662,810</div><div class="artist__listeners__label">Monthly Listeners</div></div>
<div class="artist__navigation"><ul class="nav nav-tabs" role="tablist"><li role="presentation" class="active"><a href="#artist-overview" aria-controls="artist-overview" role="tab" data-toggle="tab">Overview</a></li>
 <li role="presentation"><a href="#related-artists" aria-controls="related-artists" role="tab" data-toggle="tab">Related Artists</a></li>
 <!--<li role="presentation"><a href="#artist-about" aria-controls="artist-about" role="tab" data-toggle="tab">About</a></li>-->
</ul>
<div class="artist__navigation__friends"><a href="#">
 <img src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" alt="" /></a>
 <a href="#">
   <img src="http://zblogged.com/wp-content/uploads/2015/11/5.png" alt="" /></a>
   <a href="#">
     <img src="http://cdn.devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" alt="" /></a>
   </div>
 </div>
</div>
<div class="artist__content"><div class="tab-content"><!-- Overview -->
 <div role="tabpanel" class="tab-pane active" id="artist-overview"><div class="overview">
   <div class="overview__albums"><div class="overview__albums__head"><span class="section-title">Albums</span><span class="view-type"><i class="fa fa-list list active"></i><i class="fa fa-th-large card"></i></span>
   </div>
   <?php 
   if ($result->num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
      $title = $row['aTitle'];
      ?>
      <div class="album">
       <div class="album__info"><div class="album__info__art"><img src="<?php echo $row['cover'] ; ?>" alt="When It's Dark Out" /></div>
       <div class="album__info__meta"><div class="album__year"><?php echo $row["year"]; ?></div><div class="album__name"><?php echo $row['aTitle'] ; ?></div><div class="album__actions"><button class="button-light save">Save</button><button class="button-light more"><i class="ion-ios-more"></i></button>
       </div>
     </div>
   </div>
   <div class="album__tracks"><div class="tracks">
     <div class="tracks__heading"><div class="tracks__heading__number">#</div><div class="tracks__heading__title">Song</div><div class="tracks__heading__length"><i class="ion-ios-stopwatch-outline"></i></div>
     <div class="tracks__heading__popularity"><i class="ion-thumbsup"></i></div>
   </div>
   <?php
    $sql2 = "SELECT *, T.title AS tTitle FROM tracks T, albums A WHERE A.id = T.album_id AND A.title = '$title'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2->num_rows > 0){
      $i = 0;
      while($row2 = mysqli_fetch_assoc($result2)){
        $i++;
   ?>
   <div class="track">
     <div class="track__number"><?php echo $i; ?></div><div class="track__added"><i class="ion-checkmark-round added"></i></div>
     <div class="track__title"><?php echo $row2['tTitle']; ?></div><div class="track__explicit"><span class="label">Explicit</span></div>
     <div class="track__length">1:11</div><div class="track__popularity"><i class="ion-arrow-graph-up-right"></i></div>
   </div>
   <?php
      }
    } else {
      echo "0 results";
    }
   ?>
</div>
</div>  
</div>
<?php
}
} else {
  echo "0 results";
}
?>
</div>
</div>
</div>
<!-- / -->
<!-- Related Artists -->
<div role="tabpanel" class="tab-pane" id="related-artists">
  <div class="media-cards">
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/hoodie.jpg);">
        <i class="ion-ios-play"></i>
      </div>
      <a class="media-card__footer">Hoodie Allen</a>
    </div>
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/mikestud_large.jpg);">
        <i class="ion-ios-play"></i> 
      </div>
      <a class="media-card__footer">Mike Stud</a>
    </div>
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/drake_large.jpg);">
        <i class="ion-ios-play"></i>
      </div>
      <a class="media-card__footer">Drake</a>
    </div>
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/jcole_large.jpg);">
        <i class="ion-ios-play"></i>
      </div>
      <a class="media-card__footer">J. Cole</a>  
    </div>
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/bigSean_large.jpg);">
        <i class="ion-ios-play"></i>
      </div>
      <a class="media-card__footer">Big Sean</a>
    </div>
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/wiz.jpeg);">

        <i class="ion-ios-play"></i>
      </div>
      <a class="media-card__footer">Wiz Khalifa</a>
    </div>
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/yonas.jpg);">
        <i class="ion-ios-play"></i>
      </div>
      <a class="media-card__footer">Yonas</a>
    </div>
    <div class="media-card">
      <div class="media-card__image" style="background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/childish.jpg);">
        <i class="ion-ios-play"></i>
      </div>
      <a class="media-card__footer">Childish Gambino</a>
    </div>
  </div>
</div>
<!-- / -->
<!-- About // Coming Soon-->
<!--<div role="tabpanel" class="tab-pane" id="artist-about">About</div>-->
<!-- / -->
</div>
</div>
</div>
</div>

<div class="content__right">
  <div class="social">
    <div class="friends">
      <a href="#" class="friend">
        <i class="ion-android-person"></i>
        Sam Smith
      </a>
      <a href="#" class="friend">
        <i class="ion-android-person"></i>
        Tarah Forsyth
      </a>
      <a href="#" class="friend">
        <i class="ion-android-person"></i>
        Ricahrd Tomkins
      </a>
      <a href="#" class="friend">
        <i class="ion-android-person"></i>
        Tony Russo
      </a>
      <a href="#" class="friend">
        <i class="ion-android-person"></i>
        Alyssa Marist
      </a>
      <a href="#" class="friend">
        <i class="ion-android-person"></i>
        Ron Samson
      </a>
    </div>
    <button class="button-light">Find Friends</button>
  </div>
</div>
</section>

<section class="current-track">
  <div class="current-track__actions">
    <a class="ion-ios-skipbackward"></a>
    <a class="ion-ios-play play"></a>
    <a class="ion-ios-skipforward"></a>
  </div>
  <div class="current-track__progress">
    <div class="current-track__progress__start">0:01</div>
    <div class="current-track__progress__bar">
      <div id="song-progress"></div>
    </div>
    <div class="current-track__progress__finish">3:07</div>
  </div>
  <div class="current-track__options">
    <a href="#" class="lyrics">Lyrics</a>
    <span class="controls">
      <a href="#" class="control">
        <i class="ion-navicon"></i>
      </a>
      <a href="#" class="control">
        <i class="ion-shuffle"></i>
      </a>
      <a href="#" class="control">
        <i class="fa fa-refresh"></i>
      </a>
      <a href="#" class="control devices">
        <i class="ion-iphone"></i>
        <span>Devices Available</span>
      </a>
      <a href="#" class="control volume">
        <i class="ion-volume-high"></i>
        <div id="song-volume"></div>
      </a> 
    </span>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.3.0/nouislider.min.js"></script>
<script type="text/javascript" src="js/artist.js"></script>
</body>
</html><?php
  require_once("database/endConnection.php");
?>