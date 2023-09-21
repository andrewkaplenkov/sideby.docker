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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SideBy | Home</title>
</head>
<body>
<?= component('header', $view) ?>

<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
    <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <?php foreach ($view->var('posts') as $post): ?>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mx-auto mb-10 max-w-[370px]">
                        <!--                    <div class="mb-8 overflow-hidden rounded">-->
                        <!--                        <img-->
                        <!--                                src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"-->
                        <!--                                alt="image"-->
                        <!--                                class="w-full"-->
                        <!--                        />-->
                        <!--                    </div>-->
                        <div>
                        <span
                                class="bg-primary mb-5 inline-block rounded py-1 px-4 text-center text-xs font-semibold leading-loose text-white"
                        >
                          <?= $post['created_at'] ?>
                        </span>
                            <h3>
                                <a
                                        href=""
                                        class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold sm:text-2xl lg:text-xl xl:text-2xl"
                                >
                                    <?= $post['title'] ?>
                                </a>
                            </h3>
                            <p class="text-body-color text-base">
                                <?= $post['body'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</body>
</html>