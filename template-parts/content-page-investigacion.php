<?php /* Template Name: reportajegrafico */ ?>


<?php
get_header();
?>


<?php
$args = array(
    'post_type'      => 'publicidad',
    'posts_per_page' => 2,
);


$query = new WP_Query($args);

if ($query->have_posts()) :
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            while ($query->have_posts()) : $query->the_post();
            ?>
                <div class="col-md-6 publicidad_ppal">
                    <div class="triangle-container">
                        <div class="triangle"></div>
                        <div class="image-container">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php
                               
                                $excerpt = get_the_excerpt();
                                ?>
                                <a href="<?php echo esc_url($excerpt); ?>" >
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="image">
                                </a>
                            <?php else : ?>
                                <!-- Si no hay imagen destacada, puedes colocar un marcador de posición o dejarlo en blanco -->
                                <img src="ruta_de_la_imagen_de_placeholder" alt="Placeholder" class="image">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php
    wp_reset_postdata(); // Restablecer los datos del post al original
endif;
?>

<!-- News With Sidebar Start -->
<?php
    // Obtener la URL del post actual
    $current_post_url = get_permalink();

    // Enlaces a las redes sociales con la URL del post actual
    ?>
<div class="container-fluid ">
        <div class="container" id="individualNews">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                    <h2 class="mb-3"><?php the_title ( );?></h2>
                    <?php if (has_excerpt()) : ?>
                    <p class="mb-3"> <?php the_excerpt(); ?></p>
                    <?php endif; ?>
                    <?php $thumbnail_url = get_the_post_thumbnail_url(); ?>
                        <img class="img-fluid w-100" src="<?php echo esc_url($thumbnail_url); ?>" style="object-fit: cover;">
                  
                        <div class="d-flex justify-content-end align-items-center">
                        <p class="mt-2 small"><?the_post_thumbnail_caption()?></p>
               
                    </div>
                   
  <div class="container-fluid">
      <div class="row">
        <div class="col text-center">
            <hr class="gradient-line">
               </div>
      </div>
  </div>



    <div class="container">
  <div class="row">
    <div class="col-md-6">
      <!-- Contenido de la primera columna -->
      <h4 class=" font-weight-bold "><?php the_author(); ?></h4>
      <a id="categoryNews">
                                        <?php $categories = get_the_category();
                                if ($categories) {
                                echo '<span class="category-name small">' . $categories[0]->name . '</span>';
                                } ?></a> 
                                <span class="px-1">/</span>
                                <span class="small"><?php the_date ( );?></span>
    </div>
    <div class="col-md-6">
    <div class="row contenedor_compartir">
    <p class="boton_compartir font-weight-bold ">COMPARTIR</p>
    </div>
      <!-- Contenido de la segunda columna -->
      <div class="contenedor_redes">
      <a class="btn text-black btn-floating "  href="https://web.facebook.com/sharer/sharer.php?u=<?php echo esc_url($current_post_url); ?>" target="_blank" role="button"><i class="fab fa-facebook-f"></i></a>
        <a class="btn text-black btn-floating "  href="https://twitter.com/intent/tweet?url=<?php echo esc_url($current_post_url); ?>" target="_blank" role="button"><i class="fab fa-twitter"></i></a>
        <a class="btn text-black  btn-floating "  href="https://wa.me/?text=<?php echo urlencode($current_post_url); ?>" target="_blank" role="button"><i class="fab fa-whatsapp"></i></a>
        
    </div>
           
    </div>
  </div>
</div>
                        <div class="position-relative">
                        <br>  
                            <div>
                                      <p><?php the_content(  );?></p>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                <section class="indiviaul-right-bar">
  
                       <div class="pb-3">
                          
 <?php
// Consulta para obtener las dos últimas publicidades
$args_publicidad = array(
    'post_type'      => 'publicidad',
    'posts_per_page' => 1, // Obtener solo 1 publicidad
    'offset'         => 3, // Saltar la primera publicidad
);

$query_publicidad = new WP_Query($args_publicidad);

if ($query_publicidad->have_posts()) :
    while ($query_publicidad->have_posts()) : $query_publicidad->the_post();
        ?>
        <div id="carouselPublicidad" class="item-publicidad">
        <?php $excerpt = get_the_excerpt();?>
            <a href="<?php echo esc_url($excerpt); ?>" class="d-block w-100" target="_blank">
                <img class="d-block w-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            </a>
        </div>
        <br>
        <?php
    endwhile;
    wp_reset_postdata(); // Restablecer los datos del post al original
endif;
?>
</div>

<!-- Popular News Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Noticias</h3>
    </div>
                     
    <?php wp_reset_postdata(); ?>
<?php
$current_post_id = get_the_ID(); // Obtiene el ID del post actual
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'post__not_in' => array($current_post_id) // Excluye el post actual
);
$query = new WP_Query($args);
?>
<?php
// Inicia el bucle de WordPress para mostrar las noticias
while ($query->have_posts()) :
    $query->the_post();
?>
    <div class="d-flex mb-3">
        <img src="<?php the_post_thumbnail_url(); ?>" style="width: 100px; height: 100px; object-fit: cover;">
        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
            <div class="mb-1" style="font-size: 13px;">
                <?php $category = get_the_category(); ?>
                <a class="" href="<?php echo get_category_link($category[0]->term_id); ?>" style="color: black; text-decoration: none;">
                    <?php echo $category[0]->cat_name; ?>
                </a>
            </div>
            <a class="h6 m-0" style="color: black; text-decoration: none;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
    </div>
<?php endwhile; ?>

</div>
</section>
</div>
</div>
</div>
<section class="py-1 ">
  <div class="container">
      <div class="row">
        <div class="col text-center">
            <hr class="gradient-line">
         </div>
      </div>
  </div>
</section> 
<div class="container titulo-section mb-5">
<h4>Otras investigaciones</h4>
</div>
<?php wp_reset_postdata();
$current_post_id = get_the_ID();?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'category_name' => 'investigacion',
    'post__not_in' => array($current_post_id)
);
$query = new WP_Query( $args );
?>
 
  <section class="container mt-4">
    <div class="row">
        <?php
        // Comprobar si hay posts
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php
                        // Obtener la URL de la imagen destacada (si está configurada)
                        $thumbnail_url = get_the_post_thumbnail_url();

                        if ($thumbnail_url) :
                        ?>
                            <img src="<?php echo esc_url($thumbnail_url); ?>" class="card-img-top-videos" alt="<?php the_title(); ?>">
                        <?php endif; ?>

                        <div class="card-videos">
                        <h5 class="card-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                           
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        else :
            ?>
            <p>No hay posts disponibles en esta categoría.</p>
        <?php
        endif;
        ?>
    </div>
</section>

<?php
get_footer();
?>
