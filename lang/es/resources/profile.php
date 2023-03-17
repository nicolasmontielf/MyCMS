<?php

return [
    'name' => 'Mi Perfil',
    'form' => [
        'sections' => [
            'general' => 'General',
            'password' => 'Actualizar contraseña',
        ],
        'fields' => [
            'first_name' => 'Nombre',
            'last_name' => 'Apellido',
            'email' => 'Email',
            'current_password' => 'Contraseña actual',
            'new_password' => 'Nueva contraseña',
            'new_password_confirmation' => 'Confirmar nueva contraseña',
        ],
        'buttons' => [
            'save' => 'Guardar',
            'cancel' => 'Cancelar',
        ],
        'messages' => [
            'success' => 'Tu perfil ha sido actualizado.',
        ],
    ]
];
