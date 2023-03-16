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
            'label' => 'Título',
            'placeholder' => 'Título del post',
        ],
        'category' => [
            'label' => 'Categoría',
            'placeholder' => 'Seleccione la categoría del post',
        ],
        'subtitle' => [
            'label' => 'Subtítulo',
            'placeholder' => 'Subtítulo del post',
        ],
        'body' => [
            'label' => 'Contenido',
            'placeholder' => 'Contenido/cuerpo del post',
        ],
        'tags' => [
            'label' => 'Tags',
            'placeholder' => 'Seleccione algunos tags para el post',
        ],
        'new_tag' => [
            'label' => 'Nuevo tag',
            'placeholder' => 'Ingrese el nombre del nuevo tag',
        ]
    ],
    'table' => [
        'name' => 'Título',
        'category' => 'Categoría',
        'author' => 'Autor',
        'updated_at' => 'Última actualización',
    ]
];
