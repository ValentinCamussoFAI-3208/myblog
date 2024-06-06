<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="text-4xl font-bold text-center">Vista Categoría</h2>

    <h2>ID del post N°{{ $post->id }} y el titulo es {{ $post->title }}</h2>

    <p>Contenido: {{ $post->content }}</p>
</body>

</html>