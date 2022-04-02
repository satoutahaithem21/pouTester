<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="kk.css">
        
        <title>my Bolg</title>
</head>
<body>     
        <?php foreach ($posts as $post) :?>
        <article>
                <h1><a href="/"><?=$post->title?></a></h1>
                <?=$post->body?>        
        </article>
        <?php endforeach; ?>
</body>
</html>