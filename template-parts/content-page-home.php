<?php /* Template Name: home */ ?>
<?php
// Get the theme directory URI
$theme_dir = get_template_directory_uri();
?>

<?php
	get_header( );
	?>
<?php
$args = array(
    'post_type' => 'publicidad',
    'posts_per_page' => 3
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    // advance the post pointer to the second post
  
?>
<section class="noticiasMedellinCarousel">
    <!-- Carrusel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            // Output carousel indicators dynamically
            for ($i = 0; $i < $query->post_count; $i++) {
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"';
                echo ($i == 0) ? ' class="active"></li>' : '></li>';
            }
            ?>
        </ol>

        <div class="carousel-inner mainCarrusel" role="listbox">
            <?php
            // Output carousel items dynamically
            for ($i = 0; $query->have_posts(); $i++) {
                $query->the_post();
            ?>
                <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''; ?> imgMainCarusel">
                    <img class="d-block w-100 " src="<?php the_post_thumbnail_url(); ?>" loading="lazy" alt="Imagen <?php echo $i + 1; ?>" />
                    <div class="carousel-caption">
                        <a id="tituloFecha">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                echo '<span class="category-name">' . $categories[0]->name . '</span>';
                            }
                            ?>
                        </a> <br>
                        <a id="titulo" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <br>
                    </div>
                </div>
            <?php } ?>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
</section>

<?php endif;
wp_reset_postdata(); // Restablece los datos del post al original
?>

<h1>hola <?php the_field('publicidad'); ?> </h1>
<p>hola <?php the_field('publicidad'); ?></p>

<?php
get_footer( );
?>