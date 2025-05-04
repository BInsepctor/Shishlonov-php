<?php

return [
    'roles' => [
        'admin' => [
            'name' => 'admin',
            'permissions' => [
                'posts.create',
                'posts.edit',
                'posts.delete',
                'posts.index',
                'posts.show',
                'comments.store',
            ]
        ],
        'editor' => [
            'name' => 'editor',
            'permissions' => [
                'posts.create',
                'posts.edit',
                'posts.index',
                'posts.show',
                'comments.store',
            ]
        ],
        'user' => [
            'name' => 'user',
            'permissions' => [
                'posts.index',
                'posts.show',
                'comments.store',
            ]
        ],
    ]
];