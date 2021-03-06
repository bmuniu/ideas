<?php
return [

    'administrator' => [

        (object) [
            'name' => 'Dashboard',
            'url' => 'home',
            'icon' => 'fa-dashboard'
        ],

        (object) [
            'name' => 'User Registration',
            'url' => 'admin/register/user',
            'icon' => 'fa-users'
        ],

        (object) [
            'name' => 'Departments',
            'url' => 'admin/departments',
            'icon' => 'fa-list'
        ],

    ],

    'staff' => [
        (object) [
            'name' => 'Dashboard',
            'url' => 'home',
            'icon' => 'fa-dashboard'
        ],

        (object) [
            'name' => 'Idea Categories',
            'url' => 'qa-manager/idea/categories',
            'icon' => 'fa-list'
        ],

        (object) [
            'name' => 'Post Idea',
            'url' => 'post/idea',
            'icon' => 'fa-comment'
        ],

        (object) [
            'name' => 'Ideas Timeline',
            'url' => 'ideas',
            'icon' => 'fa-list'
        ],

        (object) [
            'name' => 'Most Popular Ideas',
            'url' => 'popular/ideas',
            'icon' => 'Ideas'
        ],

    ],

    'student' => [

        (object) [
            'name' => 'Dashboard',
            'url' => 'home',
            'icon' => 'fa-dashboard'
        ],

        (object) [
            'name' => 'Post Idea',
            'url' => 'post/idea',
            'icon' => 'fa-comment'
        ],

        (object) [
            'name' => 'Ideas Timeline',
            'url' => 'ideas',
            'icon' => 'fa-list'
        ]

    ]
];