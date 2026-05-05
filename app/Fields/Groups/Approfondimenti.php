<?php

namespace App\Fields\Groups;

use Extended\ACF\Fields\File;
use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Gallery;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Oembed;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Location;

register_extended_field_group([
    "title"    => "Approfondimenti",
    "style"    => "default",
    "location" => [
        Location::where("post_type", "news"),
        Location::where("post_type", "partner"),
        Location::where("post_type", "ospitalita"),
        Location::where("post_type", "attivita-doc"),
        Location::where("post_type", "attivita-drama"),
    ],
    "fields"   => [
        FlexibleContent::make("Approfondimenti", "approfondimenti")
            ->button("Aggiungi contenuto")
            ->layouts([
                Layout::make("Testo", "text")
                    ->layout("block")
                    ->fields([
                        WYSIWYGEditor::make("Testo", "content")
                            ->toolbar(["bold", "italic", "link", "bullist", "numlist"])
                            ->tabs("all")
                            ->disableMediaUpload(),
                    ]),
                Layout::make("Links", "link")
                    ->layout("block")
                    ->fields([
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
                    ]),
                Layout::make("Accordion", "accordion")
                    ->layout("block")
                    ->fields([
                        Repeater::make("Voci", "items")
                            ->layout("block")
                            ->collapsed("question")
                            ->button("Aggiungi voce")
                            ->fields([
                                Text::make("Domanda", "question"),
                                WYSIWYGEditor::make("Risposta", "answer")
                                    ->toolbar(["bold", "italic", "link", "bullist", "numlist"])
                                    ->tabs("all")
                                    ->disableMediaUpload(),
                            ]),
                    ]),
                Layout::make("Galleria", "gallery")
                    ->layout("block")
                    ->fields([
                        Gallery::make("Immagini", "images")->format("array"),
                    ]),
                Layout::make("Video", "video")
                    ->layout("block")
                    ->fields([
                        Oembed::make("URL video", "url")
                            ->helperText("YouTube, Vimeo o qualsiasi URL compatibile con oEmbed."),
                        File::make("File video", "file")
                            ->format("array"),
                    ]),
            ]),
    ],
]);
