<?php

use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\TrueFalse;
use Extended\ACF\Fields\WYSIWYGEditor;

return [
    Tab::make("Heading", "heading_tab"),
    Text::make("Heading", "heading"),

    Tab::make("Titolo", "title_tab"),
    Text::make("Titolo", "title"),

    Tab::make("Contenuto", "content_tab"),
    WYSIWYGEditor::make("Testo", "content")
        ->toolbar(["bold", "italic", "link", "bullist", "numlist"])
        ->tabs("all")
        ->disableMediaUpload(),

    Tab::make("Links", "links_tab"),
    Repeater::make("Links", "links")
        ->layout("block")
        ->collapsed("link")
        ->button("Aggiungi link")
        ->fields([
            Link::make("Link", "link")->format("array"),
            Select::make("Stile", "stile")
                ->choices([
                    "primary"   => "Bottone primario",
                    "secondary" => "Bottone secondario",
                    "link"      => "Link",
                ])
                ->default("primary"),
        ]),

    Tab::make("Stile", "stile_tab"),
    TrueFalse::make("Bordo superiore", "border_top")
        ->stylized()
        ->column(50),
    TrueFalse::make("Bordo inferiore", "border_bottom")
        ->stylized()
        ->column(50),
    Tab::make("Impostazioni", "impostazioni_tab"),
    Text::make("Ancora (ID)", "anchor")
        ->helperText("ID per i link ancora. Inserisci senza il simbolo #.")
        ->placeholder("es: sezione-contatti")
        ->prefix("#")
        ->wrapper(["width" => 25]),
];
