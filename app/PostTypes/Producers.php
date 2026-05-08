<?php

namespace App\PostTypes;

use Extended\ACF\Fields\Relationship;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

class Producers extends \Timber\Post
{
    private static $names = [
        "singular" => "Producer",
        "plural"   => "Producers",
        "slug"     => "producers",
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
                '^' . $prefix . 'industry/bio-to-b-drama/contents/producers/([^/]+)/?$',
                'index.php?post_type=producers&name=$matches[1]',
                'top'
            );
            add_rewrite_rule(
                '^' . $prefix . 'industry/bio-to-b-drama/contents/producers/?$',
                'index.php?post_type=producers',
                'top'
            );
        }
    }

    private static function register_custom_fields()
    {
        register_extended_field_group([
            "title"    => "Producers",
            "key"      => "group_producers_main",
            "location" => [Location::where("post_type", self::$names["slug"])],
            "style"    => "default",
            "position" => "normal",
            "fields"   => [
                Textarea::make("Preview", "preview")->key("field_producers_preview"),
            ],
        ]);

        register_extended_field_group([
            "title"    => "Who's Coming",
            "key"      => "group_producers_whos_coming",
            "location" => [Location::where("post_type", self::$names["slug"])],
            "style"    => "default",
            "position" => "normal",
            "fields"   => [
                Text::make("Titolo", "titolo")->key("field_producers_whos_coming_titolo"),
                Text::make("Sottotitolo", "sottotitolo")->key("field_producers_whos_coming_sottotitolo"),
                Relationship::make("Who's Coming", "whos_coming")
                    ->key("field_producers_whos_coming")
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
            "menu_icon"     => "dashicons-businessman",
            "menu_position" => null,
            "has_archive"   => "industry/bio-to-b-drama/contents/producers",
            "rewrite"       => ["slug" => "industry/bio-to-b-drama/contents/producers", "with_front" => false],
            "supports"      => ["title", "editor", "thumbnail"],
            "labels"        => [
                "name"               => "Producers",
                "singular_name"      => "Producer",
                "add_new"            => "Aggiungi nuovo",
                "add_new_item"       => "Aggiungi nuovo producer",
                "edit_item"          => "Modifica producer",
                "new_item"           => "Nuovo producer",
                "view_item"          => "Visualizza producer",
                "search_items"       => "Cerca producer",
                "not_found"          => "Nessun producer trovato",
                "not_found_in_trash" => "Nessun producer nel cestino",
                "all_items"          => "Tutti i producers",
            ],
        ];

        register_extended_post_type($name, $args, $names);
    }
}
