<?php 
    $posts = [
        [
            "username" => "Jesse",
            "place" => "Assembly 3.0",
            "adress" => "San Francisco, CA",
            "image" => "https://fakeimg.pl/250x250/"
        ],
        [
            "username" => "Michal",
            "place" => "Voxer",
            "adress" => "San Francisco, CA",
            "image" => ""
        ],
        [
            "username" => "Petr",
            "place" => "ROXY/NoD",
            "adress" => "Prague, Czech Republic",
            "image" => "https://fakeimg.pl/250x250/"
        ],
        [
            "username" => "Jaroslav",
            "place" => "Brnu hlavni nadrazi",
            "adress" => "Brno, Czech Republic",
            "image" => "https://fakeimg.pl/250x250/"
        ],
        [
            "username" => "Jesse",
            "place" => "The Mill",
            "adress" => "San Francisco, CA",
            "image" => "https://fakeimg.pl/250x250/"
        ]
];

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed</title>
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
                
                <img class="locationPicture" src="<?php if(!empty ($post['image']) ) { echo $post['image']; }; ?>" alt="">

            </div>
        <?php endforeach; ?>
    </div>

    <?php include_once('footer.inc.php') ?>
    
</body>
</html>