<?php
return [
    'label' => 'Rol',
    'labelPlural' => 'Roles',
    'navigation' => [
        'label' => 'Roles',
        'group' => 'Usuarios',
    ],
    'forms' => [
        'name' => [
            'label' => 'Nombre',
            'placeholder' => 'Nombre del rol',
        ],
        'permissions' => [
            'label' => 'Permisos del rol',
            'placeholder' => 'Selecciona los permisos del rol',
        ],
    ],
    'table' => [
        'name' => 'Rol',
        'users2_count' => 'Usuarios con este rol',
        'permissions_count' => 'Permisos asignados',
        'updated_at' => 'Última actualización'
    ]
];
