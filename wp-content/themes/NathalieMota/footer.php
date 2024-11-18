</main>


<footer class="site__footer">
    
<?php
wp_nav_menu( array( 
    'theme_location' => 'footer-menu',
    'container_class' => 'footer-menu-class' ) 
); 
?>
    <p class="droits-reserves">Tous droits réservés</p>

    
</footer>

<?php
get_template_part("template-parts/modale");
?>

<?php wp_footer();?>

</body>
</html>