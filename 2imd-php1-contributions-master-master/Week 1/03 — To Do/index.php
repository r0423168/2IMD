<?php 
    $tasks = [
        [
            "beschrijving" => "Post screenshot to Dribbble",
            "uren" => "6",
            "categorie" => "School"
        ],
        [
            "beschrijving" => "Publish Website",
            "uren" => "1",
            "categorie" => "Thuis"
        ],
        [
            "beschrijving" => "Launch Mac Version",
            "uren" => "4",
            "categorie" => "Werk"
        ],
        [
            "beschrijving" => "Release iPhone Update",
            "uren" => "8",
            "categorie" => "Werk"
        ],
        [
            "beschrijving" => "Organise Launch Party",
            "uren" => "1",
            "categorie" => "School"
        ]
];

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>

    <div class="feed">
        <?php foreach($tasks as $task): ?>
            <div 
            <?php 
                if($task['uren'] == '1') {
                    echo 'class="green"';
                } 
                
                elseif($task['uren'] > '1' && $task['uren'] < '5') {
                    echo 'class="orange"';
                }

                elseif($task['uren'] > '5') {
                    echo 'class="red"';
                }
                ?> 
                class="task">
                <p><strong><?php echo $task['beschrijving']; ?></strong></p>
                <p class="categorie"><?php echo $task['categorie']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
</html>