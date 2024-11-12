<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    
</head>

    
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

<div id="hero">
    <img src="/wp-content/uploads/2024/10/nathalie-11-scaled.jpeg" alt="image d'un groupe de personnes à une fête" id="hero">
    <h1 class="hero-header__page-title">Photographe Event</h1>
</div>


<body>