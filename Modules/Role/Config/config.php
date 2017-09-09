<?php

return [
    'name' => 'Role',
    'icon' => 'fa-list-alt',
    'PolicityClass' => \Modules\Role\Entities\Role::class,
    'ACL' => [
        'ROLE_VIEW' => '',
        'ROLE_CREATE' => '',
        'ROLE_EDIT' => '',
        'ROLE_DELETE' => '',
    ]
];
