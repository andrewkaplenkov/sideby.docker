<?php
/**
 * @var \Lilo\Core\View\View $view ;
 */

$view->component('base/start');
$view->component('header');
?>

    <main class="container">
        <a class="btn btn-primary my-3" href="/posts/new" role="button">Add post</a>
        <div class="row mb-2">
            <?php foreach ($view->var('posts') as $post): ?>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                            <h3 class="mb-0"><?= $post['title'] ?></h3>
                            <div class="mb-1 text-body-secondary"><?= $post['created_at'] ?></div>
                            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                Read
                                <svg class="bi">
                                    <use xlink:href="#chevron-right"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                                 role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                 focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

<?php
$view->component('footer');
$view->component('base/end');
?>