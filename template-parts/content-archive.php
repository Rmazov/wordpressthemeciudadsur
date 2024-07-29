


<?php
// Obtener la categoría desde la URL
$category = get_queried_object();

// Verificar si se obtuvo la categoría con éxito
if ($category instanceof WP_Term) {
    $category_name = $category->name;
    $category_id = $category->term_id;
} else {
    $category_name = "Categoría no encontrada";
    $category_id = 0;
}?>

<?php
$args = array(
    'post_type'      => 'publicidad',
    'posts_per_page' => 2,
);


$query = new WP_Query($args);

if ($query->have_posts()) :
    ?>
   
    <div class="my-custom-container_play ">
        <div class="row">
            <?php
            while ($query->have_posts()) : $query->the_post();
            ?>
                <div class="col-md-6 publicidad_ppal">
                    <div class="triangle-container">
                        <div class="triangle"></div>
                        <div class="image-container">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php $excerpt = get_the_excerpt(); ?>
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

<section class="categoria-botones">
    <div class="container mt-4">
        <div class="row">
        <div class="col-md-6">
            

 <h2 class="h2_categoria"> <?php echo $category_name; ?></h2>
</div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
                
<div class="container mt-2">
                    <div class="row">
                    <div class="col-md-6">
                    <a href="https://ciudadsur.co/index.php/category/itaguei/" class="btn btn-white btn-sm custom-button">Itagui</a>
<a href="https://ciudadsur.co/index.php/category/envigado/" class="btn btn-white btn-sm custom-button">Envigado</a>
<a href="https://ciudadsur.co/index.php/category/sabaneta/" class="btn btn-white btn-sm custom-button">Sabaneta</a>
<a href="https://ciudadsur.co/index.php/category/medellin/" class="btn btn-white btn-sm custom-button">Medellin</a>
<a href="https://ciudadsur.co/index.php/category/caldas/" class="btn btn-white btn-sm custom-button">Caldas</a>
<a href="https://ciudadsur.co/index.php/category/la-estrella/" class="btn btn-white btn-sm custom-button">La Estrella</a>
            </div>
                
                        <div class="col-md-6">
                        
                        </div>
                    </div>
                </div>
    </section>
    
<?php
if ($category->slug === 'itaguei') {
    $category_name = 'itaguei';
}

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category_name' => $category_name
);
$query = new WP_Query( $args );
$query->the_post();
?>

<section class=" category-main">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 contenedor-category p-0">
                <div class="card img-category">
                    <img class="d-block w-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(  )?>">
                    <div class="card-body titulo-category">
                        <a id="category-titulo" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
            </div>
            <?php $query->the_post(); ?>
            <div class="col-md-6 contenedor-category p-0">
                <div class="card img-category">
                    <img class="d-block w-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(  )?>">
                    <div class="card-body titulo-category">
                        <a id="category-titulo" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_reset_postdata();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<section class=" my-custom-container category-section">
<?php

$args = array(
    'category_name' =>  $category_name, // Reemplaza 'envigado' con el slug de tu categoría
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => $paged,
);

$query = new WP_Query($args);
if ($query->have_posts()) :
    echo '<div class="container-fluid post-category">';
   
    $query->the_post();
    $query->the_post();
    while ($query->have_posts()) : $query->the_post();
    echo '<div class="row mt-5 " id="contenedor-category">';
    echo '<div class="col-md-3 col-4">'; // Columna para el contenido
                    // Obtener el ID de la imagen destacada
                    $image_id = get_post_thumbnail_id();

                    // Obtener la URL de la imagen
                    $image_url = wp_get_attachment_url($image_id);

                    // Mostrar la imagen
    echo '<img src="' . $image_url . '" alt=".." id="imagen-category">';
    // Mostrar el título de la publicación

    echo '</div>';
    
    // Mostrar el extracto de la publicación
    echo '<div class="col-md-5 col-8 contenedor-publicacion">';

    echo '<h4 id="h4-category"> <a id="h4-category" href="' . get_permalink() . '">'. get_the_title() .'</a> </h4>';
    
    // Obtener la categoría o categorías de la publicación
    $categories = get_the_category();
    
    if (!empty($categories)) {
        echo '<div class="post-info">';
        echo '<a id="category_category"  href="' . get_permalink() . '">' . $categories[0]->name . '</a>';
        // Obtener la fecha de la publicación
        echo '<a class="post-date">' . get_the_date() . '</a>';
        echo '</div>';
    }
   
    echo '<h6 id="p-category">' . substr(get_the_excerpt(), 0, 130). '</h6> ';
  
    echo '</div>';
    // Columna vacía
    echo '</div>'; 
   // Agregar un margen inferior entre las entradas

    endwhile;
    wp_reset_postdata();
else :
    // Mensaje si no se encuentran posts en la categoría
    echo 'No se encontraron posts en esta categoría.';
endif;



    // Agregar paginación
    echo '<div class="pagination mb-3">';
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, $paged),
        'next_text' => '>>',
        'prev_text' => '<<', // Agrega un texto para el enlace "Anterior" si lo deseas
        'mid_size' => 2, // Cantidad de enlaces a mostrar antes y después del enlace actual
        'type' => 'list', // Muestra los enlaces como una lista no ordenada
        'end_size' => 1, // Cantidad de enlaces a mostrar al final de la paginación
    ));
    echo '</div>';
    
    ?>
    </section>
    <section class=" category-right-bar  mt-5">

                    
    <div class="pb-3 mt-5">
    <div id="carouselPublicidad" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php
            // Consulta para obtener las dos últimas publicidades
            $args_publicidad = array(
                'post_type'      => 'publicidad',
                'posts_per_page' => 2, // Obtener dos publicidades
                'offset'         => 2, // Saltar la primera publicidad
            );

            $query_publicidad = new WP_Query($args_publicidad);

            $active = 'active'; // Para la primera publicidad

            if ($query_publicidad->have_posts()) :
                while ($query_publicidad->have_posts()) : $query_publicidad->the_post();
            ?>

                    <div class="carousel-item item-publicidad <?php echo $active; ?>">
                    <?php $excerpt = get_the_excerpt(); ?>
                        <a href="<?php echo esc_url($excerpt); ?>" class="d-block w-100" target="_blank">
                            <img class="d-block w-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>

            <?php
                    $active = ''; // Desactivar la clase 'active' después de la primera publicidad
                endwhile;
                wp_reset_postdata(); // Restablecer los datos del post al original
            endif;
            ?>

            <!-- Agregar más elementos del carrusel aquí si es necesario -->

        </div>
        <a class="carousel-control-prev" href="#carouselPublicidad" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselPublicidad" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<!-- Ads End -->
            
<?php wp_reset_postdata(); ?>
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10
);
$query = new WP_Query($args);
?>

<!-- Popular News Start -->
<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Noticias</h3>
    </div>

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
                    <!-- <span class="px-1">/</span>
                    <span>fecha</span> -->
                </div>
                <a class="h6 m-0" style="color: black; text-decoration: none;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
        </div>
    <?php endwhile; ?>

</div>
   </section>
   </div>