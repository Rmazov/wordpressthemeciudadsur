<?php 




    function wpbootstrap_enqueue_styles() {
        wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/styles30.css' );
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap', array(), null );
        wp_enqueue_style( 'google-fonts2', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', array(), null );
        wp_enqueue_style("fontA","https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css",array(),"5-1",'all');

    }
        add_action('wp_enqueue_scripts', 'wpbootstrap_enqueue_styles');
  


function agregar_carousel_js() {
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '4.3.1', true );
   
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true );

  

 
}

  
  add_action('wp_enqueue_scripts', 'agregar_carousel_js');
  



function plz_analytics(){
    ?>
    
    <?php
}

add_action("wp_body_open","plz_analytics");


function theme_supports(){
    add_theme_support('title-tag');
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    add_theme_support('post-thumbnails');
 
    add_theme_support('custom-logo',
    array(
        "width" => 10,
        "height" => 10,
      
    )
    
    );
    
}

add_action("after_setup_theme","theme_supports");

function plz_add_menus(){
    register_nav_menus(
        array(
        'menu-principal' => "Menu principal",
        'menu-responsive' => "Menu responsive"
        )
    );
}

add_action("after_setup_theme", "plz_add_menus");


function ricardo_sidebar(){
    register_sidebar(  
    array(
        'name'=> 'sidebar',
        'id'=> 'sidebar1',
        'before_title'=> '',
        'after_title'=> '',
        'before_widget'=> 'hola',
        'after_widget'=> ''

        )
    );
}
    
add_action("widgets_init", "ricardo_sidebar");
function share_post_info() {
  if (is_single()) {
    $post = get_post();
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $excerpt = apply_filters('the_excerpt', $post->post_excerpt); // Obtén el excerpt del post

    echo '<meta property="og:url" content="' . get_permalink($post->ID) . '">';
    echo '<meta property="og:type" content="article">';
    echo '<meta property="og:title" content="' . $post->post_title . '">';
    echo '<meta property="og:description" content="' . esc_html($excerpt) . '">';
    echo '<meta property="og:image" content="' . $featured_image[0] . '">';
  }
}

add_action('wp_head', 'share_post_info');


// Register Custom Post Type
function publicidad() {
	$labels = array(
		// ... (tus etiquetas actuales)
	);

	$args = array(
		'label'                 => __( 'publicidad', 'publicidad' ),
		'description'           => __( 'publicidad', 'publicidad' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail','excerpt'  ),
		'taxonomies'            => array( 'publicidad' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'publicidad', $args );


}
add_action( 'init', 'publicidad', 0 );




// Cambiar la plantilla de un post específico basado en la categoría "reportajes-graficos"
function custom_single_template_repo($single_template) {
    global $post;

    // Verifica si el post tiene la categoría "reportajes-graficos"
    if (has_category('reportajes-graficos', $post)) {
        $new_template = locate_template(array('template-parts/content-page-reportajes-graficos.php'));

        if (!empty($new_template)) {
            return $new_template;
        }
    }

    return $single_template;
}

add_filter('single_template', 'custom_single_template_repo');

function custom_single_template_investigacion($single_template) {
    global $post;

    // Verifica si el post tiene la categoría "reportajes-graficos"
    if (has_category('investigacion', $post)) {
        $new_template = locate_template(array('template-parts/content-page-investigacion.php'));

        if (!empty($new_template)) {
            return $new_template;
        }
    }

    return $single_template;
}

add_filter('single_template', 'custom_single_template_investigacion');

function custom_single_template_cronicas($single_template) {
    global $post;

    // Verifica si el post tiene la categoría "reportajes-graficos"
    if (has_category('cronicas-y-reportajes', $post)) {
        $new_template = locate_template(array('template-parts/content-page-cronicas.php'));

        if (!empty($new_template)) {
            return $new_template;
        }
    }

    return $single_template;
}

add_filter('single_template', 'custom_single_template_cronicas');


// Cambiar la plantilla de un post específico basado en la categoría "videos"
function custom_single_template($single_template) {
    global $post;

    // Verifica si el post tiene la categoría "videos"
    if (has_category('videos', $post)) {
        $new_template = locate_template(array('template-parts/content-page-multimedia.php'));

        if (!empty($new_template)) {
            return $new_template;
        }
    }

    return $single_template;
}

add_filter('single_template', 'custom_single_template');
?>
