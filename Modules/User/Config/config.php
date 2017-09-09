<?php

return [
    'name' => 'User',
    'icon' => 'fa-users',
    'PolicityClass' => \App\User::class,
    'ACL' => [
        'USER_VIEW' => '',
        'USER_CREATE' => '',
        'USER_EDIT' => '',
        'USER_DELETE' => '',
        'USER_CHANGE_ROLE' => '',
    ]
];
