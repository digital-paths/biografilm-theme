<?php

namespace App\PostTypes;

use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

class AttivitaDoc extends \Timber\Post
{
    private static $names = [
        "singular" => "Attività Doc",
        "plural" => "Attività Doc",
        "slug" => "attivita-doc",
    ];

    public static function register()
    {
        self::register_post_type();
        self::register_custom_fields();

        add_filter("timber/post/classmap", function ($classmap) {
            return array_merge($classmap, [
                self::$names["slug"] => self::class,
            ]);
        });
    }

    private static function register_custom_fields()
    {
        register_extended_field_group([
            "title" => "Attività Doc",
            "location" => [Location::where("post_type", self::$names["slug"])],
            "style" => "default",
            "position" => "normal",
            "fields" => [
                Group::make("", "attivita_doc")
                    ->layout("block")
                    ->fields([
                        Text::make("Sottotitolo", "sottotitolo"),
                        Textarea::make("Preview", "preview"),
                    ]),
            ],
        ]);
    }

    private static function register_post_type()
    {
        $name = self::$names["slug"];
        $names = self::$names;
        $args = [
            "menu_icon" => "dashicons-calendar-alt",
            "menu_position" => null,
            "rewrite" => ["slug" => "industry/bio-to-b-doc/attivita"],
            "supports" => ["title", "editor", "thumbnail"],
            "labels" => [
                "name" => "Attività Doc",
                "singular_name" => "Attività Doc",
                "add_new" => "Aggiungi nuova",
                "add_new_item" => "Aggiungi nuova attività doc",
                "edit_item" => "Modifica attività doc",
                "new_item" => "Nuova attività doc",
                "view_item" => "Visualizza attività doc",
                "search_items" => "Cerca attività doc",
                "not_found" => "Nessuna attività doc trovata",
                "not_found_in_trash" => "Nessuna attività doc nel cestino",
                "all_items" => "Tutte le attività doc",
            ],
        ];

        register_extended_post_type($name, $args, $names);
    }
}
