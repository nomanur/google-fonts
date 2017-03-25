$ranking_body_font_get = cs_get_option('ranking_body_font');
$ranking_heading_font_get = cs_get_option('ranking_headding_font');

function ranking_champtheme_body_gf_url() {
    $font_url = '';
    $ranking_body_font_get = cs_get_option('ranking_body_font');
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'ranking-champtheme' ) ) {
        $font_url = add_query_arg( 'family', urlencode( ''.$ranking_body_font_get['family'].':300,300i,400,400i,700,700i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

if($ranking_heading_font_get['family'] == $ranking_body_font_get['family']) {} else {
    function ranking_champtheme_heading_gf_url() {
        $font_url = '';
        $ranking_heading_font_get = cs_get_option('ranking_headding_font');
        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'ranking-champtheme' ) ) {
            $font_url = add_query_arg( 'family', urlencode( ''.$ranking_heading_font_get['family'].':300,300i,400,400i,700,700i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
        }
        return $font_url;
    }    
}

function ranking_champtheme_options_gf() {
    wp_enqueue_style( 'ranking-champtheme-custom-google-fonts', ranking_champtheme_body_gf_url(), array(), '1.0.0' );
    
    $ranking_body_font_get = cs_get_option('ranking_body_font');
    $ranking_heading_font_get = cs_get_option('ranking_headding_font');
    if($ranking_heading_font_get['family'] == $ranking_body_font_get['family']) {} else {
        wp_enqueue_style( 'ranking-champtheme-google-heading-fonts', ranking_champtheme_heading_gf_url(), array(), '1.0.0' );
    }
}
add_action( 'wp_enqueue_scripts', 'ranking_champtheme_options_gf' );  