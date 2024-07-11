<?php


get_header();





?>

<div class="container-fluid adverting_category">
<div class="row">
        <!-- Columna izquierda (8 columnas) -->
        <div class="col-md-6">
            <!-- Carrusel Bootstrap -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicadores del carrusel -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>
                
                <!-- Contenido del carrusel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="http://ciudadsur.local/wp-content/uploads/2023/09/baner-animales-free-01-01-728x90-1.jpg" alt="Imagen 1"class="img-fluid" >
                    </div>
                    <div class="carousel-item">
                        <img src="http://ciudadsur.local/wp-content/uploads/2023/09/banner-pauta-scaled-728x90-1.jpg" alt="Imagen 2" class="img-fluid">
                    </div>
                </div>
                
                <!-- Controles del carrusel -->
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
        
        <!-- Columna derecha (4 columnas) -->
        <div class="col-md-6">
           <img src="https://ciudadsur.ricardomazov.com/wp-content/uploads/2023/05/ciudadSurLogo.png"  class="logo_adverting img-fluid" alt="Logo">
    
        </div>
    </div>

<section class="categoria-botones">
    <div class="container mt-4">
        <div class="row">
        <div class="col-md-6">
 <h2 class="h2_categoria">Envigado</h2>
</div>
       
            <div class="col-md-6">
               
            </div>
        </div>
    </div>

                
                <div class="container mt-2">
                    <div class="row">
                    <div class="col-md-6">
                <button class="btn btn-white btn-sm custom-button">Itagui</button>
                <button class="btn btn-white btn-sm custom-button">Envigado</button>
                <button class="btn btn-white btn-sm custom-button">Sabaneta</button>
                <button class="btn btn-white btn-sm custom-button">Medellin</button>
                <button class="btn btn-white btn-sm custom-button">Caldas</button>
                <button class="btn btn-white btn-sm custom-button">La Estrella</button>
            </div>
                
                        <div class="col-md-6">
                        
                        </div>
                    </div>
                </div>
    </section>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category_name' => 'envigado'
);
$query = new WP_Query( $args );
$query->the_post();
?>
<section class="category-main">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 contenedor-category p-0">
                <div class="card img-category">
                    <img class="d-block w-100" src="<?php the_post_thumbnail_url(); ?>" alt="Imagen 1">
                    <div class="card-body titulo-category">
                        <a id="category-titulo" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
            </div>
            <?php $query->the_post(); ?>
            <div class="col-md-6 contenedor-category p-0">
                <div class="card img-category">
                    <img class="d-block w-100" src="<?php the_post_thumbnail_url(); ?>" alt="Imagen 1">
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
<section class="category-section">
<?php

$args = array(
    'category_name' => 'envigado', // Reemplaza 'envigado' con el slug de tu categoría
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
    <section class="category-right-bar">
    <div class="">
                       <!-- Social Follow Start -->
                       <div class="pb-3">
                           <div class="bg-light py-2 px-4 mb-3">
                               <h3 class="m-0">Redes Sociales</h3>
                           </div>
                           <div class="d-flex mb-3">
                           <div class="h-100 d-inline-flex align-items-center me-4">
    <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="#!"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <a
      class="btn text-white btn-floating m-1"
        style="background-color: #55acee;"
        href="#!"
        role="button"
        ><i class="fab fa-twitter"></i
      ></a>
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="#!"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;"
        href="#!"
        role="button"
        ><i class="fab fa-youtube"></i
      ></a>
             </div>
  </div>
                           
                       </div>
                       
                       <!-- Social Follow End -->
   
                       <!-- Newsletter Start -->
                    
                       <div class="pb-3">
                          
  
       <div id="carouselPublicidad" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item item-publicidad active">
              <img class="d-block w-100" src="http://ciudadsur.local/wp-content/uploads/2023/09/Plan-de-medios_Jose-Mejia-400x400-copia-400x400-1.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://ciudadsur.local/wp-content/uploads/2023/09/Plan-de-medios_Ruben-Benjumea-400x400-02-400x400-1.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="http://ciudadsur.local/wp-content/uploads/2023/09/Plan-de-medios_Jose-Mejia-400x400-copia-400x400-1.png" alt="Third slide">
            </div>
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
   




  <?php
get_footer();
?>