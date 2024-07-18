<!DOCTYPE html>
<html lang="en">
<?php
// Get the theme directory URI
$theme_dir = get_template_directory_uri();
?>
<head>
    <meta charset="utf-8">
    <title>CiudadSur-NuestrasHistorias</title>


    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="CiudadSur es un medio de comunicación digital que informa sobre los municipios de Itagüí, Envigado, Medellin Caldas, La Estrella,Sabaneta, en Colombia. Ofrece noticias, reportajes, galerías fotográficas y multimedia sobre temas de actualidad, cultura, deportes, entretenimiento y sociedad.">
    <meta content="Noticias Envigado" name="Envigado">
    <meta content="Noticas valle del aburra" name="Noticas Valle del Aburra">
    <meta content="Periodismo Independiente" name="Periodismo Independiente">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    
     <!-- Etiquetas Open Graph para Facebook -->
    <meta property="og:url" content="<?php echo get_permalink(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo get_the_title(); ?>" />
    <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />

    <!-- Twitter Card para Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ciudadsur_">
    <meta name="twitter:title" content="<?php echo get_the_title(); ?>">
    <meta name="twitter:description" content="<?php echo get_the_excerpt(); ?>">
    <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url(); ?>">

    <!-- Favicon -->
    <link rel="icon" href="http://ciudadsur.co/wp-content/uploads/2023/11/ciudadSurLogo.png" sizes="32x32">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+7yQO/1Dn7Mj9XgFj7YJhLr6V7zW5j5wLl1y5cF3tq2K9XfZt0iZtR5dVJmW8a1wJzCjRkL6mzC6iXvJhNq+ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <?php wp_head();?>

</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HLBK1YKLQG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HLBK1YKLQG');
</script>

<body>

<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
          <a class="navbar-brand" href="https://ciudadsur.co/">
            <img src="http://ciudadsur.co/wp-content/uploads/2023/11/ciudadSurLogo.png"   alt="LogoCiudadSur">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
  <li class="nav-item active dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
    Municipios
</a>



    <div class="dropdown-menu dropdown-column" aria-labelledby="navbarDropdown">
    <div class="row municipios-menu">
        <div class="col-12 col-md-2">
            <a class="dropdown-item" href="http://www.ciudadsur.co/index.php/category/itaguei/" data-contenido="itaguei">Itagüí</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://www.ciudadsur.co/index.php/category/envigado/" data-contenido="Envigado">Envigado</a>
               <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://www.ciudadsur.co/index.php/category/sabaneta/" data-contenido="Sabaneta">Sabaneta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://www.ciudadsur.co/index.php/category/medellin/" data-contenido="Medellin">Medellin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://www.ciudadsur.co/index.php/category/caldas/" data-contenido="Caldas">Caldas</a>
               <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://www.ciudadsur.co/index.php/category/la-estrella/" data-contenido="Laestrella">La Estrella</a>
            <!-- Agrega más elementos aquí -->
        </div>
        <div class="col-12 col-md-10" id="col-2-contenido">
            <section class="itaguei" style="display: block;">
            <?php wp_reset_postdata();?>
              <?php $args = array(
                'post_type' => 'post',
              'posts_per_page' => 3,
            'category_name' => 'itaguei'
              );
            $query = new WP_Query( $args );
?>
  <?php $query->the_post();?>
 
  <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
               
                <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
</div>


            </section>
            <section class="Envigado" style="display: none;">
            <?php wp_reset_postdata();?>
              <?php $args = array(
                'post_type' => 'post',
              'posts_per_page' => 3,
            'category_name' => 'envigado'
              );
            $query = new WP_Query( $args );
?>
  <?php $query->the_post();?>

  <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
</div>

            </section>
            <section class="Sabaneta" style="display: none;">
            <?php wp_reset_postdata();?>
              <?php $args = array(
                'post_type' => 'post',
              'posts_per_page' => 3,
            'category_name' => 'sabaneta'
              );
            $query = new WP_Query( $args );
?>
  <?php $query->the_post();?>

  <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
</div>

            </section>
            <section class="Medellin" style="display: none;">
            <?php wp_reset_postdata();?>
              <?php $args = array(
                'post_type' => 'post',
              'posts_per_page' => 3,
            'category_name' => 'medellin'
              );
            $query = new WP_Query( $args );
?>
  <?php $query->the_post();?>

  <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
</div>
</section>
<section class="Caldas" style="display: none;">
            <?php wp_reset_postdata();?>
              <?php $args = array(
                'post_type' => 'post',
              'posts_per_page' => 3,
            'category_name' => 'caldas'
              );
            $query = new WP_Query( $args );
?>
  <?php $query->the_post();?>

  <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
</div>
</section>
<section class="Laestrella" style="display: none;">
            <?php wp_reset_postdata();?>
              <?php $args = array(
                'post_type' => 'post',
              'posts_per_page' => 3,
            'category_name' => 'la-estrella'
              );
            $query = new WP_Query( $args );
?>
  <?php $query->the_post();?>

  <div class="row">
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
    <?php $query->the_post();?>
    <div class="col-md-4 mb-4">
        <div class="card position-relative overflow-hidden">
            <div class="image-noticias">
                <img src="<?php the_post_thumbnail_url();?>" class="noticias" alt="...">
            </div>
            <div class="card-img-overlay d-flex align-items-end w-100">
            <a href="<?php the_permalink(); ?>" class="noticiasTitulo text-white mb-0"><?php the_title(); ?></a>

            </div>
        </div>
    </div>
</div>
</section>
        </div>
    </div>
</div>

</li>

      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Multimedia
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://ciudadsur.co/index.php/category/videos/">Video</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="https://ciudadsur.co/index.php/category/reportajes-graficos/">Reportajes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="https://ciudadsur.co/index.php/category/cronicas-y-reportajes/">Crónicas</a>
          
          
        </div>
      </li>
    <li class="nav-item active" >
      <a class="nav-link" href="https://ciudadsur.co/category/investigacion/">Investigación</a>
    </li>
     <li class="nav-item active">
    <a class="nav-link" href="https://ciudadsur.co/index.php/category/politica/">Política</a>
        </li>
  
    <li class="nav-item active">
      <a class="nav-link" href="https://ciudadsur.co/index.php/category/cultura/">Cultura </a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="#">Apóyanos </a>
    </li>
  
  </ul>

  <div class="socialMedia col-4">
    <div class="h-100 d-inline-flex align-items-center me-4">
    <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="https://web.facebook.com/periodicociudadsur"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <a
      class="btn text-white btn-floating m-1"
        style="background-color: #55acee;"
        href="https://twitter.com/ciudadsur_"
        role="button"
        ><i class="fab fa-twitter"></i
      ></a>
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="https://www.instagram.com/ciudadsur/"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;"
        href="https://www.youtube.com/@PERIODICOCIUDADSUR"
        role="button"
        ><i class="fab fa-youtube"></i
      ></a>
             </div>
        </div>
    </div>
</div>
</nav>
</header>


      
