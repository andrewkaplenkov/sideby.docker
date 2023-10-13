<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use Lilo\Core\Database\Models\ModelInterface;
use Lilo\Core\Http\Request\RequestInterface;

class PostController extends Controller
{
    protected ModelInterface|string $model = Post::class;
    protected RequestInterface|string $request = PostRequest::class;

    public function index()
    {
        $posts = $this->model->all();
        $this->view('posts/index', [
            'posts' => $posts,
            'auth' => $this->auth
        ]);
    }

    public function create()
    {
        $this->view('posts/create', [
            'errors' => $this->session->get_flash('errors'),
            'auth' => $this->auth
        ]);
    }

    public function store()
    {
        $file = $this->request->file('image');
        $file_path = $file->upload('posts');
        dd($this->storage->url($file_path));

        $data = $this->request->validated();
        if (!$data) {
            $this->session->set('errors', $this->request->errors());
            redirect('/posts/new');
        }

        $this->model->store($data);
        redirect('/posts');
    }
}