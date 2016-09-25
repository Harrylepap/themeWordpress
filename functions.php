<?php
/* Get asset content */
function ngo_get_assets(){
	return esc_url(get_template_directory_uri() . "/assets");
}

/* XSS Clean */

/** ngo_xss_clean :
 * Clean except a , br, div, p ,em
 */
function ngo_xss_clean_all($custom_content) {
  $custom_content = str_replace(']]>', ']]$gt;', $custom_content);
  
  $allowed_html = array();

  return wp_kses( $custom_content, $allowed_html );
}

/** ngo_xss_clean :
 * Clean except a , br, div, p ,em
 */
function ngo_xss_clean($custom_content) {
  $custom_content = str_replace(']]>', ']]$gt;', $custom_content);
  
  $allowed_html = array(
      'a' => array(
          'href' => array(),
          'title' => array()
      ),
      'br' => array(),
      'div' => array(),
      'p' => array(),
      'em' => array(),
      'strong' => array(),
  );

  return wp_kses( $custom_content, $allowed_html );
}

/** 
 Replaces double line-breaks with paragraph elements
  return a formatted HTML
*/
function ngo_format_html($content) {
  // wpautop : Replaces double line-breaks with paragraph elements
  //return wpautop($content) ;
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]$gt;', $content);
  return $content;
}

/* 
  Get al pages using team template  (page using portfolio-team.php template)
*/
function ngo_get_team_pages(){
  $all_pages = get_pages();
  $team_pages = array();
  
  foreach($all_pages as $page) {
    // Get the page template post meta
    $page_template = get_post_meta( $page->ID, '_wp_page_template', true );
    // If the current page uses our specific
    // template, then output our custom metabox
   //echo $page_template;
    if ( 'page-templates/portfolio-team.php' == $page_template ) {
        $team_pages[] = $page;
      
     // echo ngo_get_post_featured_image($page) ;
    }
  }
  
//  echo( count($team_pages) );
  // return count($team_pages).'';
	$team_pages = array_reverse($team_pages);
  return $team_pages;
  
}

/* Get featured image of a post */
function ngo_get_post_featured_image($post){
   // Get featured image of a post
    $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-post-thumbnail' );
    return $image[0] ;
}

/* Get page/post links */
function hh_get_post_link($post){
//  return get_page_link($post->ID);
  return get_permalink($post->ID);
}
/* Get page/post ID content */
function hh_get_post_content($post){
//  $content_post = get_post($postID);
  $content = $post->post_content;
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]$gt;', $content);
  return $content;
}

/* Get page/post excerpt (few words of content) */
function hh_get_post_excerpt($post, $length = 90){
//  $content_post = get_post($postID);
  // get 190 words excerpt
//  $excerpt = get_excerpt(190);
//  $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID) );
//  $excerpt = $post->post_excerpt;
  /*global $post;
  $save_post = $post;
  $post = $post_to_get;
  $excerpt = get_the_excerpt();
  $post =  $save_post;*/
//  $excerpt = str_replace(']]>', ']]$gt;', $excerpt);
  $excerpt = hh_get_post_content( $post );
  $excerpt = ngo_xss_clean_all($excerpt);
  $excerpt = substr($excerpt , 0 , $length);
  $excerpt = str_replace(']]>', ']]$gt;', $excerpt).'...';
  return $excerpt;
}
/* Get page/post excerpt (few words of content) */
function hh_substr_first($content, $length = 20){
  $content = substr($content , 0 , $length);
  $content = str_replace(']]>', ']]$gt;', $content).'...';
  return $content;
}

/* Get page/post excerpt (few words of content) */
function hh_the_excerpt($length = 55){
$content = apply_filters( 'the_excerpt', get_the_excerpt() );
  $content = ngo_xss_clean_all($content);
  $content = substr($content , 0 , $length);
$excerpt = $content;
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, $length);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  echo $content.' ...';
  //  return $content;
}
/**
 * Prints HTML with date information for current post.
 *
 * Create your own hh_entry_date() function to override in a child theme.
 *
 */
function hh_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span>%2$s</span>',
		_x( 'Posted on', 'Used before publish date.', 'tfm' ),
		// esc_url( get_permalink() ),
		$time_string
	);
}



/* 
  Check if a page/post is a home page
*/
function hh_is_homepage($pageID){
    // Get the page template post meta
//    $page_template = get_post_meta( $page->ID, '_wp_page_template', true );
    $page_template = get_post_meta( $pageID, '_wp_page_template', true );
    // If the current page uses our specific
    // template, then return true
    if ( 'page-templates/home.php' == $page_template ) {
//		echo 'true';
        return true;
    }
//	echo 'false';
	return false;
  
}

/* Allow SCG Files to be uploaded */
function hh_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'hh_mime_types');


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function hh_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'hh_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function hh_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'hh_post_thumbnail_sizes_attr', 10 , 3 );

/* Load CS framework and its customization */
require_once get_template_directory() . '/cs-framework/cs-framework.php';
require get_template_directory() . '/inc/cs-customizer.php';


/* Enable / Diseable mods */
define( 'CS_ACTIVE_FRAMEWORK',  true  ); // activate framework
define( 'CS_ACTIVE_METABOX',    false ); // deactivate metabox
define( 'CS_ACTIVE_SHORTCODE',  false ); // deactivate shortcode
define( 'CS_ACTIVE_CUSTOMIZE',  false ); // activate customizer


/** 
 * 
 *
 *
 */

if ( ! function_exists( 'ngotheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own ngotheme_setup() function to override in a child theme.
 *
 * @since version 1.0
 */
function ngotheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'ngotheme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ngotheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ngotheme' ),
		'social'  => __( 'Social Links Menu', 'ngotheme' ),
		'footer'  => __( 'Footer Menu', 'ngotheme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	
	
}
endif; // ngotheme_setup
add_action( 'after_setup_theme', 'ngotheme_setup' );

/* hook primary menu to check anchor links */

/* Add search box */
/*add_filter('wp_nav_menu_items','search_box_function', 10, 2);
function search_box_function( $nav, $args ) {
	//var_dump($nav);
    if( $args->theme_location == 'primary' )
        return $nav."<li class='menu-header-search'><form action='http://example.com/' id='searchform' method='get'><input type='text' name='s' id='s' placeholder='Search'></form></li>";

    return $nav;
}*/

/* Test walker */
class Primary_Menu_Walker extends Walker_Nav_Menu {
// add classes to ul sub-menus
function start_lvl( &$output, $depth ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  
// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
	$has_child = "";
	if( $args->theme_location == 'primary' ) {
		if(hh_is_homepage($item->object_id)){
			// class="menu-item-has-children"
			$has_child = 'menu-item-has-children';
		}
	}
    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . ' ' .$has_child.'">';
   
   
    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );
  
   
    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
   
   // THE MOST IMPORTANT PART : Add submenu to home page template
   if( $args->theme_location == 'primary' ) {
        if(hh_is_homepage($item->object_id)){
          // Home section
          $home_anchor_id = "top";
          $home_title = "Home";
          
          // About section
          $about_anchor_id = "about";
          $about_title = "About";
          if(cs_get_option('about_anchor_id') ){
            $about_anchor_id = cs_get_option('about_anchor_id');
          }
          if(cs_get_option('about_rightsidebar_title') ){
            $about_title = cs_get_option('about_rightsidebar_title');
          }
          
          // Team section
          $team_anchor_id = "team";
          $team_title = "Team";
          if(cs_get_option('team_anchor_id') ){
            $team_anchor_id = cs_get_option('team_anchor_id');
          }
          if(cs_get_option('team_rightsidebar_title') ){
            $team_title = cs_get_option('team_rightsidebar_title');
          }
          
          // Leadership section
          $leadership_anchor_id = "leadership";
          $leadership_title = "Leadership";
          if(cs_get_option('leadership_anchor_id') ){
            $leadership_anchor_id = cs_get_option('leadership_anchor_id');
          }
          if(cs_get_option('leadership_rightsidebar_title') ){
            $leadership_title = cs_get_option('leadership_rightsidebar_title');
          }
			
          // Partners Section
          $partners_anchor_id = "partners";
          $partners_title = "Parnters";
          if(cs_get_option('partners_anchor_id') ){
            $$partners_anchor_id = cs_get_option('partners_anchor_id');
          }
          if(cs_get_option('partners_rightsidebar_title') ){
            $partners_title = cs_get_option('partners_rightsidebar_title');
          }
			
          // Gallery Section
          $gallery_anchor_id = "gallery";
          $gallery_title = "Gallery";
          if(cs_get_option('gallery_anchor_id') ){
            $gallery_anchor_id = cs_get_option('gallery_anchor_id');
          }
          if(cs_get_option('gallery_rightsidebar_title') ){
            $gallery_title = cs_get_option('gallery_rightsidebar_title');
          }
          
          
          
          
          
			$output .= '<ul class="sub-menu">';
            if(!cs_get_option('home_hide_home')){
              $output .= '<li><a href="'.get_site_url().'#'.$home_anchor_id.'">'.$home_title.'</a></li>';
            }
            if(!cs_get_option('home_hide_about')){
              $output .= '<li><a href="'.get_site_url().'#'.$about_anchor_id.'">'.$about_title.'</a></li>';
            }
            if(!cs_get_option('home_hide_team')){
              $output .= '<li><a href="'.get_site_url().'#'.$team_anchor_id.'">'.$team_title.'</a></li>';
            }
            if(!cs_get_option('home_hide_leadership')){
              $output .= '<li><a href="'.get_site_url().'#'.$leadership_anchor_id.'">'.$leadership_title.'</a></li>';
            }
            if(!cs_get_option('home_hide_partners')){
              $output .= '<li><a href="'.get_site_url().'#'.$partners_anchor_id.'">'.$partners_title.'</a></li>';
            }
            if(!cs_get_option('home_hide_gallery')){
              $output .= '<li><a href="'.get_site_url().'#'.$gallery_anchor_id.'">'.$gallery_title.'</a></li>';
            }
            
			$output .= '</ul>';
        }
  
   }
   
}
  
}

/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/customizer.php';


