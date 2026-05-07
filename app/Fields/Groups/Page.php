<?php

namespace App\Fields\Groups;

use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Location;

register_extended_field_group([
    "title" => "Page",
    "location" => [
        Location::where("page_template", "=", "default"),
        Location::where("page_type", "=", "front_page"),
        Location::where("page_template", "=", "page-locations.php"),
    ],
    "fields" => [
        FlexibleContent::make("", "page_components")
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
                    "acfe_flexible_modal_col"     => "4",
                ],
            ]),
    ],
    "style" => "",
    "hide_on_screen" => ["the_content"],
    "acfe_seamless_style" => 1,
]);
