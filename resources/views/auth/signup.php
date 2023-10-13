<?php
/**
 * @var \Lilo\Core\View\View $view ;
 */

$view->component('base/start');
$errors = $view->var('errors');
?>


<div class="container py-5">
    <main class="text-center form-signin w-50 m-auto">
        <form action="/signup" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="name" placeholder="Your name">
                <label for="name">Name</label>
                <?php if (isset($errors['name'])): ?>
                    <?php foreach ($errors['name'] as $error): ?>
                        <p class="text-danger fw-bold"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="email">Email address</label>
                <?php if (isset($errors['email'])): ?>
                    <?php foreach ($errors['email'] as $error): ?>
                        <p class="text-danger fw-bold"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="password">Password</label>
                <?php if (isset($errors['password'])): ?>
                    <?php foreach ($errors['password'] as $error): ?>
                        <p class="text-danger fw-bold"><?= $error ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="checkbox mb-3">
                <a href="/login">Log in</a>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
        </form>
    </main>
</div>

<?php $view->component('base/end'); ?>

