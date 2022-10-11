<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

//Disable admin bar
add_filter('show_admin_bar', '__return_false');

//gravity forms hidden label
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

register_nav_menus( array(
    'footer' => __('Sticky Footer Menu', 'understrap'),
) );

if ( ! function_exists( 'get_post_top_ancestor_id' ) ) {
/**
 * Gets the id of the topmost ancestor of the current page.
 *
 * Returns the current page's id if there is no parent.
 * 
 * @return int ID of the top ancestor page.
 */
function get_post_top_ancestor_id() {
    if ( ! $post = get_post() ) {
        return;
    }
     
    $top_ancestor = $post->ID;
    if ( $post->post_parent ) {
        $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
        $top_ancestor = $ancestors[0];
    }
     
    return $top_ancestor;
}
} // Exists.

if ( ! function_exists ( 'understrap_posted_on' ) ) {
    function understrap_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );
        $posted_on = sprintf(
            esc_html_x( '%s', 'post date', 'understrap' ),
            '<i class="fa fa-calendar" aria-hidden="true"></i> ' . $time_string
        );
        $byline = sprintf(
            esc_html_x( 'by %s', 'post author', 'understrap' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );
        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }       
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
    /**
     * Adds a custom read more link to all excerpts, manually or automatically generated
     *
     * @param string $post_excerpt Posts's excerpt.
     *
     * @return string
     */
    function understrap_all_excerpts_get_more_link( $post_excerpt ) {
        if ( ! is_admin() ) {
            $post_excerpt = $post_excerpt . '...<a class="understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( ' Read More <i class="fa fa-chevron-circle-right"></i>',
            'understrap' ) . '</a></p>';
        }
        return $post_excerpt;
    }
}

//add options page for site wide notice
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title' => 'Site Wide Notice',
        'menu_title' => 'Site Notice'
    ));
    
}

//add_action( 'wp_head', 'site_notice' );

function site_notice() {
    $text = get_field('site_notice_text','option');

    if ( is_admin() || empty( $text ) ) {
        return;
    }
    ?>
    <div
        class="site-notice"
        data-id="<?php echo esc_attr( md5( $text ) ); ?>"
    >
        <?php echo $text; ?>
        <button
            aria-label="<?php esc_html_e( 'Dismiss site notice', 'understrap' ); ?>"
            class="site-notice-dismiss"
        >
            ×
        </button>
    </div>
    <?php
}

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('/');
        width:auto;
        background-size: 100%;
        background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Frosted Hill Equestrian';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


