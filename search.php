<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <h1 class="page-title"><?php printf('Resultados de la búsqueda: %s', get_search_query()); ?></h1>
        </header>

        <?php if (have_posts()) : ?>

            <div class="row">
    <?php $count = 0; ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-4">
            <article id="post-<?php the_ID(); ?>" <?php post_class('search-result card mb-4'); ?>>
                <div class="image-busqueda">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top img-fluid" alt="...">
                    </a>
                </div>
                <div class="card-body">
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </header>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </article>
        </div>

        <?php
        $count++;
        if ($count % 3 == 0) {
            // Cerrar y abrir una nueva fila después de cada tercer resultado
            echo '</div><div class="row">';
        }
        ?>
    <?php endwhile; ?>
</div>


            <?php the_posts_pagination(); ?>

        <?php else : ?>

            <p><?php esc_html_e('No se encontraron resultados.', 'textdomain'); ?></p>

        <?php endif; ?>

        <!-- Mostrar el término de búsqueda -->
        <?php if (get_search_query()) : ?>
            <div class="search-info">
                <p>Termino de búsqueda: <?php echo esc_html(get_search_query()); ?></p>
            </div>
        <?php endif; ?>

    </main>
</section>


<?php get_footer(); ?>
