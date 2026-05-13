<?php

/**
 * Get a page by path, translated to the current Polylang language when available.
 */
function get_archive_page(string $path): ?\WP_Post
{
    $page = get_page_by_path($path);
    if (!$page) {
        return null;
    }
    if (function_exists('pll_get_post')) {
        $translated_id = pll_get_post($page->ID);
        if ($translated_id) {
            return get_post($translated_id);
        }
    }
    return $page;
}
