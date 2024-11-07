<?php
get_header();
while(have_posts()):
    the_post();
?>



<div class="conteneur-gauche">
    <h1> <?php the_title(); ?> </h1>
        
        <div class="description_photo">
            <div class="review__reference">Référence: <?php the_field( 'reference' ); ?></div>
            <div class="review__categorie">Catégorie: <?php the_field( 'categorie' ); ?></div>
            <div class="review__format">Format: <?php the_field( 'format' ); ?></div>
            <div class="review__type">Type: <?php the_field( 'type' ); ?></div>
            <div class="review__annee">Année: <?php the_field( 'annee' ); ?></div>
        </div>
            
    <hr style="border: 1px solid #000; width: 50%;">
        
<div class="zone-de-contact">
    
    <div class="texte-contact">
        <p>Cette photo vous intéresse ?</p>
    </div>

    <div class="bouton-contact">
            <button id="bouton-contact">Contact</button>
        
                <?php include get_template_directory() . '/template-parts/modale.php'; ?>

                <?php
                // Récupère la valeur du champ personnalisé 'reference_photo' et la définit comme une variable JavaScript.
                $reference_photo = get_field('reference_photo');
                if ($reference_photo) {
                    echo '<script type="text/javascript">';
                    echo 'var acfReferencePhoto = "' . esc_js($reference_photo) . '";';
                    echo '</script>';
                }
                ?>
            
    </div>
</div>
</div>

<div class="conteneur-droit">
<?php if (has_post_thumbnail()) : ?>
                <a data-href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>" class="photo">
                    <?php the_post_thumbnail(); ?>
                </a>
                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Fullscreen icon -->
            <?php endif; ?>

    <div class="thumbnail-container">
            <div class="thumbnail-wrapper">
            <?php 
	$image_id = get_field( 'image' ); // On récupère cette fois l'ID
	if( $image_id ) {	
		echo wp_get_attachment_image( $image_id, 'full' );
    }
    ?>
            </div>
                <a href="<?php echo esc_url($prev_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($prev_post, 'thumbnail')); ?>" id="prev-arrow-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/fleche-gauche.png" alt="Précédent" class="arrow-img-gauche" id="prev-arrow" />
                </a>
                <a href="<?php echo esc_url($next_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($next_post, 'thumbnail')); ?>" id="next-arrow-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/fleche-droite.png" alt="Suivant" class="arrow-img-droite" id="next-arrow" />
                </a>
            </div>
    </div>

      <hr style="border: 1px solid #000;">

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