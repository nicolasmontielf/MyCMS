<?php
return [
    'label' => 'Usuario',
    'labelPlural' => 'Usuarios',
    'navigation' => [
        'label' => 'Usuarios',
        'group' => 'Usuarios',
    ],
    'forms' => [
        'document' => [
            'label' => 'Documento',
            'placeholder' => 'Ingresa un número de documento',
        ],
        'firstName' => [
            'label' => 'Nombre',
            'placeholder' => 'Nombre del usuario',
        ],
        'lastName' => [
            'label' => 'Apellido',
            'placeholder' => 'Apellido del usuario',
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Ingresa el email del usuario',
        ],
        'password' => [
            'label' => 'Contraseña',
            'placeholder' => 'Contraseña para acceder al sistema',
        ],
        'phone' => [
            'label' => 'Celular',
            'placeholder' => 'Ingresa el número de celular del usuario',
        ],
        'role' => [
            'label' => 'Rol',
            'placeholder' => 'Selecciona el rol del usuario',
        ],
    ],
    'table' => [
        'name' => 'Nombre completo',
        'email' => 'Email',
        'role' => 'Rol',
    ]
];
