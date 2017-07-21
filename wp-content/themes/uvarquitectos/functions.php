<?php
add_action( 'after_setup_theme', 'uvarquitectos_setup' );
function uvarquitectos_setup()
{
load_theme_textdomain( 'uvarquitectos', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 
	'main-menu' => __( 'Top Menu', 'uvarquitectos' ),
	'footer-menu' => __( 'Footer Menu', 'uvarquitectos' )
	)
);
}
add_action( 'wp_enqueue_scripts', 'uvarquitectos_load_scripts' );
function uvarquitectos_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'uvarquitectos_enqueue_comment_reply_script' );
function uvarquitectos_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'uvarquitectos_title' );
function uvarquitectos_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'uvarquitectos_filter_wp_title' );
function uvarquitectos_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'uvarquitectos_widgets_init' );
function uvarquitectos_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'uvarquitectos' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'uvarquitectos_comments_number' );
function uvarquitectos_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

// Get page content based on its slug
function load_custom_page($pagename) {

    // First we set up an empty variable to be populated during the loop
    $page_content = '';

    // Query arguments, append as many as needed
    $args = array(
        'pagename'          => $pagename,
        'posts_per_page'    => 1  // Get only one post, avoid the case of repeated pages
    );

    // Store the query into a variable
    $main_image_query = new WP_Query( $args );

    // If the query is not empty
    if ( $main_image_query->have_posts() ) :

        // For every post that the query returned apply the following functions (only one in this case)
        while ( $main_image_query->have_posts() ) :

            $main_image_query->the_post();

            $page_content = the_content();

        endwhile;

    endif;

    // Finally reset post data to avoid interfering with any other loop
    wp_reset_postdata();

    // Return post content WP Formatted
    return $page_content;
}


// Load functions

function redirect_to_specific_page() {
  if ( ! is_user_logged_in() ) {
    wp_redirect( 'proximamente.html' ); 
    exit;
  }
}

function uva_scripts() {

    wp_register_script('mainjs', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0');
    wp_enqueue_script('mainjs');
}


// Load stylesheets
function uva_styles() {
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');

    wp_enqueue_style('main');
}

/*------ Actions + Filters + ShortCodes ------*/

// Add Actions
add_action( 'wp_enqueue_scripts', 'uva_styles' );
add_action( 'wp_enqueue_scripts', 'uva_scripts' );
add_action( 'template_redirect', 'redirect_to_specific_page' );

// Add Filters
add_filter('show_admin_bar', '__return_false');