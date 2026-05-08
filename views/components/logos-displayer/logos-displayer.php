<?php

use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\TextArea;
use Extended\ACF\Fields\TrueFalse;

return [
    Text::make("Titolo", "title"),
    Text::make("Sottotitolo", "subtitle"),
    Link::make("Link", "link")->format("array"),
    Repeater::make("Loghi", "items")
        ->layout("block")
        ->button("Aggiungi logo")
        ->fields([
            Image::make("Immagine", "image")->format("array"),
            Text::make("Titolo", "title"),
            TextArea::make("Sottotitolo", "subtitle"),
            Link::make("Link", "link")->format("array"),
        ]),
];
