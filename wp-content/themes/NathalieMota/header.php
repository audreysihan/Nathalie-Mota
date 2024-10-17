<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    
</head>

<body>
    
<div id="nav">
    <div id="logo">

<?php echo get_custom_logo();?>

    </div>

    <div id="menu">
<?php
wp_nav_menu( array( 
    'theme_location' => 'header-menu',
    'container_class' => 'header-menu-class' ) 
); 
?>
</div>
</div>

