<?php

use Extended\ACF\Fields\Layout;

return [
    Layout::make("Carousel", "carousel")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/carousel/carousel.php",
        ),
    Layout::make("Hero Carousel", "hero_carousel")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/hero-carousel/hero-carousel.php",
        ),
    Layout::make("Card Displayer", "card_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/card-displayer/card-displayer.php",
        ),
    Layout::make("Partners Displayer", "partners_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/partners-displayer/partners-displayer.php",
        ),
    Layout::make("Logos Displayer", "logos_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/logos-displayer/logos-displayer.php",
        ),
    Layout::make("Highlight Card", "highlight_card")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/highlight-card/highlight-card.php",
        ),
    Layout::make("Text Displayer", "text_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/text-displayer/text-displayer.php",
        ),
    Layout::make("Quote", "quote")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/quote/quote.php",
        ),
    Layout::make("Film Displayer", "film_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/film-displayer/film-displayer.php",
        ),
    Layout::make("Editorial Block", "editorial_block")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/editorial-block/editorial-block.php",
        ),
    Layout::make("Simple Text", "simple_text")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/simple-text/simple-text.php",
        ),
    Layout::make("Spacer", "spacer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/spacer/spacer.php",
        ),
    Layout::make("FAQ", "faq")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/faq/faq.php",
        ),
    Layout::make("Link List", "link_list")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/link-list/link-list.php",
        ),
    Layout::make("Banner", "banner_small")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/banner-small/banner-small.php",
        ),
    Layout::make("Team", "team")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/team/team.php",
        ),
    Layout::make("Tabs", "tabs")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/tabs/tabs.php",
        ),
    Layout::make("Contacts", "contacts")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/contacts/contacts.php",
        ),
    Layout::make("Media Displayer", "media_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/media-displayer/media-displayer.php",
        ),
    Layout::make("CTA Bottom", "cta_bottom")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/cta-bottom/cta-bottom.php",
        ),
    Layout::make("Page Access", "page_access")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/page-access/page-access.php",
        ),
    Layout::make("Page Displayer", "page_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/page-displayer/page-displayer.php",
        ),
    Layout::make("Who's Coming Displayer", "whoscoming_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/whoscoming-displayer/whoscoming-displayer.php",
        ),
    Layout::make("Contents Displayer", "contents_displayer")
        ->layout("block")
        ->fields(
            require get_stylesheet_directory() .
                "/views/components/contents-displayer/contents-displayer.php",
        ),
];
