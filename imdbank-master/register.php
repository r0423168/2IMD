<?php

    require_once("bootstrap/bootstrap.php");

    if (!empty($_POST)) {
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);  
        $user->setConfirmPassword($_POST['confirmPassword']);     
            
        if ($user->save()) {
            $success = "Account created!";
            header("Location: index.php");
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel='stylesheet' type='text/css' href='css/style.php'>
  <title>Register for an account</title>
</head>
<body>
  <div><?php if (isset($error)):?></div>
  <div class= "error" role = 'alert'><?php echo $error ?></div>
  <?php endif; ?>

  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h1>Register for your IMDBank account</h1>

          <form class="form" action="" method="post"> 
          <?php if (isset($success)): ?>
            <div class="success" role="alert">
                <?php echo $success ?>
            </div>
        <?php endif; ?>

            <div class="form-group">
              <label for="Username">Your Username * </label>
              <input type="username" placeholder="Your username" name="username" id="username" class="field">            
            </div>
            
            <div class="form-group">
                <label for="firstname">Your Firstname * </label>
                <input type="text" placeholder="Your firstname" name="firstname" id="firstname" class="field">              
            </div>

            <div class="form-group">
                <label for="lastname">Your Lastname * </label>
                <input type="text" placeholder="Your lastname" name="lastname" id="lastname" class="field">              
            </div>

            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" placeholder="Your email" name="email" id="email" class="field">            
            </div>
            
            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="password" placeholder="Your password" name="password" id="password" class="field">              
            </div>

            <div class="form-group">
                <label for="password">Confirm Your Password</label>
                <input type="password" placeholder="Confirm Your password" name="confirmPassword" id="confirmPassword" class="field">              
            </div>

            <div class="form-row">
              <div class="col">
                <input type="submit" value="Register" class="login__btn">
              </div>

              <div class="registerlink">
                <a href="index.php">Already have an account? Log in here</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
