<?php

namespace App\PostTypes;

use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\PostObject;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Taxonomy;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Location;

class ProposteEditoriali extends \Timber\Post
{
    private static $names = [
        "singular" => "Proposta editoriale",
        "plural"   => "Proposte editoriali",
        "slug"     => "proposte-editoriali",
    ];

    public static function register()
    {
        self::register_post_type();

        add_filter("timber/post/classmap", function ($classmap) {
            return array_merge($classmap, [
                self::$names["slug"] => self::class,
            ]);
        });

        self::register_custom_fields();

        add_action("admin_head-post.php", [
            self::class,
            "featured_image_helper",
        ]);
        add_action("admin_head-post-new.php", [
            self::class,
            "featured_image_helper",
        ]);
    }

    public static function featured_image_helper(): void
    {
        $screen = get_current_screen();
        if (!$screen || $screen->post_type !== self::$names["slug"]) {
            return;
        }
        echo '<style>#postimagediv .inside::after { content: "Questa immagine verrà utilizzata nelle card (formato 16:9) e in altri contesti orizzontali del sito. Si consiglia un\'immagine orizzontale ad alta risoluzione, preferibilmente 1920×1080px."; display: block; padding: 8px 12px; font-size: 12px; color: #757575; }</style>';
    }

    private static function register_custom_fields()
    {
        register_extended_field_group([
            "title"          => "Proposta editoriale",
            "location"       => [Location::where("post_type", self::$names["slug"])],
            "hide_on_screen" => ["the_content"],
            "style"          => "",
            "fields"         => [
                Tab::make("Generali"),
                Text::make("Autore", "autore"),
                Repeater::make("Altri autori", "altri_autori")
                    ->layout("row")
                    ->key("field_proposte_editoriali_altri_autori")
                    ->collapsed("field_proposte_editoriali_altri_autori_nome")
                    ->fields([
                        Text::make("Nome", "nome")->key("field_proposte_editoriali_altri_autori_nome"),
                    ]),
                Text::make("Traduttore", "traduttore"),
                PostObject::make("Editore", "editore")
                    ->postTypes(["publishers"])
                    ->required(),
                Text::make("Collana", "collana"),
                Number::make("Anno", "anno")
                    ->min(1000)
                    ->max(2100)
                    ->placeholder("es. 2024"),
                Number::make("Pagine", "pagine")
                    ->min(1)
                    ->placeholder("es. 320"),
                Text::make("Lingua originale", "lingua"),
                Text::make("ISBN", "isbn"),
                Textarea::make("Anteprima card", "anteprima")
                    ->rows(3)
                    ->helperText("Breve testo descrittivo mostrato nella card del libro."),
                Text::make("Preview", "preview")->helperText(
                    "La preview viene automaticamente generata dall'unione di autore / editore / genere. Se vuoi sovrascriverla, inserisci qui il testo manualmente. Altrimenti, lascia vuoto.",
                ),
                WYSIWYGEditor::make("Descrizione", "description")
                    ->toolbar(["bold", "italic", "link"])
                    ->tabs("all")
                    ->disableMediaUpload()
                    ->helperText(
                        "Questo testo esteso verrà mostrato nella pagina dedicata alla proposta editoriale.",
                    ),

                Tab::make("Tassonomie"),
                Taxonomy::make("Paese", "paese")
                    ->taxonomy("pe-paese")
                    ->appearance("multi_select")
                    ->create(true)
                    ->save(true),
                Taxonomy::make("Genere", "genere")
                    ->taxonomy("pe-genere")
                    ->appearance("select")
                    ->create(true)
                    ->save(true),

                Tab::make("Info aggiuntive"),
                Repeater::make("Info aggiuntive", "info_aggiuntive")
                    ->key("field_proposte_editoriali_info_aggiuntive_repeater")
                    ->helperText(
                        "Le righe aggiunte qui appariranno nella tabella informativa della pagina della proposta, dopo i campi standard.",
                    )
                    ->fields([
                        Text::make("Titolo", "titolo")->key("field_proposte_editoriali_info_aggiuntive_titolo"),
                        WYSIWYGEditor::make("Contenuto", "contenuto")
                            ->key("field_proposte_editoriali_info_aggiuntive_contenuto")
                            ->toolbar(["bold", "italic", "link"])
                            ->tabs("all")
                            ->disableMediaUpload(),
                    ]),

            ],
        ]);
    }

    private static function register_post_type()
    {
        $name  = self::$names["slug"];
        $names = self::$names;
        $args  = [
            "menu_icon"     => "dashicons-book-alt",
            "menu_position" => null,
            "has_archive"   => false,
            "rewrite"       => ["slug" => "industry/bio-to-b-drama/proposte-editoriali"],
            "supports"      => ["title", "thumbnail"],
            "labels"        => [
                "name"               => "Proposte editoriali",
                "singular_name"      => "Proposta editoriale",
                "add_new"            => "Aggiungi nuova",
                "add_new_item"       => "Aggiungi nuova proposta editoriale",
                "edit_item"          => "Modifica proposta editoriale",
                "new_item"           => "Nuova proposta editoriale",
                "view_item"          => "Visualizza proposta editoriale",
                "search_items"       => "Cerca proposte editoriali",
                "not_found"          => "Nessuna proposta editoriale trovata",
                "not_found_in_trash" => "Nessuna proposta editoriale nel cestino",
                "all_items"          => "Tutte le proposte editoriali",
            ],
        ];

        register_extended_post_type($name, $args, $names);
    }
}
