<?php

namespace App\Taxonomies;

class ProgettiDocTaxonomies
{
    public static function register(): void
    {
        $taxonomies = [
            [
                "slug"     => "pd-paese",
                "singular" => "Paese",
                "plural"   => "Paesi",
            ],
            [
                "slug"     => "pd-genere",
                "singular" => "Genere",
                "plural"   => "Generi",
            ],
            [
                "slug"     => "pd-badge",
                "singular" => "Badge",
                "plural"   => "Badges",
            ],
        ];

        foreach ($taxonomies as $tax) {
            register_extended_taxonomy(
                $tax["slug"],
                ["progetti-doc"],
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
