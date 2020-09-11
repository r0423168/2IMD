<?php 

session_start();
include_once( __DIR__ . '/classes/User.php' );

if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $person = new User;
    $info = $person->findCurrentUser($email);


} else {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <title>Advies</title>
</head>
<body>
    <?php include("includes/header.php") ?>
    <h1>Tomaten</h1>
    <ul class="progress">
        <li>Zaaien</li>
        <li>Wateren</li>
        <li>Verplanten</li>
        <li>Oogsten</li>
    </ul>
    <ul class="details">
        <li>Soort grond Natuurlijk</li>
        <li>Vochtigheid 55%</li>
        <li>Waterstand 75%</li>
        <li>Temperatuur 20°C</li>
    </ul>
    <?php include("includes/nav.php") ?>
</body>
<script src = 'https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity = 'sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin = 'anonymous'></script>
    <script src = 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity = 'sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin = 'anonymous'></script>
    <script src = 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity = 'sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin = 'anonymous'></script>
</html>