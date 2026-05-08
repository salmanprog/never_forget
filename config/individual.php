<?php

return [
    'package' => [
        'amount' => (float) env('INDIVIDUAL_PACKAGE_AMOUNT', 50),
        'name' => env('INDIVIDUAL_PACKAGE_NAME', 'Friends/Family Upgrade Package'),
        'friends_family' => (int) env('INDIVIDUAL_PACKAGE_FRIENDS_FAMILY', 10), // limit after upgrade (default 5 + 5)
    ],
];
