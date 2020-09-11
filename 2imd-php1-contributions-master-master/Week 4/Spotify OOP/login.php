<?php 
    require_once("bootstrap.php");
    if(isset($_SESSION["id"])){
        header("location: index.php");
    }
    if(!empty($_POST)){
        $user = new User;
        $user->setEmail($_POST["email"])->setPassword($_POST["password"]);
        $err = $user->canLogin();
    }
?>
<html lang="en">
<?php include_once("head.inc.php"); ?>
<body>
    <div class="background_image"></div>
    <main>
    <?php if(isset($err)): ?>
    <div class="error"> <?php echo $err; ?></div>
    <?php endif; ?>
        <div class="user_form">
            <div class="logo"></div>
            <form action="" method="post">
                <label for="email">E-mail adres</label>
                <input type="text" name="email" id="email" placeholder="user@spotify.com">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="*******">
                <input type="submit" value="Login">
            </form>
            <a href="register.php" class="new_user">Nog geen account?</a>
        </div>
    <main>
</body>
</html>