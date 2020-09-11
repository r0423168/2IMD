<?php 
    $posts = [
        [
            "username" => "Jesse",
            "place" => "Assembly 3.0",
            "adress" => "San Francisco, CA"
        ],
        [
            "username" => "Michal",
            "place" => "Voxer",
            "adress" => "San Francisco, CA"
        ],
        [
            "username" => "Petr",
            "place" => "ROXY/NoD",
            "adress" => "Prague, Czech Republic"
        ],
        [
            "username" => "Jaroslav",
            "place" => "Brnu hlavni nadrazi",
            "adress" => "Brno, Czech Republic"
        ],
        [
            "username" => "Jesse",
            "place" => "The Mill",
            "adress" => "San Francisco, CA"
        ]
];

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swarm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include_once('header.inc.php');?>

    <div class="friends">
        <?php foreach($posts as $post): ?>
            <div class="post">
                <div class="flex">
                    <div class="picture"></div>
                    <div class="information">
                        <p><strong><?php echo $post['username']; ?></strong></p>
                        <p class= "place"><?php echo $post['place']; ?></p>
                        <p><?php echo $post['adress']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include_once('footer.inc.php') ?>
    
</body>
</html>