<?php

use DB\Factories\UserFactory;

return [
//    User::class =>
//        fn() => new User()
    UserFactory::class =>
        fn() => new UserFactory()
];
