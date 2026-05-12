<?php

/**
 * Search results page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace App;

use Timber\Timber;

$templates = [
    "templates/search.twig",
    "templates/archive.twig",
    "templates/index.twig",
];

global $wp_query;

$context = Timber::context([
    "title"        => get_search_query(),
    "posts"        => Timber::get_posts(),
    "search_query" => get_search_query(),
    "found_posts"  => $wp_query->found_posts,
]);

Timber::render($templates, $context);
