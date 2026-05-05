<?php

namespace App\Taxonomies;

class ProposteEditorialiTaxonomies
{
    public static function register(): void
    {
        $taxonomies = [
            [
                "slug"     => "pe-paese",
                "singular" => "Paese",
                "plural"   => "Paesi",
            ],
            [
                "slug"     => "pe-genere",
                "singular" => "Genere",
                "plural"   => "Generi",
            ],
        ];

        foreach ($taxonomies as $tax) {
            register_extended_taxonomy(
                $tax["slug"],
                ["proposte-editoriali"],
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
