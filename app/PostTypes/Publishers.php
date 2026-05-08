<?php

namespace App\PostTypes;

use Extended\ACF\Fields\Relationship;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

class Publishers extends \Timber\Post
{
    private static $names = [
        "singular" => "Publisher",
        "plural"   => "Publishers",
        "slug"     => "publishers",
    ];

    public static function register()
    {
        self::register_post_type();
        self::register_rewrite_rules();
        self::register_custom_fields();

        add_filter("timber/post/classmap", function ($classmap) {
            return array_merge($classmap, [
                self::$names["slug"] => self::class,
            ]);
        });
    }

    private static function register_rewrite_rules()
    {
        $prefixes = [''];
        if (function_exists('pll_languages_list') && function_exists('pll_default_language')) {
            $default = pll_default_language('slug');
            foreach (pll_languages_list(['fields' => 'slug']) as $slug) {
                if ($slug !== $default) {
                    $prefixes[] = $slug . '/';
                }
            }
        }

        foreach ($prefixes as $prefix) {
            add_rewrite_rule(
                '^' . $prefix . 'industry/bio-to-b-drama/contents/publishers/([^/]+)/?$',
                'index.php?post_type=publishers&name=$matches[1]',
                'top'
            );
            add_rewrite_rule(
                '^' . $prefix . 'industry/bio-to-b-drama/contents/publishers/?$',
                'index.php?post_type=publishers',
                'top'
            );
        }
    }

    private static function register_custom_fields()
    {
        register_extended_field_group([
            "title"    => "Publishers",
            "key"      => "group_publishers_main",
            "location" => [Location::where("post_type", self::$names["slug"])],
            "style"    => "default",
            "position" => "normal",
            "fields"   => [
                Textarea::make("Preview", "preview")->key("field_publishers_preview"),
            ],
        ]);

        register_extended_field_group([
            "title"    => "Who's Coming",
            "key"      => "group_publishers_whos_coming",
            "location" => [Location::where("post_type", self::$names["slug"])],
            "style"    => "default",
            "position" => "normal",
            "fields"   => [
                Text::make("Titolo", "titolo")->key("field_publishers_whos_coming_titolo"),
                Text::make("Sottotitolo", "sottotitolo")->key("field_publishers_whos_coming_sottotitolo"),
                Relationship::make("Who's Coming", "whos_coming")
                    ->key("field_publishers_whos_coming")
                    ->postTypes(["whos-coming"])
                    ->filters(["search"])
                    ->elements(["featured_image"]),
            ],
        ]);
    }

    private static function register_post_type()
    {
        $name  = self::$names["slug"];
        $names = self::$names;
        $args  = [
            "menu_icon"     => "dashicons-book",
            "menu_position" => null,
            "has_archive"   => "industry/bio-to-b-drama/contents/publishers",
            "rewrite"       => ["slug" => "industry/bio-to-b-drama/contents/publishers", "with_front" => false],
            "supports"      => ["title", "editor", "thumbnail"],
            "labels"        => [
                "name"               => "Publishers",
                "singular_name"      => "Publisher",
                "add_new"            => "Aggiungi nuovo",
                "add_new_item"       => "Aggiungi nuovo publisher",
                "edit_item"          => "Modifica publisher",
                "new_item"           => "Nuovo publisher",
                "view_item"          => "Visualizza publisher",
                "search_items"       => "Cerca publisher",
                "not_found"          => "Nessun publisher trovato",
                "not_found_in_trash" => "Nessun publisher nel cestino",
                "all_items"          => "Tutti i publishers",
            ],
        ];

        register_extended_post_type($name, $args, $names);
    }
}
