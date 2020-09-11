<?php 
    $page = $_SERVER['SCRIPT_NAME'];
    $name = basename($page);

    echo $name;
?>

<nav>
        <a <?php if($name == 'index.php') {echo 'class="current"';} ?> href="index.php">Home</a>
        <a <?php if($name == 'contact.php') {echo 'class="current"';} ?> href="contact.php">Contact</a>
</nav>