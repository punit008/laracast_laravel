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

    <article>
        <h1> <?php echo $post->title; ?></h1>
        <div>
            <?php echo $post->body; ?>
        </div>
    </article>

    <a href="/">Go back</a>
</body>
</html>