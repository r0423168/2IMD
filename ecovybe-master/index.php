<?php
    include_once(__DIR__."/classes/User.php");
    
    if (!empty($_POST)) {
        try {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setFirstName($_POST['firstName']);
            $user->setLastName($_POST['lastName']);
            $user->setPassword($_POST['password']);          
            
            $user->save();
            $success = "User saved!";
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="header">
        <a href="home.php"><img class="logo" src="public/images/logo.png" alt="logo ecovybe"></a>
    </div>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php endif; ?>

    <h1>Registreer hier om te starten met tuinieren.</h1>

    <form action="" method="post">
        <?php if (isset($success)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success ?>
                <p>Je kan nu inloggen!</p>
                <a href="login.php" class="btn btn-primary btn-xs">Ga naar login.</a>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <!---<label for="exampleInputEmail1">Email</label>--->
            <img src="public/icons/plant.png" alt="plant icon">
            <input type="email" name="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span id="available"></span>
        </div>
        <div class="form-group">
            <!---<label for="firstName">Voornaam</label>--->
            <img src="public/icons/plant.png" alt="plant icon">
            <input class="form-control" name="firstName" type="text" placeholder="Voornaam" id="firstName">
        </div>
        <div class="form-group">
            <!---<label for="lastName">Achternaam</label>--->
            <img src="public/icons/plant.png" alt="plant icon">
            <input class="form-control" name="lastName" type="text" placeholder="Achternaam" id="lastName">
        </div>
        <div class="form-group">
            <!---<label for="exampleInputPassword1">Wachtwoord</label>--->
            <img src="public/icons/plant.png" alt="plant icon">
            <input type="password" name="password" class="form-control" placeholder="Wachtwoord" id="exampleInputPassword1">        
        </div>
        <button type="submit" class="btn btn-primary">Registreer</button>
        <div>
        <p class="acc">Heb je al een account? <a href="login.php">Log In</a></p>
        
        </div>
    </form>
    <script src="js/checkEmail.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>