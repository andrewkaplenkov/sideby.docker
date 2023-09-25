<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Lilo\Core\Controller\BaseController;
use Lilo\Core\Database\ORM\Model\ModelInterface;
use Lilo\Core\Http\Request\RequestInterface;

class PostController extends BaseController
{
    protected ModelInterface|string|null $model = Post::class;
    protected RequestInterface|string|null $request = PostRequest::class;

    public function index()
    {
        $posts = $this->model->all();

        return view('posts/index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts/create', [
            'session' => $this->session,
        ]);
    }

    public function store()
    {
        $data = $this->request->validated();
        if (!$data) {
            $this->session->set('errors', $this->request->errors());
            redirect('/posts/new');
        }

        $this->model->store($data);
        redirect('/posts');
    }
}