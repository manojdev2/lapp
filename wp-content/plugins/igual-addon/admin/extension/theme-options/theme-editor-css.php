<?php

/**
 * Igual Theme Editor CSS
 */

require_once ( IGUAL_ADDON_DIR . 'admin/extension/theme-options/class.options-style.php' );
$igual_styles = new Igual_Theme_Styles;

if( !class_exists('Igual_Google_Fonts_Function') ) {
	require_once IGUAL_ADDON_DIR . 'admin/extension/theme-options/googlefonts.php';
}

$site_width = $igual_styles->igual_dimension_settings( 'site-width', 'width' );
if( $site_width ){
	echo '.editor-styles-wrapper .wp-block, .editor-styles-wrapper .editor-block-list__block.wp-block[data-align=wide], .wp-block[data-align="wide"] {
		max-width: '. esc_attr( $site_width ) .';
	}';

	echo '.editor-styles-wrapper .wp-block:not([data-align="full"]) {
		max-width: '. esc_attr( $site_width ) .';
	}';
}

$igual_styles->igual_typo_settings( 'content-typography', '.editor-block-list__layout .editor-block-list__block,
.editor-styles-wrapper .editor-block-list__layout .editor-block-list__block p,
.block-editor__container .editor-styles-wrapper .mce-content-body,
.editor-styles-wrapper body,
.wp-block-button__link,.editor-styles-wrapper .wp-block-table__cell-content,
.block-editor-block-list__block, .block-editor-block-list__layout .block-editor-block-list__block' );

//lead typo styles
$igual_styles->igual_typo_settings( 'lead-typography', '.editor-block-list__layout .editor-block-list__block .lead' );

//h1 typo styles
$igual_styles->igual_typo_settings( 'h1-typography', '.editor-block-list__layout .editor-block-list__block h1,
.editor-styles-wrapper .editor-post-title__block .editor-post-title__input, h1.wp-block.wp-block-post-title, h1, .block-editor-block-list__layout h1.block-editor-block-list__block' );

//h2 typo styles
$igual_styles->igual_typo_settings( 'h2-typography', '.editor-block-list__layout .editor-block-list__block h2, h2, .block-editor-block-list__layout h2.block-editor-block-list__block' );

//h3 typo styles
$igual_styles->igual_typo_settings( 'h3-typography', '.editor-block-list__layout .editor-block-list__block h3, h3, .block-editor-block-list__layout h3.block-editor-block-list__block' );

//h4 typo styles
$igual_styles->igual_typo_settings( 'h4-typography', '.editor-block-list__layout .editor-block-list__block h4, h4, .block-editor-block-list__layout h4.block-editor-block-list__block' );

//h5 typo styles
$igual_styles->igual_typo_settings( 'h5-typography', '.editor-block-list__layout .editor-block-list__block h5, h5, .block-editor-block-list__layout h5.block-editor-block-list__block' );

//h6 typo styles
$igual_styles->igual_typo_settings( 'h6-typography', '.editor-block-list__layout .editor-block-list__block h6, h6, .block-editor-block-list__layout h6.block-editor-block-list__block' );

//site link color
$igual_styles->igual_link_color( 'link-color', 'regular', '.post-type-post .editor-block-list__layout .editor-block-list__block a' );
$igual_styles->igual_link_color( 'link-color', 'hover', '.post-type-post .editor-block-list__layout .editor-block-list__block a:hover' );
$igual_styles->igual_link_color( 'link-color', 'active', '.post-type-post .editor-block-list__layout .editor-block-list__block a:active, .post-type-post .editor-block-list__layout .editor-block-list__block a:focus' );

//primary color
$primary_color = $igual_styles->igual_get_option( 'primary-color' );
//secondary color
$secondary_color = $igual_styles->igual_get_option( 'secondary-color' );

echo '.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color),
.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:hover .wp-block-button__link:not(.has-text-color),
.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:focus .wp-block-button__link:not(.has-text-color),
.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:active .wp-block-button__link:not(.has-text-color) {
color: '. esc_attr( $primary_color ) .';
}


/* Button colors */
.entry-content .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color), 
.entry-content .wp-block-button.is-style-outline:hover .wp-block-button__link:not(.has-text-color) {
	color: '. esc_attr( $primary_color ) .';
}

.editor-block-list__layout .editor-block-list__block .wp-block-quote:not(.is-large):not(.is-style-large),
.editor-styles-wrapper blockquote.wp-block-quote.is-large,
.editor-styles-wrapper blockquote.wp-block-quote.is-style-large,.editor-styles-wrapper blockquote,
.editor-styles-wrapper .wp-block-pullquote blockquote.has-light-gray-color {
border-left-color: '. esc_attr( $primary_color ) .' !important; /* base: #0073a8; */
}
.editor-block-list__layout .editor-block-list__block blockquote.wp-block-quote.is-large, 
.editor-block-list__layout .editor-block-list__block blockquote.wp-block-quote.is-style-large,
.editor-block-list__layout .editor-block-list__block .has-cyan-bluish-gray-background-color.has-cyan-bluish-gray-background-color:not(.has-background-color) blockquote,
.wp-block-pullquote blockquote, .wp-block-freeform.block-library-rich-text__tinymce blockquote {
	border-left-color: '. esc_attr( $primary_color ) .';
}
.wp-block-quote[style*="text-align:right"], .wp-block-quote[style*="text-align: right"],
.wp-block-quote.has-text-align-right {
	border-right-color: '. esc_attr( $primary_color ) .';
}

.wp-block-button .wp-block-button__link,
.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__button,
.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link,
.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:active,
.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:focus,
.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover,
.wp-block-file__button-richtext-wrapper .block-editor-rich-text__editable.wp-block-file__button.rich-text {
	background: '. esc_attr( $primary_color ) .';
}
.wp-block-button .wp-block-button__link:hover, 
.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__button:hover,
 .wp-block-file__button-richtext-wrapper .block-editor-rich-text__editable.wp-block-file__button.rich-text:hover {
	background: '. esc_attr( $secondary_color ) .';
}
.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__button:hover,
.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:active,
.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:focus,
.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover {
background-color: #333; /* base: #0073a8; */
}
.wp-block-quote__citation, .wp-block-pullquote .wp-block-pullquote__citation  {
	color: '. esc_attr( $primary_color ) .'; /* base: #005177; */
}
blockquote cite a:before {
	background: '. esc_attr( $primary_color ) .';
}
.wp-block-calendar table tr th  {
	background: '. esc_attr( $primary_color ) .' !important; /* base: #005177; */
}
.block-editor-block-list__block.wp-block-button.is-style-outline .wp-block-button__link  {
	border-color: '. esc_attr( $primary_color ) .'; /* base: #005177; */
	color: '. esc_attr( $primary_color ) .'; /* base: #005177; */
}
.block-editor-block-list__block.wp-block-button.is-style-outline .wp-block-button__link:hover  {
	border-color: '. esc_attr( $secondary_color ) .'; /* base: #005177; */
}
body .wp-block-button__link:hover, body a.wp-block-button__link:hover {
    background: #333;
    color: #fff !important;
}
.block-editor-block-list__layout .block-editor-block-list__block {
    line-height: 1.3em;
}
/* Hover colors */
.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__textlink:hover {
color: '. esc_attr( $primary_color ) .'; /* base: #005177; */
}
.editor-block-list__layout figure.wp-block-pullquote {
    border-bottom: none;
    border-top: none;
}
/* Do not overwrite solid color pullquote or cover links */
.editor-block-list__layout .editor-block-list__block .wp-block-pullquote.is-style-solid-color a,
.editor-block-list__layout .editor-block-list__block .wp-block-cover a {
color: inherit;
}';

//button color
$igual_styles->igual_link_color( 'button-color', 'regular', '.wp-block-button__link' );
$igual_styles->igual_link_color( 'button-color', 'hover', '.wp-block-button__link:hover' );
$igual_styles->igual_link_color( 'button-color', 'active', '.wp-block-button__link:active, .wp-block-button__link:focus' );