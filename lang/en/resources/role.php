<?php
return [
    'label' => 'Role',
    'labelPlural' => 'Roles',
    'navigation' => [
        'label' => 'Roles',
        'group' => 'Users',
    ],
    'forms' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name of the role',
        ],
        'permissions' => [
            'label' => 'Permissions',
            'placeholder' => 'Select permissions for the role',
        ],
    ],
    'table' => [
        'name' => 'Role name',
        'users2_count' => 'Users assigned',
        'permissions_count' => 'Permissions assigned',
        'updated_at' => 'Last update',
    ]
];
