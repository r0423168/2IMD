<?php 
  session_start();
  if (!isset($_SESSION["user"])) {
    header("Location: login.php");
  }
?><section class="header"><!--
 <div class="window__actions"><i class="ion-record red"></i><i class="ion-record yellow"></i><i class="ion-record green"></i></div>
-->
<div class="page-flows"><span class="flow">
 <i class="ion-chevron-left"></i></span>
 <span class="flow">
   <i class="ion-chevron-right disabled"></i></span>
 </div>
 <div class="search">
   <input type="text" placeholder="Search" /></div>
   <div class="user">
     <div class="user__notifications"><i class="ion-android-notifications"></i></div>
     <div class="user__inbox"><i class="ion-archive"></i></div>
     <div class="user__info"><span class="user__info__img"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/adam_proPic.jpg" alt="Profile Picture" class="img-responsive" /></span>
       <span class="user__info__name"><span class="first">Adam</span><span class="last">Lowenthal</span></span>
     </div>
     <div class="user__actions"><div class="dropdown">
       <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="ion-chevron-down"></i></button>
       <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1"><li><a href="#">Private Session</a></li><li><a href="#">Account</a></li><li><a href="#">Settings</a></li><li><a href="logout.php">Log Out</a></li></ul>
     </div>
   </div>
 </div>
</section>
<section class="content"><div class="content__left"><section class="navigation">
  <!-- Main -->
  <div class="navigation__list"><div class="navigation__list__header"
   role="button"
   data-toggle="collapse"
   href="#main"
   aria-expanded="true"
   aria-controls="main">
   Main
 </div>
 <div class="collapse in" id="main"><a href="#" class="navigation__list__item"><i class="ion-ios-browsers"></i><span>Browse</span>
 </a>
 <a href="#" class="navigation__list__item"><i class="ion-person-stalker"></i><span>Activity</span>
 </a>
 <a href="#" class="navigation__list__item"><i class="ion-radio-waves"></i><span>Radio</span>
 </a>
</div>
</div>
<!-- / -->
<!-- Your Music -->
<div class="navigation__list"><div class="navigation__list__header"
 role="button"
 data-toggle="collapse"
 href="#yourMusic"
 aria-expanded="true"
 aria-controls="yourMusic">Your Music
</div>
<div class="collapse in" id="yourMusic"><a href="#" class="navigation__list__item"><i class="ion-headphone"></i><span>Songs</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Albums</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-person"></i><span>Artists</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-document"></i><span>Local Files</span></a>
</div>
</div>
<!-- / -->
<!-- Playlists -->
<div class="navigation__list"><div class="navigation__list__header"
 role="button"
 data-toggle="collapse"
 href="#playlists"
 aria-expanded="true"
 aria-controls="playlists">Playlists
</div>
<div class="collapse in" id="playlists"><a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Doo Wop</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Pop Classics</span></a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Love $ongs</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Hipster</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>New Music Friday</span></a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Techno Poppers</span></a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Summer Soothers</span></a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Hard Rap</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Pop Rap</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>5 Stars</span>
</a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Dope Dancin</span></a>
<a href="#" class="navigation__list__item"><i class="ion-ios-musical-notes"></i><span>Sleep</span>
</a>
</div>
</div>
<!-- / -->
</section>