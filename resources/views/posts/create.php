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

<div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px]">
        <form action="/posts" method="POST">
            <div class="mb-5">
                <label
                        for="title"
                        class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Title
                </label>
                <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Title"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>
            <div class="mb-5">
                <label
                        for="body"
                        class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Post body
                </label>
                <textarea
                        rows="4"
                        name="body"
                        id="body"
                        placeholder="Post body"
                        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                ></textarea>
            </div>
            <div>
                <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                >
                    Create
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>