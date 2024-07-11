<?php /* Template Name: multimedia */ ?>


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
<?php
while (have_posts()) : the_post();
    // Obtener la URL del post actual
    $current_post_url = get_permalink();
    ?>
      <br>
      <br>
      <br>
    <div class="container contenedor-videos mt-4">
        <h2 class="mb-3 titulo-videos"><?php the_title(); ?></h2>

        <h4><?php the_excerpt(); ?></h4>
 
<br>
        <!-- Contenido del post -->
        <div class="content-fluid">
            <?php the_content(); ?>
            
    <div class="content d-flex">
    <!-- Icono de Facebook -->
    <p class=" btn text-black btn-floating mr-2 font-weight-bold ">COMPARTIR</p>
    <a class="btn text-black btn-floating mr-2" href="https://web.facebook.com/sharer/sharer.php?u=<?php echo esc_url($current_post_url); ?>" target="_blank" role="button"><i class="fab fa-facebook-f"></i></a>
    <!-- Icono de Twitter -->
    <a class="btn text-black btn-floating mr-2" href="https://twitter.com/intent/tweet?url=<?php echo esc_url($current_post_url); ?>" target="_blank" role="button"><i class="fab fa-twitter"></i></a>
    <!-- Icono de WhatsApp -->
    <a class="btn text-black btn-floating mr-2" href="https://wa.me/?text=<?php echo urlencode($current_post_url); ?>" target="_blank" role="button"><i class="fab fa-whatsapp"></i></a>
</div>
        </div>
        
        </div>
    
<?php
endwhile;
?>

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
<h4>Te Podría Gustar</h4>
</div>
<?php wp_reset_postdata();
$current_post_id = get_the_ID();?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'category_name' => 'videos',
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

