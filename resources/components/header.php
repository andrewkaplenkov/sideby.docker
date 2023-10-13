<?php
/**
 * @var \Lilo\Core\View\ViewInterface $view ;
 * @var \Lilo\Core\Auth\AuthInterface $auth ;
 */
$auth = $view->var('auth');
?>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="/posts" class="nav-link px-2">Posts</a></li>
            <!--            <li><a href="#" class="nav-link px-2">Pricing</a></li>-->
            <!--            <li><a href="#" class="nav-link px-2">FAQs</a></li>-->
            <!--            <li><a href="#" class="nav-link px-2">About</a></li>-->
        </ul>

        <?php if ($auth->check()): ?>
            <div class="col-md-3 text-end">
                <a href="/logout" class="btn btn-outline-primary me-2">Logout</a>
                <span class="text-danger"><?= $auth->user('name') ?></span>
            </div>
        <?php else: ?>
            <div class="col-md-3 text-end">
                <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                <a href="/signup" class="btn btn-primary">Sign-up</a>
            </div>
        <?php endif; ?>
    </header>
</div>
