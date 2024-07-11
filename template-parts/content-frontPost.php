<?php
$args = array(
    'post_type' => 'post',
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

  <section class="py-2 ">
  <div class="container">
      <div class="row">
        <div class="col text-center">
            <hr class="gradient-line">
               </div>
      </div>
  </div>
</section> 

 <!-- Content here 
<div class="container">
 

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active carruselPublicidad">
    <a href="https://www.metropol.gov.co/futuro-sostenible-2020-2023-rendicion-de-cuentas" class="d-block w-100" target="_blank">
      <img class="imgPublicidad" src="http://ciudadsur.co/wp-content/uploads/2023/11/728_90_CAVR.jpg" alt="metropol">
      </a>
    </div>
    <div class="carousel-item carruselPublicidad">
    <a href="https://www.metropol.gov.co/futuro-sostenible-2020-2023-rendicion-de-cuentas" class="d-block w-100" target="_blank">
                <img src="http://ciudadsur.co/wp-content/uploads/2023/11/728_90_Ruido.jpg" alt="metropol">
            </a>
    </div>
    </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="triangle-container">
                <div class="triangle"></div>
                <div class="image-container">
                      <a href="https://www.youtube.com/@PERIODICOCIUDADSUR">
                    <img src="https://ciudadsur.co/wp-content/uploads/2023/11/BANNER2_Mesa-de-trabajo-1.png" alt="Imagen 1" class="image">
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="triangle-container">
                <div class="triangle"></div>
                <div class="image-container">
                    <a href="https://www.youtube.com/@PERIODICOCIUDADSUR">
                    <img src="http://ciudadsur.co/wp-content/uploads/2023/11/BANNER1_Mesa-de-trabajo-1.png" alt="Imagen 2" class="image">
                    </div>
                    </a>
            </div>
        </div>
    </div>
</div>
-->
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
                <div class="col-md-6">
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
<section class="py-1 ">
  <div class="container">
      <div class="row">
        <div class="col text-center">
            <hr class="gradient-line">
         </div>
      </div>
  </div>
</section> 

<?php
$args = array(
  'post_type'      => 'post',
  'posts_per_page' => 6,
  'offset'         => 3,  // Omitir los dos primeros elementos
);

$query = new WP_Query($args);

if ($query->have_posts()) :
?>

<section class="container noticias">

    <?php for ($i = 0; $query->have_posts(); $i++) : $query->the_post(); ?>
    
    <?php if ($i % 3 === 0) : // Abre una nueva fila cada tres tarjetas ?>
    <div class="row">
    <?php endif; ?>

        <div class="col-md-4 mb-4">
            <div class="card position-relative overflow-hidden">
                <div class="image-noticias">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-img-overlay d-flex align-items-end w-100">
                    <h5 class="noticiasTitulo text-white mb-0"><a id="h5-landing" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                </div>
            </div>
        </div>

    <?php if (($i + 1) % 3 === 0 || $i === $query->post_count - 1) : // Cierra la fila cada tres tarjetas o en la última tarjeta ?>
    </div>
    <?php endif; ?>

    <?php endfor; ?>

</section>

<?php endif;
wp_reset_postdata(); // Restablece los datos del post al original
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

  
  
<section class="container-fluid my-sm-5 pl-sm-5 pr-sm-5 pb-sm-5 mt-5 "> 
  <div class="row">
  <div class="container-fluid imagen_ediciones col-sm-12 col-md-4">
    <?php
    // Consulta para obtener las dos últimas publicidades
   $args_publicidad = array(
        'post_type'      => 'publicidad',
        'posts_per_page' => 4,
        'offset'         => 2,
    );

    $query_publicidad = new WP_Query($args_publicidad);

    if ($query_publicidad->have_posts()) :
        while ($query_publicidad->have_posts()) : $query_publicidad->the_post();
    ?>
            <div class="item-publicidad">
                   <?php $excerpt = get_the_excerpt(); ?>
                               
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
   
    <?php wp_reset_postdata();?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'category_name' => 'cronicas-y-reportajes'
);
$query = new WP_Query( $args );
?>
  <?php $query->the_post();?>

    <div class="categorias col-sm-12  col-md-8  ">
      <div class="row">
        <div class="col-md-8 mb-3 mb-md-3">
        <div id="carrucelEdiciones" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carrucelEdiciones" data-slide-to="0" class="active"></li>
    <li data-target="#carrucelEdiciones" data-slide-to="1"></li>
    <li data-target="#carrucelEdiciones" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner ediconesCarrusel" role="listbox">
  
    <div class="carousel-item active edicionesItemImg" >

      <img class="img-fluid " src="<?php the_post_thumbnail_url(  );?>" alt="Noticias Cronicas y reportajes" >
      <div class="carousel-caption1">
            <a id="tituloFecha">
            <?php $categories = get_the_category();
                    if ($categories) {
                    echo '<span class="category-name1">' . $categories[0]->name . '</span>';
                    } ?></a> <br>
                <a  id="titulo1" href="<?php the_permalink();?>"><?php the_title(  )?></a>
                  <br>
                  <a id="tituloFecha" href=""><?php the_date( );?></a>
         </div>
    </div>
    <?php $query->the_post();?>
    
    <div class="carousel-item edicionesItemImg">
      <img class="img-fluid" src="<?php the_post_thumbnail_url(  );?>" alt="Noticias Cronicas y reportajes" >
      <div class="carousel-caption1">
            <a id="tituloFecha">
            <?php $categories = get_the_category();
                    if ($categories) {
                    echo '<span class="category-name1">' . $categories[0]->name . '</span>';
                    } ?></a> <br>
                <a id="titulo1" href="<?php the_permalink();?>"><?php the_title(  )?></a>
                  <br>
                  <a id="tituloFecha" href=""><?php the_date( );?></a>
         </div>
    </div>
    <?php $query->the_post();?>

    <div class="carousel-item edicionesItemImg">
      <img class="img-fluid" src="<?php the_post_thumbnail_url(  );?>" alt="Noticias Cronicas y reportajes" >
      <div class="carousel-caption1">
            <a id="tituloFecha">
            <?php $categories = get_the_category();
                    if ($categories) {
                    echo '<span class="category-name1">' . $categories[0]->name . '</span>';
                    } ?></a> <br>
                <a id="titulo1" href="<?php the_permalink();?>"><?php the_title(  )?></a>
                  <br>
                  <a id="tituloFecha" href=""><?php the_date( );?></a>
         </div>
    </div>
  </div>
  <?php wp_reset_postdata();?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'category_name' => 'cultura'
);
$query = new WP_Query( $args );


?>
  <?php $query->the_post();?>
   
    <a class="carousel-control-prev" href="#carrucelEdiciones" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carrucelEdiciones" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
 </div>
 


        <div class="col-md-4 mb-2">
           <div class="card" >
            <img class="d-block w-100" src="<?php the_post_thumbnail_url(  );?>" alt="Noticias cultura" >
              <div class="card-body">
                    <h5 class="card-title">
                      <a id="categoria1">
                        <?php $categories = get_the_category();
                                if ($categories) {
                                echo '<span class="category-name1">' . $categories[0]->name . '</span>';
                                } ?></a> <br><br>
                            <a id="tituloDeportes" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h5>
        </div>
    </div>
 </div>
 <?php wp_reset_postdata();?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'category_name' => 'Deportes'
);
$query = new WP_Query( $args );
?>
  <?php $query->the_post();?>
    <div class="col-md-4 mt-4 mb-2 ">
        <div class="card" >
            <img class="img-fluid" src="<?php the_post_thumbnail_url(  );?>" alt="Noticias deportes" >
              <div class="card-body">
                    <h5 class="card-title">
                      <a id="categoria1">
                        <?php $categories = get_the_category();
                                if ($categories) {
                                echo '<span class="category-name1">' . $categories[0]->name . '</span>';
                                } ?></a> <br><br>
                            <a id="tituloDeportes" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h5>
        </div>
    </div>
 </div>
 <?php wp_reset_postdata();?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category_name' => 'politica'
);
$query = new WP_Query( $args );
?>
<?php $query->the_post();?>
        <div class="col-md-8 mt-4 mb-1 mb-md-3">
        <div id="carrucelEdiciones1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carrucelEdiciones1" data-slide-to="0" class="active"></li>
    <li data-target="#carrucelEdiciones1" data-slide-to="1"></li>
    
  </ol>
  <div class="carousel-inner ediconesCarrusel" role="listbox">
  
    <div class="carousel-item active edicionesItemImg" >

      <img class="img-fluid" src="<?php the_post_thumbnail_url(  );?>" alt="Noticias Politica" >
      <div class="carousel-caption1">
            <a id="tituloFecha">
            <?php $categories = get_the_category();
                    if ($categories) {
                    echo '<span class="category-name1">' . $categories[0]->name . '</span>';
                    } ?></a> <br>
                <a id="titulo1" href="<?php the_permalink();?>"><?php the_title(  )?></a>
                  <br>
                  <a id="tituloFecha" href=""><?php the_date( );?></a>
         </div>
    </div>
    <?php $query->the_post();?>
    
    <div class="carousel-item edicionesItemImg">
      <img class="img-fluid " src="<?php the_post_thumbnail_url(  );?>" alt="Noticias Politica" >
      <div class="carousel-caption1">
            <a id="tituloFecha">
            <?php $categories = get_the_category();
                    if ($categories) {
                    echo '<span class="category-name1">' . $categories[0]->name . '</span>';
                    } ?></a> <br>
                <a id="titulo1" href="<?php the_permalink();?>"><?php the_title(  )?></a>
                  <br>
                  <a id="tituloFecha" href=""><?php the_date( );?></a>
         </div>
    </div>

 
   
    <a class="carousel-control-prev" href="#carrucelEdiciones1" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carrucelEdiciones1" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
 </div>

        </div>
      </div>
    </div>
  </div>
</section>
<section class="py-2 ">
  <div class="container">
      <div class="row">
        <div class="col text-center">
            <hr class="gradient-line">
           
         </div>
      </div>
  </div>
</section> 
<div class="container titulo-section mb-5">
<h4>CIUDAD SUR PLAY</h4>
</div>

    <?php wp_reset_postdata();?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'category_name' => 'videos'
);
$query = new WP_Query( $args );
?>
  <?php $query->the_post();?>


    <div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-8">
      <div class="news-card">
        <div class="position-relative">
        <a href="<?php the_permalink();?>">
          <img src="<?php the_post_thumbnail_url(  );?>" class="card-img-top" alt="News Image">
         
          <i class="play-icon fas fa-play-circle"></i>
          <div class="news-categoria" style="font-size: 13px;">
                    <?php $category = get_the_category(); ?>
                    <a class="" href="<?php echo get_category_link($category[0]->term_id); ?>" style="color: white; text-decoration: none; font-size: 16px;">
                      <?php echo $category[0]->cat_name; ?>
                    </a>
                </div>
          <h5 class="news-title"><?php the_title(  )?></h5>
          </a>
        </div>
      
      </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4">
    <div class="news-section">
        <!-- Repeat this block for each news item -->
        <div class="news-card">
            <div class="news-card-body">
                <div class="row">
                    <div class="col-md-6">

                    <a href="<?php the_permalink();?>">
                    <img src="<?php the_post_thumbnail_url(  );?>" class="card-img-top1" alt="videos CiudadSur">
                    <i class="play-icon1 fas fa-play-circle"></i>
                </a>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-1" style="font-size: 13px;">
                    <?php $category = get_the_category(); ?>
                    <a class="" href="<?php echo get_category_link($category[0]->term_id); ?>" style="color: black; text-decoration: none;">
                      <?php echo $category[0]->cat_name; ?>
                    </a>
                </div>
                <a href="<?php the_permalink();?> " style="color: black; text-decoration: none;">
                        <h5  class="news-title1"><?php the_title(  )?></h5>
                        </a>
                    </div>
                </div>
                <?php $query->the_post();?>
                <div class="row mt-2">
                    <div class="col-md-6">
                      
                    <a href="<?php the_permalink();?>">
                    <img src="<?php the_post_thumbnail_url(  );?>" class="card-img-top1" alt="videos CiudadSur">
                    <i class="play-icon1 fas fa-play-circle"></i>
                </a>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-1" style="font-size: 13px;">
                    <?php $category = get_the_category(); ?>
                    <a class="" href="<?php echo get_category_link($category[0]->term_id); ?>" style="color: black; text-decoration: none;">
                      <?php echo $category[0]->cat_name; ?>
                    </a>
                     </div>
                    <a href="<?php the_permalink();?> " style="color: black; text-decoration: none;">
                        <h5  class="news-title1"><?php the_title(  )?></h5>
                        </a>
                    </div>
                </div>
                <?php $query->the_post();?>
                <div class="row mt-2">
                    <div class="col-md-6">
                    <a href="<?php the_permalink();?>">
                    <img src="<?php the_post_thumbnail_url(  );?>" class="card-img-top1" alt="videos CiudadSur">
                    <i class="play-icon1 fas fa-play-circle"></i>
                </a>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-1" style="font-size: 13px;">
                    <?php $category = get_the_category(); ?>
                    <a class="" href="<?php echo get_category_link($category[0]->term_id); ?>" style="color: black; text-decoration: none;">
                      <?php echo $category[0]->cat_name; ?>
                    </a>
                     </div>
                     <a href="<?php the_permalink();?>" style="color: black; text-decoration: none;">
                        <h5 class="news-title1"><?php the_title(  )?></h5>
                        </a>
                    </div>
                </div>
                <?php $query->the_post();?>
                <div class="row mt-2">
                    <div class="col-md-6">
                    <a href="<?php the_permalink();?>">
                    <img src="<?php the_post_thumbnail_url(  );?>" class="card-img-top1" alt="videos CiudadSur">
                    <i class="play-icon1 fas fa-play-circle"></i>
                </a>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-1" style="font-size: 13px;">
                    <?php $category = get_the_category(); ?>
                    <a class="" href="<?php echo get_category_link($category[0]->term_id); ?>" style="color: black; text-decoration: none;">
                      <?php echo $category[0]->cat_name; ?>
                    </a>
                     </div>
                     <a href="<?php the_permalink();?>" style="color: black; text-decoration: none;">
                        <h5 class="news-title1"><?php the_title(  )?></h5>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container titulo-section mb-5">
<h4>REPORTAJES GRÁFICOS</h4>
</div>
 

    <?php $args = array(
  'post_type' => 'post',
  'posts_per_page' => 4,
  'category_name' => 'reportajes-graficos'
);
$query = new WP_Query( $args );
?>
  <?php $query->the_post();?>
  

    
    <section class="container mt-5 mb-5">
  <div class="row">
    <!-- Columna 1 -->
    <div class="col-md-3 contenedor-rgrafico">
    <img class="img-fluid imagen-rgrafico " src="<?php the_post_thumbnail_url(  );?>" alt="Imagen 2" >
      <div class="contenido-columna">
      <a id="titulo-reportajes" href="<?php the_permalink();?>"><?php the_title(  )?></a>
      </div>
    </div>
    <?php $query->the_post();?>
    <!-- Columna 2 -->
    <div class="col-md-3 contenedor-rgrafico">
    <img class=" imagen-rgrafico " src="<?php the_post_thumbnail_url(  );?>" alt="Imagen 2" >
      <div class="contenido-columna">
      <a id="titulo-reportajes" href="<?php the_permalink();?>"><?php the_title(  )?></a>
      </div>
    </div>
    <?php $query->the_post();?>
    <!-- Columna 3 -->
    <div class="col-md-3 contenedor-rgrafico">
    <img class="imagen-rgrafico " src="<?php the_post_thumbnail_url(  );?>" alt="Imagen 2" >
      <div class="contenido-columna ">
      <a id="titulo-reportajes" href="<?php the_permalink();?>"><?php the_title(  )?></a>
      </div>
    </div>
    <?php $query->the_post();?>
    <!-- Columna 4 -->
    <div class="col-md-3 contenedor-rgrafico ">
    <img class=" imagen-rgrafico " src="<?php the_post_thumbnail_url(  );?>" alt="Imagen 2" >
      <div class="contenido-columna ">
      <a id="titulo-reportajes" href="<?php the_permalink();?>"><?php the_title(  )?></a>
      </div>
    </div>
  </div>
</section>
