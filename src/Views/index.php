<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Posts</h1>

<body>
    <?php foreach ($posts as $post): ?>
        <a href="/?c=posts&a=show&id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
        <br>
    <?php endforeach; ?>
</body>

</html>