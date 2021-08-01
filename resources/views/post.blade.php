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
        <?= $post; ?>
        <h1> <a href="/post"> My first post</a></h1>

        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus corrupti exercitationem, alias porro excepturi aliquam dolorum eligendi et mollitia tenetur earum dicta ullam nihil rem voluptatum ut, quae debitis nisi.
        </p>
    </article>

    <a href="/posts">Go Back</a>

</body>
</html>