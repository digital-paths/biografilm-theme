<?php

declare(strict_types=1);

namespace App\Integrations;

use App\IsPluginActive;
use Yard\Hook\Filter;

#[IsPluginActive("polylang-pro/polylang.php")]
class Polylang
{
    #[Filter("timber/twig")]
    public function add_functions_to_twig($twig)
    {
        $twig->addFunction(
            new \Twig\TwigFunction("pll_e", function ($string = "") {
                if (function_exists("pll_e")) {
                    pll_e($string);
                } else {
                    echo $string;
                }
            }),
        );

        $twig->addFunction(
            new \Twig\TwigFunction("pll__", function ($string = "") {
                if (function_exists("pll__")) {
                    return pll__($string);
                } else {
                    return $string;
                }
            }),
        );

        return $twig;
    }

    /**
     * When a translated page has no custom template assigned, inherit it
     * from its Polylang sibling so page templates work across all languages
     * without needing manual assignment in the WP admin.
     */
    #[Filter("template_include")]
    public function inherit_template_from_translation(string $template): string
    {
        if (!is_page() || !function_exists('pll_get_post_translations')) {
            return $template;
        }

        $post_id          = get_the_ID();
        $current_template = get_post_meta($post_id, '_wp_page_template', true);

        if ($current_template && $current_template !== 'default') {
            return $template;
        }

        foreach (pll_get_post_translations($post_id) as $trans_id) {
            if ($trans_id === $post_id) {
                continue;
            }

            $sibling_template = get_post_meta($trans_id, '_wp_page_template', true);

            if ($sibling_template && $sibling_template !== 'default') {
                $located = locate_template($sibling_template);
                if ($located) {
                    return $located;
                }
            }
        }

        return $template;
    }
}
