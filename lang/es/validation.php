<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute debe ser aceptado.',
    'active_url' => ':attribute no es una URL válida.',
    'after' => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => ':attribute debe ser una fecha igual o posterior a :date.',
    'alpha' => ':attribute solo puede contener letras.',
    'alpha_dash' => ':attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => ':attribute solo puede contener letras y números.',
    'array' => ':attribute debe ser un array.',
    'before' => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => ':attribute debe ser una fecha igual o anterior a :date.',
    'between' => [
        'numeric' => ':attribute debe ser un número entre :min y :max.',
        'file' => 'El tamaño de :attribute debe estar entre :min y :max kilobytes.',
        'string' => ':attribute debe estar entre :min y :max caracteres.',
        'array' => ':attribute debe contener entre :min y :max items.',
    ],
    'boolean' => ':attribute debe ser un campo booleano.',
    'confirmed' => 'Confirmación de :attribute no coincide.',
    'date' => ':attribute no es una fecha válida.',
    'date_equals' => ':attribute debe ser una fecha igual a :date.',
    'date_format' => ':attribute debe tener el como formato: :format.',
    'different' => ':attribute debe ser diferente a :other.',
    'digits' => ':attribute debe tener :digits dígitos.',
    'digits_between' => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions' => ':attribute no tiene las dimensiones correctas.',
    'distinct' => ':attribute tiene un valor duplicado.',
    'email' => ':attribute debe ser una dirección de email válida.',
    'ends_with' => ':attribute debe terminar con uno de los siguientes valores: :values.',
    'exists' => ':attribute es inválido.',
    'file' => ':attribute debe ser un archivo.',
    'filled' => ':attribute debe tener un valor.',
    'gt' => [
        'numeric' => ':attribute debe ser mayor a :value.',
        'file' => ':attribute debe ser mayor a :value kilobytes.',
        'string' => ':attribute debe tener más de :value carateres.',
        'array' => ':attribute debe tener más de :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute debe ser mayor o igual a :value.',
        'file' => ':attribute debe ser mayor o igual a :value kilobytes.',
        'string' => ':attribute debe tener :value o más carateres.',
        'array' => ':attribute debe tener :value o más items.',
    ],
    'image' => ':attribute debe ser una imagen.',
    'in' => ':attribute es inválido.',
    'in_array' => ':attribute no existe en: :other.',
    'integer' => ':attribute debe ser un número entero.',
    'ip' => ':attribute debe ser una dirección IP válida.',
    'ipv4' => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6' => ':attribute debe ser una dirección IPv6 válida.',
    'json' => ':attribute debe ser un JSON válido.',
    'lt' => [
        'numeric' => ':attribute debe ser menor a :value.',
        'file' => ':attribute debe ser menor a :value kilobytes.',
        'string' => ':attribute debe tener menos de :value carateres.',
        'array' => ':attribute debe tener menos de :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute debe ser menor o igual a :value.',
        'file' => ':attribute debe ser menor o igual a :value kilobytes.',
        'string' => ':attribute debe tener :value o menos carateres.',
        'array' => ':attribute debe tener :value o menos items.',
    ],
    'max' => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file' => 'El tamaño de :attribute no debe ser mayor a :max kilobytes.',
        'string' => ':attribute no debe contener más de :max caracteres.',
        'array' => ':attribute no debe contener más de :max items.',
    ],
    'mimes' => ':attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => ':attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => ':attribute debe ser mayor a :max.',
        'file' => 'El tamaño de :attribute debe ser mayor a :max kilobytes.',
        'string' => ':attribute debe contener más de :max caracteres.',
        'array' => ':attribute debe contener más de :max items.',
    ],
    'not_in' => ':attribute es inválido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => ':attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => ':attribute debe ser presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => ':attribute es obligatorio.',
    'required_if' => ':attribute es obligatorio si :other es :value.',
    'required_unless' => ':attribute es obligatorio ha no ser que :other esté en :values.',
    'required_with' => ':attribute es obligatorio cuando :values está presente.',
    'required_with_all' => ':attribute es obligatorio cuando :values está presente.',
    'required_without' => ':attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => ':attribute es obligatorio cuando ninguno de los valores: :values están presentes.',
    'same' => ':attribute y :other deben coincidir.',
    'size' => [
        'numeric' => ':attribute debe ser :size.',
        'file' => ':attribute debe ser de :size kilobytes.',
        'string' => ':attribute debe contener :size caracteres.',
        'array' => ':attribute debe contener :size items.',
    ],
    'starts_with' => ':attribute debe empezar con uno de los siguientes valores: :values.',
    'string' => ':attribute debe ser un texto.',
    'timezone' => ':attribute debe ser una zona horaria válida.',
    'unique' => ':attribute ya existe y no puede ser repetida.',
    'uploaded' => ':attribute falló en la subida.',
    'url' => 'El formato de :attribute no es válido.',
    'uuid' => ':attribute debe ser un UUID válido.',

    'accepted_if' => 'Debes aceptar :attribute cuando :other es :value.',
    'current_password' => 'La contraseña es incorrecta.',
    'declined' => ':attribute debe ser rechazada.',
    'declined_if' => 'Debes declinar :attribute cuando :other es :value.',
    'enum' => ':attribute es inválido.',
    'mac_address' => ':attribute debe ser una dirección MAC.',
    'multiple_of' => ':attribute debe ser múltiplo de :value.',
    'prohibited' => 'El campo :attribute es prohibido.',
    'prohibited_if' => 'El campo :attribute es prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute es prohibido a menos que :other sea :values.',
    'prohibits' => 'El campo :attribute prohíbe a :other de estar presente.',
    'required_array_keys' => ':attribute debe contener valores dentro de: :values.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
