<?php


use DB\Factories\UserFactory;

return [
    UserFactory::class => function () {
        return new UserFactory();
    }
];