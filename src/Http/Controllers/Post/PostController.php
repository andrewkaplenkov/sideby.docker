<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Lilo\Core\Controller\BaseController;

class PostController extends BaseController
{
    protected static ?string $model_name = Post::class;

    public function index()
    {
        $posts = $this->model->all();
        return view('posts/index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = $this->request->form_data();
        $this->model->store($data);
        header('Location: /posts');
    }
}