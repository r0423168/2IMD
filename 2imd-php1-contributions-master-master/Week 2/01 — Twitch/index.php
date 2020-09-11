<?php 

function login($username, $password) {
    if( $username != "siebe" || $password != "123" ) {
      return false;
    }
    else {
      return true;
    }
  }

  $loggedin = false;

  /* Invoervelden mogen niet leeg zijn */
  if (!empty($_POST)){
    /* Indien ingevuld = in variabele stoppen */
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* Email en Wachtwoord juist = inloggen */
    if(login($username, $password)) {
      session_start();
			$_SESSION['loggedin'] = true;
      $loggedin = true;
      
    }
    /* Onjuist = niet inloggen en foutmelding weergeven */
    else {
      $error = true;
    }

  }  

?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Twitch</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header>

    <?php if ($loggedin == true): ?>
    <nav class="nav">
      <a href="#">Browse</a>
      <a href="#">Get desktop</a>
      <a href="#">Try prime</a>
      <a href="#" class="loggedIn">
        <div class="user--avatar"><img src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=ddcb7ec744fc63472f2d9e19362aa387"
            alt=""></div>
        <h3 class="user--name">Username here</h3>
        <span class="user--status">Watching dakotaz</span>
      </a>
      <a href="logout.php">Log out?</a>
    </nav>
    <?php endif; ?>
  </header>

  <div id="app">
    <?php if($loggedin == false): ?>
    <h1>Log in to Twitch</h1>
    <nav class="nav--login">
      <a href="#" id="tabLogin">Log in</a>
      <a href="#" id="tabSignIn">Sign up</a>
    </nav>

    <?php if(isset($error)): ?>
      <div class="alert">That password was incorrect. Please try again</div>
    <?php endif; ?>

    
    <form action="" method="post" class="form form--login">
      <label for="username">Username</label>
      <input type="text" id="username" name="username">

      <label for="password">Password</label>
      <input type="password" id="password" name="password">

      <input type= "submit" value="Log in" class="btn" id="btnSubmit">
    </form>
    <?php endif; ?>
    

    <?php if($loggedin == true): ?>
    <div>
      <h2>Welcome to twitch!</h2>
    </div>
    <?php endif; ?>


    <div class="form form--signup hidden">
      <label for="username2">Username</label>
      <input type="text" id="username2">

      <label for="password2">Password</label>
      <input type="password" id="password2">

      <label for="email">Email</label>
      <input type="text" id="email">
    </div>
  </div>

</body>

</html>