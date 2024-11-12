<?php
get_header();
while(have_posts()):
    the_post();
?>



<div class="conteneur-gauche">
    <h1 class="titre"> <?php the_title(); ?> </h1>
            <div class="description_photo">
                <div class="reference">REFERENCE: <?php the_field('reference'); ?></div>
                
         <div class="categorie">
            CATEGORIE:
            <?php
            // Récupère les termes de la taxonomie 'categorie' pour le post actuel
            $categories = get_the_terms(get_the_ID(), 'categorie');
            if (!empty($categories) && !is_wp_error($categories)) {
                $categorie_names = wp_list_pluck($categories, 'name');
                echo implode(', ', $categorie_names); // Affiche les noms des catégories, séparés par des virgules
            } else {
                echo 'Non spécifié';
            }
            ?>
        </div>

        <div class="format">
            FORMAT:
            <?php
            // Récupère les termes de la taxonomie 'formats' pour le post actuel
            $formats = get_the_terms(get_the_ID(), 'formats');
            if (!empty($formats) && !is_wp_error($formats)) {
                $format_names = wp_list_pluck($formats, 'name');
                echo implode(', ', $format_names); // Affiche les noms des formats, séparés par des virgules
            } else {
                echo 'Non spécifié';
            }
            ?>
    </div>

        <div class="type">TYPE: <?php the_field('type'); ?></div>
            <?php the_date(); ?> 
        </div>

        </div>
       
        <?php
        $image_id = get_field('image'); // On récupère cette fois l'ID

        if ($image_id) {
            echo wp_get_attachment_image($image_id, 'full');
           echo "<img src=\"$image_id\" class=\"imagemariée\" alt=\"\">";

        }
        ?>

    <div class="barre">
            <hr>
    </div>

     

    <div class="zone-de-contact">

        <div class="texte-contact">
            <p>Cette photo vous intéresse ?</p>
        </div>

        <!-- Bouton Contact -->
         <div class="bouton-contact">
  <button type="button" class="bouton" data-bs-toggle="modal" data-bs-target="#videoModal">
                Contact
            </button>
    </div>

    

    <div class="miniature">

<?php if (has_post_thumbnail()) : ?>
                <a data-href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>" class="miniature">
                    <?php the_post_thumbnail(); ?>
                </a>
                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Fullscreen icon -->
            <?php endif; ?>

    <div class="thumbnail-container">
            <div class="thumbnail-wrapper">
            <?php 
	$image_id = get_field( 'image' ); // On récupère cette fois l'ID
	if( $image_id ) {	
		echo wp_get_attachment_image( $image_id, 'thumbnail' );
    }
    ?>
            <div class="fleches">
                <a href="<?php echo esc_url($prev_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($prev_post, 'thumbnail')); ?>" id="prev-arrow-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/fleche-gauche.png" alt="Précédent" class="arrow-img-gauche" id="prev-arrow" />
                </a>
                <a href="<?php echo esc_url($next_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($next_post, 'thumbnail')); ?>" id="next-arrow-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/fleche-droite.png" alt="Suivant" class="arrow-img-droite" id="next-arrow" />
                </a>
            </div>
            </div>
    </div>
    </div>

</div>

    <div class="barre2">
            <hr>
        </div>

     <!-- Section Photos Apparentées -->
     <div class="related-images">
        <h3>VOUS AIMEREZ AUSSI</h3>
        
        <div class="image-container">
            
            <?php
            
            // Récupère deux photos aléatoires de la même catégorie que la photo actuelle.
            $args_related_photos = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $current_category_slugs, // Utilise le slug de la catégorie de la photo actuelle
                    ),
                ),
            );

            $related_photos_query = new WP_Query($args_related_photos);

            while ($related_photos_query->have_posts()) :
                $related_photos_query->the_post();
            endwhile;
            ?>
        

                <div class="related-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image-wrapper">
                        <? endif ;?>
                        <?php the_post_thumbnail(); ?>

        
                                
        <!-- Section | Overlay Catalogue -->
            <div class="thumbnail-overlay-single">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icon_eye.png" alt="Icône de l'œil"> <!-- Icône de l'œil | Information Photo -->
            <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Icône plein écran -->
            
            <?php
            
            // Récupère la référence et la catégorie de l'image associée.
            $related_reference_photo = get_field('reference_photo');
            $related_categories = get_the_terms(get_the_ID(), 'categorie');
            $related_category_names = array();

                if ($related_categories) {
                    foreach ($related_categories as $category) {
                         $related_category_names[] = esc_html($category->name);
                            }
                        }

            ?>
                                    
        <div class="photo-info">
            <div class="photo-info-left">
                <p><?php echo esc_html($related_reference_photo); ?></p>
            </div>
            <div class="photo-info-right">
            <p><?php echo implode(', ', $related_category_names); ?></p>
            </div>
        </div>       

        <?php wp_reset_postdata(); // Restaure les données originales des publications ?>
        </div>

        <!-- Ajouter un bouton pour la page d'accueil -->
        <div class="home-button">
            <a href="<?php echo home_url(); ?>" class="button">Toutes les photos</a>
        </div>
    </div>

    <script src="<?php echo get_template_directory_uri(); ?>/wp-content/NathalieMota/script.js"></script>
        
          
    <?php
    endwhile;
    get_footer();
    ?>