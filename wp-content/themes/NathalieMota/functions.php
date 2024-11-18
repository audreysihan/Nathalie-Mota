<?php 

function register_my_menu() { 
    register_nav_menus( 
        array(
         'header-menu' => __( 'Header Menu' ),
         'footer-menu' => __( 'Footer Menu' ) 
         ) 
        ); 
    } 
    add_action( 'init', 'register_my_menu' );

    //gestion du logo sur le thème
    add_theme_support( 'custom-logo' );

    // Ajout style CSS et JS
function ajout_CSS_script() {
    // JS
    wp_enqueue_script('script-global', get_template_directory_uri() . '/script.js', array('jquery'), '1.1', true);
    // CSS
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');
}

add_action( 'wp_enqueue_scripts', 'ajout_CSS_script' );

function enqueue_load_more_script(){


    wp_localize_script('load-more', 'my_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');

function load_more_posts() {
    // Vérifier la valeur de la page
    $paged = isset($_POST['page']) ? intval($_POST['page']) + 1 : 1;

    $args_custom_posts = array(
        'post_type' => 'photos',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged, // Indiquer la page
    );

    $custom_posts_query = new WP_Query($args_custom_posts);

    if ($custom_posts_query->have_posts()) :
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post(); ?>

            <div class="custom-post-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="thumbnail-wrapper">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                            <div class="thumbnail-overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon_eye.png" alt="Icône de l'œil">
                                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i>

                                <?php
                                $related_reference_photo = get_field('reference');
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
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        <?php endwhile;
        wp_reset_postdata();
    endif;
wp_send_json_success("test");
    wp_die(); // Important : Arrêter l'exécution
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');