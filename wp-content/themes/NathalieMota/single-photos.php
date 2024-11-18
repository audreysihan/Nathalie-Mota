<?php
get_header();
while(have_posts()):
    the_post();
?>


<div class="containeur">
<div class="colonne">
    <div class="description_photo">
    
    <h1 class="titre"> <?php the_title(); ?> </h1>
            
            <div class="reference">REFERENCE: <?php the_field('reference'); ?></div>
                
         <div class="categorie">
            CATEGORIE: 
            <?php the_field("categorie");
            ?>
            <?php
            // Récupère les termes de la taxonomie 'categorie' pour le post actuel
            $categories = get_the_terms(get_the_ID(), 'categorie');
            $slug = [];
            if (!empty($categories) && !is_wp_error($categories)) {
                $categorie_names = wp_list_pluck($categories, 'name');
            $slug = wp_list_pluck($categories,"slug");
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
            $formats = get_the_terms(get_the_ID(), 'format');
            if (!empty($formats) && !is_wp_error($formats)) {
                $format_names = wp_list_pluck($formats, 'name');
                echo implode(', ', $format_names); // Affiche les noms des formats, séparés par des virgules
            } else {
                echo 'Non spécifié';
            }
            ?>
         </div>

        <div class="type">
            TYPE: 
            <?php
            // Récupère les termes de la taxonomie 'categorie' pour le post actuel
            $types = get_the_terms(get_the_ID(), 'type_photo');
            if (!empty($types) && !is_wp_error($types)) {
                $type_names = wp_list_pluck($types, 'name');
                echo implode(', ', $type_names); // Affiche les noms des catégories, séparés par des virgules
            } else {
                echo 'Non spécifié';
            }
            ?>
        </div>

        <div class="annee">
            ANNEE:
            <?php the_date("Y"); ?> 
        </div>

     </div>
</div>
       
        <div class="colonne">
        <?php
        $image_id = get_field('image'); // On récupère cette fois l'ID

        if ($image_id) {
            echo wp_get_attachment_image($image_id, 'full');
           echo "<img src=\"$image_id\" class=\"imagemariée\" alt=\"\">";

        }
        ?>
        </div>
</div>

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

<?php
// Récupérer les articles précédent et suivant
$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<div class="fleches">
    <?php if ($prev_post): ?>
        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="arrow-link" id="prev-arrow-link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/fleche-gauche.png">
        </a>
    <?php else: ?>
        <!-- Si aucun article précédent -->
        <span class="arrow-disabled" id="prev-arrow-link">Aucun</span>
    <?php endif; ?>

    <?php if ($next_post): ?>
        <a href="<?php echo get_permalink($next_post->ID); ?>" class="arrow-link" id="next-arrow-link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/fleche-droite.png" alt="Suivant">
        </a>
    <?php else: ?>
        <!-- Si aucun article suivant -->
        <span class="arrow-disabled" id="next-arrow-link">Aucun</span>
    <?php endif; ?>
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
                'post_type' => 'photos',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $slug, // Utilise le slug de la catégorie de la photo actuelle
                    ),
                ),
            );

            $related_photos_query = new WP_Query($args_related_photos);

            while ($related_photos_query->have_posts()) :
                $related_photos_query->the_post();

        $image_id = get_field('image'); // On récupère cette fois l'ID

        if ($image_id) {
            echo wp_get_attachment_image($image_id, 'full');
           echo "<img src=\"$image_id\" class=\"imagemariée\" alt=\"\">";

        }
            endwhile;
            ?>
        
        </div>
                <div class="related-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image-wrapper">
                        <? endif ;?>
                        <?php the_post_thumbnail(); ?>
                </div>

    
                                
       
          
    <?php
    endwhile;
    get_footer();
    ?>