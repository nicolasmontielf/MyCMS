<?php
return [
    'label' => 'Post',
    'labelPlural' => 'Posts',
    'navigation' => [
        'label' => 'Posts',
        'group' => 'Blogs',
    ],
    'form' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'Title of the post',
        ],
        'category' => [
            'label' => 'Category',
            'placeholder' => 'Select a category for the post',
        ],
        'subtitle' => [
            'label' => 'Subtitle',
            'placeholder' => 'Subtitle of the post',
        ],
        'body' => [
            'label' => 'Content',
            'placeholder' => 'Body/Content of the post',
        ],
        'tags' => [
            'label' => 'Tags',
            'placeholder' => 'Select tags for the post',
        ],
        'new_tag' => [
            'label' => 'New tag',
            'placeholder' => 'New tag for the post',
        ]
    ],
    'table' => [
        'name' => 'Title',
        'category' => 'Category',
        'author' => 'Author',
        'updated_at' => 'Last update',
    ]
];
