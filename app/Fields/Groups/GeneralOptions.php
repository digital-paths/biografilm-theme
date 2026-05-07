<?php

use Extended\ACF\Location;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Link;

register_extended_field_group([
    "title" => "Archivi",
    "location" => [Location::where("options_page", "theme-archivi")],
    "fields" => [
        Tab::make("Progetti")->placement("left"),
        Text::make("Titolo", "progetti_titolo")->helperText(
            "Titolo mostrato nella pagina archivio Progetti.",
        ),
        Textarea::make("Descrizione", "progetti_descrizione")->helperText(
            "Testo introduttivo mostrato nella pagina archivio Progetti.",
        ),
        FlexibleContent::make("Contenuti", "progetti_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Progetti, dopo la griglia e la paginazione.")
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

        Tab::make("Progetti CTA")->placement("left"),
        Text::make("Titolo", "progetti_cta_titolo")->helperText(
            "Titolo della CTA. Mostrato solo nelle pagine singolo Progetto, non nell'archivio.",
        ),
        Textarea::make("Descrizione", "progetti_cta_descrizione")->helperText(
            "Testo della CTA. Mostrato solo nelle pagine singolo Progetto, non nell'archivio.",
        ),
        Link::make("Link", "progetti_cta_link")->helperText(
            "Link della CTA. Mostrato solo nelle pagine singolo Progetto, non nell'archivio.",
        ),

        Tab::make("Eventi")->placement("left"),
        Text::make("Titolo", "eventi_titolo")->helperText(
            "Titolo mostrato nella pagina archivio Eventi.",
        ),
        Textarea::make("Descrizione", "eventi_descrizione")->helperText(
            "Testo introduttivo mostrato nella pagina archivio Eventi.",
        ),
        FlexibleContent::make("Contenuti", "eventi_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Eventi, dopo la griglia e la paginazione.")
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

        Tab::make("Film")->placement("left"),
        FlexibleContent::make("Contenuti", "film_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Film, dopo la griglia e la paginazione.")
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

        Tab::make("News")->placement("left"),
        FlexibleContent::make("Contenuti", "news_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio News, dopo la griglia e la paginazione.")
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

        Tab::make("Producers")->placement("left"),
        FlexibleContent::make("Contenuti", "producers_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Producers, dopo la griglia e la paginazione.")
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

        Tab::make("Publishers")->placement("left"),
        FlexibleContent::make("Contenuti", "publishers_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Publishers, dopo la griglia e la paginazione.")
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

        Tab::make("Who's Coming")->placement("left"),
        FlexibleContent::make("Contenuti", "whoscoming_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Who's Coming, dopo la griglia e la paginazione.")
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
        Link::make("Documento", "whoscoming_documento")
            ->helperText(
                "Link al documento scaricabile dalla pagina archivio Who's Coming.",
            )
            ->format("array"),

        Tab::make("Sezioni")->placement("left"),
        FlexibleContent::make("Contenuti", "sezioni_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Sezioni, dopo la griglia e la paginazione.")
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

        Tab::make("Contents Doc")->placement("left"),
        Group::make("Intro", "contents_doc_intro")
            ->layout("block")
            ->helperText("Mostrato in cima alla pagina archivio Contents Doc, prima della griglia.")
            ->fields(
                require get_stylesheet_directory() .
                    "/views/components/text-displayer/text-displayer.php",
            ),
        FlexibleContent::make("Contenuti", "contents_doc_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Contents Doc, dopo la griglia e la paginazione.")
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

        Tab::make("Contents Drama")->placement("left"),
        Group::make("Intro", "contents_drama_intro")
            ->layout("block")
            ->helperText("Mostrato in cima alla pagina archivio Contents Drama, prima della griglia.")
            ->fields(
                require get_stylesheet_directory() .
                    "/views/components/text-displayer/text-displayer.php",
            ),
        FlexibleContent::make("Contenuti", "contents_drama_components")
            ->helperText("Sezioni mostrate in fondo alla pagina archivio Contents Drama, dopo la griglia e la paginazione.")
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
]);
