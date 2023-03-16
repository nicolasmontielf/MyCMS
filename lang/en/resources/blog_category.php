<?php
return [
    'label' => 'Category',
    'labelPlural' => 'Categories',
    'navigation' => [
        'label' => 'Categories',
        'group' => 'Blogs',
    ],
    'forms' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Category name',
        ],
        'description' => [
            'label' => 'Description',
            'placeholder' => 'Category description',
        ],
    ],
    'table' => [
        'name' => 'Category',
        'slug' => 'Slug',
        'posts_count' => 'Posts using the category',
        'updated_at' => 'Last update',
    ]
];
