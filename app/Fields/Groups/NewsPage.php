<?php

use Extended\ACF\Location;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Tab;

register_extended_field_group([
    "title" => "Archivio - Contenuti",
    "location" => [Location::where("page_template", "page-archive.php")],
    "fields" => [
        Tab::make("Intro")->placement("left"),
        FlexibleContent::make("Intro", "archive_intro")
            ->helperText("Sezioni mostrate sopra la griglia, sotto l'hero. Opzionale.")
            ->button("Aggiungi sezione")
            ->layouts(require get_stylesheet_directory() . "/app/Fields/page-layouts.php")
            ->withSettings([
                "acfe_flexible_advanced" => 1,
                "acfe_flexible_stylised_button" => 1,
                "acfe_flexible_add_actions" => ["toggle", "copy"],
                "acfe_flexible_layouts_state" => "user",
                "acfe_flexible_modal_edit" => [
                    "acfe_flexible_modal_edit_enabled" => "0",
                    "acfe_flexible_modal_edit_size" => "large",
                ],
                "acfe_flexible_layouts_thumbnails" => 1,
                "acfe_flexible_modal" => [
                    "acfe_flexible_modal_enabled" => "1",
                    "acfe_flexible_modal_col" => "4",
                ],
            ]),
        Link::make("Documento", "archive_documento")
            ->helperText("Link al documento scaricabile dalla pagina archivio. Opzionale.")
            ->format("array"),
        Tab::make("Contenuti")->placement("left"),
        FlexibleContent::make("Contenuti", "archive_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio, dopo la griglia e la paginazione.")
            ->button("Aggiungi sezione")
            ->layouts(require get_stylesheet_directory() . "/app/Fields/page-layouts.php")
            ->withSettings([
                "acfe_flexible_advanced" => 1,
                "acfe_flexible_stylised_button" => 1,
                "acfe_flexible_add_actions" => ["toggle", "copy"],
                "acfe_flexible_layouts_state" => "user",
                "acfe_flexible_modal_edit" => [
                    "acfe_flexible_modal_edit_enabled" => "0",
                    "acfe_flexible_modal_edit_size" => "large",
                ],
                "acfe_flexible_layouts_thumbnails" => 1,
                "acfe_flexible_modal" => [
                    "acfe_flexible_modal_enabled" => "1",
                    "acfe_flexible_modal_col" => "4",
                ],
            ]),
    ],
    "style" => "default",
    "hide_on_screen" => ["the_content"],
]);
