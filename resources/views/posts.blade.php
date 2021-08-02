<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Custom Css --}}
    <link rel="stylesheet" href="/app.css">
    {{-- Custom javascript --}}
    <script src="app.js"></script>
    <title>My Blog</title>
</head>
<body>
     <?php foreach($posts as $post): ?>

    <article>
       <h1>
           
           <a href="/post/<?php echo $post->slug; ?>"><?php echo $post->title; ?></a>
           
        </h1> 
       <div>
           <?php echo $post->excerpt?>
       </div>
    </article>

    <?php endforeach; ?>

</body>
</html>