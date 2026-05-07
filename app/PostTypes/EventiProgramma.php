<?php

namespace App\PostTypes;

use Extended\ACF\Fields\DatePicker;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Taxonomy;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\TimePicker;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

class EventiProgramma extends \Timber\Post
{
    private static $names = [
        "singular" => "Evento",
        "plural"   => "Eventi",
        "slug"     => "eventi-programma",
    ];

    public static function register()
    {
        self::register_post_type();

        add_filter("timber/post/classmap", function ($classmap) {
            return array_merge($classmap, [
                self::$names["slug"] => self::class,
            ]);
        });

        self::register_custom_fields();
    }

    private static function register_post_type()
    {
        $name  = self::$names["slug"];
        $names = self::$names;
        $args  = [
            "publicly_queryable" => false,
            "has_archive"        => false,
            "rewrite"            => false,
            "show_ui"            => true,
            "show_in_menu"       => true,
            "menu_icon"          => "dashicons-calendar-alt",
            "menu_position"      => null,
            "supports"           => ["title", "thumbnail"],
            "labels"             => [
                "name"               => "Eventi",
                "singular_name"      => "Evento",
                "add_new"            => "Aggiungi nuovo",
                "add_new_item"       => "Aggiungi nuovo evento",
                "edit_item"          => "Modifica evento",
                "new_item"           => "Nuovo evento",
                "view_item"          => "Visualizza evento",
                "search_items"       => "Cerca eventi",
                "not_found"          => "Nessun evento trovato",
                "not_found_in_trash" => "Nessun evento nel cestino",
                "all_items"          => "Tutti gli eventi",
            ],
        ];

        register_extended_post_type($name, $args, $names);
    }

    private static function register_custom_fields()
    {
        register_extended_field_group([
            "title"          => "Evento programma",
            "location"       => [Location::where("post_type", self::$names["slug"])],
            "hide_on_screen" => ["the_content"],
            "style"          => "default",
            "position"       => "normal",
            "fields"         => [
                Textarea::make("Descrizione", "descrizione")
                    ->rows(4),
                Link::make("Link scheda", "link_card")->format("array"),
                Link::make("Link CTA", "link")->format("array"),
                DatePicker::make("Data", "data")
                    ->displayFormat("d/m/Y")
                    ->format("Ymd"),
                TimePicker::make("Orario inizio", "orario_inizio")
                    ->displayFormat("H:i")
                    ->format("H:i")
                    ->wrapper(["width" => 50]),
                TimePicker::make("Orario fine", "orario_fine")
                    ->displayFormat("H:i")
                    ->format("H:i")
                    ->wrapper(["width" => 50]),
                Taxonomy::make("Tipo di evento", "tipo_di_evento")
                    ->taxonomy("tipo-di-evento")
                    ->appearance("multi_select")
                    ->create(true)
                    ->save(true),
                Taxonomy::make("Location", "location")
                    ->taxonomy("location")
                    ->appearance("multi_select")
                    ->create(true)
                    ->save(true),
                Text::make("Sala o altre informazioni location", "sala_location")
                    ->helperText("Informazioni aggiuntive sulla location, es. «Sala 1», «Arena esterna», ecc."),
            ],
        ]);
    }
}
