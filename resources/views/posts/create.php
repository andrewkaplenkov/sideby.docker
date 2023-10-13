<?php
/**
 * @var \Lilo\Core\View\View $view ;
 */
$errors = $view->var('errors');

$view->component('base/start');
$view->component('header');
?>

    <main class="container">
        <form method="POST" action="/posts" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control"/>
                <?php if (isset($errors['title'])): ?>
                    <?php foreach ($errors['title'] as $error): ?>
                        <p class="text-danger fw-bold"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea type="text" class="form-control" name="body"></textarea>
                <?php if (isset($errors['body'])): ?>
                    <?php foreach ($errors['body'] as $error): ?>
                        <p class="text-danger fw-bold"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="image">
                <label class="input-group-text" for="image">Upload</label>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>

        </form>
    </main>

<?php
$view->component('footer');
$view->component('base/end');
?>