<?php

namespace App\PostTypes;

use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

class AttivitaDrama extends \Timber\Post
{
    private static $names = [
        "singular" => "Attività Drama",
        "plural"   => "Attività Drama",
        "slug"     => "attivita-drama",
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
            "title"    => "Attività Drama",
            "location" => [Location::where("post_type", self::$names["slug"])],
            "style"    => "default",
            "position" => "normal",
            "fields"   => [
                Group::make("", "attivita_drama")
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
        $name  = self::$names["slug"];
        $names = self::$names;
        $args  = [
            "menu_icon"     => "dashicons-calendar-alt",
            "menu_position" => null,
            "rewrite"       => ["slug" => "industry/bio-to-b-drama/attivita"],
            "supports"      => ["title", "editor", "thumbnail"],
            "labels"        => [
                "name"               => "Attività Drama",
                "singular_name"      => "Attività Drama",
                "add_new"            => "Aggiungi nuova",
                "add_new_item"       => "Aggiungi nuova attività drama",
                "edit_item"          => "Modifica attività drama",
                "new_item"           => "Nuova attività drama",
                "view_item"          => "Visualizza attività drama",
                "search_items"       => "Cerca attività drama",
                "not_found"          => "Nessuna attività drama trovata",
                "not_found_in_trash" => "Nessuna attività drama nel cestino",
                "all_items"          => "Tutte le attività drama",
            ],
        ];

        register_extended_post_type($name, $args, $names);
    }
}
