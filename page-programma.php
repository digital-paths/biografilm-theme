<?php

/**
 * Template Name: Programma
 */

namespace App;

use Timber\Timber;

$context         = Timber::context();
$context["post"] = Timber::get_post();

$tipo = get_field("tipo_programma") ?: "festival";
$context["tipo"] = $tipo;

if ($tipo === "doc") {
    $context["giorni"] = get_field("programma_doc_giorni") ?: [];
}

Timber::render("templates/page-programma.twig", $context);
