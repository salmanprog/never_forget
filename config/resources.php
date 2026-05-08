<?php

return [
    'limits' => [
        'employees' => (int) env('RESOURCE_LIMIT_EMPLOYEES', 10),
        'clients'   => (int) env('RESOURCE_LIMIT_CLIENTS', 5),
        'friends_family' => (int) env('RESOURCE_LIMIT_FRIENDS_FAMILY', 5),
    ],
];
