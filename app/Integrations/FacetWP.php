<?php

declare(strict_types=1);

namespace App\Integrations;

use App\IsPluginActive;

#[IsPluginActive("facetwp/index.php")]
class FacetWP
{
    public function __construct()
    {
        add_action('wp_ajax_facetwp', [$this, 'set_polylang_language'], 0);
        add_action('wp_ajax_nopriv_facetwp', [$this, 'set_polylang_language'], 0);
    }

    /**
     * Set Polylang's current language during FacetWP AJAX so that pll__()
     * in Timber templates returns the correct translation.
     * The language is injected into FWP_HTTP by the facetwp-polylang plugin.
     */
    public function set_polylang_language(): void
    {
        if (!isset($_POST['data'])) {
            return;
        }

        $data = json_decode(stripslashes($_POST['data']), true);
        $lang = sanitize_key($data['lang'] ?? '');

        if (!$lang || !function_exists('PLL') || !PLL() || !isset(PLL()->model)) {
            return;
        }

        $language = PLL()->model->get_language($lang);
        if ($language) {
            PLL()->curlang = $language;
        }
    }
}
