<?php

return [
    'name' => 'My Profile',
    'form' => [
        'sections' => [
            'general' => 'General',
            'password' => 'Update password',
        ],
        'fields' => [
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'current_password' => 'Current password',
            'new_password' => 'New password',
            'new_password_confirmation' => 'Confirm new password',
        ],
        'buttons' => [
            'save' => 'Save',
            'cancel' => 'Cancel',
        ],
        'messages' => [
            'success' => 'Your profile has been updated.',
        ],
    ]
];
