<?php
/**
 * @var Lilo\Core\View\View $view
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>
<body>
<div>
    <h1>Home page</h1>
    <p>User name: <?= $view->var('name') ?></p>
    <p>User id: <?= $view->var('id') ?></p>
</div>
</body>
</html>




