<!-- Section | Miniatures Personnalisées -->
<div class="custom-post-thumbnails">
    <input type="hidden" name="page" value="1">
    <div class="thumbnail-container-accueil">
        <?php
        // Arguments | Requête pour les publications personnalisées
        $args_custom_posts = array(
            'post_type' => 'photo',          // Type de publication personnalisée (photo) 
            'posts_per_page' => 12,          // Nombre de publications à afficher par page
            'orderby' => 'date',             // Tri des publications par date
            'order' => 'DESC',               // Ordre de tri descendant - (de la plus récente à la plus ancienne).
        );        

        $args_custom_posts = array(
    
    
            'post_type' => 'custom_post_type', // Remplacer par le type de post souhaité
                'posts_per_page' => 10, 
                'orderby' => 'date',
                
              
            'order' => 'DESC',
            );
            
            $custom_posts_query = new WP_Query($args_custom_posts);
            
            if ($custom_posts_query->have_posts()) :
                
               
            while ($custom_posts_query->have_posts()) : $custom_posts_query->the_post();
                    echo '<h2>' . get_the_title() . '</h2>';
                    the_excerpt();
                endwhile;
                wp_reset_postdata();
            else :
                echo 'Aucun post trouvé.';
            endif;


        <div class="view-all-button">
            <button id="load-more-posts">Charger plus</button>
        </div>
