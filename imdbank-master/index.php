<?php
    require_once("bootstrap/bootstrap.php");

    if (!empty($_POST)) {
        $user = new User();
        $user->setCurrentEmail($_POST['email']);
        $user->setCurrentPassword($_POST['password']);

        if ($user->validLogin()) {
            $complete = $user->checkComplete();
            $user->login($complete);
        } else {
            $error = "Can't login, do you have an account?";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="css/style.php">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
  <div><?php if ( isset( $error ) ): ?></div>
    <div class="error" role = 'alert'>
        <?php echo $error ?>
    </div>
    <?php endif; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <h1>Login Form</h1>
          <form class="form" action="" method="post">
            <?php if (isset($success)): ?>
                      <div class="success" role="alert">
                          <?php echo $success ?>
                      </div>
                  <?php endif; ?>
              <div class="login-content">
                <label id="email" for="username">Email</label> 
                    <input type="email" placeholder="Enter Email" name="email" class="fieldA"required>
                <br>
                <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" class="field"required>
              </div>
              <div class="form-row">
                <div class="col">
                  <input type="submit" value="Login" class="login__btn">
                </div>
                <div class="register">
                  <a href="register.php" class="signuphere">No account? Register</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>