<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <label for="s" class="screen-reader-text">Buscar:</label>
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Buscar..." />
    <button type="submit" id="searchsubmit" value="Buscar">Buscar</button>
</form>
