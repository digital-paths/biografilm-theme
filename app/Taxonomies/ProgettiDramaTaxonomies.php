<?php

namespace App\Taxonomies;

class ProgettiDramaTaxonomies
{
    public static function register(): void
    {
        $taxonomies = [
            [
                "slug"     => "pdr-paese",
                "singular" => "Paese",
                "plural"   => "Paesi",
            ],
            [
                "slug"     => "pdr-genere",
                "singular" => "Genere",
                "plural"   => "Generi",
            ],
            [
                "slug"     => "pdr-badge",
                "singular" => "Badge",
                "plural"   => "Badges",
            ],
        ];

        foreach ($taxonomies as $tax) {
            register_extended_taxonomy(
                $tax["slug"],
                ["progetti-drama"],
                [
                    "hierarchical" => false,
                    "labels" => [
                        "name"          => $tax["plural"],
                        "singular_name" => $tax["singular"],
                        "add_new_item"  => "Aggiungi " . $tax["singular"],
                        "edit_item"     => "Modifica " . $tax["singular"],
                        "search_items"  => "Cerca " . $tax["plural"],
                        "not_found"     => "Nessun risultato trovato",
                        "all_items"     => "Tutt* " . strtolower($tax["plural"]),
                    ],
                ],
                [
                    "singular" => $tax["singular"],
                    "plural"   => $tax["plural"],
                    "slug"     => $tax["slug"],
                ],
            );
        }
    }
}
