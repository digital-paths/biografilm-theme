<?php
return [
    'post_type'      => ['proiezione', 'eventi-programma'],
    'post_status'    => ['publish'],
    'posts_per_page' => 15,
    'meta_query'     => [
        'data_clause' => [
            'key'     => 'data',
            'compare' => 'EXISTS',
        ],
    ],
    'orderby' => [
        'data_clause' => 'ASC',
    ],
];
