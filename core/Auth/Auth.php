<?php

namespace Lilo\Core\Auth;

use App\Models\User;
use Lilo\Core\App;
use Lilo\Core\Database\Models\ModelInterface;
use Lilo\Core\Http\Session\Session;
use Lilo\Core\Http\Session\SessionInterface;

class Auth implements AuthInterface
{
    private ModelInterface $user;
    private SessionInterface $session;

    public function __construct()
    {
        $this->user = new User();
        $this->session = App::resolve(Session::class);
    }

    public function attempt(string $email, string $password): bool
    {
        $user = $this->user->where('email', $email)->get();

        if (!$user) return false;

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        $this->session->set('user_id', $user['id']);

        return true;

    }

    public function logout(): void
    {
        $this->session->unset('user_id');
    }

    public function check(): bool
    {
        return $this->session->has('user_id');
    }

    public function user(string $param = null): mixed
    {
        if (!$this->check()) {
            return null;
        }

        $user = $this->user->get($this->session->get('user_id'));

        return $param
            ? $user[$param]
            : $user;

    }
}